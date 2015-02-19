<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


/**
 * USERS
 **/
Route::get('/users','UserController@index');
Route::post('/user/new','UserController@store');
Route::get('/user/show/{id}','UserController@show');
Route::put('/user/update/{id}','UserController@update'); // METHOD PUT/PATCH 
Route::get('/user/delete/{id}','UserController@destroy');
Route::post('/user/login','UserController@login');

/**
 * POSTS
 **/
Route::get('/posts/{id}','PostController@index');
Route::post('/post/new','PostController@store');
Route::get('/post/show/{id}','PostController@show');
Route::put('/post/update/{id}','PostController@update');
Route::get('/post/delete/{id}','PostController@destroy');
Route::post('/post/privacy/{id}','PostController@privacy');

/**
 * COMMENTS
 **/