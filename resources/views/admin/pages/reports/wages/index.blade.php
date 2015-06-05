@section('breadcrumb')
	<li>Home</li>
	<li>Reports</li>
	<li class='active'>Kehadiran</li>
@stop

@section('content')
	<div class="card">
		<!-- BEGIN SEARCH HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-md-6 col-xs-6 pt-5">
				<a href="{{ route('hr.report.wages.get') }}" class="btn btn-flat ink-reaction pull-left"><i class="md md-reply"></i> Kembali</a>
				<!-- <div class="tools pull-left"> -->
					<!-- <form class="navbar-search" role="search">
						{!! Form::open(['route' => ('hr.persons.index'), 'method' => 'get']) !!}
						<div class="form-group">
							<input type="text" class="form-control" name="q" placeholder="Ketik kata kunci">
						</div>
						<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
						{!! Form::close() !!}
					</form> -->
				<!-- </div> -->
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
						<li @if(!Input::has('case')) class="active" @endif><a href="{{route('hr.report.wages.post', ['page' => 1, 'start' => Input::get('start'), 'end' => Input::get('end'), 'q' => Input::get('q')])}}">Semua</a></li>
					</ul>
					<br/>
					<ul class="nav nav-pills nav-stacked">
						@if(Session::has('user.organisations'))
							<li class="text-primary" style="text-transform: uppercase;">ORGANISASI</li>
							@foreach(Session::get('user.organisations') as $key => $value)
								<li @if(Input::has('org_id') && ((Input::get('org_id') == ($value['id'])))) class="active" @endif><a href="{{route('hr.report.wages.post', ['page' => 1, 'start' => Input::get('start'), 'end' => Input::get('end'), 'org_id' => $value['id']])}}">{{$value['name']}}<small class="pull-right text-bold opacity-75"></small></a></li>
							@endforeach
						@endif
					</ul>
					<br/>
					<ul class="nav nav-pills nav-stacked pb-25">
						<li class="text-primary">CABANG</li>
						<?php $branch = null;?>
						@foreach($branches as $key => $value)
							<li @if(Input::get('branch')==$value['id']) <?php $branch = $value['name'];?> class="active"@endif><a href="{{route('hr.report.wages.post', ['page' => 1, 'q' => Input::get('q'), 'branch' => $value['id'], 'org_id' => Input::get('org_id'), 'start' => Input::get('start'), 'end' => Input::get('end')])}}">{{$value['name']}} <small class="pull-right text-bold opacity-75"></small></a></li>
						@endforeach
					</ul>
					@if(Input::has('branch'))
						<ul class="nav nav-pills nav-stacked">
							<li class="text-primary">{{strtoupper($branch)}}</li>
							@foreach($branches as $key => $value)
								@foreach($value['departments'] as $key2 => $value2)
									<li @if(Input::has('tag') && ((Input::get('tag') == ($value2['tag'])))) class="active" @endif><a href="{{route('hr.report.wages.post', ['page' => 1, 'q' => Input::get('q'), 'branch' => $value['id'], 'org_id' => Input::get('org_id'), 'tag' => $value2['tag'], 'start' => Input::get('start'), 'end' => Input::get('end')])}}">{{$value2['tag']}}<small class="pull-right text-bold opacity-75"></small></a></li>
								@endforeach
							@endforeach
						</ul>
					@endif
				</div><!--end .col -->
				<!-- END SEARCH NAV -->

				<div class="col-sm-8 col-md-9 col-lg-10">
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">
							@if(count($data)) Total data <span class="text-bold">{{count($data)}}</span> @else Tidak ada data @endif  per ({{date('d-m-Y', strtotime($start))}} s/d {{date('d-m-Y', strtotime($end))}})
						</span>
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn ink-reaction btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-file"></i> &nbsp;Export to <i class="fa fa-caret-down"></i>
								</button>
								<ul class="dropdown-menu animation-expand" role="menu">
									<li>
										<a href="{{ route('hr.report.wages.post', ['page' => 1, 'mode' => 'csv', 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case'), 'tag' => Input::get('tag'), 'branch' => Input::get('branch')]) }}"><i class="fa fa-file-excel-o"></i> &nbsp;CSV</a>
									</li>
									<li>
										<a href="{{ route('hr.report.wages.post', ['page' => 1, 'mode' => 'xls', 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case'), 'tag' => Input::get('tag'), 'branch' => Input::get('branch')]) }}"><i class="fa fa-file-excel-o"></i> &nbsp;XLS</a>
									</li>
								</ul>
							</div>
							<!-- <a href="{{ route('hr.report.wages.csv', ['page' => 1, 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => Input::get('case'), 'tag' => Input::get('tag'), 'branch' => Input::get('branch')]) }}" class="btn btn-primary ink-reaction"><i class="fa fa-file-excel-o"></i> Export to CSV</a> -->
						</div>
						<div class="btn-group btn-group-sm pull-right">
							@if (Input::get('q'))
								<a href="{{ route('hr.report.wages.post', ['page' => 1, 'start' => Input::get('start'), 'end' => Input::get('end')]) }}" class="btn btn-default-light mr-20"><i class="fa fa-trash"></i> Hapus Filter</a>
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

					@if(count($data))
						<table class="table table-bordered">
							<thead>
								<tr>
									<th rowspan="2" class="text-center" style="vertical-align:middle;font-weight:700">No</th>
									<th rowspan="2" style="vertical-align:middle;font-weight:700">Nama</th>
									<th class="text-center" rowspan="2" style="vertical-align:middle;"><span style="font-weight:700">Hak Cuti</span> <br> (Hari)</th>
									<th colspan="{{count($status)}}" class="text-center" style="vertical-align:middle"><span style="font-weight:700">Pengurang Cuti</span> <br> (Hari)</th>
									<th rowspan="2" class="text-center" style="vertical-align:middle"><span style="font-weight:700">Penambah Cuti</span> <br> (Hari)</th>
									<th rowspan="2" class="text-center" style="vertical-align:middle"><span style="font-weight:700">Sisa Cuti</span> <br> (Hari)</th>
									<th rowspan="2" class="text-center" style="vertical-align:middle;font-weight:700">Faktor <br/>Pengurang <br/>Gaji</th>
								</tr>
								<tr>
									@foreach($status as $key2 => $value2)
										<th>
											{{ucwords($value2)}}
										</th>
									@endforeach
								</tr>
							</thead>
							<tbody>
								<?php $label = ['late' => 'danger', 'overtime' => 'info', 'earlier' => 'danger', 'ontime' => 'success'];?>
								@foreach($data as $key => $value)
									<tr>
										<td class="text-center text-sm">{{ $key+1 }}.</td>
										<td class="text-sm">
											{{$value['name']}}
										</td>
										<td class="text-center text-sm">
											{{$value['quota']}}
										</td>
										@forelse($status as $key2 => $value2)
											<td class="text-sm">
												{{(isset($value['status'][$value2]) ? $value['status'][$value2] : '')}}
											</td>
										@empty
											<td></td>
										@endforelse
										<td class="text-sm">
											@if($value['plus_quota'] != 0 )
												{{$value['plus_quota']}}
											@endif
										</td>
										<td class="text-center text-sm">
											{{$value['residue_quota']}}
										</td>
										<td class="text-sm">
											@if($value['residue_quota'] < 0 )
												{{0 - $value['residue_quota']}}
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
				</div>
			</div>
		</div>
	</div>
@stop