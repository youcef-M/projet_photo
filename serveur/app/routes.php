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
Route::put('/user/update/{id}','UserController@update');
Route::get('/user/delete/{id}','UserController@destroy');
Route::post('/user/login','UserController@login');
Route::post('/user/activate','UserController@activate');

/**
 * POSTS
 **/
Route::get('/posts/{id}','PostController@index');
Route::post('/post/new','PostController@store');
Route::get('/post/show/{id}','PostController@show');
Route::put('/post/update/{id}','PostController@update');
Route::get('/post/delete/{id}','PostController@destroy');
Route::post('/post/privacy/{id}','PostController@privacy');
Route::get('/post/feed/{id}','PostController@getFeed');

/**
 * COMMENTS
 **/
Route::get('/comments/bypost/{id}','CommentController@byPost');
Route::get('/comments/byuser/{id}','CommentController@byUser');
Route::post('/comment/new','CommentController@store');
Route::get('/comment/show/{id}','CommentController@show');
Route::put('/comment/update/{id}','CommentController@update');
Route::get('/comment/delete/{id}','CommentController@destroy');


/**
 * FOLLOW
 * */

Route::post('/follow/new','FollowController@store');
Route::get('/follow/delete','FollowController@destroy');
Route::get('/followers/{id}','FollowController@followers');
Route::get('followers/id/{id}','FollowController@followersIds');
Route::get('/following/{id}','FollowController@following');
Route::get('/following/id/{id}','FollowController@followingIds');
