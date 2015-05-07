<?php namespace App\APIConnector\INENGINE;

use Session;

class APIWorkleave {

	function index($page, $search, $sort, $all = false)
	{
		$data = new \ThunderID\Workleave\Controllers\WorkleaveController;
		return $data->index($page, $search, $sort, $all = false);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Workleave\Controllers\WorkleaveController;
		return $data->store($id, $attributes);
	}
}