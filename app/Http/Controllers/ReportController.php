<?php namespace App\Http\Controllers;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use API;
use App\Http\Controllers\Controller;

class ReportController extends Controller {

	protected $controller_name = 'attendance';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getAttendance($page = null)
	{
		// ---------------------- LOAD DATA ----------------------
		if(Input::has('start'))
		{
			$search 								= ['global' => true,'WithAttributes' => ['person'], 'ondate'=> [Input::get('start'), Input::get('end')]];
		}
		else
		{
			$search 								= ['global' => true,'WithAttributes' => ['person']];
		}
		$sort 										= [];

		if(Input::has('case'))
		{
			switch (Input::get('case')) 
			{
				case 'late':
					$search['late']					= true;
					$sort 							= ['margin_start' => 'asc'];
					break;
				case 'ontime':
					$search['ontime']				= true;
					$sort 							= ['margin_start' => 'desc'];
					break;
				case 'earlier':
					$search['earlier']				= true;
					$sort 							= ['margin_end' => 'asc'];
					break;
				case 'overtime':
					$search['overtime']				= true;
					$sort 							= ['margin_end' => 'desc'];
					break;
				default:
					App::abort('404');
				break;
			}
		}

		if(Input::has('branch'))
		{
			$search['branchname'] 					= Input::get('branch');
		}

		if(Input::has('tag'))
		{
			$search['charttag'] 					= Input::get('tag');
		}

		$results 									= API::log()->ProcessLogIndex($page, $search, $sort, true);
		
		$contents 									= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$search 									= ['organisationid' => Session::get('user.organisation')];

		if(Input::has('branch'))
		{
			$search['name']							= Input::get('branch');
			$search['DisplayDepartments']			= '';
		}

		$sort 										= ['name' => 'asc'];

		$results_2 									= API::branch()->index(1, $search, $sort);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}
		
		$branches 									= json_decode(json_encode($contents_2->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords('Generate Attendance Report');

		$this->layout->content 						= view('admin.pages.reports.'.$this->controller_name.'.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->branches 			= $branches;

		return $this->layout;
	}

	function getForm()
	{
		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords('Generate Attendance Report');

		$this->layout->content 						= view('admin.pages.reports.'.$this->controller_name.'.form');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= null;

		return $this->layout;
	}
}
