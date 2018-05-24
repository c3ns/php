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

Route::get('/', 'PostController@index')->name('home');

Auth::routes();

Route::resource('posts', 'PostController');
Route::resource('/admin/cat', 'CategoryController');

Route::get('/admin/posts', 'AdminController@posts')->name('admin.posts')->middleware('admin');
Route::get('/admin', 'AdminController@index')->name('admin.index')->middleware('admin');

Route::get('/user','UserController@index')->name('user.index');

Route::get('/search', 'SearchController@search');