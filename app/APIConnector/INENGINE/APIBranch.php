<?php namespace App\APIConnector\INENGINE;

use Session;

class APIBranch {

	function index($page, $search, $sort, $all = false)
	{
		$data = new \ThunderID\Organisation\Controllers\BranchController;
		return $data->index($page, $search, $sort, 12);
	}

	function show($id, $search = [])
	{
		$search['id']		= $id;
		$data = new \ThunderID\Organisation\Controllers\BranchController;
		return $data->index(1, $search, [], 1);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Organisation\Controllers\BranchController;
		return $data->store($id, $attributes);
	}

	function destroy($org_id, $id)
	{
		$data = new \ThunderID\Organisation\Controllers\BranchController;
		return $data->destroy($org_id, $id);
	}

	function contactIndex($page, $search, $sort, $per_page = 12)
	{
		$data = new \ThunderID\Contact\Controllers\ContactController;
		return $data->index($page, $search, $sort, $per_page);
	}
	
	function contactDestroy($org_id, $branchid, $id)
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

		$data = new \ThunderID\Contact\Controllers\ContactController;
		return $data->delete($id);
	}
}
