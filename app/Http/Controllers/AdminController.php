<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tag;
use App\Post;
use App\Category;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admins.dashboard', compact('users', 'categories','tags'));
    }

    public function members() {
      $users = User::all();
      $categories = Category::all();
      return view('admins.allmember', compact('users', 'categories'))->with('no', 1);
    }
    public function posts() {
      $users = User::all();
      $categories = Category::all();
      $posts = Post::count();
      return view('admins.allposts', compact('users', 'categories', 'posts'));
    }
}
