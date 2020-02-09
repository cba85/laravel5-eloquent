<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(Request $request)
    {
        $posts = $request->user()->posts()->orderBy('created_at', 'DESC')->get();
        dd($posts);
        return view('user.post.index', compact('posts'));
    }
}
