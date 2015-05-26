<?php namespace App\Http\Controllers\Person;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use API;
use App\Http\Controllers\Controller;

class WorkController extends Controller {

	protected $controller_name = 'personalia';

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

		$search 									= ['CurrentWork' => 'updated_at', 'CurrentContact' => 'item', 'Experiences' => 'created_at', 'requireddocuments' => 'documents.created_at', 'groupcontacts' => '', 'checkrelative' => ''];
		// $search['organisationid']					= Session::get('user.organisation');
		$results 									= API::person()->show($personid, $search);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$search 									= ['organisationid' => Session::get('user.organisation'), 'grouptag' => ''];

		$sort 										= ['tag' => 'asc'];

		$results_2 									= API::document()->index(1, $search, $sort);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}
		
		$documents 									= json_decode(json_encode($contents_2->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($contents->data->name);

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.show.karir.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->work 				= null;
		$this->layout->content->works 				= $works;
		$this->layout->content->documents 			= $documents;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->route 				= ['person_id' => $data['id']];

		return $this->layout;
	}

	function postStore($person_id, $id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		if(Input::has('work_company') || Input::has('work_organisation'))
		{
			if(Input::get('work_company')!='' || Input::has('work_organisation'))
			{
				$input['person']['id'] 				= $person_id;
				
				$chart['id'] 						= $id;
				$chart['chart_id'] 					= Input::get('work_company');
				$chart['status'] 					= Input::get('work_status');
				list($d,$m,$y) 						= explode('/', Input::get('work_start'));
				$start 								= "$y-$m-$d";
				$chart['start'] 					= date("Y-m-d", strtotime($start));
				$chart['calendar_id'] 				= Input::get('calendar');

				if(Input::get('work_organisation') && Input::get('work_position') != null)
				{
					$chart['organisation'] 			= Input::get('work_organisation');
					$chart['position'] 				= Input::get('work_position');
					unset($chart['chart_id']);
				}

				if(Input::get('work_end') && Input::get('work_end') != null)
				{
					list($d,$m,$y) 					= explode('/', Input::get('work_end'));
					$end 							= "$y-$m-$d";
					$chart['end'] 					= date("Y-m-d", strtotime($end));

					$chart['reason_end_job'] 		= Input::get('work_quit_reason');
				}
				else
				{
					if(Input::get('cur_work_end'))
					{
						$chart['end'] 						= NULL;
						$chart['reason_end_job'] 			= NULL;
					}
					else
					{
						$chart['end'] 						= "";
						$chart['reason_end_job'] 			= "";
					}
				}

				$input['works'][] 					= $chart;

				$results 							= API::person()->store($person_id, $input);

				$content 							= json_decode($results);
				if($content->meta->success)
				{
					return Redirect::route('hr.persons.works.index', ['id' => $person_id])->with('alert_success', 'Pekerjaan sudah disimpan');
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
		$this->layout->page_title 					= 'Karir '.strtoupper($contents->data->name);

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
