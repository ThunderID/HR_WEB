<?php namespace App\APIConnector\INENGINE;

use Session;

class APICalendar {

	function index($page, $search, $sort, $all = false)
	{
		$data = new \ThunderID\Schedule\Controllers\CalenderController;
		return $data->index($page, $search, $sort, $all = false);
	}

	function show($id)
	{
		$data = new \ThunderID\Schedule\Controllers\CalenderController;
		return $data->show(Session::get('user.organisation'), $id);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Schedule\Controllers\CalenderController;
		return $data->store($id, $attributes);
	}

	function destroy($id)
	{
		$data = new \ThunderID\Schedule\Controllers\CalenderController;
		return $data->destroy(Session::get('user.organisation'), $id);
	}

	function followIndex($page, $search, $sort, $all = false)
	{
		$data = new \ThunderID\Schedule\Controllers\CalenderController;
		return $data->followIndex($page, $search, $sort, $all = false);
	}
}
