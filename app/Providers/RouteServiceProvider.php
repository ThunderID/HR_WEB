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
		Session::put('loggedUser', 1);
		Session::put('user.organisation', 1);
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
				Session::put('loggedUser', 1);

				//set config
				$results 									= API::person()->check(Session::get('loggedUser'));

				$contents 									= json_decode($results);

				if(!$contents->meta->success)
				{
					App::abort(404);
				}
				
				Config::set('user.role', $contents->data->authentication->role);
				Config::set('user.name', $contents->data->nick_name);
				Config::set('user.gender', $contents->data->gender);
				
				//check access
				if (!in_array(Config::get('user.role'), app('hr_acl')[Route::currentRouteName()]))
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
							'hr.getLogout'									=> ['administrator', 'editor', 'writer', 'contributor'],
							'hr.gallery.upload'								=> ['administrator', 'editor', 'writer', 'contributor'],
							'hr.search'										=> ['administrator', 'editor', 'writer', 'contributor'],
							'hr.dashboard.overview'							=> ['developer', 'superadmin', 'admin'],
							'hr.dashboard.getTeam'							=> ['administrator', 'editor', 'writer', 'contributor'],
							'hr.dashboard.getContents'						=> ['administrator', 'editor', 'writer', 'contributor'],
							
							'hr.persons.index'								=> ['developer', 'superadmin', 'admin'],
							'hr.persons.show'								=> ['developer', 'superadmin', 'admin'],
							'hr.persons.edit'								=> ['developer', 'superadmin', 'admin'],
							'hr.persons.create'								=> ['developer', 'superadmin', 'admin'],
							'hr.persons.store'								=> ['developer', 'superadmin', 'admin'],
							'hr.persons.update'								=> ['developer', 'superadmin', 'admin'],
							'hr.persons.delete'								=> ['developer', 'superadmin', 'admin'],
							
							'hr.documents.index'							=> ['developer', 'superadmin', 'admin'],
							'hr.documents.show'								=> ['developer', 'superadmin', 'admin'],
							'hr.documents.edit'								=> ['developer', 'superadmin', 'admin'],
							'hr.documents.create'							=> ['developer', 'superadmin', 'admin'],
							'hr.documents.store'							=> ['developer', 'superadmin', 'admin'],
							'hr.documents.update'							=> ['developer', 'superadmin', 'admin'],
							'hr.documents.delete'							=> ['developer', 'superadmin', 'admin'],

							'hr.organisation.branches.index'				=> ['developer', 'superadmin', 'admin'],
							'hr.organisation.branches.show'					=> ['developer', 'superadmin', 'admin'],
							'hr.organisation.branches.edit'					=> ['developer', 'superadmin', 'admin'],
							'hr.organisation.branches.create'				=> ['developer', 'superadmin', 'admin'],
							'hr.organisation.branches.store'				=> ['developer', 'superadmin', 'admin'],
							'hr.organisation.branches.update'				=> ['developer', 'superadmin', 'admin'],
							'hr.organisation.branches.delete'				=> ['developer', 'superadmin', 'admin'],
							
							//developer area
							'hr.organisations.index'						=> ['developer'],
							'hr.organisations.create'						=> ['developer'],
							'hr.organisations.store'						=> ['developer'],
							'hr.organisations.edit'							=> ['developer'],
							'hr.organisations.update'						=> ['developer'],
							'hr.organisations.delete'						=> ['developer'],
							'hr.organisations.show'							=> ['developer'],

							'hr.organisations.apis.create'					=> ['developer', 'superadmin'],
							'hr.organisations.apis.store'					=> ['developer', 'superadmin'],
							'hr.organisations.apis.edit'					=> ['developer', 'superadmin'],
							'hr.organisations.apis.update'					=> ['developer', 'superadmin'],
							'hr.organisations.apis.delete'					=> ['developer', 'superadmin'],
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
