<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    public function show(Group $group)
    {
        //dd($group);
        dd($group->themes()->get());
    }
}
