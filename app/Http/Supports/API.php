<?php namespace App\Http\Supports;

use Config;

class API 
{
	public static function checking($client, $secret)
	{
		if(strtolower($client)==strtolower(Config::get('client')) && strtolower($secret)==strtolower(Config::get('secret')))
		{
			return true;
		}
		return false;
	}
}