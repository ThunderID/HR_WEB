<?php namespace App\Http\Controllers;

// use \App\DAL\Models\PersonBasicInformation;
use \Input, Session, \Response, \DateTime;
use App\APIConnector\API;
// use Illuminate\Pagination\LengthAwarePaginator;

class AjaxController extends AdminController {

	protected $controller_name = 'ajax';

	function __construct() 
	{
		parent::__construct();

	}

	function search_name()
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$search['firstname']					= Input::get('term');	
			// $search['middlename']					= Input::get('term');
			// $search['lastname']						= Input::get('term');		
		}

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->index(1, $search, $sort);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(NULL,500);
		}

		return Response::json($contents->data);
	}


	function search_company()
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$search									= ['name' => Input::get('term'), 'WithAttributes' => ['branch']];			
		}

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::organisationchart()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(NULL,500);
		}

		return Response::json($contents->data);
	}

	function search_department()
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$search['id']							= Input::get('term');			
		}

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::organisationbranch()->index(1, $search, $sort);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(NULL,500);
		}

		return Response::json($contents->data);
	}	

	function search_position()
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$search['id']							= Input::get('term');			
		}

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::organisationbranch()->index(1, $search, $sort);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(NULL,500);
		}

		return Response::json($contents->data);
	}	 
		
}