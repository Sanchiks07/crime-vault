<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseEvent;

class CaseEventController extends Controller
{
    public function index() {
        $events = CaseEvent::with('eventable')
            ->orderBy('event_date', 'asc')
            ->get();

        return view('caseEvents', compact('events'));
    }
}
