@section('breadcrumb')
	<li>Home</li>
	<li>{{ucwords($data['name'])}}</li>
	<li class='active'>{{ucwords($workleave['name'])}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.organisation.workleaves.index', ['page' => 1, 'org_id' => $data['id']])}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i>&nbsp;Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i>&nbsp;Hapus
				</a>
				<a href="{{route('hr.organisation.workleaves.edit', ['id' => $workleave['id'], 'org_id' => $data['id'], 'src' => 'show'])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i>&nbsp;Edit
				</a>
				<a href="" class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#chartCreate" data-id="0" data-action="">
					<i class="fa fa-plus-circle"></i>&nbsp;Cuti Karyawan (Posisi)
				</a>
			</div>
		</div>
		<!-- END CARD HEADER -->

		<!-- BEGIN CARD TILES -->
		<div class="card-tiles">
			<div class = "col-md-12 hbox-md">
				<!-- BEGIN MIDDLE -->					
				<div class="hbox-column col-md-12">
					<div class="col-md-12">
						<div class="row">
							<div class="margin-bottom-xxl">
								<h1 class="text-light no-margin">{{$workleave['name']}}</h1>
								<h5 class="pb-10 border-bottom">
									<span class="opacity-50"><i class = "fa fa-tags"></i></span>
									<span class="badge style-success text-sm opacity-75 mt-5 text-right">{{$workleave['quota']}} Hari</span>
								</h5>
								<div class="pb-20">
									{!! Form::open(['class' => 'form-inline', 'url' => route('hr.organisation.workleaves.show', ['id' => $workleave['id'], 'page' => 1, 'org_id' => $data['id']]), 'method' => 'get']) !!}
										<div class="form-group">
											<h4 class="text-lg text-medium">Filter</h4>
										</div>
										<div class="form-group">
											{!! Form::input('text', 'start', null, ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"']) !!}
											<label>Start</label>
										</div>
										<div class="form-group">
											{!! Form::input('text', 'end', null, ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"']) !!}
											<label>End</label>
										</div>
										<div class="form-group">
											{!! Form::input('submit', 'Check', 'Tampilkan', ['class' => 'btn btn-primary btn-default ink-reaction']) !!}
										</div>
										{!! Form::hidden('org_id', $data['id']) !!}
									{!! Form::close() !!}
								</div>
								@if(count($persons))
									<!-- <h3 class="text-light no-margin">
										Data Pegawai Cuti
									</h3> -->
									<table class="table no-margin">
										<thead>
											<tr>
												<th>Nama</th>
												<th>Posisi</th>
												<th>Departmen</th>
												<th>Kantor</th>
												<th>Tanggal</th>
												<th>Sisa Quota</th>
											</tr>
										</thead>
										<tbody>
											@foreach($persons as $key => $value)
												<tr>
													<td>
														{{$value['name']}}
													</td>
													<td>
														{{$value['works'][0]['name']}}
													</td>
													<td>
														{{$value['works'][0]['tag']}}
													</td>
													<td>
														{{$value['works'][0]['branch']['name']}}
													</td>
													<td>
														@foreach($value['takenworkleaves'] as $key2 => $value2)
															<span class="badge style-warning text-sm opacity-75 mt-5">{{date('d-m-Y',strtotime($value2['on']))}}</span>
														@endforeach
													</td>
													<td>
														{{number_format($workleave['quota'] - count($value['takenworkleaves']))}}
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

			</div>
		</div>
	</div>

	{!! Form::open(array('url' => route('hr.organisation.workleaves.delete', [$workleave['id'], 'org_id' => $data['id']]),'method' => 'POST')) !!}
		<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}

	{!! Form::open(array('url' => route('hr.workleaves.persons.store', [$workleave['id'], 'org_id' => $data['id']]),'method' => 'POST')) !!}
		@include('admin.modals.workleave.create_chart')
	{!! Form::close() !!}
@stop

@section('js')
	{!! HTML::script('js/jquery.inputmask.min.js')!!}
	{!! HTML::script('js/DemoCalendar.js')!!}

	<script type="text/javascript">
		$(".date_mask").inputmask();
		$('.getName').select2({
			tokenSeparators: [","],
			tags: [],
			placeholder: "",
			minimumInputLength: 1,
			selectOnBlur: true,
            ajax: {
                url: "{{route('hr.ajax.name')}}",
                dataType: 'json',
                quietMillis: 500,
               	data: function (term) {
                    return {
                        term: term
                    };
                },
                results: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
        $('.getCompany').select2({
			tokenSeparators: [","],
			tags: [],
			placeholder: "",
			minimumInputLength: 1,
			selectOnBlur: true,
			ajax: {
                url: "{{route('hr.ajax.company')}}",
                dataType: 'json',
                quietMillis: 500,
               	data: function (term) {
                    return {
                        term: term
                    };
                },
                results: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name + ' department '+ item.tag + ' di '+ item.branchname,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
    </script>
@stop

@section('Schedule-active')
	active
@stop
