@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card tabs-left style-default-light">
				<!-- BEGIN SEARCH HEADER -->
				<div class="card-head style-primary">
					<div class="tools pull-left">
						<form class="navbar-search" role="search">
							{!! Form::open(['route' => 'hr.organisation.branches.index', 'method' => 'get']) !!}
							<div class="form-group">
								<input type="text" class="form-control" name="q" placeholder="Enter your keyword">
							</div>
							<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
							{!! Form::close() !!}
						</form>
					</div>
					<div class="tools">
						<a class="btn btn-floating-action btn-default-light" href="{{route('hr.organisation.branches.create') }}"><i class="fa fa-plus"></i></a>
					</div>
				</div><!--end .card-head -->
				<!-- END SEARCH HEADER -->


				<!-- BEGIN TAB RESULTS -->
				<ul class="card-head nav nav-tabs tabs-accent" data-toggle="tabs">
					<li class="active"><a href="{{route('hr.organisation.branches.index', ['page' => 1, 'q' => Input::get('q')])}}">Semua</a></li>
				</ul>
				<!-- END TAB RESULTS -->

				<!-- BEGIN TAB CONTENT -->
				<div class="card-body tab-content style-default-bright">
					<div class="tab-pane active" id="web1">
						<div class="row">
							<div class="col-lg-12">

								<!-- BEGIN PAGE HEADER -->
								<div class="margin-bottom-xxl">
									<span class="text-light text-lg">Results <strong>{{$paginator->total_item}}</strong></span>
									<div class="btn-group btn-group-sm pull-right">
										<button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
											<span class="glyphicon glyphicon-arrow-down"></span> Sort
										</button>
										<ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
											<li @if(Input::get('sort_date')=='asc' || (!Input::get('sort_date') && !Input::get('sort_name')))class="active" @endif><a href="{{route('hr.organisation.branches.index', ['page' => 1, 'sort_date' => 'asc'])}}">Date asc</a></li>
											<li @if(Input::get('sort_date')=='desc')class="active" @endif><a href="{{route('hr.organisation.branches.index', ['page' => 1, 'sort_date' => 'desc'])}}">Date desc</a></li>
											<li @if(Input::get('sort_name')=='asc')class="active" @endif><a href="{{route('hr.organisation.branches.index', ['page' => 1, 'sort_name' => 'asc'])}}">Name asc</a></li>
											<li @if(Input::get('sort_name')=='desc')class="active" @endif><a href="{{route('hr.organisation.branches.index', ['page' => 1, 'sort_name' => 'desc'])}}">Name desc</a></li>
										</ul>
									</div>
								</div><!--end .margin-bottom-xxl -->
								<!-- END PAGE HEADER -->

								<!-- BEGIN RESULT LIST -->
								<div class="list-results list-results-underlined">
									@foreach($data as $key => $value)
										<div class="row">
											<div class="col-md-12">
												<p>
													<a class="text-medium text-lg text-primary" href="{{ route('hr.organisation.branches.show', ['id' => $value['id']]) }}">{{$value['name']}}</a><br/>
													<a class="opacity-75">{{$value['business_fields']}}</a>
												</p>
												<div class="contain-xs pull-left">
													{{$value['business_activities']}}
												</div>
											</div><!--end .col -->
										</div>
										@endforeach
									@if(count($data))
										@include('admin.helpers.pagination')
									@else
										<div class="row">
											<div class="col-sm-12 text-center">
												<p>Tidak ada data</p>
											</div>
										</div>
									@endif
							</div><!--end .col -->
						</div><!--end .row -->
					</div><!--end .tab-pane -->
				</div><!--end .card-body -->
				<!-- END TAB CONTENT -->

			</div><!--end .card -->		
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
