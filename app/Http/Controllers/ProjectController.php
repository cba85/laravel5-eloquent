<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = $request->user()->projects()->get();
        return view('user.projects.index', compact('projects'));
    }
}
