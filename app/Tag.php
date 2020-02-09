<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subjects()
    {
        return $this->morphedByMany(Subject::class, 'taggable');
    }

    public function lessons()
    {
        return $this->morphedByMany(Lesson::class, 'taggable');
    }
}
