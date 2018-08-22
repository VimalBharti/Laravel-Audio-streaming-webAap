<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table = 'posts';

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
}
