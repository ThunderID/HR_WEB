@extends('admin.pages.personalia.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#details">Cuti</a></li>
	</ul>
	<div class="page-header no-border holder" style="margin-top:0px;">
		<br/>
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#workleaveCreate" data-id="0" data-workleave-default="0">Tambah Data</button>
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
									<div class="pull-right">
										<a href="javascript:;" class="btn btn-icon-toggle edit_person_workleave" title="Edit" data-toggle="modal" data-target="#workleaveCreate" data-id="{{ $value['id'] }}" data-workleave-id="{{ $value['workleave_id'] }}" data-workleave-name="{{ $value['workleave']['name'] }}" data-workleave-quota="{{ $value['workleave']['quota'] }}" data-workleave-start="{{ date('d-m-Y', strtotime($value['start'])) }}" data-workleave-end="{{ date('d-m-Y', strtotime($value['end'])) }}" data-workleave-default="{{ $value['is_default'] }}">
											<i class="fa fa-pencil"></i>
										</a>
										<a href="javascript:;" class="btn btn-icon-toggle" title="Hapus" data-toggle="modal" data-target="#del_workleave_modal" data-delete-action="{{ route('hr.persons.workleaves.delete', ['person_id' => $value['person_id'], 'id' => $value['id']]) }}">
											<i class="fa fa-trash"></i>
										</a>
									</div>
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
		<div class="modal fade modalWorkleaveDelete" id="del_workleave_modal" tabindex="-1" role="dialog" aria-labelledby="del_workleave_modal" aria-hidden="true">
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
		$('.modalWorkleave').on('show.bs.modal', function(e) {
			var id 					= $(e.relatedTarget).attr('data-id');
			var workleave_id 		= $(e.relatedTarget).attr('data-workleave-id');
			var workleave_name 		= $(e.relatedTarget).attr('data-workleave-name');
			var workleave_quota 	= $(e.relatedTarget).attr('data-workleave-quota');
			var workleave_start 	= $(e.relatedTarget).attr('data-workleave-start');
			var workleave_end 		= $(e.relatedTarget).attr('data-workleave-end');
			var workleave_default 	= $(e.relatedTarget).attr('data-workleave-default');			

			if (id != 0) 
			{
				$('.modal_workleave_id').val(id);				
				$('.modal_workleave').select2('data', { id: workleave_id, text: workleave_name+' : '+workleave_quota+' hari'});
				$('.modal_workleave_start').val(workleave_start);
				$('.modal_workleave_end').val(workleave_end);								
				$('.modal_is_default').attr('checked', true);				
			}
			else
			{				
				$('.modal_workleave_id').val(null);				
				$('.modal_workleave').select2("val", "");
				$('.modal_workleave_start').val('');
				$('.modal_workleave_end').val('');
				$('.modal_is_default').attr('checked', false);				
			}
		});
		
		// modal delete
		$('.modalWorkleaveDelete').on('show.bs.modal', function(e) {
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
