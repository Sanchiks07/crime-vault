<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;

class ResourceController extends Controller
{
    public function index() {
        $groupedResources = Resource::all()->groupBy('resource_type');

        return view('resources', compact('groupedResources'));
    }
}
