<?php namespace App\APIConnector\INENGINE;

use Session;

class APICalendar {

	function index($page, $search, $sort, $per_page = 12)
	{
		$data = new \ThunderID\Schedule\Controllers\CalendarController;
		return $data->index($page, $search, $sort, $per_page = 12);
	}

	function show($id, $search = [])
	{
		$search['id']			= $id;
		$data = new \ThunderID\Schedule\Controllers\CalendarController;
		return $data->index(1, $search, [], 1);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Schedule\Controllers\CalendarController;
		return $data->store($id, $attributes);
	}

	function destroy($org_id, $id)
	{
		$data = new \ThunderID\Schedule\Controllers\CalendarController;
		return $data->destroy($org_id, $id);
	}

	function followIndex($page, $search, $sort, $all = false)
	{
		$data = new \ThunderID\Schedule\Controllers\CalendarController;
		return $data->followIndex($page, $search, $sort, $all = false);
	}

	function followdestroy($chart_id, $id)
	{
		$data = new \ThunderID\Schedule\Controllers\CalendarController;
		return $data->followDestroy($chart_id, $id);
	}
}
