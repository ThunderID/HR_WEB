var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |

 tambahkan jquery.orgchart.js
 */
elixir.config.sourcemaps = false;

elixir(function(mix) {
	mix.less('app.less')
	.copy('public/css/app.css', 'resources/assets/css/app.css')
	.copy('resources/assets/css/theme-1/libs/bootstrap-datepicker/datepicker3.css', 'public/css/datepicker3.css')
	.copy('resources/assets/css/theme-1/libs/summernote/summernote.css','public/css/summernote.css')
	.copy('resources/assets/css/theme-1/libs/dropzone/dropzone-theme.css', 'public/css/dropzone.css')	
	.copy('resources/assets/css/theme-1/libs/toastr/toastr.css', 'public/css/toastr.css');

    mix.styles(['app.css',
    			'theme-1/bootstrap.css',
				'theme-1/materialadmin.css',
    			'theme-1/font-awesome.min.css',
				'theme-1/material-design-iconic-font.min.css',
				'theme-1/libs/bootstrap-tagsinput/bootstrap-tagsinput.css',
				'theme-1/libs/select2/select2.css',
				'theme-1/libs/fullcalendar/fullcalendar.css',
				'loading-circle.css',
				], 'public/css/admin.css')
	.scripts(['libs/jquery/jquery-1.11.2.min.js',
				'libs/jquery/jquery-migrate-1.2.1.min.js',
				'libs/bootstrap/bootstrap.min.js',
				'libs/spin.js/spin.min.js',
				'libs/autosize/jquery.autosize.min.js',
				'libs/nanoscroller/jquery.nanoscroller.min.js',
				'libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js',
				'libs/select2/select2.min.js',
				'libs/bootstrap-datepicker/bootstrap-datepicker.js',
				'libs/moment/moment.min.js',
				'libs/fullcalendar/fullcalendar.js',
				'core/source/App.min.js',
				'core/source/AppNavigation.js',
				'core/source/AppCard.js',
				'core/source/AppForm.js',
				'core/source/AppNavSearch.js',
				'core/source/AppVendor.js',
				'thunder/thumbnail_image_upload/thumbnail-image-upload.jquery.js',
				'thunder/bootstrap.type2confirm/bootstrap.type2confirm.jquery.js',
				// 'app.js',
				], 'public/js/admin.js')
	// .version(['public/css/admin.css', 'public/js/admin.js', 'public/js/html5shiv.js', 'public/js/respond.min.js'])
	.copy('resources/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js', 'public/js/bootstrap-datepicker.js')
	.copy('resources/assets/js/libs/dropzone/dropzone.min.js', 'public/js/dropzone.min.js')
	.copy('resources/assets/js/libs/utils/html5shiv.js', 'public/js/html5shiv.js')
	.copy('resources/assets/js/libs/utils/respond.min.js', 'public/js/respond.min.js')
	.copy('resources/assets/js/libs/microtemplating/microtemplating.min.js', 'public/js/microtemplating.min.js')	
	.copy('resources/assets/js/libs/summernote/summernote.min.js', 'public/js/summernote.min.js')
	.copy('resources/assets/js/libs/toastr/toastr.min.js', 'public/js/toastr/toastr.min.js')
	.copy('resources/assets/js/libs/inputmask/jquery.inputmask.bundle.min.js', 'public/js/jquery.inputmask.min.js')
	.copy('resources/assets/js/core/demo/DemoPageContacts.js', 'public/js/pluginmicrotemplating.min.js')
	.copy('resources/assets/fonts/', 'public/build/fonts/')
	.copy('resources/assets/images/', 'public/images/');
});
