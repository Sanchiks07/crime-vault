<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PsychologyController extends Controller
{
    public function introduction() {
        return view('psychology.introduction');
    }

    public function fundamentals() {
        return view('psychology.fundamentals');
    }

    public function personality() {
        return view('psychology.personality');
    }

    public function profiling() {
        return view('psychology.profiling');
    }

    public function crimeScenes() {
        return view('psychology.crimeScenes');
    }

    public function investigativePsychology() {
        return view('psychology.investigativePsychology');
    }

    public function victimology() {
        return view('psychology.victimology');
    }

    public function experiments() {
        return view('psychology.experiments');
    }

    public function myths() {
        return view('psychology.myths');
    }

    public function resources() {
        return view('psychology.resources');
    }

    public function facts() {
        return view('psychology.facts');
    }

    public function faq() {
        return view('psychology.faq');
    }
}
