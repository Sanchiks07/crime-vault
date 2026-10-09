<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnsolvedCase;

class UnsolvedCaseController extends Controller
{
    public function index(Request $request) {
        $query = UnsolvedCase::query();

        $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'country' => ['nullable', 'string', 'max:100'],
            'victims' => ['nullable', 'string'],
            'suspects' => ['nullable', 'string'],
            'sort' => ['nullable', 'string'],
        ]);

        $allowedVictimFilters = [
            '1',
            '2-5',
            '6-plus'
        ];

        $allowedSuspectFilters = [
            '0',
            '1-3',
            '4-plus'
        ];

        $allowedSorts = [
            'name-asc',
            'name-desc',
            'victims-asc',
            'victims-desc'
        ];

        // search by case name
        if ($request->filled('search')) {
            $search = trim($request->input('search'));

            $query->where('name', 'like', '%' . $search . '%');
        }

        // filter by country
        if ($request->filled('country')) {
            $query->where('country', $request->input('country'));
        }

        // filter by victim count
        if ($request->filled('victims') && in_array($request->input('victims'), $allowedVictimFilters, true)) {
            switch ($request->input('victims')) {
                case '1':
                    if ($query->getConnection()->getDriverName() === 'sqlite') {
                        $query->whereRaw("
                            CAST(json_extract(count, '$.killed') AS INTEGER) +
                            CAST(json_extract(count, '$.wounded') AS INTEGER) = 1
                        ");
                    } else {
                        $query->whereRaw("
                            CAST(JSON_UNQUOTE(JSON_EXTRACT(count, '$.killed')) AS UNSIGNED) +
                            CAST(JSON_UNQUOTE(JSON_EXTRACT(count, '$.wounded')) AS UNSIGNED) = 1
                        ");
                    }
                    break;

                case '2-5':
                    if ($query->getConnection()->getDriverName() === 'sqlite') {
                        $query->whereRaw("
                            CAST(json_extract(count, '$.killed') AS INTEGER) +
                            CAST(json_extract(count, '$.wounded') AS INTEGER) BETWEEN 2 AND 5
                        ");
                    } else {
                        $query->whereRaw("
                            CAST(JSON_UNQUOTE(JSON_EXTRACT(count, '$.killed')) AS UNSIGNED) +
                            CAST(JSON_UNQUOTE(JSON_EXTRACT(count, '$.wounded')) AS UNSIGNED) BETWEEN 2 AND 5
                        ");
                    }
                    break;

                case '6-plus':
                    if ($query->getConnection()->getDriverName() === 'sqlite') {
                        $query->whereRaw("
                            CAST(json_extract(count, '$.killed') AS INTEGER) +
                            CAST(json_extract(count, '$.wounded') AS INTEGER) >= 6
                        ");
                    } else {
                        $query->whereRaw("
                            CAST(JSON_UNQUOTE(JSON_EXTRACT(count, '$.killed')) AS UNSIGNED) +
                            CAST(JSON_UNQUOTE(JSON_EXTRACT(count, '$.wounded')) AS UNSIGNED) >= 6
                        ");
                    }
                    break;
            }
        }

        // filter by suspect count
        if ($request->filled('suspects') && in_array($request->input('suspects'), $allowedSuspectFilters, true)) {
            switch ($request->input('suspects')) {
                case '0':
                    $query->whereJsonLength('suspects', 0);
                    break;

                case '1-3':
                    $query->whereJsonLength('suspects', '>=', 1)
                        ->whereJsonLength('suspects', '<=', 3);
                    break;

                case '4-plus':
                    $query->whereJsonLength('suspects', '>=', 4);
                    break;
            }
        }

        // sort results
        $sort = in_array($request->input('sort'), $allowedSorts, true) ? $request->input('sort') : 'name-asc';

        switch ($sort) {
            case 'name-desc':
                $query->orderBy('name', 'desc');
                break;

            case 'victims-asc':
            case 'victims-desc':
                $direction = $sort === 'victims-asc' ? 'ASC' : 'DESC';

                if ($query->getConnection()->getDriverName() === 'sqlite') {
                    $query->orderByRaw("
                        (
                            CAST(json_extract(count, '$.killed') AS INTEGER) +
                            CAST(json_extract(count, '$.wounded') AS INTEGER)
                        ) {$direction}
                    ");
                } else {
                    $query->orderByRaw("
                        (
                            CAST(JSON_UNQUOTE(JSON_EXTRACT(count, '$.killed')) AS UNSIGNED) +
                            CAST(JSON_UNQUOTE(JSON_EXTRACT(count, '$.wounded')) AS UNSIGNED)
                        ) {$direction}
                    ");
                }

                $query->orderBy('name', 'asc');
                break;

            case 'name-asc':
            default:
                $query->orderBy('name', 'asc');
                break;
        }

        $unsolved_cases = $query->paginate(12)->withQueryString();

        // gets all unique countries for the filter dropdown
        $countries = UnsolvedCase::query()
            ->select('country')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        // empty collection for users who are not logged in
        $favouriteUnsolvedIds = collect();

        if (auth()->check()) {
            $favouriteUnsolvedIds = auth()
                ->user()
                ->favourites()
                ->where('favouritable_type', UnsolvedCase::class)
                ->pluck('favouritable_id');
        }

        return view('cases.unsolved.index', compact('unsolved_cases', 'favouriteUnsolvedIds', 'countries'));
    }

    
    public function show(UnsolvedCase $unsolved_case) {
        $discussions = $unsolved_case->discussions()
            ->with('user')
            ->latest()
            ->paginate(10, ['*'], 'comments_page');

        return view('cases.unsolved.show', compact('unsolved_case', 'discussions'));
    }
}
