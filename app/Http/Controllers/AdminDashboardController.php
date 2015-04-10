<?php namespace App\Http\Controllers;

use Config;

class AdminDashboardController extends AdminController {

	/**
	 * login form
	 *
	 * @return void
	 * @author 
	 **/

	function getOverview()
	{
		// view
		$this->layout->content = view('admin.pages.dashboard.overview');
		$this->layout->page_title = 'Dashboard: Overview';

		$this->layout->content->dashboard = Config::get('dashboard');

		
		return $this->layout;
	}
}
