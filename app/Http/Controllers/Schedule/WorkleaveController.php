<?php namespace App\Http\Controllers\Schedule;

use Input, Session, App, Redirect, Paginator;
use API;
use App\Http\Controllers\Controller;

class WorkleaveController extends Controller {

	protected $controller_name = 'cuti';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= [];
		if(Input::has('q'))
		{
			$search 								= ['name' => Input::get('q')];
		}

		if(Input::has('branch'))
		{
			$search['branchname'] 					= Input::get('branch');
		}

		if(Input::has('tag'))
		{
			$search['charttag'] 					= Input::get('tag');
		}

		$search['ondate'] 							= [Input::get('end'), Input::get('start')];

		$search['withattributes'] 					= ['chart', 'chart.branch'];

		$sort 										= ['apply' => 'asc'];

		$results 									= API::workleave()->index($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$data 										= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$search 									= ['organisationid' => Session::get('user.organisation')];

		if(Input::has('branch'))
		{
			$search['name']							= Input::get('branch');
			$search['DisplayDepartments']			= '';
		}

		$sort 										= ['name' => 'asc'];

		$results_2 									= API::branch()->index(1, $search, $sort);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}
		
		$branches 									= json_decode(json_encode($contents_2->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper(($this->controller_name));

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->branches 			= $branches;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function getCreate($id = null)
	{
		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Tambah '.ucwords($this->controller_name). ' Baru';

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= null;

		return $this->layout;
	}

	function postStore($id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['workleave'] 						= Input::only('name', 'quota');

		$input['workleave']['apply']				= date('Y-m-d', strtotime(Input::get('apply')));
		$input['workleave']['expired']				= date('Y-m-d', strtotime(Input::get('expired')));

		$input['workleave']['id'] 					= $id;

		//consider save many chart id
		$charts 									= explode(',', Input::get('chart'));
		foreach ($charts as $key => $value) 
		{
			$input['charts'][]						= ['chart_id' => $value];
		}

		$results 									= API::workleave()->store($id, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.workleaves.index')->with('alert_success', 'Data Cuti sudah di simpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function getShow($id, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::workleave()->show($id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);
		
		$search 									= ['workleave' => ['on' => $data['apply'], $data['expired'], 'name' => 'cuti', 'chartid' => $data['chart_id']], 'withattributes' => ['workleaves']];

		// if(Input::has('branch'))
		// {
		// 	$search['branchname'] 					= Input::get('branch');
		// }

		// if(Input::has('chart'))
		// {
		// 	$search['chartname'] 					= Input::get('chart');
		// }

		$sort 										= ['name' => 'asc'];

		$results 									= API::person()->index($page, $search, $sort, true);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$persons 									= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords($data['name']);
		
		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->persons 			= $persons;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function getEdit($id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::workleave()->show($id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($this->controller_name);

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.create');
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
		// ---------------------- LOAD DATA ----------------------
		$email 						= Session::get('user.email');
		$password 					= Input::get('password');

		$results 					= API::person()->authenticate($email, $password);

		$content 					= json_decode($results);

		if($content->meta->success)
		{
			$results 									= API::workleave()->destroy($id);
			$contents 									= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::route('hr.workleaves.show', ['id' => $id])->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::route('hr.workleaves.index')->with('alert_success', 'Jadwal "' . $contents->data->name. '" sudah dihapus');
			}
		}
		else
		{
			return Redirect::route('hr.workleaves.show', ['id' => $id])->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}

}
