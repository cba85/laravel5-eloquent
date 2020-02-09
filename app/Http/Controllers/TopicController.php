<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class TopicController extends Controller
{
    public function index(Topic $topic)
    {
        $topics = $topic->orderBy('created_at', 'DESC')->get();

        // 6. Database default columns name
        //dd($topics->first()->user);

        return view('topic.index', compact('topics'));
    }

    public function show(Topic $topic)
    {
        //return view('topic.show', compact('topic'));

        /*
        $posts = $topic->posts()->get();
        return view('topic.show', compact('topic', 'posts'));
        */

        return view('topic.show', compact('topic'));
    }

    public function delete(Topic $topic)
    {
        $topic->delete();
    }

    public function update(Topic $topic)
    {
        /*
        // Make it fillable
        $topic->update([
            'title' => 'Topic updated'
        ]);
        */

        $topic->title = 'Topic updated';
        $topic->save();
    }
}
