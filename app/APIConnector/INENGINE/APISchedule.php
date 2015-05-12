<?php namespace App\APIConnector\INENGINE;

use Session;

class APISchedule {

	function index($page, $search, $sort, $all)
	{
		$data = new \ThunderID\Schedule\Controllers\ScheduleController;
		return $data->index($page, $search, $sort, $all);
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
