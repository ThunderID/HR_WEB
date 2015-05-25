<?php namespace App\APIConnector\INENGINE;

use Session;

class APIApplication {

	function authenticate($menuid, $personid, $chartid, $access)
	{
		$data = new \ThunderID\Chauth\Controllers\AuthenticationController;
		return $data->application($menuid, $personid, $chartid, $access);
	}

	function index($page, $search, $sort, $per_page = 12)
	{
		$data = new \ThunderID\Chauth\Controllers\ApplicationController;
		return $data->index($page, $search, $sort, $per_page);
	}

	function menuIndex($page, $search, $sort, $per_page = 12)
	{
		$data = new \ThunderID\Chauth\Controllers\MenuController;
		return $data->index($page, $search, $sort, $per_page);
	}

	function menuStore($id, $attributes)
	{		
		$data = new \ThunderID\Chauth\Controllers\MenuController;
		return $data->store($id, $attributes);
	}

	function menuDestroy($id)
	{
		$data = new \ThunderID\Chauth\Controllers\MenuController;
		return $data->authenticationDestroy($id);
	}
}
