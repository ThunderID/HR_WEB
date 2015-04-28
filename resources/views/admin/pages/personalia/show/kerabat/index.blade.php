@extends('admin.pages.personalia.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#details">Kerabat</a></li>
	</ul>
	<div class="page-header no-border holder" style="margin-top:0px;">
		<br/>
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#add_modal">Tambah Data</button>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="details">
			<br/>
			<br/>
			<div class="list-results" style="margin-bottom:0px;">
				@foreach($relatives as $key => $value)	
					@if($key%2==0 && $key!=0)
						</div>
						<div class="list-results" style="margin-bottom:0px;">
					@endif											
					<div class="col-xs-12 col-lg-12 hbox-xs">
						<div class="hbox-column width-3">
							<img class="img-circle img-responsive" alt="" @if($value['gender'] =='male') src="{{url('images/male.png')}}" @else src="{{url('images/female.png')}}" @endif></img>
						</div><!--end .hbox-column -->
						<div class="hbox-xs v-top height-4">
							<div class="clearfix">
								<div class="col-lg-12 margin-bottom-lg">
									<a class="btn pull-right ink-reaction btn-icon-toggle del-modal" type="button" data-toggle="modal" data-target="#del_modal_2_{{$value['id']}}">
										<i class="fa fa-trash"></i>
									</a>
									<?php $enm = $value['relationship'] ?>
									<a class="text-lg text-medium" href="{{ route('hr.persons.show' ,['id'=> $value['id']]) }}">{{$value['name']}}</a>
									(@include('admin.helpers.translate_enum.relationship'))
								</div>
							</div>

							@if(count($value['contacts']))
								@foreach($value['contacts'] as $key2 => $value2)
									<div class="clearfix">
										<div class="col-lg-12">
											@if($value2['item']=='phone')
												<span class="opacity-75"><span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;{{$value2['value']}}</span>
											@elseif($value2['item']=='email')
												<span class="opacity-75"><span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;{{$value2['value']}}</span>
											@elseif($value2['item']=='address')
												<span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;{{$value2['value']}}</span>
											@endif
										</div>
									</div>
								@endforeach
							@endif
						</div>
					</div>
				@endforeach	
			</div>
			@if(count($relatives))
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
	{!! Form::open(array('route' => array('hr.persons.relatives.store',  $data['id']),'method' => 'POST')) !!}
		<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
			@include('admin.modals.relation.create')
		</div>
	{!! Form::close() !!}	


	@foreach($relatives as $key => $value)	
	{!! Form::open(array('route' => array('hr.persons.relatives.delete',  $data['id'],$value['relative_id']),'method' => 'POST')) !!}
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
