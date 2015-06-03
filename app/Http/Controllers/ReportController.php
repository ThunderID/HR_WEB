<?php namespace App\Http\Controllers;

use Input, Session, App, Config, Paginator, Redirect, Validator, Request;
use API, Excel;
use App\Http\Controllers\Controller;

class ReportController extends Controller {

	protected $controller_name = 'reports';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getAttendance($page = null)
	{
		// ---------------------- LOAD DATA ----------------------

		if(Input::has('start'))
		{
			list($d,$m,$y) 							= explode('/', Input::get('start'));
			$start 									= "$y-$m-$d";
			list($d,$m,$y) 							= explode('/', Input::get('end'));
			$end 									= "$y-$m-$d";

			$search 								= ['globalattendance' => ['organisationid' => Session::get('user.organisation'), 'on' => [$start, $end]]];
		}
		else
		{
			$search 								= ['globalattendance' => ['organisationid' => Session::get('user.organisation'), 'on' => [$start, $end]]];
		}
		
		$sort 										= [];


		if(Input::has('case'))
		{
			switch (strtolower(Input::get('case'))) 
			{
				case 'late': case 'ontime' : case 'earlier' : case 'overtime' :
					$search['globalattendance']		= ['organisationid' => Session::get('user.organisation'), 'on' => [$start, $end], 'case' => strtolower(Input::get('case'))];
					break;
				default:
					App::abort('404');
				break;
			}
		}

		if(Input::has('sort_margin_start'))
		{
			$search['globalattendance']['sort']				= ['margin_start', Input::get('sort_margin_start')];
		}

		if(Input::has('sort_margin_end'))
		{
			$search['globalattendance']['sort']				= ['margin_end', Input::get('sort_margin_end')];
		}

		if(Input::has('sort_idle'))
		{
			$search['globalattendance']['sort']				= ['total_idle', Input::get('sort_idle')];
		}

		if(Input::has('sort_workhour'))
		{
			$search['globalattendance']['sort']				= ['total_active', Input::get('sort_workhour')];
		}
		
		if(Input::has('branch'))
		{
			$search['branchname'] 					= Input::get('branch');
		}

		if(Input::has('tag'))
		{
			$search['charttag'] 					= Input::get('tag');
		}

		$search['organisationid'] 					= Session::get('user.organisation');

		$results 									= API::person()->index($page, $search, $sort, 100);
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
		if(Input::has('mode'))
		{
			set_time_limit(180);
			$case = Input::get('case');
			Excel::create('Attendance Reports ( '.Input::get('start').' s.d '.Input::get('end').' )', function($excel) use ($data, $case) 
			{
				// Set the title
				$excel->setTitle('Our new awesome title');
				// Call them separately
				$excel->setDescription('A demonstration to change the file properties');
				$excel->sheet('Sheetname', function ($sheet) use ($data, $case) 
				{
					$c 									= count($data);

					if(Input::has('case') && Input::get('case')!='ontime') {
						$sheet->setBorder('A1:J'.($c+2), 'thin');
					}
					else {
						$sheet->setBorder('A1:K'.($c+2), 'thin');
					}

					$sheet->setWidth(['A' => 5, 'B' => 30, 'G' => 12, 'H' => 12, 'I' => 12, 'J' => 12, 'K' => 12]);
					$sheet->loadView('admin.pages.reports.attendance.attendance_csv')->with('data', $data)->with('case', $case);
				});
			})->export(Input::get('mode'));
		}

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords('Generate Attendance Report');

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.attendance.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->branches 			= $branches;

		return $this->layout;
	}

	function detailAttendance($personid)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::person()->show($personid, []);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$person 									= json_decode(json_encode($contents->data), true);

		if(Input::has('start'))
		{
			list($d,$m,$y) 							= explode('/', Input::get('start'));
			$start 									= "$y-$m-$d";
			list($d,$m,$y) 							= explode('/', Input::get('end'));
			$end 									= "$y-$m-$d";

			$search 								= ['personid' => $personid,'local' => true, 'ondate'=> [$start, $end]];
		}
		else
		{
			$search 								= ['personid' => $personid,'local' => true];
		}
		$sort 										= [];

		if(Input::has('case'))
		{
			switch (Input::get('case')) 
			{
				case 'late':
					$search['late']					= true;
					$sort 							= ['margin_start' => 'asc'];
					break;
				case 'ontime':
					$search['ontime']				= true;
					$sort 							= ['margin_start' => 'desc'];
					break;
				case 'earlier':
					$search['earlier']				= true;
					$sort 							= ['margin_end' => 'asc'];
					break;
				case 'overtime':
					$search['overtime']				= true;
					$sort 							= ['margin_end' => 'desc'];
					break;
				default:
					App::abort('404');
				break;
			}
		}

		$results 									= API::log()->ProcessLogIndex(1, $search, $sort, 100);
		
		$contents 									= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		if(Input::has('mode'))
		{
			set_time_limit(180);
			$case = Input::get('case');
			Excel::create('Attendance Detail Reports ( '.Input::get('start').' s.d '.Input::get('end').' )', function($excel) use ($data, $case, $person) 
			{
				// Set the title
				$excel->setTitle('Our new awesome title');
				// Call them separately
				$excel->setDescription('A demonstration to change the file properties');
				$excel->sheet('Sheetname', function ($sheet) use ($data, $case, $person) 
				{
					$c 									= count($data);
					$sheet->setBorder('A1:L'.($c+2), 'thin');				
					$sheet->setWidth(['A' => 5, 'B' => 30, 'C' => 15, 'D' => 12, 'E' => 12, 'F' => 12, 'G' => 12, 'H' => 12, 'I' => 12, 'J' => 14, 'K' => 14, 'L' => 14]);
					$sheet->loadView('admin.pages.reports.attendance.attendance_csvd')->with('data', $data)->with('case', $case)->with('person', $person);
				});
			})->export(Input::get('mode'));
		}

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords('Generate Attendance Report');

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.attendance.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->person 				= $person;

		return $this->layout;
	}

	function detailLog($personid)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::person()->show($personid, []);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$person 									= json_decode(json_encode($contents->data), true);

		if(Input::has('start'))
		{
			list($d,$m,$y) 							= explode('/', Input::get('start'));
			$start 									= "$y-$m-$d";
			list($d,$m,$y) 							= explode('/', Input::get('end'));
			$end 									= "$y-$m-$d";

			$search 								= ['personid' => $personid, 'ondate'=> [$start, $end]];
		}
		else
		{
			$search 								= ['personid' => $personid];
		}
		$sort 										= ['on' => 'asc'];

		$results 									= API::log()->index(1, $search, $sort, 100);
		
		$contents 									= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords('Generate Log Report');

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.log.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->person 				= $person;
		// $this->layout->content->branches 			= $branches;

		return $this->layout;
	}

	function getForm()
	{
		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords('Generate Report');

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.form');
		$this->layout->content->controller_name 	= Request::segment(3);
		$this->layout->content->data 				= null;

		return $this->layout;
	}

	function getPerformance($page = null)
	{
		// ---------------------- LOAD DATA ----------------------
		if(Input::has('start'))
		{
			$search 								= ['WithAttributes' => ['person'], 'ondate'=> [Input::get('start'), Input::get('end')]];
		}
		else
		{
			$search 								= ['WithAttributes' => ['person']];
		}
		$sort 										= ['person_id' => 'desc'];

		if(Input::has('case'))
		{
			switch (Input::get('case')) 
			{
				case 'late':
					$search['late']					= true;
					break;
				case 'ontime':
					$search['ontime']				= true;
					break;
				case 'earlier':
					$search['earlier']				= true;
					break;
				case 'overtime':
					$search['overtime']				= true;
					break;
				default:
					App::abort('404');
				break;
			}
		}

		if(Input::has('branch'))
		{
			$search['branchname'] 					= Input::get('branch');
		}

		if(Input::has('tag'))
		{
			$search['charttag'] 					= Input::get('tag');
		}

		$results 									= API::log()->ProcessLogIndex($page, $search, $sort, true);
		
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
		$this->layout->page_title 					= ucwords('Generate Attendance Report');

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.attendance.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->branches 			= $branches;

		return $this->layout;
	}

	function getWages($page = null)
	{
		// ---------------------- LOAD DATA ----------------------
		if(Input::has('start'))
		{
			list($d,$m,$y) 							= explode('/', Input::get('start'));
			$start 									= "$y-$m-$d";
			list($d,$m,$y) 							= explode('/', Input::get('end'));
			$end 									= "$y-$m-$d";

			$search 								= ['quotas' => ['ondate'=> [$start, $end]]];
		}
		else
		{
			$start 									= date('Y-m-d');
			$end 									= date('Y-m-d');
			$search 								= ['quotas' => ['ondate'=> [$start, $end]]];
		}

		$sort 										= ['persons.id' => 'desc'];
		if(Input::has('case'))
		{
			switch (Input::get('case'))
			{
				case 'late':
					$search['late'] 				= true;
					$sort 							= ['margin_start' => 'asc'];
				break;
				case 'ontime':
					$search['ontime']			 	= true;
					$sort 							= ['margin_start' => 'desc'];
				break;
				case 'earlier':
					$search['earlier'] 				= true;
					$sort 							= ['margin_end' => 'asc'];
				break;
				case 'overtime':
					$search['overtime'] 			= true;
					$sort 							= ['margin_end' => 'desc'];
				break;
				default:
					App::abort('404');
				break;
			}
		}

		if(Input::has('branch'))
		{
			$search['branchid'] 					= Input::get('branch');
		}
		if(Input::has('tag'))
		{
			$search['charttag'] 					= Input::get('tag');
		}

		$search['organisationid'] 					= Session::get('user.organisation');

		$results 									= API::person()->index($page, $search, $sort, 100);
		$contents 									= json_decode($results);
		
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);
		unset($search);


		$search['organisationid'] 					= Session::get('user.organisation');
		$search['checkwork'] 						= true;

		$results 									= API::person()->index($page, $search, $sort, 100);
		$contents 									= json_decode($results);
		
		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		$persons 									= json_decode(json_encode($contents->data), true);
		unset($search);

		$ids 										= [];

		foreach ($persons as $key => $value)
		{
			$ids[] 									= $value['id'];
		}
		
		$search 									= ['minusquotas' => ['ondate'=> [$start, $end], 'ids' => $ids]];
		$sort 										= ['persons.id' => 'desc'];
		$results 									= API::person()->index($page, $search, $sort, 100);
		$contents 									= json_decode($results);
		
		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$data2 										= json_decode(json_encode($contents->data), true);
		$currentstatus 								= [];
		$compelete 									= [];

		foreach ($persons as $key => $value)
		{
			$minus 									= 0;
			$quota 									= 0;
			$plus 									= 0;
			$status 								= null;
			foreach ($data as $key1 => $value1)
			{
				if($value1['person_id']==$value['id'])
				{
					$quota 							= $quota + $value1['quota'];
					$plus 							= $plus + $value1['plus_quota'];
				}
			}
			foreach ($data2 as $key2 => $value2)
			{
				if($value2['person_id']==$value['id'])
				{
					$status[$value2['name']] 		= $value2['minus_quota'];
					$minus 							= $minus + $value2['minus_quota'];
					if(!in_array($value2['name'], $currentstatus))
					{
						$currentstatus[] 			= $value2['name'];
					}
				}
			}
			$compelete[$key] 						= $value;
			$compelete[$key]['quota'] 				= $quota;
			$compelete[$key]['plus_quota'] 			= $plus;
			$compelete[$key]['minus_quota'] 		= $minus;
			$compelete[$key]['residue_quota'] 		= $compelete[$key]['quota'] + $compelete[$key]['plus_quota'] - $compelete[$key]['minus_quota'];
			$compelete[$key]['status'] 				= $status;
		}

		$search 									= ['organisationid' => Session::get('user.organisation')];
		if(Input::has('branch'))
		{
			$search['id'] 							= Input::get('branch');
			$search['DisplayDepartments']		 	= '';
		}

		$sort 										= ['name' => 'asc'];
		$results_2 									= API::branch()->index(1, $search, $sort);
		$contents_2 								= json_decode($results_2);
		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}

		$branches 									= json_decode(json_encode($contents_2->data), true);
		if(Input::has('mode'))
		{
			Excel::create('Wages Reports', function($excel) use ($compelete, $currentstatus) 
			{
				// Set the title
				$excel->setTitle('Our new awesome title');
				// Call them separately
				$excel->setDescription('A demonstration to change the file properties');
				$excel->sheet('Sheetname', function ($sheet) use ($compelete, $currentstatus) 
				{
					$c 								= count($compelete);
					$cs 							= count($currentstatus);
					$sheet->setBorder('A1:G'.($c+2), 'thin');
					$sheet->setWidth(['A' => 5, 'B' => 30, 'C' => 15, 'D' => 15, 'E' => 15, 'F' => 15, 'G' => 15]);
					$sheet->loadView('admin.pages.reports.wages.wages_csv')->with('data', $compelete)->with('status', $currentstatus)->with('cs', $cs);
				});
			})->export(Input::get('mode'));
		}
		
		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords('Generate Wages Report');
		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.wages.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $compelete;
		$this->layout->content->status 				= $currentstatus;
		$this->layout->content->branches 			= $branches;
		$this->layout->content->start 				= $start;
		$this->layout->content->end 				= $end;
		
		return $this->layout;
	}
}
