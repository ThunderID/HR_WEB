<?php namespace App\Http\Controllers;

use Input, Session, App, Paginator, Redirect;
use API;
use App\Http\Controllers\Controller;

class APIKeyController extends Controller {

	protected $controller_name = 'api-key';

	function __construct() 
	{
		parent::__construct();
	}
	

	function getCreate($id = null)
	{
		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($this->controller_name);

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= null;

		return $this->layout;
	}

	function postStore($id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['name'] 								= Input::get('name');

		$results 									= API::organisation()->store($id, $input);

		$content 									= json_decode($results);

		if($content->meta->success)
		{
			return Redirect::route('hr.organisations.index');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function getShow($id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::organisation()->show($id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($this->controller_name);

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;

		return $this->layout;
	}


	function getEdit($id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::organisation()->show($id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($this->controller_name);

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.create', compact(('data')));
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
				$results 									= API::organisation()->destroy($id);
				$contents 									= json_decode($results);

				if (!$contents->meta->success)
				{
					return Redirect::route('hr.organisations.show', ['id' => $id])->withErrors($contents->meta->errors);
				}
				else
				{
					return Redirect::route('hr.organisations.index')->with('alert_success', 'Organisasi "' . $contents->data->name. '" sudah dihapus');
				}
			}
			else
			{
				return Redirect::route('hr.organisations.show', ['id' => $id])->withErrors(['Batal Menghapus']);
			}
		}
		else
		{
			$results 									= API::organisation()->show($id);
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
}
