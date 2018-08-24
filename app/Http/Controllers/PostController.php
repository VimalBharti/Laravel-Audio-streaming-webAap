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
          'image' => 'required|mimes:jpeg,bmp,png|size:2000',
          'psd' => 'required_without_all:css,coding|file|mimes:psd|size:6000',
          'css' => 'required_without_all:psd',
          'coding'=> 'required_without_all:psd',
      ];

      $this->validate($request, $rules);

      $post = new Post;

      $post->title = $request->title;
      $post->credit  = $request->credit;
      $post->url  = $request->url;
      $post->css  = $request->css;
      $post->coding = $request->coding;
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
      }

      // PSD Upload
      if ($request->hasFile('psd')) {
            $file = $request->file('psd');
            $extension = Input::file('psd')->getClientOriginalName();
            $name = rand(1, 999). '_' . $extension;
            $fullpath = $name;

            $request->file('psd')->move(
                base_path() . '/public/uploads/psd/', $name
            );
            $post->psd = $fullpath;
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
      $psd = $post->psd;
      $design= $post->image;

      if(!empty($post->psd)) {
          if (file_exists(public_path('/uploads/psd/'. $post->psd))){
              unlink(public_path('/uploads/psd/'. $post->psd));
          }
      }

      if(!empty($post->image)) {
          if(file_exists(public_path('/uploads/design/'. $post->image))){
              unlink(public_path('/uploads/design/'. $post->image));
          }
      }

      $post->delete();
      Session::flash('success', 'The project was successfully deleted.');
      return redirect()->back();
    }
}
