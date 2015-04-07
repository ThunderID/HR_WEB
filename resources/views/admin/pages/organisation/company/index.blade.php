@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row pb-10">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<a href="{{route('admin.company.add') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Create New</a>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 form pull-right">
			{!! Form::open(['route' => null, 'class' => 'form-inline']) !!}
				<div class="form-group col-sm-4">
					{!! Form::select('cabang', ['0' => 'Pilih Cabang', 'malang' => 'Malang', 'batu' => 'Batu', 'jakarta' => 'Jakarta'], null, ['class' => 'select2']) !!}
				</div>
				<div class="form-group col-sm-5">
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
								<th>Nama Pehusahaan</th>
								<th>No Ijin Pehusahaan</th>
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