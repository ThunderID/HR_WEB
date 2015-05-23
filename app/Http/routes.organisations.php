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
							'uses' 	=> 'Organisation\Branch\BranchController@getIndex', 
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

	Route::group(['prefix' => '/branches', 'before' => 'hr_acl'], function(){
		Route::get('{org_id?}/{page?}', 
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

		Route::post('store', 
						[
							'uses' 	=> 'Organisation\Branch\BranchController@postStore', 
							'as' 	=> 'hr.organisation.branches.store'
						]
					);

		Route::get('show/{id}', 
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
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Organisation\Branch\BranchController@anyDelete', 
							'as' 	=> 'hr.organisation.branches.delete'
						]
					);	
	});


	/* ---------------------------------------------------------------------------- END ORGANISATION BRANCH ----------------------------------------------------------------------------*/


	/* ---------------------------------------------------------------------------- DOCUMENT ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'documents', 'before' => 'hr_acl'], function(){
		Route::get('{org_id?}/{page?}', 
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
	

	/* ---------------------------------------------------------------------------- SCHEDULE ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'calendars', 'before' => 'hr_acl'], function(){
		Route::get('{org_id?}/{page?}', 
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

		Route::get('show/{id}/{page?}', 
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
		Route::get('{org_id?}/{page?}', 
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
	