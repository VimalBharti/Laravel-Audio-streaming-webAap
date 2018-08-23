<?php

namespace App;

use Cog\Contracts\Love\Likeable\Models\Likeable as LikeableContract;
use Cog\Laravel\Love\Likeable\Models\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
  protected $table = 'posts';
  use Sluggable;
  use Likeable;

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
