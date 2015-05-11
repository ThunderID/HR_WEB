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
			$this->layout->html_title 		= 'Thunder-HR';
			
			// leftmenu
			$nav = new MaterialAdminSideMenu();
			//check access
			$nav->add('dashboard', 'Dashboard', route('hr.dashboard.overview'), 'md md-home');
			$nav->add('setting', 'Setting', 'javascript:;', 'fa fa-gear');
			$nav->add('setting_branch', 'Branch', route('hr.organisation.branches.index'), null, 'setting');
			$nav->add('setting_calendar', 'Kalender', route('hr.calendars.index'), null, 'setting');
			$nav->add('setting_cuti', 'Cuti', route('hr.workleaves.index'), null, 'setting');
			$nav->add('setting_document', 'Dokumen Personalia', route('hr.documents.index'), null, 'setting');
			$nav->add('data', 'Data', 'javascript:;', 'fa fa-archive');
			$nav->add('data_personalia', 'Personalia', route('hr.persons.index', ['page' => 1, 'q' => '', 'karyawan' => 'active']), null, 'data');

			$nav->add('report', 'Report', 'javascript:;', 'fa fa-copy');
			$nav->add('report_attendance', 'Attendance', route('hr.report.attendance.get'), null, 'report');
			// $nav->add('report_performance', 'Performance', route('hr.report.performance.get'), null, 'report');




			$this->layout->nav 			= $nav;
		}
		else
		{
			$this->layout 				= view('admin.layouts.template_login');
			$this->layout->html_title 	= 'Thunder-HR';
		}
	}
}
