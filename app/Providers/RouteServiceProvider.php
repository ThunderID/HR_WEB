<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App, View, Route, Response, Session, Redirect, Config, Request;
use App\APIConnector\API;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		// Customize filter
		Route::filter('hr_acl', function()
		{
			if (!Session::has('loggedUser'))
			{
				if (Request::ajax())
				{
					return Response::make('Unauthorized', 401);
				}
				else
				{
					return Redirect::guest(route('hr.login.get'));
				}
			}
			else
			{
				//check user logged in 
				$results 									= API::person()->check(Session::get('loggedUser'));

				$contents 									= json_decode($results);

				if(!$contents->meta->success || !count($contents->data->works))
				{
					App::abort(404);
				}

				Session::put('user.organisation', $contents->data->works[0]->branch->organisation->id);
				Session::put('user.role', $contents->data->works[0]->name);
				Session::put('user.name', $contents->data->username);
				Session::put('user.gender', $contents->data->gender);
				Session::put('user.access', json_decode(json_encode($contents->data->works[0]->applications),true));
				
				//check access
				foreach(Session::get('user.access') as $key => $value)
				{
					if($value['pivot']['is_create']==true)
					{
						$acl[] 						= $value['menu'].'-'.'is_create';
					}
					if($value['pivot']['is_read']==true)
					{
						$acl[] 						= $value['menu'].'-'.'is_read';
					}
					if($value['pivot']['is_update']==true)
					{
						$acl[] 						= $value['menu'].'-'.'is_update';
					}
					if($value['pivot']['is_delete']==true)
					{
						$acl[] 						= $value['menu'].'-'.'is_delete';
					}
				}
				if (!isset($acl) || (!in_array(app('hr_acl')[Route::currentRouteName()], $acl)))
				{
					Session::flush();
					return Redirect::guest(route('hr.login.get'));
				}
			}
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		// ACL
		App::singleton('hr_acl', function()
		{
			$routes_acl = [
							// 'hr.getLogout'									=> ['administrator', 'editor', 'writer', 'contributor'],
							// 'hr.gallery.upload'								=> ['administrator', 'editor', 'writer', 'contributor'],
							// 'hr.search'										=> ['administrator', 'editor', 'writer', 'contributor'],
							'hr.dashboard.overview'							=> 'dashboard-is_read',
							'hr.password.get'								=> 'password-is_update',
							'hr.password.post'								=> 'password-is_update',
							
							'hr.organisation.branches.index'				=> 'branch-is_read',
							'hr.organisation.branches.show'					=> 'branch-is_read',
							'hr.organisation.branches.create'				=> 'branch-is_create',
							'hr.organisation.branches.store'				=> 'branch-is_create',
							'hr.organisation.branches.update'				=> 'branch-is_update',
							'hr.organisation.branches.edit'					=> 'branch-is_update',
							'hr.organisation.branches.delete'				=> 'branch-is_delete',

							'hr.persons.index'								=> 'person-is_read',
							'hr.persons.show'								=> 'person-is_read',
							'hr.persons.create'								=> 'person-is_create',
							'hr.persons.store'								=> 'person-is_create',
							'hr.persons.edit'								=> 'person-is_update',
							'hr.persons.update'								=> 'person-is_update',
							'hr.persons.delete'								=> 'person-is_delete',
							'hr.persons.relatives.index'					=> 'person-is_read',
							
							'hr.documents.index'							=> 'document-is_read',
							'hr.documents.show'								=> 'document-is_read',
							'hr.documents.create'							=> 'document-is_create',
							'hr.documents.store'							=> 'document-is_create',
							'hr.documents.update'							=> 'document-is_update',
							'hr.documents.edit'								=> 'document-is_update',
							'hr.documents.delete'							=> 'document-is_delete',

							'hr.document.templates.delete'					=> 'document-is_delete',

							// 'hr.person.work.show'							=> ['developer', 'CEO', 'manager', 'staff'],
							// 'hr.person.work.edit'							=> ['developer', 'CEO', 'manager', 'staff'],
							// 'hr.person.work.create'							=> ['developer', 'CEO', 'manager', 'staff'],
							// 'hr.persons.works.store'						=> ['developer', 'CEO', 'manager', 'staff'],
							// 'hr.person.work.update'							=> ['developer', 'CEO', 'manager', 'staff'],
							// 'hr.person.work.delete'							=> ['developer', 'CEO', 'manager', 'staff'],

							
							// //developer area
							// 'hr.organisations.index'						=> ['developer'],
							// 'hr.organisations.create'						=> ['developer'],
							// 'hr.organisations.store'						=> ['developer'],
							// 'hr.organisations.edit'							=> ['developer'],
							// 'hr.organisations.update'						=> ['developer'],
							// 'hr.organisations.delete'						=> ['developer'],
							// 'hr.organisations.show'							=> ['developer'],
							// 'hr.organisations.documents.store'				=> ['developer', 'CEO', 'manager', 'staff'],

							// 'hr.organisations.apis.create'					=> ['developer', 'CEO'],
							// 'hr.organisations.apis.store'					=> ['developer', 'CEO'],
							// 'hr.organisations.apis.edit'					=> ['developer', 'CEO'],
							// 'hr.organisations.apis.update'					=> ['developer', 'CEO'],
							// 'hr.organisations.apis.delete'					=> ['developer', 'CEO'],
						];
			return $routes_acl;
		});

		// If you use this line of code then it'll be available in any view
		// as $site_settings but you may also use app('site_settings') as well
		View::share('hr_acl', app('hr_acl'));
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
