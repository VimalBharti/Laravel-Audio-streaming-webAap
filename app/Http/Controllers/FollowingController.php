<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follower;
use App\Country;
use Auth;

class FollowingController extends Controller
{
  public function following($id)
  {
      $follow = New Follower;
      $follow->user_id = Auth::user()->id;
      $follow->follow_id = $id;
      $follow->save();

      return back();
  }

  public function Unfollow($id)
  {
      Follower::where('user_id', '=', Auth::user()->id)
                      ->where('follow_id', $id)
                      ->delete();
                      return back();
  }
}
