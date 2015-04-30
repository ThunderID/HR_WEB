@extends('admin.pages.organisation.kantor.show')
@section('kantor.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#alamat">{{Input::get('item') ? Input::get('item') : 'Message Services'}} {{' ( '.$paginator->total_item.' )' }}</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="alamat">
			<div class="page-header no-border holder" style="margin-top:0px;">
				<br/>
				@if(Input::has('item') && Input::get('item')=='address')
					<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addressCreate" data-modal-address-id="0">Tambah Data</button>
				@else
					<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#contactCreate" data-modal-contact-id="0">Tambah Data</button>
				@endif
			</div>	
			<div class="clearfix">
				&nbsp;
			</div>	
			<div class="clearfix">
				&nbsp;
			</div>	
			@forelse($contacts as $key => $value)
				@include('admin.widgets.contents', [
					'mode'				=> 'list_simple',
					'data_content'		=> $value,
					'toggle'			=> [],
					'class'				=> ['top'		=> 'height-3']
				])
			@empty
				<div class="alert alert-callout alert-warning" role="alert">
					<strong>Perhatian!</strong> Data kontak belum dimasukkan.
				</div>
			@endforelse
			@if(count($contacts))
				@include('admin.helpers.pagination')
			@endif
		</div>
	</div>

	{!! Form::open(array('route' => array('hr.branches.contacts.store',  $data['id']),'method' => 'POST')) !!}
		@include('admin.modals.contact.create')
	{!! Form::close() !!}

	{!! Form::open(array('route' => array('hr.branches.contacts.store',  $data['id']),'method' => 'POST')) !!}	
		@include('admin.modals.address.create')
	{!! Form::close() !!}
@stop