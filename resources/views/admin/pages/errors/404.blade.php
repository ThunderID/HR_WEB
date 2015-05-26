<!DOCTYPE html>
<html lang="en">
	<head>
		<title>404 page</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<meta name="http-equiv=refresh" content="3">

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,600,700,800' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="{{ elixir('css/admin.css') }}" />

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">
		<div id="base">
			<div id="content">
				<section>
					<div class="section-body contain-lg">
						<div class="row">
							<div class="col-lg-12 text-center">
								<h1><span class="text-xxxl text-light">404 <i class="fa fa-search-minus text-primary"></i></span></h1>
								<h2 class="text-light">This page does not exist</h2>
							</div><!--end .col -->
						</div><!--end .row -->
					</div>
				</section>
				<section>
					<div class="section-body contain-sm text-center">
						<a href="{{ route('hr.dashboard.overview') }}" class="btn btn-primary"><i class="md md-reply"></i> Return last page</a>
					</div><!--end .section-body -->
				</section>
			</div>
		</div><!--end #base-->

		<script src="{{elixir('js/admin.js')}}"></script>
	</body>
</html>
