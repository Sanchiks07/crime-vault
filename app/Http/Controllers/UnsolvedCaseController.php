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
                    $query->whereJsonLength('count', 1);
                    break;

                case '2-5':
                    $query->whereJsonLength('count', '>=', 2)
                        ->whereJsonLength('count', '<=', 5);
                    break;

                case '6-plus':
                    $query->whereJsonLength('count', '>=', 6);
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
                $query
                    ->orderByRaw('JSON_LENGTH(count) ASC')
                    ->orderBy('name', 'asc');
                break;

            case 'victims-desc':
                $query
                    ->orderByRaw('JSON_LENGTH(count) DESC')
                    ->orderBy('name', 'asc');
                break;

            case 'name-asc':
            default:
                $query->orderBy('name', 'asc');
                break;
        }

        $unsolved_cases = $query->get();

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
        $unsolved_case->load([
            'discussions.user'
        ]);

        return view('cases.unsolved.show', compact('unsolved_case'));
    }
}
