<?php namespace App\Http\Controllers\Api;

use Input, Auth, \Illuminate\Support\MessageBag, Response, Config, Session, Validator;
use API;
use App\Http\Controllers\Controller;

class PresenceController extends Controller {

	protected $controller_name 		= 'presence';

	/**
	 * login form
	 *
	 * @return void
	 * @author 
	 **/
	public function store()
	{
		if(!Input::has('application'))
		{
			return Response::json(['message' => 'Server Error'], 500);
		}

		$api 										= Input::get('application')['api'];
		if($api['client']!='123456789' || $api['secret']!='123456789')
		{
			return Response::json(['message' => 'Server Error'], 500);
		}
		if(!Input::has('person'))
		{
			return Response::json(['message' => 'Server Error'], 500);
		}

		$person 									= Input::get('person');
		if(!isset($person['id']))
		{
			return Response::json(['message' => 'Server Error'], 500);
		}

		$results 									= API::person()->check($person['id']);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(['message' => 'Server Error'], 500);
		}

		return $results;
	}
}