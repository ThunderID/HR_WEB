@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords('Kantor')}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.calendars.index')}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i>&nbsp;Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i>&nbsp;Hapus
				</a>
				<a href="" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i>&nbsp;Edit
				</a>
				<a href="" class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#personCreate">
					<i class="fa fa-plus-circle"></i>&nbsp;Karyawan
				</a>
				<a href="" class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#chartCreate">
					<i class="fa fa-plus-circle"></i>&nbsp;Chart
				</a>
				<a href="" class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#scheduleCreate">
					<i class="fa fa-plus-circle"></i>&nbsp;Jadwal
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
								<h1 class="text-light no-margin">@ucwords($data['name'])</h1>
								<h5 class="pb-30 border-bottom">
									<span class="opacity-50"><i class = "fa fa-tags"></i></span>
									@if(isset($data['charts']))
										@foreach($data['charts'] as $key => $value)
											<span class="badge style-info text-sm opacity-75 mt-5">{{$value['name']}} - {{$value['branch']['name']}}</span>
										@endforeach
									@endif
								</h5>
								<h3 class="text-light no-margin pt-20">
									<span class="selected-day">&nbsp;</span> &nbsp;<small class="selected-date">&nbsp;</small>
									<span class="pull-right">
										<a id="calender-prev" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-angle-left"></i></a>
										<a id="calender-next" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-angle-right"></i></a>
									</span>
								</h3>
								<h5>
									<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
										<li data-mode="month" class="active"><a href="#">Month</a></li>
										<li data-mode="agendaWeek"><a href="#">Week</a></li>
										<li data-mode="agendaDay"><a href="#">Day</a></li>
									</ul>
								</h5>
								
									<div id="calendar"></div>
								
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	{!! Form::open(array('route' => array('hr.calendars.delete', $data['id']),'method' => 'POST')) !!}
		<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}

	{!! Form::open(array('url' => route('hr.calendars.schedules.store', $data['id']),'method' => 'POST')) !!}
		@include('admin.modals.schedule.create')
	{!! Form::close() !!}	

	{!! Form::open(array('url' => route('hr.calendars.persons.store', $data['id']),'method' => 'POST')) !!}
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

	{!! Form::open(array('url' => route('hr.calendars.charts.store', $data['id']),'method' => 'POST')) !!}
		<div class="modal fade modalChart" id="chartCreate" tabindex="-1" role="dialog" aria-labelledby="chartCreate" aria-hidden="true">
			<div class="modal-dialog form">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title text-xl modal_contact_title" id="formModalLabel">Tambah Chart</h4>
					</div>
					<div class="modal-body style-default-light">
						<div class="row">
							<div class="col-lg-12">
								<h4 class="text-primary">Petunjuk</h4>
								<article class="margin-bottom-xxl">
									<p class="opacity-75">
										Untuk Menambahkan banyak chart silahkan gunakan comma (,)
									</p>
								</article>
							</div><!--end .col -->
						</div><!--end .row -->	
								
						<div class="row">
							<div class="tabs col-md-12  pt-20">
								<div class="col-md-12">
									<div class="form-group">
										<input name="chart" id="chart" class="form-control getCompany">
										<label for="chart">Nama</label>
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
	{!! HTML::script('js/jquery.inputmask.min.js')!!}

	<script type="text/javascript">		
		<?php $schedule = []; ?>
		@foreach($schedules as $i => $sh)		
			<?php 
				$schedule[$i]['id']		= $sh['id'];
				$schedule[$i]['title'] 	= $sh['name'];
				$schedule[$i]['start']	= $sh['on'];
				$schedule[$i]['end']	= $sh['on'];
			?>
		@endforeach
		<?php $sch = json_encode($schedule); ?>
		
		var schedule = {!! $sch !!};

		$(".date_mask").inputmask();
		$('.time_mask').inputmask('h:s', {placeholder: 'hh:mm'});
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
                                text: item.name +' di '+ item.branch.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
    </script>

	{!! HTML::script('js/DemoCalendar.js')!!}
@stop

@section('Schedule-active')
	active
@stop
