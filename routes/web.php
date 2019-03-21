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

Route::group(['middleware'=>'guest'], function() {
	Route::get('login', 'Admin\AuthController@login')->name('login');
	Route::post('login', 'Admin\AuthController@loginProcess')->name('login.post');
	// Forget Password Routes
	Route::get('forget', 'Admin\AuthController@forget');
	Route::post('forget', 'Admin\AuthController@resetPassword')->name('reset');

});

Route::group(['middleware'=>'auth'], function() {
	
	Route::get('/logout', 'Admin\AuthController@logout');
	Route::get('/', 'Admin\HomeController@dashboard')->name('dashboard');

	// category Routes
	Route::get('/category', 'CategoryController@index');
	Route::get('/category/create', 'CategoryController@create');
	Route::post('/category/create', 'CategoryController@createProcess')->name('create');
	Route::get('category/view/{id}', 'CategoryController@view');
	Route::get('category/edit/{id}', 'CategoryController@edit');
	Route::post('category/edit/{id}', 'CategoryController@editProcess')->name('edit');
	Route::post('category/delete/{id}', 'CategoryController@delete')->name('category.delete');

	// Dropzone routes


	// News Route
	Route::get('/news', 'NewsController@index')->name('news.index');
	Route::get('news/create', 'NewsController@create');
	Route::post('news/create', 'NewsController@createProcess')->name('news.create');
	Route::get('news/view/{slug}', 'NewsController@view');
	Route::post('news/delete/{id}', 'NewsController@delete')->name('news.delete');
	Route::get('news/edit/{slug}', 'NewsController@edit');


	// Serach Routes
	Route::get('search', 'SearchController@search')->name('search');
});