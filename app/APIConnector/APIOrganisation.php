<?php namespace App\APIConnector;

use Session;

class APIOrganisation {

	use APITrait;

	function authenticate($client, $secret)
	{
		return self::runPost(self::$basic_url . 'authentications/api', ['client' => $client, 'secret' => $secret]);
	}

	function check($id)
	{
		return self::runGet(self::$basic_url . 'authentications/organisation', ['id' => $id]);
	}

	function index($page, $search, $sort)
	{
		return self::runPost(self::$basic_url . 'organisations/'.$page, ['search' => $search, 'sort' => $sort]);
	}

	function show($id)
	{
		return self::runGet(self::$basic_url . 'organisations/show/'.$id, ['id' => $id]);
	}

	function store($id, $attributes)
	{
		return self::runPost(self::$basic_url . 'organisations/store/data', ['id' => $id, 'attributes' => $attributes]);
	}

	function destroy($id)
	{
		return self::runGet(self::$basic_url . 'organisations/delete/'.$id, ['id' => $id]);
	}
}
