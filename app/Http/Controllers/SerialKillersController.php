<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SerialKiller;

class SerialKillersController extends Controller
{
    public function index() {
        $serial_killers = SerialKiller::all();

        return view('cases.killers.index', compact('serial_killers'));
    }

    public function show(SerialKiller $serial_killer) {
        $serial_killer->load('victimRecord');

        return view('cases.killers.show', compact('serial_killer'));
    }
}
