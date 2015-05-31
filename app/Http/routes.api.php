<?php

Route::group(['prefix' => 'api'], function(){
	
	Route::post('/presence', 					['as' => 'hr.api.presence.post', 		'uses' => '\ThunderID\Log\Controllers\PresenceController@store']);
	
	Route::post('/activity/logs', 				['as' => 'hr.api.logs.post', 			'uses' => '\ThunderID\Log\Controllers\LogController@store']);
	
	Route::post('/tracker/setting', 			['as' => 'hr.api.tracker.post', 		'uses' => 'Api\AuthController@tracker']);
	
	Route::post('/fp/setting', 					['as' => 'hr.api.fp.post', 				'uses' => 'Api\AuthController@fp']);
	
	Route::post('/fp/new/finger', 				['as' => 'hr.api.fp.enroll', 			'uses' => '\ThunderID\Finger\Controllers\FingerController@store']);
	
	Route::post('/fp/sync/finger', 				['as' => 'hr.api.fp.sync', 				'uses' => '\ThunderID\Finger\Controllers\FingerController@update']);

	Route::post('/fp/random/finger', 			['as' => 'hr.api.fp.random', 			'uses' => '\ThunderID\Finger\Controllers\FingerController@random']);
});

Route::get('test/presence', function()
{
	$api 										= new \App\APIConnector\OUTENGINE\API;
	$json										= '{"application":{"api":{"client":"123456789","secret":"123456789"}},"person":{"id":"1","email":"hr@thunderid.com"},"log":[["hr@thunderid.com","28-05-2015 15:04:01","pc"]]}';

	$new 										= json_decode($json);

	$input 										= json_decode(json_encode($new), true);
	
	return $api->runPost($api->basic_url . 'api/presence', $input);
});