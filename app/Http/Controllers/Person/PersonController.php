<?php namespace App\Http\Controllers\Person;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use API;
use App\Http\Controllers\Controller;

class PersonController extends Controller {

	protected $controller_name = 'personalia';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['CurrentContact' => 'item'];
		if(Input::has('karyawan'))
		{
			$search['CurrentWork']					= '';
			$search['checkwork']					= true;
		}
		if(Input::has('non-karyawan'))
		{
			$search['CheckWork']					= false;			
		}
		if(Input::has('gender'))
		{
			$search['gender']						= Input::get('gender');			
		}

		if(Input::has('branch'))
		{
			$search['CurrentWorkOn']				= Input::get('branch');			
		}
		if(Input::has('q'))
		{
			$search['fullname']						= Input::get('q');			
		}
		if(Input::has('tag'))
		{
			$search['CurrentWorkOn']				= [Input::get('branch'), Input::get('tag')];			
		}

		if(Input::has('sort_firstname'))
		{
			$sort['name']						= Input::get('sort_firstname');			
		}
		elseif(Input::has('sort_lastname'))
		{
			$sort['last_name']						= Input::get('sort_lastname');			
		}
		else
		{
			$sort 									= ['name' => 'asc'];
		}

		$results 									= API::person()->index($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$search										= ['organisationid' => Session::get('user.organisation')];
		
		if(Input::has('branch'))
		{
			$search['name']							= Input::get('branch');
			$search['DisplayDepartments']			= '';
		}

		$sort 										= ['created_at' => 'asc'];			
		
		$results_2 									= API::organisationbranch()->index(1, $search, $sort);

		$contents_2 								= json_decode($results_2);

		if(!$contents_2->meta->success)
		{
			App::abort(404);
		}
		
		$branches 									= json_decode(json_encode($contents_2->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper(($this->controller_name));

		if(Input::has('q'))
		{
			$this->layout->page_title 				= 'Hasil Pencarian "'.Input::get('q').'"';
		}

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->branches 			= $branches;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function getCreate($id = null)
	{

		// ---------------------- LOAD DATA ----------------------
		$search 									= ['organisationid' => Session::get('user.organisation'), 'isrequired' => true, 'WithAttributes' => ['templates']];

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::document()->index(1, $search, $sort, $all = true);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}
		
		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Tambah '.ucwords($this->controller_name).' Baru';

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= ($this->controller_name);

		$this->layout->content->data 				= null;
		$this->layout->content->docs				= json_decode(json_encode($contents->data), true);

		return $this->layout;
	}

	function postStore($id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		if(Input::has('name'))
		{
			$input['person'] 							= Input::only('prefix_title', 'name', 'suffix_title', 'gender', 'place_of_birth');
		}

		if(Input::has('date_of_birth'))
		{
			$input['person']['date_of_birth']			= date("Y-m-d", strtotime(Input::get('date_of_birth')));
		}
		
		$input['person']['id']						= $id;
		$input['person']['avatar']					= Input::get('link_profile_picture');

		if(Input::get('password')!='' && !is_null($id))
		{
			$validator 								= Validator::make(['password' => Input::get('password')], ['password' => 'required|min:8']);

			if (!$validator->passes())
			{
				return Redirect::back()->withErrors($validator->errors())->withInput();
			}
			$input['person']['password']			= Input::get('password');
		}

		if(Input::has('work_company'))
		{
			foreach (Input::get('work_company') as $key => $value) 
			{
				$address 							= $value;
				if(Input::get('work_company')[$key]!='')
				{
					$chart['chart_id'] 				= Input::get('work_company')[$key];
					$chart['status'] 				= Input::get('work_status')[$key];
					$chart['start'] 				= date("Y-m-d", strtotime(Input::get('work_start')[$key]));
					if(Input::get('work_end')[$key]!='')
					{
						$chart['end'] 				= date("Y-m-d", strtotime(Input::get('work_end')[$key]));
						$chart['reason_end_job'] 	= Input::get('work_quit_reason')[$key];
					}
					$input['works'][] 				= $chart;
				}
			}
		}

		if(Input::has('relationship'))
		{
			foreach (Input::get('relationship') as $key => $value) 
			{
				$address 							= $value;
				if(Input::get('relationship')[$key]!='')
				{
					if(Input::get('relation_id')[$key]!='')
					{
						$relate['id'] 					= Input::get('relation_id')[$key];
						$relate['relationship'] 		= Input::get('relationship')[$key];
						$relate['organisation_id'] 		= Session::get('user.organisation');
						$input['relatives'][] 			= $relate;
					}
					else
					{
						$relate['prefix_title'] 		= Input::get('prefix_title_relation')[$key];
						$relate['name'] 				= Input::get('name_relation')[$key];
						$relate['middle_name'] 			= Input::get('midle_name_relation')[$key];
						$relate['last_name'] 			= Input::get('last_name_relation')[$key];
						$relate['full_name']			= $relate['name'].' '.$relate['middle_name'].' '.$relate['last_name'];
						$relate['suffix_title'] 		= Input::get('suffix_title_relation')[$key];
						$relate['name'] 				= Input::get('name_relation')[$key];
						$relate['gender'] 				= Input::get('gender_relation')[$key];
						$relate['date_of_birth'] 		= date("Y-m-d", strtotime(Input::get('place_of_birth_relation')[$key]));
						$relate['place_of_birth'] 		= Input::get('place_of_birth_relation')[$key];
						$relate['relationship'] 		= Input::get('relationship')[$key];
						$relate['organisation_id'] 		= Session::get('user.organisation');
						$relate['contacts'][]	 		= ['item' => 'phone_number', 'value' => Input::get('phone_relation')[$key]];
						$input['relatives'][] 			= $relate;
					}
				}
			}
		}

		if(Input::has('address_address'))
		{
			foreach (Input::get('address_address') as $key => $value) 
			{
				$address							= [];
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

		if(Input::has('documents'))
		{
			foreach (Input::get('documents') as $key => $value) 
			{
				$document['document']['id'] 			= $value;
				$document['document']['document_id'] 	= Input::get('documents_id')[$key];
				foreach (Input::get('template_value')[$key] as $key2 => $value2) 
				{
					if($value2!='' && isset(Input::get('detail_id')[$key][$key2]))
					{
						$document['details'][] 			= ['value' => $value2, 'template_id' => Input::get('template_id')[$key][$key2], 'id' => Input::get('detail_id')[$key][$key2]];
					}
					elseif($value2!='')
					{
						$document['details'][] 			= ['value' => $value2, 'template_id' => Input::get('template_id')[$key][$key2]];
					}
				}
				$input['documents'][] 					= $document;
			}
		}

		$results 										= API::person()->store($id, $input);

		$content 										= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.persons.show',['id'=>$content->data->id])->with('alert_success', 'Data Personalia sudah di simpan');
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function getShow($id = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$results 									= API::person()->show($id);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		$search 									= ['organisationid' => Session::get('user.organisation'), 'grouptag' => ''];

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

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.show.profile.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->documents 			= $documents;

		return $this->layout;
	}

	function getEdit($id = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['WithAttributes' => ['document', 'details', 'details.template']];
		$sort 										= ['created_at' => 'asc'];

		$results 									= API::person()->documentIndex($id, 1, $search, $sort);

		$contents 									= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$results 									= API::person()->show($id);

		$content 									= json_decode($results);

		if(!$content->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($content->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper('Edit "'.$content->data->name.'"');

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->docs				= json_decode(json_encode($contents->data), true);

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
			$results 									= API::person()->destroy($id);
			$contents 									= json_decode($results);

			if (!$contents->meta->success)
			{
				return Redirect::route('hr.persons.show', ['id' => $id])->withErrors($contents->meta->errors);
			}
			else
			{
				return Redirect::route('hr.persons.index')->with('alert_success', 'Data Orang "' . $contents->data->name. '" sudah dihapus');
			}
		}
		else
		{
			return Redirect::route('hr.persons.show', ['id' => $id])->withErrors(['Password yang Anda masukkan tidak sah!']);
		}
	}
}
