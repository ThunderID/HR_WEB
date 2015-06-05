<?php

Route::get('/', function(){
	return Redirect::route('hr.login.get');
});
Route::group(['prefix' => 'cms'], function(){


	Route::get('/login', 				['as' => 'hr.login.get', 		'uses' => 'Auth\AuthController@getLogin']);

	Route::post('/login', 				['as' => 'hr.login.post', 		'uses' => 'Auth\AuthController@postLogin']);

	Route::get('/logout',				['as' => 'hr.logout.get', 		'uses' => 'Auth\AuthController@getLogout']);

	/* ---------------------------------------------------------------------------- PRIVATE AREA ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'password', 'before' => 'hr_acl'], function(){
	
		Route::get('/', 				['as' => 'hr.password.get', 	'uses' => 'Auth\PasswordController@getPassword']);

		Route::post('/', 				['as' => 'hr.password.post', 	'uses' => 'Auth\PasswordController@postPassword']);
	});

	/* ---------------------------------------------------------------------------- END OF PRIVATE AREA ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- SETTING AREA ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'devices', 'before' => 'hr_acl'], function(){
	
		Route::get('/', 				['as' => 'hr.devices.edit', 	'uses' => 'Auth\DevicesController@getEdit']);

		Route::post('/', 				['as' => 'hr.devices.update', 	'uses' => 'Auth\DevicesController@postUpdate']);
	});

	Route::group(['prefix' => 'fingers', 'before' => 'hr_acl'], function(){
	
		Route::get('/', 				['as' => 'hr.fingers.edit', 	'uses' => 'Auth\FingersController@getEdit']);

		Route::post('/', 				['as' => 'hr.fingers.update', 	'uses' => 'Auth\FingersController@postUpdate']);
	});
	/* ---------------------------------------------------------------------------- END OF SETTING AREA ----------------------------------------------------------------------------*/


	/* ---------------------------------------------------------------------------- BEGIN DASHBOARD ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'dashboard', 'before' => 'hr_acl'], function(){

		Route::get('/overview', 							[	'as' 	=> 'hr.dashboard.overview', 		'uses' 	=> 'DashboardController@getOverview']);

		Route::any('/overview/widgets/delete/{id}', 		[	'as' 	=> 'hr.dashboard.widgets.delete', 	'uses' 	=> 'DashboardController@destroyWidget']);
		
		Route::post('/overview/widgets/store', 				[	'as' 	=> 'hr.dashboard.widgets.store', 	'uses' 	=> 'DashboardController@storeWidget']);
	});

	/* ---------------------------------------------------------------------------- END DASHBOARD ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- BEGIN REPORT ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'report', 'before' => 'hr_acl'], function(){

		Route::get('/attendance', 							[	'as' 	=> 'hr.report.attendance.get', 		'uses' 	=> 'ReportController@getForm']);
		
		Route::get('/attendance/generate/{page}', 			[	'as' 	=> 'hr.report.attendance.post', 	'uses' 	=> 'ReportController@getAttendance']);

		Route::get('/attendance/generate/detail/{id}',		[	'as' 	=> 'hr.report.attendance.detail', 	'uses' 	=> 'ReportController@detailAttendance']);
	
		Route::get('/attendance/generate/log/{id}',			[	'as' 	=> 'hr.report.attendance.log', 		'uses' 	=> 'ReportController@detailLog']);
		
		Route::get('/attendance/csv/{page}', 				[	'as' 	=> 'hr.report.attendance.csv', 		'uses' 	=> 'ReportController@getAttendanceCSV']);
		
		Route::get('/attendance/csv/detail/{id}', 			[	'as' 	=> 'hr.report.attendance.csvd', 	'uses' 	=> 'ReportController@DetailAttendanceCSV']);

		Route::get('/performance', 							[	'as' 	=> 'hr.report.performance.get', 	'uses' 	=> 'ReportController@getForm']);
		
		Route::get('/performance/generate/{page}', 			[	'as' 	=> 'hr.report.performance.post', 	'uses' 	=> 'ReportController@getPerformance']);

		Route::get('/wages', 								[	'as' 	=> 'hr.report.wages.get', 			'uses' 	=> 'ReportController@getForm']);
	
		Route::get('/wages/generate/{page}', 				[	'as' 	=> 'hr.report.wages.post', 			'uses' 	=> 'ReportController@getWages']);

		Route::get('/wages/csv/{page}', 					[	'as' 	=> 'hr.report.wages.csv', 			'uses' 	=> 'ReportController@getWagesCSV']);

	});

	/* ---------------------------------------------------------------------------- END REPORT ----------------------------------------------------------------------------*/
	

	/* ---------------------------------------------------------------------------- AJAX ----------------------------------------------------------------------------*/
	
	Route::group(['prefix' => 'ajax', 'before' => 'hr_acl'], function(){
		Route::get('names/search', 								[	'as'	=> 'hr.ajax.name', 		'uses' => 'AjaxController@searchName']);

		Route::get('company/search', 							[	'as' 	=> 'hr.ajax.company', 	'uses' => 'AjaxController@searchCompany']);

		Route::get('calendar/search', 							[	'as' 	=> 'hr.ajax.calendar', 	'uses' => 'AjaxController@searchCalendar']);
		
		Route::get('workleave/search', 							[	'as' 	=> 'hr.ajax.workleave', 'uses' => 'AjaxController@searchWorkleave']);
		
		Route::get('follow/search', 							[	'as'	=> 'hr.ajax.follow', 	'uses' => 'AjaxController@searchFollow']);

		Route::any('/image/upload', 							[	'as' 	=> 'hr.images.upload',	'uses' => 'GalleryController@upload']);

		Route::get('chart/search/{id}/{parent?}',				[	'as' 	=> 'hr.ajax.chart',		'uses' => 'AjaxController@searchChart']);
	});
	/* ---------------------------------------------------------------------------- END AJAX ----------------------------------------------------------------------------*/
});

Blade::extend(function ($value, $compiler)
{
	$pattern = $compiler->createMatcher('date_indo');
	$replace = '<?php echo date("d-m-Y", strtotime($2)); ?>';

	return preg_replace($pattern, '$1'.$replace, $value);
});

Blade::extend(function ($value, $compiler)
{
	$pattern = $compiler->createMatcher('time_indo');
	$replace = '<?php echo date("H:i", strtotime($2)); ?>';

	return preg_replace($pattern, '$1'.$replace, $value);
});

Blade::extend(function ($value, $compiler)
{
	$pattern = $compiler->createMatcher('uppercase');
	$replace = '<?php echo strtoupper($2); ?>';

	return preg_replace($pattern, '$1'.$replace, $value);
});

Blade::extend(function ($value, $compiler)
{
	$pattern = $compiler->createMatcher('ucwords');
	$replace = '<?php echo ucwords($2); ?>';

	return preg_replace($pattern, '$1'.$replace, $value);
});

Blade::extend(function ($value, $compiler)
{
	$pattern = $compiler->createMatcher('replace_delimiter');
	$replace = '<?php echo ucwords(str_replace("_", " ", $2)); ?>';
	
	return preg_replace($pattern, '$1'.$replace, $value);
});	

Blade::extend(function ($value, $compiler)
{
	$pattern = $compiler->createMatcher('date');
	$replace = '<?php echo date("d F Y", strtotime($2)); ?>';
	
	return preg_replace($pattern, '$1'.$replace, $value);
});	
