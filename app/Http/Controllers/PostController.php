<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
use App\Tag;
use App\Category;
use Validator;
use Session;
use Auth;
use Image;
use DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $username = str_slug($user->name);
        $user = Auth::user();
        return view('members.create', compact('categories', 'tags', 'username', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validate the data
      $rules = [
          'image' => 'required|mimes:jpeg,gif,png|max:2000',
          'css' => 'required_without_all:js',
          'coding'=> 'required_without_all:js',
      ];

      $this->validate($request, $rules);

      $post = new Post;

      $post->title = $request->title;
      $post->credit  = $request->credit;
      $post->url  = $request->url;
      $post->css  = $request->css;
      $post->coding = $request->coding;
      $post->js = $request->js;
      $post->keyword = $request->keyword;
      $post->framework = $request->framework;
      $post->category_id = $request->category;
      $post->user_name = Auth::user()->name;
      $post->user_image = Auth::user()->avatar;
      $post->user_slug = Auth::user()->username;
      $post->user_id = Auth::user()->id;

      // Image Upload
      if($request->hasFile('image')){
          $image = $request->file('image');
          $filename = rand(1, 100) . '_' . $image->getClientOriginalName();
          Image::make($image)->save(public_path('uploads/design/' . $filename));
          $post->image = $filename;

          $thumbPath = public_path('uploads/design/thumbs');
          $thumb_img = Image::make($image->getRealPath())->resize(600, 550);
          $thumb_img->save($thumbPath . '/' . $filename, 100);
      }

      $post->save();

      $post->tags()->sync($request->tags, false);

      Session::flash('successPost', 'Success!');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $user = Auth::user();
      $tags = Tag::all();
      $single = Post::where('slug', '=', $slug)->first();
      return view('members.single', compact('single', 'user', 'tags'));
    }

    public function preview($slug)
    {
      $user = Auth::user();
      $tags = Tag::all();
      $single = Post::where('slug', '=', $slug)->first();
      return view('members.preview', compact('single', 'user', 'tags'));
    }

    public function custom($slug)
    {
      $user = Auth::user();
      $tags = Tag::all();
      $single = Post::where('slug', '=', $slug)->first();
      return view('members.single-customize', compact('single', 'user', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = Auth::user();
      $tags = Tag::all();
      $categories = Category::all();
      $post = Post::find($id);
      return view('members.edit', compact('post', 'user', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $post = Post::find($id);

      $post->credit      = $request->input('credit');
      $post->url         = $request->input('url');
      $post->css         = $request->input('css');
      $post->coding      = $request->input('coding');
      $post->keyword     = $request->input('keyword');
      $post->framework   = $request->input('framework');

      $post->save();

      Session::flash('successPost', 'Success!');
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $design= $post->image;


      if(!empty($post->image)) {
          if(file_exists(public_path('/uploads/design/'. $post->image))){
              unlink(public_path('/uploads/design/'. $post->image));
          }
      }
      // thumbnails
      if(!empty($post->image)) {
          if(file_exists(public_path('/uploads/design/thumbs/'. $post->image))){
              unlink(public_path('/uploads/design/thumbs/'. $post->image));
          }
      }

      $post->delete();
      Session::flash('success', 'The project was successfully deleted.');
      return redirect()->back();
    }
}
