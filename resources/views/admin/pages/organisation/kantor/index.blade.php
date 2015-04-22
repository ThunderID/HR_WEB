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
						{!! Form::open(['route' => 'hr.organisation.branches.index', 'method' => 'get']) !!}
							<div class="form-group">
								<input type="text" class="form-control" name="q" placeholder="Ketik Kata Kunci">
							</div>
							<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
						{!! Form::close() !!}
					</form>
				</div>
			</div>
			<div class="col-md-6 col-xs-6 mt-10" style="padding-right:0px; ">
				<div class="tools pull-right">
					<a href="{{route('hr.organisation.branches.create')}}" class="btn btn-flat ink-reaction">
						<i class="fa fa-plus-circle fa-lg"></i>&nbsp;Tambah
					</a>				
				</div>
			</div>
		</div><!--end .card-head -->
		<!-- END SEARCH HEADER -->

		<!-- BEGIN SEARCH RESULTS -->
		<div class="card-body">
			<div class="row">
				<div class="col-sm-12">
					<!-- BEGIN SEARCH RESULTS LIST -->
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">@if(count($data)) Total data <strong>{{$paginator->total_item}}</strong> @else Tidak ada data @endif</span>
						<div class="btn-group btn-group-sm pull-right">
							<button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-arrow-down"></span> Urutkan
							</button>
							<ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
								<li @if(Input::get('sort_date')=='asc' || (!Input::get('sort_date') && !Input::get('sort_name')))class="active" @endif><a href="{{route('hr.organisation.branches.index', ['page' => 1, 'sort_date' => 'asc'])}}">Tanggal (A-Z)</a></li>
								<li @if(Input::get('sort_date')=='desc')class="active" @endif><a href="{{route('hr.organisation.branches.index', ['page' => 1, 'sort_date' => 'desc'])}}">Tanggal (Z-A)</a></li>
								<li @if(Input::get('sort_name')=='asc')class="active" @endif><a href="{{route('hr.organisation.branches.index', ['page' => 1, 'sort_name' => 'asc'])}}">Nama (A-Z)</a></li>
								<li @if(Input::get('sort_name')=='desc')class="active" @endif><a href="{{route('hr.organisation.branches.index', ['page' => 1, 'sort_name' => 'desc'])}}">Nama (Z-A)</a></li>
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

							<div class="hbox-xs v-top height-4">
								<div class="clearfix">
									<div class="col-lg-12 margin-bottom-lg">
										<a class="text-lg text-medium" href="{{ route('hr.organisation.branches.show' ,['id'=> $value['id']]) }}">{{$value['name']}}</a>
									</div>
								</div>
								<div class="clearfix">
									<div class="col-lg-12">
										<span>{{$value['business_activities']}}</span><br/>
										<span>{{$value['business_fields']}}</span>
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

@section('js')
	<script type="text/javascript">
		$(document).ready(function () {
			$('.select2').select2();
		});
	</script>
@stop
