<?php namespace App\Http\Controllers\Organisation\Branch;

use Input, Session, App, Paginator, Redirect, Response, Request, Hash;
use API;
use App\Http\Controllers\Controller;

class ApiController extends Controller {

	protected $controller_name = 'api';

	function __construct() 
	{
		parent::__construct();
	}

	function getIndex($page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
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

		$branchid 									= Input::get('branchid');

		$results 									= API::organisation()->show($org_id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		if(Input::has('tag'))
		{
			$department 							= Input::get('tag');
		}
		else
		{
			$department 							= null;
		}

		$search 									= ['OrganisationID' => $org_id, 'CurrentContact' => 'is_default', 'withattributes' => ['charts'], 'DisplayDepartments' => ''];
		
		$results 									= API::branch()->show($branchid, $search);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$branch 									= json_decode(json_encode($contents->data), true);

		$search 									= ['branchid' => $branchid];
		
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::api()->index($page, $search, $sort, 12);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$apis 									= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= $branch['name'];
		$this->layout->content 						= view('admin.pages.organisation.cabang.'.$this->controller_name.'.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->branch 				= $branch;
		$this->layout->content->apis 				= $apis;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function getShow($id, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		
	}

	function getCreate($branch_id, $id = null)
	{
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

		$results 									= API::organisation()->show($org_id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$results 									= API::branch()->show($branch_id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$branch 									= json_decode(json_encode($contents->data), true);
		// ---------------------- GENERATE CONTENT ----------------------

		$this->layout->page_title 					= 'Tambah '.$this->controller_name.' baru';
		$this->layout->content 						= view('admin.pages.organisation.cabang.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data				= $data;
		$this->layout->content->branch				= $branch;
		$this->layout->content->api					= null;


		return $this->layout;
	}	

	function postStore($branch_id, $id = null)
	{
		if(Input::has('client'))
		{
			$api									= Input::only('client', 'secret');
		}
	
		$api['id']									= $id;

		$input['apis'][]							= $api;
		$input['branch']['id']						= $branch_id;
		$input['organisation']['id']				= Input::get('org_id');
		if(!in_array($input['organisation']['id'], Session::get('user.orgids')))
		{
			App::abort(404);
		}

		$results 									= API::branch()->store($branch_id, $input);

		$content 									= json_decode($results);
		
		if($content->meta->success)
		{
			return Redirect::back()->with('alert_success', 'API Key Sudah Tersimpan. Silahkan konfigurasi dari piranti anda.');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}


	function getEdit($id)
	{
		// ---------------------- LOAD DATA ----------------------
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

		$results 									= API::organisation()->show($org_id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$branch_id									= Input::get('branchid');
		$results 									= API::branch()->show($branch_id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$branch 									= json_decode(json_encode($contents->data), true);

		$results_2 									= API::api()->show($id, ['branchid' => $branch_id]);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}

		$api 										= json_decode(json_encode($contents_2->data), true);

		$this->layout->page_title 					= 'Edit "'.$branch['name'].' API "';
		$this->layout->content 						= view('admin.pages.organisation.cabang.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->branch 				= $branch;
		$this->layout->content->api 				= $api;

		return $this->layout;
	}

	function postUpdate($branch_id, $id)
	{
		return $this->postStore($branch_id, $id);
	}

	function anyDelete($id)
	{
		// ---------------------- LOAD DATA ----------------------
		$email 						= Session::get('user.email');
		$password 					= Input::get('password');

		$results 					= API::person()->authenticate($email, $password);

		$content 					= json_decode($results);

		if($content->meta->success)
		{
			if(Input::has('org_id'))
			{
				$org_id 			= Input::get('org_id');
			}
			else
			{
				$org_id 			= Session::get('user.organisation');
			}

			if(!in_array($org_id, Session::get('user.orgids')))
			{
				App::abort(404);
			}

			$branchid 				= Input::get('branchid');

			$results 				= API::api()->destroy($org_id, $branchid, $id);

			$content 				= json_decode($results);
			
			if($content->meta->success)
			{
				return Redirect::back()->with('alert_success', 'Client sudah dihapus. Silahkan atur ulang konfigurasi device anda.');
			}

			return Redirect::back()->withErrors($content->meta->errors);
		}
		else
		{
			return Redirect::back()->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}

	function anyStore()
	{
		$input['menu']['id']						= Input::get('menu_id');

		$chart['chart_id']							= Input::get('chart_id');

		if(Input::has('auth_id'))
		{
			$chart['id']							= Input::get('auth_id');
		}
		else
		{
			$chart['id']							= null;
		}

		if(Input::has('right'))
		{
			$chart[strtolower(Input::get('right'))]	= true;
		}
		elseif(Input::has('wrong'))
		{
			$chart[strtolower(Input::get('wrong'))]	= false;
		}

		$input['charts'][]							= $chart;

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

		$results 									= API::application()->menuStore($input['menu']['id'], $input);

		$content 									= json_decode($results);
		
		if($content->meta->success)
		{
			return Redirect::back()->with('alert_success', 'Authentikasi Sudah Tersimpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}
}
