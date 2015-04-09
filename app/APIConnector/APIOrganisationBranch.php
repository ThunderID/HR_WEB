<?php namespace App\APIConnector;

use Session;

class APIOrganisationBranch {

	use APITrait;

	function index($page, $search, $sort)
	{
		return self::runPost(self::$basic_url . 'organisations/show/'.Session::get('user.organisation').'/branches/'.$page, ['search' => $search, 'sort' => $sort]);
	}

	function show($id)
	{
		return self::runGet(self::$basic_url . 'organisations/show/'.Session::get('user.organisation').'/branches/show/'.$id, ['id' => $id]);
	}
}
