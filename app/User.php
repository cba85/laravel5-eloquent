<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function phone()
    {
        return $this->hasOne(\App\Phone::class);
    }

    public function token()
    {
        return $this->hasOne(\App\Token::class);
    }

    public function topics()
    {
        return $this->hasMany(\App\Topic::class);
    }

    public function posts()
    {
        return $this->hasMany(\App\Post::class);
    }

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function projects()
    {
        //return $this->hasManyThrough(Project::class, Company::class);
        return $this->belongsToMany(Project::class, 'user_company_project_view');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
