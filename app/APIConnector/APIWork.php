<?php namespace App\APIConnector;

use Session;

class APIWork {

	use APITrait;

	function index($page, $search, $sort, $person_id)
	{
		$a = self::runPost(self::$basic_url . '/persons/show/'.$person_id.'/works/'.$page, ['search' => $search, 'sort' => $sort]);
		print_r($a);exit;
	}

	function show($id)
	{
		return self::runGet(self::$basic_url .  '/organisations/'.Session::get('user.organisation').'/documents/show/'.$id, ['id' => $id]);
	}
}
