<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App, View, Route, Response, Session, Redirect, Config, Request;
use API;

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
				Session::put('user.org_name', $contents->data->works[0]->branch->organisation->name);
				Session::put('user.role', $contents->data->works[0]->name);
				Session::put('user.name', $contents->data->name);
				Session::put('user.email', $contents->data->contacts[0]->value);
				Session::put('user.gender', $contents->data->gender);
				Session::put('user.avatar', $contents->data->avatar);
				
				//check access
				$access 										= explode('-', app('hr_acl')[Route::currentRouteName()]);
				$results 										= API::application()->authenticate($menu = $access[0], $access = $access[1], $personid = Session::get('loggedUser'), $apps = 'web');

				$contents 										= json_decode($results);

				if(!$contents->meta->success)
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
							'hr.dashboard.overview'							=> 'dashboard-is_read',
							'hr.dashboard.widgets.delete'					=> 'dashboard-is_create',
							'hr.dashboard.widgets.store'					=> 'dashboard-is_create',
							'hr.password.get'								=> 'password-is_update',
							'hr.password.post'								=> 'password-is_update',
							
							'hr.organisation.branches.index'				=> 'branch-is_read',
							'hr.organisation.branches.show'					=> 'branch-is_read',
							'hr.organisation.branches.create'				=> 'branch-is_create',
							'hr.organisation.branches.store'				=> 'branch-is_create',
							'hr.organisation.branches.update'				=> 'branch-is_update',
							'hr.organisation.branches.edit'					=> 'branch-is_update',
							'hr.organisation.branches.delete'				=> 'branch-is_delete',

							'hr.branches.contacts.index'					=> 'branch-is_read',
							'hr.branches.contacts.show'						=> 'branch-is_read',
							'hr.branches.contacts.store'					=> 'branch-is_create',
							'hr.branches.contacts.delete'					=> 'branch-is_delete',
							
							'hr.documents.index'							=> 'document-is_read',
							'hr.documents.show'								=> 'document-is_read',
							'hr.documents.create'							=> 'document-is_create',
							'hr.documents.store'							=> 'document-is_create',
							'hr.documents.update'							=> 'document-is_update',
							'hr.documents.edit'								=> 'document-is_update',
							'hr.documents.delete'							=> 'document-is_delete',

							'hr.document.persons.index'						=> 'document-is_read',
							'hr.document.templates.delete'					=> 'document-is_delete',

							'hr.organisation.charts.create'					=> 'branch-is_create',
							'hr.organisation.charts.show'					=> 'branch-is_create',
							'hr.organisation.charts.store'					=> 'branch-is_create',
							'hr.organisation.charts.edit'					=> 'branch-is_create',
							'hr.organisation.charts.update'					=> 'branch-is_create',
							'hr.organisation.charts.delete'					=> 'branch-is_create',

							'hr.persons.index'								=> 'person-is_read',
							'hr.persons.show'								=> 'person-is_read',
							'hr.persons.create'								=> 'person-is_create',
							'hr.persons.store'								=> 'person-is_create',
							'hr.persons.edit'								=> 'person-is_update',
							'hr.persons.update'								=> 'person-is_update',
							'hr.persons.delete'								=> 'person-is_delete',
							
							'hr.persons.relatives.index'					=> 'person-is_read',
							'hr.persons.relatives.show'						=> 'person-is_read',
							'hr.persons.relatives.store'					=> 'person-is_create',
							'hr.persons.relatives.delete'					=> 'person-is_delete',

							'hr.persons.documents.index'					=> 'person-is_read',
							'hr.persons.documents.show'						=> 'person-is_read',
							'hr.persons.documents.store'					=> 'person-is_create',
							'hr.persons.documents.delete'					=> 'person-is_delete',

							'hr.persons.works.index'						=> 'person-is_read',
							'hr.persons.works.store'						=> 'person-is_create',
							'hr.persons.works.edit'							=> 'person-is_create',
							'hr.persons.works.update'						=> 'person-is_create',
							
							'hr.persons.contacts.index'						=> 'person-is_read',
							'hr.persons.contacts.store'						=> 'person-is_create',
							'hr.persons.contacts.edit'						=> 'person-is_create',
							'hr.persons.contacts.update'					=> 'person-is_create',

							'hr.images.upload'								=> 'person-is_create',
							
							'hr.organisations.index'						=> ['organisation-is_read'],
							'hr.organisations.show'							=> ['organisation-is_read'],
							'hr.organisations.create'						=> ['organisation-is_create'],
							'hr.organisations.store'						=> ['organisation-is_create'],
							'hr.organisations.edit'							=> ['organisation-is_update'],
							'hr.organisations.update'						=> ['organisation-is_update'],
							'hr.organisations.delete'						=> ['organisation-is_delete'],

							// 'hr.organisations.apis.create'					=> ['organisation-is_read', 'CEO'],
							// 'hr.organisations.apis.store'					=> ['organisation-is_read', 'CEO'],
							// 'hr.organisations.apis.edit'					=> ['organisation-is_read', 'CEO'],
							// 'hr.organisations.apis.update'					=> ['organisation-is_read', 'CEO'],
							// 'hr.organisations.apis.delete'					=> ['organisation-is_read', 'CEO'],
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
