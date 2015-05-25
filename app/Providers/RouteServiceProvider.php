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

				$results_2 									= API::application()->authenticate(1, $personid = Session::get('loggedUser'), $chartids);

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
				$menuid 										= app('hr_acl')[Route::currentRouteName()];
				
				$results 										= API::application()->authenticate($menuid, $personid = Session::get('loggedUser'), $contents->data->works[0]->id);

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
							'hr.devices.edit'								=> '1',
							'hr.devices.update'								=> '1',
							'hr.fingers.edit'								=> '1',
							'hr.fingers.update'								=> '1',

							'hr.applications.index'							=> '1',
							'hr.applications.show'							=> '1',
							'hr.applications.create'						=> '1',
							'hr.applications.store'							=> '1',
							'hr.applications.edit'							=> '1',
							'hr.applications.update'						=> '1',
							'hr.applications.delete'						=> '1',

							'hr.applications.menus.index'					=> '1',
							'hr.applications.menus.show'					=> '1',
							'hr.applications.menus.create'					=> '1',
							'hr.applications.menus.store'					=> '1',
							'hr.applications.menus.edit'					=> '1',
							'hr.applications.menus.update'					=> '1',
							'hr.applications.menus.delete'					=> '1',

							'hr.authentications.index'						=> '1',
							'hr.authentications.show'						=> '1',
							'hr.authentications.create'						=> '1',
							'hr.authentications.store'						=> '1',
							'hr.authentications.edit'						=> '1',
							'hr.authentications.update'						=> '1',
							'hr.authentications.delete'						=> '1',

							'hr.dashboard.overview'							=> '3',
							'hr.dashboard.widgets.delete'					=> '3',
							'hr.dashboard.widgets.store'					=> '3',
							'hr.password.get'								=> '3',
							'hr.password.post'								=> '3',

							'hr.organisations.index'						=> '2',
							'hr.organisations.show'							=> '2',
							'hr.organisations.create'						=> '2',
							'hr.organisations.store'						=> '2',
							'hr.organisations.edit'							=> '2',
							'hr.organisations.update'						=> '2',
							'hr.organisations.delete'						=> '2',
							'hr.organisations.default'						=> '2',

							'hr.organisation.documents.index'				=> '5',
							'hr.organisation.documents.show'				=> '5',
							'hr.organisation.documents.create'				=> '5',
							'hr.organisation.documents.store'				=> '5',
							'hr.organisation.documents.update'				=> '5',
							'hr.organisation.documents.edit'				=> '5',
							'hr.organisation.documents.delete'				=> '5',

							'hr.organisation.calendars.index'				=> '6',
							'hr.organisation.calendars.show'				=> '6',
							'hr.organisation.calendars.create'				=> '6',
							'hr.organisation.calendars.store'				=> '6',
							'hr.organisation.calendars.update'				=> '6',
							'hr.organisation.calendars.edit'				=> '6',
							'hr.organisation.calendars.delete'				=> '6',

							'hr.organisation.workleaves.index'				=> '6',
							'hr.organisation.workleaves.show'				=> '6',
							'hr.organisation.workleaves.create'				=> '6',
							'hr.organisation.workleaves.store'				=> '6',
							'hr.organisation.workleaves.update'				=> '6',
							'hr.organisation.workleaves.edit'				=> '6',
							'hr.organisation.workleaves.delete'				=> '6',

							'hr.organisation.branches.index'				=> '4',
							'hr.organisation.branches.show'					=> '4',
							'hr.organisation.branches.create'				=> '4',
							'hr.organisation.branches.store'				=> '4',
							'hr.organisation.branches.update'				=> '4',
							'hr.organisation.branches.edit'					=> '4',
							'hr.organisation.branches.delete'				=> '4',

							'hr.branches.contacts.index'					=> '4',
							'hr.branches.contacts.show'						=> '4',
							'hr.branches.contacts.store'					=> '4',
							'hr.branches.contacts.delete'					=> '4',

							'hr.branches.charts.index'						=> '4',
							'hr.branches.charts.create'						=> '4',
							'hr.branches.charts.show'						=> '4',
							'hr.branches.charts.store'						=> '4',
							'hr.branches.charts.edit'						=> '4',
							'hr.branches.charts.update'						=> '4',
							'hr.branches.charts.delete'						=> '4',
							
							'hr.document.persons.index'						=> '5',
							'hr.document.templates.delete'					=> '5',

							'hr.calendars.schedules.store'					=> '6',
							'hr.calendars.persons.store'					=> '6',
							'hr.calendars.charts.store'						=> '6',

							'hr.workleaves.persons.store'					=> '6',

							'hr.persons.index'								=> '7',
							'hr.persons.show'								=> '7',
							'hr.persons.create'								=> '7',
							'hr.persons.store'								=> '7',
							'hr.persons.edit'								=> '7',
							'hr.persons.update'								=> '7',
							'hr.persons.delete'								=> '7',
							
							'hr.persons.relatives.index'					=> '7',
							'hr.persons.relatives.show'						=> '7',
							'hr.persons.relatives.store'					=> '7',
							'hr.persons.relatives.delete'					=> '7',

							'hr.persons.documents.index'					=> '7',
							'hr.persons.documents.show'						=> '7',
							'hr.persons.documents.store'					=> '7',
							'hr.persons.documents.delete'					=> '7',
							'hr.persons.documents.print'					=> '7',
							'hr.persons.documents.pdf'						=> '7',

							'hr.persons.works.index'						=> '7',
							'hr.persons.works.store'						=> '7',
							'hr.persons.works.edit'							=> '7',
							'hr.persons.works.update'						=> '7',
							
							'hr.persons.contacts.index'						=> '7',
							'hr.persons.contacts.store'						=> '7',
							'hr.persons.contacts.edit'						=> '7',
							'hr.persons.contacts.update'					=> '7',

							'hr.persons.schedules.index'					=> '7',
							'hr.persons.schedules.store'					=> '7',
							'hr.persons.schedules.delete'					=> '7',

							'hr.persons.workleaves.index'					=> '7',
							'hr.persons.workleaves.store'					=> '7',
							'hr.persons.workleaves.delete'					=> '7',

							'hr.report.attendance.get'						=> '8',
							'hr.report.performance.get'						=> '8',
							'hr.report.wages.get'							=> '8',
							'hr.report.attendance.detail'					=> '8',
							'hr.report.attendance.post'						=> '8',
							'hr.report.wages.post'							=> '8',
							'hr.report.performance.post'					=> '8',
							'hr.report.attendance.csv'						=> '8',
							'hr.report.attendance.csvd'						=> '8',
							'hr.report.wages.csv'							=> '8',

							'hr.schedule.list'								=> '6',
							'hr.schedule.person.list'						=> '6',
							'hr.images.upload'								=> '7',
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
			require app_path('Http/routes.api.php');
			require app_path('Http/routes.cron.php');
		});
	}

}