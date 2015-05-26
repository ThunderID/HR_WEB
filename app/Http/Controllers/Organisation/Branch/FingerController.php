<?php namespace App\Http\Controllers\Organisation\Branch;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use API;
use App\Http\Controllers\Controller;

class FingerController extends Controller {

	protected $controller_name = 'jari';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getShow($branchid, $page = 1)
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

		$branchid 									= Input::get('branchid');

		$results 									= API::organisation()->show($org_id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);	

		if(Input::has('tag'))
		{
			$department 							= Input::get('tag');
		}
		else
		{
			$department 							= null;
		}

		$search 									= ['OrganisationID' => $org_id, 'CurrentContact' => 'is_default'];
		$search['withattributes']					= ['fingerprint', 'charts'];

		$results 									= API::branch()->show($branchid, $search);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$branch 									= json_decode(json_encode($contents->data), true);
		$finger 									= $branch['fingerprint'];

		$paginator 									= new Paginator(1, 1, 1, 1, 1);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= $data['name'];
		$this->layout->content 						= view('admin.pages.organisation.cabang.jari.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->branch 				= $branch;
		$this->layout->content->finger 				= $finger;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}


	function anyStore($branchid = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
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

		$input['branch']['id'] 						= $branchid;

		if(Input::has('right'))
		{
			$finger[strtolower(Input::get('right'))]= true;
		}
		elseif(Input::has('wrong'))
		{
			$finger[strtolower(Input::get('wrong'))]= false;
		}

		$input['finger']							= $finger;
		$input['finger']['id'] 						= Input::get('finger');
		$input['organisation']['id']				= $org_id;

		$results 									= API::branch()->store($branchid, $input);

		$content 									= json_decode($results);
		
		if($content->meta->success)
		{
			return Redirect::back()->with('alert_success', 'Cabang '.$content->data->name.' Sudah Tersimpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}
}
