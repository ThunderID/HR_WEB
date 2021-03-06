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
			<div class = "col-md-12 hbox-md">
				<div class="hbox-column col-md-2" id="sidebar_left">
					<ul class="nav nav-pills nav-stacked">
						@if(Session::has('user.organisations'))
							<li class="text-primary" style="text-transform: uppercase;">ORGANISASI</li>
							@foreach(Session::get('user.organisations') as $key => $value)
								<li @if(Input::has('org_id') && ((Input::get('org_id') == ($value['id'])))) class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1, 'q' => Input::get('q'), 'org_id' => $value['id']])}}">{{$value['name']}}<small class="pull-right text-bold opacity-75"></small></a></li>
							@endforeach
						@endif
					</ul>
					<br/>
					<ul class="nav nav-pills nav-stacked">
						<li class="text-primary" style="text-transform: uppercase;">CABANG</li>
						<?php $name = '';?>
						@foreach($branches as $key => $value)
							<li @if(Input::has('branch') && ((Input::get('branch') == ($value['id'])))) class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1, 'org_id' => Input::get('org_id'), 'q' => Input::get('q'), 'karyawan' => Input::get('karyawan'), 'branch' => $value['id'], 'gender' => Input::get('gender')])}}">{{$value['name']}}<small class="pull-right text-bold opacity-75"></small></a></li>
							@if($value['id']==Input::get('branch'))
								<?php $name = $value['name'];?>
							@endif
						@endforeach
					</ul>
					<br/>
					<ul class="nav nav-pills nav-stacked">
						<li class="text-primary">MENU</li>
						<li @if(!Input::has('karyawan') && !Input::has('non-karyawan')) class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'org_id' => Input::get('org_id'), 'q' => Input::get('q')])}}">Semua <small class="pull-right text-bold opacity-75"></small></a></li>
						<li @if(Input::has('karyawan')) class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'org_id' => Input::get('org_id'), 'q' => Input::get('q'), 'karyawan' => 'active'])}}">Karyawan <small class="pull-right text-bold opacity-75"></small></a></li>
						<li @if(Input::has('non-karyawan')) class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'org_id' => Input::get('org_id'), 'q' => Input::get('q'), 'non-karyawan' => 'false'])}}">Non Karyawan <small class="pull-right text-bold opacity-75"></small></a></li>
						<li class="text-primary pt-25">GENDER</li>
						<li @if(Input::has('gender') && Input::get('gender')=='male') class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'org_id' => Input::get('org_id'), 'q' => Input::get('q'), 'karyawan' => Input::get('karyawan'), 'gender' => 'male', 'branch' => Input::get('branch'), 'tag' => Input::get('tag'), 'non-karyawan' => Input::get('non-karyawan')])}}">Pria <small class="pull-right text-bold opacity-75"></small></a></li>
						<li @if(Input::has('gender') && Input::get('gender')=='female') class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'org_id' => Input::get('org_id'), 'q' => Input::get('q'), 'karyawan' => Input::get('karyawan'), 'gender' => 'female', 'branch' => Input::get('branch'), 'tag' => Input::get('tag'), 'non-karyawan' => Input::get('non-karyawan')])}}">Wanita <small class="pull-right text-bold opacity-75"></small></a></li>
					</ul>
					<br/>
					<ul class="nav nav-pills nav-stacked">
						@if(Input::has('branch'))
							<li class="text-primary" style="text-transform: uppercase;">{{$name}}</li>
							<li @if(!Input::has('tag')) class="active"@endif><a href="{{route('hr.persons.index', ['page' => 1, 'org_id' => Input::get('org_id'), 'q' => Input::get('q'), 'karyawan' => Input::get('karyawan'), 'branch' => Input::get('branch'), 'gender' => Input::get('gender')])}}">Semua Department <small class="pull-right text-bold opacity-75"></small></a></li>
							@foreach($branches as $key => $value)
								@foreach($value['departments'] as $key2 => $value2)
									<li @if(Input::has('tag') && ((Input::get('tag') == ($value2['tag'])))) class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1, 'org_id' => Input::get('org_id'), 'q' => Input::get('q'), 'karyawan' => Input::get('karyawan'), 'branch' => $value['id'], 'tag' => $value2['tag'], 'gender' => Input::get('gender')])}}">{{$value2['tag']}}<small class="pull-right text-bold opacity-75"></small></a></li>
								@endforeach
							@endforeach
						@endif
					</ul>
					<br/>
				</div><!--end .col -->
				<!-- END SEARCH NAV -->

				<div class="hbox-column col-md-10" id="sidebar_mid">

					<!-- BEGIN SEARCH RESULTS LIST -->
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">@if(count($data)) Total data <strong>{{$paginator->total_item}}</strong> @else Tidak ada data @endif</span>
						<div class="btn-group btn-group-sm pull-right">
							<button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-arrow-down"></span> Urutkan
							</button>
							<ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
								<li @if(Input::get('sort_firstname')=='asc') class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1, 'org_id' => Input::get('org_id'),'sort_firstname' => 'asc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'karyawan' => Input::get('karyawan'), 'tag' => Input::get('tag'), 'gender' => Input::get('gender')])}}">Nama [A-Z]</a></li>
								<li @if(Input::get('sort_firstname')=='desc') class="active" @endif><a href="{{route('hr.persons.index', ['page' => 1, 'org_id' => Input::get('org_id'),'sort_firstname' => 'desc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'karyawan' => Input::get('karyawan'), 'tag' => Input::get('tag'), 'gender' => Input::get('gender')])}}">Nama [Z-A]</a></li>
							</ul>
						</div>
					</div><!--end .margin-bottom-xxl -->
					<div class="list-results" style="margin-bottom:-1px;border-top:1px solid #eee;border-bottom:1px solid #eee;">
						@foreach($data as $key => $value)	
							@if($key%2==0 && $key!=0)
								</div>
								<div class="list-results" style="margin-bottom:-1px;border-bottom:1px solid #eee">
							@endif
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 hbox-xs box">
								@include('admin.widgets.contents', [
									'route'				=> route('hr.persons.show', ['id' => $value['id'], 'org_id' => Input::get('org_id')]),
									'mode'				=> 'list',
									'data_content'		=> $value,
									'toggle'			=> [
															'avatar' 	=> true,
															'person'	=> true
															],
									'class'				=> ['top'		=> 'height-3']
								])
							</div>
						@endforeach
					</div>
				</div>
			</div>
			@if(count($data))
				@include('admin.helpers.pagination')
			@endif
		</div>
	</div>
	{!! Form::open(array('route' => array('hr.persons.delete', 0),'method' => 'POST')) !!}
		<div class="modal fade modalDeletePerson" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}		
@stop

@section('js')
	<script>
		$('.modalDeletePerson').on('show.bs.modal', function(e) {
			var action	= $(e.relatedTarget).attr('data-delete-action');
			$(this).parent().attr('action', action);
		});

		$(document).ready(function(){
			$('')
			
		});

		function check_height()
		{
			return $(this).height();
		}

	</script>
@stop