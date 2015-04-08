<?php

Route::group(['prefix' => 'admin'], function(){

	Route::get('/', 					['as' => 'admin.login', 'uses' => 'AdminLoginController@getLogin']);
	Route::post('/', 					['as' => 'admin.login.post', 'uses' => 'AdminLoginController@postLogin']);
	// Route::get('/logout', ['as' => 'admin.logout', 'uses' => 'AdminLoginController@getLogout']);

	// Route::group(['middleware' => 'App\Http\Middleware\TeamAuth'], function(){
		Route::controller('dashboard', 'AdminDashboardController', [
																	'getOverview'	=> 'admin.dashboard.overview'
															   ]);

		Route::group(['prefix' => 'pegawai'], function(){
			Route::get('{page?}', 
							[
								'uses' 	=> 'AdminPersonBasicInformationController@GetIndex', 
								'as' 	=> 'admin.person-basic-information.index'
							]
						);

			Route::get('create/new', 
							[
								'uses' 	=> 'AdminPersonBasicInformationController@GetCreate', 
								'as' 	=> 'admin.person-basic-information.add'
							]
						);

			Route::get('show/{id}', 
							[
								'uses' 	=> 'AdminPersonBasicInformationController@getShow', 
								'as' 	=> 'admin.person-basic-information.show'
							]
						);

			Route::post('store/', 
				[
					'uses' 	=> 'AdminPersonBasicInformationController@store', 
					'as' 	=> 'admin.person-basic-information.store'
				]
			);			

			// Route::patch('update/{id}', 
			// 				[
			// 					'uses' 	=> 'AdminPersonBasicInformationController@getStore', 
			// 					'as' 	=> 'admin.person-basic-information.update'
			// 				]
			// 			);

			// Route::any('delete/{id}', 
			// 				[
			// 					'uses' 	=> 'AdminPersonBasicInformationController@getDelete', 
			// 					'as' 	=> 'admin.person-basic-information.delete'
			// 				]
			// 			);
		});

		Route::group(['prefix' => 'organisasi'], function(){
			Route::get('{page?}', 
							[
								'uses' 	=> 'AdminOrganisationController@GetIndex', 
								'as' 	=> 'admin.organisation.index'
							]
						);

			Route::get('create/new', 
							[
								'uses' 	=> 'AdminOrganisationController@GetCreate', 
								'as' 	=> 'admin.organisation.add'
							]
						);

			Route::get('show/{id}', 
							[
								'uses' 	=> 'AdminOrganisationController@getShow', 
								'as' 	=> 'admin.organisation.show'
							]
						);

			Route::post('store/', 
				[
					'uses' 	=> 'AdminOrganisationController@store', 
					'as' 	=> 'admin.organisation.store'
				]
			);			

			// Route::patch('update/{id}', 
			// 				[
			// 					'uses' 	=> 'AdminOrganisationController@getStore', 
			// 					'as' 	=> 'admin.organisation.update'
			// 				]
			// 			);

			// Route::any('delete/{id}', 
			// 				[
			// 					'uses' 	=> 'AdminOrganisationController@getDelete', 
			// 					'as' 	=> 'admin.organisation.delete'
			// 				]
			// 			);
		});



		$pages = [
	// 				'vendor' 		=> 'AdminVendorController',
	// 				'destination' 	=> 'AdminDestinationController',
	// 				'tour' 			=> 'AdminTourController',
	// 				'team' 			=> 'AdminTeamController',
	// 				'order' 		=> 'AdminOrderController',
					// 'person-basic-information' 		=> 'AdminPersonBasicInformationController',
					'company'						=> 'AdminCompanyController',
					// 'organisation'					=> 'AdminOrganisationController',
					'department'					=> 'AdminDepartmentController',
					'position'						=> 'AdminPositionController',
					'document-template'				=> 'AdminDocumentTemplateController',
					'document'						=> 'AdminDocumentController',
					'document-detail'				=> 'AdminDocumentDetailController',
					'API'							=> 'AdminAPIController'
				];
		if (isset($pages))
		{
			foreach ($pages as $page => $controller)
			{
				Route::controller($page, $controller, [
							'getIndex'	=> 'admin.' . $page . '.index',
							'getCreate'	=> 'admin.' . $page . '.add',
	// 						'postStore'	=> 'admin.' . $page . '.store',
							'getShow'	=> 'admin.' . $page . '.show',
							// 'getDelete'	=> 'admin.' . $page . '.delete',
					]);
			}
		}
	// });

	Route::get('/error/{detail?}', function($detail)
	{
		return view("admin.pages.errors.error")->with('err_type',$detail);
	});
});