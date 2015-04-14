<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\APIConnector\API;
use Input, Session, DateTime;

class DashboardComposer {

	/**
	 * The user repository implementation.
	 *
	 * @var UserRepository
	 */
	protected $users;

	/**
	 * Create a new profile composer.
	 *
	 * @param  UserRepository  $users
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$methods = Session::get('dashboard');
		foreach ($methods as $method)
		{
			$dashboard[]	= ['data' => call_user_func([$this, $method['function']], $this), 'type' => $method['type'], 'title' => $method['title'], 'function' => $method['function'], 'id' => $method['id']];
		}

		$view = $view->with('dashboard', $dashboard);
	}

	public function total_documents()
	{
		$search										= ['isrequired' => true];
		
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::document()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		return ['number' => $contents->pagination->total_data];
	}

	public function total_letters()
	{
		$search										= ['isrequired' => false];
		
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::document()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		return ['number' => $contents->pagination->total_data];
	}

	public function total_employees()
	{
		$search										= ['checkwork' => 'active'];
		
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		return ['number' => $contents->pagination->total_data];
	}

	public function total_branches()
	{
		$search['ParentOrganisation']				= Session::get('user.organisation');
		
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::organisationbranch()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		return ['number' => $contents->pagination->total_data];
	}

	public function new_employees_3_days()
	{
		$days 										= new DateTime('- 3 days');

		$search										= ['checkCreate' => $days->format('Y-m-d'), 'checkwork' => 'active'];
		
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		return ['data' => json_decode(json_encode($contents->data),true)];
	}

	public function new_branches_1_year()
	{
		$days 										= new DateTime('- 1 year');

		$search										= ['checkCreate' => $days->format('Y-m-d'), 'ParentOrganisation' => Session::get('user.organisation')];
		
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::organisationbranch()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		return ['data' => json_decode(json_encode($contents->data),true)];
	}
}