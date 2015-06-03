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
			$this->layout->html_title 		= 'HR System';
			
			$nav = new MaterialAdminSideMenu();

			$nav->add('dashboard', 'Dashboard', route('hr.dashboard.overview'), 'md md-home');
			
			$nav->add('data', 'Data', 'javascript:;', 'fa fa-archive');
			$nav->add('data_personalia', 'Personalia', route('hr.persons.index', ['page' => 1, 'q' => '', 'karyawan' => 'active']), null, 'data');

			$nav->add('report', 'Reports', 'javascript:;', 'fa fa-copy');
			$nav->add('report_attendance', 'Aktivitas', route('hr.report.attendance.get'), null, 'report');
			$nav->add('report_wages', 'Kedatangan', route('hr.report.wages.get'), null, 'report');

			$nav->add('setting', 'Settings', 'javascript:;', 'fa fa-gear');
			$nav->add('setting_organisation', 'Organisasi', route('hr.organisations.index'), null, 'setting');

			$this->layout->nav 				= $nav;
		}
		else
		{
			$this->layout 					= view('admin.layouts.template_login');
			$this->layout->html_title 		= 'HR System';
		}
	}
}
