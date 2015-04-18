<?php namespace App\APIConnector;

use Exception;

trait APITrait {

	static protected $basic_url = 'http://localhost:7200/';

	protected static function runGet($url, $data = [])
	{
		try
		{
			fsockopen('localhost', '7200', $errno, $errstr, 60);
		}
		catch (Exception $e) 
		{
			throw new Exception("Running API dulu gan!! di port 7200.. (Udah ada warnnya nih ©thunder)", 1);
		}

		$curl 			= curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
		// curl_setopt($curl, CURLOPT_GET, true);

		$results 		= curl_exec($curl);

		if(!json_decode($results))
		{
			print_r($results);
		}

		return $results;
	}

	protected static function runPost($url, $data = [])
	{
		try
		{
			fsockopen('localhost', '7200', $errno, $errstr, 60);
		}
		catch (Exception $e) 
		{
			throw new Exception("Running API dulu gan!! di port 7200.. (Udah ada warnnya nih ©thunder)", 1);
		}

		$content 		= json_encode($data);

		$curl 			= curl_init($url);

		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

		$results 		= curl_exec($curl);

		if(!json_decode($results))
		{
			print_r($results);
		}

		return $results;
	}

}