<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	// Show the welcome page
	public function showWelcome()
	{
		return View::make('hello');
	}

	// Show login page view
	public function showLogin()
	{
		// show the form
	   	return View::make('login');
	}
		
	// Login
	public function doLogin()
	{
		 // process the form
		$rules = array(
			'email' => 'required', // make sure the email is an actual email
			'password' => 'required' // password can only be alphanumeric and has to be

		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password)

		} else {
			
			$userdata = array(
				'email'     => Input::get('email'),
				'password'  => Input::get('password')
			);

			if ($userdata['email'] == 'test@tester.com' && $userdata['password'] == 'password') {
				return Redirect::to('upload');
			}
			else {
				return Redirect::to('login')
					->withErrors('You do not exist, go away!')
					->withInput(Input::except('password'));
			}
		}

	}
	// Logout
	public function doLogout() 
	{
		return Redirect::to('login');
	}

}
