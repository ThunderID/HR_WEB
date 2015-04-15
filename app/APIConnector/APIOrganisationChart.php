<?php namespace App\APIConnector;

use Session;

class APIOrganisationChart{

	use APITrait;

	function index($page, $search, $sort)
	{
		return self::runPost(self::$basic_url . '/organisations/branches/charts/'.$page, ['search' => $search, 'sort' => $sort]);
	}

	function show($branch_id, $id)
	{
		return self::runGet(self::$basic_url . '/organisations/branches/'.$branch_id.'/charts/show/'.$id, ['id' => $id]);
	}

	function store($id, $attributes)
	{		
		return self::runPost(self::$basic_url . '/organisations/branches/'.$id.'/charts/store/data', ['id' => $id, 'attributes' => $attributes]);
	}

	function destroy($branch_id, $id)
	{
		return self::runGet(self::$basic_url . '/organisations/branches/'.$branch_id.'/charts/delete/'.$id, ['id' => $id]);
	}
}
