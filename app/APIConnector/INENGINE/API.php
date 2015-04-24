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

	static function application()
	{
		return new APIApplication();
	}	
}