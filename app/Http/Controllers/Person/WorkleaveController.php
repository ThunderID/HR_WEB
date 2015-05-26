<?php namespace App\Http\Controllers\Person;

use Input, Session, App, Config, Paginator, Redirect, Validator, Response;
use API;
use App\Http\Controllers\Controller;

class WorkleaveController extends Controller {

	protected $controller_name = 'personalia';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($personid, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['personid' => $personid, 'withAttributes' => ['workleave']];
		
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->workleaveIndex($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$workleaves 								= json_decode(json_encode($contents->data), true);

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

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.show.cuti.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->documents 			= $documents;
		$this->layout->content->workleaves 			= $workleaves;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function postStore($personid)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['person']['id'] 						= $personid;

		//please make sure if the date is in range, make it as an array for every date => single date save in on
		//consider the id
		$workleave 									= Input::only('id', 'is_default');
		if(isset($workleave['id'])&&$workleave['id']==0)
		{
			unset($workleave['id']);
		}

		list($d,$m,$y) 								= explode('/', Input::get('start'));
		$workleave['start']							= date('Y-m-d', strtotime("$y-$m-$d"));

		list($d,$m,$y) 								= explode('/', Input::get('end'));
		$workleave['end']							= date('Y-m-d', strtotime("$y-$m-$d"));
		
		$workleave['workleave_id']					= Input::get('workleave');
		if(is_null($workleave['is_default']))
		{
			$workleave['is_default']				= false;
		}
		else
		{
			$workleave['is_default']				= true;
		}
		
		$input['workleaves'][]						= $workleave;

		$results 									= API::person()->workleaveStore($personid, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.persons.workleaves.index', $personid)->with('alert_success', 'Data Cuti sudah di simpan');
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
			$results 									= API::person()->workleaveDestroy($personid, $id);

			$contents 									= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::route('hr.persons.workleaves.index', [$personid])->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::route('hr.persons.workleaves.index', [$personid])->with('alert_success', 'Cuti sudah dihapus');
			}
		}
		else
		{
			return Redirect::route('hr.persons.workleaves.index', [$personid])->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}
}
