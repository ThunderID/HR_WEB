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

				if(!Session::has('user.organisation'))
				{
					Session::put('user.organisation', $contents->data->works[0]->branch->organisation->id);
					Session::put('user.role', $contents->data->works[0]->name);
				}

				$chartids									= [];
				
				foreach ($contents->data->works as $key => $value) 
				{
					$chartids[]								= $value->id;
				}

				$results_2 									= API::application()->authenticate(1, $personid = Session::get('loggedUser'), $chartids, null);

				$contents_2 								= json_decode($results_2);

				if($contents_2->meta->success)
				{
					$organisations							= [];
					$orgids									= [];
					foreach ($contents->data->works as $key => $value) 
					{
						if(!in_array($value->branch->organisation->id, $orgids))
						{
							$organisations[]							= ['id' => $value->branch->organisation->id, 'name' => $value->branch->organisation->name];
							$orgids[]									= $value->branch->organisation->id;
							$roles[$value->branch->organisation->id]	= $value->name;
						}
					}

					Session::put('user.organisations', $organisations);
					Session::put('user.orgids', $orgids);
					Session::put('user.roles', $roles);
				}

				Session::put('user.org_name', $contents->data->works[0]->branch->organisation->name);
				Session::put('user.name', $contents->data->name);
				Session::put('user.email', $contents->data->contacts[0]->value);
				Session::put('user.gender', $contents->data->gender);
				Session::put('user.avatar', $contents->data->avatar);
				
				//check access
				$menu 											= app('hr_acl')[Route::currentRouteName()];
				
				$results 										= API::application()->authenticate($menu[0], $personid = Session::get('loggedUser'), $contents->data->works[0]->id, $menu[1]);

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
							'hr.devices.edit'								=> ['1', 'update'],
							'hr.devices.update'								=> ['1', 'update'],
							'hr.fingers.edit'								=> ['1', 'update'],
							'hr.fingers.update'								=> ['1', 'update'],

							'hr.applications.index'							=> ['1', 'read'],
							'hr.applications.show'							=> ['1', 'read'],
							'hr.applications.create'						=> ['1', 'create'],
							'hr.applications.store'							=> ['1', 'create'],
							'hr.applications.edit'							=> ['1', 'update'],
							'hr.applications.update'						=> ['1', 'update'],
							'hr.applications.delete'						=> ['1', 'delete'],

							'hr.applications.menus.index'					=> ['1', 'read'],
							'hr.applications.menus.show'					=> ['1', 'read'],
							'hr.applications.menus.create'					=> ['1', 'create'],
							'hr.applications.menus.store'					=> ['1', 'create'],
							'hr.applications.menus.edit'					=> ['1', 'update'],
							'hr.applications.menus.update'					=> ['1', 'update'],
							'hr.applications.menus.delete'					=> ['1', 'delete'],

							'hr.authentications.index'						=> ['1', 'read'],
							'hr.authentications.show'						=> ['1', 'read'],
							'hr.authentications.create'						=> ['1', 'create'],
							'hr.authentications.store'						=> ['1', 'create'],
							'hr.authentications.edit'						=> ['1', 'update'],
							'hr.authentications.update'						=> ['1', 'update'],
							'hr.authentications.delete'						=> ['1', 'delete'],

							'hr.dashboard.overview'							=> ['3', 'read'],
							'hr.dashboard.widgets.delete'					=> ['3', 'delete'],
							'hr.dashboard.widgets.store'					=> ['3', 'create'],
							'hr.password.get'								=> ['3', 'update'],
							'hr.password.post'								=> ['3', 'update'],

							'hr.organisations.index'						=> ['2', 'read'],
							'hr.organisations.show'							=> ['2', 'read'],
							'hr.organisations.create'						=> ['2', 'create'],
							'hr.organisations.store'						=> ['2', 'create'],
							'hr.organisations.edit'							=> ['2', 'update'],
							'hr.organisations.update'						=> ['2', 'update'],
							'hr.organisations.delete'						=> ['2', 'delete'],
							'hr.organisations.default'						=> ['2', 'delete'],

							'hr.organisation.documents.index'				=> ['5', 'read'],
							'hr.organisation.documents.show'				=> ['5', 'read'],
							'hr.organisation.documents.create'				=> ['5', 'create'],
							'hr.organisation.documents.store'				=> ['5', 'create'],
							'hr.organisation.documents.update'				=> ['5', 'update'],
							'hr.organisation.documents.edit'				=> ['5', 'update'],
							'hr.organisation.documents.delete'				=> ['5', 'delete'],

							'hr.organisation.calendars.index'				=> ['6', 'read'],
							'hr.organisation.calendars.show'				=> ['6', 'read'],
							'hr.organisation.calendars.create'				=> ['6', 'create'],
							'hr.organisation.calendars.store'				=> ['6', 'create'],
							'hr.organisation.calendars.update'				=> ['6', 'update'],
							'hr.organisation.calendars.edit'				=> ['6', 'update'],
							'hr.organisation.calendars.delete'				=> ['6', 'delete'],

							'hr.organisation.workleaves.index'				=> ['6', 'read'],
							'hr.organisation.workleaves.show'				=> ['6', 'read'],
							'hr.organisation.workleaves.create'				=> ['6', 'create'],
							'hr.organisation.workleaves.store'				=> ['6', 'create'],
							'hr.organisation.workleaves.update'				=> ['6', 'update'],
							'hr.organisation.workleaves.edit'				=> ['6', 'update'],
							'hr.organisation.workleaves.delete'				=> ['6', 'delete'],

							'hr.organisation.branches.index'				=> ['4', 'read'],
							'hr.organisation.branches.show'					=> ['4', 'read'],
							'hr.organisation.branches.create'				=> ['4', 'create'],
							'hr.organisation.branches.store'				=> ['4', 'create'],
							'hr.organisation.branches.update'				=> ['4', 'update'],
							'hr.organisation.branches.edit'					=> ['4', 'update'],
							'hr.organisation.branches.delete'				=> ['4', 'delete'],

							'hr.branches.contacts.index'					=> ['4', 'read'],
							'hr.branches.contacts.show'						=> ['4', 'read'],
							'hr.branches.contacts.store'					=> ['4', 'update'],
							'hr.branches.contacts.delete'					=> ['4', 'delete'],

							'hr.branches.charts.index'						=> ['4', 'read'],
							'hr.branches.charts.create'						=> ['4', 'read'],
							'hr.branches.charts.show'						=> ['4', 'create'],
							'hr.branches.charts.store'						=> ['4', 'create'],
							'hr.branches.charts.edit'						=> ['4', 'update'],
							'hr.branches.charts.update'						=> ['4', 'update'],
							'hr.branches.charts.delete'						=> ['4', 'delete'],
							
							'hr.document.persons.index'						=> ['5', 'read'],
							'hr.document.templates.delete'					=> ['5', 'delete'],

							'hr.calendars.schedules.store'					=> ['6', 'create'],
							'hr.calendars.persons.store'					=> ['6', 'create'],
							'hr.calendars.charts.store'						=> ['6', 'create'],

							'hr.workleaves.persons.store'					=> ['6', 'create'],
							'hr.charts.authentications.store'				=> ['1', 'create'],

							'hr.persons.index'								=> ['7', 'read'],
							'hr.persons.show'								=> ['7', 'read'],
							'hr.persons.create'								=> ['7', 'create'],
							'hr.persons.store'								=> ['7', 'create'],
							'hr.persons.edit'								=> ['7', 'update'],
							'hr.persons.update'								=> ['7', 'update'],
							'hr.persons.delete'								=> ['7', 'delete'],
							
							'hr.persons.relatives.index'					=> ['7', 'read'],
							'hr.persons.relatives.show'						=> ['7', 'read'],
							'hr.persons.relatives.store'					=> ['7', 'create'],
							'hr.persons.relatives.delete'					=> ['7', 'delete'],

							'hr.persons.documents.index'					=> ['7', 'read'],
							'hr.persons.documents.show'						=> ['7', 'read'],
							'hr.persons.documents.store'					=> ['7', 'create'],
							'hr.persons.documents.delete'					=> ['7', 'delete'],
							'hr.persons.documents.print'					=> ['7', 'read'],
							'hr.persons.documents.pdf'						=> ['7', 'read'],

							'hr.persons.works.index'						=> ['7', 'read'],
							'hr.persons.works.store'						=> ['7', 'create'],
							'hr.persons.works.edit'							=> ['7', 'update'],
							'hr.persons.works.update'						=> ['7', 'update'],
							
							'hr.persons.contacts.index'						=> ['7', 'read'],
							'hr.persons.contacts.store'						=> ['7', 'create'],
							'hr.persons.contacts.edit'						=> ['7', 'update'],
							'hr.persons.contacts.update'					=> ['7', 'update'],

							'hr.persons.schedules.index'					=> ['7', 'read'],
							'hr.persons.schedules.store'					=> ['7', 'create'],
							'hr.persons.schedules.delete'					=> ['7', 'delete'],

							'hr.persons.workleaves.index'					=> ['7', 'read'],
							'hr.persons.workleaves.store'					=> ['7', 'create'],
							'hr.persons.workleaves.delete'					=> ['7', 'delete'],

							'hr.report.attendance.get'						=> ['8', 'read'],
							'hr.report.performance.get'						=> ['8', 'read'],
							'hr.report.wages.get'							=> ['8', 'read'],
							'hr.report.attendance.detail'					=> ['8', 'read'],
							'hr.report.attendance.post'						=> ['8', 'read'],
							'hr.report.wages.post'							=> ['8', 'read'],
							'hr.report.performance.post'					=> ['8', 'read'],
							'hr.report.attendance.csv'						=> ['8', 'read'],
							'hr.report.attendance.csvd'						=> ['8', 'read'],
							'hr.report.wages.csv'							=> ['8', 'read'],

							'hr.schedule.list'								=> ['6', 'read'],
							'hr.schedule.person.list'						=> ['6', 'read'],
							'hr.images.upload'								=> ['7', 'create'],
							'hr.ajax.name'									=> ['7', 'create'],
							'hr.ajax.company'								=> ['4', 'read'],
							'hr.ajax.chart'									=> ['4', 'read'],
							'hr.ajax.workleave'								=> ['6', 'read'],
							'hr.ajax.follow'								=> ['6', 'read'],
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
			require app_path('Http/routes.organisations.php');
			require app_path('Http/routes.persons.php');
			require app_path('Http/routes.api.php');
			require app_path('Http/routes.cron.php');
		});
	}

}