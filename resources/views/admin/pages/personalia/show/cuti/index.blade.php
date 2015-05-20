@extends('admin.pages.personalia.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#details">Cuti</a></li>
	</ul>
	<div class="page-header no-border holder" style="margin-top:0px;">
		<br/>
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#workleaveCreate" data-id="0">Tambah Data</button>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="details">
		<br/>
		<br/>
			<ul class="list-unstyled" id="workList">
				<li class="clearfix">
					<div class="list-results pl-10" style="margin-bottom:0px;">
						@foreach($workleaves as $key => $value)	
							<div class="row">
								<div class="col-xs-12">
									<p>
										<span class="fa fa-fw fa-2x pull-left">{{$value['workleave']['quota']}}</span>
										<span class="pull-left">
											<span class="text-bold">{{$value['workleave']['name']}}</span><br/>
											<span class="opacity-50">{{date("l, d F Y", strtotime($value['start']))}} - {{date("l, d F Y", strtotime($value['end']))}}</span><br/>
										</span>
									</p>
								</div>
							</div><!--end .row -->
						@endforeach
					</div><!--end .hbox-md -->
					@if(count($workleaves))
						@include('admin.helpers.pagination')
					@else
						<div class="row">
							<div class="col-sm-12 text-center">
								<p>Tidak ada data</p>
							</div>
						</div>
					@endif			
				</li>
			</ul>
		</div>
	</div>

	<!-- BEGIN MODAL -->
	{!! Form::open(array('route' => array('hr.persons.workleaves.store',  $data['id']),'method' => 'POST')) !!}
		@include('admin.modals.workleave.create_workleave')
	{!! Form::close() !!}	
	
	{!! Form::open(array('route' => array('hr.persons.workleaves.delete', 0, 0),'method' => 'POST')) !!}
		<div class="modal fade modalScheduleDelete" id="del_workleave_modal" tabindex="-1" role="dialog" aria-labelledby="del_workleave_modal" aria-hidden="true">
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

		// modal workleave
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
				$('.modal_workleave_id').val(id);
				$('.modal_workleave_name').val(title);
				$('.modal_workleave_start').val(start);
				$('.modal_workleave_end').val(end);
				$('.modal_workleave_btn_del').attr('data-delete-action', delete_action);
				$('.modal_workleave_btn_del').removeClass('hide');
				$(this).find('.modal_workleave_btn_save').text('Edit');
			}
			else
			{
				$('.modal_workleave_id').val(null);
				$('.modal_workleave_name').val('');
				$('.modal_workleave_start').val('');
				$('.modal_workleave_end').val('');
				$('.modal_workleave_btn_del').addClass('hide');
				$(this).find('.modal_workleave_btn_save').text('Tambah');
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

			$('.getWorkleave').select2({
				tokenSeparators: [","],
				tags: [],
				placeholder: "",
				minimumInputLength: 1,
				maximumSelectionSize: 1,
				selectOnBlur: true,
			    ajax: {
			        url: "{{route('hr.ajax.workleave')}}",
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
			                        text: item.name + ' : '+ item.quota + ' hari',
			                        id: item.id
			                    }
			                })
			            };
			        }
			    }
			});
        });
	</script>
@stop
