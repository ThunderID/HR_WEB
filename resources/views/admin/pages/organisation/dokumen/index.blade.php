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
					{!! Form::open(['route' => ('hr.documents.index'), 'method' => 'get']) !!}
					<div class="form-group">
						<input type="text" class="form-control" name="q" placeholder="Ketik kata kunci">
					</div>
					<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
					{!! Form::close() !!}
				</form>
			</div>
			<div class="tools">
				<a class="btn btn-floating-action btn-default-light" href="{{route('hr.documents.create') }}"><i class="fa fa-plus"></i></a>
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
						<li @if(!Input::has('tag')) class="active"@endif><a href="{{route('hr.documents.index', ['page' => 1, 'q' => Input::get('q')])}}">Semua <small class="pull-right text-bold opacity-75"></small></a></li>
						<?php $tag = null;?>
						@foreach($data as $key => $value)
							@if($value['tag']!=$tag)
								<li @if(Input::get('tag')==$value['tag']) class="active"@endif><a href="{{route('hr.documents.index', ['page' => 1, 'q' => Input::get('q'), 'tag' => $value['tag']])}}">{{$value['tag']}} <small class="pull-right text-bold opacity-75"></small></a></li>
								<?php $tag = $value['tag'];?>
							@endif
						@endforeach
					</ul>
				</div><!--end .col -->
				<!-- END SEARCH NAV -->

				<div class="col-sm-8 col-md-9 col-lg-10">

					<!-- BEGIN SEARCH RESULTS LIST -->
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">Total data <strong>{{$paginator->total_item}}</strong></span>
						<div class="btn-group btn-group-sm pull-right">
						</div>
					</div><!--end .margin-bottom-xxl -->
					<div class="list-results" style="margin-bottom:0px;">
						@foreach($data as $key => $value)	
						@if($key%2==0 && $key!=0)
							</div>
							<div class="list-results" style="margin-bottom:0px;">
						@endif											
						<div class="col-xs-12 col-lg-6 hbox-xs">
							<a href="{{route('hr.documents.show', $value['id'])}}">
							<div class="hbox-xs v-top height-2">
								<p class="clearfix">
									<span class="fa fa-fw fa-file-o fa-2x pull-left"></span>
									<span class="pull-left">
										<span class="text-bold">{{ucwords($value['name'])}}</span><br>
										<span class="opacity-50">{{($value['persons'][0]['count'])}} Dokumen</span>
									</span>
								</p>
								<div>
									<em></em>
								</div>
							</div><!--end .hbox-column -->
							</a>
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