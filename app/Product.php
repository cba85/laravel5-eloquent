<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany(Category::class)
            ->withPivot('added_at')
            ->withPivot('visible')
            ->wherePivot('visible', true);
    }
}
