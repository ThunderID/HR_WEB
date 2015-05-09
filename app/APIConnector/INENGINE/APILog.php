<?php namespace App\APIConnector\INENGINE;

use Session;

class APILog{

	function ProcessLogIndex($page, $search, $sort, $all = false)
	{
		$data = new \ThunderID\Log\Controllers\ProcessLogController;
		return $data->index($page, $search, $sort, $all = false);
	}
}
