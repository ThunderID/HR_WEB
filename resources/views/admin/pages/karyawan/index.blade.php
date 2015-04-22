@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<!-- BEGIN SEARCH HEADER -->
		<div class="card-head style-primary">
			<div class="col-md-6 col-xs-6" style="padding-left:0px; margin-top: 3px">
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
			</div>
			<div class="col-md-6 col-xs-6 mt-10" style="padding-right:0px; ">
				<div class="tools pull-right">
					<a class="btn btn-flat ink-reaction" href="{{route('hr.persons.create') }}">
						<i class="fa fa-plus-circle fa-lg"></i>&nbsp;Tambah
					</a>
				</div>
			</div>
		</div><!--end .card-head -->
		<!-- END SEARCH HEADER -->

		<!-- BEGIN SEARCH RESULTS -->
		<div class="card-body">
			<div class="row">

				<!-- BEGIN SEARCH NAV -->
				<div class="col-sm-4 col-md-3 col-lg-2">
					<ul class="nav nav-pills nav-stacked">
						<li class="text-primary">Tampilkan</li>
						<li @if(!Input::has('branch')) class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'q' => Input::get('q')])}}">Semua <small class="pull-right text-bold opacity-75"></small></a></li>
						@if(!Input::has('branch'))
							<li><small>Kantor</small></li>
							@foreach($branches as $key => $value)
								<li @if(Input::has('branch') && ((Input::get('branch') == ($value['name'])))) class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1, 'q' => Input::get('q'), 'branch' => $value['name']])}}">{{$value['name']}}<small class="pull-right text-bold opacity-75"></small></a></li>
							@endforeach
						@else
							<li class="text-primary">{{Input::get('branch')}}</li>
							<li @if(!Input::has('tag')) class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'q' => Input::get('q'), 'branch' => Input::get('branch')])}}">Semua Department <small class="pull-right text-bold opacity-75"></small></a></li>
							@foreach($branches as $key => $value)
								@foreach($value['departments'] as $key2 => $value2)
									<li @if(Input::has('tag') && ((Input::get('tag') == ($value2['tag'])))) class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1, 'q' => Input::get('q'), 'branch' => $value['name'], 'tag' => $value2['tag']])}}">{{$value2['tag']}}<small class="pull-right text-bold opacity-75"></small></a></li>
								@endforeach
							@endforeach
						@endif
					</ul>
				</div><!--end .col -->
				<!-- END SEARCH NAV -->

				<div class="col-sm-8 col-md-9 col-lg-10">

					<!-- BEGIN SEARCH RESULTS LIST -->
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">@if(count($data)) Total data <strong>{{$paginator->total_item}}</strong> @else Tidak ada data @endif</span>
						<div class="btn-group btn-group-sm pull-right">
							<button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-arrow-down"></span> Urutkan
							</button>
							<ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
								<li @if(Input::get('sort_firstname')=='asc') class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1,'sort_firstname' => 'asc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'tag' => Input::get('tag')])}}">Nama Depan [A-Z]</a></li>
								<li @if(Input::get('sort_firstname')=='desc') class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1,'sort_firstname' => 'desc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'tag' => Input::get('tag')])}}">Nama Depan Z-A</a></li>
								<li @if(Input::get('sort_lastname')=='asc') class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1,'sort_lastname' => 'asc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'tag' => Input::get('tag')])}}">Nama Belakang [A-Z]</a></li>
								<li @if(Input::get('sort_lastname')=='desc') class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1,'sort_lastname' => 'desc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'tag' => Input::get('tag')])}}">Nama Belakang Z-A</a></li>
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
								@if($value['avatar']!='')
									<img class="img-circle img-responsive" alt="" src="{{url($value['avatar'])}}"></img>
								@else
									<img class="img-circle img-responsive" alt="" @if($value['gender'] =='male') src="{{url('images/male.png')}}" @else src="{{url('images/female.png')}}" @endif></img>
								@endif
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
			@endif
		</div>
	</div>
@stop