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

// route to show the login form
Route::get('/', array('uses' => 'HomeController@showLogin'));
Route::get('/login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('/login', array('uses' => 'HomeController@doLogin'));

// route to logout
Route::get('/logout', array('uses' => 'HomeController@doLogout'));

if (Session::has('loggedIn')) {
	Route::get('/upload/', array('uses' => 'UploadController@mainAction'));
	Route::post('/upload', array('uses' => 'UploadController@doAction'));
	Route::get('/storage/fetch/{key}', function ($key) {
		(new StorageController())->doFetch($key);
	});
	Route::get('/storage/delete/{key}', function ($key) {
		(new StorageController())->doDelete($key);
	});
	Route::get('/list', array('uses' => 'UploadController@listAction'));
}
else {
	Route::any('/upload/', function()
	{
		return Redirect::to('/login');
	});
}
