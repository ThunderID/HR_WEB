<?php namespace App\Http\Controllers\Organisation\Calendar;

use Input, Session, App, Redirect, Paginator, Response;
use API;
use App\Http\Controllers\Controller;

class CalendarController extends Controller {

	protected $controller_name = 'kalender';

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
		$search 									= [ 'organisationid' => $org_id];
		if(Input::has('q'))
		{
			$search 								= ['name' => Input::get('q'), 'organisationid' => Session::get('user.organisation'), 'withattributes' => ['charts', 'charts.branch']];
		}

		if(Input::has('branch'))
		{
			$search['branchname'] 					= Input::get('branch');
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

		$results 									= API::calendar()->index($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$calendars 									= json_decode(json_encode($contents->data), true);
		
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);


		$search 									= ['organisationid' => $org_id];

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
		$this->layout->content->calendars 			= $calendars;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->filters 			= [['title' => 'Filter Cabang', 'input' => 'branchname', 'filter' => 'name','filters' => $branches]];
		$this->layout->content->route 				= ['org_id' => $data['id'], 'branchname' => Input::get('branchname')];

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
		$this->layout->content->calendar 			= null;

		return $this->layout;
	}

	function postStore($id = null)
	{
		if(Input::has('org_id'))
		{
			$org_id 								= Input::get('org_id');
		}
		else
		{
			$org_id 								= Session::get('user.organisation');
		}

		// ---------------------- HANDLE INPUT ----------------------
		$input['calendar'] 							= Input::only('name', 'workdays', 'start', 'end');

		$input['calendar']['start']					= date('H:i:s', strtotime($input['calendar']['start']));
		$input['calendar']['end']					= date('H:i:s', strtotime($input['calendar']['end']));

		$input['organisation']['id']				= $org_id;

		$results 									= API::calendar()->store($id, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.organisation.calendars.index', ['page' => 1,'org_id' => $org_id])->with('alert_success', 'Data Kalender sudah di simpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function getShow($id, $page = 1)
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

		// ---------------------- LOAD DATA ----------------------
		$results 									= API::calendar()->show($id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$calendar 									= json_decode(json_encode($contents->data), true);
		
		$search 									= ['calendarid' => $id, 'ondate' => [Input::get('start'), Input::get('end')]];

		if(Input::has('branch'))
		{
			$search['branchname'] 					= Input::get('branch');
		}

		if(Input::has('chart'))
		{
			$search['chartname'] 					= Input::get('chart');
		}

		$sort 										= ['name' => 'asc'];

		$results 									= API::schedule()->index($page, $search, $sort, 100);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$schedules 									= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords($data['name']);
		
		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->calendar 			= $calendar;
		$this->layout->content->schedules 			= $schedules;
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

		$results 									= API::calendar()->show($id, ['organisationid' => $org_id]);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$calendar 									= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($this->controller_name);

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->calendar 			= $calendar;

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

			if(!in_array($org_id, Session::get('user.orgids')))
			{
				App::abort(404);
			}

			$results 									= API::calendar()->destroy($org_id, $id);
			$contents 									= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::back()->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::route('hr.organisation.calendars.index')->with('alert_success', 'Kalender "' . $contents->data->name. '" sudah dihapus');
			}
		}
		else
		{
			return Redirect::back()->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}

	function postStorePerson($calid, $id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['calendar']['id'] 					= $calid;

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

		$input['organisation']['id']				= $org_id;

		$persons 									= explode(',', Input::get('person'));
		foreach ($persons as $key => $value) 
		{
			$input['persons'][]						= ['person_id' => $value, 'start' => date('Y-m-d H:i:s', strtotime(Input::get('when')))];
		}

		$results 									= API::calendar()->store($calid, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.calendars.show', $calid)->with('alert_success', 'Data Kalender sudah di simpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function postStoreChart($id)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['calendar']['id'] 					= $id;

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

		$input['organisation']['id']				= $org_id;
		//please make sure if the date is in range, make it as an array for every date => single date save in on
		//consider the id
		$charts 									= explode(',', Input::get('chart'));
		foreach ($charts as $key => $value) 
		{
			$input['charts'][]						= ['chart_id' => $value];
		}

		$results 									= API::calendar()->store($id, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::back()->with('alert_success', 'Data Kalender sudah di simpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function ajaxSchedule($id, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::calendar()->show($id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);
		
		$search 									= ['calendarid' => $id, 'ondate' => [Input::get('start'), Input::get('end')]];

		if(Input::has('branch'))
		{
			$search['branchname'] 					= Input::get('branch');
		}

		if(Input::has('chart'))
		{
			$search['chartname'] 					= Input::get('chart');
		}

		$sort 										= ['name' => 'asc'];

		$results 									= API::schedule()->index($page, $search, $sort, true);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$schedules 									= json_decode(json_encode($contents->data), true);
		
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$schedule = [];
		foreach($schedules as $i => $sh)	
		{

				$schedule[$i]['id']		= $sh['id'];
				$schedule[$i]['title'] 	= $sh['name'];
				$schedule[$i]['start']	= $sh['on'].'T'.$sh['start'];
				$schedule[$i]['end']	= $sh['on'].'T'.$sh['end'];
		}

		return Response::json($schedule);		
	}
}
