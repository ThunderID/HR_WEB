<?php namespace App\Http\Controllers\Organisation\Workleave;

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

		$results 									= API::organisation()->show($org_id, ['withattributes' => ['branches', 'calendars', 'workleaves', 'documents']]);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- LOAD DATA ----------------------
		$search 									= ['organisationid' => $org_id];
	
		if(Input::has('q'))
		{
			$search 								= ['name' => Input::get('q')];
		}

		if(Input::has('branchid'))
		{
			$search['branchid'] 					= Input::get('branchid');
		}

		if(Input::has('tag'))
		{
			$search['charttag'] 					= Input::get('tag');
		}

		if(Input::has('sort_name'))
		{
			$sort['name']							= Input::get('sort_name');			
		}
		else
		{
			$sort 									= ['name' => 'asc'];
		}

		$results 									= API::workleave()->index($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$workleaves 								= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$search 									= ['organisationid' => $org_id];

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
		$this->layout->content->workleaves 			= $workleaves;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->filters 			= [['title' => 'Filter Cabang', 'input' => 'branchid', 'filter' => 'id', 'display' => 'name','filters' => $branches]];
		$this->layout->content->route 				= ['org_id' => $data['id'], 'brancid' => Input::get('brancid')];

		return $this->layout;
	}

	function getCreate($id = null)
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

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Tambah '.ucwords($this->controller_name). ' Baru';

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->workleave 			= null;

		return $this->layout;
	}

	function postStore($id = null)
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

		// ---------------------- HANDLE INPUT ----------------------
		$input['workleave'] 						= Input::only('name', 'quota');

		$input['workleave']['id'] 					= $id;

		$input['organisation']['id'] 				= $org_id;

		$results 									= API::workleave()->store($id, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.organisation.workleaves.index', ['page' => 1, 'org_id' =>$org_id])->with('alert_success', 'Data Cuti sudah di simpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function getShow($id, $page = 1)
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

		$results 									= API::organisation()->show($org_id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$results 									= API::workleave()->show($id, ['organisationid' => $org_id]);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$workleave 									= json_decode(json_encode($contents->data), true);

		$search 									= ['workleaveid' => $id, 'checkwork' => true];

		if(Input::has('branch'))
		{
			$search['branchname'] 					= Input::get('branch');
		}

		if(Input::has('chart'))
		{
			$search['charttag'] 					= Input::get('chart');
		}

		if(Input::has('start'))
		{
			list($d,$m,$y) 							= explode('/', Input::get('start'));

			$start 									= "$y-$m-$d";
			$search['checktakenworkleave'] 			= ['on' => [$start, $start], 'status' => 'workleave'];
			$search['takenworkleave'] 				= ['on' => [$start, $start], 'status' => 'workleave'];

			if(Input::has('end'))
			{
				list($d,$m,$y) 						= explode('/', Input::get('end'));

				$end 								= "$y-$m-$d";
				$search['checktakenworkleave'] 		= ['on' => [$start, $end], 'status' => 'workleave'];
				$search['takenworkleave'] 			= ['on' => [$start, $end], 'status' => 'workleave'];
			}
		}
		else
		{
			// $search['checktakenworkleave'] 			= ['on' => ['first day of january this year', 'last day of december this year'], 'status' => 'workleave'];
			$search['takenworkleave'] 				= ['on' => ['first day of january this year', 'last day of december this year'], 'status' => 'workleave'];
		}

		$search['withattributes'] 					= ['works', 'works.branch'];

		$sort 										= ['name' => 'asc'];

		$results 									= API::person()->index($page, $search, $sort, 100);

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
		$this->layout->content->workleave 			= $workleave;
		$this->layout->content->persons 			= $persons;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
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

		$results 									= API::workleave()->show($id, ['organisationid' => $org_id]);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$workleave 									= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($this->controller_name);

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->workleave 			= $workleave;

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
			if(Input::has('org_id'))
			{
				$org_id 								= Input::get('org_id');
			}
			else
			{
				$org_id 								= Session::get('user.organisation');
			}

			$results 									= API::workleave()->destroy($org_id, $id);
			$contents 									= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::back()->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::back()->with('alert_success', 'Cuti "' . $contents->data->name. '" sudah dihapus');
			}
		}
		else
		{
			return Redirect::back()->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}

	function postPerson($wl_id)
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
	
		$chartids 									= explode(',', Input::get('chart'));
		$search['organisationid']					= $org_id;
		$search['id']								= $chartids;
		$search['withattributes']					= ['CheckWorks'];

		$results 									= API::chart()->index(1, $search, [], 100);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$charts 									= json_decode(json_encode($contents->data), true);

		$personid 									= [];
		foreach ($charts as $key => $value) 
		{
			foreach ($value['check_works'] as $key2 => $value2) 
			{
				$personid[]							= ['id' => $value2['id']];
			}
		}
		// ---------------------- HANDLE INPUT ----------------------
		$input['workleave']['id'] 					= $wl_id;
		$input['organisation']['id'] 				= $org_id;
		$input['persons'] 							= $personid;

		//please make sure if the date is in range, make it as an array for every date => single date save in on
		//consider the id
		$workleave 									= Input::only('id', 'is_default');
		if(isset($workleave['id'])&&$workleave['id']==0)
		{
			unset($workleave['id']);
		}

		list($d,$m,$y) 								= explode('/', Input::get('start'));
		$workleave['start']							= date('Y-m-d', strtotime("$y-$m-$d"));

		list($d,$m,$y) 								= explode('/', Input::get('end'));
		$workleave['end']							= date('Y-m-d', strtotime("$y-$m-$d"));
		
		$workleave['workleave_id']					= Input::get('workleave');
		if(is_null($workleave['is_default']))
		{
			$workleave['is_default']				= false;
		}
		else
		{
			$workleave['is_default']				= true;
		}
		
		$input['person']['workleave']				= $workleave;

		$results 									= API::workleave()->personStore($wl_id, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.organisation.workleaves.index', ['page' => 1, 'org_id' => $org_id])->with('alert_success', 'Data Cuti sudah di simpan. Untuk kasus khusus, silahkan atur melalui halaman karyawan.');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}
}
