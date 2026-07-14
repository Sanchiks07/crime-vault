<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;

class ResourceController extends Controller
{
    public function index() {
        $resources = Resource::all();

        return view('resources', compact('resources'));
    }
}
