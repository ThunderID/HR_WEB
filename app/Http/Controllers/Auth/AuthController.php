<?php namespace App\Http\Controllers\Auth;

use Input, Auth, \Illuminate\Support\MessageBag, Redirect, Config, Session, Validator;
use API;
use App\Http\Controllers\Controller;

class AuthController extends Controller {

	protected $controller_name 		= 'login';

	/**
	 * login form
	 *
	 * @return void
	 * @author 
	 **/
	function getLogin()
	{
		Session::flush();
		
		$this->layout->page_title 	= '';

		$this->layout->content 		= view('admin.pages.login.form');

		return $this->layout;
	}

	/**
	 * handle login
	 *
	 * @return void
	 * @author 
	 **/

	function postLogin()
	{
		$email 						= Input::get('email');
		$password 					= Input::get('password');

		$results 					= API::person()->authenticate($email, $password);

		$content 					= json_decode($results);

		if($content->meta->success)
		{
			Session::put('loggedUser', $content->data->id);

			return Redirect::intended(route('hr.dashboard.overview'));
		}
		
		return Redirect::back()->withErrors($content->meta->errors);
	}

	/**
	 * handle logout
	 *
	 * @return void
	 * @author 
	 **/

	function getLogout()
	{
		Session::flush();

		return Redirect::route('hr.login.get');
	}

}