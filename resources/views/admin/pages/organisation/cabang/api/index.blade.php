@extends('admin.pages.organisation.cabang.show')
@section('kantor.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#alamat">API Key</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="alamat">
			<div class="page-header no-border holder" style="margin-top:0px;">
				<br/>
				<a href="{{route('hr.branches.apis.create', ['org_id' => $data['id'], 'branch_id' => $branch['id']])}}" class="btn btn-info pull-right" >Tambah Data</a>
			</div>	
			<div class="clearfix">
				&nbsp;
			</div>	
			<div class="clearfix">
				&nbsp;
			</div>	
			@forelse($apis as $key => $value)
				@include('admin.widgets.contents', [
					'mode'				=> 'list',
					'route'				=> route('hr.branches.apis.edit', ['org_id' => $data['id'], 'branchid' => $branch['id'], 'id' => $value['id']]),
					'data_content'		=> $value,
					'toggle'			=> ['api' => true],
					'class'				=> ['top'		=> 'height-3']
				])
			@empty
				<div class="alert alert-callout alert-warning" role="alert">
					<strong>Perhatian!</strong> Data API belum dimasukkan.
				</div>
			@endforelse
			@if(count($apis))
				@include('admin.helpers.pagination')
			@endif
		</div>
	</div>

	{!! Form::open(array('url' => route('hr.branches.apis.delete', ['id' => $value['id'], 'branchid' => $branch['id'], 'org_id' => $branch['organisation_id']]),'method' => 'POST')) !!}
		<div class="modal fade modalOrganisationDelete" id="del_organisation_modal" tabindex="-1" role="dialog" aria-labelledby="del_organisation_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}
@stop