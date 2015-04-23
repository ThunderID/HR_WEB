<?php namespace App\APIConnector\OUTENGINE;

use Session;

class APIOrganisationBranch {

	use APITrait;

	function index($page, $search, $sort, $all = false)
	{
		return self::runPost(self::$basic_url . 'organisations/branches/'.$page, ['search' => $search, 'sort' => $sort]);
	}

	function show($id, $department = null)
	{
		return self::runGet(self::$basic_url . 'organisations/branches/'.Session::get('user.organisation').'/show/'.$id.'/'.$department, ['id' => $id]);
	}

	function store($id, $attributes)
	{		
		return self::runPost(self::$basic_url . 'organisations/branches/store/data', ['id' => $id, 'attributes' => $attributes]);
	}

	function destroy($id)
	{
		return self::runGet(self::$basic_url . 'organisations/branches/'.Session::get('user.organisation').'/delete/'.$id, ['id' => $id]);
	}
}
