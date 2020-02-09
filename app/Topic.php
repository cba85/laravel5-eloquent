<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function user()
    {
        //return $this->belongsTo(\App\User::class);
        return $this->belongsTo(\App\User::class, 'uid');
    }

    public function posts()
    {
        return $this->hasMany(\App\Post::class);
    }
}
