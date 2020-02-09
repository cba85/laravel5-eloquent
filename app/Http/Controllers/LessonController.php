<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;

class LessonController extends Controller
{
    public function index(Lesson $lesson)
    {
        $lessons = $lesson->get();
        return view('lesson.index', compact('lessons'));
    }

    public function show(Lesson $lesson)
    {
        return view('lesson.show', compact('lesson'));
    }
}
