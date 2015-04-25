<?php namespace App\APIConnector\INENGINE;

use Session;

class APIOrganisationBranch {

	function index($page, $search, $sort, $all = false)
	{
		$data = new \ThunderID\Organisation\Controllers\BranchController;
		return $data->index($page, $search, $sort, $all = false);
	}

	function show($id, $department = null)
	{
		$data = new \ThunderID\Organisation\Controllers\BranchController;
		return $data->show(Session::get('user.organisation'), $id, $department);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Organisation\Controllers\BranchController;
		return $data->store($id, $attributes);
	}

	function destroy($id)
	{
		$data = new \ThunderID\Organisation\Controllers\BranchController;
		return $data->destroy(Session::get('user.organisation'), $id);
	}

	function contactIndex($page, $search, $sort, $all = false)
	{
		$data = new \ThunderID\Contact\Controllers\ContactController;
		return $data->index($page, $search, $sort, $all = false);
	}

}
