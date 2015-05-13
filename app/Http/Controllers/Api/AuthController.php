<?php namespace App\Http\Controllers\Api;

use App, Response, Input;
use App\Http\Controllers\Controller;

class AuthController extends Controller {

	protected $controller_name 		= 'login';

	/**
	 * login form
	 *
	 * @return void
	 * @author 
	 **/
	function store()
	{
		$attributes 								= Input::only('application');
		if(!$attributes['application'])
		{
			return Response::json(['message' => 'Server Error'], 500);
		}

		$api 										= $attributes['application']['api'];
		if($api['client']!='123456789' || $api['secret']!='123456789')
		{
			return Response::json(['message' => 'Not Found'], 404);
		}

		if($api['username']!='admin' || $api['password']!='123456789')
		{
			return Response::json(['message' => 'Not Found'], 404);
		}

		return Response::json(['message' => 'Sukses'], 200);
	}
}