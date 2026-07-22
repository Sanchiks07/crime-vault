<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Victim;

class VictimController extends Controller
{
    public function index() {
        $victims = Victim::with('killer')->get();

        return view('victims', compact('victims'));
    }
}