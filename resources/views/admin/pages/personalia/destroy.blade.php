@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				Anda yakin ingin menghapus data "{{$data['name']}}" ?
			</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					{!! Form::open(array('method' => 'POST')) !!}
						<div class="row">
							<div class="col-md-12">
								<p>Masukkan password Anda untuk mengkonfirmasi bahwa Anda akan menghapus data ini.</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<input tabindex="1" type="password" class="form-control" id="password" name="password" placeholder="Password Anda">
							</div>
						</div>
						<p>{!! Form::hidden('from_confirm_form', 'Yes') !!}</p>
						<p>
							<button type="submit" class="pull-right btn btn-flat btn-danger ink-reaction">HAPUS</button>
							<a class="btn btn-flat btn-default ink-reaction pull-right" href="{{route('hr.persons.show', $data['id'])}}">BATAL</a>
						</p>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop