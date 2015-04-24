<?php namespace App\Http\Controllers;

use API;
use Session, Redirect, Input;

class DashboardController extends Controller {

	/**
	 * login form
	 *
	 * @return void
	 * @author 
	 **/

	function getOverview()
	{
		// view
		$this->layout->content 				= view('admin.pages.dashboard.under_maintence');
		// $this->layout->page_title			= 'Dashboard: Overview';
		$this->layout->page_title			= '';

		$this->layout->content->dashboard 	= Session::get('dashboard');
		
		return $this->layout;
	}

	function destroyWidget($id)
	{
		$results 									= API::widget()->destroy($id);

		$contents 									= json_decode($results);

		if (!$contents->meta->success)
		{
			return Redirect::route('hr.dashboard.overview')->withErrors($contents->meta->errors);
		}
		else
		{
			return Redirect::route('hr.dashboard.overview')->with('alert_success', 'Widget sudah dihapus');
		}
	}

	function storeWidget()
	{
		$input['widget'] 							= Input::only('type', 'title', 'function', 'order', 'query', 'field');

		if (Input::has('content_documents'))
		{
			$content = Input::get('content_documents');
			if (Input::get('content_documents')=='all') {
				$query['organisationID'] 	= 1;  
			}
			else 
			{
				$query['organisationID'] 	= 1;
				$query['tag']				= Input::get('content_documents');
			}
			$input['widget']['query']		= json_encode($query);

		}
		if (Input::has('content_employees')) 
		{
			$content = Input::get('content_employees');
			if (Input::get('content_employees')=='all'){
				$query['checkwork']			= 'active';
			}
			else 
			{
				$query['checkwork']			= 'active';
				$query[$content] 			= (string)-(str_replace('_', ' ', Input::get('date')));
			}
			$input['widget']['query'] 		= json_encode($query);
		}

		if (Input::has('content_branches'))
		{
			$content = Input::get('content_branches');
			if (Input::get('content_branches')=='all'){
				$query['organisationID'] 	= 1;
			}
			else 
			{
				$query['organisationID']	= 1;
				$query[$content] 			= (string)('-'.(str_replace('_', ' ', Input::get('date'))));
			}
			$input['widget']['query'] 		= json_encode($query);	
		}

		if (Input::get('type')=='table'){
			if (str_is('*count*', strtolower($content)))
			{
				if (str_is('*employees*', strtolower(Input::get('function'))))
				{
					$input['widget']['field'] 	= ['fullname', 'count'];
				}
				else
				{
					$input['widget']['field'] 	= ['name', 'count'];	
				}
			}
		}
		else {
			$input['widget']['field'] = '';
		}

		$input['person']['id']						= Session::get('loggedUser');

		$results 									= API::widget()->store(null, $input);

		$contents 									= json_decode($results);
		// dd($results);
		if (!$contents->meta->success)
		{
			return Redirect::route('hr.dashboard.overview')->withErrors($contents->meta->errors);
		}
		else
		{
			return Redirect::route('hr.dashboard.overview')->with('alert_success', 'Widget sudah tersimpan');
		}
	}
}
