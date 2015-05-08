@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords('Cuti')}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.workleaves.index')}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i>&nbsp;Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i>&nbsp;Hapus
				</a>
				<a href="{{route('hr.workleaves.edit', $data['id'])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i>&nbsp;Edit
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
								<h1 class="text-light no-margin">{{$data['name']}}</h1>
								<h5 class="mb-30 border-bottom">
									<span class="opacity-50"><i class = "fa fa-tags"></i></span>
									<span class="badge style-info text-sm opacity-75 mt-5">{{$data['chart']['name']}} - {{$data['chart']['branch']['name']}}</span>
									<span class="badge style-success text-sm opacity-75 mt-5 text-right">{{$data['quota']}}</span>
								</h5>
								<h3 class="text-light no-margin">
									Data Pegawai Cuti
								</h3>
								<table class="table no-margin">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Tanggal</th>
										</tr>
									</thead>
									<tbody>
										@foreach($persons as $key => $value)
											<tr>
												<td>
													{{$value['name']}}
												</td>
												<td>
													@foreach($value['workleaves'] as $key2 => $value2)
														<span class="badge style-warning text-sm opacity-75 mt-5">{{date('d-m-Y',strtotime($value2['on']))}}</span>
													@endforeach
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	{!! Form::open(array('route' => array('hr.workleaves.delete', $data['id']),'method' => 'POST')) !!}
		<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}

	{!! Form::open(array('url' => route('hr.workleaves.store', $data['id']),'method' => 'POST')) !!}
		<div class="modal fade modalPerson" id="personCreate" tabindex="-1" role="dialog" aria-labelledby="personCreate" aria-hidden="true">
			<div class="modal-dialog form">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title text-xl modal_contact_title" id="formModalLabel">Tambah Karyawan</h4>
					</div>
					<div class="modal-body style-default-light">
						<div class="row">
							<div class="col-lg-12">
								<h4 class="text-primary">Petunjuk</h4>
								<article class="margin-bottom-xxl">
									<p class="opacity-75">
										Untuk Menambahkan banyak karyawan silahkan gunakan comma (,)
									</p>
								</article>
							</div><!--end .col -->
						</div><!--end .row -->	
								
						<div class="row">
							<div class="tabs col-md-12  pt-20">
								<div class="col-md-12">
									<div class="form-group">
										<input name="person" id="person" class="form-control getName">
										<label for="person">Nama</label>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control modal_when_tgl" id="when" name="when">
										<label for="when">Mulai Tanggal</label>
									</div>
								</div>
							</div>					
						</div>	
						<input class="modal_contact_input_id" type="hidden" name="id_item[1]">
					</div>			
					<div class="modal-footer style-default-light">
						<a type="button" class="btn btn-flat" data-dismiss="modal">Batal</a>
						<button type="submit" type="button" class="btn btn-flat btn-primary modal_schedule_btn_save">Tambah</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>	
	{!! Form::close() !!}	
@stop

@section('js')
	{!! HTML::script('js/DemoCalendar.js')!!}

	<script type="text/javascript">
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
    </script>
@stop

@section('Schedule-active')
	active
@stop
