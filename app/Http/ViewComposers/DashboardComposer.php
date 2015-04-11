<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\APIConnector\API;
use Input, Session;

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
		// Dependencies automatically resolved by service container...
		// $this->users = $users;
	}

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$person 	= $this->person(1);
		$branches 	= $this->branches(1);
		$document 	= $this->document(1);

		
		$view->with('person', $person)
			->with('branches', $branches)
			->with('document', $document);
	}

	public function person($page)
	{
		$search                                     = ['WithAttributes' => ['contacts']];
		if(Input::has('q'))
		{
			if(Input::has('field'))
			{
				$search[Input::get('field')]        = Input::get('q');          
			}
			else
			{
				$search['firstname']                = Input::get('q');          
				$search['orlastname']               = Input::get('q');          
				$search['orprefixtitle']            = Input::get('q');          
				$search['orsuffixtitle']            = Input::get('q');          
			}
		}

		if(Input::has('sort_firstname'))
		{
			$sort['first_name']                     = Input::get('sort_firstname');         
		}
		elseif(Input::has('sort_lastname'))
		{
			$sort['last_name']                      = Input::get('sort_lastname');          
		}
		else
		{
			$sort                                   = ['created_at' => 'asc'];
		}

		$results                                    = API::person()->index($page, $search, $sort);

		$contents                                   = json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data                                       = json_decode(json_encode($contents->data), true);

		return $data;
	}

	public function branches($page)
	{
		$search['ParentOrganisation']				= Session::get('user.organisation');
		if(Input::has('q'))
		{
			$search['name']							= Input::get('q');			
		}

		if(Input::has('sort_name'))
		{
			$sort['name']							= Input::get('sort_name');			
		}
		elseif(Input::has('sort_date'))
		{
			$sort['created_at']						= Input::get('sort_date');			
		}
		else
		{
			$sort 									= ['created_at' => 'asc'];
		}

		$results 									= API::organisationbranch()->index($page, $search, $sort);
		// $contents 									= json_decode($results);

		// if(!$contents->meta->success)
		// {
		// 	App::abort(404);
		// }
		
		// $data 										= json_decode(json_encode($contents->data), true);

		return $results;
	}

	public function document($page)
	{
		$search                                     = ['WithAttributes' => ['persons']];
		$sort                                       = ['created_at' => 'asc'];

		$results                                    = API::document()->index($page, $search, $sort);
		// $contents                                   = json_decode($results);

		// if(!$contents->meta->success)
		// {
		// 	App::abort(404);
		// }
		
		// $data                                       = json_decode(json_encode($contents->data), true);

		return $results;
	}

}