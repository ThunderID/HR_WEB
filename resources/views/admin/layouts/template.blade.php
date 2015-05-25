<html lang="en">
	<head>
		<title>{{$html_title}}</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<meta name="http-equiv=refresh" content="3">

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,600,700,800' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="{{ elixir('css/admin.css') }}" />
		@section('css')
		@show
		<!-- Additional CSS includes -->
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="js/html5shiv.js"></script>
		<script type="text/javascript" src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="header-fixed menubar-hoverable">
		<header id="header">
			@include('admin.widgets.header_bar')
		</header>
		<div id="base" class="menubar-hoverable">
			<div class="offcanvas">
			</div>
			<div id="content">
				<section>
					@if (Route::currentRouteName() != 'hr.dashboard.overview')
						<div class="section-header ml-5">
							<ol class="breadcrumb">
								@yield('breadcrumb')
							</ol>
						</div><!--end .section-header -->
					@endif
					<div class="section-body ml-5">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								@include('admin.widgets.alerts')
								@yield('content')
							</div>
						</div>
					</div><!--end .section-body -->
				</section>
			</div>
			<div id="menubar" class="menubar-inverse">
				@include('admin.widgets.menu_bar')
			</div>
			<div class="offcanvas">
			</div>
		</div>

		<script src="{{elixir('js/admin.js')}}"></script>
		
		@section('js')
		@show
	</body>
	<script>
		$(document).ready(function(){
			$('#change_branch').select2({dropdownCssClass : 'bigdrop'});
		});
	</script>
</html>