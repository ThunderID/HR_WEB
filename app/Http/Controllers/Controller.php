<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use \ThunderID\Menu\MaterialAdminSideMenu;
use Session, Config;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	protected $layout;

	function __construct() 
	{
		if (Session::has('loggedUser'))
		{
			$this->layout 					= view('admin.layouts.template');
			$this->layout->html_title 		= 'HR WEB';
			
			$nav = new MaterialAdminSideMenu();

			$nav->add('dashboard', 'Dashboard', route('hr.dashboard.overview'), 'md md-home');
			
			$nav->add('data', 'Data', 'javascript:;', 'fa fa-archive');
			$nav->add('data_personalia', 'Personalia', route('hr.persons.index', ['page' => 1, 'q' => '', 'karyawan' => 'active']), null, 'data');

			$nav->add('setting', 'Setting', 'javascript:;', 'fa fa-gear');
			$nav->add('setting_organisation', 'Organisation', route('hr.organisations.index'), null, 'setting');

			$nav->add('report', 'Report', 'javascript:;', 'fa fa-copy');
			$nav->add('report_attendance', 'Attendance', route('hr.report.attendance.get'), null, 'report');
			$nav->add('report_wages', 'Wages', route('hr.report.wages.get'), null, 'report');

			$this->layout->nav 				= $nav;
		}
		else
		{
			$this->layout 					= view('admin.layouts.template_login');
			$this->layout->html_title 		= 'HR WEB';
		}
	}
}
