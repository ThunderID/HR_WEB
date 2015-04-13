<?php namespace App\Http\Controllers;

use Input, Session, App, Paginator, Redirect;
use App\APIConnector\API;

class CompanyController extends AdminController {

	protected $controller_name = 'kantor';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search['ParentOrganisation']				= Session::get('user.organisation');
		if(Input::has('q'))
		{
			if(Input::has('field'))
			{
				$search[Input::get('field')]		= Input::get('q');			
			}
			else
			{
				$search['name']						= Input::get('q');			
				$search['orbusinessactivities']		= Input::get('q');			
				$search['orbusinessfields']			= Input::get('q');			
			}
		}

		if(Input::has('sort_name'))
		{
			$sort['name']							= Input::get('sort_name');			
		}
		elseif(Input::has('sort_date'))
		{
			$sort['created_at']						= Input::get('sort_date');			
		}
		else
		{
			$sort 									= ['created_at' => 'asc'];
		}

		$results 									= API::organisationbranch()->index($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		$data 										= json_decode(json_encode($contents->data), true);
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
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function getCreate($id = null)
	{
		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Tambah '.$this->controller_name.' baru';;

		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= null;

		return $this->layout;
	}

	function postStore($id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		$input['branch'] 							= Input::only('name','license','npwp','business_activities','business_fields');
		$input['branch']['id'] 						= $id;
		if(Input::has('address_address'))
		{
			foreach (Input::get('address_address') as $key => $value) 
			{
				$address['value'] 					= $value;
				if(isset(Input::get('address_RT')[$key]) && Input::get('address_RT')[$key]!='')
				{
					$address['value'] 				= $address['value'].' RT. '.Input::get('address_RT')[$key];
				}
				if(isset(Input::get('address_RW')[$key]) && Input::get('address_RW')[$key]!='')
				{
					$address['value'] 				= $address['value'].' RW. '.Input::get('address_RW')[$key];
				}
				if(isset(Input::get('address_kecamatan')[$key]) && Input::get('address_kecamatan')[$key]!='')
				{
					$address['value'] 				= $address['value'].' Kec. '.Input::get('address_kecamatan')[$key];
				}
				if(isset(Input::get('address_kelurahan')[$key]) && Input::get('address_kelurahan')[$key]!='')
				{
					$address['value'] 				= $address['value'].' Kel. '.Input::get('address_kelurahan')[$key];
				}
				if(isset(Input::get('address_kota')[$key]) && Input::get('address_kota')[$key]!='')
				{
					$address['value'] 				= $address['value'].' Kota/Kab '.Input::get('address_kota')[$key];
				}
				if(isset(Input::get('address_provinsi')[$key]) && Input::get('address_provinsi')[$key]!='')
				{
					$address['value'] 				= $address['value'].' - '.Input::get('address_provinsi')[$key];
				}
				if(isset(Input::get('address_negara')[$key]) && Input::get('address_negara')[$key]!='')
				{
					$address['value'] 				= $address['value'].' - '.Input::get('address_negara')[$key];
				}
				if(isset(Input::get('address_kode_pos')[$key]) && Input::get('address_kode_pos')[$key]!='')
				{
					$address['value'] 				= $address['value'].' Kode pos '.Input::get('address_kode_pos')[$key];
				}
				if(isset(Input::get('id_address')[$key]) && Input::get('id_address')[$key]!='')
				{
					$address['id'] 					= Input::get('id_address')[$key];
				}
				if($address['value']!='')
				{
					$input['contact']['address'][] 	= $address;
				}
			}
		}

		if(Input::has('contact_phone'))
		{
			foreach (Input::get('contact_phone') as $key => $value) 
			{
				if($value!='')
				{
					if(isset(Input::get('id_phone')[$key]))
					{
						$input['contact']['phone_number'][] = ['value' => $value, 'id' => Input::get('id_phone')[$key]];
					}
					else
					{
						$input['contact']['phone_number'][] = ['value' => $value];
					}
				}
			}
		}

		if(Input::has('contact_email'))
		{
			foreach (Input::get('contact_email') as $key => $value) 
			{
				if($value!='')
				{
					if(isset(Input::get('id_phone')[$key]))
					{
						$input['contact']['email'][] = ['value' => $value, 'id' => Input::get('id_email')[$key]];
					}
					else
					{
						$input['contact']['email'][] = ['value' => $value];
					}
				}
			}
		}

		$input['organisation']['id']					= Session::get('user.organisation');

		$results 										= API::organisationbranch()->store($id, $input);

		$content 										= json_decode($results);
		
		if($content->meta->success)
		{
			return Redirect::route('hr.organisation.branches.index');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function getShow($id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::organisationbranch()->show($id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= $contents->data->name;
		$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;

		return $this->layout;
	}


	function getEdit($id)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::organisationbranch()->show($id);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Edit "'.$contents->data->name.'"';

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
				$results 									= API::organisationbranch()->destroy($id);
				$contents 									= json_decode($results);

				if (!$contents->meta->success)
				{
					return Redirect::route('hr.organisation.branches.show', ['id' => $id])->withErrors($contents->meta->errors);
				}
				else
				{
					return Redirect::route('hr.organisation.branches.index')->with('alert_success', 'Organisasi "' . $contents->data->name. '" sudah dihapus');
				}
			}
			else
			{
				return Redirect::route('hr.organisation.branches.show', ['id' => $id])->withErrors(['Batal Menghapus']);
			}
		}
		else
		{
			$results 									= API::organisationbranch()->show($id);
			$contents 									= json_decode($results);

			if(!$contents->meta->success)
			{
				App::abort(404);
			}

			$data 										= json_decode(json_encode($contents->data), true);

			$this->layout->page_title 					= 'Kantor';

			$this->layout->content 						= view('admin.pages.organisation.'.$this->controller_name.'.destroy');
			$this->layout->content->controller_name 	= $this->controller_name;
			$this->layout->content->data 				= $data;

			return $this->layout;
		}
	}
}
