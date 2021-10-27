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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('posts/new','PostController@add');
Route::post('posts/new','PostController@create');
Route::get('posts','PostController@index');
Route::get('posts/edit', 'PostController@edit');
Route::post('posts/edit', 'PostController@update');
Route::get('posts/delete','Admin\PostController@delete');
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/posts','Admin\PostController@index')->name('admin.users');
    Route::get('/user','Admin\PostController@user');
    Route::get('/user/delete2','Admin\PostController@delete2');
});