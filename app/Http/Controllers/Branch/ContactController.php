<?php namespace App\Http\Controllers\Branch;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use API;
use App\Http\Controllers\Controller;

class ContactController extends Controller {

	protected $controller_name = 'kantor';

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

		$results 									= API::organisationbranch()->show($branchid, $department);

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

		$sort 										= ['is_default' => 'desc'];

		$results_3 									= API::organisationbranch()->contactIndex($page, $search, $sort);

		$contents 									= json_decode($results_3);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$contacts 									= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= $data['name'];
		$this->layout->content 						= view('admin.pages.organisation.kantor.show.kontak.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->contacts 			= $contacts;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}


	function postStore($branchid = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['branch']['id'] 						= $branchid;

		if(Input::has('address_address'))
		{
			foreach (Input::get('address_address') as $key => $value) 
			{
				$address							= [];
				$address['value'] 					= $value;
				if(isset(Input::get('id_address')[$key]) && Input::get('id_address')[$key]!='')
				{
					$address['id'] 					= Input::get('id_address')[$key];
				}
				if($address['value']!='')
				{
					$address['item']					= 'address';
					$input['contacts']['address'][] 	= $address;
				}
			}
		}

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
					
					$contact['item']				= $value;
					$input['contacts'][$value][] 	= $contact;
				}
			}
		}

		$input['organisation']['id']					= Session::get('user.organisation');

		$results 										= API::organisationbranch()->store($branchid, $input);

		$content 										= json_decode($results);
		
		if($content->meta->success)
		{
			return Redirect::route('hr.organisation.branches.show', [$branchid])->with('alert_success', 'Kantor '.$content->data->name.' Sudah Tersimpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}
}
