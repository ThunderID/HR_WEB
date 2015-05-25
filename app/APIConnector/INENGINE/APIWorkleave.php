<?php namespace App\APIConnector\INENGINE;

use Session;

class APIWorkleave {

	function index($page, $search, $sort, $per_page = 12)
	{
		$data = new \ThunderID\Workleave\Controllers\WorkleaveController;
		return $data->index($page, $search, $sort);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Workleave\Controllers\WorkleaveController;
		return $data->store($id, $attributes);
	}

	function show($id, $search = [])
	{		
		$search['id']			= $id;
		$data = new \ThunderID\Workleave\Controllers\WorkleaveController;
		return $data->index(1, $search, [], 1);
	}

	function destroy($org_id, $id)
	{
		$data = new \ThunderID\Workleave\Controllers\WorkleaveController;
		return $data->destroy($org_id, $id);
	}

	function personStore($id, $attributes)
	{		
		$data = new \ThunderID\Workleave\Controllers\WorkleaveController;
		return $data->store($id, $attributes);
	}
}
