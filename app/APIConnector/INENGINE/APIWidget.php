<?php namespace App\APIConnector\INENGINE;

use Session;

class APIWidget {

	function store($id, $attributes)
	{
		$data = new \ThunderID\Person\Controllers\WidgetController;
		return $data->store($id, $attributes);
	}

	function destroy($id)
	{
		$data = new \ThunderID\Person\Controllers\WidgetController;
		return $data->destroy(Session::get('loggedUser'), $id);
	}
}
