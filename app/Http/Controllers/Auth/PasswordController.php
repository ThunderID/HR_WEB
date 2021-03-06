<?php namespace App\Http\Controllers\Auth;

use Input, Auth, \Illuminate\Support\MessageBag, Redirect, Config, Session, Validator;
use API;
use App\Http\Controllers\Controller;

class PasswordController extends Controller {

	protected $controller_name 		= 'password';

	/**
	 * handle logout
	 *
	 * @return void
	 * @author 
	 **/

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
		$email 						= Session::get('user.email');
		$password 					= Input::get('old_password');
		$input['person']			= Input::only('password', 'password_confirmation');
		$input['person']['id']		= Session::get('loggedUser');
		$input['organisation']['id']= Session::get('user.organisation');
		$validator 					= Validator::make($input['person'], ['password' => 'required|confirmed|min:8']);

		if (!$validator->passes())
		{
			return Redirect::back()->withErrors($validator->errors())->withInput();
		}

		$results 					= API::person()->authenticate($email, $password);

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


		return Redirect::back()->withInput()->withErrors($content->meta->errors);
	}
}