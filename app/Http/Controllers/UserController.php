<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Like;
use App\Category;
use App\Follower;
use App\Country;
use Auth;
use Image;
use File;

class UserController extends Controller
{

  public function avatar_update(Request $request){
      // Avatar Upload
      if($request->hasFile('avatar')){

          $image = $request->file('avatar');

          $filename = time() . '_' . $image->getClientOriginalName();

          Image::make($image)->resize(300, 300, function($ratio){
              $ratio->aspectRatio();
          })->save(public_path('avatar/' . $filename));

          $user = Auth::user();
          $user->avatar = $filename;
          $user->save();
      }

      return redirect()->back();
  }

  public function dashboard()
  {
      $user = Auth::user();
      $posts = Post::where('user_id', Auth::id() )->get();
      $category = Category::all();

      return view('members.dashboard', compact('user', 'posts', 'category'));
  }

  public function publicProfile($username)
  {
      $user = User::whereUsername($username)->first();
      $post = Post::where('user_id', $user->id)->count();
      $follower = Follower::where('follow_id',$user->id)->count();
      $countries = Country::all();

      $category = Category::all();

      $posts = Post::where('user_id', $user->id)->get();

      return view('members.publicProfile',  compact('user', 'post', 'follower', 'countries', 'category', 'posts') );
  }

  public function destroy($id)
  {
    $users = User::findOrFail($id);

    $users->delete();

    return redirect()->back();
  }


}
