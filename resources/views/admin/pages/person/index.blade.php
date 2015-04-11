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
						<form class="form" action="#">
							<li><small>Cari</small></li>
							<li>
								<input class="form-control input-sm" id="small4" type="text" placeholder="ketik yang dicari">
							</li>
							<li class="active">
								<input type="text" class="form-control select2-list" id="work_department" name="work_department" data-placeholder="Department">
								<label for="work_department">Department</label>
							</li>
							<li>
								<input type="text" class="form-control select2-list" id="work_position" name="work_position" data-placeholder="Jabatan">
								<label for="work_position">Jabatan</label>
							</li>
							<li>
								<input type="submit" class="btn btn-primary btn-sm ink-reaction pull-right" value="Cari">
							</li>
						</form>
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

@section('js')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#work_department').select2({
				minimumInputLength: 3,
				placeholder: '',
				ajax: {
					url: "{{route('hr.ajax.department')}}",
					dataType: 'json',
					quietMillis: 500,
					data: function (term) {},
					results: function (data) {
						return {
							results: $.map(data, function (item) {
								return {
									text: item.name,
									id: item.id,
								}
							})
						};
					}
				}	        
			});
			$('#work_position').select2({
	            minimumInputLength: 3,
	            placeholder: '',
	            ajax: {
	                url: "{{route('hr.ajax.position')}}",
	                dataType: 'json',
	                quietMillis: 500,
	               	data: function (term) {},
	                results: function (data) {
	                    return {
	                        results: $.map(data, function (item) {
	                            return {
	                                text: item.name,
	                                id: item.id,
	                            }
	                        })
	                    };
	                }
	            }
	        });		
		})
	</script>
@stop