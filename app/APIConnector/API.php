<?php namespace App\APIConnector;

use Session;

class API {

	use APITrait;

	static function person()
	{
		return new APIPerson();
	}

	static function document()
	{
		return new APIDocument();
	}

	static function organisation()
	{
		return new APIOrganisation();
	}

	static function organisationbranch()
	{
		return new APIOrganisationBranch();
	}

	static function organisationchart()
	{
		return new APIOrganisationChart();
	}

	static function widget()
	{
		return new APIWidget();
	}	

	static function work()
	{
		return new APIWork();
	}	
}