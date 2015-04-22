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
						{!! Form::open(['route' => ('hr.documents.index'), 'method' => 'get']) !!}
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
					<a href="{{route('hr.documents.create')}}" class="btn btn-flat ink-reaction">
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
					<ul class="nav nav-pills nav-stacked pb-25">
						<li class="text-primary">TAMPILKAN</li>
						<li @if(!Input::has('tag')) class="active" @endif><a href="{{route('hr.documents.index', ['page' => 1, 'q' => Input::get('q')])}}">Semua</a></li>
					</ul>
					<ul class="nav nav-pills nav-stacked">
						<li class="text-primary">CATEGORIES</li>
						<?php $tag = null;?>
						@foreach($tags as $key => $value)
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
						<span class="text-light text-lg">@if(count($data)) Total data <strong>{{$paginator->total_item}}</strong> @else Tidak ada data @endif</span>
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
					@if(count($data))
						@include('admin.helpers.pagination')
					@endif
				</div><!--end .list-results -->
			</div>
		</div>
	</div>
@stop