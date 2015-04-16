<?php namespace App\Http\Controllers\Person;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use App\APIConnector\API;
use App\Http\Controllers\Controller;

class DocumentController extends Controller {

	protected $controller_name = 'karyawan';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($personid, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['WithAttributes' => ['document']];
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->documentIndex($personid, $page, $search, $sort);

		$contents 									= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$documents 									= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$results 									= API::person()->show($personid);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$search 									= ['organisation' => Session::get('user.organisation'), 'isrequired' => false, 'WithAttributes' => ['templates']];
		$sort 										= ['created_at' => 'asc'];
		$results2 									= API::document()->index(1, $search, $sort, $all = true);
		$contents_2 								= json_decode($results2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}
		$docs 										= json_decode(json_encode($contents_2->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Dokumen '.strtoupper($contents->data->nick_name);

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.dokumen.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->documents 			= $documents;
		$this->layout->content->docs 				= $docs;
		$this->layout->content->paginator 			= $paginator;
		$this->layout->content->route 				= ['person_id' => $data['id']];

		return $this->layout;
	}

	function postStore($personid)
	{
		// ---------------------- HANDLE INPUT ----------------------
		if(Input::has('documents'))
		{
			foreach (Input::get('documents') as $key => $value) 
			{
				$document['document']['id'] 			= $value;
				$document['document']['document_id'] 	= Input::get('documents_id')[$key];
				foreach (Input::get('template_value')[$key] as $key2 => $value2) 
				{
					if($value2!='')
					{
						$document['details'][] 			= ['value' => $value2, 'document_template_id' => Input::get('template_id')[$key][$key2]];
					}
				}
				if(isset($document['details']))
				{
					$input['documents'][] 					= $document;
				}
			}
		}

		if(!isset($input['documents']))
		{
			return Redirect::back()->withErrors(['Tidak ada dokumen disimpan'])->withInput();
		}
		// ---------------------- GENERATE CONTENT ----------------------
		$input['person']['id']							= $personid;
		$results 										= API::person()->store($personid, $input);

		$content 										= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.persons.documents.index', [$content->data->id]);
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function getShow($personid, $id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::person()->documentshow($personid, $id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords($contents->data->document->name.' '.$contents->data->person->first_name);

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.dokumen.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;

		return $this->layout;
	}

	function anyDelete($personid, $id)
	{
		$results 									= API::person()->documentdestroy($personid, $id);

		$contents 									= json_decode($results);

		if (!$contents->meta->success)
		{
			return Redirect::back()->withErrors($contents->meta->errors);
		}
		else
		{
			return Redirect::route('hr.persons.documents.index', [$personid])->with('alert_success', 'Dokumen "' . $contents->data->name. '" sudah dihapus');
		}
	}
}
