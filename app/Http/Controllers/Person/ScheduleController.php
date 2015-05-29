<?php namespace App\Http\Controllers\Person;

use Input, Session, App, Config, Paginator, Redirect, Validator, Response;
use API;
use App\Http\Controllers\Controller;
use DateTime, DateInterval, DatePeriod;

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

		$search 									= ['CurrentWork' => 'updated_at', 'CurrentContact' => 'item', 'Experiences' => 'created_at', 'requireddocuments' => 'documents.created_at', 'groupcontacts' => '', 'checkrelative' => ''];
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
		$input['organisation']['id']					= $org_id;

		//please make sure if the date is in range, make it as an array for every date => single date save in on
		//consider the id
		$schedule 									= Input::only('name', 'on', 'start', 'end', 'id', 'status', 'is_affect_workleave');
		if(isset($schedule['id'])&&$schedule['id']==0)
		{
			unset($schedule['id']);
		}
		unset($schedule['on']);
		list($d,$m,$y) 								= explode('/', Input::get('date_start'));
		if(Input::has('date_end'))
		{
			$schedule['on'][]						= date('Y-m-d', strtotime("$y-$m-$d"));
			list($d,$m,$y) 							= explode('/', Input::get('date_end'));
			$schedule['on'][]						= date('Y-m-d', strtotime("$y-$m-$d"));
		}
		else
		{
			$schedule['on']							= date('Y-m-d', strtotime("$y-$m-$d"));
		}

		// $schedule['on']								= date('Y-m-d', strtotime($schedule['on']));
		$schedule['start']							= date('H:i:s', strtotime($schedule['start']));
		$schedule['end']							= date('H:i:s', strtotime($schedule['end']));
		
		if(is_null($schedule['is_affect_workleave']))
		{
			$schedule['is_affect_workleave']			= false;
		}
		else
		{
			$schedule['is_affect_workleave']			= true;
		}
		
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

	function ajaxSchedulePerson($personid, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['personid' => $personid, 'ondate' => [Input::get('start'), Input::get('end')], 'WithAttributes' => ['person.workscalendars.calendar']];
		$sort 										= ['on' => 'asc'];
		$results 									= API::person()->scheduleIndex($page, $search, $sort);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$schedules 									= json_decode(json_encode($contents->data), true);

		// schedule
		$schedule = [];
		$begin 		= new DateTime( Input::get('start') );
		$ended 		= new DateTime( Input::get('end')  );

		$interval 	= DateInterval::createFromDateString('1 day');
		$periods 	= new DatePeriod($begin, $interval, $ended);
		$k=0;
		$j=0;
		foreach ( $periods as $period )
		{
			foreach($schedules as $i => $sh)	
			{
				if($period->format('Y-m-d') == date('Y-m-d', strtotime($sh['on'])))
				{
					$schedule[$k]['id']			= $sh['id'];
					$schedule[$k]['title'] 		= $sh['name'];

					if ((strtotime($sh['start']) < strtotime($sh['end'])) | (strtotime($sh['start']) != strtotime($sh['end'])))
					{
						$schedule[$k]['start']		= $sh['on'].'T'.$sh['start'];
						$schedule[$k]['end']		= $sh['on'].'T'.$sh['end'];
						$schedule[$k]['tes']		= 'oke';
					}
					else 
					{
						$schedule[$k]['start']		= $sh['on'].'T'.$sh['start'];
						$schedule[$k]['tes']		= 'not';

					}
					$schedule[$k]['status']			= $sh['status'];
					$schedule[$k]['affect_salary']	= $sh['is_affect_workleave'];
					$schedule[$k]['mode']			= 'schedule';
					$schedule[$k]['del_action']		= route('hr.persons.schedules.delete', ['person_id' => $sh['person_id'], 'id' => $sh['id']]);
					$k++;
				}
			}
			if($k==$j)
			{
				$schedule[$k]['id']				= $sh['id'];
				$schedule[$k]['title'] 			= 'normal';
				$schedule[$k]['start']			= $period->format('Y-m-d').'T'.$sh['person']['workscalendars'][0]['calendar']['start'];
				$schedule[$k]['end']			= $period->format('Y-m-d').$sh['person']['workscalendars'][0]['calendar']['end'];
				$schedule[$k]['tes']			= 'oke';
				$schedule[$k]['status']			= 'yea';
				$schedule[$k]['affect_salary']	= false;
				$schedule[$k]['mode']			= 'schedule';
				$schedule[$k]['del_action']		= route('hr.persons.schedules.delete', ['person_id' => $sh['person_id'], 'id' => $sh['id']]);
				$k++;
				$j++;
			}
			else
			{
				$j++;
			}
		}

		// log	
		$search 								= ['personid' => $personid,'local' => true,'WithAttributes' => ['person'], 'ondate'=> [Input::get('start'), Input::get('end')]];

		$results 								= API::log()->ProcessLogIndex(1, $search, $sort, 100);
		
		$contents 								= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$logs 									= json_decode(json_encode($contents->data), true);

		$j = count($schedule);
		foreach($logs as $i => $log)	
		{

				$schedule[$j]['id']			= $log['id'];
				$schedule[$j]['title'] 		= $log['name'];

				if ((strtotime($log['fp_start']) < strtotime($log['fp_end'])) | (strtotime($log['fp_start']) != strtotime($log['fp_end'])))
				{
					$schedule[$j]['start']			= $log['on'].'T'.$log['fp_start'];
					$schedule[$j]['end']			= $log['on'].'T'.$log['fp_end'];
					$schedule[$j]['tes']			= 'oke';
				}
				else 
				{
					$schedule[$j]['start']			= $log['on'].'T'.$log['fp_start'];
					$schedule[$j]['tes']			= 'not';
				}

				$schedule[$j]['status']				= 'log';
				$schedule[$j]['backgroundColor']	= '#9c27b0';
				$schedule[$j]['mode']				= 'log';				
				$j++;
		}

		return Response::json($schedule);		
	}	
}
