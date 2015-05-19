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
		</div><!--end .card-head -->
		<!-- END SEARCH HEADER -->

		<!-- BEGIN SEARCH RESULTS -->
		<div class="card-body">
			<div class="row">

				<!-- BEGIN SEARCH NAV -->
				<div class="col-sm-4 col-md-3 col-lg-2" style="padding-left:0px; padding-right:0px;">
					<ul class="nav nav-pills nav-stacked">
						<li class="text-primary">TAMPILKAN</li>
						<li @if(!Input::has('case')) class="active" @endif><a href="{{route('hr.report.wages.post', ['page' => 1, 'start' => Input::get('start'), 'end' => Input::get('end'), 'q' => Input::get('q')])}}">Semua</a></li>
					</ul>
					<br/>
					<ul class="nav nav-pills nav-stacked pb-25">
						<li class="text-primary">BRANCHES</li>
						<?php $branch = null;?>
						@foreach($branches as $key => $value)
							@if($value['name']!=$branch)
								<li @if(Input::get('branch')==$value['name']) class="active"@endif><a href="{{route('hr.report.wages.post', ['page' => 1, 'q' => Input::get('q'), 'branch' => $value['name'], 'start' => Input::get('start'), 'end' => Input::get('end')])}}">{{$value['name']}} <small class="pull-right text-bold opacity-75"></small></a></li>
								<?php $branch = $value['name'];?>
							@endif
						@endforeach
					</ul>
					@if(Input::has('branch'))
						<ul class="nav nav-pills nav-stacked">
							<li class="text-primary">{{strtoupper(Input::get('branch'))}}</li>
							@foreach($branches as $key => $value)
								@foreach($value['departments'] as $key2 => $value2)
									<li @if(Input::has('tag') && ((Input::get('tag') == ($value2['tag'])))) class="active" @endif><a href="{{route('hr.report.wages.post', ['page' => 1, 'q' => Input::get('q'), 'branch' => $value['name'], 'tag' => $value2['tag'], 'start' => Input::get('start'), 'end' => Input::get('end')])}}">{{$value2['tag']}}<small class="pull-right text-bold opacity-75"></small></a></li>
								@endforeach
							@endforeach
						</ul>
					@endif
				</div><!--end .col -->
				<!-- END SEARCH NAV -->

				<div class="col-sm-8 col-md-9 col-lg-10">
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">
							@if(count($data)) Total data <strong>{{count($data)}}</strong> @else Tidak ada data @endif
						</span>
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

					<table class="table table-bordered">
						<thead>
							<tr>
								<th rowspan="2">Nama</th>
								<th rowspan="2">Hak Cuti</th>
								<th colspan="{{count($status)}}">Pengurang Cuti</th>
								<th rowspan="2">Penambah Cuti</th>
								<th rowspan="2">Sisa Cuti</th>
								<th rowspan="2">Faktor <br/>Pengurang <br/>Gaji</th>
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
									<td>
										{{$value['name']}}
									</td>
									<td>
										{{$value['quota']}}
									</td>
									@foreach($status as $key2 => $value2)
										<td>
											{{(isset($value['status'][$value2]) ? $value['status'][$value2] : '')}}
										</td>
									@endforeach
									<td>
										@if($value['plus_quota'] != 0 )
											{{$value['plus_quota']}}
										@endif
									</td>
									<td>
										{{$value['residue_quota']}}
									</td>
									<td>
										@if($value['residue_quota'] < 0 )
											{{0 - $value['residue_quota']}}
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop