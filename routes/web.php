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

Route::any('/result', 'HomeController@search');

Route::get('/list-users', 'HomeController@listUser')->name('listUser');

// Members Dashbaord
Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', 'UserController@dashboard')->name('member.dashboard');
    Route::post('/profile/edit', 'UserController@avatar_update')->name('avatar.update');
    Route::patch('profile/edit', ['as' => 'profile.update', 'uses' => 'UserController@profileUpdate']);
    Route::resource('members', 'PostController');

    // Showcase
    Route::resource('showcase/me', 'ShowcaseController');
});

// Pgaes
Route::get('/about', 'HomeController@about');
Route::get('/terms', 'HomeController@terms');
Route::get('/privacy', 'HomeController@privacy');
Route::get('/guideline', 'HomeController@guideline');

Route::get('/contact-us', 'HomeController@contact')->name('contact');
Route::post('/contact-us', 'HomeController@postContact');
// Route::post('/contact-us', ['as'=>'contactus.store','uses'=>'HomeController@contactUSPost']);

// all posts
Route::get('/all-designs', 'HomeController@all')->name('all-post');
Route::get('/all-misc', 'HomeController@misc')->name('all-misc');
Route::get('/all-templates', 'HomeController@template')->name('all-template');

Route::get('showcase', 'ShowcaseController@dashboard')->name('showcase.dash');


// ProfileController
Route::resource('members/profiles', 'ProfileController');

// Follower and Followings
Route::group(['middleware' => 'auth'], function(){
    Route::get('/following/{id}', 'FollowingController@following')->name('user.follow');
    Route::get('/Unfollow/{id}', 'FollowingController@Unfollow')->name('user.unfollow');
});

// Categories
Route::resource('categories', 'CategoryController');
Route::resource('tags', 'TagController');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('profile/{username}', 'UserController@publicProfile')->name('public.profile')->where('username', '[\w\d\-\_]+');


// Single Showcase
Route::get('/{slug}', 'ShowcaseController@getSingle')->name('showcase.single');

// Single Post
Route::get('design/{slug}', ['as' => 'post.show', 'uses' => 'PostController@show'])->where('slug', '[\w\d\-\_]+');
Route::get('design/{slug}/preview', ['as' => 'preview-design', 'uses' => 'PostController@preview'])->where('slug', '[\w\d\-\_]+');
Route::get('design/{slug}/customize', ['as' => 'customize-design', 'uses' => 'PostController@custom'])->where('slug', '[\w\d\-\_]+');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/allmembers', 'AdminController@members')->name('admin.allmembers');
    Route::get('/allposts', 'AdminController@posts')->name('admin.allpost');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');
});
