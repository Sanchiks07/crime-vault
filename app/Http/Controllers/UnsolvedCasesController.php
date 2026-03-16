<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnsolvedCase;

class UnsolvedCasesController extends Controller
{
    public function index() {
        $unsolved_cases = UnsolvedCase::all();

        return view('cases.unsolved.index', compact('unsolved_cases'));
    }

    public function show(UnsolvedCase $unsolved_case) {
        return view('cases.unsolved.show', compact('unsolved_case'));
    }
}
