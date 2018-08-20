<?php

namespace App\Http\Controllers;

use App\Showcase;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;

class ShowcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();
      $showcases = Showcase::where('user_id', Auth::id() )->get();
      return view('showcase.show', compact('user', 'showcases') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $user = Auth::user();
        return view('showcase.index', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
          'image' => 'required|mimes:jpeg,bmp,png|max:5000'
      ];

      $this->validate($request, $rules);

      $date = date('yz');
      $rand = rand(0, 2000);

      $showcase = new Showcase;

      $showcase->slug = 'by' . $date . 'b' . $rand;

      if($request->hasFile('image')){
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalName();
          Image::make($image)->save(public_path('myshowcase/' . $filename));

          $showcase->image = $filename;
      }

      $showcase->user_id = Auth::user()->id;
      $showcase->user_name = Auth::user()->name;
      $showcase->user_image = Auth::user()->avatar;

      $showcase->save();

      return redirect()->back();
    }

    // Get Single Showcase
    public function getSingle($slug)
    {
        $showcases = Showcase::where('slug', '=', $slug)->get();
        return view('showcase.single', compact('showcases'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function show(Showcase $showcase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function edit(Showcase $showcase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showcase $showcase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $showcases = Showcase::find($id);
      $image = $showcases->image;

      if(!empty($showcases->image)){
          if(file_exists(public_path('myshowcase/'. $showcases->image) )){
              unlink(public_path('myshowcase/'. $showcases->image));
          }
      }

      $showcases->delete();

      return redirect()->back();
    }
}
