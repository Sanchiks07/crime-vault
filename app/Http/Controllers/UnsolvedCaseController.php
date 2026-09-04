<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnsolvedCase;

class UnsolvedCaseController extends Controller
{
    public function index() {
        $unsolved_cases = UnsolvedCase::all();

        // empty collection for users who are not logged in
        $favouriteUnsolvedIds = collect();

        if (auth()->check()) {
            $favouriteUnsolvedIds = auth()
                ->user()
                ->favourites()
                ->where('favouritetable_type', UnsolvedCase::class)
                ->pluck('favouritetable_id');
        }

        return view('cases.unsolved.index', compact('unsolved_cases', 'favouriteUnsolvedIds'));
    }

    public function show(UnsolvedCase $unsolved_case) {
        return view('cases.unsolved.show', compact('unsolved_case'));
    }
}
