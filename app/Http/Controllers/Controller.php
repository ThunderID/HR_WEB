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
			foreach(Session::get('user.access') as $key => $value)
			{
				if($value['menu']=='dashboard')
				{
					$nav->add('dashboard', 'Dashboard', route('hr.dashboard.overview'), 'md md-home');
				}
				if($value['menu']=='branch')
				{
					$nav->add('setting', 'Setting', 'javascript:;', 'fa fa-gear');
					$nav->add('setting_branch', 'Branch', route('hr.organisation.branches.index'), null, 'setting');
					$nav->add('setting_document', 'Dokumen Personalia', route('hr.documents.index'), null, 'setting');
				}
				if($value['menu']=='person')
				{
					$nav->add('data', 'Data', 'javascript:;', 'fa fa-archive');
					$nav->add('data_personalia', 'Personalia', route('hr.persons.index'), null, 'data');
				}
				if($value['menu']=='organisation')
				{
					$nav->add('organisasi', 'Organisasi', 'javascript:;', 'md md-business');
					$nav->add('basic_info', 'Lihat Semua', route('hr.organisations.index'), null, 'organisasi');
					$nav->add('basic_info_add', 'Tambah Baru', route('hr.organisations.create'), null, 'organisasi');
				}
			}
			$this->layout->nav 			= $nav;
		}
		else
		{
			$this->layout 				= view('admin.layouts.template_login');
			$this->layout->html_title 	= 'Thunder-HR';
		}
	}
}
