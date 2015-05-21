<?php namespace App\Http\Controllers\Api;

use App, Response, Input, API, Device;
use App\Http\Controllers\Controller;

class AuthController extends Controller {

	protected $controller_name 		= 'login';

	/**
	 * login form
	 *
	 * @return void
	 * @author 
	 **/
	function tracker()
	{
		$attributes 								= Input::only('application');
		if(!$attributes['application'])
		{
			return Response::json(['message' => 'Server Error'], 500);
		}

		$api 										= $attributes['application']['api'];
		$checking 									= Device::checking($api['client'], $api['secret']);
		if(!$checking)
		{
			return Response::json(['message' => 'Not Found'], 404);
		}

		$results 									= API::person()->authenticate($api['email'], $api['password']);

		$content 									= json_decode($results);

		if($content->meta->success)
		{
			$results 								= API::person()->check($content->data->id);

			$contents 								= json_decode($results);

			if(!$contents->meta->success || !count($contents->data->works))
			{
				return Response::json(['message' => 'Not Found'], 404);
			}

			$results 								= API::application()->authenticate($menuid=9, $personid = $content->data->id, $contents->data->works[0]->id);

			$contents 								= json_decode($results);

			if(!$contents->meta->success)
			{
				return Response::json(['message' => 'Not Found'], 404);
			}

			return Response::json(['message' => 'Sukses'], 200);
		}
		
		return Response::json(['message' => 'Not Found'], 404);
	}

	function fp()
	{
		$attributes 								= Input::only('application');
		if(!$attributes['application'])
		{
			return Response::json(['message' => 'Server Error'], 500);
		}

		$api 										= $attributes['application']['api'];
		$checking 									= Device::checking($api['client'], $api['secret']);
		if(!$checking)
		{
			return Response::json(['message' => 'Not Found'], 404);
		}

		$results 									= API::person()->authenticate($api['email'], $api['password']);

		$content 									= json_decode($results);

		if($content->meta->success)
		{
			$results 								= API::person()->check($content->data->id);

			$contents 								= json_decode($results);

			if(!$contents->meta->success || !count($contents->data->works))
			{
				return Response::json(['message' => 'Not Found'], 404);
			}

			$results 								= API::application()->authenticate($menuid=10, $personid = $content->data->id, $contents->data->works[0]->id);

			$contents 								= json_decode($results);

			if(!$contents->meta->success)
			{
				return Response::json(['message' => 'Not Found'], 404);
			}

			return Response::json(['message' => 'Sukses'], 200);
		}
		
		return Response::json(['message' => 'Not Found'], 404);
	}
}