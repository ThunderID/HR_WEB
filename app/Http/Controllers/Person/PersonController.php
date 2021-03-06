<?php namespace App\Http\Controllers\Person;

use Input, Session, App, Config, Paginator, Redirect, Validator, Image, Str;
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

		if(Input::has('org_id'))
		{
			$org_id 								= Input::get('org_id');
			Session::put('user.organisation', $org_id);
		}
		else
		{
			$org_id 								= Session::get('user.organisation');
		}

		if(!in_array($org_id, Session::get('user.orgids')))
		{
			App::abort(404);
		}
		$search['organisationid']					= $org_id;
		
		if(Input::has('karyawan'))
		{
			$search['CurrentWork']					= $org_id;
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
			$search['branchid']						= Input::get('branch');			
		}
		if(Input::has('q'))
		{
			$search['fullname']						= Input::get('q');			
		}
		if(Input::has('tag'))
		{
			$search['charttag']						= Input::get('tag');			
		}
		if(Input::has('chart'))
		{
			$search['chartid']						= Input::get('chart');			
		}
		if(Input::has('sort_firstname'))
		{
			$sort['name']							= Input::get('sort_firstname');			
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
			$search['id']							= Input::get('branch');
			$search['DisplayDepartments']			= '';
		}

		$sort 										= ['created_at' => 'asc'];			
		
		$results_2 									= API::branch()->index(1, $search, $sort);

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
		
		// ---------------------- GENERATE CONTENT ----------------------
		$this->layout->page_title 					= 'Tambah '.ucwords($this->controller_name).' Baru';

		$this->layout->content 						= view('admin.pages.'.$this->controller_name.'.create');
		$this->layout->content->controller_name 	= ($this->controller_name);

		$this->layout->content->data 				= null;

		return $this->layout;
	}

	function postStore($id = null)
	{
		// dd(Input::all());exit;
		// ---------------------- HANDLE INPUT ----------------------
		$search 									= ['CurrentContact' => 'item'];

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

		$input['organisation']['id']				= $org_id;

		//  Upload Image Profile picture
		 if (Input::hasFile('link_profile_picture'))
		 {
		 	$validator = Validator::make(['file' => Input::file('link_profile_picture')], ['file' => 'image|max:500']);
		 	if (!$validator->passes())
		 	{
		 		return Response::json(['message' => $validator->errors()->first()], 500);
		 	}

		 	// generate path 
		 	$path = '/images/' . date('Y/m/d/H') . '/'; 

		 	// generate filename
		 	$filename =  str_replace(' ', '-', Input::file('link_profile_picture')->getClientOriginalName());

		 	$i = 1;
		 	while (file_exists(public_path() . '/' . $path . $filename))
		 	{
		 		$filename = $i . '-' . str_replace(' ', '-', Input::file('link_profile_picture')->getClientOriginalName());
		 		$i++;
		 	}
		 	
		 	// move uploaded file to path
		 	Input::file('link_profile_picture')->move(public_path() . '/' . $path,  str_replace(' ', '-', $filename));

		 	// create 
		 	$paths['sm'] = asset($this->copyAndResizeImage($path . $filename, 320, 180));
		 	$paths['md'] = asset($this->copyAndResizeImage($path . $filename, 640, 360));
		 	$paths['lg'] = asset($this->copyAndResizeImage($path . $filename, 960, 540));
		 	$paths['ori'] = asset($path .  $filename);
		 }


		if(Input::has('name') || Input::has('uniqid') ||  Input::has('place_of_birth') || Input::has('gender') )
		{
			$input['person'] 							= Input::only('prefix_title', 'name', 'suffix_title', 'gender', 'place_of_birth', 'uniqid');
		}

		if(Input::has('date_of_birth'))
		{
			list($d,$m,$y) 								= explode('/', Input::get('date_of_birth'));
			$birth 										= "$y-$m-$d";
			$input['person']['date_of_birth']			= date("Y-m-d", strtotime($birth));

			if($input['person']['date_of_birth'] > date('Y-m-d'))
			{
				return Redirect::back()->withErrors(['Tanggal lahir tidak boleh lebih besar dari hari ini.'])->withInput();
			}
		}

		$input['person']['id']							= $id;
		if(Input::hasFile('link_profile_picture'))
		{
			$input['person']['avatar']					= $paths['ori'];
		}

		if(Input::get('password')!='' && !is_null($id))
		{
			$validator 									= Validator::make(['password' => Input::get('password')], ['password' => 'required|min:8']);

			if (!$validator->passes())
			{
				return Redirect::back()->withErrors($validator->errors())->withInput();
			}
			$input['person']['password']				= Input::get('password');
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
						$relate['organisation_id'] 		= $org_id;
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
						$relate['organisation_id'] 		= $org_id;
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
				$address								= [];
				$address['value'] 						= $value;
				if(isset(Input::get('address_RT')[$key]) && Input::get('address_RT')[$key]!='')
				{
					$address['value'] 					= $address['value'].' RT. '.Input::get('address_RT')[$key];
				}
				if(isset(Input::get('address_RW')[$key]) && Input::get('address_RW')[$key]!='')
				{
					$address['value'] 					= $address['value'].' RW. '.Input::get('address_RW')[$key];
				}
				if(isset(Input::get('address_kecamatan')[$key]) && Input::get('address_kecamatan')[$key]!='')
				{
					$address['value'] 					= $address['value'].' Kec. '.Input::get('address_kecamatan')[$key];
				}
				if(isset(Input::get('address_kelurahan')[$key]) && Input::get('address_kelurahan')[$key]!='')
				{
					$address['value'] 					= $address['value'].' Kel. '.Input::get('address_kelurahan')[$key];
				}
				if(isset(Input::get('address_kota')[$key]) && Input::get('address_kota')[$key]!='')
				{
					$address['value'] 					= $address['value'].' Kota/Kab '.Input::get('address_kota')[$key];
				}
				if(isset(Input::get('address_provinsi')[$key]) && Input::get('address_provinsi')[$key]!='')
				{
					$address['value'] 					= $address['value'].' - '.Input::get('address_provinsi')[$key];
				}
				if(isset(Input::get('address_negara')[$key]) && Input::get('address_negara')[$key]!='')
				{
					$address['value'] 					= $address['value'].' - '.Input::get('address_negara')[$key];
				}
				if(isset(Input::get('address_kode_pos')[$key]) && Input::get('address_kode_pos')[$key]!='')
				{
					$address['value'] 					= $address['value'].' Kode pos '.Input::get('address_kode_pos')[$key];
				}
				if(isset(Input::get('id_address')[$key]) && Input::get('id_address')[$key]!='')
				{
					$address['id'] 						= Input::get('id_address')[$key];
				}
				if($address['value']!='')
				{
					if(Input::has('default_contact') && Input::get('default_contact')=='on')
					{
						$address['is_default']		= true;
					}
					else
					{
						$address['is_default']		= false;
					}

					$address['item']					= 'address';
					$input['contacts']['address'][] 	= $address;
				}
			}
		}

		if(Input::has('item'))
		{
			foreach (Input::get('item') as $key => $value) 
			{
				$contact['value'] 						= Input::get('value')[$key];
				
				if($contact['value']!='')
				{
					if(isset(Input::get('id_item')[$key]))
					{
						$contact['id']					= Input::get('id_item')[$key];
					}

					if(Input::has('default_contact') && Input::get('default_contact')=='on')
					{
						$contact['is_default']		= true;
					}
					else
					{
						$contact['is_default']		= false;
					}
					
					$contact['item']					= strtolower($value);
					$input['contacts'][$value][] 		= $contact;
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
		$src 											= Input::get('src');
		$itm 											= Input::get('itm');
		$content 										= json_decode($results);
		if($content->meta->success)
		{
			if($itm)
			{
				return Redirect::route('hr.persons.contacts.index', ['person_id' => $content->data->id, 'page' => '1', 'item' => $itm])->with('alert_success', 'Data sudah di simpan');;
			}
			else
			{
				if($id)
				{
					if($src)
					{
						return Redirect::route('hr.persons.show',['id'=>$content->data->id])->with('alert_success', 'Data Personalia sudah di simpan');
					}
					else
					{
						return Redirect::route('hr.persons.index');
					}
				}
				else
				{
					return Redirect::route('hr.persons.show',['id'=>$content->data->id])->with('alert_success', 'Data Personalia sudah di simpan');
				}
			}
		}
		
		return Redirect::back()->withErrors($content->meta->errors)->withInput();
	}

	function getShow($id = 1)
	{
		// ---------------------- LOAD DATA ----------------------
		$search['organisationid']					= Session::get('user.organisation');
		$search 									= ['CurrentWork' => null, 'CurrentContact' => 'item', 'Experiences' => 'created_at', 'requireddocuments' => 'documents.created_at', 'groupcontacts' => '', 'checkrelative' => ''];
		

		$results 									= API::person()->show($id, $search);

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

		$search['organisationid']					= Session::get('user.organisation');
		$results 									= API::person()->show($id, $search);

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

			$search['organisationid']					= Session::get('user.organisation');
			$results 									= API::person()->show($id, $search);

			$content 									= json_decode($results);

			if(!$content->meta->success)
			{
				App::abort(404);
			}

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

	private function copyAndResizeImage($image_path, $width, $height)
	{
		if (!is_integer($width))
		{
			throw new InvalidArgumentException("Width must be type of integer", 1);
		}

		if (!is_integer($height))
		{
			throw new InvalidArgumentException("Height must be type of integer", 1);
		}

		//
		$path 			= pathinfo($image_path);
		$new_file_name 	= $path['filename'] . '_' . $width . 'x' . $height . '.' . $path['extension'];
		// process
		$image = Image::make(public_path() . '/' . $image_path)->resize($width, $height)->save(public_path($path['dirname'] . '/' . $new_file_name));

		return $path['dirname'] . '/' . $new_file_name;
	}
}
