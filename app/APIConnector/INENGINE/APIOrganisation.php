<?php namespace App\APIConnector\INENGINE;

use Session;

class APIOrganisation {

	function index($page, $search, $sort, $limit = 12)
	{
		$data = new \ThunderID\Organisation\Controllers\OrganisationController;
		return $data->index($page, $search, $sort, $limit);
	}

	function show($id, $search = [])
	{
		$search['id']			= $id;
		$data = new \ThunderID\Organisation\Controllers\OrganisationController;
		return $data->index(1, $search, [], 1);
	}

	function store($id, $attributes)
	{		
		$data = new \ThunderID\Organisation\Controllers\OrganisationController;
		return $data->store($id, $attributes);
	}

	function destroy($id)
	{
		$data = new \ThunderID\Organisation\Controllers\OrganisationController;
		return $data->destroy($id);
	}
}
