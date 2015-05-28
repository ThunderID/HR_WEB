<?php

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

		Route::any('show/{person_id}/works/delete/{id}', 
						[
							'uses' 	=> 'Person\WorkController@anyDelete', 
							'as' 	=> 'hr.persons.works.delete'
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
