<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'UserController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts/timeline', 'PostController@index');

Route::get('/users/show', 'UserController@show')->name('user_show');


Route::get('/users/edit', 'UserController@edit')->name('user_edit');

Route::post('/users/update', 'UserController@update')->name('user_update');

Route::get('/users/{user_id}', 'UserController@show')->name('user_shosai');



Route::get('/posts/newcreate','PostController@create')->name('post_create');

Route::post('/posts/timeline','PostController@store');

Route::get('/posts/delete','PostController@destroy')->name('post_detail');


Route::get('/posts/editpost', 'PostController@edit')->name('post_edit');
Route::patch('/posts/update', 'PostController@update')->name('post_update');


Route::get('/posts/{post_id}/likes_text','LikeController@store')->name('post_like');
Route::get('/likes_text/{user_id}','LikeController@destroy')->name('post_unlike');