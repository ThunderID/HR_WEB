@extends('admin.pages.personalia.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#details">Dokumen</a></li>
	</ul>
	<div class="page-header no-border holder" style="margin-top:0px;">
		<br/>
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#add_modal">Tambah Data</button>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="details">
		<br/>
		<br/>
			<ul class="list-unstyled" id="workList">
				<li class="clearfix">
					<div class="list-results pl-10" style="margin-bottom:0px;">
						@foreach($person_documents as $key => $value)	
							<div class="row">
								<div class="col-xs-12">
									<a href="{{route('hr.persons.documents.show', [$data['id'], $value['id'], 'tag' => $value['document']['tag']])}}">
										<p>
											<span class="fa fa-fw fa-file-o fa-2x pull-left"></span>
											<span class="pull-left">
												<span class="text-bold">{{$value['document']['name']}}</span><br/>
												<span class="opacity-50">{{date("l, d F Y", strtotime($value['created_at']))}}</span><br/>
											</span>
										</p>
									</a>
								</div>
							</div><!--end .row -->
						@endforeach
					</div><!--end .hbox-md -->
					@if(count($person_documents))
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

	<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-xl" id="formModalLabel">Tambah Dokumen</h4>
				</div>
				<form class="form" role="form" action="{{route('hr.persons.documents.store', $data['id'])}}" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<select id="docs_type" name="docs_type" class="form-control">
										<option value=""></option>								
										@foreach($documents as $key => $value)
											@if($value['tag']==Input::get('tag'))
												<option value="{{$key}}">{{$value['name']}}</option>
											@endif
										@endforeach	
									</select>									
									<label for="docs_type">Jenis Dokumen</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 input_panel" id="input_panel">

							</div>
						</div>
					</div>
					<div class="card-actionbar">
						<div class="card-actionbar-row">
							<a class="btn btn-flat" data-dismiss="modal" aria-hidden="true">BATAL</a>
							<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
						</div><!--end .card-actionbar-row -->
					</div><!--end .card-actionbar -->
				</form>
			</div>
		</div>
	</div>			
	@foreach($documents as $key => $value)
		<script type="text/html" id="panel{{$key}}">
			<input name="documents_id[{{$key}}]"type="hidden" value="{{$value['id']}}">											
			<input name="documents[{{$key}}]"type="hidden" value="">
			@foreach($value['templates'] as $key2 => $value2)
				<div class="form-group">
					@if($value2['type']=='numeric' || $value2['type']=='string')
						<input name="template_value[{{$key}}][{{$key2}}]" id="template_value[{{$key}}][{{$key2}}]" class="form-control">											
						<label for="template_value[{{$key}}][{{$key2}}]">{{$value2['field']}}</label>
						<input name="template_id[{{$key}}][{{$key2}}]"type="hidden" value="{{$value2['id']}}">											
					@elseif($value2['type']=='date')
						<div class="input-daterange input-group" id="template_value[{{$key}}][{{$key2}}]" style="width:100%;">
							<div class="input-group-content">
								<input type="text" class="form-control" name="template_value[{{$key}}][{{$key2}}]">
							</div>
						</div>
						<label for="template_value[{{$key}}][{{$key2}}]">{{$value2['field']}}</label>
						<input name="template_id[{{$key}}][{{$key2}}]"type="hidden" value="{{$value2['id']}}">											
					@elseif($value2['type']=='text')
						<textarea name="template_value[{{$key}}][{{$key2}}]" id="template_value[{{$key}}][{{$key2}}]" class="form-control"></textarea>										
						<label for="template_value[{{$key}}][{{$key2}}]">{{$value2['field']}}</label>
						<input name="template_id[{{$key}}][{{$key2}}]"type="hidden" value="{{$value2['id']}}">											
					@endif
				</div>
			@endforeach
		</script>
	@endforeach

@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop


@section('js')
	<script type="text/javascript">
		window.onload=col_justify('sidebar_left','sidebar_mid','sidebar_right');

		$(document).ready(function () {
			$('.date-pick').datepicker({
				format:"dd MM yyyy"
			});

			$('#docs_type').change(function(){
			  	var n_panel = $('#docs_type').val();
			  	document.getElementById('input_panel').innerHTML = document.getElementById("panel" + (n_panel)).innerHTML ;
			});
		});		
	</script>
@stop
