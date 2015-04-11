<?php namespace App\Http\Controllers;

use Input, Auth, \Illuminate\Support\MessageBag, Redirect, Config, Session, Validator;
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

	function getPassword()
	{
		$this->layout->page_title 	= '';

		$this->layout->content 		= view('admin.pages.password.form');

		return $this->layout;
	}

	/**
	 * handle login
	 *
	 * @return void
	 * @author 
	 **/

	function postPassword()
	{
		$username 					= Session::get('user.name');
		$password 					= Input::get('old_password');
		$input						= Input::only('password', 'password_confirmation');
		$validator 					= Validator::make($input, ['password' => 'required|confirmed|min:8']);

		if (!$validator->passes())
		{
			return Redirect::back()->withErrors($validator->errors())->withInput();
		}

		$results 					= API::person()->authenticate($username, $password);

		$content 					= json_decode($results);

		if($content->meta->success)
		{

			$results 				= API::person()->store(Session::get('loggedUser'), $input);

			$content 				= json_decode($results);

			if($content->meta->success)
			{
				return Redirect::route('hr.persons.index')->with('alert_success', 'Password telah diubah');
			}
			
			return Redirect::back()->withErrors($content->meta->errors)->withInput();
		}


		return Redirect::back()->withInput()->withError($content->meta->errors);
	}
}