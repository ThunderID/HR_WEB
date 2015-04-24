<?php namespace App\APIConnector\INENGINE;

use Session;

class APIApplication {

	function authenticate($menu, $access, $personid, $apps)
	{
		$data = new \ThunderID\Chauth\Controllers\AuthController;
		return $data->application($menu, $access, $personid, $apps);
	}
}
