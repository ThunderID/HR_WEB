<?php namespace App\Http\Controllers\Person;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use App\APIConnector\API;
use App\Http\Controllers\Controller;

class WorkController extends Controller {

	protected $controller_name = 'karyawan';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($personid, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['WithAttributes' => ['Chart', 'Chart.branch', 'person']];
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->workIndex($personid, $page, $search, $sort);

		$contents 									= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$works 										= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$results 									= API::person()->show($personid);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Karir '.strtoupper($contents->data->nick_name);

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.karir.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->work 				= null;
		$this->layout->content->works 				= $works;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->route 				= ['person_id' => $data['id']];

		return $this->layout;
	}

	function postStore($person_id, $id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		if(Input::has('work_company'))
		{
			if(Input::get('work_company')!='')
			{
				$input['person']['id'] 				= $person_id;
				
				$chart['id'] 						= $id;
				$chart['chart_id'] 					= Input::get('work_company');
				$chart['status'] 					= Input::get('work_status');
				$chart['start'] 					= date("Y-m-d", strtotime(Input::get('work_start')));
				if(Input::get('work_end'))
				{
					$chart['end'] 						= date("Y-m-d", strtotime(Input::get('work_end')));
					$chart['reason_end_job'] 			= Input::get('work_quit_reason');
				}
				$input['works'][] 					= $chart;

				$results 							= API::person()->store($person_id, $input);

				$content 							= json_decode($results);
				if($content->meta->success)
				{
					return Redirect::route('hr.persons.index');
				}

				return Redirect::back()->withErrors($content->meta->errors)->withInput();
			}
		}

		return Redirect::back()->withErrors(['Tidak ada data tersimpan'])->withInput();
	}

	function getEdit($personid, $id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::person()->workshow($personid, $id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$work 										= json_decode(json_encode($contents->data), true);

		$search 									= ['WithAttributes' => ['Chart', 'Chart.branch', 'person']];
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->workIndex($personid, 1, $search, $sort);

		$contents 									= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$works 										= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$results 									= API::person()->show($personid);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Karir '.strtoupper($contents->data->nick_name);

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.karir.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->work 				= $work;
		$this->layout->content->works 				= $works;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->route 				= ['person_id' => $data['id']];

		return $this->layout;
	}

	function postUpdate($personid, $id)
	{
		return $this->postStore($personid, $id);
	}
}
