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
Route::get('posts/new','Admin\PostController@add');
Route::post('posts/new','Admin\PostController@create');
Route::get('posts','PostController@index');
Route::get('posts/delete','Admin\PostController@delete');
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('posts','Admin\PostController@index')->name('admin.users');
});