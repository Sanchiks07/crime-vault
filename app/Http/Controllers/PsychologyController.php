<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PsychologyController extends Controller
{
    public function index() {
        return view('psychology.index');
    }
}
