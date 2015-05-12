@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<!-- BEGIN SEARCH HEADER -->
		<div class="card-head style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.persons.index')}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i> Kembali
				</a>
				<?php
					switch (Input::get('case')) 
					{
						case 'late': case 'earlier':
						echo '<a class="btn btn-flat ink-reaction pull-right" href="'.route('hr.persons.documents.index', ['page' => 1,'personid' => Input::get('personid'), 'tag' => 'SP']).'"">
									<i class="fa fa-pencil"></i> Tulis SP
								</a>';
						break;
						case 'overtime': case 'ontime':
						echo '<a class="btn btn-flat ink-reaction pull-right" href="'.route('hr.persons.documents.index', ['page' => 1,'personid' => Input::get('personid'), 'tag' => 'Appraisal']).'"">
									<i class="fa fa-pencil"></i> Tulis AP
								</a>';
						break;
					};
				?>
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
						<li @if(!Input::has('case')) class="active" @endif><a href="{{route('hr.report.attendance.detail', ['personid' => Input::get('personid'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'q' => Input::get('q')])}}">Semua</a></li>
						<li @if(Input::get('case')=='late') class="active" @endif><a href="{{route('hr.report.attendance.detail', ['personid' => Input::get('personid'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => 'late', 'branch' => Input::get('branch'), 'tag' => Input::get('tag')])}}">Terlambat</a></li>
						<li @if(Input::get('case')=='ontime') class="active" @endif><a href="{{route('hr.report.attendance.detail', ['personid' => Input::get('personid'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => 'ontime', 'branch' => Input::get('branch'), 'tag' => Input::get('tag')])}}">Tepat Waktu</a></li>
						<li @if(Input::get('case')=='earlier') class="active" @endif><a href="{{route('hr.report.attendance.detail', ['personid' => Input::get('personid'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => 'earlier', 'branch' => Input::get('branch'), 'tag' => Input::get('tag')])}}">Pulang Lebih Awal</a></li>
						<li @if(Input::get('case')=='overtime') class="active" @endif><a href="{{route('hr.report.attendance.detail', ['personid' => Input::get('personid'), 'start' => Input::get('start'), 'end' => Input::get('end'), 'case' => 'overtime', 'branch' => Input::get('branch'), 'tag' => Input::get('tag')])}}">Lembur</a></li>
					</ul>
					<br/>
				</div><!--end .col -->
				<!-- END SEARCH NAV -->

				<div class="col-sm-8 col-md-9 col-lg-10">
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">
							@if(count($data)) Total data <strong>{{count($data)}}</strong> @else Tidak ada data @endif
						</span>
						<div class="btn-group btn-group-sm pull-right">
							@if (Input::get('q'))
								<a href="{{ route('hr.report.attendance.detail', ['personid' => Input::get('personid'), 'start' => Input::get('start'), 'end' => Input::get('end')]) }}" class="btn btn-default-light mr-20"><i class="fa fa-trash"></i> Hapus Filter</a>
							@endif
						</div>
					</div><!--end .margin-bottom-xxl -->

					<table class="table no-margin">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Tanggal</th>
								<th>Jam Masuk</th>
								<th>Jam Keluar</th>
								<th>Total Idle</th>
								<th>Total Jam Kerja</th>
								<th>@if(Input::has('case') && Input::get('case')!='ontime') {{ucwords(Input::get('case'))}} (Hi - Lo) @endif</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key => $value)
								<tr>
									<td>
										{{$value['person']['name']}}
									</td>
									<td>
										{{date('d-m-Y',strtotime($value['on']))}}
									</td>
									<td>
										{{date('H:i:s',strtotime($value['start']))}}
									</td>
									<td>
										{{date('H:i:s',strtotime($value['end']))}}
									</td>
									<td>
										{{gmdate("H:i:s", $value['total_idle'])}}
									</td>
									<td>
										{{gmdate("H:i:s", $value['total_workhour'])}}
									</td>
									<td>
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
										<a href="{{route('hr.report.attendance.detail', ['personid' => $value['person_id'], 'start' => Input::get('start'), 'end' => Input::get('end')])}}">
										@if($value['has_schedule'])
											<span class ="badge style-info text-sm">
												@if(!is_null($margin))
													{{gmdate("H:i:s", $margin)}}
												@else
													Terjadwal
												@endif
											</span>
										@else
											<span class ="badge style-warning text-sm">
												@if(!is_null($margin))
													{{gmdate("H:i:s", $margin)}}
												@else
													Tidak ada dalam jadwal
												@endif
											</span>
										@endif
										</a>
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