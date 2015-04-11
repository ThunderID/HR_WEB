<?php namespace App\APIConnector;

use Session;

class APIPerson {

	use APITrait;

	function authenticate($username, $password)
	{
		return self::runPost(self::$basic_url . 'authentications/user', ['username' => $username, 'password' => $password]);
	}

	function check($id)
	{
		return self::runPost(self::$basic_url . 'authentications/person', ['id' => $id]);
	}

	function index($page, $search, $sort)
	{
		return self::runPost(self::$basic_url . 'persons/'.$page, ['search' => $search, 'sort' => $sort]);
	}

	function show($id)
	{
		return self::runGet(self::$basic_url . 'persons/show/'.$id, ['id' => $id]);
	}

	function destroy($id)
	{
		return self::runGet(self::$basic_url . 'persons/delete/'.$id, ['id' => $id]);
	}
}
