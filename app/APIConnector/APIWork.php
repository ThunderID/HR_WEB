<?php namespace App\APIConnector;

use Session;

class APIWork {

	use APITrait;

	function index($page, $search, $sort, $person_id)
	{
		return self::runPost(self::$basic_url . '/persons/show/'.$person_id.'/works/'.$page, ['search' => $search, 'sort' => $sort]);
	}
}
