<?php

namespace App\Http\Controllers;

use App\Models\SerialKiller;

class SerialKillerController extends Controller
{
    public function index() {
        $serial_killers = SerialKiller::all();

        // gets the IDs of all serial killers favourited by the logged in user
        $favouriteKillerIds = collect();

        if (auth()->check()) {
            $favouriteKillerIds = auth()
                ->user()
                ->favourites()
                ->where('favouritetable_type', SerialKiller::class)
                ->pluck('favouritetable_id');
        }

        return view('cases.killers.index', compact('serial_killers', 'favouriteKillerIds'));
    }


    public function show(SerialKiller $serial_killer) {
        $serial_killer->load('victimRecord');

        return view('cases.killers.show', compact('serial_killer'));
    }
}