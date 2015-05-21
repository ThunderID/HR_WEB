<?php namespace App\Http\Controllers\Person;

use Input, Session, App, Config, Paginator, Redirect, Validator, PDF, View;
use API;
use App\Http\Controllers\Controller;

class DocumentController extends Controller {

	protected $controller_name = 'personalia';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($personid, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		if(input::has('tag'))
		{
			$search 								= ['WithAttributes' => ['document'], 'tag'=> input::get('tag')];
		}
		else
		{
			$search 								= ['WithAttributes' => ['document']];
		}
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->documentIndex($personid, $page, $search, $sort);

		$contents 									= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$person_documents 							= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$results 									= API::person()->show($personid);
		
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$search 									= ['organisationid' => Session::get('user.organisation'), 'WithAttributes' => ['templates']];

		$sort 										= ['tag' => 'asc'];

		$results_2 									= API::document()->index(1, $search, $sort);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}
		
		$documents 									= json_decode(json_encode($contents_2->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($contents->data->name);

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.show.dokumen.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->documents 			= $documents;
		$this->layout->content->person_documents 	= $person_documents;
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
						$document['details'][] 			= ['value' => $value2, 'template_id' => Input::get('template_id')[$key][$key2]];
					}
				}
				if(isset($document['details']))
				{
					$input['documents'][] 				= $document;
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
			return Redirect::route('hr.persons.show', [$content->data->id]);
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

		$person_document 							= json_decode(json_encode($contents->data), true);

		$search 									= ['organisationid' => Session::get('user.organisation'), 'WithAttributes' => ['templates']];

		$sort 										= ['tag' => 'asc'];

		$results_2 									= API::document()->index(1, $search, $sort);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}
		
		$documents 									= json_decode(json_encode($contents_2->data), true);

		$results 									= API::person()->show($personid);
		
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= ucwords($contents->data->name);

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.show.dokumen.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->person_document 	= $person_document;
		$this->layout->content->documents 			= $documents;

		return $this->layout;
	}

	function anyDelete($personid, $id)
	{
		$email 						= Session::get('user.email');
		$password 					= Input::get('password');

		$results 					= API::person()->authenticate($email, $password);

		$content 					= json_decode($results);

		if($content->meta->success)
		{
			$results 									= API::person()->documentdestroy($personid, $id);

			$contents 									= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::route('hr.persons.documents.show', [$personid, $id])->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::route('hr.persons.documents.index', [$personid])->with('alert_success', 'Dokumen sudah dihapus');
			}
		}
		else
		{
			return Redirect::route('hr.persons.documents.index', [$personid])->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}

	function getPrint($personid, $id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::person()->documentshow($personid, $id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$person_document 							= json_decode(json_encode($contents->data), true);

		$results 									= API::person()->show($personid);
		
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$template									= $person_document['document']['template'];
		$template									= str_replace("//name//", $data['name'], $template);
		$template									= str_replace("//position//", $data['works'][0]['name'], $template);
		
		foreach ($person_document['details'] as $key => $value) 
		{
			$template								= str_replace("//".strtolower($value['template']['field'])."//", ($value['numeric'] ? $value['numeric'] : $value['text']), $template);
		}

		// ---------------------- GENERATE CONTENT ----------------------
			
		return view('prints.document')->with('data', $data)->with('document', $person_document)->with('template', $template);
	}

	function getPDF($personid, $id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::person()->documentshow($personid, $id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$person_document 							= json_decode(json_encode($contents->data), true);

		$results 									= API::person()->show($personid);
		
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$template									= $person_document['document']['template'];
		$template									= str_replace("//name//", $data['name'], $template);
		$template									= str_replace("//position//", $data['works'][0]['name'], $template);
		
		foreach ($person_document['details'] as $key => $value) 
		{
			$template								= str_replace("//".strtolower($value['template']['field'])."//", ($value['numeric'] ? $value['numeric'] : $value['text']), $template);
		}

		// ---------------------- GENERATE CONTENT ----------------------

		$pdf = PDF::loadView('prints.document', ['data' => $data, 'document' => $person_document, 'template' => $template])->setPaper('a4');

		return $pdf->stream();
	}
}
