<?php namespace App\Http\Controllers\Schedule;

use Input, Session, App, Redirect, Paginator;
use API;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller {

	protected $controller_name = 'jadwal';

	function __construct() 
	{
		parent::__construct();
	}
	
	function postStore($calid, $id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['calendar']['id'] 					= $calid;

		$input['organisation']['id']				= Session::get('user.organisation');

		//please make sure if the date is in range, make it as an array for every date => single date save in on
		//consider the id
		$schedule 									= Input::only('name', 'on', 'start', 'end', 'id');
		$schedule['on']								= date('Y-m-d', strtotime($schedule['on']));
		$schedule['start']							= date('H:i:s', strtotime($schedule['start']));
		$schedule['end']							= date('H:i:s', strtotime($schedule['end']));
		$input['schedules'][]						= $schedule;

		$results 									= API::calendar()->store($calid, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.calendars.show', $calid)->with('alert_success', 'Data Kalender sudah di simpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function postUpdate($calid, $id)
	{
		return $this->postStore($calid, $id);
	}
}