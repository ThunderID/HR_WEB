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
					<div class="row  pb-20">
						@if($controller_name == "department")
						<div class="col-md-12">
						@elseif($controller_name == "position")
						<div class="col-md-6">
						@endif
							<div class="form-group">
								<select name="company" id="company" class="form-control select2">
									<option value="">Nama Perusahaan</option>
									<option value="mps">PT. Mentari Pagi Sejahtera</option>
								</select>
							</div>
						</div><!--end .col -->
						@if($controller_name == "position")
						<div class="col-md-6">
							<div class="form-group">
								<select name="department" id="department" class="form-control select2">
									<option value="">Nama Jabatan</option>
									<option value="hrd">HRD</option>
								</select>
							</div>
						</div><!--end .col -->					
						@endif
					</div>

					<table class="table no-margin">
						<thead>
							<tr>
								<th>No</th>
								@if($controller_name == "department")
								<th>Nama Departemen</th>
								@elseif($controller_name == "position")
								<th>Nama Jabatan</th>
								<th>Grade</th>
								@endif
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
								@if($controller_name == "department")
								<td>HRD</td>
								@elseif($controller_name == "position")
								<td>Staff</td>
								<td>12A</td>
								@endif
								<td>12</td>
								<td>5</td>
								<td>10</td>
								<td>15</td>
								<td>
									@if($controller_name == "department")
									<a href="{{route('admin.department.show') }}">
										Detail
									</a>
									@elseif($controller_name == "position")
									<a href="{{route('admin.position.show') }}">
										Detail
									</a>
									@endif
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



