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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', 'PostController@index')->name('posts.index')->middleware('auth');
Route::get('posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts', 'PostController@store');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::delete('/posts/{post}', 'PostController@destroy');
Route::patch('/posts/{post}', 'PostController@update');
Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->where('driver', implode('|', config('auth.socialite.drivers')));
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->where('driver', implode('|', config('auth.socialite.drivers')));
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
