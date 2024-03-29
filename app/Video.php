<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getRouteIdentifier()
    {
        return 'article';
    }
}
