@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-head card-head-sm style-primary">
			<header style="padding-top:5px;padding-bottom:5px">
				<a href="#" class="btn btn-flat ink-reaction">
					<i class="md md-reply"></i> Back
				</a>
			</header>
		</div>
		<div class="card-body pt-10 pb-0">
			<div class="row">
				<div class="col-sm-10">
					<div class="margin-bottom-xxl row">
						<div class="col-sm-10 col-md-10">
							<h1 class="text-light no-margin">HRD</h1>
							<h3 class="text-light no-margin opacity-50">PT. Mentari Pagi Sejahtera</h3>
						</div>											
					</div>
				</div>											
			</div>
		</div>
	</div>

	@if($controller_name == "department")
	<h1 class='text-primary'>Daftar Jabatan</h1>
	@elseif($controller_name == "position")
	<h1 class='text-primary'>Daftar Pegawai</h1>
	@endif

	<div class="row pb-10">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			@if($controller_name == "department")
			<a href="{{route('admin.position.add') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Tambah</a>
			@elseif($controller_name == "position")
			<a href="{{route('admin.person-basic-information.add') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Tambah</a>
			@endif
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

	@if($controller_name == "department")
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<table class="table no-margin">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Jabatan</th>
								<th>Grade</th>
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
								<td>Staff</td>
								<td>12A</td>								
								<td>12</td>
								<td>5</td>
								<td>10</td>
								<td>15</td>
								<td>
									<a href="{{route('admin.position.show') }}">
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
	@elseif($controller_name == "position")
	@for($x=0; $x<3; $x++)
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-2 hbox-xs">
							<div class="hbox-column width-1 pt-5">
								<img class="img-circle img-responsive" alt="" src="{{url('images/male.png')}}"></img>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="clearfix">
								<p class="mt-0 mb-0 text-lg"><a href="{{ route('admin.person-basic-information.show') }}">000-12345-6789-0</a></p>
								<p class="mtm-15 mb-0 text-xl"><a href="{{ route('admin.person-basic-information.show') }}">Mark Ketijerk</a></p>
								<p class="mt-0 mb-0">Malang, 11 Agustus 1987</p>
								<p class="mt-0 mb-0">Jln. Raya Araya no 43, Blimbing, Malang, Jawa Timur</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<a href="javascript:;" class="btn btn-flat btn-primary ink-reaction">EDIT</a>
						<a href="javascript:;" class="btn btn-flat btn-primary ink-reaction">LIHAT</a>
					</div>
				</div>
			</div>		
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-2 hbox-xs">
							<div class="hbox-column width-1 pt-5">
								<img class="img-circle img-responsive" alt="" src="{{url('images/female.png')}}"></img>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="clearfix">
								<p class="mt-0 mb-0 text-lg"><a href="#">000-86429-7531-0</a></p>
								<p class="mtm-15 mb-0 text-xl"><a href="#">Mark Ketijerk</a></p>
								<p class="mt-0 mb-0">Malang, 11 Agustus 1987</p>
								<p class="mt-0 mb-0">Jln. Raya Araya no 43, Blimbing, Malang, Jawa Timur</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<a href="javascript:;" class="btn btn-flat btn-default ink-reaction">EDIT</a>
						<a href="javascript:;" class="btn btn-flat btn-primary ink-reaction">LIHAT</a>
					</div>
				</div>
			</div>		
		</div>
	</div>
	@endfor
	@endif
@stop