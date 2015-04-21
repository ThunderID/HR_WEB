@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.organisation.branches.index')}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i> Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i> Hapus
				</a>
				<a href="{{route('hr.organisation.branches.edit', [$data['id']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i> Edit
				</a>				
			</div>
		</div>
		<!-- END CARD HEADER -->

		<!-- BEGIN CARD TILES -->
		<div class="card-tiles">
			<!-- BEGIN LEFTBAR -->
			<div class="hbox-column col-md-2" id="sidebar_left">
				<ul class="nav nav-pills nav-stacked">
					<li><small>CATEGORIES</small></li>
					<li @if(!Input::has('tag')) class="active" @endif><a href="{{route('hr.organisation.branches.show', [$data['id']])}}">Profil  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
				</ul>
				<ul class="nav nav-pills nav-stacked">
					<li><small>DEPARTMENT</small></li>
					@foreach($data['departments'] as $key => $value)
						<li @if(Input::has('tag') && strtolower(Input::get('tag') == $value['tag'])) class="active" @endif><a href="{{route('hr.organisation.branches.show', ['id' => $data['id'], 'page' => '1', 'tag' => $value['tag']] )}}">{{$value['tag']}}</a><small class="pull-right text-bold opacity-75"></small></a></li>			
					@endforeach
				</ul>					
			</div>

			<!-- BEGIN MIDDLE -->					
			<div class="hbox-column col-md-7" id="sidebar_mid">
				<div class="margin-bottom-xxl">
					<div class="pull-left width-3 clearfix hidden-xs">
					</div>
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
					<li class="active"><a href="#details">Struktur</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="details">
						<div class="clearfix">&nbsp;</div>
						@include('admin.pages.organisation.kantor.struktur.index')
					</div>
				</div>
				<!-- END MIDDLE -->
			</div>

			<!-- BEGIN RIGHTBAR -->
			@include('admin.helpers.company-rightbar')
		</div>
	</div>

	<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				{!! Form::open(array('route' => array('hr.organisation.branches.delete', $data['id']),'method' => 'POST')) !!}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="simpleModalLabel">Hapus Data Relasi</h4>
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
@stop
