<?php

Route::get('/', function(){
	return Redirect::route('hr.login.get');
});
Route::group(['prefix' => 'cms'], function(){


	Route::get('/login', 				['as' => 'hr.login.get', 	'uses' => 'AuthController@getLogin']);
	Route::post('/login', 				['as' => 'hr.login.post', 	'uses' => 'AuthController@postLogin']);

	Route::get('/logout',				['as' => 'hr.logout.get', 	'uses' => 'AuthController@getLogout']);

	Route::any('/upload', 				['as' => 'hr.images.upload',	'uses' => 'GalleryController@upload']);
	/* ---------------------------------------------------------------------------- PRIVATE AREA ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'password', 'before' => 'hr_acl'], function(){
		Route::get('/', 				['as' => 'hr.password.get', 	'uses' => 'AuthController@getPassword']);

		Route::post('/', 				['as' => 'hr.password.post', 	'uses' => 'AuthController@postPassword']);
	});
	/* ---------------------------------------------------------------------------- END OF PRIVATE AREA ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- DEVELOPER AREA ----------------------------------------------------------------------------*/
	//Organisation
	Route::group(['prefix' => 'organisations', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'OrganisationController@getIndex', 
							'as' 	=> 'hr.organisations.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'OrganisationController@getCreate', 
							'as' 	=> 'hr.organisations.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'OrganisationController@postStore', 
							'as' 	=> 'hr.organisations.store'
						]
					);

		Route::get('show/{id}', 
						[
							'uses' 	=> 'OrganisationController@getShow', 
							'as' 	=> 'hr.organisations.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'OrganisationController@getEdit', 
							'as' 	=> 'hr.organisations.edit'
						]
					);		
		Route::post('update/{id}', 
						[
							'uses' 	=> 'OrganisationController@postUpdate', 
							'as' 	=> 'hr.organisations.update'
						]
					);	
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'OrganisationController@anyDelete', 
							'as' 	=> 'hr.organisations.delete'
						]
					);	

		Route::post('documents/store/', 
						[
							'uses' 	=> 'OrganisationController@postDocumentsStore', 
							'as' 	=> 'hr.organisations.documents.store'
						]
					);

	});

	//api key
	Route::group(['prefix' => 'organisations', 'before' => 'hr_acl'], function(){
		Route::get('{id}/create/new', 
						[
							'uses' 	=> 'APIKeyController@getCreate', 
							'as' 	=> 'hr.organisations.apis.create'
						]
					);
		// Route::get('edit/{id}', 
		// 				[
		// 					'uses' 	=> 'OrganisationController@getEdit', 
		// 					'as' 	=> 'hr.organisations.edit'
		// 				]
		// 			);		
		// Route::post('update/{id}', 
		// 				[
		// 					'uses' 	=> 'OrganisationController@postUpdate', 
		// 					'as' 	=> 'hr.organisations.update'
		// 				]
		// 			);	
		// Route::any('delete/{id}', 
		// 				[
		// 					'uses' 	=> 'OrganisationController@anyDelete', 
		// 					'as' 	=> 'hr.organisations.delete'
		// 				]
		// 			);	

	});
	//superadmin

	/* ---------------------------------------------------------------------------- END OF DEVELOPER AREA ----------------------------------------------------------------------------*/


	/* ---------------------------------------------------------------------------- ORGANISATION BRANCH ----------------------------------------------------------------------------*/

	Route::group(['prefix' => 'companies', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'CompanyController@getIndex', 
							'as' 	=> 'hr.organisation.branches.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'CompanyController@getCreate', 
							'as' 	=> 'hr.organisation.branches.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'CompanyController@postStore', 
							'as' 	=> 'hr.organisation.branches.store'
						]
					);

		Route::get('show/{id}', 
						[
							'uses' 	=> 'CompanyController@getShow', 
							'as' 	=> 'hr.organisation.branches.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'CompanyController@getEdit', 
							'as' 	=> 'hr.organisation.branches.edit'
						]
					);
		Route::post('update/{id}', 
						[
							'uses' 	=> 'CompanyController@postUpdate', 
							'as' 	=> 'hr.organisation.branches.update'
						]
					);	
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'CompanyController@anyDelete', 
							'as' 	=> 'hr.organisation.branches.delete'
						]
					);	

	});

	/* ---------------------------------------------------------------------------- END ORGANISATION BRANCH ----------------------------------------------------------------------------*/

	/* ---------------------------------------------------------------------------- DOCUMENT ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'documents', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'DocumentController@getIndex', 
							'as' 	=> 'hr.documents.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'DocumentController@getCreate', 
							'as' 	=> 'hr.documents.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'DocumentController@postStore', 
							'as' 	=> 'hr.documents.store'
						]
					);

		Route::get('show/{id}', 
						[
							'uses' 	=> 'DocumentController@getShow', 
							'as' 	=> 'hr.documents.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'DocumentController@getEdit', 
							'as' 	=> 'hr.documents.edit'
						]
					);
		Route::post('update/{id}', 
						[
							'uses' 	=> 'DocumentController@postUpdate', 
							'as' 	=> 'hr.documents.update'
						]
					);
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'DocumentController@anyDelete', 
							'as' 	=> 'hr.documents.delete'
						]
					);
		Route::get('shows/{person_id}/documents/{id}', 
					[
						'uses' 	=> 'DocumentController@getShow', 
						'as' 	=> 'hr.person.document.show'
					]
				);
	});

	Route::group(['prefix' => 'documents/templates', 'before' => 'hr_acl'], function(){
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'DocumentController@anyTemplateDelete', 
							'as' 	=> 'hr.document.templates.delete'
						]
					);
	});

	/* ---------------------------------------------------------------------------- END OF DOCUMENT ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- PERSON ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'persons', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'PersonController@getIndex', 
							'as' 	=> 'hr.persons.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'PersonController@getCreate', 
							'as' 	=> 'hr.persons.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'PersonController@postStore', 
							'as' 	=> 'hr.persons.store'
						]
					);

		Route::get('show/{id}', 
						[
							'uses' 	=> 'PersonController@getShow', 
							'as' 	=> 'hr.persons.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'PersonController@getEdit', 
							'as' 	=> 'hr.persons.edit'
						]
					);		

		Route::post('update/{id}', 
						[
							'uses' 	=> 'PersonController@postUpdate', 
							'as' 	=> 'hr.persons.update'
						]
					);	

		Route::any('delete/{id}', 
						[
							'uses' 	=> 'PersonController@anyDelete', 
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
	});
	/* ---------------------------------------------------------------------------- END PERSON ----------------------------------------------------------------------------*/
	

	///BEGIN CONTACTS///
	Route::group(['prefix' => 'contacts', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'contacts@getIndex', 
							'as' 	=> 'hr.contacts.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'contacts@getCreate', 
							'as' 	=> 'hr.contacts.create'
						]
					);

		Route::get('show/{id}', 
						[
							'uses' 	=> 'contacts@getShow', 
							'as' 	=> 'hr.contacts.show'
						]
					);
		Route::get('shows/{person_id}/contacts/{id}', 
					[
						'uses' 	=> 'contacts@getShow', 
						'as' 	=> 'hr.person.contacts.show'
					]
				);
	});
	///END CONTACTS///	


	Route::get('dashboard/overview', [
						'uses' 	=> 'AdminDashboardController@getOverview', 
						'as' 	=> 'hr.dashboard.overview',
						'before'=> 'hr_acl'
					]);
});

Route::get('namesearch', array('as' => 'hr.ajax.name', 'uses' => 'AjaxController@search_name'));
Route::get('companysearch', array('as' => 'hr.ajax.company', 'uses' => 'AjaxController@search_company'));
Route::get('departmentsearch', array('as' => 'hr.ajax.department', 'uses' => 'AjaxController@search_department'));
Route::get('positionsearch', array('as' => 'hr.ajax.position', 'uses' => 'AjaxController@search_position'));
