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
}
