<?php namespace App\Http\Controllers\Person;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use API;
use App\Http\Controllers\Controller;

class ContactController extends Controller {

	protected $controller_name = 'personalia';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($personid, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['personid' => $personid];
		if(Input::has('item'))
		{
			$search['item']							= Input::get('item');
		}

		if(Input::has('messageService'))
		{
			$search['messageservices']				= Input::get('messageService');
		}

		$sort 										= ['is_default' => 'desc'];

		$results 									= API::person()->contactIndex($page, $search, $sort);

		$contents 									= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$contacts 									= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$search 									= ['CurrentWork' => null, 'CurrentContact' => 'item', 'Experiences' => 'created_at', 'requireddocuments' => 'documents.created_at', 'groupcontacts' => '', 'checkrelative' => ''];
		$search['organisationid']					= Session::get('user.organisation');
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

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.show.kontak.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->contact 			= null;
		$this->layout->content->contacts 			= $contacts;
		$this->layout->content->documents 			= $documents;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->route 				= ['person_id' => $data['id']];

		return $this->layout;
	}
}
