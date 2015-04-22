<?php namespace App\Http\Controllers\Branch;

use Input, Session, App, Paginator, Redirect, Response, Request;
use App\APIConnector\API;
use App\Http\Controllers\Controller;

class ChartController extends Controller {

	protected $controller_name = 'struktur';

	function __construct() 
	{
		parent::__construct();
	}

	function getShow($branch_id, $id)
	{
		// ---------------------- LOAD DATA ----------------------
		if(Input::has('tag'))
		{
			$department 							= Input::get('tag');
		}
		else
		{
			$department 							= null;
		}

		$results 									= API::organisationbranch()->show($branch_id, $department);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);
		
		$results_2 									= API::organisationchart()->show($branch_id, $id);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}

		$chart 										= json_decode(json_encode($contents_2->data), true);

		$results_3 									= API::organisationchart()->index(1, ['neighbor' => $chart['path'], 'branchid' => $branch_id], ['path' => 'asc']);

		$contents 									= json_decode($results_3);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$charts 									= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= $data['name'];
		$this->layout->content 						= view('admin.pages.organisation.kantor.show.'.$this->controller_name.'.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->chart 				= $chart;
		$this->layout->content->charts 				= $charts;

		return $this->layout;
	}

	function getCreate($branch_id, $id = null)
	{
		$results 									= json_decode(API::organisationbranch()->show($branch_id));
		// ---------------------- GENERATE CONTENT ----------------------

		$this->layout->page_title 					= 'Tambah '.$this->controller_name.' baru';
		$this->layout->content 						= view('admin.pages.organisation.kantor.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data				= null;
		$this->layout->content->data_branch			= json_decode(json_encode($results), true);
		$this->layout->content->branch_id 			= $branch_id;


		return $this->layout;
	}	

	function postStore($branch_id, $id = null)
	{
		if(Input::has('name'))
		{
			$input['chart']								= Input::only('name', 'path', 'min_employee', 'max_employee', 'ideal_employee', 'grade', 'tag');
		}
		$input['chart']['id']							= $id;

		if(Input::has('application_id'))
		{
			foreach (Input::get('id') as $key => $value) 
			{
				$application['id']						= $value;
				$application['application_id']			= Input::get('application_id')[$key];
				if(isset(Input::get('is_create')[$key]))
				{
					$application['is_create']			= true;
				}
				else
				{
					$application['is_create']			= false;
				}
				if(isset(Input::get('is_read')[$key]))
				{
					$application['is_read']				= true;
				}
				else
				{
					$application['is_read']				= false;
				}
				if(isset(Input::get('is_update')[$key]))
				{
					$application['is_update']			= true;
				}
				else
				{
					$application['is_update']			= false;
				}
				if(isset(Input::get('is_delete')[$key]))
				{
					$application['is_delete']			= true;
				}
				else
				{
					$application['is_delete']			= false;
				}
				$input['applications'][]				= $application;
			}
		}

		$results 									= API::organisationchart()->store($branch_id, $input);

		$content 									= json_decode($results);
		
		if($content->meta->success)
		{
			return Redirect::route('hr.organisation.charts.show', [$branch_id, $content->data->id])->with('alert_success', 'Struktur '.$content->data->name.' Sudah Tersimpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}


	function getEdit($branch_id, $id)
	{
		// ---------------------- LOAD DATA ----------------------
		if(Input::has('tag'))
		{
			$department 							= Input::get('tag');
		}
		else
		{
			$department 							= null;
		}

		$results 									= API::organisationbranch()->show($branch_id, $department);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);
		
		$results_2 									= API::organisationchart()->show($branch_id, $id);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}

		$results 									= API::organisationchart()->show($branch_id, $id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$chart 										= json_decode(json_encode($contents->data), true);

		$results_3 									= API::organisationchart()->index(1, ['neighbor' => $chart['path'], ['path', 'asc']]);

		$contents 									= json_decode($results_3);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$charts 									= json_decode(json_encode($contents->data), true);

		$this->layout->page_title 					= 'Edit "'.$chart['name'].' "';
		$this->layout->content 						= view('admin.pages.organisation.kantor.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->chart 				= $chart;
		$this->layout->content->charts 				= $charts;
		$this->layout->content->branch_id 			= $branch_id;

		return $this->layout;
	}

	function postUpdate($branch_id, $id)
	{
		return $this->postStore($branch_id, $id);
	}

	function anyDelete($branch_id, $id)
	{
		$results 									= API::organisationchart()->destroy($branch_id, $id);

		$content 									= json_decode($results);
		
		if($content->meta->success)
		{
			return Redirect::route('hr.organisation.branches.show', [$branch_id]);
		}

		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}
}
