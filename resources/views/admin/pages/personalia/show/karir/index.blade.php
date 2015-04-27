@extends('admin.pages.personalia.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#details">Karir</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="details">
			<br/>	
				<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#add_modal">Tambah Data</button>
			<br/>	
			<div class="tab-pane" id="details">
				<br/>
				@if(count($data['works']) > 0)
					<ul class="timeline collapse-lg timeline-hairline no-shadow">
						@foreach($works as $key => $value)
							@if($key==0)
								<li class="timeline-inverted">
							@else
								<li>
							@endif
								<div class="timeline-circ style-accent"></div>
								<div class="timeline-entry">
									<div class="card style-default-light">
										<div class="card-body small-padding">
											<small class="text-uppercase text-primary pull-right">{{date("F Y", strtotime($value['start']))}} - @if($value['end']=='0000-00-00') Present @else {{date("F Y", strtotime($value['end']))}} @endif</small>
											<p>
												<span class="text-lg text-medium">{{($value['chart']['name'] ? $value['chart']['name'] : $value['position'])}} ({{$value['status']}})</span><br/>
												<span class="text-lg text-light">{{($value['chart']['branch']['name'] ? $value['chart']['branch']['name'] : $value['organisation'])}}</span>
											</p>
											<p>
												@if(empty ($value['reason_end_job']))
													{{'Pegawai Aktif'}}
												@else
													{{'Pegawai Nonaktif'}}
													<br/>
												@endif
												
												{{$value['reason_end_job']}}
											</p>
											<a data-toggle="tooltip" data-target="#edit_modal{{$key}}" class="btn pull-right ink-reaction btn-icon-toggle btn_edit_work" data-placement="top" data-original-title="edit pekerjaan">
												<i class="fa fa-pencil" style="margin-right:0px"></i>
											</a>											
										</div>
									</div>
								</div>
							</li>
						@endforeach
					</ul><!--end .timeline -->
					@if(count($works))
						@include('admin.helpers.pagination')
					@endif
				@else
					<ul class="list-unstyled">
						<div class="alert alert-callout alert-warning" role="alert">
							<strong>Perhatian!</strong> Data belum dimasukkan.
						</div>					
					</ul>
				@endif
			</div>
		</div>
	</div>

	<!-- BEGIN MODAL -->
	<?php $key = 0;?>
	<?php $isNew = true;?>
	<?php $value = null;?>

	{!! Form::open(array('route' => array('hr.persons.works.store',  $data['id']),'method' => 'POST')) !!}
		<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
			@include('admin.modals.work.create')
		</div>
	{!! Form::close() !!}

	<?php $isNew = false;?>
	@foreach($works as $key => $value)
		<form class="form" role="form" action="{{route('hr.persons.works.update', ['person_id' => $data['id'], 'id' => $value['id']] )}}" method="post">
			<div class="modal fade" id="edit_modal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="edit_modal{{$key}}" aria-hidden="true">
				@include('admin.modals.work.create')
			</div>
		</form>	
	@endforeach
@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
	{!! HTML::style('css/toastr.css')!!}	
@stop

@section('js')
	{!! HTML::script('js/jquery.inputmask.min.js')!!}
	{!! HTML::script('js/pluginmicrotemplating.min.js')!!}
	{!! HTML::script('js/toastr.js')!!}

	<script type="text/javascript">
		$(".date_mask").inputmask();

		@foreach($works as $key => $work)	
			@if ($work['id'])
				var preload_data = [];
				var id = {{$work['chart_id']}};
				var text ="{{$work['chart']['name'].' di '.$work['chart']['branch']['name']}}";
				preload_data.push({ id: id, text: text});
			@else
			    var preload_data = [];
			@endif

			$('.getExtCompany{{$key}}').select2({
				tokenSeparators: [",", " "],
				tags: [],
				minimumInputLength: 3,
				placeholder: "",
				maximumSelectionSize: 1,
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
	                },
					query: function (query){
					    var data = {results: []};
					     
					    $.each(preload_data, function(){
					        if(query.term.length == 0 || this.text.toUpperCase().indexOf(query.term.toUpperCase()) >= 0 ){
					            data.results.push({id: this.id, text: this.text });
					        }
					    });

					    query.callback(data);
					}
	            }
	        });

	        $('.getExtCompany{{$key}}').select2('data', preload_data );
		@endforeach        

		$('.getCompany').select2({
			tokenSeparators: [",", " "],
			tags: [],
			minimumInputLength: 1,
			placeholder: "",
			maximumSelectionSize: 1,
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

        $('.btn_edit_work').click(function(){
        	var mod = $(this).attr('data-target');
        	$(mod).modal();
        });

    </script>
@stop
