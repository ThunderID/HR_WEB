<?php namespace App\Http\Controllers\Organisation\Document;

use Input, Session, App, Redirect, Paginator;
use API;
use App\Http\Controllers\Controller;

class DocumentController extends Controller {

	protected $controller_name = 'dokumen';

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
			$search 								= ['name' => Input::get('q'), 'organisationid' => $org_id];
		}

		if(Input::has('tag'))
		{
			$search['tag'] 							= Input::get('tag');
		}
		
		if(Input::has('sort_name'))
		{
			$sort['name']							= Input::get('sort_name');			
		}
		else
		{
			$sort 									= ['name' => 'asc'];
		}

		$results 									= API::document()->index($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$documents 									= json_decode(json_encode($contents->data), true);
		
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$search 									= ['organisationid' => $org_id];
		$search['grouptag'] 						= true;

		$sort 										= ['tag' => 'asc'];

		$results_2 									= API::document()->index($page, $search, $sort);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}
		
		$tags 										= json_decode(json_encode($contents_2->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper(($this->controller_name));

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->documents 			= $documents;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->filters 			= [['title' => 'Filter Dokumen', 'display' => 'tag', 'input' => 'tag', 'filter' => 'tag','filters' => $tags]];
		$this->layout->content->route 				= ['org_id' => $data['id'], 'tag' => Input::get('tag')];

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
		$this->layout->content->document 			= null;

		return $this->layout;
	}

	function postStore($id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
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

		$input['document'] 							= Input::only('name','required', 'tag', 'template');
		$input['document']['is_required']			= false;

		if(Input::has('required'))
		{
			$input['document']['is_required']		= true;
		}

		$input['document']['id'] 					= $id;

		if(Input::has('field'))
		{
			foreach (Input::get('field') as $key => $value) 
			{
				if($value!='' && isset(Input::get('type')[$key]) && Input::get('type')[$key]!='')
				{
					if(isset(Input::get('id_template')[$key]))
					{
						$input['templates'][] 		= ['field' => $value, 'type' => Input::get('type')[$key], 'id' => Input::get('id_template')[$key]];
					}
					else
					{
						$input['templates'][] 		= ['field' => $value, 'type' => Input::get('type')[$key]];
					}
				}
			}
		}

		$input['organisation']['id']				= $org_id;

		$results 									= API::document()->store($id, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.organisation.documents.index', ['page' => 1,'org_id' => $org_id])->with('alert_success', 'Data Dokumen sudah di simpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function getShow($id, $page=null)
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
		$results 										= API::document()->show($id, ['withattributes' => ['templates']]);

		$contents 										= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$document 										= json_decode(json_encode($contents->data), true);

		$this->layout->content 							= view('admin.pages.organisation.'.$this->controller_name.'.show');
		
		if(!is_null($page))
		{
			// ---------------------- LOAD DATA ----------------------
			$search 									= ['documentid' => $id, 'currentwork' => true];

			if(Input::has('branchid'))
			{
				$search['branchid']						= Input::get('branchid');
			}

			$sort 										= ['created_at' => 'asc'];

			$results 									= API::document()->personindex($page, $search, $sort);

			$contents_2 								= json_decode($results);

			if(!$contents_2->meta->success)
			{
				App::abort(404);
			}
			
			$persons 									= json_decode(json_encode($contents_2->data), true);

			$paginator 									= new Paginator($contents_2->pagination->total_data, (int)$contents_2->pagination->page, $contents_2->pagination->per_page, $contents_2->pagination->from, $contents_2->pagination->to);
			
			$search 									= ['organisationid' => $org_id];

			$sort 										= ['name' => 'asc'];

			$results_2 									= API::branch()->index(1, $search, $sort);

			$contents_2 								= json_decode($results_2);

			if(!$contents_2->meta->success)
			{
				App::abort(404);
			}
			
			$branches 									= json_decode(json_encode($contents_2->data), true);

			$this->layout->content->persons 			= $persons;
			$this->layout->content->paginator 			= $paginator;
			$this->layout->content->route 				= ['id' => $id, 'org_id' => $org_id];
			$this->layout->content->filters 			= [['title' => 'Filter Cabang', 'input' => 'branchid', 'filter' => 'id', 'display' => 'name','filters' => $branches]];
		}
		else
		{
			$this->layout->content->persons 			= null;
		}

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords($contents->data->name);

		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->document 			= $document;

		return $this->layout;
	}

	function getEdit($id)
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
		$results 									= API::document()->show($id, ['organisationid' => $org_id, 'withattributes' => ['templates']]);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$document 									= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($this->controller_name);

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->document 			= $document;

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
	
			$results 									= API::document()->destroy($org_id, $id);
			$contents 									= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::back()->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::back()->with('alert_success', 'Dokumen "' . $contents->data->name. '" sudah dihapus');
			}
		}
		else
		{
			return Redirect::back()->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}

	function anyTemplateDelete($id)
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

		$doc_id 									= Input::get('doc_id');

		$results 									= API::document()->show($doc_id, ['organisationid' => $org_id]);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$results 									= API::document()->destroytemplate($org_id, $id);

		$contents 									= json_decode($results);

		if (!$contents->meta->success)
		{
			return Redirect::back()->withErrors($contents->meta->errors);
		}
		else
		{
			return Redirect::back()->with('alert_success', 'Template Dokumen "' . $contents->data->field. '" sudah dihapus');
		}
	}

	function showTemplatePDF($id)
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

		$results 									= API::document()->show($id, ['organisationid' => $org_id]);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// return view('admin.pages.organisation.'.$this->controller_name.'.template_pdf')->with('data', $data);

		$pdf 										= PDF::loadView('admin.pages.organisation.'.$this->controller_name.'.template_pdf', ['data' => $data]);


		return $pdf->stream();
	}

}
