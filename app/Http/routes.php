<?php

Route::group(['prefix' => 'cms'], function(){

	Route::get('/login', 				['as' => 'hr.login.get', 	'uses' => 'AuthController@getLogin']);
	Route::post('/login', 				['as' => 'hr.login.post', 	'uses' => 'AuthController@postLogin']);

	Route::get('/logout',				['as' => 'hr.logout.get', 	'uses' => 'AuthController@getLogout']);

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


	/* ---------------------------------------------------------------------------- SUPERADMIN AREA ----------------------------------------------------------------------------*/

	//Organisation
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
	});

	///BEGIN PERSON///
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
		Route::get('shows/{person_id}/documents/{id}', 
					[
						'uses' 	=> 'PersonController@getShow', 
						'as' 	=> 'hr.person.document.show'
					]
				);
	});
	///END PERSON///
	

	///BEGIN DOCUMENT///
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

		Route::get('show/{id}', 
						[
							'uses' 	=> 'DocumentController@getShow', 
							'as' 	=> 'hr.documents.show'
						]
					);
		Route::get('shows/{person_id}/documents/{id}', 
					[
						'uses' 	=> 'DocumentController@getShow', 
						'as' 	=> 'hr.person.document.show'
					]
				);
	});
	///END DOCUMENT///

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
