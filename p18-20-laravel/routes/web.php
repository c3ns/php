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

Route::get('/', 'MainController@index')->name('main');
Route::post('/data/store', 'MainController@store')->name('save_data');
Route::get('/page/add', 'MainController@posts')->name('show_posts');
Route::get('/page/cat/{id}', 'MainController@index')->name('by_categorie');

