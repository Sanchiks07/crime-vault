<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VictimsController extends Controller
{
    public function index() {
        return view('victims.index');
    }
}
