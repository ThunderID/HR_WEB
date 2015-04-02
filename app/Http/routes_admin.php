<?php

Route::group(['prefix' => 'admin'], function(){

	Route::get('/', 					['as' => 'admin.login', 'uses' => 'AdminLoginController@getLogin']);
	Route::post('/', 					['as' => 'admin.login.post', 'uses' => 'AdminLoginController@postLogin']);
	// Route::get('/logout', ['as' => 'admin.logout', 'uses' => 'AdminLoginController@getLogout']);

	// Route::group(['middleware' => 'App\Http\Middleware\TeamAuth'], function(){
		Route::controller('dashboard', 'AdminDashboardController', [
																	'getOverview'	=> 'admin.dashboard.overview'
															   ]);

		$pages = [
	// 				'vendor' 		=> 'AdminVendorController',
	// 				'destination' 	=> 'AdminDestinationController',
	// 				'tour' 			=> 'AdminTourController',
	// 				'team' 			=> 'AdminTeamController',
	// 				'order' 		=> 'AdminOrderController',
					'person-basic-information' 		=> 'AdminPersonBasicInformationController',
				];
		if (isset($pages))
		{
			foreach ($pages as $page => $controller)
			{
				Route::controller($page, $controller, [
							'getIndex'	=> 'admin.' . $page . '.index',
							'getCreate'	=> 'admin.' . $page . '.add',
	// 						'postStore'	=> 'admin.' . $page . '.store',
	// 						'getShow'	=> 'admin.' . $page . '.show',
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