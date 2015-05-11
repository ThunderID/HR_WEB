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
			<br/>
			<br/>
			<div class="list-results" style="margin-bottom:0px;">
				<table>
					<thead>
						<th>
							Tanggal
						</th>
						<th>
							Keterangan
						</th>
						<th>
						</th>
					</thead>
					<tbody>
						@foreach($schedules as $key => $value)	
							<tr>
								<td>
									{{$value['on']}}
								</td>
								<td>
									{{$value['name']}}
								</td>
								<td>
									<a class="btn pull-right ink-reaction btn-icon-toggle del-modal" type="button" data-toggle="modal" data-target="#del_modal_2_{{$value['id']}}">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						@endforeach	
					</tbody>
				</table>
			</div>
			@if(count($schedules))
				@include('admin.helpers.pagination')
			@else
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>Tidak ada data</p>
					</div>
				</div>
			@endif
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
@stop
