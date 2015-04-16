<?php namespace App\Http\Controllers\Branch;

use Input, Session, App, Paginator, Redirect, Response, Request;
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

		return $this->layout;
	}

	function getCreate()
	{
		// ---------------------- LOAD DATA ----------------------
		// $results 									= API::organisationchart()->show($branch_id, $id);

		// $contents 									= json_decode($results);

		// if(!$contents->meta->success)
		// {
		// 	App::abort(404);
		// }

		// $data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		// $this->layout->page_title 					= $contents->data->name;
		$this->layout->content 						= view('admin.pages.organisation.kantor.'.$this->controller_name.'.add');
		$this->layout->content->controller_name 	= $this->controller_name;
		// $this->layout->content->data 				= $data;

		return $this->layout;
	}	

	function postStore($id = null)
	{
		if (Request::ajax())
		{
			$input['chart']							= Input::only('id', 'name', 'graph', 'graph_parent', 'min_employee', 'max_employee', 'ideal_employee');
			
			$results 								= API::organisationchart()->store($id, $input);

			$content 								= json_decode($results);
			
			if(!$content->meta->success)
			{
				return Response::json(['message' => 'Tidak dapat menyimpan data. Silahkan cek data yang di entry'], 200);
			}

			return Response::json(['message' => 'Data Tersimpan !', 'id' => $content->data->id, 'name' => $content->data->name], 200);
		}

		$input['chart']['id']						= Input::get('chart_id');
		foreach (Input::get('id') as $key => $value) 
		{
			$application['id']						= $value;
			$application['application_id']			= Input::get('application_id')[$key];
			if(isset(Input::get('is_create')[$key]))
			{
				$application['is_create']			= true;
			}
			else
			{
				$application['is_create']			= false;
			}
			if(isset(Input::get('is_read')[$key]))
			{
				$application['is_read']				= true;
			}
			else
			{
				$application['is_read']				= false;
			}
			if(isset(Input::get('is_update')[$key]))
			{
				$application['is_update']			= true;
			}
			else
			{
				$application['is_update']			= false;
			}
			if(isset(Input::get('is_delete')[$key]))
			{
				$application['is_delete']			= true;
			}
			else
			{
				$application['is_delete']			= false;
			}
			$input['application'][]					= $application;
		}
		$results 									= API::organisationchart()->store($id, $input);

		$content 									= json_decode($results);
		
		if($content->meta->success)
		{
			return Redirect::route('hr.organisation.charts.show', [$id, $input['chart']['id']]);
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
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
