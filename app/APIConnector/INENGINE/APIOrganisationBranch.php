<?php namespace App\APIConnector\INENGINE;

use Session;

class APIOrganisationBranch {

	function index($page, $search, $sort, $all = false)
	{
		$data = new \ThunderID\Organisation\Controllers\BranchController;
		return $data->index($page, $search, $sort, $all = false);

		return self::runPost(self::$basic_url . 'organisations/branches/'.$page, ['search' => $search, 'sort' => $sort]);
	}

	function show($id, $department = null)
	{
		$data = new \ThunderID\Organisation\Controllers\BranchController;
		return $data->show(Session::get('user.organisation'), $id, $department);

		return self::runGet(self::$basic_url . 'organisations/branches/'.Session::get('user.organisation').'/show/'.$id.'/'.$department, ['id' => $id]);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Organisation\Controllers\BranchController;
		return $data->store($id, $attributes);

		return self::runPost(self::$basic_url . 'organisations/branches/store/data', ['id' => $id, 'attributes' => $attributes]);
	}

	function destroy($id)
	{
		$data = new \ThunderID\Organisation\Controllers\BranchController;
		return $data->destroy(Session::get('user.organisation'), $id);

		return self::runGet(self::$basic_url . 'organisations/branches/'.Session::get('user.organisation').'/delete/'.$id, ['id' => $id]);
	}
}
