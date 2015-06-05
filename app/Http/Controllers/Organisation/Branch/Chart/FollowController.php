<?php namespace App\Http\Controllers\Organisation\Branch\Chart;

use Input, Session, App, Paginator, Redirect, Response, Request;
use API;
use App\Http\Controllers\Controller;

class FollowController extends Controller {

	protected $controller_name = 'struktur';

	function __construct() 
	{
		parent::__construct();
	}

	function getIndex($id, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		if(Input::has('org_id'))
		{
			$org_id 								= Input::get('org_id');
		}
		else
		{
			$org_id 								= Session::get('user.organisation');
		}

		if(!in_array($org_id, Session::get('user.orgids')))
		{
			App::abort(404);
		}

		$results 									= API::organisation()->show($org_id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$branchid 									= Input::get('branchid');

		if(Input::has('tag'))
		{
			$department 							= Input::get('tag');
		}
		else
		{
			$department 							= null;
		}

		$results 									= API::branch()->show($branchid);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$branch 									= json_decode(json_encode($contents->data), true);
		
		$results_2 									= API::chart()->show($id, ['branchid' => $branchid]);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}

		$chart 										= json_decode(json_encode($contents_2->data), true);

		$search 									= ['chartid' => $id, 'WithAttributes' => ['calendar']];

		$results_3 									= API::calendar()->followIndex(1, $search, ['chart_id' => 'asc']);

		$contents 									= json_decode($results_3);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$follows 									= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= $data['name'];
		$this->layout->content 						= view('admin.pages.organisation.cabang.'.$this->controller_name.'.kalender.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->branch 				= $branch;
		$this->layout->content->chart 				= $chart;
		$this->layout->content->follows 			= $follows;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function postStore($id)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['calendar']['id'] 					= $id;

		if(Input::has('org_id'))
		{
			$org_id 								= Input::get('org_id');
		}
		else
		{
			$org_id 								= Session::get('user.organisation');
		}

		if(!in_array($org_id, Session::get('user.orgids')))
		{
			App::abort(404);
		}

		$input['organisation']['id']				= $org_id;
		//please make sure if the date is in range, make it as an array for every date => single date save in on
		//consider the id

		$input['charts'][]							= ['chart_id' => $id];
		$calendars 									= explode(',', Input::get('calendar'));
		foreach ($calendars as $key => $value) 
		{
			$results 								= API::calendar()->store($value, $input);
		}


		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::back()->with('alert_success', 'Data Kalender Kerja sudah di simpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function anyDelete($chartid, $id)
	{
		$email 										= Session::get('user.email');
		$password 									= Input::get('password');

		$results 									= API::person()->authenticate($email, $password);

		$content 									= json_decode($results);

		if($content->meta->success)
		{
			$results 								= API::calendar()->followdestroy($chartid, $id);

			$contents 								= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::back()->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::back()->with('alert_success', 'Kalender Kerja sudah dihapus');
			}
		}
		else
		{
			return Redirect::back()->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}

}
