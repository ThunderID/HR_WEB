<?php namespace App\Http\Controllers\Person;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use API;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller {

	protected $controller_name = 'personalia';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($personid, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['personid' => $personid, 'ondate' => [Input::get('start'), Input::get('end')]];
		
		$sort 										= ['on' => 'asc'];

		$results 									= API::person()->scheduleIndex($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$schedules 									= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$results 									= API::person()->show($personid);

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

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.show.jadwal.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->documents 			= $documents;
		$this->layout->content->schedules 			= $schedules;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function postStore($personid)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['person']['id'] 						= $personid;

		$input['organisation']['id']				= Session::get('user.organisation');

		//please make sure if the date is in range, make it as an array for every date => single date save in on
		//consider the id
		$schedule 									= Input::only('name', 'on', 'start', 'end', 'id', 'status');
		if(isset($schedule['id'])&&$schedule['id']==0)
		{
			unset($schedule['id']);
		}
		unset($schedule['on']);
		$schedule['on'][]							= date('Y-m-d', strtotime(Input::get('date_start')));
		$schedule['on'][]							= date('Y-m-d', strtotime(Input::get('date_end')));

		// $schedule['on']								= date('Y-m-d', strtotime($schedule['on']));
		$schedule['start']							= date('H:i:s', strtotime($schedule['start']));
		$schedule['end']							= date('H:i:s', strtotime($schedule['end']));
		$input['schedules'][]						= $schedule;

		$results 									= API::person()->scheduleStore($personid, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.persons.schedules.index', $personid)->with('alert_success', 'Data Kalender sudah di simpan');
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
			$results 									= API::person()->scheduleDestroy($personid, $id);

			$contents 									= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::route('hr.persons.schedules.index', [$personid])->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::route('hr.persons.schedules.index', [$personid])->with('alert_success', 'Jadwal sudah dihapus');
			}
		}
		else
		{
			return Redirect::route('hr.persons.schedules.index', [$personid])->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}
}
