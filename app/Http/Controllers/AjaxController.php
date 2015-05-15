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

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->index(1, $search, $sort);
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
			$search									= ['orname' => $keyword, 'ortag' => $keyword, 'orbranchname' => $keyword, 'WithAttributes' => ['branch']];			
		}

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::chart()->index(1, $search, $sort);

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
			$search									= ['name' => Input::get('term'), 'parentbranch' => $id, 'WithAttributes' => ['calendar']];
		}
		if(!is_null($path))
		{
			$search['neighbor'] 					= $path;
		}

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::chart()->index(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(NULL,500);
		}

		return Response::json($contents->data);
	}		

	function searchFollow($id)
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$search									= ['chartid' => Input::get('term')];
		}

		$sort 										= ['chart_id' => 'asc'];

		$results 									= API::calendar()->followIndex(1, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			return Response::json(NULL,500);
		}

		return Response::json($contents->data);
	}
}