<?php namespace App\APIConnector;

trait APITrait {

	static protected $basic_url = 'http://localhost:9200/';

	protected static function runGet($url, $data = [])
	{
		$curl 			= curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
		// curl_setopt($curl, CURLOPT_GET, true);

		$results 		= curl_exec($curl);
// print_r($results);exit;

		return $results;
	}

	protected static function runPost($url, $data = [])
	{
		$content 		= json_encode($data);

		$curl 			= curl_init($url);

		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

		$results 		= curl_exec($curl);
// print_r($results);exit;
		return $results;
	}

}