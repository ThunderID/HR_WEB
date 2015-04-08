<?php namespace App\Http\Controllers;

use \ThunderID\Menu\MaterialAdminSideMenu;
use Session, Config;

abstract class AdminController extends Controller {

	protected $layout;

	function __construct() 
	{
		if (Session::has('loggedUser'))
		{
			$this->layout = view('admin.layouts.template');
			$this->layout->html_title = 'Thunder-HR';
			
			// leftmenu
			$nav = new MaterialAdminSideMenu();
			if(Config::get('user.role')=='developer')
			{
				$nav->add('organisasi', 'Organisasi', route('admin.organisation.index'), 'md md-business');
			}
			else
			{
				$nav->add('dashboard', 'Dashboard', 'javascript:;', 'md md-home');
				$nav->add('overview', 'Overview', route('admin.dashboard.overview'), null, 'dashboard');

				$nav->add('person', 'Karyawan', 'javascript:;', 'fa fa-user');
				$nav->add('basic_info', 'Lihat Semua', route('hr.persons.index'), null, 'person');
				$nav->add('basic_info_add', 'Tambah Baru', route('hr.persons.create'), null, 'person');

							
				$nav->add('company', 'Perusahaan', 'javascript:;', 'md md-business');
				$nav->add('company_branch', 'Cabang', route('hr.organisation.branches.index'), null, 'company');
				
				// $nav->add('company_charts', 'Struktur Perusahaan', 'javascript:;', null, 'company');
				// $nav->add('department', 'Departemen', route('admin.department.index'), null,'company_charts');
				// $nav->add('jabatan', 'Jabatan', route('admin.position.index'), null,'company_charts');

				// $nav->add('document', 'Dokumen', 'javascript:;', 'md md-business');
				// $nav->add('document-template', 'Template Dokumen', route('admin.document-template.index'), null, 'document');
				// $nav->add('document-data', 'Data Dokumen', route('admin.document.index'), null, 'document');
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
