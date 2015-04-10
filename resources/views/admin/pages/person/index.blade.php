@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN SEARCH HEADER -->
		<div class="card-head style-primary">
			<div class="tools pull-left">
				<form class="navbar-search" role="search">
					{!! Form::open(['route' => ('hr.persons.index'), 'method' => 'get']) !!}
					<div class="form-group">
						<input type="text" class="form-control" name="q" placeholder="Enter your keyword">
					</div>
					<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
					{!! Form::close() !!}
				</form>
			</div>
			<div class="tools">
				<a class="btn btn-floating-action btn-default-light" href="{{route('hr.persons.create') }}"><i class="fa fa-plus"></i></a>
			</div>
		</div><!--end .card-head -->
		<!-- END SEARCH HEADER -->

		<!-- BEGIN SEARCH RESULTS -->
		<div class="card-body">
			<div class="row">

				<!-- BEGIN SEARCH NAV -->
				<div class="col-sm-4 col-md-3 col-lg-2">
					<ul class="nav nav-pills nav-stacked">
						<li><small>Cari</small></li>
						<li class="active"><a href="../../../html/pages/contacts/search.html">All contacts <small class="pull-right text-bold opacity-75">153</small></a></li>
						<li><a href="../../../html/pages/contacts/search.html">Family <small class="pull-right text-bold opacity-75">16</small></a></li>
						<li><a href="../../../html/pages/contacts/search.html">Friends <small class="pull-right text-bold opacity-75">76</small></a></li>
						<li class="hidden-xs"><small>LAST VIEWED</small></li>
						<li class="hidden-xs">
							<a href="../../../html/pages/contacts/details.html">
								<img class="img-circle img-responsive pull-left width-1" src="../../../assets/img/avatar7.jpg?1404026721" alt="" />
								<span class="text-medium" >Philip Ericsson</span><br/>
								<span class="opacity-50">
									<span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;123-123-3210
								</span>
							</a>
						</li>
					</ul>
				</div><!--end .col -->
				<!-- END SEARCH NAV -->

				<div class="col-sm-8 col-md-9 col-lg-10">

					<!-- BEGIN SEARCH RESULTS LIST -->
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">Filtered results <strong>34</strong></span>
						<div class="btn-group btn-group-sm pull-right">
							<button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-arrow-down"></span> Sort
							</button>
							<ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
								<li><a href="#">First name</a></li>
								<li><a href="#">Last name</a></li>
								<li><a href="#">Email address</a></li>
							</ul>
						</div>
					</div><!--end .margin-bottom-xxl -->
					<div class="list-results" style="margin-bottom:0px;">
						@foreach($data as $key => $value)	
						@if($key%2==0 && $key!=0)
							</div>
							<div class="list-results" style="margin-bottom:0px;">
						@endif											
						<div class="col-xs-12 col-lg-6 hbox-xs">

							<div class="hbox-column width-3">
								<img class="img-circle img-responsive" alt="" @if($value['gender'] =='male') src="{{url('images/male.png')}}" @else src="{{url('images/female.png')}}" @endif></img>
							</div><!--end .hbox-column -->
							<div class="hbox-xs v-top height-4">
								<div class="clearfix">
									<div class="col-lg-12 margin-bottom-lg">
										<a class="text-lg text-medium" href="{{ route('hr.persons.show' ,['id'=> $value['id']]) }}">{{$value['first_name'].' '.$value['middle_name'] .' '.$value['last_name']}}</a>
									</div>
								</div>
								<div class="clearfix">
									<div class="col-lg-12">
										<span class="opacity-75"><span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;{{$value['contacts'][1]['value']}}</span>
									</div>
								</div>
								<div class="clearfix">
									<div class="col-md-12">
										<span class="opacity-75"><span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;{{$value['contacts'][2]['value']}}</span>
									</div>
								</div>
								<div class="clearfix">
									<div class="col-lg-12">
										<span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;{{$value['contacts'][0]['value']}}</span>
									</div>
								</div>
							</div><!--end .hbox-column -->
						</div><!--end .hbox-xs -->
						@endforeach
					</div><!--end .list-results -->

					<!-- BEGIN SEARCH RESULTS LIST -->


	@if(count($data))
		@include('admin.helpers.pagination')
	@else
		<div class="row">
			<div class="col-sm-12 text-center">
				<p>Tidak ada data</p>
			</div>
		</div>
	@endif
@stop