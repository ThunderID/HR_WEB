<?php namespace App\Http\Controllers\Auth;

use Input, Route, \Illuminate\Support\MessageBag, Redirect, Config, Session, Validator;
use Device, API;
use App\Http\Controllers\Controller;

class DevicesController extends Controller {

	protected $controller_name 		= 'devices';

	/**
	 * device form
	 *
	 * @return void
	 * @author 
	 **/
	function getEdit($message = null)
	{
		$client 					= Config::get('client');
		$secret 					= Config::get('secret');
		
		$this->layout->page_title 	= 'Device Set Up';

		$this->layout->content 		= view('admin.pages.devices.form', compact('client', 'secret'));

		if(!is_null($message))
		{
			$this->layout->content 	= view('admin.pages.devices.form', compact('client', 'secret'))->with('alert_success', $message);
		}

		return $this->layout;
	}

	/**
	 * handle update
	 *
	 * @return void
	 * @author 
	 **/

	function postUpdate()
	{
		$email 						= Session::get('user.email');
		$password 					= Input::get('password');

		$results 					= API::person()->authenticate($email, $password);

		$content 					= json_decode($results);

		if($content->meta->success)
		{
			$client 				= Config::get('client');
			$secret 				= Input::get('old_secret');

			$checking 				= Device::checking($client, $secret);
			if(!$checking)
			{
				return Redirect::back()->withErrors(['Secret lama tidak valid']);
			}

			$validator 				= Validator::make(Input::all(), ['secret' => 'required|confirmed|min:8']);
			if (!$validator->passes())
			{
				return Redirect::back()->withErrors($validator->errors())->withInput();
			}

			$device					= $this->generateConfig(Input::get('client'), Input::get('secret'));

			$filename				= app_path('Http/config.php');

			$fh						= fopen($filename, 'w'); 

			fwrite($fh, $device); 
			fclose($fh);

			return $this->getEdit('Pengaturan Client dan Secret Sudah Berubah');
		}
		
		return Redirect::back()->withErrors($content->meta->errors);
	}

	function generateConfig($client, $secret)
	{
		return "<?php
		
	Config::set('client', '$client');
	Config::set('secret', '$secret');";
	}
}