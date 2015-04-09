<?php

Route::group(['prefix' => 'cms'], function(){

	Route::get('/login', 				['as' => 'hr.login.get', 	'uses' => 'AuthController@getLogin']);
	Route::post('/login', 				['as' => 'hr.login.post', 	'uses' => 'AuthController@postLogin']);

	Route::get('/logout',				['as' => 'hr.logout.get', 	'uses' => 'AuthController@getLogout']);

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
		Route::get('shows/{person_id}/documents/{id}', 
					[
						'uses' 	=> 'PersonController@getShow', 
						'as' 	=> 'hr.person.document.show'
					]
				);
	});
	///END PERSON///
	

	///BEGIN ORGANISATION BRANCH///
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

		Route::get('show/{id}', 
						[
							'uses' 	=> 'CompanyController@getShow', 
							'as' 	=> 'hr.organisation.branches.show'
						]
					);
	});

	Route::controller('dashboard', 'AdminDashboardController', [
																'getOverview'	=> 'admin.dashboard.overview'
														   ]);


});
