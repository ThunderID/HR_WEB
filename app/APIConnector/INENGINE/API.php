<?php namespace App\APIConnector\INENGINE;

use Session;

class API {

	static function person()
	{
		return new APIPerson();
	}

	static function document()
	{
		return new APIDocument();
	}

	static function branch()
	{
		return new APIBranch();
	}

	static function chart()
	{
		return new APIChart();
	}

	static function calendar()
	{
		return new APICalendar();
	}	

	static function schedule()
	{
		return new APISchedule();
	}	

	static function workleave()
	{
		return new APIWorkleave();
	}	

	static function log()
	{
		return new APILog();
	}	

	static function widget()
	{
		return new APIWidget();
	}	

	static function application()
	{
		return new APIApplication();
	}	
}