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
	
	/* ---------------------------------------------------------------------------- BEGIN APPLICATIONS ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'authentications', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'Application\AuthenticationController@getIndex', 
							'as' 	=> 'hr.authentications.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Application\AuthenticationController@getCreate', 
							'as' 	=> 'hr.authentications.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'Application\AuthenticationController@postStore', 
							'as' 	=> 'hr.authentications.store'
						]
					);

		Route::get('show/{id}', 
						[
							'uses' 	=> 'Application\AuthenticationController@getShow', 
							'as' 	=> 'hr.authentications.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Application\AuthenticationController@getEdit', 
							'as' 	=> 'hr.authentications.edit'
						]
					);		
		Route::post('update/{id}', 
						[
							'uses' 	=> 'Application\AuthenticationController@postUpdate', 
							'as' 	=> 'hr.authentications.update'
						]
					);	
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Application\AuthenticationController@anyDelete', 
							'as' 	=> 'hr.authentications.delete'
						]
					);	
	});

	/* ---------------------------------------------------------------------------- END OF APPLICATIONS ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- ORGANISATION BRANCH ----------------------------------------------------------------------------*/

	Route::group(['prefix' => 'branches', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'Branch\BranchController@getIndex', 
							'as' 	=> 'hr.organisation.branches.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Branch\BranchController@getCreate', 
							'as' 	=> 'hr.organisation.branches.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'Branch\BranchController@postStore', 
							'as' 	=> 'hr.organisation.branches.store'
						]
					);

		Route::get('show/{id}', 
						[
							'uses' 	=> 'Branch\BranchController@getShow', 
							'as' 	=> 'hr.organisation.branches.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Branch\BranchController@getEdit', 
							'as' 	=> 'hr.organisation.branches.edit'
						]
					);
		Route::post('update/{id}', 
						[
							'uses' 	=> 'Branch\BranchController@postUpdate', 
							'as' 	=> 'hr.organisation.branches.update'
						]
					);	
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Branch\BranchController@anyDelete', 
							'as' 	=> 'hr.organisation.branches.delete'
						]
					);	

	/* ---------------------------------------------------------------------------- BRANCH CONTACTS----------------------------------------------------------------------------*/
		Route::get('show/{branch_id}/contacts/{page?}', 
						[
							'uses' 	=> 'Branch\ContactController@getIndex', 
							'as' 	=> 'hr.branches.contacts.index'
						]
					);
		Route::get('show/{branch_id}/contacts/show/{id}', 
						[
							'uses' 	=> 'Branch\ContactController@getShow', 
							'as' 	=> 'hr.branches.contacts.show'
						]
					);
		Route::post('show/{branch_id}/contacts/store', 
						[
							'uses' 	=> 'Branch\ContactController@postStore', 
							'as' 	=> 'hr.branches.contacts.store'
						]
					);

		Route::any('show/{branch_id}/contacts/delete/{id}', 
						[
							'uses' 	=> 'Branch\ContactController@anyDelete', 
							'as' 	=> 'hr.branches.contacts.delete'
						]
					);
	/* ---------------------------------------------------------------------------- END BRANCH CONTACTS----------------------------------------------------------------------------*/
	});


	/* ---------------------------------------------------------------------------- END ORGANISATION BRANCH ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- ORGANISATION CHART ----------------------------------------------------------------------------*/

	Route::group(['prefix' => 'charts', 'before' => 'hr_acl'], function(){
		Route::get('branch/{branch_id}/create/', 
						[
							'uses' 	=> 'Branch\ChartController@getCreate', 
							'as' 	=> 'hr.organisation.charts.create'
						]
					);	
		Route::post('branch/{branch_id}/store/', 
						[
							'uses' 	=> 'Branch\ChartController@postStore', 
							'as' 	=> 'hr.organisation.charts.store'
						]
					);
		Route::get('branch/{branch_id}/show/{id}/{page?}', 
						[
							'uses' 	=> 'Branch\ChartController@getShow', 
							'as' 	=> 'hr.organisation.charts.show'
						]
					);
		Route::get('branch/{branch_id}/edit/{id}', 
						[
							'uses' 	=> 'Branch\ChartController@getEdit', 
							'as' 	=> 'hr.organisation.charts.edit'
						]
					);
		Route::post('branch/{branch_id}/update/{id}', 
						[
							'uses' 	=> 'Branch\ChartController@postUpdate', 
							'as' 	=> 'hr.organisation.charts.update'
						]
					);
		Route::any('branch/{branch_id}/destroy/{id}', 
						[
							'uses' 	=> 'Branch\ChartController@anyDelete', 
							'as' 	=> 'hr.organisation.charts.delete'
						]
					);
	});

	/* ---------------------------------------------------------------------------- END ORGANISATION CHART ----------------------------------------------------------------------------*/


	/* ---------------------------------------------------------------------------- DOCUMENT ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'documents', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'Branch\DocumentController@getIndex', 
							'as' 	=> 'hr.documents.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Branch\DocumentController@getCreate', 
							'as' 	=> 'hr.documents.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'Branch\DocumentController@postStore', 
							'as' 	=> 'hr.documents.store'
						]
					);

		Route::get('show/{id}', 
						[
							'uses' 	=> 'Branch\DocumentController@getShow', 
							'as' 	=> 'hr.documents.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Branch\DocumentController@getEdit', 
							'as' 	=> 'hr.documents.edit'
						]
					);
		Route::post('update/{id}', 
						[
							'uses' 	=> 'Branch\DocumentController@postUpdate', 
							'as' 	=> 'hr.documents.update'
						]
					);
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Branch\DocumentController@anyDelete', 
							'as' 	=> 'hr.documents.delete'
						]
					);
	});

	Route::group(['prefix' => 'documents/templates', 'before' => 'hr_acl'], function(){
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Branch\DocumentController@anyTemplateDelete', 
							'as' 	=> 'hr.document.templates.delete'
						]
					);
	});

	Route::group(['prefix' => 'documents/persons/', 'before' => 'hr_acl'], function(){
		Route::get('{id}/{page?}', 
						[
							'uses' 	=> 'Branch\DocumentController@getShow', 
							'as' 	=> 'hr.document.persons.index'
						]
					);
	});

	/* ---------------------------------------------------------------------------- END OF DOCUMENT ----------------------------------------------------------------------------*/
	

	/* ---------------------------------------------------------------------------- SCHEDULE ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'calendars', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'Schedule\CalendarController@getIndex', 
							'as' 	=> 'hr.calendars.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Schedule\CalendarController@getCreate', 
							'as' 	=> 'hr.calendars.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'Schedule\CalendarController@postStore', 
							'as' 	=> 'hr.calendars.store'
						]
					);

		Route::get('show/{id}/{page?}', 
						[
							'uses' 	=> 'Schedule\CalendarController@getShow', 
							'as' 	=> 'hr.calendars.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Schedule\CalendarController@getEdit', 
							'as' 	=> 'hr.calendars.edit'
						]
					);
		Route::post('update/{id}', 
						[
							'uses' 	=> 'Schedule\CalendarController@postUpdate', 
							'as' 	=> 'hr.calendars.update'
						]
					);
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Schedule\CalendarController@anyDelete', 
							'as' 	=> 'hr.calendars.delete'
						]
					);
		Route::any('schedules/list/{id}/{page?}',
						[
							'uses' 	=> 'Schedule\CalendarController@ajaxSchedule',
							'as' 	=> 'hr.schedule.list'
						]
					);
	});

	Route::group(['prefix' => 'calendars/schedules/', 'before' => 'hr_acl'], function(){
		Route::post('store/{cal_id}', 
						[
							'uses' 	=> 'Schedule\ScheduleController@postStore', 
							'as' 	=> 'hr.calendars.schedules.store'
						]
					);
	});

	Route::group(['prefix' => 'calendars/persons/', 'before' => 'hr_acl'], function(){
		Route::post('store/{cal_id}', 
						[
							'uses' 	=> 'Schedule\CalendarController@postStorePerson', 
							'as' 	=> 'hr.calendars.persons.store'
						]
					);
	});

	Route::group(['prefix' => 'calendars/charts/', 'before' => 'hr_acl'], function(){
		Route::post('store/{cal_id}', 
						[
							'uses' 	=> 'Schedule\CalendarController@postStoreChart', 
							'as' 	=> 'hr.calendars.charts.store'
						]
					);
	});

	/* ---------------------------------------------------------------------------- END OF SCHEDULE ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- WORKLEAVE ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'workleaves', 'before' => ''], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'Schedule\WorkleaveController@getIndex', 
							'as' 	=> 'hr.workleaves.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Schedule\WorkleaveController@getCreate', 
							'as' 	=> 'hr.workleaves.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'Schedule\WorkleaveController@postStore', 
							'as' 	=> 'hr.workleaves.store'
						]
					);

		Route::get('show/{id}/{page?}', 
						[
							'uses' 	=> 'Schedule\WorkleaveController@getShow', 
							'as' 	=> 'hr.workleaves.show'
						]
					);

		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Schedule\WorkleaveController@getEdit', 
							'as' 	=> 'hr.workleaves.edit'
						]
					);

		Route::post('update/{id}', 
						[
							'uses' 	=> 'Schedule\WorkleaveController@postUpdate', 
							'as' 	=> 'hr.workleaves.update'
						]
					);
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Schedule\WorkleaveController@anyDelete', 
							'as' 	=> 'hr.workleaves.delete'
						]
					);
	});

	/* ---------------------------------------------------------------------------- END OF WORKLEAVE ----------------------------------------------------------------------------*/
	


	/* ---------------------------------------------------------------------------- PERSON ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'persons', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'Person\PersonController@getIndex', 
							'as' 	=> 'hr.persons.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Person\PersonController@getCreate', 
							'as' 	=> 'hr.persons.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'Person\PersonController@postStore', 
							'as' 	=> 'hr.persons.store'
						]
					);

		Route::get('show/{id}', 
						[
							'uses' 	=> 'Person\PersonController@getShow', 
							'as' 	=> 'hr.persons.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Person\PersonController@getEdit', 
							'as' 	=> 'hr.persons.edit'
						]
					);		

		Route::post('update/{id}', 
						[
							'uses' 	=> 'Person\PersonController@postUpdate', 
							'as' 	=> 'hr.persons.update'
						]
					);	

		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Person\PersonController@anyDelete', 
							'as' 	=> 'hr.persons.delete'
						]
					);	

		/* ---------------------------------------------------------------------------- PERSON RELATIVES----------------------------------------------------------------------------*/

		Route::get('show/{person_id}/relatives/{page?}', 
						[
							'uses' 	=> 'Person\RelativeController@getIndex', 
							'as' 	=> 'hr.persons.relatives.index'
						]
					);
		Route::get('show/{person_id}/relatives/show/{id}', 
						[
							'uses' 	=> 'Person\RelativeController@getShow', 
							'as' 	=> 'hr.persons.relatives.show'
						]
					);
		Route::post('show/{person_id}/relatives/store', 
						[
							'uses' 	=> 'Person\RelativeController@postStore', 
							'as' 	=> 'hr.persons.relatives.store'
						]
					);

		Route::any('show/{person_id}/relatives/delete/{id}', 
					[
						'uses' 	=> 'Person\RelativeController@anyDelete', 
						'as' 	=> 'hr.persons.relatives.delete'
					]
				);

		/* ---------------------------------------------------------------------------- END PERSON RELATIVES----------------------------------------------------------------------------*/
	
		/* ---------------------------------------------------------------------------- PERSON DOCUMENTS----------------------------------------------------------------------------*/
		Route::get('show/{person_id}/documents/{page?}', 
						[
							'uses' 	=> 'Person\DocumentController@getIndex', 
							'as' 	=> 'hr.persons.documents.index'
						]
					);
		Route::get('show/{person_id}/documents/show/{id}', 
						[
							'uses' 	=> 'Person\DocumentController@getShow', 
							'as' 	=> 'hr.persons.documents.show'
						]
					);
		Route::post('show/{person_id}/documents/store', 
						[
							'uses' 	=> 'Person\DocumentController@postStore', 
							'as' 	=> 'hr.persons.documents.store'
						]
					);

		Route::any('show/{person_id}/documents/delete/{id}', 
						[
							'uses' 	=> 'Person\DocumentController@anyDelete', 
							'as' 	=> 'hr.persons.documents.delete'
						]
					);
		Route::get('show/{person_id}/documents/print/{id}', 
						[
							'uses' 	=> 'Person\DocumentController@getPrint', 
							'as' 	=> 'hr.persons.documents.print'
						]
					);
		Route::get('show/{person_id}/documents/pdf/{id}', 
						[
							'uses' 	=> 'Person\DocumentController@getPDF', 
							'as' 	=> 'hr.persons.documents.pdf'
						]
					);
		/* ---------------------------------------------------------------------------- END PERSON DOCUMENTS----------------------------------------------------------------------------*/
	
		/* ---------------------------------------------------------------------------- PERSON WORKS----------------------------------------------------------------------------*/
		Route::get('show/{person_id}/works/{page?}', 
						[
							'uses' 	=> 'Person\WorkController@getIndex', 
							'as' 	=> 'hr.persons.works.index'
						]
					);

		Route::post('{person_id}/works/store/', 
						[
							'uses' 	=> 'Person\WorkController@postStore', 
							'as' 	=> 'hr.persons.works.store'
						]
					);

		Route::get('show/{person_id}/works/edit/{id}', 
						[
							'uses' 	=> 'Person\WorkController@getEdit', 
							'as' 	=> 'hr.persons.works.edit'
						]
					);
		
		Route::post('show/{person_id}/works/update/{id}', 
						[
							'uses' 	=> 'Person\WorkController@postUpdate', 
							'as' 	=> 'hr.persons.works.update'
						]
					);
		/* ---------------------------------------------------------------------------- END PERSON WORKS----------------------------------------------------------------------------*/

		/* ---------------------------------------------------------------------------- PERSON CONTACTS----------------------------------------------------------------------------*/
		Route::get('show/{person_id}/contacts/{page?}', 
						[
							'uses' 	=> 'Person\ContactController@getIndex', 
							'as' 	=> 'hr.persons.contacts.index'
						]
					);

		Route::post('{person_id}/contacts/store/', 
						[
							'uses' 	=> 'Person\ContactController@postStore', 
							'as' 	=> 'hr.persons.contacts.store'
						]
					);

		Route::get('show/{person_id}/contacts/edit/{id}', 
						[
							'uses' 	=> 'Person\ContactController@getEdit', 
							'as' 	=> 'hr.persons.contacts.edit'
						]
					);
		
		Route::post('show/{person_id}/contacts/update/{id}', 
						[
							'uses' 	=> 'Person\ContactController@postUpdate', 
							'as' 	=> 'hr.persons.contacts.update'
						]
					);
		/* ---------------------------------------------------------------------------- END PERSON CONTACTS----------------------------------------------------------------------------*/

		/* ---------------------------------------------------------------------------- PERSON SCHEDULES----------------------------------------------------------------------------*/
		Route::get('show/{person_id}/schedules/{page?}', 
						[
							'uses' 	=> 'Person\ScheduleController@getIndex', 
							'as' 	=> 'hr.persons.schedules.index'
						]
					);

		Route::post('{person_id}/schedules/store/', 
						[
							'uses' 	=> 'Person\ScheduleController@postStore', 
							'as' 	=> 'hr.persons.schedules.store'
						]
					);
		
		Route::any('show/{person_id}/schedules/delete/{id}', 
						[
							'uses' 	=> 'Person\ScheduleController@anyDelete', 
							'as' 	=> 'hr.persons.schedules.delete'
						]
					);

		Route::any('show/{person_id}/schedules/{page?}/list',
						[
							'uses'	=> 'Person\ScheduleController@ajaxSchedulePerson',
							'as'	=> 'hr.schedule.person.list'
						]
					);
		/* ---------------------------------------------------------------------------- END PERSON SCHEDULES----------------------------------------------------------------------------*/

		/* ---------------------------------------------------------------------------- PERSON WORKLEAVES ----------------------------------------------------------------------------*/
		Route::get('show/{person_id}/workleaves/{page?}', 
						[
							'uses' 	=> 'Person\WorkleaveController@getIndex', 
							'as' 	=> 'hr.persons.workleaves.index'
						]
					);

		Route::post('{person_id}/workleaves/store/', 
						[
							'uses' 	=> 'Person\WorkleaveController@postStore', 
							'as' 	=> 'hr.persons.workleaves.store'
						]
					);
		
		Route::any('show/{person_id}/workleaves/delete/{id}', 
						[
							'uses' 	=> 'Person\WorkleaveController@anyDelete', 
							'as' 	=> 'hr.persons.workleaves.delete'
						]
					);

		/* ---------------------------------------------------------------------------- END PERSON WORKLEAVES ----------------------------------------------------------------------------*/
	});
	/* ---------------------------------------------------------------------------- END PERSON ----------------------------------------------------------------------------*/

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

		Route::get('/attendance/csv/{page}', 				[	'as' 	=> 'hr.report.attendance.csv', 		'uses' 	=> 'ReportController@getAttendanceCSV']);
		
		Route::get('/attendance/generate/detail/person',	[	'as' 	=> 'hr.report.attendance.detail', 	'uses' 	=> 'ReportController@detailAttendance']);

		Route::get('/performance', 							[	'as' 	=> 'hr.report.performance.get', 	'uses' 	=> 'ReportController@getForm']);
		
		Route::get('/performance/generate/{page}', 			[	'as' 	=> 'hr.report.performance.post', 	'uses' 	=> 'ReportController@getPerformance']);

		Route::get('/wages', 								[	'as' 	=> 'hr.report.wages.get', 			'uses' 	=> 'ReportController@getForm']);
	
		Route::get('/wages/generate/{page}', 				[	'as' 	=> 'hr.report.wages.post', 			'uses' 	=> 'ReportController@getWages']);

		Route::get('/wages/csv/{page}', 					[	'as' 	=> 'hr.report.wages.csv', 			'uses' 	=> 'ReportController@getWagesCSV']);

	});

	/* ---------------------------------------------------------------------------- END REPORT ----------------------------------------------------------------------------*/
	

	/* ---------------------------------------------------------------------------- AJAX ----------------------------------------------------------------------------*/
	
	Route::get('names/search', 								[	'as'	=> 'hr.ajax.name', 		'uses' => 'AjaxController@searchName']);

	Route::get('company/search', 							[	'as' 	=> 'hr.ajax.company', 	'uses' => 'AjaxController@searchCompany']);
	
	Route::get('workleave/search', 							[	'as' 	=> 'hr.ajax.workleave', 'uses' => 'AjaxController@searchWorkleave']);
	
	Route::get('follow/search', 							[	'as'	=> 'hr.ajax.follow', 	'uses' => 'AjaxController@searchFollow']);

	Route::any('/image/upload', 							[	'as' 	=> 'hr.images.upload',	'uses' => 'GalleryController@upload']);

	Route::get('chart/search/{id}/{parent?}',				[	'as' 	=> 'hr.ajax.chart',		'uses' => 'AjaxController@searchChart']);
	
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

Route::get('/tes', function(){
	$days 			= (new DateTime('- 3 days'));
 print_r($days->format('Y-m-d'));
});

