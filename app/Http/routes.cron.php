<?php

Route::group(['prefix' => 'cron'], function(){
	
	Route::get('/absence', 					['as' => 'hr.cron.absence.post', 		'uses' => '\ThunderID\Log\Controllers\AbsenceController@index']);
	
	//test route
	Route::get('/test/absence', 			['as' => 'hr.cron.absence.test', 		'uses' => '\ThunderID\Log\Controllers\AbsenceController@test']);
});