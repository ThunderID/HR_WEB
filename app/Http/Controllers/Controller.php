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
		if (Session::has('user.access'))
		{

			$this->layout 					= view('admin.layouts.template');
			$this->layout->html_title 		= 'Thunder-HR';
			
			// leftmenu
			$nav = new MaterialAdminSideMenu();
			//check access
			$nav->add('dashboard', 'Dashboard', route('hr.dashboard.overview'), 'md md-home');
			$nav->add('setting', 'Setting', 'javascript:;', 'fa fa-gear');
			$nav->add('setting_branch', 'Branch', route('hr.organisation.branches.index'), null, 'setting');
			$nav->add('setting_document', 'Dokumen Personalia', route('hr.documents.index'), null, 'setting');
			$nav->add('data', 'Data', 'javascript:;', 'fa fa-archive');
			$nav->add('data_personalia', 'Personalia', route('hr.persons.index'), null, 'data');
			
			$this->layout->nav 			= $nav;
		}
		else
		{
			$this->layout 				= view('admin.layouts.template_login');
			$this->layout->html_title 	= 'Thunder-HR';
		}
	}
}
