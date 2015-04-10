<?php namespace App\APIConnector;

use Session;

class APIOrganisationBranch {

	use APITrait;

	function index($page, $search, $sort)
	{
		return self::runPost(self::$basic_url . 'organisations/branches/'.$page, ['search' => $search, 'sort' => $sort]);
	}

	function show($id)
	{
		return self::runGet(self::$basic_url . 'organisations/branches/'.Session::get('user.organisation').'/show/'.$id, ['id' => $id]);
	}

	function store($id, $attributes)
	{		
		return self::runPost(self::$basic_url . 'organisations/branches/store/data', ['id' => $id, 'attributes' => $attributes]);
	}
}
