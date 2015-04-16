<?php namespace App\Http\Controllers;

use \Input, Session, \Response, \DateTime;
use App\APIConnector\API;

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
			$search['firstname']					= Input::get('term');	
			$search['orlastname']					= Input::get('term');		
			$search['orprefixtitle']				= Input::get('term');		
			$search['orsuffixtitle']				= Input::get('term');		
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

	function searchChart($id)
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$search									= ['name' => Input::get('term'), 'parentbranch'=>$id];			
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
}