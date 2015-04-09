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
}