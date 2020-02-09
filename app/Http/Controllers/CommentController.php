<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $comments = $request->user()->comments()->get();
        return view('user.comments.index', compact('comments'));
    }
}
