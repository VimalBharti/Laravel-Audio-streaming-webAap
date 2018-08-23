<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Follower;
use App\Country;
use Session;
use Auth;

class ProfileController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = Auth::user();
      $post = Post::where('user_id', $user->id)->count();
      $mypost = Post::where('user_id', $user->id)->get();
      $follower = Follower::where('follow_id',$user->id)->count();
      $countries = Country::all();
      $posts = Post::where('user_id', $user->id)->get();

      return view('members.profile',  compact('user', 'post', 'mypost', 'follower', 'countries', 'posts') );
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
      $categories = Category::all();
      $country = Country::all();
      return view('members.profileEdit', compact('user', 'categories', 'country') );
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
      // Validate the data
      $this->validate($request, array(
          'city' => 'required',
          'country' => 'required'
      ));

      // Save the data to the database
      // $user = User::find($id);
      $user = Auth::user();
      $user->city = $request->input('city');
      $user->country_id = $request->input('country');
      $user->behance = $request->input('behance');
      $user->twitter = $request->input('twitter');
      $user->dribbble = $request->input('dribbble');
      $user->save();

      // Set flash data with success message
      Session::flash('success', 'Your Account details successfully saved.');

      // redirect to with flash data to VIEW
      return redirect()->route('profiles.show', $user->username);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
