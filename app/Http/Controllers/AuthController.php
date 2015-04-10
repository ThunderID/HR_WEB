<?php namespace App\Http\Controllers;

use Input, Auth, \Illuminate\Support\MessageBag, Redirect, Config, Session;
use App\APIConnector\API;

class AuthController extends AdminController {

	protected $controller_name 		= 'login';

	/**
	 * login form
	 *
	 * @return void
	 * @author 
	 **/
	function getLogin()
	{
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
		$username 					= Input::get('username');
		$password 					= Input::get('password');

		$results 					= API::person()->authenticate($username, $password);

		$content 					= json_decode($results);

		if($content->meta->success)
		{
			Session::put('loggedUser', $content->data->id);

			return Redirect::intended(route('hr.dashboard.overview'));
		}


		return Redirect::back()->withInput()->withError(json_decode(json_encode($content->meta->errors), true));
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