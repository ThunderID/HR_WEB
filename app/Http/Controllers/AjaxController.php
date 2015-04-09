<?php namespace App\Http\Controllers;

// use \App\DAL\Models\PersonBasicInformation;
use \Input, Session, \Response, \DateTime;
use App\APIConnector\API;
// use Illuminate\Pagination\LengthAwarePaginator;

class AjaxController extends AdminController {

	protected $controller_name = 'ajax';

	function __construct() 
	{
		parent::__construct();

		// $this->model = $model;
	}

	function search_company()
	{
		$product = Input::get('company');

		$products = 

		return Response::json($products);
	}
}