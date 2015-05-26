<?php

	/* ---------------------------------------------------------------------------- ORGANISATION ---------------------------------------------------------------------------*/

Route::group(['prefix' => 'cms'], function(){
	Route::group(['prefix' => 'organisations', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'Organisation\OrganisationController@getIndex', 
							'as' 	=> 'hr.organisations.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Organisation\OrganisationController@getCreate', 
							'as' 	=> 'hr.organisations.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'Organisation\OrganisationController@postStore', 
							'as' 	=> 'hr.organisations.store'
						]
					);

		Route::get('show/{id}/{page?}', 
						[
							'uses' 	=> 'Organisation\OrganisationController@getShow', 
							'as' 	=> 'hr.organisations.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Organisation\OrganisationController@getEdit', 
							'as' 	=> 'hr.organisations.edit'
						]
					);
		Route::post('update/{id}', 
						[
							'uses' 	=> 'Organisation\OrganisationController@postUpdate', 
							'as' 	=> 'hr.organisations.update'
						]
					);	
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Organisation\OrganisationController@anyDelete', 
							'as' 	=> 'hr.organisations.delete'
						]
					);	

		Route::any('default/active', 
						[
							'uses' 	=> 'Organisation\OrganisationController@anyDefault', 
							'as' 	=> 'hr.organisations.default'
						]
					);	
	});

	/* ---------------------------------------------------------------------------- ORGANISATION ----------------------------------------------------------------------------*/


	/* ---------------------------------------------------------------------------- ORGANISATION BRANCH ----------------------------------------------------------------------------*/

	Route::group(['prefix' => 'organisation/branches', 'before' => 'hr_acl'], function(){
		Route::get('/{page?}', 
						[
							'uses' 	=> 'Organisation\Branch\BranchController@getIndex', 
							'as' 	=> 'hr.organisation.branches.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Organisation\Branch\BranchController@getCreate', 
							'as' 	=> 'hr.organisation.branches.create'
						]
					);

		Route::post('store/{org_id?}', 
						[
							'uses' 	=> 'Organisation\Branch\BranchController@postStore', 
							'as' 	=> 'hr.organisation.branches.store'
						]
					);

		Route::get('show/{id}/{page?}', 
						[
							'uses' 	=> 'Organisation\Branch\BranchController@getShow', 
							'as' 	=> 'hr.organisation.branches.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Organisation\Branch\BranchController@getEdit', 
							'as' 	=> 'hr.organisation.branches.edit'
						]
					);
		Route::post('update/{id}', 
						[
							'uses' 	=> 'Organisation\Branch\BranchController@postUpdate', 
							'as' 	=> 'hr.organisation.branches.update'
						]
					);	
		Route::any('delete/{id}/', 
						[
							'uses' 	=> 'Organisation\Branch\BranchController@anyDelete', 
							'as' 	=> 'hr.organisation.branches.delete'
						]
					);	
	});


	/* ---------------------------------------------------------------------------- END ORGANISATION BRANCH ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- SCHEDULE ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'organisation/calendars', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'Organisation\Calendar\CalendarController@getIndex', 
							'as' 	=> 'hr.organisation.calendars.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Organisation\Calendar\CalendarController@getCreate', 
							'as' 	=> 'hr.organisation.calendars.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'Organisation\Calendar\CalendarController@postStore', 
							'as' 	=> 'hr.organisation.calendars.store'
						]
					);

		Route::get('show/{id}', 
						[
							'uses' 	=> 'Organisation\Calendar\CalendarController@getShow', 
							'as' 	=> 'hr.organisation.calendars.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Organisation\Calendar\CalendarController@getEdit', 
							'as' 	=> 'hr.organisation.calendars.edit'
						]
					);
		Route::post('update/{id}', 
						[
							'uses' 	=> 'Organisation\Calendar\CalendarController@postUpdate', 
							'as' 	=> 'hr.organisation.calendars.update'
						]
					);
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Organisation\Calendar\CalendarController@anyDelete', 
							'as' 	=> 'hr.organisation.calendars.delete'
						]
					);
		Route::any('schedules/list/{id}/{page?}',
						[
							'uses' 	=> 'Organisation\Calendar\CalendarController@ajaxSchedule',
							'as' 	=> 'hr.schedule.list'
						]
					);
	});
	
	/* ---------------------------------------------------------------------------- WORKLEAVE ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'workleaves', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'Organisation\Workleave\WorkleaveController@getIndex', 
							'as' 	=> 'hr.organisation.workleaves.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Organisation\Workleave\WorkleaveController@getCreate', 
							'as' 	=> 'hr.organisation.workleaves.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'Organisation\Workleave\WorkleaveController@postStore', 
							'as' 	=> 'hr.organisation.workleaves.store'
						]
					);

		Route::get('show/{id}/{page?}', 
						[
							'uses' 	=> 'Organisation\Workleave\WorkleaveController@getShow', 
							'as' 	=> 'hr.organisation.workleaves.show'
						]
					);

		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Organisation\Workleave\WorkleaveController@getEdit', 
							'as' 	=> 'hr.organisation.workleaves.edit'
						]
					);

		Route::post('update/{id}', 
						[
							'uses' 	=> 'Organisation\Workleave\WorkleaveController@postUpdate', 
							'as' 	=> 'hr.organisation.workleaves.update'
						]
					);
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Organisation\Workleave\WorkleaveController@anyDelete', 
							'as' 	=> 'hr.organisation.workleaves.delete'
						]
					);
	});

	/* ---------------------------------------------------------------------------- END OF WORKLEAVE ----------------------------------------------------------------------------*/
});
	
	/* ---------------------------------------------------------------------------- DOCUMENT ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'organisation/documents', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'Organisation\Document\DocumentController@getIndex', 
							'as' 	=> 'hr.organisation.documents.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Organisation\Document\DocumentController@getCreate', 
							'as' 	=> 'hr.organisation.documents.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'Organisation\Document\DocumentController@postStore', 
							'as' 	=> 'hr.organisation.documents.store'
						]
					);

		Route::get('show/{id}', 
						[
							'uses' 	=> 'Organisation\Document\DocumentController@getShow', 
							'as' 	=> 'hr.organisation.documents.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Organisation\Document\DocumentController@getEdit', 
							'as' 	=> 'hr.organisation.documents.edit'
						]
					);
		Route::post('update/{id}', 
						[
							'uses' 	=> 'Organisation\Document\DocumentController@postUpdate', 
							'as' 	=> 'hr.organisation.documents.update'
						]
					);
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Organisation\Document\DocumentController@anyDelete', 
							'as' 	=> 'hr.organisation.documents.delete'
						]
					);
	});

	Route::group(['prefix' => 'documents/templates', 'before' => 'hr_acl'], function(){
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Organisation\Document\DocumentController@anyTemplateDelete', 
							'as' 	=> 'hr.document.templates.delete'
						]
					);
	});

	Route::group(['prefix' => 'documents/persons/', 'before' => 'hr_acl'], function(){
		Route::get('{id}/{page?}', 
						[
							'uses' 	=> 'Organisation\Document\DocumentController@getShow', 
							'as' 	=> 'hr.document.persons.index'
						]
					);
	});

	/* ---------------------------------------------------------------------------- END OF DOCUMENT ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ORGANISATION BRANCH ----------------------------------------------------------------------------*/

	Route::group(['prefix' => 'branch/charts', 'before' => 'hr_acl'], function(){
		Route::get('/{page?}', 
						[
							'uses' 	=> 'Organisation\Branch\ChartController@getIndex', 
							'as' 	=> 'hr.branches.charts.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Organisation\Branch\ChartController@getCreate', 
							'as' 	=> 'hr.branches.charts.create'
						]
					);

		Route::post('store/{branch_id?}', 
						[
							'uses' 	=> 'Organisation\Branch\ChartController@postStore', 
							'as' 	=> 'hr.branches.charts.store'
						]
					);

		Route::get('show/{id}/', 
						[
							'uses' 	=> 'Organisation\Branch\ChartController@getShow', 
							'as' 	=> 'hr.branches.charts.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Organisation\Branch\ChartController@getEdit', 
							'as' 	=> 'hr.branches.charts.edit'
						]
					);
		Route::post('update/{branch_id?}/{id}', 
						[
							'uses' 	=> 'Organisation\Branch\ChartController@postUpdate', 
							'as' 	=> 'hr.branches.charts.update'
						]
					);	
		Route::any('delete/{id}/', 
						[
							'uses' 	=> 'Organisation\Branch\ChartController@anyDelete', 
							'as' 	=> 'hr.branches.charts.delete'
						]
					);	
	});

	Route::group(['prefix' => 'branches/contacts', 'before' => 'hr_acl'], function(){
		Route::post('show/{branch_id}/store', 
						[
							'uses' 	=> 'Organisation\Branch\ContactController@postStore', 
							'as' 	=> 'hr.branches.contacts.store'
						]
					);
		Route::any('delete/{branch_id}', 
						[
							'uses' 	=> 'Organisation\Branch\ContactController@anyDelete', 
							'as' 	=> 'hr.branches.contacts.delete'
						]
					);
	});

	/* ---------------------------------------------------------------------------- END ORGANISATION BRANCH ----------------------------------------------------------------------------*/

	Route::group(['prefix' => 'calendars/schedules/', 'before' => 'hr_acl'], function(){
		Route::post('store/{id}', 
						[
							'uses' 	=> 'Organisation\Calendar\ScheduleController@postStore', 
							'as' 	=> 'hr.calendars.schedules.store'
						]
					);
	});

	Route::group(['prefix' => 'calendars/charts/', 'before' => 'hr_acl'], function(){
		Route::post('store/{id}', 
						[
							'uses' 	=> 'Organisation\Calendar\CalendarController@postStoreChart', 
							'as' 	=> 'hr.calendars.charts.store'
						]
					);
	});

	Route::group(['prefix' => 'workleaves/charts/', 'before' => 'hr_acl'], function(){
		Route::post('store/{wl_id}', 
						[
							'uses' 	=> 'Organisation\Workleave\WorkleaveController@postPerson', 
							'as' 	=> 'hr.workleaves.persons.store'
						]
					);
	});


	Route::group(['prefix' => 'documents/templates', 'before' => 'hr_acl'], function(){
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Organisation\Document\DocumentController@anyTemplateDelete', 
							'as' 	=> 'hr.document.templates.delete'
						]
					);
	});

	Route::group(['prefix' => 'charts/authentications', 'before' => 'hr_acl'], function(){
		Route::any('store', 
						[
							'uses' 	=> 'Organisation\Branch\ChartController@anyStore', 
							'as' 	=> 'hr.charts.authentications.store'
						]
					);
	});

		/* ---------------------------------------------------------------------------- ORGANISATION BRANCH ----------------------------------------------------------------------------*/

	Route::group(['prefix' => 'branch/apis', 'before' => 'hr_acl'], function(){
		Route::get('/{page?}', 
						[
							'uses' 	=> 'Organisation\Branch\ApiController@getIndex', 
							'as' 	=> 'hr.branches.apis.index'
						]
					);

		Route::get('create/new/{branch_id?}', 
						[
							'uses' 	=> 'Organisation\Branch\ApiController@getCreate', 
							'as' 	=> 'hr.branches.apis.create'
						]
					);

		Route::post('store/{branch_id?}', 
						[
							'uses' 	=> 'Organisation\Branch\ApiController@postStore', 
							'as' 	=> 'hr.branches.apis.store'
						]
					);

		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Organisation\Branch\ApiController@getEdit', 
							'as' 	=> 'hr.branches.apis.edit'
						]
					);
		Route::post('update/{branch_id?}/{id}', 
						[
							'uses' 	=> 'Organisation\Branch\ApiController@postUpdate', 
							'as' 	=> 'hr.branches.apis.update'
						]
					);	
		Route::any('delete/{id}/', 
						[
							'uses' 	=> 'Organisation\Branch\ApiController@anyDelete', 
							'as' 	=> 'hr.branches.apis.delete'
						]
					);	
	});

	Route::group(['prefix' => 'branches/finger', 'before' => 'hr_acl'], function(){
		Route::get('show/{branch_id}', 
						[
							'uses' 	=> 'Organisation\Branch\FingerController@getShow', 
							'as' 	=> 'hr.branches.finger.show'
						]
					);
		Route::any('store/{branch_id}', 
						[
							'uses' 	=> 'Organisation\Branch\FingerController@anyStore', 
							'as' 	=> 'hr.branches.finger.store'
						]
					);
	});
