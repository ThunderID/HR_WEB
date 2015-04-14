<?php namespace App\Http\Controllers\Person;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use App\APIConnector\API;
use App\Http\Controllers\AdminController;

class RelativeController extends AdminController {

	protected $controller_name = 'karyawan';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($personid, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['checkrelation' => $personid, 'CurrentContact' => 'updated_at'];
		$sort 										= ['first_name' => 'asc'];

		$results 									= API::person()->index($page, $search, $sort);

		$contents 									= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$relatives 									= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$results 									= API::person()->show($personid);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Kerabat '.strtoupper($contents->data->nick_name);

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.kerabat.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
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
				$input['relatives'][] 			= $relate;
			}
			else
			{
				$relate['prefix_title'] 		= Input::get('prefix_title_relation');
				$relate['first_name'] 			= Input::get('first_name_relation');
				$relate['middle_name'] 			= Input::get('midle_name_relation');
				$relate['last_name'] 			= Input::get('last_name_relation');
				$relate['suffix_title'] 		= Input::get('suffix_title_relation');
				$relate['nick_name'] 			= Input::get('nick_name_relation');
				$relate['gender'] 				= Input::get('gender_relation');
				$relate['date_of_birth'] 		= date("Y-m-d", strtotime(Input::get('place_of_birth_relation')));
				$relate['place_of_birth'] 		= Input::get('place_of_birth_relation');
				$relate['relationship'] 		= Input::get('relationship');
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
			return Redirect::route('hr.persons.relatives.index', [$content->data->id]);
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function anyDelete($personid, $id)
	{
		$results 									= API::person()->relativedestroy($personid, $id);

		$contents 									= json_decode($results);

		if (!$contents->meta->success)
		{
			return Redirect::back()->withErrors($contents->meta->errors);
		}
		else
		{
			return Redirect::route('hr.persons.relatives.index', [$personid])->with('alert_success', 'Kerabat sudah dihapus');
		}
	}
}
