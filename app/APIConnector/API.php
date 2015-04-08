<?php namespace App\APIConnector;

use Session;

class API {

	use APITrait;

	static function person()
	{
		return new APIPerson();
	}
}