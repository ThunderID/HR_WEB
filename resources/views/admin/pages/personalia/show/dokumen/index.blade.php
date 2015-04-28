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
	
@include('admin.modals.documents.create')

@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop


@section('js')
	<script type="text/javascript">
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
