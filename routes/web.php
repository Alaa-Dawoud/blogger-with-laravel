<?php

use Illuminate\Support\Facades\Route;

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

//blog routes
Route::get('/blog', 'App\Http\Controllers\PostController@index');


//admin routes
Route::get('/blog/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/blog/admin/posts', 'App\Http\Controllers\AdminController@posts');
Route::post('/blog/admin/posts', 'App\Http\Controllers\AdminController@store_post');
Route::get('/blog/admin/posts/add', 'App\Http\Controllers\AdminController@create_post');
Route::get('/blog/admin/categories', 'App\Http\Controllers\AdminController@categories');
Route::get('/blog/admin/media', 'App\Http\Controllers\AdminController@media');
Route::get('/blog/admin/comments', 'App\Http\Controllers\AdminController@comments');
Route::post('/blog/admin/comments', 'App\Http\Controllers\AdminController@comments_action');
Route::get('/blog/admin/tags', 'App\Http\Controllers\AdminController@tags');
Route::get('/blog/admin/admins', 'App\Http\Controllers\AdminController@admins');


//blog routes with route parameters
Route::get('/blog/{post_url}', 'App\Http\Controllers\PostController@show');
Route::post('/blog/{post_url}', 'App\Http\Controllers\PostController@store_comment');

