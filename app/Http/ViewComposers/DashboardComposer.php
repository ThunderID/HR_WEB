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
		$dashboard 							= [];
		foreach (Session::get('dashboard') as $key => $value) 
		{
			$dashboard[]					= [
												'id'		=> $value['id'],
												'title'		=> $value['title'],
												'type'		=> $value['type'],
												'function'	=> $value['function'],
												'field'		=> (array)json_decode($value['field']),
												'data'		=> call_user_func([$this, $value['function']], (array)json_decode($value['query'])),
												];
		}

		$view = $view->with('dashboard', $dashboard);
	}

	public function total_documents($search)
	{
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::document()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		return ['number' => $contents->pagination->total_data];
	}

	public function total_employees($search)
	{
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		return ['number' => $contents->pagination->total_data];
	}

	public function total_branches($search)
	{
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::organisationbranch()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		return ['number' => $contents->pagination->total_data];
	}

	public function index_employees($search)
	{
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		return ['data' => json_decode(json_encode($contents->data),true)];
	}

	public function index_documents($search)
	{
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::document()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		return ['data' => json_decode(json_encode($contents->data),true)];
	}

	public function index_branches($search)
	{
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