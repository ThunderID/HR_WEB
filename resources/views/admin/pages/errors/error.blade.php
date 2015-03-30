<html lang="en">
	<head>
		<title>{{$html_title}}</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">

		<!-- BEGIN STYLESHEETS -->
		{{-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,600,700,800' rel='stylesheet' type='text/css'/> --}}
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
	<body class="header-fixed menubar-pin">
		<!-- BEGIN CONTENT-->
			<div id="content">

				<!-- BEGIN 404 MESSAGE -->
				<section>
					<div class="section-header">
						<ol class="breadcrumb">
							<!-- <li><a href="../../html/.html">home</a></li> -->
							<!-- <li class="active">404</li> -->
						</ol>
					</div>
					<div class="section-body contain-lg">
						<div class="row">
							<div class="col-lg-12 text-center">
								<h1>
									<span class="text-xxxl ">{{$err_type}} 
								@if($err_type == "404")
										<i class="fa fa-search-minus text-info"></i>
									</span>
								</h1>
								<h2 class="text-light">This page does not exist</h2>
								@elseif($err_type == "403")
										<i class="fa fa-ban text-danger"></i>
									</span>
								</h1>
								<h2 class="text-light">Forbidden access</h2>
								@elseif($err_type == "500")
										<i class="fa fa-warning text-warning"></i>
									</span>
								</h1>
								<h2 class="text-light">Oops! Something went wrong</h2>
								@elseif($err_type == "503")
										<i class="fa fa-exclamation-circle text-warning"></i>
									</span>
								</h1>
								<h2 class="text-light">Service unavailable</h2>
								@else
										<i class="fa fa-exclamation-circle text-danger"></i>
									</span>
								</h1>
								<h2 class="text-light">Error occured with code {{$err_type}}</h2>
								@endif
							</div><!--end .col -->
						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
				<!-- END 404 MESSAGE -->

				<!-- BEGIN SEARCH SECTION -->
				<section>
					<div class="section-body contain-lg ">
						<div class="row">
							<!-- if branch here -->
							<h2 class="text-center text-primary">
								<a href='#'>
									Return to page
								</a>
							</h2>
						</div>
					</div><!--end .section-body -->
				</section>
				<!-- END SEARCH SECTION -->

			</div><!--end #content-->
			<!-- END CONTENT -->
		</div>

		<script src="{{elixir('js/admin.js')}}"></script>

		@section('js')
		@show
	</body>
</html>

			