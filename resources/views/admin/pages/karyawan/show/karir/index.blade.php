@extends('admin.pages.karyawan.show')
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
										<small class="text-uppercase text-primary pull-right">{{date("F Y", strtotime($value['start']))}} - @if(is_null($value['end'])) Sekarang @else {{date("F Y", strtotime($value['end']))}} @endif</small>
										<p>
											<span class="text-lg text-medium">{{$value['chart']['name']}} ({{$value['status']}})</span><br/>
											<span class="text-lg text-light">{{$value['chart']['branch']['name']}}</span>
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
										<a data-toggle="modal" data-target="#edit_modal{{$key}}" class="btn pull-right ink-reaction btn-primary" type="button">
											<i class="fa fa-pencil"></i>&nbsp;Edit
										</a>											
									</div>
								</div>
							</div>
						</li>
					@endforeach
				</ul><!--end .timeline -->
				@if(count($works))
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
	</div>

	<!-- BEGIN MODAL -->
	<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-xl" id="formModalLabel">Tambah Pekerjaan</h4>
				</div>
				<form class="form" role="form" action="{{route('hr.persons.works.store', $data['id'])}}" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-12">
								<h4>Petunjuk</h4>
								<article class="margin-bottom-xxl">
									<p>
										Isikan posisi pekerjaan, dan status pegawai. Pastikan data yang anda isikan adalah benar.<br/>
										Untuk pegawai yang saat ini masih bekerja, inputan "Berhenti Bekerja" dan "Alasan Berhenti" dapat dikosongkan.
									</p>
								</article>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input name="work_company" id="work_company" class="form-control getCompany" data-comp="">											
									<label for="work_company">Posisi</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<select  id="work_status" name="work_status" class="form-control">
										<option value=""></option>
										<option value="contract">Contracts</option>
										<option value="trial">Trial</option>
										<option value="permanent">Permanent</option>
										<option value="internship">Internship</option>
										<option value="previous">Previous</option>
									</select>
									<label for="work_status">Status Pegawai</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-group" id="work_start" style="width:100%;">
										<div class="input-group-content">
											<input type="text" class="form-control date-pick" id="work_start" name="work_start">
										</div>
									</div>
									<label for="work_start">Mulai Bekerja</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-group" id="work_end" style="width:100%;">
										<div class="input-group-content">
											<input type="text" class="form-control date-pick" id="work_end" name="work_end">
										</div>
									</div>
									<label for="work_end">Berhenti Bekerja</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<textarea style="resize: vertical;" name="work_quit_reason" id="work_quit_reason" class="form-control" rows="3"></textarea>
									<label for="work_quit_reason">Alasan Berhenti</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group text-right">
									<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
								</div><!--end .card-actionbar -->
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	@foreach($works as $key => $value)	
	<div class="modal fade" id="edit_modal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="edit_modal{{$key}}" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-xl" id="formModalLabel">Edit Pekerjaan</h4>
				</div>
				<form class="form" role="form" action="{{route('hr.persons.works.update', ['person_id' => $data['id'], 'id' => $value['id']] )}}" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-12">
								<h4>Petunjuk</h4>
								<article class="margin-bottom-xxl">
									<p>
										Isikan posisi pekerjaan, dan status pegawai. Pastikan data yang anda isikan adalah benar.<br/>
										Untuk pegawai yang saat ini masih bekerja, inputan "Berhenti Bekerja" dan "Alasan Berhenti" dapat dikosongkan.
									</p>
								</article>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input name="work_company" id="work_company{{$key}}" class="form-control getExtCompany{{$key}}" data-comp="" value="{{$value['chart']['path']}}">											
									<label for="work_company">Posisi</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<select  id="work_status" name="work_status" class="form-control">
										<option value=""></option>
										@if($value['status']=="contract")
											<option selected value="contract">Contract</option>
										@else
											<option value="contract">Contract</option>
										@endif

										@if($value['status']=="trial")
											<option selected value="trial">Trial</option>
										@else
											<option value="trial">Trial</option>
										@endif

										@if($value['status']=="permanent")
											<option selected value="permanent">Permanent</option>
										@else
											<option value="permanent">Permanent</option>
										@endif

										@if($value['status']=="internship")
											<option selected value="internship">Internship</option>
										@else
											<option value="internship">Internship</option>
										@endif

										@if($value['status']=="previous")
											<option selected value="previous">Previous</option>
										@else
											<option value="previous">Previous</option>
										@endif										
									</select>
									<label for="work_status">Status Pegawai</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-group" id="work_start" style="width:100%;">
										<div class="input-group-content">
											<input type="text" class="form-control date-pick" id="work_start" name="work_start" value="{{date("d F Y", strtotime($value['start']))}}">
										</div>
									</div>
									<label for="work_start">Mulai Bekerja</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="input-group" id="work_end" style="width:100%;">
										<div class="input-group-content">
											@if(is_null($value['end']))
												<input type="text" class="form-control date-pick" id="work_end" name="work_end">
											@else
												<input type="text" class="form-control date-pick" id="work_end" name="work_end" value="{{date("d F Y", strtotime($value['end']))}}">
												<input type="hidden" id="cur_work_end" name="cur_work_end" value="{{date("d F Y", strtotime($value['end']))}}">
											@endif
										</div>
									</div>
									<label for="work_end">Berhenti Bekerja</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<textarea style="resize: vertical;" name="work_quit_reason" id="work_quit_reason" class="form-control" rows="3">{{$value['reason_end_job']}}</textarea>
									<label for="work_quit_reason">Alasan Berhenti</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group text-right">
									<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
								</div><!--end .card-actionbar -->
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
	@endforeach

@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

@section('js')
	{!! HTML::script('js/bootstrap-datepicker.js')!!}
	{!! HTML::script('js/microtemplating.min.js')!!}
	{!! HTML::script('js/pluginmicrotemplating.min.js')!!}

	<script type="text/javascript">
		window.onload=col_justify('sidebar_left','sidebar_mid','sidebar_right');

		$(document).ready(function () {
			$('.date-pick').datepicker({
				format:"dd MM yyyy"
			});
		});

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
                }
            }
        });

    </script>
@stop
