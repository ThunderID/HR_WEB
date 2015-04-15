<?php namespace App\APIConnector;

use Session;

class APIOrganisationChart{

	use APITrait;

	function store($id, $attributes)
	{		
		return self::runPost(self::$basic_url . '/organisations/branches/'.$id.'/charts/store/data', ['id' => $id, 'attributes' => $attributes]);
	}

	// function show($id)
	// {
	// 	return self::runGet(self::$basic_url . 'organisations/branches/'.Session::get('user.organisation').'/show/'.$id, ['id' => $id]);
	// }

	// function store($id, $attributes)
	// {		
	// 	return self::runPost(self::$basic_url . 'organisations/branches/store/data', ['id' => $id, 'attributes' => $attributes]);
	// }

	// function destroy($id)
	// {
	// 	return self::runGet(self::$basic_url . 'organisations/branches/'.Session::get('user.organisation').'/delete/'.$id, ['id' => $id]);
	// }
}
