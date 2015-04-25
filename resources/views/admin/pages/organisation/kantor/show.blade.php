@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords('Kantor')}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.organisation.branches.index')}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i>&nbsp;Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i>&nbsp;Hapus
				</a>
				<a href="{{route('hr.organisation.branches.edit', [$data['id']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i>&nbsp;Edit
				</a>
				<a href="{{route('hr.persons.index', ['page' => 1, 'branch' => $data['name']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-users"></i>&nbsp;Karyawan
				</a>
			</div>
		</div>
		<!-- END CARD HEADER -->

		<!-- BEGIN CARD TILES -->
		<div class="card-tiles">
			<div class="hbox-md col-md-12">

				@include('admin.helpers.company-leftbar')

				<!-- BEGIN MIDDLE -->					
				<div class="hbox-column col-md-7" id="sidebar_mid">
					<div class="margin-bottom-xxl">
						<h1 class="text-light no-margin">{{$data['name']}}</h1>
						<h5>
							{{$data['business_activities']}}
						</h5>
						<h5>
							{{$data['business_fields']}}
						</h5>
						&nbsp;&nbsp;
					</div>
					
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
				</div>

				<!-- BEGIN RIGHTBAR -->
				@include('admin.helpers.company-rightbar')

			</div>
		</div>
	</div>

	<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				{!! Form::open(array('route' => array('hr.organisation.branches.delete', $data['id']),'method' => 'POST')) !!}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="simpleModalLabel">Hapus Data Kantor</h4>
				</div>
				<div class="modal-body">
					<p>Apakah Anda yakin akan menghapus data kantor? Silahkan masukkan password Anda untuk konfirmasi.</p>
					<div class="row">
						<div class="form-group">
							<div class="col-sm-3">
								<label for="password1" class="control-label">Password</label>
							</div>
							<div class="col-sm-9">
								<input type="password" name="password" id="password" class="form-control" placeholder="Password">
							</div>
						</div>					
					</div>
				</div>
				<div class="modal-footer">
					<p>{!! Form::hidden('from_confirm_form', 'Yes') !!}</p>
					<a type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
					<button type="submit" type="button" class="btn btn-danger">Hapus</button>
				</div>
				{!! Form::close() !!}
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>	

	<!-- modals -->
	{!! Form::open(array('route' => array('hr.persons.update',  $data['id']),'method' => 'POST')) !!}
		@include('admin.modals.contact.create')
	{!! Form::close() !!}

	{!! Form::open(array('route' => array('hr.persons.update',  $data['id']),'method' => 'POST')) !!}	
		@include('admin.modals.address.create')
	{!! Form::close() !!}	
@stop

@section('js')
	<script type="text/javascript">
		window.onload=col_justify('sidebar_left','sidebar_mid','sidebar_right');	
	</script>
@stop