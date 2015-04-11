@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="panel panel-danger">
		<div class="panel-heading bg-red-sunglo">
			<h3 class="panel-title">
				<i class='fa fa-trash'></i> Delete Confirmation
			</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<h3>Are you sure to delete "{{$data['name']}}" ?</h3>

					{!! Form::open(array('method' => 'POST', 'class' => 'form-horizontal mt form-inline')) !!}
						<p>{!! Form::hidden('from_confirm_form', 'Yes') !!}</p>
						<p>
							<a class="btn btn-flat btn-default ink-reaction" href="{{route('hr.organisation.branches.show', $data['id'])}}">BATAL</a>
							<button type="submit" class="btn btn-flat btn-primary ink-reaction">HAPUS</button>
						</p>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop