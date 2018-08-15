<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

// Members Dashbaord
Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', 'UserController@dashboard')->name('member.dashboard');
    Route::post('/profile/edit', 'UserController@avatar_update')->name('avatar.update');
    Route::patch('profile/edit', ['as' => 'profile.update', 'uses' => 'UserController@profileUpdate']);
    Route::resource('members', 'PostController');

    // Showcase
    Route::resource('showcase/me', 'ShowcaseController');
});

Route::get('/contact-us', 'HomeController@contact')->name('contact');
Route::post('/contact-us', ['as'=>'contactus.store','uses'=>'HomeController@contactUSPost']);

// all posts
Route::get('/all-designs', 'HomeController@all')->name('all-post');
Route::get('/all-headers', 'HomeController@header')->name('all-header');
Route::get('/all-footers', 'HomeController@footer')->name('all-footer');
Route::get('/all-templates', 'HomeController@template')->name('all-template');

Route::get('showcase', 'ShowcaseController@dashboard')->name('showcase.dash');

// Single Post
Route::get('design/{uid}', ['as' => 'post.show', 'uses' => 'PostController@show'])->where('uid', '[\w\d\-\_]+');

// ProfileController
Route::resource('members/profiles', 'ProfileController');

// Follower and Followings
Route::group(['middleware' => 'auth'], function(){
    Route::get('/following/{id}', 'FollowingController@following')->name('user.follow');
    Route::get('/Unfollow/{id}', 'FollowingController@Unfollow')->name('user.unfollow');
});


Auth::routes();


Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('profile/{username}', 'UserController@publicProfile')->name('public.profile')->where('username', '[\w\d\-\_]+');


// Single Showcase
Route::get('/{slug}', 'ShowcaseController@getSingle')->name('showcase.single');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});
