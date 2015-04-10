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
			Config::set('dashboard', [
								'total_letters' 			=> 'stats', 
								'total_branches' 			=> 'stats', 
								'total_workers' 			=> 'stats', 
								'total_documents' 			=> 'stats',
								'new_person' 				=> 'panel_list', 
								'latest_letter_outgoing' 	=> 'panel_list']);
			
			// leftmenu
			$nav = new MaterialAdminSideMenu();
			if(Config::get('user.role')=='developer')
			{
				$nav->add('dashboard', 'Dashboard', 'javascript:;', 'md md-home');
				$nav->add('overview', 'Overview', route('hr.dashboard.overview'), null, 'dashboard');
				
				$nav->add('organisasi', 'Organisasi', 'javascript:;', 'md md-business');
				$nav->add('basic_info', 'Lihat Semua', route('hr.organisations.index'), null, 'organisasi');
				$nav->add('basic_info_add', 'Tambah Baru', route('hr.organisations.create'), null, 'organisasi');
			}
			else
			{
				$nav->add('dashboard', 'Dashboard', 'javascript:;', 'md md-home');
				$nav->add('overview', 'Overview', route('hr.dashboard.overview'), null, 'dashboard');

				$nav->add('person', 'Karyawan', 'javascript:;', 'fa fa-user');
				$nav->add('basic_info', 'Lihat Semua', route('hr.persons.index'), null, 'person');
				$nav->add('basic_info_add', 'Tambah Baru', route('hr.persons.create'), null, 'person');

							
				$nav->add('company', 'Perusahaan', 'javascript:;', 'md md-business');
				$nav->add('company_branch', 'Lihat Semua', route('hr.organisation.branches.index'), null, 'company');
				$nav->add('company_branch_add', 'Tambah Baru', route('hr.organisation.branches.create'), null, 'company');
				
				// $nav->add('company_charts', 'Struktur Perusahaan', 'javascript:;', null, 'company');
				// $nav->add('department', 'Departemen', route('admin.department.index'), null,'company_charts');
				// $nav->add('jabatan', 'Jabatan', route('admin.position.index'), null,'company_charts');

				$nav->add('document', 'Dokumen', 'javascript:;', 'md md-folder');
				$nav->add('document_index', 'Lihat Semua', route('hr.documents.index'), null, 'document');
				$nav->add('document_add', 'Tambah Baru', route('hr.documents.create'), null, 'document');
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
