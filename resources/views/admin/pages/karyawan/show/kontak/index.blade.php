@extends('admin.pages.karyawan.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#alamat">Alamat</a></li>
		<li><a href="#kontak">Kontak</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="alamat">
			<div class="page-header no-border holder" style="margin-top:0px;">
				<br/>
				<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#contactCreate">Tambah Data</button>
			</div>	
			<div class="page-header no-border holder">
				<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"></a>
				<h4 class="text-accent">Alamat [Sekarang] </h4>
			</div>			
			@if($data['id'])
				<ul class="list-unstyled">
					<li class="clearfix">
						@foreach($data['contacts'] as $key => $value)
							@if($value['item']=='address')
								<form class="form" role="form" action="{{route('hr.persons.update', $data['id'])}}" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="hidden" class="form-control" id="id_address[0]" name="id_address[0]" value="{{$value['id']}}">
												<textarea type="text" class="form-control" name="address_address[0]" style="resize: none;" rows="3">{{$value['value']}}</textarea>
												<label for="address_address[0]">Alamat Lengkap</label>
											</div>
										</div>
									</div>
									<?php $is_address = true;?>																						
									<div class="card-actionbar">
										<div class="card-actionbar-row">
											<button type="submit" class="btn btn-flat btn-accent"><i class="fa fa-pencil"></i>&nbsp;SIMPAN</button>
										</div>
									</div>
								</form>
							@endif
						@endforeach
					</li>			
				</ul>
			@else
				<ul class="list-unstyled">
					<div class="alert alert-callout alert-warning" role="alert">
						<strong>Perhatian!</strong> Data kontak belum dimasukkan.
					</div>					
				</ul>
			@endif
		</div>
		<div class="tab-pane" id="kontak">
			<div class="page-header no-border holder" style="margin-top:0px;">
				<br/>
				<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addressCreate">Tambah Data</button>
			</div>	
			<div class="page-header no-border holder">
				<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"></a>
				<h4 class="text-accent">Kontak [Sekarang] </h4>
			</div>
			@if($data['id'])
				<ul class="list-unstyled">
					<li class="clearfix">
						@foreach($data['contacts'] as $key => $value)
							@if($value['item']!='address')
								<form class="form" role="form" action="{{route('hr.persons.update', $data['id'])}}" method="post">
									<div class="row">
										<div class="col-md-10">
											<div class="form-group">
												<input type="text" class="form-control" id="item{{$key}}" name="item{{$key}}" value="{{$value['value']}}">
												<label for="item{{$key}}">{{str_replace('_',' ',$value['item'])}}</label>
											</div>
										</div>
										<div class="col-md-2">
											<button type="submit" class="btn btn-flat btn-accent"><i class="fa fa-pencil"></i>&nbsp;SIMPAN</button>
										</div>
									</div>
								</form>
							@endif
						@endforeach
					</li>			
				</ul>
			@else
				<ul class="list-unstyled">
					<div class="alert alert-callout alert-warning" role="alert">
						<strong>Perhatian!</strong> Data kontak belum dimasukkan.
					</div>					
				</ul>
			@endif							
		</div>
	</div>

	<!-- modals -->
	{!! Form::open(array('route' => array('hr.persons.update',  $data['id']),'method' => 'POST')) !!}
		@include('admin.modals.contact.create')
	{!! Form::close() !!}

	{!! Form::open(array('route' => array('hr.persons.update',  $data['id']),'method' => 'POST')) !!}	
		@include('admin.modals.address.create')
	{!! Form::close() !!}
@stop