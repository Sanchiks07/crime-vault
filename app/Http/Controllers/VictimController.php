<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Victim;

class VictimController extends Controller
{
    public function index() {
        return view('victims');
    }
}
