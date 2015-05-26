<?php namespace App\Http\Controllers\Person;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use API;
use App\Http\Controllers\Controller;

class RelativeController extends Controller {

	protected $controller_name = 'personalia';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($personid, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['checkrelation' => $personid, 'CurrentContact' => 'updated_at'];
		$sort 										= ['name' => 'asc'];

		$results 									= API::person()->index($page, $search, $sort);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$relatives 									= json_decode(json_encode($contents->data), true);
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

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.show.kerabat.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->documents 			= $documents;
		$this->layout->content->relatives 			= $relatives;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function postStore($personid)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['person']['id']						= $personid;
		if(Input::has('relationship'))
		{
			if(Input::get('relation')!='')
			{
				$relate['id'] 					= Input::get('relation');
				$relate['relationship'] 		= Input::get('relationship');
				$relate['organisation_id'] 		= Session::get('user.organisation');
				$input['relatives'][] 			= $relate;
			}
			else
			{
				$relate['prefix_title'] 		= Input::get('prefix_title');
				$relate['name'] 				= Input::get('name');
				$relate['suffix_title'] 		= Input::get('suffix_title');
				$relate['gender'] 				= Input::get('gender');
				$relate['date_of_birth'] 		= date("Y-m-d", strtotime(Input::get('place_of_birth')));
				$relate['place_of_birth'] 		= Input::get('place_of_birth');
				$relate['relationship'] 		= Input::get('relationship');
				$relate['relationship'] 		= Input::get('relationship');
				$relate['organisation_id'] 		= Session::get('user.organisation');
				$relate['contacts'][]	 		= ['item' => 'phone', 'value' => Input::get('phone')];
				$input['relatives'][] 			= $relate;
			}
		}

		if(!isset($input['relatives']))
		{
			return Redirect::back()->withErrors(['Tidak ada kerabat disimpan'])->withInput();
		}

		$results 										= API::person()->store($personid, $input);

		$content 										= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.persons.relatives.index', [$content->data->id])->with('alert_success', 'Kerabat sudah disimpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function anyDelete($personid, $id)
	{
		$username 					= Session::get('user.email');
		$password 					= Input::get('password');

		$results 					= API::person()->authenticate($username, $password);

		$content 					= json_decode($results);

		if($content->meta->success)
		{
			$results 									= API::person()->relativedestroy($personid, $id);

			$contents 									= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::route('hr.persons.relatives.index', [$personid])->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::route('hr.persons.relatives.index', [$personid])->with('alert_success', 'Kerabat sudah dihapus');
			}
		}
		else
		{
			return Redirect::route('hr.persons.relatives.index', [$personid])->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}
}
