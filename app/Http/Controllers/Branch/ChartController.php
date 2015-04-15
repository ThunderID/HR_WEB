<?php namespace App\Http\Controllers\Branch;

use Input, Session, App, Paginator, Redirect, Response;
use App\APIConnector\API;
use App\Http\Controllers\Controller;

class ChartController extends Controller {

	protected $controller_name = 'struktur';

	function __construct() 
	{
		parent::__construct();
	}

	function postStore($id = null)
	{
		$input['chart']								= Input::only('id', 'name', 'graph', 'graph_parent', 'min_employee', 'max_employee', 'ideal_employee');
		
		$results 									= API::organisationchart()->store($id, $input);

		$content 									= json_decode($results);
		
		if(!$content->meta->success)
		{
			return Response::json(['message' => 'Tidak dapat menyimpan data'], 500);
		}

		return Response::json(['id' => $content->data->id, 'name' => $content->data->name], 200);
	}
}
