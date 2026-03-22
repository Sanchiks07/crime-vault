<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;

class ResourcesController extends Controller
{
    public function index() {
        $resources = Resource::all();

        return view('resources.index', compact('resources'));
    }
}
