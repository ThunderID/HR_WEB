@extends('admin.pages.personalia.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#details">Jadwal</a></li>
	</ul>
	<div class="page-header no-border holder" style="margin-top:0px;">
		<br/>
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#scheduleCreate">Tambah Data</button>
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


	@foreach($schedules as $key => $value)	
	{!! Form::open(array('route' => array('hr.persons.schedules.delete',  $data['id'],$value['id']),'method' => 'POST')) !!}
		<div class="modal fade" id="del_modal_2_{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="del_modal_2_{{$value['id']}}" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}	
	@endforeach
@stop


@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

@section('js')
	{!! HTML::script('js/jquery.inputmask.min.js')!!}
	{!! HTML::script('js/pluginmicrotemplating.min.js')!!}

	<script type="text/javascript">
		var cal_height 	= 500;
		var cal_link 	= "{{ route('hr.schedule.list', ['id' => $data['id'], '1']) }}";
		
		$(document).ready(function () {
			$(".date_mask").inputmask();
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
