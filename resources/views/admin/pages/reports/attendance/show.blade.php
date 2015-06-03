@section('breadcrumb')
	<li>Home</li>
	<li>{{ucwords(($controller_name))}}</li>
	<li>Aktivitas</li>
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

				<!-- BEGIN SEARCH NAV -->
				<div class="col-sm-4 col-md-3 col-lg-2" style="padding-left:0px; padding-right:0px;">
					<ul class="nav nav-pills nav-stacked">
						<li class="text-primary">MENU</li>
						<li @if(!Input::has('case')) class="active" @endif><a href="{{route('hr.report.attendance.detail', ['page' => 1, 'id' => $person['id'], 'start' => Input::get('start'), 'end' => Input::get('end'), 'q' => Input::get('q')])}}">Semua</a></li>
						<li @if(Input::get('case')=='late') class="active" @endif><a href="{{route('hr.report.attendance.detail', ['page' => 1, 'id' => $person['id'], 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => 'late', 'branch' => Input::get('branch'), 'tag' => Input::get('tag')])}}">Terlambat</a></li>
						<li @if(Input::get('case')=='ontime') class="active" @endif><a href="{{route('hr.report.attendance.detail', ['page' => 1, 'id' => $person['id'], 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => 'ontime', 'branch' => Input::get('branch'), 'tag' => Input::get('tag')])}}">Tepat Waktu</a></li>
						<li @if(Input::get('case')=='earlier') class="active" @endif><a href="{{route('hr.report.attendance.detail', ['page' => 1, 'id' => $person['id'], 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => 'earlier', 'branch' => Input::get('branch'), 'tag' => Input::get('tag')])}}">Pulang Lebih Awal</a></li>
						<li @if(Input::get('case')=='overtime') class="active" @endif><a href="{{route('hr.report.attendance.detail', ['page' => 1, 'id' => $person['id'], 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => 'overtime', 'branch' => Input::get('branch'), 'tag' => Input::get('tag')])}}">Lembur</a></li>
					</ul>
					<br/>
				</div><!--end .col -->
				<!-- END SEARCH NAV -->

				<div class="col-sm-8 col-md-9 col-lg-10">
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">
							@if(count($data)) Total data <strong>{{count($data)}}</strong> @else Tidak ada data @endif
						</span>
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn ink-reaction btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-file"></i> &nbsp;Export to <i class="fa fa-caret-down"></i>
								</button>
								<ul class="dropdown-menu animation-expand" role="menu">
									<li>
										<a href="{{ route('hr.report.attendance.detail', ['id' => $person['id'],'page' => 1, 'mode' => 'csv', 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case'), 'tag' => Input::get('tag'), 'branch' => Input::get('branch')]) }}"><i class="fa fa-file-excel-o"></i> &nbsp;CSV</a>
									</li>
									<li>
										<a href="{{ route('hr.report.attendance.detail', ['id' => $person['id'],'page' => 1, 'mode' => 'xls', 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case'), 'tag' => Input::get('tag'), 'branch' => Input::get('branch')]) }}"><i class="fa fa-file-excel-o"></i> &nbsp;XLS</a>
									</li>
								</ul>
							</div>
							<!-- <a href="{{ route('hr.report.attendance.csvd', ['id' => 1, 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case'), 'tag' => Input::get('tag'), 'branch' => Input::get('branch')]) }}" class="btn btn-primary ink-reaction"><i class="fa fa-file-excel-o"></i> Export to CSV</a> -->
						</div>
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
								<th rowspan="2" class="text-center" style="vertical-align:middle;font-weight:700">No</th>
								<th rowspan="2" class="text-center" style="vertical-align:middle;font-weight:700">Nama</th>
								<th rowspan="2" class="text-center" style="vertical-align:middle;font-weight:700">Tanggal</th>
								<th class="text-center" colspan="2" style="font-weight:700">In</th>
								<th class="text-center" colspan="2" style="font-weight:700">Out</th>
								<th rowspan="2" class="text-center" style="vertical-align:middle;font-weight:700">Total Idle</th>
								<th rowspan="2" class="text-center" style="vertical-align:middle;font-weight:700">Total Sleep</th>
								<th rowspan="2" class="text-center" style="vertical-align:middle;font-weight:700">Total Active</th>
								@if(Input::has('case') && Input::get('case')!='ontime')
									<th  rowspan="2" class="text-center" style="vertical-align:middle;font-weight:700"> {{ucwords(Input::get('case'))}} <br/> (Hi - Lo) </th>
								@else
									<th class="text-center" rowspan="2" style="vertical-align:middle;font-weight:700">Go In</th>
									<th class="text-center" rowspan="2" style="vertical-align:middle;font-weight:700">Go Out</th>
								@endif
								<th rowspan="2" class="text-center" style="vertical-align:middle;font-weight:700"></th>
							</tr>
							<tr>
								<th class="text-center" style="font-weight:700">
									FP
								</th>
								<th class="text-center" style="font-weight:700">
									TR
								</th>
								<th class="text-center" style="font-weight:700">
									FP
								</th>
								<th class="text-center" style="font-weight:700">
									TR
								</th>
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
										@if($value['has_schedule'])
											<span class ="badge style-info text-sm">
												{{date('Y-m-d', strtotime($value['on']))}}
											</span>
										@else
											<span class ="badge style-warning text-sm">
												{{date('Y-m-d', strtotime($value['on']))}}
											</span>
										@endif
									</td>	
									<td class="text-center text-sm">
										{{date("H:i:s", strtotime($value['fp_start']))}}
									</td>
									<td class="text-center text-sm">
										{{date("H:i:s", strtotime($value['start']))}}
									</td>
									<td class="text-center text-sm">
										{{date("H:i:s", strtotime($value['fp_end']))}}
									</td>
									<td class="text-center text-sm">
										{{date("H:i:s", strtotime($value['end']))}}
									</td>
									<td class="text-center text-sm">
										{{gmdate("H:i:s", $value['total_idle'])}}
									</td>
									<td class="text-center text-sm">
										{{gmdate("H:i:s", $value['total_sleep'])}}
									</td>
									<td class="text-center text-sm">
										{{gmdate("H:i:s", $value['total_active'])}}
									</td>
									@if(Input::has('case') && Input::get('case')!='ontime')
										<td class="text-center text-sm">
											<?php 
												switch (Input::get('case')) 
												{
													case 'late':
														$margin = 0 - ($value['margin_start']);
														break;
													case 'ontime':
														$margin = null;
														break;
													case 'earlier':
														$margin = 0 - ($value['margin_end']);
														break;
													case 'overtime':
														$margin = ($value['margin_end']);
														break;
													default:
														$margin = null;
														break;
												}
											;?>
											{{gmdate("H:i:s", $margin)}}
										</td>
									@else
										@foreach($value['notes'] as $key2 => $value2)
											<td class="text-center text-sm">
												<span class ="badge style-{{$label[$value2]}} text-sm mt-5">
													{{$value2}}
												</span>
											</td>
										@endforeach
									@endif
									<td class="text-sm">
										<span class ="badge text-sm mt-5">
											<a href ="{{route('hr.report.attendance.log', ['id' => $person['id'], 'start' => date('d/m/Y', strtotime($value['on'])), 'end' => date('d/m/Y', strtotime($value['on'].' + 1 day'))])}}"> Detail</a>
										</span>
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