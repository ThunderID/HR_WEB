<?php

Route::group(['prefix' => 'api'], function(){
	
	Route::post('/presence', 					['as' => 'hr.api.presence.post', 		'uses' => 'Api\PresenceController@store']);
	
	Route::post('/activity/logs', 				['as' => 'hr.api.logs.post', 			'uses' => 'Api\LogController@store']);

});

Route::get('test/presence', function()
{
	$api 										= new \App\APIConnector\OUTENGINE\API;
	$input['application'] 						= ['api' => ['client' => '123456789', 'secret' => '123456789']];
	$input['person'] 							= ['id' => 1, 'email' => 'hr@thunderid.com'];

	return $api->runPost($api->basic_url . 'api/presence', $input);
});

Route::get('test/activity/logs', function()
{
	$api 										= new \App\APIConnector\OUTENGINE\API;
	$input['application'] 						= ['api' => ['client' => '123456789', 'secret' => '123456789']];
	$input['person'] 							= ['id' => 1, 'email' => 'hr@thunderid.com'];
	$input['log'] 								= ['log'];

	return $api->runPost($api->basic_url . 'api/activity/logs', $input);
});
