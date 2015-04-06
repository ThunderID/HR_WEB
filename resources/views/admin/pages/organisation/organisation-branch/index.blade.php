@section('breadcrumb')
	<li>Home</li>
	<li>Struktur Perusahaan</li>

	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row pb-10">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			@if($controller_name == "department")
			<a href="{{route('admin.department.add') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Create New</a>
			@elseif($controller_name == "position")
			<a href="{{route('admin.position.add') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Create New</a>
			@endif
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
								<th>Nama</th>
								<th>Current</th>								
								<th>Min</th>
								<th>Ideal</th>
								<th>Max</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>HRD</td>
								<td>12</td>
								<td>5</td>
								<td>10</td>
								<td>15</td>
								<td>
									
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop


