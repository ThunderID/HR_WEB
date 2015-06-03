@extends('admin.pages.personalia.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#details">{{$person_document['document']['name']}}</a></li>
	</ul>
	<div class="tab-content" style="padding-top:0px;">
		<div class="tab-pane active" id="details">
			<br/>
			<br/>	
			@foreach($person_document['details'] as $key => $value)
			<div class="row ">
				<div class="col-md-12">
					<div class="col-md-4"><h5 class="text-bold">{{ucwords($value['template']['field'])}}</h5></div>
					<div class="col-md-8"><h5 class="text-light">@if($value['numeric']!=0) {{$value['numeric']}} @else {{$value['text']}} @endif</h5></div>
				</div>
			</div>
			@endforeach
			<br/>
			<a class="btn pull-right ink-reaction btn-flat btn-danger del_modal_2 mt-5" type="button" data-toggle="modal" data-target="#del_modal_2">
				<i class="fa fa-trash"></i>&nbsp;HAPUS
			</a>
			<a class="btn pull-right ink-reaction btn-flat btn-primary mt-5" type="button" href="{{route('hr.persons.documents.print', [$data['id'], $person_document['id']])}}" target="_blank">
				<i class="fa fa-print"></i>&nbsp;PRINT
			</a>
			<a class="btn pull-right ink-reaction btn-flat btn-primary mt-5" type="button" href="{{route('hr.persons.documents.pdf', [$data['id'], $person_document['id']])}}" target="_blank">
				<i class="fa fa-file-pdf-o"></i>&nbsp;PDF
			</a>
		</div>
	</div>

	<!-- BEGIN MODAL -->
	{!! Form::open(array('route' => array('hr.persons.documents.delete',  $data['id'],$person_document['id']),'method' => 'POST')) !!}
		<div class="modal fade" id="del_modal_2" tabindex="-1" role="dialog" aria-labelledby="del_modal_2" aria-hidden="true">
			<div class="modal-dialog form">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title text-xl" id="formModalLabel">Hapus Data</h4>
					</div>
					<div class="modal-body style-default-light">
						<div class="row">
							<div class="col-lg-12">
								<h4 class="text-danger">Perhatian</h4>
								<p class="opacity-75">
									Apakah Anda yakin akan menghapus data? Silahkan masukkan password Anda untuk konfirmasi.
								</p>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-sm-3">
									<label for="password" class="control-label">Password</label>
								</div>
								<div class="col-sm-9">
									<input type="password" name="password" id="password" class="form-control" placeholder="Password">
								</div>
							</div>					
						</div>
					</div>
					<div class="modal-footer style-default-light">
						<p>{!! Form::hidden('from_confirm_form', 'Yes') !!}</p>
						<a type="button" class="btn btn-flat" data-dismiss="modal">Cancel</a>
						<button type="submit" type="button" class="btn btn-flat btn-danger">Hapus</button>
					</div>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->	
	{!! Form::close() !!}
@stop
