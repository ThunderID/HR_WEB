@extends('admin.pages.organisation.cabang.show')
@section('kantor.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#alamat">Kontak</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="alamat">
			<div class="page-header no-border holder" style="margin-top:0px;">
				<br/>
				@if(Input::has('item') && Input::get('item')=='address')
					<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#contactCreate" data-modal-contact-id="0">Tambah Data</button>
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
					'toggle'			=> ['branch_kontak' => true],
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

	{!! Form::open(array('url' => route('hr.branches.contacts.store',  ['id' => $branch['id'], 'org_id' => $data['id'], 'itm' => Input::get('item')]),'method' => 'POST')) !!}
		@include('admin.modals.contact.create')
	{!! Form::close() !!}

	{!! Form::open(array('url' => route('hr.branches.contacts.store', ['id' => $branch['id'], 'org_id' => $data['id'], 'itm' => Input::get('item')]),'method' => 'POST', 'class' => 'modal_form_address')) !!}	
		@include('admin.modals.address.create')
	{!! Form::close() !!}

	{!! Form::open(array('url' => route('hr.branches.contacts.delete', ['id' => 0, 'branchid' => $branch['id'], 'org_id' => $branch['organisation_id']]),'method' => 'POST')) !!}
		<div class="modal fade modalOrganisationDelete" id="del_organisation_modal" tabindex="-1" role="dialog" aria-labelledby="del_organisation_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}
@stop