@extends('admin.pages.organisation.kantor.show')
@section('kantor.show')
	<div class="card-actionbar">
		<a class="btn btn-primary pull-right" href="" data-toggle="modal" data-target="#add_modal">TAMBAH</a>
	</div>
	<div class="clearfix">&nbsp;</div>
	@foreach($data['charts'] as $key => $value)
		<div class="row">
			<div class="col-sm-9">@for($i=1;$i<count(explode(',',$value['path']));$i++)&nbsp;&nbsp;&nbsp;@endfor <i class="fa fa-chevron-circle-right"></i>&nbsp;&nbsp;{{$value['name']}}</div>
			<div class="text-right col-sm-1">
				<a href="#" data-toggle="modal" data-target="#del_modal2">
					<i class="fa fa-trash"></i>
				</a>
			</div>
			<div class="text-right col-sm-1">
				<a class="btn_edit" href="javascript:;" data-toggle="modal" data-target="#edit_modal{{$key}}">
					<i class="fa fa-pencil"></i>
				</a>
			</div>
			<div class="text-right col-sm-1">
				<a href="{{route('hr.organisation.charts.show', [$data['id'], $value['id'], 'tag' => $value['tag']])}}">
					<i class="fa fa-eye"></i>
				</a>
			</div>
		</div>
	@endforeach

	<div class="modal fade" id="del_modal2" tabindex="-1" role="dialog" aria-labelledby="del_modal2" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				{!! Form::open(array('route' => array('hr.organisation.branches.delete', $data['id']),'method' => 'POST')) !!}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="simpleModalLabel">Hapus Data struktur</h4>
				</div>
				<div class="modal-body">
					<p>Apakah Anda yakin akan menghapus data struktur? Silahkan masukkan password Anda untuk konfirmasi.</p>
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

	<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-xl" id="formModalLabel">Tambah Struktur</h4>
				</div>
				<div class="modal-body">
					<form class="form" role="form" action="{{route('hr.organisation.charts.store', $data['id'])}}" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control" id="path" name="path">
										<option value=""></option>
										@foreach($data['charts'] as $key => $value)
											<option value="{{$value['path']}}">{{$value['name']}} di {{$data['name']}}</option>
										@endforeach
									</select>
									<label for="path">Atasan</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">	
									<input type="text" class="form-control" id="grade" name="tag">
									<label for="grade">Departemen</label>
								</div>				
							</div>				
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="name" name="name">
									<label for="name">Nama</label>
								</div>
							</div>
						</div><!--end .row -->
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="min_employee" name="min_employee">
									<label for="min_employee">Jumlah Minimum Pegawai</label>
								</div>
							</div><!--end .col -->
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="ideal_employee" name="ideal_employee">
									<label for="ideal_employee">Jumlah Ideal Pegawai</label>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="max_employee" name="max_employee">
									<label for="max_employee">Jumlah Maksimum Pegawai</label>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="grade" name="grade" Placehoder="(Biarkan kosong untuk departemen)">
									<label for="grade">Grade</label>
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
	</div>		
@stop
