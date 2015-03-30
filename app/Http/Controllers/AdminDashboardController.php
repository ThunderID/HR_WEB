<?php namespace App\Http\Controllers;

class AdminDashboardController extends AdminController {

	/**
	 * login form
	 *
	 * @return void
	 * @author 
	 **/
	// function __construct() 
	// {
	// 	parent::__construct();
	// 	$nav = $this->layout->nav;
	// }

	function getOverview()
	{
		// view
		$this->layout->content = view('admin.pages.dashboard.overview');
		$this->layout->page_title = 'Dashboard: Overview';
		// echo $this->layout->nav->render();exit;


		
		return $this->layout;
	}
}
