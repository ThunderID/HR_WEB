<?php namespace App\Http\Controllers;

use Input, Session, App, Config, Paginator, Redirect, Validator;
use App\APIConnector\API;

class PersonController extends AdminController {

	protected $controller_name = 'karyawan';

	function __construct() 
	{
		parent::__construct();
	}
	
	function getIndex($page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['CurrentContact' => 'updated_at' ,'checkwork' => 'active'];
		if(Input::has('q'))
		{
			if(Input::has('field'))
			{
				$search[Input::get('field')]		= Input::get('q');			
			}
			else
			{
				$search['firstname']				= Input::get('q');			
				$search['orlastname']				= Input::get('q');			
				$search['orprefixtitle']			= Input::get('q');			
				$search['orsuffixtitle']			= Input::get('q');			
			}
		}

		if(Input::has('sort_firstname'))
		{
			$sort['first_name']						= Input::get('sort_firstname');			
		}
		elseif(Input::has('sort_lastname'))
		{
			$sort['last_name']						= Input::get('sort_lastname');			
		}
		else
		{
			$sort 									= ['created_at' => 'asc'];
		}

		$results 									= API::person()->index($page, $search, $sort);

		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper(($this->controller_name));

		if(Input::has('q'))
		{
			$this->layout->page_title 				= 'Hasil Pencarian "'.Input::get('q').'"';
		}

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function getCreate($id = null)
	{

		// ---------------------- LOAD DATA ----------------------
		$search 									= ['organisation' => Session::get('user.organisation'), 'isrequired' => true, 'WithAttributes' => ['templates']];

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
		$input['person'] 							= Input::only('prefix_title', 'first_name', 'middle_name', 'last_name', 'suffix_title', 'nick_name', 'gender', 'place_of_birth', 'username');
		$input['person']['date_of_birth']			= date("Y-m-d", strtotime(Input::get('date_of_birth')));
		$input['person']['id']						= $id;
		$input['person']['avatar']					= Input::get('link_profile_picture');
		if(Input::get('passowrd')!='')
		{
			$validator 					= Validator::make(['password' => Input::get('password')], ['password' => 'required|confirmed|min:8']);

			if (!$validator->passes())
			{
				return Redirect::back()->withErrors($validator->errors())->withInput();
			}
			$input['person']['passowrd']			= Input::get('password');
		}

		if(Input::has('work_company'))
		{
			foreach (Input::get('work_company') as $key => $value) 
			{
				$address 							= $value;
				if(Input::get('work_company')[$key]!='')
				{
					$chart['organisation_chart_id'] = Input::get('work_company')[$key];
					$chart['status'] 				= Input::get('work_status')[$key];
					$chart['start'] 				= date("Y-m-d", strtotime(Input::get('work_start')[$key]));
					$chart['end'] 					= date("Y-m-d", strtotime(Input::get('work_end')[$key]));
					if(Input::get('work_end')[$key]=='')
					{
						$chart['end'] 				= null;
					}
					$chart['reason_end_job'] 		= Input::get('work_quit_reason')[$key];
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
						$input['relatives'][] 			= $relate;
					}
					else
					{
						$relate['prefix_title'] 		= Input::get('prefix_title_relation')[$key];
						$relate['first_name'] 			= Input::get('first_name_relation')[$key];
						$relate['middle_name'] 			= Input::get('midle_name_relation')[$key];
						$relate['last_name'] 			= Input::get('last_name_relation')[$key];
						$relate['suffix_title'] 		= Input::get('suffix_title_relation')[$key];
						$relate['nick_name'] 			= Input::get('nick_name_relation')[$key];
						$relate['gender'] 				= Input::get('gender_relation')[$key];
						$relate['date_of_birth'] 		= date("Y-m-d", strtotime(Input::get('place_of_birth_relation')[$key]));
						$relate['place_of_birth'] 		= Input::get('place_of_birth_relation')[$key];
						$relate['relationship'] 		= Input::get('relationship')[$key];
						$input['relatives'][] 			= $relate;
					}
				}
			}
		}

		if(Input::has('address_address'))
		{
			foreach (Input::get('address_address') as $key => $value) 
			{
				$address 							= $value;
				if(Input::get('address_RT')[$key]!='')
				{
					$address 						= $address.' RT. '.Input::get('address_RT')[$key];
				}
				if(Input::get('address_RW')[$key]!='')
				{
					$address 						= $address.' RW. '.Input::get('address_RW')[$key];
				}
				if(Input::get('address_kecamatan')[$key]!='')
				{
					$address 						= $address.' Kec. '.Input::get('address_kecamatan')[$key];
				}
				if(Input::get('address_kelurahan')[$key]!='')
				{
					$address 						= $address.' Kel. '.Input::get('address_kelurahan')[$key];
				}
				if(Input::get('address_kota')[$key]!='')
				{
					$address 						= $address.' Kota/Kab '.Input::get('address_kota')[$key];
				}
				if(Input::get('address_provinsi')[$key]!='')
				{
					$address 						= $address.' - '.Input::get('address_provinsi')[$key];
				}
				if(Input::get('address_negara')[$key]!='')
				{
					$address 						= $address.' - '.Input::get('address_negara')[$key];
				}
				if(Input::get('address_kode_pos')[$key]!='')
				{
					$address 						= $address.' Kode pos '.Input::get('address_kode_pos')[$key];
				}
				$input['contact']['address'][] 		= $address;
			}
		}

		if(Input::has('contact_phone'))
		{
			foreach (Input::get('contact_phone') as $key => $value) 
			{
				if($value!='')
				{
					$input['contact']['phone_number'][] = $value;
				}
			}
		}

		if(Input::has('contact_email'))
		{
			foreach (Input::get('contact_email') as $key => $value) 
			{
				if($value!='')
				{
					$input['contact']['email'][] 		= $value;
				}
			}
		}

		if(Input::has('contact_BBM'))
		{
			foreach (Input::get('contact_BBM') as $key => $value) 
			{
				if($value!='')
				{
					$input['contact']['bbm'][] 			= $value;
				}
			}
		}

		if(Input::has('contact_LINE'))
		{
			foreach (Input::get('contact_LINE') as $key => $value) 
			{
				if($value!='')
				{
					$input['contact']['line'][]		 	= $value;
				}
			}
		}

		if(Input::has('contact_WhatsApp'))
		{
			foreach (Input::get('contact_WhatsApp') as $key => $value) 
			{
				if($value!='')
				{
					$input['contact']['whatsapp'][] 	= $value;
				}
			}
		}

		if(Input::has('documents'))
		{
			foreach (Input::get('documents') as $key => $value) 
			{
				$document['document']['id'] 			= $value;
				foreach (Input::get('template_value')[$key] as $key2 => $value2) 
				{
					if($value2!='')
					{
						$document['details'][] 			= ['value' => $value2, 'document_template_id' => Input::get('template_id')[$key][$key2]];
					}
				}
				$input['documents'][] 					= $document;
			}
		}

		$results 										= API::person()->store($id, $input);

		$content 										= json_decode($results);
		if($content->meta->success)
		{
			return Redirect::route('hr.persons.index');
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

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= strtoupper($contents->data->nick_name);

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.show');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;

		return $this->layout;
	}

	function getEdit($id = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['organisation' => Session::get('user.organisation'), 'isrequired' => true, 'WithAttributes' => ['templates']];

		$sort 										= ['created_at' => 'asc'];

		$results 									= API::document()->index(1, $search, $sort, $all = true);

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
		$this->layout->page_title 					= strtoupper('Edit "'.$content->data->nick_name.'"');

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
		if (Input::has('from_confirm_form'))
		{
			if (Input::get('from_confirm_form')=='Yes')
			{
				$results 									= API::person()->destroy($id);
				$contents 									= json_decode($results);

				if (!$contents->meta->success)
				{
					return Redirect::route('hr.persons.show', ['id' => $id])->withErrors($contents->meta->errors);
				}
				else
				{
					return Redirect::route('hr.persons.index')->with('alert_success', 'Data Orang "' . $contents->data->first_name. '" sudah dihapus');
				}
			}
			else
			{
				return Redirect::route('hr.persons.show', ['id' => $id])->withErrors(['Batal Menghapus']);
			}
		}
		else
		{
			$results 									= API::person()->show($id);
			$contents 									= json_decode($results);

			if(!$contents->meta->success)
			{
				App::abort(404);
			}

			$data 										= json_decode(json_encode($contents->data), true);

			$this->layout->page_title 					= strtoupper($this->controller_name);

			$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.destroy');
			$this->layout->content->controller_name 	= $this->controller_name;
			$this->layout->content->data 				= $data;

			return $this->layout;
		}
	}

	function getRelativesIndex($personid, $page = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search 									= ['checkrelation' => $personid, 'CurrentContact' => 'updated_at'];
		$sort 										= ['first_name' => 'asc'];

		$results 									= API::person()->index($page, $search, $sort);

		$contents 									= json_decode($results);
		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$relatives 									= json_decode(json_encode($contents->data), true);
		$paginator 									= new Paginator($contents->pagination->total_data, (int)$contents->pagination->page, $contents->pagination->per_page, $contents->pagination->from, $contents->pagination->to);

		$results 									= API::person()->show($personid);
		$contents 									= json_decode($results);

		if(!$contents->meta->success)
		{
			App::abort(404);
		}

		$data 										= json_decode(json_encode($contents->data), true);

		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Kerabat '.strtoupper($contents->data->nick_name);

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.relatives.index');
		$this->layout->content->controller_name 	= $this->controller_name;
		$this->layout->content->data 				= $data;
		$this->layout->content->relatives 			= $relatives;
		$this->layout->content->paginator 			= $paginator;

		return $this->layout;
	}

	function postWorksStore($person_id, $id = null)
	{
		// ---------------------- HANDLE INPUT ----------------------
		
		if(Input::has('work_company'))
		{
			if(Input::get('work_company')!='')
			{
				$results 							= API::person()->show($person_id);
				$contents 							= json_decode($results);

				if(!$contents->meta->success)
				{
					App::abort(404);
				}

				$input['person'] 					= [];

				$chart['organisation_chart_id'] 	= Input::get('work_company');
				$chart['status'] 					= Input::get('work_status');
				$chart['start'] 					= date("Y-m-d", strtotime(Input::get('work_start')));
				$chart['end'] 						= date("Y-m-d", strtotime(Input::get('work_end')));
				$chart['reason_end_job'] 			= Input::get('work_quit_reason');
				$input['works'][] 					= $chart;
				$results 										= API::person()->store($person_id, $input);

				$content 										= json_decode($results);
				if($content->meta->success)
				{
					return Redirect::route('hr.persons.index');
				}
				return Redirect::back()->withErrors($content->meta->errors)->withInput();
			}
		}

		return Redirect::back()->withErrors(['Tidak ada data tersimpan'])->withInput();
	}
}
