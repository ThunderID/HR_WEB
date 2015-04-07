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

			$nav->add('dashboard', 'Dasbor', 'javascript:;', 'md md-home');
			$nav->add('overview', 'Overview', route('admin.dashboard.overview'), null, 'dashboard');

			$nav->add('person', 'Orang', 'javascript:;', 'fa fa-user');
			$nav->add('basic_info', 'Informasi Dasar', route('admin.person-basic-information.index'), null, 'person');
			$nav->add('basic_info_add', 'Tambah Orang', route('admin.person-basic-information.add'), null, 'person');

			$nav->add('organisasi', 'Organisasi', route('admin.organisation.index'), 'md md-business');
						
			$nav->add('company', 'Perusahaan', 'javascript:;', 'md md-business');
			$nav->add('company_branch', 'Cabang', route('admin.company.index'), null, 'company');
			
			$nav->add('company_charts', 'Struktur Perusahaan', 'javascript:;', null, 'company');
			$nav->add('department', 'Departemen', route('admin.department.index'), null,'company_charts');
			$nav->add('jabatan', 'Jabatan', route('admin.position.index'), null,'company_charts');

			$nav->add('document', 'Dokumen', route('admin.document.index'), 'md md-insert-drive-file');

			$nav->add('salary_component', 'Komponen Gaji', 'javascript:;', 'md md-home');


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
