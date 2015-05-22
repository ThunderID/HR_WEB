<?php namespace App\APIConnector\INENGINE;

use Session;

class APIOrganisation {

	function index($page, $search, $sort, $all)
	{
		$data = new \ThunderID\Organisation\Controllers\OrganisationController;
		return $data->index($page, $search, $sort, $all);
	}

	function show($id)
	{
		$data = new \ThunderID\Organisation\Controllers\OrganisationController;
		return $data->show($id);
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
