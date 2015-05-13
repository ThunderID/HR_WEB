<?php namespace App\Http\Controllers\Application;

use Input, Session, App, Paginator, Redirect;
use API;
use App\Http\Controllers\Controller;

class AuthenticationController extends Controller {

	protected $controller_name = 'menu';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search										= [];

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::application()->index($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$applications 								= json_decode(json_encode($contents->data), true);

		$search										= ['applicationname' => ''];

		if(Input::has('application'))
		{
			$search['applicationname']				= Input::get('application');			
		}

		$search['withattributes']					= ['application', 'authentications', 'authentications.chart', 'authentications.chart.branch'];

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::application()->menuIndex($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$data 										= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Kantor';

		if(Input::has('q'))
		{
			$this->layout->page_title 				= 'Hasil Pencarian "'.Input::get('q').'"';
		}

		$this->layout->content 						= view('admin.pages.application.'.$this->controller_name.'.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->applications 		= $applications;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function postStore($id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$charts 									= explode(',', Input::get('chart'));
		
		$input['menu']['id']						= Input::get('menu_id');

		foreach ($charts as $key => $value) 
		{
			$authentication 						= ['id' => Input::get('auth_id'), 'chart_id' => $value];
			
			$input['charts'][]						= $authentication;
		}

		$results 									= API::application()->menuStore($id, $input);

		$content 									= json_decode($results);
		
		if($content->meta->success)
		{
			return Redirect::route('hr.authentications.index')->with('alert_success', 'Autentikasi Sudah Tersimpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function anyDelete($id)
	{
		// ---------------------- LOAD DATA ----------------------
		$username 									= Session::get('user.email');
		
		$password 									= Input::get('password');

		$results 									= API::person()->authenticate($username, $password);

		$content 									= json_decode($results);

		if($content->meta->success)
		{
			$results 								= API::application()->menuDestroy($id);

			$contents 								= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::route('hr.authentications.show', ['id' => $id])->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::route('hr.authentications.index')->with('alert_success', 'Data sudah dihapus');
			}
		}
		else
		{
			return Redirect::route('hr.authentications.index')->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}
}
