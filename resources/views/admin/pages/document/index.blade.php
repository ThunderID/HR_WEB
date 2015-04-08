@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row pb-10">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a href="{{route('admin.document.add') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Tambah</a>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form pull-right">
			{!! Form::open(['route' => null, 'class' => 'form-inline']) !!}
				<div class="form-group col-sm-9">
					<input type="text" class="form-control" name="q" style="width:100%">
					<label for="">Cari</label>
				</div>
				<button class="btn btn-raised btn-default-light ink-reaction" type="submit">Cari</button>
			{!! Form::close() !!}
		</div>
		
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<table class="table no-margin">
						<thead>
							<tr>
								<th>No</th>
								<th>Jenis Dokumen</th>
								<th>Jumlah</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Surat peringatan</td>
								<td>1</td>
								<td>
									<a href="{{route('admin.document.show') }}">
										Detail
									</a>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Kontrak Kerja</td>
								<td>1</td>
								<td>
									<a href="{{route('admin.document.show') }}">
										Detail
									</a>
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Peniliaian Kinerja</td>
								<td>3</td>
								<td>
									<a href="{{route('admin.document.show') }}">
										Detail
									</a>
								</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Pendidikan Formal</td>
								<td>4</td>
								<td>
									<a href="{{route('admin.document.show') }}">
										Detail
									</a>
								</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop