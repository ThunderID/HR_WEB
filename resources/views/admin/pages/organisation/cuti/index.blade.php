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
						{!! Form::open(['route' => ('hr.workleaves.index'), 'method' => 'get']) !!}
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
					<a href="{{route('hr.workleaves.create')}}" class="btn btn-flat ink-reaction">
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
						<li @if(!Input::has('tag')) class="active" @endif><a href="{{route('hr.workleaves.index', ['page' => 1, 'q' => Input::get('q')])}}">Semua</a></li>
					</ul>
					<ul class="nav nav-pills nav-stacked pb-25">
						<li class="text-primary">CATEGORIES</li>
						<?php $branch = null;?>
						@foreach($branches as $key => $value)
							@if($value['name']!=$branch)
								<li @if(Input::get('branch')==$value['name']) class="active"@endif><a href="{{route('hr.workleaves.index', ['page' => 1, 'q' => Input::get('q'), 'branch' => $value['name']])}}">{{$value['name']}} <small class="pull-right text-bold opacity-75"></small></a></li>
								<?php $branch = $value['name'];?>
							@endif
						@endforeach
					</ul>
					@if(Input::has('branch'))
						<ul class="nav nav-pills nav-stacked">
							<li class="text-primary">{{strtoupper(Input::get('branch'))}}</li>
							@foreach($branches as $key => $value)
								@foreach($value['departments'] as $key2 => $value2)
									<li @if(Input::has('tag') && ((Input::get('tag') == ($value2['tag'])))) class="active" @endif><a href="{{route('hr.workleaves.index', ['page' => 1, 'q' => Input::get('q'), 'branch' => $value['name'], 'tag' => $value2['tag']])}}">{{$value2['tag']}}<small class="pull-right text-bold opacity-75"></small></a></li>
								@endforeach
							@endforeach
						</ul>
					@endif
				</div><!--end .col -->
				<!-- END SEARCH NAV -->

				<div class="col-sm-8 col-md-9 col-lg-10">

					<!-- BEGIN SEARCH RESULTS LIST -->
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">
							@if(count($data)) Total data <strong>{{$paginator->total_item}} (Tahun {{date('Y')}})</strong> @else Tidak ada data @endif
						</span>
						<div class="btn-group btn-group-sm pull-right">
							@if (Input::get('q'))
								<a href="{{ route('hr.workleaves.index') }}" class="btn btn-default-light mr-20"><i class="fa fa-trash"></i> Hapus Filter</a>
							@endif
						</div>
					</div><!--end .margin-bottom-xxl -->
					<div class="list-results" style="margin-bottom:0px;">
						@foreach($data as $key => $value)	
							@if($key%2==0 && $key!=0)
								</div>
								<div class="list-results" style="margin-bottom:0px;">
							@endif											
							<div class="col-xs-12 col-lg-6 hbox-xs">
								@include('admin.widgets.contents', [
									'route'				=> route('hr.workleaves.show', $value['id']),
									'mode'				=> 'list',
									'data_content'		=> $value,
									'toggle'			=> ['calendar' => true],
									'class'				=> ['top'		=> 'height-2']
								])
							</div>
						@endforeach
					</div>
					@if(count($data))
						@include('admin.helpers.pagination')
					@endif
				</div><!--end .list-results -->
			</div>
		</div>
	</div>
@stop