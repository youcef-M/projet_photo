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

Route::get('/users', 'UserController@index');
Route::put('/user/update/{id}', 'UserController@update'); // METHOD PUT/PATCH 
Route::post('/user/new', 'UserController@store');
Route::get('/user/show/{id}', 'UserController@show');
Route::get('/user/delete/{id}','UserController@destroy');

