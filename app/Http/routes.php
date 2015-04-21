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
	
	/* ---------------------------------------------------------------------------- DEVELOPER AREA ----------------------------------------------------------------------------*/
	//Organisation
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

		Route::get('show/{id}', 
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
	});

	//api key
	Route::group(['prefix' => 'organisations', 'before' => 'hr_acl'], function(){
		Route::get('{id}/create/new', 
						[
							'uses' 	=> 'Organisation\APIKeyController@getCreate', 
							'as' 	=> 'hr.organisations.apis.create'
						]
					);
	});

	/* ---------------------------------------------------------------------------- END OF DEVELOPER AREA ----------------------------------------------------------------------------*/


	/* ---------------------------------------------------------------------------- ORGANISATION BRANCH ----------------------------------------------------------------------------*/

	Route::group(['prefix' => 'companies', 'before' => 'hr_acl'], function(){
		Route::get('{page?}', 
						[
							'uses' 	=> 'Branch\CompanyController@getIndex', 
							'as' 	=> 'hr.organisation.branches.index'
						]
					);

		Route::get('create/new', 
						[
							'uses' 	=> 'Branch\CompanyController@getCreate', 
							'as' 	=> 'hr.organisation.branches.create'
						]
					);

		Route::post('store', 
						[
							'uses' 	=> 'Branch\CompanyController@postStore', 
							'as' 	=> 'hr.organisation.branches.store'
						]
					);

		Route::get('show/{id}', 
						[
							'uses' 	=> 'Branch\CompanyController@getShow', 
							'as' 	=> 'hr.organisation.branches.show'
						]
					);
		Route::get('edit/{id}', 
						[
							'uses' 	=> 'Branch\CompanyController@getEdit', 
							'as' 	=> 'hr.organisation.branches.edit'
						]
					);
		Route::post('update/{id}', 
						[
							'uses' 	=> 'Branch\CompanyController@postUpdate', 
							'as' 	=> 'hr.organisation.branches.update'
						]
					);	
		Route::any('delete/{id}', 
						[
							'uses' 	=> 'Branch\CompanyController@anyDelete', 
							'as' 	=> 'hr.organisation.branches.delete'
						]
					);	
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
		Route::get('branch/{branch_id}/show/{id}', 
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

	/* ---------------------------------------------------------------------------- BEGIN DASHBOARD ----------------------------------------------------------------------------*/
	Route::group(['prefix' => 'dashboard', 'before' => 'hr_acl'], function(){

		Route::get('/overview', 							[	'as' 	=> 'hr.dashboard.overview', 		'uses' 	=> 'DashboardController@getOverview']);

		Route::any('/overview/widgets/delete/{id}', 		[	'as' 	=> 'hr.dashboard.widgets.delete', 	'uses' 	=> 'DashboardController@destroyWidget']);
		
		Route::post('/overview/widgets/store', 				[	'as' 	=> 'hr.dashboard.widgets.store', 	'uses' 	=> 'DashboardController@storeWidget']);
	});

	/* ---------------------------------------------------------------------------- END DASHBOARD ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- AJAX ----------------------------------------------------------------------------*/
	
	Route::get('names/search', array('as'		=> 'hr.ajax.name', 		'uses' => 'AjaxController@searchName'));

	Route::get('company/search', array('as' 	=> 'hr.ajax.company', 	'uses' => 'AjaxController@searchCompany'));
	
	Route::any('/image/upload', 		['as' 	=> 'hr.images.upload',	'uses' => 'GalleryController@upload']);

	Route::get('chart/search/{id}/{parent?}', array('as' 	=> 'hr.ajax.chart',	'uses' => 'AjaxController@searchChart'));

	
	/* ---------------------------------------------------------------------------- END AJAX ----------------------------------------------------------------------------*/
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

