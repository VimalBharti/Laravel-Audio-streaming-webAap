<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Like;
use App\ContactUs;
use App\Category;
use Image;
use Session;
use File;
use Mail;
use Auth;

class HomeController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $category = Category::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(11);
        // $posts = Post::all();


        $misc = Post::where([
          ['category_id', '2']
        ])->get();
        $templates = Post::where([
          ['category_id', '3']
        ])->get();

        return view('home', compact('user', 'category', 'posts', 'misc', 'templates'));
    }

    public function contact(){
      $user = Auth::user();
      return view('pages.contact', compact('user'));
    }
    public function contactUSPost(Request $request){
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
        ]);

       ContactUs::create($request->all());

       return back()->with('success', 'Thanks for contacting us!');
    }

    public function all(Request $request){

      $user = Auth::user();
      $category = Category::all();
      $posts = Post::orderBy('created_at', 'desc')->paginate(24);

      return view('examples.all', compact('user', 'category', 'posts'));
    }

    public function misc(Request $request){

      $user = Auth::user();
      $category = Category::all();
      $posts = Post::where('category_id', '2')->paginate(24);

      return view('examples.all', compact('user', 'category', 'posts'));
    }
    public function template(Request $request){

      $user = Auth::user();
      $category = Category::all();
      $posts = Post::where('category_id', '3')->paginate(24);

      return view('examples.all', compact('user', 'category', 'posts'));
    }

    // Pages Controllers
    public function about(){return view('pages.about');}
    public function terms(){return view('pages.terms');}
    public function privacy(){return view('pages.privacy');}
    public function guideline(){return view('pages.guideline');}


}
