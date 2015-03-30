<?php namespace App\Http\Controllers;

use \ThunderID\Menu\MaterialAdminSideMenu;

abstract class AdminController extends Controller {

	protected $layout;

	function __construct() 
	{
		// if (Auth::user())
		// {
			$this->layout = view('admin.layouts.template');
			$this->layout->html_title = 'Thunder-HR';
			
			// leftmenu
			$nav = new MaterialAdminSideMenu();

			$nav->add('dashboard', 'Dashboard', 'javascript:;', 'md md-home');
			$nav->add('overview', 'Overview', route('admin.dashboard.overview'), null, 'dashboard');

			$nav->add('person', 'Person', 'javascript:;', 'fa fa-user');
			$nav->add('basic_info', 'Basic Information', route('admin.person-basic-information.index'), null, 'person');
			
			$nav->add('company', 'Company', 'javascript:;', 'md md-business');

			$nav->add('position', 'Position', 'javascript:;', 'md md-people');

			$nav->add('salary_component', 'Salary Component', 'javascript:;', 'md md-home');


			$this->layout->nav = $nav;

		// }
		// else
		// {
		// 	$this->layout = view('admin.template_login');
		// 	$this->layout->html_title = 'Tour.id';
		// }

		// html 
	}
}
