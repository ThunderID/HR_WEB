<?php

Route::group(['prefix' => 'api'], function(){
	
	Route::post('/presence', 					['as' => 'hr.api.presence.post', 		'uses' => '\ThunderID\Log\Controllers\PresenceController@store']);
	
	Route::post('/activity/logs', 				['as' => 'hr.api.logs.post', 			'uses' => '\ThunderID\Log\Controllers\LogController@store']);
	
	Route::post('/tracker/setting', 			['as' => 'hr.api.tracker.post', 		'uses' => 'Api\AuthController@tracker']);
	
	Route::post('/fp/setting', 					['as' => 'hr.api.fp.post', 		'uses' => 'Api\AuthController@fp']);

});


Route::get('test/tracker', function()
{
	$api 										= new \App\APIConnector\OUTENGINE\API;
	$input['application'] 						= ['api' => ['client' => '123456789', 'secret' => '123456789', 'email' => 'hr@thunderid.com', 'password' => 'admin']];

	return $api->runPost($api->basic_url . 'api/tracker/setting/', $input);
});


Route::get('test/presence', function()
{
	$api 										= new \App\APIConnector\OUTENGINE\API;
	$input['application'] 						= ['api' => ['client' => '123456789', 'secret' => '123456789']];

	return $api->runPost($api->basic_url . 'api/presence', $input);
});

Route::get('test/activity/logs', function()
{
	$api 										= new \App\APIConnector\OUTENGINE\API;
	$input['application'] 						= ['api' => ['client' => '123456789', 'secret' => '123456789']];
	$input['log'] 								= 
													[
														['hr@thunderid.com', 'SessionUnlock', '04/05/2015 14:08:05', 'RED_SCARLET'],
														['hr@thunderid.com', 'SessionLock', '04/05/2015 14:08:03', 'RED_SCARLET'],
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
