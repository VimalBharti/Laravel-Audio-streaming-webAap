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

// Password reset link request routes...
Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');

// Pgaes
Route::get('/about', 'HomeController@about');
Route::get('/terms', 'HomeController@terms');
Route::get('/privacy', 'HomeController@privacy');
Route::get('/guideline', 'HomeController@guideline');

Route::get('/contact-us', 'HomeController@contact')->name('contact');
Route::post('/contact-us', ['as'=>'contactus.store','uses'=>'HomeController@contactUSPost']);

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

Auth::routes();

Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('profile/{username}', 'UserController@publicProfile')->name('public.profile')->where('username', '[\w\d\-\_]+');


// Single Showcase
Route::get('/{slug}', 'ShowcaseController@getSingle')->name('showcase.single');

// Single Post
Route::get('design/{uid}', ['as' => 'post.show', 'uses' => 'PostController@show'])->where('uid', '[\w\d\-\_]+');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/allmembers', 'AdminController@members')->name('admin.allmembers');
    Route::get('/allposts', 'AdminController@posts')->name('admin.allpost');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');
});
