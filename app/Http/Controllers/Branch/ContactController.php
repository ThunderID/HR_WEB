<?php namespace App\Http\Controllers\Branch;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use API;
use App\Http\Controllers\Controller;

class ContactController extends Controller {

	protected $controller_name = 'kantor';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($branchid, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		if(Input::has('tag'))
		{
			$department 							= Input::get('tag');
		}
		else
		{
			$department 							= null;
		}

		$results 									= API::organisationbranch()->show($branchid, $department);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);
		
		$search 									= ['branchid' => $branchid];
		if(Input::has('item'))
		{
			$search['item']							= Input::get('item');
		}

		$sort 										= ['is_default' => 'desc'];

		$results_3 									= API::organisationbranch()->contactIndex($page, $search, $sort);

		$contents 									= json_decode($results_3);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$contacts 									= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= $data['name'];
		$this->layout->content 						= view('admin.pages.organisation.kantor.show.kontak.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->contacts 			= $contacts;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}
}
