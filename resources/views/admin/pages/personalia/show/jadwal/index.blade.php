@extends('admin.pages.personalia.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#details">Jadwal</a></li>
	</ul>
	<div class="page-header no-border holder" style="margin-top:0px;">
		<br/>
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#scheduleCreate" data-id="0">Tambah Data</button>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="details">
			<div class="col-md-12">
				<div class="row">
					<div class="margin-bottom-xxl">
						<h3 class="text-light no-margin pt-20">
							<span class="selected-day">&nbsp;</span> &nbsp;<small class="selected-date">&nbsp;</small>
							<span class="pull-right">
								<a id="calender-prev" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-angle-left"></i></a>
								<a id="calender-next" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-angle-right"></i></a>
							</span>
						</h3>
						
						<div id="calendar" class="pt-30"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- BEGIN MODAL -->
	{!! Form::open(array('route' => array('hr.persons.schedules.store',  $data['id']),'method' => 'POST')) !!}
		@include('admin.modals.schedule.create_schedule')
	{!! Form::close() !!}	
	
	{!! Form::open(array('route' => array('hr.persons.schedules.delete', 0, 0),'method' => 'POST')) !!}
		<div class="modal fade modalScheduleDelete" id="del_schedule_modal" tabindex="-1" role="dialog" aria-labelledby="del_schedule_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}	
	
@stop


@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

@section('js')
	{!! HTML::script('js/jquery.inputmask.min.js')!!}

	<script type="text/javascript">
		// spesification for fullcalendar
		var cal_height 	= 500;
		var cal_link 	= "{{ route('hr.schedule.person.list', ['person_id' => $data['id'], '1']) }}";

		// modal schedule
		$('.modalSchedule').on('show.bs.modal', function(e) {
			var id 				= $(e.relatedTarget).attr('data-id');
			var title 			= $(e.relatedTarget).attr('data-title');
			var date_start 		= $(e.relatedTarget).attr('data-date');
			var date_end 		= $(e.relatedTarget).attr('data-date');
			var start 			= $(e.relatedTarget).attr('data-start');
			var end 			= $(e.relatedTarget).attr('data-end');
			var status 			= $(e.relatedTarget).attr('data-status');
			var delete_action	= $(e.relatedTarget).attr('data-delete-action');


			if (id != 0) 
			{
				$('.modal_schedule_id').val(id);
				$('.modal_schedule_name').val(title);
				$('.modal_schedule_date_start').val(date_start);
				$('.modal_schedule_date_end').val(date_end);
				$('.modal_schedule_start').val(start);
				$('.modal_schedule_end').val(end);
				$('.modal_schedule_status').val(status);
				$('.modal_schedule_btn_del').attr('data-delete-action', delete_action);
				$('.modal_schedule_btn_del').removeClass('hide');
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
				$('.modal_schedule_btn_del').addClass('hide');
				$(this).find('.modal_schedule_btn_save').text('Tambah');
			}
		});
		
		// modal delete
		$('.modalScheduleDelete').on('show.bs.modal', function(e) {
			var action 		= $(e.relatedTarget).attr('data-delete-action');
			$(this).parent().attr('action', action);
		});

		$(document).ready(function () {
			$(".date_mask").inputmask();
			$('.time_mask').inputmask('h:s', {placeholder: 'hh:mm'});
			$('.del-modal').click(function() {
				$('#del-modal').modal('show');
			});


			$('#relation').select2({
	            minimumInputLength: 3,
	            placeholder: '',
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
        });

	</script>
	@include('admin.js.script_calendar')
@stop
