<?php namespace App\APIConnector;

use Session;

class APIDocument {

	use APITrait;

	function index($page, $search, $sort)
	{
		return self::runPost(self::$basic_url . '/organisations/'.Session::get('user.organisation').'/documents/'.$page, ['search' => $search, 'sort' => $sort]);
	}

	function show($id)
	{
		return self::runGet(self::$basic_url .  '/organisations/'.Session::get('user.organisation').'/documents/show/'.$id, ['id' => $id]);
	}
}
