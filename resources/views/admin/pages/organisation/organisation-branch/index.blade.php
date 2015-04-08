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
	
	<div class="card-body style-primary form form-inverse">
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group floating-label">
							<select name="company" id="company" class="form-control">
								<option value="0"></option>
								<option value="1">PT. Mentari Pagi Sejahtera</option>
								<option value="2">Halomalang.com</option>
								<option value="3">Gopego.com</option>
							</select>
							<label>Nama Perusahaan</label>
						</div>
					</div><!--end .col -->
				</div><!--end .row -->	
			</div>
		</div>
		@if($controller_name == "position")
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<select name="department" id="department" class="form-control select2">
									<option value=""></option>
								</select>
								<label for="department">Nama Departemen</label>
							</div>
						</div><!--end .col -->
					</div><!--end .row -->	
				</div>
			</div>		
		@endif
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
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
										<a href="{{route('admin.department.show') }}" class="btn btn-flat btn-primary ink-reaction">
											Detail
										</a>
									@elseif($controller_name == "position")
										<a href="{{route('admin.position.show') }}" class="btn btn-flat btn-primary ink-reaction">
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
		$(document).ready(function (){

		});
	</script>
@stop