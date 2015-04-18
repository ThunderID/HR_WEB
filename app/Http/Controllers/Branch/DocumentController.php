<?php namespace App\Http\Controllers\Branch;

use Input, Session, App, Redirect, Paginator;
use App\APIConnector\API;
use App\Http\Controllers\Controller;

class DocumentController extends Controller {

	protected $controller_name = 'dokumen';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['countperson' => '', 'organisation' => Session::get('user.organisation')];
		if(Input::has('q'))
		{
			$search 								= ['name' => Input::get('q'),'WithAttributes' => ['persons'], 'organisation' => Session::get('user.organisation')];
		}
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::document()->index($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$data 										= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper(($this->controller_name));

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
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
		$input['document'] 							= Input::only('name','required');
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

		$input['organisation']['id']				= Session::get('user.organisation');

		$results 									= API::document()->store($id, $input);

		$content 									= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.documents.index');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function getShow($id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::document()->show($id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords($contents->data->name);

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;

		return $this->layout;
	}

	function getEdit($id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::document()->show($id);

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
		if (Input::has('from_confirm_form'))
		{
			if (Input::get('from_confirm_form')=='Yes')
			{
				$results 									= API::document()->destroy($id);
				$contents 									= json_decode($results);

				if (!$contents->meta->success)
				{
					return Redirect::route('hr.documents.show', ['id' => $id])->withErrors($contents->meta->errors);
				}
				else
				{
					return Redirect::route('hr.documents.index')->with('alert_success', 'Dokumen "' . $contents->data->name. '" sudah dihapus');
				}
			}
			else
			{
				return Redirect::route('hr.documents.show', ['id' => $id])->withErrors(['Batal Menghapus']);
			}
		}
		else
		{
			$results 									= API::document()->show($id);
			$contents 									= json_decode($results);

			if(!$contents->meta->success)
			{
				App::abort(404);
			}

			$data 										= json_decode(json_encode($contents->data), true);

			$this->layout->page_title 					= strtoupper($this->controller_name);

			$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.destroy');
			$this->layout->content->controller_name 	= $this->controller_name;
			$this->layout->content->data 				= $data;

			return $this->layout;
		}
	}

	function anyTemplateDelete($id)
	{
		$results 									= API::document()->destroytemplate($id);
		$contents 									= json_decode($results);

		if (!$contents->meta->success)
		{
			return Redirect::back()->withErrors($contents->meta->errors);
		}
		else
		{
			return Redirect::route('hr.documents.index')->with('alert_success', 'Template Dokumen "' . $contents->data->field. '" sudah dihapus');
		}
	}
}
