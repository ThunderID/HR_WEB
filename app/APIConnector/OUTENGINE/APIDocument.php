<?php namespace App\APIConnector\OUTENGINE;

use Session;

class APIDocument {

	use APITrait;

	function index($page, $search, $sort, $all = false)
	{
		return self::runPost(self::$basic_url . '/documents/'.$page, ['search' => $search, 'sort' => $sort, 'all' => $all]);
	}

	function show($id)
	{
		return self::runGet(self::$basic_url .  '/documents/show/'.Session::get('user.organisation').'/'.$id, ['organisation' => Session::get('user.organisation')]);
	}

	function store($id, $attributes)
	{		
		return self::runPost(self::$basic_url . 'documents/store/data/', ['id' => $id, 'attributes' => $attributes]);
	}

	function destroy($id)
	{
		return self::runGet(self::$basic_url . 'documents/delete/'.Session::get('user.organisation').'/'.$id, ['id' => $id]);
	}

	function personindex($page, $search, $sort, $all = false)
	{
		return self::runPost(self::$basic_url . '/documents/show/person/'.$page, ['search' => $search, 'sort' => $sort, 'all' => $all]);
	}

	function destroytemplate($id)
	{
		return self::runGet(self::$basic_url . 'documents/templates/delete/'.Session::get('user.organisation').'/'.$id, ['id' => $id]);
	}
}
