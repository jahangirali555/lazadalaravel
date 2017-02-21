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

// Group By all request
// Didn't included authorization e.g. 'basic.once' / 'oauth' or 'Auth' etc, as it was not mentioned
Route::group(array('prefix' => 'api/service/v1'), function() {
	
	# Post Resource & Model
	Route::resource('post', 'PostController');

	# Additional Routes
		# 1: Get all posts by tag or tags
		Route::get('/tag/{name}', 'TagController@show');

		# 2: Count posts by tag or tags
		Route::get('/tag/count/{name}', 'TagController@getCount');
	
	# Root
	Route::get('/', function() {
		return View::make('posts');
	});

	

});	

