<?php namespace App\Http\Controllers\Organisation\Branch;

use Input, Session, App, Paginator, Redirect;
use API;
use App\Http\Controllers\Controller;

class BranchController extends Controller {

	protected $controller_name 	= 'cabang';

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
		$search										= ['organisationid' => $org_id, 'CurrentContact' => 'is_default'];
		if(Input::has('q'))
		{
			if(Input::has('field'))
			{
				$search[Input::get('field')]		= Input::get('q');			
			}
			else
			{
				$search['name']						= Input::get('q');			
			}
		}

		if(Input::has('sort_name'))
		{
			$sort['name']							= Input::get('sort_name');			
		}
		else
		{
			$sort 									= ['name' => 'asc'];
		}

		$results 									= API::branch()->index($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$branches 									= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Kantor';

		if(Input::has('q'))
		{
			$this->layout->page_title 				= 'Hasil Pencarian "'.Input::get('q').'"';
		}

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->branches 			= $branches;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->route 				= ['org_id' => $data['id']];

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
		$this->layout->page_title 					= 'Tambah '.$this->controller_name.' baru';;

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->branch 				= null;

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
		if(Input::has('name'))
		{
			$input['branch'] 							= Input::only('name');
		}
		$input['branch']['id'] 							= $id;

		$input['organisation']['id']					= $org_id;

		$results 										= API::branch()->store($id, $input);

		$content 										= json_decode($results);
		
		if($content->meta->success)
		{
			return Redirect::route('hr.organisation.branches.index', [1, 'org_id' => $org_id])->with('alert_success', 'Cabang "'.$content->data->name.'" Sudah Tersimpan');
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

		if(Input::has('tag'))
		{
			$department 							= Input::get('tag');
		}
		else
		{
			$department 							= null;
		}


		$search 									= ['OrganisationID' => $org_id, 'CurrentContact' => 'is_default', 'withattributes' => ['charts'], 'groupcontacts' => true];
		
		$results 									= API::branch()->show($id, $search);
		
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$branch 									= json_decode(json_encode($contents->data), true);

		$search 									= ['branchid' => $id];
		if(Input::has('item'))
		{
			$search['item']							= Input::get('item');
		}

		$sort 										= ['is_default' => 'desc'];

		$results 									= API::branch()->contactIndex($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$contacts 									= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= $branch['name'];
		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.kontak.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->branch 				= $branch;
		$this->layout->content->contacts 			= $contacts;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->route 				= ['id' => $branch['id'],'org_id' => $data['id']];
		$this->layout->content->filters 			= [['title' => 'Filter Kontak', 'input' => 'item', 'filter' => 'item','filters' => $branch['tagcontacts']]];

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

		$results 									= API::branch()->show($id, ['organisationid' => $org_id]);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$branch 									= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Edit "'.$contents->data->name.'"';

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->branch 				= $branch;

		return $this->layout;
	}
	
	function postUpdate($id)
	{
		return $this->postStore($id);
	}

	function anyDelete($id)
	{
		// ---------------------- LOAD DATA ----------------------
		$username 					= Session::get('user.email');
		$password 					= Input::get('password');

		$results 					= API::person()->authenticate($username, $password);

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

			$results 									= API::branch()->destroy($org_id, $id);
			$contents 									= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::route('hr.organisation.branches.show', ['id' => $id, 'org_id' => $org_id])->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::route('hr.organisation.branches.index', ['page' => 1,'org_id' => $org_id])->with('alert_success', 'Data Cabang "' . $contents->data->name. '" sudah dihapus');
			}
		}
		else
		{
			return Redirect::route('hr.organisation.branches.show', ['id' => $id])->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}
}
