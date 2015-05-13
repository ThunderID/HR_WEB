<?php namespace App\APIConnector\INENGINE;

use Session;

class APIChart{

	function index($page, $search, $sort, $all = false)
	{
		$data = new \ThunderID\Organisation\Controllers\ChartController;
		return $data->index($page, $search, $sort, $all = false);
	}

	function show($branch_id, $id)
	{
		$data = new \ThunderID\Organisation\Controllers\ChartController;
		return $data->show($branch_id, $id);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Organisation\Controllers\ChartController;
		return $data->store($id, $attributes);
	}

	function destroy($branch_id, $id)
	{
		$data = new \ThunderID\Organisation\Controllers\ChartController;
		return $data->destroy($branch_id, $id);
	}
}
