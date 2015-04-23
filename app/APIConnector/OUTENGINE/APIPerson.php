<?php namespace App\APIConnector\OUTENGINE;

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

	function store($id, $attributes)
	{		
		return self::runPost(self::$basic_url . 'persons/store/data', ['id' => $id, 'attributes' => $attributes]);
	}
	
	function destroy($id)
	{
		return self::runGet(self::$basic_url . 'persons/delete/'.$id, ['id' => $id]);
	}

	function documentIndex($personid, $page, $search, $sort)
	{
		return self::runPost(self::$basic_url .  '/persons/'.$personid.'/documents/'.$page, ['search' => $search, 'sort' => $sort]);
	}

	function documentShow($personid,$id)
	{
		return self::runGet(self::$basic_url . '/persons/'.$personid.'/documents/show/'.$id, ['id' => $id]);
	}

	function documentDestroy($personid,$id)
	{
		return self::runGet(self::$basic_url . '/persons/'.$personid.'/documents/delete/'.$id, ['id' => $id]);
	}

	function relativeDestroy($personid, $id)
	{
		return self::runGet(self::$basic_url . '/persons/'.$personid.'/relatives/delete/'.$id, ['id' => $id]);
	}

	function workIndex($personid, $page, $search, $sort)
	{
		return self::runPost(self::$basic_url .  '/persons/'.$personid.'/works/'.$page, ['search' => $search, 'sort' => $sort]);
	}

	function workShow($personid,$id)
	{
		return self::runGet(self::$basic_url . '/persons/'.$personid.'/works/show/'.$id, ['id' => $id]);
	}
}
