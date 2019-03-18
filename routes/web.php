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

Route::get('login', 'Admin\AuthController@login')->name('login');
Route::post('login', 'Admin\AuthController@loginProcess')->name('login.post');

Route::group(['middleware'=>'auth'], function() {
	Route::get('/logout', 'Admin\AuthController@logout');
	Route::get('/', 'Admin\HomeController@dashboard')->name('dashboard');

	// category Routes
	Route::get('/category', 'CategoryController@index');
	Route::get('/category/create', 'CategoryController@create');
	Route::post('/category/create', 'CategoryController@createProcess')->name('create');
	Route::get('/category/view/{id}', 'CategoryController@view');

	// Dropzone routes


	// News Route
	Route::get('/news', 'NewsController@index')->name('news.index');
	Route::get('news/create', 'NewsController@create');
	Route::post('news/create', 'NewsController@createProcess')->name('news.create');
});