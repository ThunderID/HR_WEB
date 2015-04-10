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
				
				//check access
				if (!in_array(Session::get('user.role'), app('hr_acl')[Route::currentRouteName()]))
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
							'hr.dashboard.overview'							=> ['developer', 'CEO', 'admin'],
							'hr.dashboard.getTeam'							=> ['administrator', 'editor', 'writer', 'contributor'],
							'hr.dashboard.getContents'						=> ['administrator', 'editor', 'writer', 'contributor'],
							
							'hr.persons.index'								=> ['developer', 'CEO', 'admin'],
							'hr.persons.show'								=> ['developer', 'CEO', 'admin'],
							'hr.persons.edit'								=> ['developer', 'CEO', 'admin'],
							'hr.persons.create'								=> ['developer', 'CEO', 'admin'],
							'hr.persons.store'								=> ['developer', 'CEO', 'admin'],
							'hr.persons.update'								=> ['developer', 'CEO', 'admin'],
							'hr.persons.delete'								=> ['developer', 'CEO', 'admin'],
							
							'hr.documents.index'							=> ['developer', 'CEO', 'admin'],
							'hr.documents.show'								=> ['developer', 'CEO', 'admin'],
							'hr.documents.edit'								=> ['developer', 'CEO', 'admin'],
							'hr.documents.create'							=> ['developer', 'CEO', 'admin'],
							'hr.documents.store'							=> ['developer', 'CEO', 'admin'],
							'hr.documents.update'							=> ['developer', 'CEO', 'admin'],
							'hr.documents.delete'							=> ['developer', 'CEO', 'admin'],

							'hr.work.index'									=> ['developer', 'CEO', 'admin'],
							'hr.work.show'									=> ['developer', 'CEO', 'admin'],
							'hr.work.edit'									=> ['developer', 'CEO', 'admin'],
							'hr.work.create'								=> ['developer', 'CEO', 'admin'],
							'hr.work.store'									=> ['developer', 'CEO', 'admin'],
							'hr.work.update'								=> ['developer', 'CEO', 'admin'],
							'hr.work.delete'								=> ['developer', 'CEO', 'admin'],

							'hr.person.work.show'							=> ['developer', 'CEO', 'admin'],
							'hr.person.work.edit'							=> ['developer', 'CEO', 'admin'],
							'hr.person.work.create'							=> ['developer', 'CEO', 'admin'],
							'hr.person.work.store'							=> ['developer', 'CEO', 'admin'],
							'hr.person.work.update'							=> ['developer', 'CEO', 'admin'],
							'hr.person.work.delete'							=> ['developer', 'CEO', 'admin'],

							'hr.organisation.branches.index'				=> ['developer', 'CEO', 'admin'],
							'hr.organisation.branches.show'					=> ['developer', 'CEO', 'admin'],
							'hr.organisation.branches.edit'					=> ['developer', 'CEO', 'admin'],
							'hr.organisation.branches.create'				=> ['developer', 'CEO', 'admin'],
							'hr.organisation.branches.store'				=> ['developer', 'CEO', 'admin'],
							'hr.organisation.branches.update'				=> ['developer', 'CEO', 'admin'],
							'hr.organisation.branches.delete'				=> ['developer', 'CEO', 'admin'],
							
							//developer area
							'hr.organisations.index'						=> ['developer'],
							'hr.organisations.create'						=> ['developer'],
							'hr.organisations.store'						=> ['developer'],
							'hr.organisations.edit'							=> ['developer'],
							'hr.organisations.update'						=> ['developer'],
							'hr.organisations.delete'						=> ['developer'],
							'hr.organisations.show'							=> ['developer'],

							'hr.organisations.apis.create'					=> ['developer', 'CEO'],
							'hr.organisations.apis.store'					=> ['developer', 'CEO'],
							'hr.organisations.apis.edit'					=> ['developer', 'CEO'],
							'hr.organisations.apis.update'					=> ['developer', 'CEO'],
							'hr.organisations.apis.delete'					=> ['developer', 'CEO'],
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
