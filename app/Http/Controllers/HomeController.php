<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SerialKiller;
use App\Models\UnsolvedCase;

class HomeController extends Controller
{
    public function index() {
        $killers = SerialKiller::inRandomOrder()->take(2)->get();
        $unsolved = UnsolvedCase::inRandomOrder()->take(2)->get();

        $featuredCases = [];

        foreach ($killers as $killer) {
            $featuredCases[] = [
                'title' => $killer->nickname,
                'type' => 'Serial Killer',
                'description' => Str::limit($killer->description, 200),
                'link' => route('cases.killers.show', $killer->id),
            ];
        }

        foreach ($unsolved as $case) {
            $featuredCases[] = [
                'title' => $case->name,
                'type' => 'Unsolved Case',
                'description' => Str::limit($case->description, 200),
                'link' => route('cases.unsolved.show', $case->id),
            ];
        }

        return view('home', compact('featuredCases'));
    }
}
