<?php namespace App\APIConnector\INENGINE;

use Session;

class APIApi{

	function index($page, $search, $sort, $per_page = 12)
	{
		$data = new \ThunderID\Chauth\Controllers\ApiController;
		return $data->index($page, $search, $sort, $per_page);
	}

	function show($id, $search = [])
	{
		$search['id']			= $id;
		$data = new \ThunderID\Chauth\Controllers\ApiController;
		return $data->index(1, $search, [], 1);
	}

	function store($id, $attributes)
	{		
		$search['id']				= $attributes['branch']['id'];
		$search['organisationid']	= $attributes['organisation']['id'];
		$data 						= new \ThunderID\Organisation\Controllers\BranchController;
		$results 					= $data->index(1, $search, [], 1);
		$contents 					= json_decode($results);

		if (!$contents->meta->success)
		{
			return $results;
		}
		$data = new \ThunderID\Chauth\Controllers\ApiController;
		return $data->store($id, $attributes);
	}

	function destroy($org_id, $branchid, $id)
	{
		$search['id']				= $branchid;
		$search['organisationid']	= $org_id;
		$data 						= new \ThunderID\Organisation\Controllers\BranchController;
		$results 					= $data->index(1, $search, [], 1);
		$contents 					= json_decode($results);

		if (!$contents->meta->success)
		{
			return $results;
		}

		$data = new \ThunderID\Chauth\Controllers\ApiController;
		return $data->delete($id);
	}
}
