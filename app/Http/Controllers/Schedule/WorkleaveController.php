<?php namespace App\Http\Controllers\Schedule;

use Input, Session, App, Redirect, Paginator;
use API;
use App\Http\Controllers\Controller;

class WorkleaveController extends Controller {

	protected $controller_name = 'cuti';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= [];
		if(Input::has('q'))
		{
			$search 								= ['name' => Input::get('q')];
		}

		if(Input::has('branch'))
		{
			$search['branchname'] 					= Input::get('branch');
		}

		if(Input::has('chart'))
		{
			$search['chartname'] 					= Input::get('chart');
		}

		$search['ondate'] 							= [Input::get('end'), Input::get('start')];

		$sort 										= ['apply' => 'asc'];

		$results 									= API::workleave()->index($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$data 										= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$search 									= ['organisationid' => Session::get('user.organisation')];

		$sort 										= ['name' => 'asc'];

		$results_2 									= API::branch()->index($page, $search, $sort);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}
		
		$branches 									= json_decode(json_encode($contents_2->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper(($this->controller_name));

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->branches 			= $branches;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}


	function postStore($id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['workleave'] 						= Input::only('name', 'apply', 'expired', 'quota');

		$input['workleave']['id'] 					= $id;

		//consider save many chart id
		$input['charts'][]							= Input::get('chart_ids');

		$results 									= API::workleave()->store($id, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.workleaves.index')->with('alert_success', 'Data Cuti sudah di simpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function postUpdate($id)
	{
		return $this->postStore($id);
	}
}
