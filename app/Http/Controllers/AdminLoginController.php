<?php namespace App\Http\Controllers;

use Input, Auth, \Illuminate\Support\MessageBag;

class AdminLoginController extends AdminController {

	/**
	 * login form
	 *
	 * @return void
	 * @author 
	 **/
	function getLogin()
	{
		$this->layout->content = view('admin.pages.login.form');
		return $this->layout;
	}

	/**
	 * handle login
	 *
	 * @return void
	 * @author 
	 **/
}