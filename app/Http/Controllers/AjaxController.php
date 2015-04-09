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

	function search_company()
	{
		$search 									= [];
		if(Input::has('term'))
		{
			$search['name']							= 'asdad';			
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