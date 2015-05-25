<?php namespace App\APIConnector\INENGINE;

use Session;

class APISchedule {

	function index($page, $search, $sort, $per_page = 12)
	{
		$data = new \ThunderID\Schedule\Controllers\ScheduleController;
		return $data->index($page, $search, $sort, $per_page);
	}

	function show($id)
	{
		$data = new \ThunderID\Schedule\Controllers\ScheduleController;
		return $data->show(Session::get('user.organisation'), $id);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Schedule\Controllers\ScheduleController;
		return $data->store($id, $attributes);
	}

	function destroy($id)
	{
		$data = new \ThunderID\Schedule\Controllers\ScheduleController;
		return $data->destroy(Session::get('user.organisation'), $id);
	}
}
