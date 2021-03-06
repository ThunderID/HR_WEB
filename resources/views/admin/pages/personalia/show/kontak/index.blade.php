@extends('admin.pages.personalia.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active">
			<a href="#alamat">
				@if (Input::get('item'))
					@if (Input::get('item') == 'address')
						Alamat
					@else
						{{ Input::get('item') }}
					@endif
				@else
					Message Services
				@endif
				{{' ( '.$paginator->total_item.' )' }}
			</a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="alamat">
			<div class="page-header no-border holder" style="margin-top:0px;">
				<br/>
				@if(Input::has('item') && Input::get('item')=='address')
					<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addressCreate" data-mode="personalia" data-modal-address-id="0">Tambah Data</button>
				@else
					<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#contactCreate" data-mode="personalia" data-modal-contact-id="0">Tambah Data</button>
				@endif
			</div>	
			<div class="clearfix">
				&nbsp;
			</div>	
			<div class="clearfix">
				&nbsp;
			</div>		
			@if(count($contacts))
				<ul class="list-unstyled">
					<li class="clearfix">
						@foreach($contacts as $key => $value)
							@include('admin.widgets.contents', [
								'mode'				=> 'list_simple',
								'data_content'		=> $value,
								'toggle'			=> [],
								'class'				=> ['top'		=> 'height-3']
							])
						@endforeach

						@if(count($contacts))
							@include('admin.helpers.pagination')
						@endif
					</li>			
				</ul>
			@else
				<ul class="list-unstyled">
					<div class="alert alert-callout alert-warning" role="alert">
						<strong>Perhatian!</strong> Data belum dimasukkan.
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
			@if(count($contacts))
				<ul class="list-unstyled">
					<li class="clearfix">
						@foreach($data['contacts'] as $key => $value)
							@if($value['item']!='address')
								<div class="row form">
									<div class="col-md-10">
										<div class="form-group">
											<input type="text" class="form-control" id="value[{{$key}}]" name="value[{{$key}}]" value="{{$value['value']}}">
											<input type="hidden" class="form-control" id="item[{{$key}}]" name="item[{{$key}}]" value="{{$value['item']}}">
											<input type="hidden" class="form-control" id="id_item[{{$key}}]" name="id_item[{{$key}}]" value="{{$value['id']}}">												
											<label for="value[{{$key}}]">{{str_replace('_',' ',$value['item'])}}</label>
										</div>
									</div>
									<div class="col-md-2">
										<button type="submit" class="btn btn-flat btn-primary"><i class="fa fa-pencil"></i>&nbsp;SIMPAN</button>
									</div>
								</div>
							@endif
						@endforeach
					</li>			
				</ul>
			@else
				<ul class="list-unstyled">
					<div class="alert alert-callout alert-warning" role="alert">
						<strong>Perhatian!</strong> Data belum dimasukkan.
					</div>					
				</ul>
			@endif							
		</div>
	</div>

	<!-- modals -->
	{!! Form::open(array('url' => route('hr.persons.update',  ['id' => $data['id'], 'itm' => Input::get('item')]),'method' => 'POST', 'class' => 'modal_form_contact')) !!}
		@include('admin.modals.contact.create')
	{!! Form::close() !!}

	{!! Form::open(array('url' => route('hr.persons.update',  ['id' => $data['id'], 'itm' => Input::get('item')]),'method' => 'POST', 'class' => 'modal_form_address')) !!}	
		@include('admin.modals.address.create')
	{!! Form::close() !!}

	{!! Form::open(array('route' => array('hr.persons.works.delete',  0, 0), 'method' => 'POST')) !!}
		<div class="modal fade modalContactDelete" id="del_organisation_modal" tabindex="-1" role="dialog" aria-labelledby="del_organisation_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}	
@stop