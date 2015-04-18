<?php namespace App\Http\Controllers;

use App\APIConnector\API;
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
		$this->layout->content 				= view('admin.pages.dashboard.overview');
		$this->layout->page_title			= 'Dashboard: Overview';

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
		$input['widget'] 							= Input::only('type', 'title', 'function', 'order');
		if(Input::has('data_panel'))
		{
			$input['widget']['function']			= Input::get('data_panel');
		}
		if(Input::has('data_stat'))
		{
			$input['widget']['function']			= Input::get('data_stat');
		}
		if(Input::has('data_table'))
		{
			$input['widget']['function']			= Input::get('data_table');
		}
		$input['person']['id']						= Session::get('loggedUser');

		$results 									= API::widget()->store(null, $input);

		$contents 									= json_decode($results);

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
