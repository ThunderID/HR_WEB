@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<!-- BEGIN SEARCH HEADER -->
		<div class="card-head style-primary">
			<div class="tools pull-left">
				<form class="navbar-search" role="search">
					{!! Form::open(['route' => ('hr.persons.index'), 'method' => 'get']) !!}
					<div class="form-group">
						<input type="text" class="form-control" name="q" placeholder="Ketik kata kunci">
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
						<li @if(!Input::has('field')) class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'q' => Input::get('q')])}}">Semua <small class="pull-right text-bold opacity-75"></small></a></li>
						<li @if(Input::get('field')=='firstname') class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'q' => Input::get('q'), 'field' => 'firstname'])}}">Nama Depan <small class="pull-right text-bold opacity-75"></small></a></li>
						<li @if(Input::get('field')=='lastname') class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'q' => Input::get('q'), 'field' => 'lastname'])}}">Nama Akhir <small class="pull-right text-bold opacity-75"></small></a></li>
						<li @if(Input::get('field')=='prefixtitle') class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'q' => Input::get('q'), 'field' => 'prefixtitle'])}}">Gelar Depan <small class="pull-right text-bold opacity-75"></small></a></li>
						<li @if(Input::get('field')=='suffixtitle') class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'q' => Input::get('q'), 'field' => 'suffixtitle'])}}">Gelar Belakang <small class="pull-right text-bold opacity-75"></small></a></li>
					</ul>
				</div><!--end .col -->
				<!-- END SEARCH NAV -->

				<div class="col-sm-8 col-md-9 col-lg-10">

					<!-- BEGIN SEARCH RESULTS LIST -->
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">Total data <strong>{{$paginator->total_item}}</strong></span>
						<div class="btn-group btn-group-sm pull-right">
							<button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-arrow-down"></span> Urutkan
							</button>
							<ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
								<li @if(Input::get('sort_firstname')=='asc') class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1,'sort_firstname' => 'asc'])}}">Nama Depan [A-Z]</a></li>
								<li @if(Input::get('sort_firstname')=='desc') class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1,'sort_firstname' => 'desc'])}}">Nama Depan Z-A</a></li>
								<li @if(Input::get('sort_lastname')=='asc') class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1,'sort_lastname' => 'asc'])}}">Nama Belakang [A-Z]</a></li>
								<li @if(Input::get('sort_lastname')=='desc') class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1,'sort_lastname' => 'desc'])}}">Nama Belakang Z-A</a></li>
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
										@foreach($value['works'] as $key2 => $value2)
											@if($key2 == 0)
												<span>{{$value2['name']}} di {{$value2['branch']['name']}}</span>
											@endif
										@endforeach
									</div>
								</div>
								@if(count($value['contacts']))
									@foreach($value['contacts'] as $key2 => $value2)
										<div class="clearfix">
											<div class="col-lg-12">
												@if($value2['item']=='phone_number')
													<span class="opacity-75"><span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;{{$value2['value']}}</span>
												@elseif($value2['item']=='email')
													<span class="opacity-75"><span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;{{$value2['value']}}</span>
												@endif
											</div>
										</div>
									@endforeach
								@endif
							</div><!--end .hbox-column -->
						</div><!--end .hbox-xs -->
						@endforeach
					</div><!--end .list-results -->
				</div><!--end .list-results -->
			</div>
			@if(count($data))
				@include('admin.helpers.pagination')
			@else
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>Tidak ada data</p>
					</div>
				</div>
			@endif
		</div>
	</div>
@stop