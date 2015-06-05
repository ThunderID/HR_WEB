<?php namespace App\Http\Controllers\Organisation\Branch;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use API;
use App\Http\Controllers\Controller;

class ContactController extends Controller {

	protected $controller_name = 'cabang';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($branchid, $page = 1)
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

		$results 									= API::branch()->show($branchid, $department);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);
		
		$search 									= ['branchid' => $branchid];
		if(Input::has('item'))
		{
			$search['item']							= Input::get('item');
		}

		if(Input::has('messageService'))
		{
			$search['messageservices']				= Input::get('messageService');
		}

		$sort 										= ['is_default' => 'desc'];

		$results_3 									= API::branch()->contactIndex($page, $search, $sort);

		$contents 									= json_decode($results_3);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$contacts 									= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= $data['name'];
		$this->layout->content 						= view('admin.pages.organisation.Cabang.show.kontak.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->contacts 			= $contacts;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}


	function postStore($branchid = null)
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

		$input['branch']['id'] 						= $branchid;

		if(Input::has('item'))
		{
			foreach (Input::get('item') as $key => $value) 
			{
				$contact['value'] 					= Input::get('value')[$key];
				
				if($contact['value']!='')
				{
					if(isset(Input::get('id_item')[$key]))
					{
						$contact['id']				= Input::get('id_item')[$key];
					}

					if(Input::has('default_contact') && Input::get('default_contact')=='on')
					{
						$contact['is_default']		= true;
					}
					else
					{
						$contact['is_default']		= false;
					}

					$contact['item']				= $value;
					$input['contacts'][$value][] 	= $contact;
				}
			}
		}

		$input['organisation']['id']					= $org_id;

		$results 										= API::branch()->store($branchid, $input);
		$itm     										= Input::get('itm');
		$content 										= json_decode($results);
		
		if($content->meta->success)
		{
			if($itm)
			{
				return Redirect::route('hr.organisation.branches.show', ['id' => $branchid, 'page' => 1, 'org_id' => $org_id, 'item' => $itm])->with('alert_success', 'Cabang '.$content->data->name.' Sudah Tersimpan');
			}
			else
			{
				return Redirect::route('hr.organisation.branches.show', ['id' => $branchid, 'page' => 1, 'org_id' => $org_id])->with('alert_success', 'Cabang '.$content->data->name.' Sudah Tersimpan');
			}
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
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

			$branchid 									= Input::get('branchid');

			$results 									= API::branch()->contactDestroy($org_id, $branchid, $id);
			$contents 									= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::back()->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::back()->with('alert_success', 'Data Cabang "' . $contents->data->item. '" sudah dihapus');
			}
		}
		else
		{
			return Redirect::back()->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}
}
