<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $posts = $post->orderBy('created_at', 'DESC')->get();
        return view('post.index', compact('posts'));
    }
}
