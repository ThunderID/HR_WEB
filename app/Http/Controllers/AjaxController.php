<?php namespace App\Http\Controllers;

use \Input, Session, \Response, \DateTime;
use API;

class AjaxController extends Controller {

	protected $controller_name = 'ajax';

	function __construct() 
	{
		parent::__construct();

	}

	function searchName()
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$search['fullname']						= Input::get('term');	
		}
		$search['organisationid']					= Session::get('user.organisation');

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->index(1, $search, $sort, 100);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(NULL,500);
		}

		return Response::json($contents->data);
	}


	function searchCompany()
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$keyword 								= explode(' ', Input::get('term'));
			$search									= ['orname' => $keyword, 'ortag' => $keyword, 'orbranchname' => $keyword];			
		}
		$search['organisationid']					= Session::get('user.organisation');

		$sort 										= ['charts.name' => 'asc'];

		$results 									= API::chart()->index(1, $search, $sort, 100);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(NULL,500);
		}

		return Response::json($contents->data);
	}

	function searchCalendar()
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$keyword 								= explode(' ', Input::get('term'));
			$search									= ['orname' => $keyword];			
		}
		$search['organisationid']					= Session::get('user.organisation');

		$sort 										= ['name' => 'asc'];

		$results 									= API::calendar()->index(1, $search, $sort, 100);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(NULL,500);
		}

		return Response::json($contents->data);
	}

	function searchWorkleave()
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$search['name']							= Input::get('term');	
		}

		$search['organisationid']					= Session::get('user.organisation');	

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::workleave()->index(1, $search, $sort, 100);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(NULL,500);
		}

		return Response::json($contents->data);
	}

	function searchChart($id, $path=null)
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$search									= ['name' => Input::get('term'), 'parentbranch' => $id];
		}
		if(!is_null($path))
		{
			$search['neighbor'] 					= $path;
		}

		$search['organisationid']					= Session::get('user.organisation');

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::chart()->index(1, $search, $sort, 100);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(NULL,500);
		}

		return Response::json($contents->data);
	}		

	function searchFollow()
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$search									= ['chartid' => Input::get('term'), 'WithAttributes' => ['calendar']];
		}

		$sort 										= ['chart_id' => 'asc'];

		$results 									= API::calendar()->followIndex(1, $search, $sort, 100);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(NULL,500);
		}

		return Response::json($contents->data);
	}
}