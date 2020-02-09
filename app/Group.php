<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function themes()
    {
        // Not the good way to do
        //return $this->hasMany(Theme::class);
        // Good
        return $this->hasManyThrough(Theme::class, User::class, 'group_id', 'user_id');
    }
}
