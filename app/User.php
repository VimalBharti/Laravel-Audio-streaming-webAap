<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use Notifiable;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sluggable()
    {
        return [
            'username' => [
                'source' => 'name',
                'separator' => '_'
            ]
        ];
    }

    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function likes(){
      return $this->hasMany('App\Like');
    }
}
