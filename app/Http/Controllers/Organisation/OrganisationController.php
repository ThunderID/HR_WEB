<?php namespace App\Http\Controllers\Organisation;

use Input, Session, App, Paginator, Redirect;
use API, DB;
use App\Http\Controllers\Controller;

class OrganisationController extends Controller {

	protected $controller_name = 'organisasi';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['id' => Session::get('user.orgids')];
		if(Input::has('q'))
		{
			$search['name']							= Input::get('q');			
		}
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::organisation()->index($page, $search, $sort, false);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$data 										= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title					= strtoupper(str_plural($this->controller_name));

		$this->layout->content 						= view('admin.pages.organisation.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function getCreate($id = null)
	{
		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($this->controller_name);

		$this->layout->content 						= view('admin.pages.organisation.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= null;

		return $this->layout;
	}

	function postStore($id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['person']['id'] 						= Session::get('loggedUser');
		$input['organisation']['id'] 				= $id;
		$input['organisation']['name'] 				= Input::get('name');

		$results 									= API::organisation()->store($id, $input);

		$content 									= json_decode($results);

		if($content->meta->success)
		{
			return Redirect::route('hr.organisations.index')->with('alert_success', 'organisasi "' . $content->data->name. '" sudah disimpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function getShow($id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::organisation()->show($id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($this->controller_name);

		$this->layout->content 						= view('admin.pages.organisation.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;

		return $this->layout;
	}


	function getEdit($id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::organisation()->show($id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($this->controller_name);

		$this->layout->content 						= view('admin.pages.organisation.create', compact(('data')));
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;

		return $this->layout;
	}

	function postUpdate($id)
	{
		return $this->postStore($id);
	}

	function anyDelete($id)
	{
		$username 					= Session::get('user.email');
		$password 					= Input::get('password');

		$results 					= API::person()->authenticate($username, $password);

		$content 					= json_decode($results);

		if($content->meta->success)
		{
			$results 									= API::organisation()->destroy($id);
			$contents 									= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::back()->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::route('hr.organisations.index')->with('alert_success', 'Organisasi "' . $contents->data->name. '" sudah dihapus');
			}
		}
		else
		{
			return Redirect::back()->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}

	function postDocumentsStore($id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$results 										= API::organisation()->show(Session::get('user.organisation'));
		$contents 										= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$input['organisation']							= [];
		$input['document'][]['name'] 					= Input::get('docs_name');

		$results 										= API::organisation()->store(Session::get('user.organisation'), $input);

		$content 										= json_decode($results);


		if($content->meta->success)
		{
			return Redirect::back()->with('alert_success', 'dokumen "' . $contents->data->name. '" sudah disimpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function anyDefault()
	{
		// ---------------------- LOAD DATA ----------------------

		if(Input::has('organisation'))
		{

			Session::put('user.organisation', Input::get('organisation'));
			Session::put('user.role', Session::get('user.roles')[Input::get('organisation')]);
		}

		return Redirect::back();
	}
}
