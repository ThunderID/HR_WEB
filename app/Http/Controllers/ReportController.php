<?php namespace App\Http\Controllers;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use API, Excel;
use App\Http\Controllers\Controller;

class ReportController extends Controller {

	protected $controller_name = 'attendance';

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

			$search 								= ['WithAttributes' => ['person'], 'ondate'=> [$start, $end]];
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

		// if(Input::has('sort_margin_start'))
		// {
		// 	$sort 									= ['margin_start' => Input::get('sort_margin_start')];
		// }

		// if(Input::has('sort_margin_end'))
		// {
		// 	$sort 									= ['margin_end' => Input::get('sort_margin_end')];
		// }

		// if(Input::has('sort_idle'))
		// {
		// 	$sort 									= ['total_idle' => Input::get('sort_idle')];
		// }

		// if(Input::has('sort_workhour'))
		// {
		// 	$search['orderworkhour'] 				= Input::get('sort_workhour');
		// }
		
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

		$this->layout->content 						= view('admin.pages.reports.'.$this->controller_name.'.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->branches 			= $branches;

		return $this->layout;
	}

	function detailAttendance()
	{
		// ---------------------- LOAD DATA ----------------------
		$personid 									= Input::get('personid');
		
		if(Input::has('start'))
		{
			list($d,$m,$y) 							= explode('/', Input::get('start'));
			$start 									= "$y-$m-$d";
			list($d,$m,$y) 							= explode('/', Input::get('end'));
			$end 									= "$y-$m-$d";

			$search 								= ['personid' => $personid,'local' => true,'WithAttributes' => ['person'], 'ondate'=> [$start, $end]];
		}
		else
		{
			$search 								= ['personid' => $personid,'local' => true,'WithAttributes' => ['person']];
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

		$results 									= API::log()->ProcessLogIndex(1, $search, $sort, true);
		
		$contents 									= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// $search 									= ['organisationid' => Session::get('user.organisation')];

		// if(Input::has('branch'))
		// {
		// 	$search['name']							= Input::get('branch');
		// 	$search['DisplayDepartments']			= '';
		// }

		// $sort 										= ['name' => 'asc'];

		// $results_2 									= API::branch()->index(1, $search, $sort);

		// $contents_2 								= json_decode($results_2);

		// if(!$contents_2->meta->success)
		// {
		// 	App::abort(404);
		// }
		
		// $branches 									= json_decode(json_encode($contents_2->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords('Generate Attendance Report');

		$this->layout->content 						= view('admin.pages.reports.'.$this->controller_name.'.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->paginator 			= $paginator;
		// $this->layout->content->branches 			= $branches;

		return $this->layout;
	}

	function getForm()
	{
		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords('Generate Report');

		$this->layout->content 						= view('admin.pages.reports.'.$this->controller_name.'.form');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= null;

		return $this->layout;
	}

	function getPerformance($page = null)
	{
		// ---------------------- LOAD DATA ----------------------
		if(Input::has('start'))
		{
			$search 								= ['global' => true,'WithAttributes' => ['person'], 'ondate'=> [Input::get('start'), Input::get('end')]];
		}
		else
		{
			$search 								= ['global' => true,'WithAttributes' => ['person']];
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

		$this->layout->content 						= view('admin.pages.reports.'.$this->controller_name.'.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->branches 			= $branches;

		return $this->layout;
	}

	function getAttendanceCSV($page = null)
	{
		
		// ---------------------- LOAD DATA ----------------------
		if(Input::has('start'))
		{
			list($d,$m,$y) 							= explode('/', Input::get('start'));
			$start 									= "$y-$m-$d";
			list($d,$m,$y) 							= explode('/', Input::get('end'));
			$end 									= "$y-$m-$d";

			$search 								= ['WithAttributes' => ['person'], 'ondate'=> [$start, $end]];
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

		// if(Input::has('sort_margin_start'))
		// {
		// 	$sort 									= ['margin_start' => Input::get('sort_margin_start')];
		// }

		// if(Input::has('sort_margin_end'))
		// {
		// 	$sort 									= ['margin_end' => Input::get('sort_margin_end')];
		// }

		// if(Input::has('sort_idle'))
		// {
		// 	$sort 									= ['total_idle' => Input::get('sort_idle')];
		// }

		// if(Input::has('sort_workhour'))
		// {
		// 	$search['orderworkhour'] 				= Input::get('sort_workhour');
		// }
		
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

		$case 										= Input::get('case');

		Excel::create('Attendance Reports', function($excel) use ($data, $case) {			
		    // Set the title
		    $excel->setTitle('Our new awesome title');
		    // Call them separately
		    $excel->setDescription('A demonstration to change the file properties');

		    $excel->sheet('Sheetname', function ($sheet) use ($data, $case) {
		    	$c = count($data);
			    $sheet->setBorder('A1:J'.($c+2), 'thin');
			    $sheet->setWidth(['A' => 30, 'B' => 12, 'G' => 12, 'H' => 12, 'I' => 12, 'J' => 14]);
				$sheet->loadView('admin.pages.reports.attendance.template_csv')->with('data', $data)->with('case', $case);
		    });

		})->export('xls');
	}
}
