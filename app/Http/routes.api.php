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