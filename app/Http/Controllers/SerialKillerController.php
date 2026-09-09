<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SerialKiller;

class SerialKillerController extends Controller
{
    public function index(Request $request) {
        $query = SerialKiller::query();

        // search by real name or nickname
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('nickname', 'like', '%' . $search . '%');
            });
        }

        // filter by country
        if ($request->filled('country')) {
            $query->where('country', $request->input('country'));
        }

        // filter by confirmed victim count
        if ($request->filled('victims')) {
            switch ($request->input('victims')) {
                case '0-5':
                    $query->where('victim_count->killed->confirmed', '<=', 5);
                    break;

                case '6-10':
                    $query->whereBetween(
                        'victim_count->killed->confirmed',
                        [6, 10]
                    );
                    break;

                case '11-20':
                    $query->whereBetween(
                        'victim_count->killed->confirmed',
                        [11, 20]
                    );
                    break;

                case '21-plus':
                    $query->where('victim_count->killed->confirmed', '>=', 21);
                    break;
            }
        }

        // sort results
        switch ($request->input('sort')) {
            case 'name-desc':
                $query->orderBy('nickname', 'desc');
                break;

            case 'victims-asc':
                $query->orderBy('victim_count->killed->confirmed', 'asc');
                break;

            case 'victims-desc':
                $query->orderBy('victim_count->killed->confirmed', 'desc');
                break;

            case 'name-asc':
            default:
                $query->orderBy('nickname', 'asc');
                break;
        }

        $serial_killers = $query->get();

        // gets all unique countries for the filter dropdown
        $countries = SerialKiller::query()
            ->select('country')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        // gets the id's of all serial killers favourited by the logged in user
        $favouriteKillerIds = collect();

        if (auth()->check()) {
            $favouriteKillerIds = auth()
                ->user()
                ->favourites()
                ->where('favouritetable_type', SerialKiller::class)
                ->pluck('favouritetable_id');
        }

        return view('cases.killers.index', compact('serial_killers', 'favouriteKillerIds', 'countries'));
    }

    public function show(SerialKiller $serial_killer) {
        $serial_killer->load(['victimRecord', 'discussions.user']);

        return view('cases.killers.show', compact('serial_killer'));
    }
}