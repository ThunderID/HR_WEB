@section('breadcrumb')
	<li>Home</li>
	<li>{{ucwords(($controller_name))}}</li>
	<li>Aktivitas ({{date('d-m-Y', strtotime($start))}})</li>
	<li class='active'>{{ ucwords($person['name']) }}</li>
@stop

@section('content')
	<div class="card">
		<!-- BEGIN SEARCH HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-md-6 col-xs-6 pt-5">
				<a href="{{ URL::previous() }}" class="btn btn-flat ink-reaction pull-left"><i class="md md-reply"></i> Kembali</a>				
				<!-- <div class="tools pull-left">
					<form class="navbar-search" role="search">
						{!! Form::open(['route' => ('hr.persons.index'), 'method' => 'get']) !!}
						<div class="form-group">
							<input type="text" class="form-control" name="q" placeholder="Ketik kata kunci">
						</div>
						<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
						{!! Form::close() !!}
					</form>
				</div> -->
			</div>
		</div><!--end .card-head -->
		<!-- END SEARCH HEADER -->

		<!-- BEGIN SEARCH RESULTS -->
		<div class="card-body">
			<div class="row">

				<div class="col-sm-12">
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">
							@if(count($data)) Total data <strong>{{count($data)}}</strong> @else Tidak ada data @endif
						</span>
						<!-- <div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn ink-reaction btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-file"></i> &nbsp;Export to <i class="fa fa-caret-down"></i>
								</button>
								<ul class="dropdown-menu animation-expand" role="menu">
									<li>
										<a href="{{ route('hr.report.attendance.csvd', ['page' => 1, 'mode' => 'csv', 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case'), 'tag' => Input::get('tag'), 'branch' => Input::get('branch')]) }}"><i class="fa fa-file-excel-o"></i> &nbsp;CSV</a>
									</li>
									<li>
										<a href="{{ route('hr.report.attendance.csvd', ['page' => 1, 'mode' => 'xls', 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case'), 'tag' => Input::get('tag'), 'branch' => Input::get('branch')]) }}"><i class="fa fa-file-excel-o"></i> &nbsp;XLS</a>
									</li>
								</ul>
							</div>
							<a href="{{ route('hr.report.attendance.csvd', ['id' => 1, 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case'), 'tag' => Input::get('tag'), 'branch' => Input::get('branch')]) }}" class="btn btn-primary ink-reaction"><i class="fa fa-file-excel-o"></i> Export to CSV</a>
						</div> -->
						<div class="btn-group btn-group-sm pull-right">
							@if (Input::get('q'))
								<a href="{{ route('hr.report.attendance.post', ['page' => 1, 'start' => Input::get('start'), 'end' => Input::get('end')]) }}" class="btn btn-default-light mr-20"><i class="fa fa-trash"></i> Hapus Filter</a>
							@endif
							<!-- <button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-arrow-down"></span> Urutkan
							</button>
							<ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
								<li @if(Input::get('sort_margin_start')=='asc') class="active" @endif><a href="{{route('hr.report.attendance.post', ['page' => 1,'sort_margin_start' => 'asc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'tag' => Input::get('tag'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case')])}}">Terlambat [A-Z]</a></li>
								<li @if(Input::get('sort_margin_start')=='desc') class="active" @endif><a href="{{route('hr.report.attendance.post', ['page' => 1,'sort_margin_start' => 'desc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'tag' => Input::get('tag'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case')])}}">Terlambat [Z-A]</a></li>
								<li @if(Input::get('sort_margin_end')=='asc') class="active" @endif><a href="{{route('hr.report.attendance.post', ['page' => 1,'sort_margin_end' => 'asc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'tag' => Input::get('tag'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case')])}}">Pulang Lebih Awal [A-Z]</a></li>
								<li @if(Input::get('sort_margin_end')=='desc') class="active" @endif><a href="{{route('hr.report.attendance.post', ['page' => 1,'sort_margin_end' => 'desc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'tag' => Input::get('tag'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case')])}}">Pulang Lebih Awal [Z-A]</a></li>
								<li @if(Input::get('sort_workhour')=='asc') class="active" @endif><a href="{{route('hr.report.attendance.post', ['page' => 1,'sort_workhour' => 'asc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'tag' => Input::get('tag'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case')])}}">Jumlah Jam Kerja [A-Z]</a></li>
								<li @if(Input::get('sort_workhour')=='desc') class="active" @endif><a href="{{route('hr.report.attendance.post', ['page' => 1,'sort_workhour' => 'desc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'tag' => Input::get('tag'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case')])}}">Jumlah Jam Kerja [Z-A]</a></li>
								<li @if(Input::get('sort_idle')=='asc') class="active" @endif><a href="{{route('hr.report.attendance.post', ['page' => 1,'sort_idle' => 'asc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'tag' => Input::get('tag'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case')])}}">Jumlah Idle [A-Z]</a></li>
								<li @if(Input::get('sort_idle')=='desc') class="active" @endif><a href="{{route('hr.report.attendance.post', ['page' => 1,'sort_idle' => 'desc', 'branch' => Input::get('branch'), 'q' => Input::get('q'), 'tag' => Input::get('tag'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case')])}}">Jumlah Idle [Z-A]</a></li>
							</ul> -->
						</div>
					</div><!--end .margin-bottom-xxl -->

					<table class="table table-bordered text-sm">
						<thead>
							<tr>
								<th class="text-center" style="vertical-align:middle;font-weight:700">No</th>
								<th class="text-center" style="vertical-align:middle;font-weight:700">Nama</th>
								<th class="text-center" style="vertical-align:middle;font-weight:700">Event</th>
								<th class="text-center" style="vertical-align:middle;font-weight:700">Tanggal</th>
								<th class="text-center" style="vertical-align:middle;font-weight:700">Jam</th>
								<th class="text-center" style="vertical-align:middle;font-weight:700">PC</th>
							</tr>
						</thead>
						<tbody>
							<?php $prev = 0;?>
							<?php $label = ['late' => 'danger', 'overtime' => 'info', 'earlier' => 'danger', 'ontime' => 'success'];?>
							@foreach($data as $key => $value)
								<tr>
									<td class="text-center text-sm">{{ $key+1 }}.</td>
									<td class="text-sm">
										{{$person['name']}}
									</td>
									<td class="text-center text-sm">
										{{str_replace('_',' ',$value['name'])}}
									</td>
									<td class="text-center text-sm">
										@date_indo($value['on'])
									</td>
									<td class="text-center text-sm">
										{{date("H:i:s", strtotime($value['on']))}}
									</td>
									<td class="text-center text-sm">
										{{$value['pc']}}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<!-- @if(count($data))
				@include('admin.helpers.pagination')
			@endif -->
		</div>
	</div>
@stop