@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row pb-10">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a href="{{route('hr.organisation.branches.index') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Create New</a>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form pull-right">
			{!! Form::open(['route' => null, 'class' => 'form-inline', 'method' => 'get']) !!}
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
							@foreach($data as $key => $value)
								<tr>
									<td>{{$paginator->from_page + $key}}</td>
									<td>{{$value['name']}}</td>
									<td>{{$value['license']}}</td>
									<td>{{$value['npwp']}}</td>
									<td class="text-right">
										<a href="{{ route('hr.organisation.branches.show', $value['id']) }}" class='btn btn-flat btn-primary ink-reaction mt-10'>Edit</a>
										<a href="{{ route('hr.organisation.branches.show', $value['id']) }}" class='btn btn-flat btn-primary ink-reaction mt-10'>Show</a>
									</td>
								</tr>
							@endforeach
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
