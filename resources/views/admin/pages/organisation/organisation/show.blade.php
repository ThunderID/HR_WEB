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
							<h1 class="text-light no-margin">PT. Mentari Pagi Sejahtera</h1>										
						</div>											
					</div>
				</div>											
			</div>
		</div>
	</div>

	<h1 class='text-primary'>API KEYS</h1>

	<div class="row pb-10">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a href="{{route('admin.API.add') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Tambah</a>
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
		<div class="col-sm-6">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<header >
						API Keys 1
					</header>
				</div>
				<div class="card-body height-4">
					<div class="clearfix">
						<p class="mtm-5 mb-0 text-lg">API Key</p>
						<p class="mtm-5 mb-0 opacity-50">123456789012345678901234567890123456789012345678901234567890</p>
						<p class="mtm-0 mb-0 text-lg">API Secret</p>
						<p class="mtm-5 mb-0 opacity-50">123456789012345678901234567890123456789012345678901234567890</p>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<a class="btn btn-flat" href="#">EDIT</a>
						<a class="btn btn-flat" href="#">HAPUS</a>
					</div><!--end .card-actionbar-row -->
				</div><!--end .card-actionbar -->
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<header >
						API Keys 2
					</header>
				</div>
				<div class="card-body height-4">
					<div class="clearfix">
						<p class="mtm-5 mb-0 text-lg">API Key</p>
						<p class="mtm-5 mb-0 opacity-50">123456789012345678901234567890123456789012345678901234567890</p>
						<p class="mtm-0 mb-0 text-lg">API Secret</p>
						<p class="mtm-5 mb-0 opacity-50">123456789012345678901234567890123456789012345678901234567890</p>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<a class="btn btn-flat" href="#">EDIT</a>
						<a class="btn btn-flat" href="#">HAPUS</a>
					</div><!--end .card-actionbar-row -->
				</div><!--end .card-actionbar -->
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<header >
						API Keys 3
					</header>
				</div>
				<div class="card-body height-4">
					<div class="clearfix">
						<p class="mtm-5 mb-0 text-lg">API Key</p>
						<p class="mtm-5 mb-0 opacity-50">123456789012345678901234567890123456789012345678901234567890</p>
						<p class="mtm-0 mb-0 text-lg">API Secret</p>
						<p class="mtm-5 mb-0 opacity-50">123456789012345678901234567890123456789012345678901234567890</p>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<a class="btn btn-flat" href="#">EDIT</a>
						<a class="btn btn-flat" href="#">HAPUS</a>
					</div><!--end .card-actionbar-row -->
				</div><!--end .card-actionbar -->
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<header >
						API Keys 4
					</header>
				</div>
				<div class="card-body height-4">
					<div class="clearfix">
						<p class="mtm-5 mb-0 text-lg">API Key</p>
						<p class="mtm-5 mb-0 opacity-50">123456789012345678901234567890123456789012345678901234567890</p>
						<p class="mtm-0 mb-0 text-lg">API Secret</p>
						<p class="mtm-5 mb-0 opacity-50">123456789012345678901234567890123456789012345678901234567890</p>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<a class="btn btn-flat" href="#">EDIT</a>
						<a class="btn btn-flat" href="#">HAPUS</a>
					</div><!--end .card-actionbar-row -->
				</div><!--end .card-actionbar -->
			</div>
		</div>
	</div>	


	<h1 class='text-primary'>Daftar Perusahaan</h1>

	<div class="row pb-10">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a href="{{route('admin.company.add') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Tambah</a>
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
								<th>Nama Pehusahaan</th>
								<th>No Ijin Pehusahaan</th>
								<th>NPWP</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>PT. Makmur Sejati</td>
								<td>09090909080</td>
								<td>98989898899</td>
								<td>
									<a href="{{route('admin.company.show') }}">
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