<?php

Route::group(['prefix' => 'api'], function(){
	
	Route::post('/presence', 					['as' => 'hr.api.presence.post', 		'uses' => '\ThunderID\Log\Controllers\PresenceController@store']);
	
	Route::post('/activity/logs', 				['as' => 'hr.api.logs.post', 			'uses' => '\ThunderID\Log\Controllers\LogController@store']);
	
	Route::post('/tracker/setting', 			['as' => 'hr.api.tracker.post', 		'uses' => 'Api\AuthController@tracker']);
	
	Route::post('/fp/setting', 					['as' => 'hr.api.fp.post', 				'uses' => 'Api\AuthController@fp']);
	
	Route::post('/fp/new/finger', 				['as' => 'hr.api.fp.enroll', 			'uses' => '\ThunderID\Finger\Controllers\FingerController@store']);

});

Route::get('test/tracker', function()
{
	$api 										= new \App\APIConnector\OUTENGINE\API;
	$input['application'] 						= ['api' => ['client' => '123456789', 'secret' => '123456789', 'email' => 'hr@thunderid.com', 'password' => 'admin']];

	return $api->runPost($api->basic_url . 'api/tracker/setting/', $input);
});

Route::get('test/finger', function()
{
	$api 										= new \App\APIConnector\OUTENGINE\API;

	$json										= '{"application":{"api":{"client":"123456789","secret":"123456789"}},"person":{"id":"1","email":"hr@thunderid.com"},"template":[["hr@thunderisd.com","1","1","1","","","","","","",""]]}';

	$new 										= json_decode($json);

	$input 										= json_decode(json_encode($new), true);
	
	return $api->runPost($api->basic_url . 'api/fp/new/finger', $input);
});


Route::get('test/presence', function()
{
	$api 										= new \App\APIConnector\OUTENGINE\API;
	$json										= '{"application":{"api":{"client":"123456789","secret":"123456789"}},"person":{"id":"1","email":"hr@thunderid.com"},"log":[["hr@thunderid.com","03-24-2015 15:04:01","pc"],["hr@thunderid.com","03-24-2015 15:04:27","pc"],["hr@thunderid.com","03-24-2015 15:04:34","pc"],["hr@thdsdsunderid.com","03-24-2015 03:04:44","pc"],["hr@thunderid.com","03-24-2015 03:13:42","pc"],["hr@thunderid.com","03-24-2015 16:40:10","pc"],["hr@thunderid.com","03-24-2015 16:40:38","pc"],["hr@thunderid.com","03-24-2015 16:42:45","pc"],["hr@thunderid.com","03-24-2015 17:03:02","pc"],["hr@thunderid.com","03-24-2015 05:04:59","pc"],["hr@thunderid.com","03-24-2015 17:05:15","pc"],["hr@thunderid.com","03-24-2015 17:05:20","pc"],["hr@thunderid.com","03-24-2015 17:05:27","pc"],["hr@thunderid.com","03-24-2015 17:06:11","pc"],["hr@thunderid.com","03-24-2015 17:06:12","pc"],["hr@thunderid.com","03-24-2015 17:06:13","pc"],["hr@thunderid.com","03-24-2015 17:06:14","pc"],["hr@thunderid.com","03-24-2015 17:06:17","pc"],["hr@thunderid.com","03-24-2015 17:06:24","pc"],["hr@thunderid.com","03-24-2015 17:08:02","pc"]]}';

	$new 										= json_decode($json);

	$input 										= json_decode(json_encode($new), true);
	
	return $api->runPost($api->basic_url . 'api/presence', $input);
});

Route::get('test/activity/logs', function()
{
	$api 										= new \App\APIConnector\OUTENGINE\API;
	$input['application'] 						= ['api' => ['client' => '123456789', 'secret' => '123456789']];
	$input['log'] 								= 
													[
														['hr@thunderid.com', 'SessionUnlock', '04/05/2015 14:08:05', 'RED_SCARLET'],
														['hr@ddd.com', 'SessionLock', '04/05/2015 14:08:03', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogon', '04/05/2015 14:07:59', 'RED_SCARLET'],
														['hr@thunderid.com', 'UnknownSessionEnd', '04/05/2015 14:07:59', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogon', '04/05/2015 14:02:49', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogout', '04/03/2015 12:17:39', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogout', '04/04/2015 12:17:35', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionUnlock', '04/04/2015 12:14:26', 'RED_SCARLET'],
														['hr@thunderid.com', 'ConsoleConnect', '04/04/2015 12:14:26', 'RED_SCARLET'],
														['hr@thunderid.com', 'ConsoleDisconnect', '04/04/2015 12:14:17', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogon', '04/04/2015 12:14:05', 'RED_SCARLET'],
														['hr@thunderid.com', 'ConsoleDisconnect', '04/04/2015 12:13:39', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLock', '04/04/2015 12:13:37', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogon', '04/04/2015 12:13:32', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogout', '04/04/2015 11:56:42', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogout', '04/04/2015 11:56:42', 'RED_SCARLET'],
														['hr@thunderid.com', 'ConsoleDisconnect', '04/04/2015 11:56:38', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLock', '04/04/2015 11:56:35', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogon', '04/04/2015 11:56:34', 'RED_SCARLET'],
														['hr@thunderid.com', 'ConsoleDisconnect', '04/04/2015 11:55:53', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogon', '04/04/2015 11:55:48', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogout', '04/04/2015 11:53:13', 'RED_SCARLET'],
														['hr@thunderid.com', 'ConsoleDisconnect', '04/04/2015 11:53:08', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLock', '04/04/2015 11:53:04', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionUnlock', '04/04/2015 11:52:33', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLock', '04/04/2015 11:52:30', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogon', '04/04/2015 11:52:17', 'RED_SCARLET'],
														['hr@thunderid.com', 'UnknownSessionEnd', '04/04/2015 11:52:17', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogon', '04/02/2015 11:06:13', 'RED_SCARLET'],
														['hr@thunderid.com', 'UnknownSessionEnd', '04/02/2015 11:06:13', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLogon', '04/02/2015 11:06:06', 'RED_SCARLET']
													];

	return $api->runPost($api->basic_url . 'api/activity/logs', $input);
});
