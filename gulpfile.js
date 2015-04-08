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
 */
elixir.config.sourcemaps = false;

elixir(function(mix) {
	mix.less('app.less')
	.copy('public/css/app.css', 'resources/css/app.css');

    mix.styles(['app.css',
    			'theme-1/bootstrap.css',
				'theme-1/materialadmin.css',
    			'theme-1/font-awesome.min.css',
				'theme-1/material-design-iconic-font.min.css',
				'theme-1/libs/bootstrap-tagsinput/bootstrap-tagsinput.css',
				"theme-1/libs/select2/select2.css",
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
				'core/source/App.min.js',
				'core/source/AppNavigation.js',
				'core/source/AppCard.js',
				'core/source/AppForm.js',
				'core/source/AppNavSearch.js',
				'core/source/AppVendor.js',
				'thunder/thumbnail_image_upload/thumbnail-image-upload.jquery.js',
				'thunder/bootstrap.type2confirm/bootstrap.type2confirm.jquery.js'
				], 'public/js/admin.js')
	// .version(['public/css/admin.css', 'public/js/admin.js', 'public/js/html5shiv.js', 'public/js/respond.min.js'])
	.copy('resources/js/libs/utils/html5shiv.js', 'public/js/html5shiv.js')
	.copy('resources/js/libs/utils/respond.min.js', 'public/js/respond.min.js')
	.copy('resources/css/theme-1/libs/summernote/summernote.css','public/css/summernote.css')
	.copy('resources/js/libs/summernote/summernote.min.js', 'public/js/summernote.min.js')
	.copy('resources/js/libs/microtemplating/microtemplating.min.js', 'public/js/microtemplating.min.js')
	.copy('resources/css/theme-1/libs/bootstrap-datepicker/datepicker3.css', 'public/css/datepicker3.css')
	.copy('resources/js/libs/bootstrap-datepicker/bootstrap-datepicker.js', 'public/js/bootstrap-datepicker.js')
	.copy('resources/css/theme-1/libs/jit/base.css', 'public/css/base.css')
	.copy('resources/css/theme-1/libs/jit/spacetree.css', 'public/css/spacetree.css')
	.copy('resources/js/libs/jit/jit.js', 'public/js/jit.min.js')
	.copy('resources/js/core/demo/DemoPageContacts.js', 'public/js/pluginmicrotemplating.min.js')
	.copy('resources/fonts/', 'public/build/fonts/')
	.copy('resources/images/', 'public/images/');
});
