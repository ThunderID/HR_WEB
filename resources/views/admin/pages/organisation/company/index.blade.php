@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row pb-10">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a href="{{route('admin.company.add') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Create New</a>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form pull-right">
			{!! Form::open(['route' => null, 'class' => 'form-inline']) !!}
				<div class="form-group col-sm-9">
					<input type="text" class="form-control" name="q" style="width:100%">
					<label for="">Search</label>
				</div>
				<button class="btn btn-raised btn-default-light ink-reaction" type="submit">Search</button>
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
								<th>Nama Perusahaan</th>
								<th>No Ijin Perusahaan</th>
								<th>NPWP</th>
								<th class="	text-right"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>PT. Makmur Sejati</td>
								<td>09090909080</td>
								<td>98989898899</td>
								<td class="text-right">
									<a href="javascript:;" class='btn btn-flat btn-primary ink-reaction mt-10'>Edit</a>
									<a href="{{ route('admin.company.show') }}" class='btn btn-flat btn-primary ink-reaction mt-10'>Show</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function () {
			$('.select2').select2();
		});
	</script>
@stop
