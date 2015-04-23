<?php namespace App\APIConnector\OUTENGINE;

use Session;

class APIWidget {

	use APITrait;

	function store($id, $attributes)
	{
		return self::runPost(self::$basic_url . '/persons/'.Session::get('loggedUser').'/widgets/store/data', ['id' => $id, 'attributes' => $attributes]);
	}

	function destroy($id)
	{
		return self::runGet(self::$basic_url . '/persons/'.Session::get('loggedUser').'/widgets/delete/'.$id, ['id' => $id]);
	}
}
