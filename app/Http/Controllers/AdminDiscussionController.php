<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;

class AdminDiscussionController extends Controller
{
    public function index() {
        // loads the comment, the user who wrote it and the Serial Killer or Unsolved Case it belongs to
        $discussions = Discussion::with([
            'user',
            'discussable',
        ])->latest()->get();

        return view('admin.discussions', compact('discussions'));
    }
}
