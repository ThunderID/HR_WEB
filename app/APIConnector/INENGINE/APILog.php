<?php namespace App\APIConnector\INENGINE;

use Session;

class APILog{

	function Index($page, $search, $sort, $per_page = 12)
	{
		$data = new \ThunderID\Log\Controllers\LogController;
		return $data->index($page, $search, $sort, $per_page);
	}
	
	function ProcessLogIndex($page, $search, $sort, $per_page = 12)
	{
		$data = new \ThunderID\Log\Controllers\ProcessLogController;
		return $data->index($page, $search, $sort, $per_page);
	}
}
