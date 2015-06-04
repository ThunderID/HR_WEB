@section('breadcrumb')
	<li>Home</li>
	<li>{{ucwords($data['name'])}}</li>
	<li class="active">{{ucwords($calendar['name'])}}</li>
@stop

@section('content')
	<div class="card">
		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.organisation.calendars.index', ['page' => 1, 'org_id' => $data['id']])}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i>&nbsp;Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal" data-action="{{ route('hr.organisation.calendars.delete', $data['id']) }}">
					<i class="fa fa-trash"></i>&nbsp;Hapus
				</a>
				<a href="{{route('hr.organisation.calendars.edit', ['org_id' => $data['id'], 'id' => $calendar['id'], 'src' => 'show'])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i>&nbsp;Edit
				</a>
				<a href="" class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#chartCreate">
					<i class="fa fa-plus-circle"></i>&nbsp;Struktur
				</a>
				<a href="" class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#scheduleCreate" data-id="0" data-action="{{ route('hr.calendars.schedules.store', $data['id']) }}">
					<i class="fa fa-plus-circle"></i>&nbsp;Perubahan Jadwal
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
								<h1 class="text-light no-margin">@ucwords($calendar['name'])</h1>
								<h5 class="pb-10">
									<span class="opacity-50"><i class = "fa fa-tags"></i></span>
									<?php $workdays = explode(',', $calendar['workdays']);?>
									@foreach($workdays as $key => $value)
										<span class="badge style-info text-sm opacity-75 mt-5">{{$value}}</span>
									@endforeach
								</h5>
								<h5 class="pb-30 border-bottom">
									<span class="opacity-50"><i class = "fa fa-tags"></i></span>
									<span class="badge style-success text-sm opacity-75 mt-5"> 
										@time_indo($calendar['start'])
									 </span>
									<span class="badge style-success text-sm opacity-75 mt-5"> 
									 	@time_indo($calendar['end'])
									 </span>
								</h5>
								
								<h3 class="text-light no-margin pt-20">
									<span class="selected-day">&nbsp;</span> &nbsp;<small class="selected-date">&nbsp;</small>
									<span class="pull-right">
										<a id="calender-prev" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-angle-left"></i></a>
										<a id="calender-next" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-angle-right"></i></a>
									</span>
								</h3>
								<div class="sk-spinner sk-spinner-fading-circle spinner-loading-schedule">
									<div class="sk-circle1 sk-circle"></div>
									<div class="sk-circle2 sk-circle"></div>
									<div class="sk-circle3 sk-circle"></div>
									<div class="sk-circle4 sk-circle"></div>
									<div class="sk-circle5 sk-circle"></div>
									<div class="sk-circle6 sk-circle"></div>
									<div class="sk-circle7 sk-circle"></div>
									<div class="sk-circle8 sk-circle"></div>
									<div class="sk-circle9 sk-circle"></div>
									<div class="sk-circle10 sk-circle"></div>
									<div class="sk-circle11 sk-circle"></div>
									<div class="sk-circle12 sk-circle"></div>
								</div>
								<div id="calendar" class="pt-30"></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	{!! Form::open(array('url' => route('hr.organisation.calendars.delete', ['id' => $calendar['id'], 'org_id' => $calendar['id']]),'method' => 'POST')) !!}
		<div class="modal fade modalDelete" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}

	{!! Form::open(array('url' => route('hr.calendars.schedules.store', ['org_id' => $data['id'], 'id' => $calendar['id']]),'method' => 'POST')) !!}
		@include('admin.modals.schedule.create_schedule')
	{!! Form::close() !!}	

	{!! Form::open(array('url' => route('hr.calendars.charts.store', ['org_id' => $data['id'], 'id' => $calendar['id']]),'method' => 'POST')) !!}
		@include('admin.modals.schedule.create_chart')
	{!! Form::close() !!}	
@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

@section('js')
	{!! HTML::script('js/jquery.inputmask.min.js')!!}

	<script type="text/javascript">		
		// spesification for fullcalendar		
		var cal_height 	= 700; 
		var cal_link 	= "{{ route('hr.schedule.list', ['id' => $calendar['id'], '1']) }}";		

		// modal schedule
		$('.modalSchedule').on('show.bs.modal', function(e) {
			var id 			= $(e.relatedTarget).attr('data-id');
			var title 			= $(e.relatedTarget).attr('data-title');
			var date_start 		= $(e.relatedTarget).attr('data-date');
			var date_end 		= $(e.relatedTarget).attr('data-date');
			var start 			= $(e.relatedTarget).attr('data-start');
			var end 			= $(e.relatedTarget).attr('data-end');
			var status 			= $(e.relatedTarget).attr('data-status');

			if (id != 0) 
			{
				$('.modal_schedule_id').val(id);
				$('.modal_schedule_name').val(title);
				$('.modal_schedule_date_start').val(date_start);
				$('.modal_schedule_date_end').val(date_end);
				$('.modal_schedule_start').val(start);
				$('.modal_schedule_end').val(end);
				$('.modal_schedule_status').val(status);
				$(this).find('.modal_schedule_btn_save').text('Edit');
			}
			else
			{
				$('.modal_schedule_id').val(null);
				$('.modal_schedule_name').val('');
				$('.modal_schedule_date_start').val('');
				$('.modal_schedule_date_end').val('');
				$('.modal_schedule_start').val('');
				$('.modal_schedule_end').val('');
				$('.modal_schedule_status').val('');
				$(this).find('.modal_schedule_btn_save').text('Tambah');
			}
		});

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
                                text: item.name + ' department '+ item.tag + ' di '+ item.branchname,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });

        // var curSource = new Array();
        // //first source uses querystring to determine what events to pull back
        // // curSource[0] = '/hackyjson/cal?e1=' +  $('#e1').is(':checked') + '&e2='+ $('#e2').is(':checked');
        // //second source just returns all events
        // curSource[0] = 'http://localhost:8000/cms/test/{!! $data["id"] !!}/1/';

        // var newSource = new Array(); //we'll use this later

        // $(document).ready(function() {     
        //     $('#calendar').fullCalendar({
        //         eventSources: [curSource[0]],
        //         header: {
        //             left: '',
        //             center: 'prev title next',
        //             right: ''
        //         },
        //         theme:true,
        //         eventRender: function (event, element) {
        //             element.attr('href', 'javascript:void(0);');
        //         }
        //     });
        // });
    </script>

	@include('admin.js.script_calendar')
@stop

@section('Schedule-active')
	active
@stop
