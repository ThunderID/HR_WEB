<?php namespace App\Http\Controllers;

use Input, Session, App, Config, Paginator;
use App\APIConnector\API;

class WorkController extends AdminController {

	protected $controller_name = 'work';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($person_id, $page = 1)
	{

		// ---------------------- LOAD DATA ----------------------
		$search 									= [];

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::work()->index($page, $search, $sort, $person_id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		// $data 										= json_decode(json_encode($contents->data), true);
		// $paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// // ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper(str_plural($this->controller_name));

		// if(Input::has('q'))
		// {
		// 	$this->layout->page_title 				= 'Hasil Pencarian "'.Input::get('q').'"';
		// }

		$this->layout->content 						= view('admin.pages.work.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		// $this->layout->content->data 				= $data;
		// $this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function getCreate($id = null)
	{

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title = strtoupper($this->controller_name);

		$this->layout->content = view('admin.pages.person.create');
		$this->layout->content->controller_name = $this->controller_name;


		return $this->layout;
	}

	function postStore($id = null)
	{
		// ---------------------- LOAD DATA ----------------------
		// if (!is_null($id))
		// {
		// 	$data = $this->model->findorfail($id);
		// }
		// else
		// {
		// 	$data = $this->model->newInstance();
		// }

		// // ---------------------- HANDLE INPUT ----------------------
		// $input = Input::all();
		// $input['contact_person']['name'] = Input::get('contact_person_name');
		// $input['contact_person']['phone'] = Input::get('contact_person_phone');
		// $input['contact_person']['email'] = Input::get('contact_person_email');

		// $input['address']['street'] = Input::get('address_street');
		// $input['address']['city'] = Input::get('address_city');
		// $input['address']['province'] = Input::get('address_province');
		// $input['address']['country'] = Input::get('address_country');

		// if ($logo_path = $this->dispatch(new UploadFile('logo', 'uploaded/vendors/logo/'.date('Y/m/d/H'))))
		// {
		// 	$input['logo'] = $logo_path;
		// }
		// $data->fill($input);

		// if ($data->save())
		// {
		// 	return redirect()->route('admin.' . $this->controller_name . '.index')->with('alert_success', ucwords($this->controller_name) . ' "' . $data->name . '" has been saved');
		// }
		// else
		// {
		// 	return redirect()->back()->withInput()->withErrors($data->getErrors());
		// }
	}

	function getShow($id = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::work()->show($id);
		$contents 									= json_decode($results);

		print_r($contents);exit;

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($contents->data->nick_name);

		$this->layout->content 						= view('admin.pages.work.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;

		print_r($data);exit;
		return $this->layout;
	}

	function getEdit($id = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::person()->show($id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper("edit ".$contents->data->nick_name);

		$this->layout->content 						= view('admin.pages.person.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;

		return $this->layout;
	}


	function getDelete($id)
	{
		// ---------------------- LOAD DATA ----------------------
		// if (!is_null($id))
		// {
		// 	$data = $this->model->findorfail($id);
		// }
		// else
		// {
		// 	App::abort(404);
		// }
		
		// if (str_is('Delete', Input::get('type2confirm')))
		// {
		// 	if ($data->delete())
		// 	{
		// 		return redirect()->route('admin.'.$this->controller_name.'.index')->with('alert_success', 'Data "' . $data->name . '" has been deleted');
		// 	}
		// 	else
		// 	{
		// 		return redirect()->back()->withErrors($data->getErrors());
		// 	}
		// }
		// else
		// {
		// 	return redirect()->back()->with('alert_danger', 'Invalid delete confirmation text');
		// }
	}
}
