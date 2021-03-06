<?php namespace App\Http\Controllers\Organisation\Calendar;

use Input, Session, App, Redirect, Paginator;
use API;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller {

	protected $controller_name = 'jadwal';

	function __construct() 
	{
		parent::__construct();
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
		$schedule 									= Input::only('name', 'on', 'start', 'end', 'id', 'status');
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

		$schedule['start']							= date('H:i:s', strtotime($schedule['start']));
		$schedule['end']							= date('H:i:s', strtotime($schedule['end']));
		$input['schedules'][]						= $schedule;

		$results 									= API::calendar()->store($id, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::back()->with('alert_success', 'Data jadwal sudah di simpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function postUpdate($calid, $id)
	{
		return $this->postStore($calid, $id);
	}
}
