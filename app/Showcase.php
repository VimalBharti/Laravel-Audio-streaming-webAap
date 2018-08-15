<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showcase extends Model
{
  protected $table = 'showcases';

  public function user() {
      return $this->belongsTo('App\User');
  }
}
