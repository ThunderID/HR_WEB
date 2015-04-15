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

	function getShow($branch_id, $id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::organisationchart()->show($branch_id, $id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= $contents->data->name;
		$this->layout->content 						= view('admin.pages.organisation.kantor.'.$this->controller_name.'.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->structure 			= json_encode($structure);

		return $this->layout;
	}

	function postStore($id = null)
	{
		$input['chart']								= Input::only('id', 'name', 'graph', 'graph_parent', 'min_employee', 'max_employee', 'ideal_employee');
		
		$results 									= API::organisationchart()->store($id, $input);

		$content 									= json_decode($results);
		
		if(!$content->meta->success)
		{
			return Response::json(['message' => 'Tidak dapat menyimpan data. Silahkan cek data yang di entry'], 200);
		}

		return Response::json(['message' => 'Data Tersimpan !', 'id' => $content->data->id, 'name' => $content->data->name], 200);
	}

	function anyDelete($id = null)
	{
		$results 									= API::organisationchart()->destroy($id, Input::get('id'));

		$content 									= json_decode($results);
		
		if(!$content->meta->success)
		{
			return Response::json(['message' => $content->meta->errors[0]], 200);
		}

		return Response::json(['message' => 'Data Terhapus !', 'is_delete' => true], 200);
	}
}
