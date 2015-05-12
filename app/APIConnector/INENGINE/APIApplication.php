<?php namespace App\APIConnector\INENGINE;

use Session;

class APIApplication {

	function authenticate($menuid, $personid, $chartid)
	{
		$data = new \ThunderID\Chauth\Controllers\AuthController;
		return $data->application($menuid, $personid, $chartid);
	}
}
