<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
  protected $table = 'posts';
  use Sluggable;

  public function category() {
      return $this->belongsTo('App\Category');
  }
  public function user() {
      return $this->belongsTo('App\User');
  }
  public function likes() {
    return $this->belongsTo('App\Like');
  }

  public function tags(){
    return $this->belongsToMany('App\Tag');
  }

  public function sluggable()
  {
      return [
          'slug' => [
              'source' => 'title',
              'separator' => '-'
          ]
      ];
  }

}
