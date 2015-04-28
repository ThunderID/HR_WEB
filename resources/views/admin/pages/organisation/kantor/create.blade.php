@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		@if($data['id'])
			<form class="form" role="form" action="{{route('hr.organisation.branches.update', $data['id'])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.organisation.branches.store')}}" method="post">
		@endif
			<!-- END DEFAULT FORM ITEMS -->
			<div class="card-head style-primary">
				<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
					<li class="active"><a>PROFIL</a></li>
				</ul>
			</div><!--end .card-head -->		
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body tab-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="name" name="name" value="{{$data['name']}}">
									<label for="name">Nama Perusahaan</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" id="license" name="license" value="{{$data['license']}}">
									<label for="license">Nomor Ijin Perusahaan</label>
								</div>
							</div><!--end .col -->
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" id="npwp" name="npwp" value="{{$data['npwp']}}">
									<label for="npwp">NPWP</label>
								</div>
							</div>
						</div><!--end .row -->
					</div>
				</div>
			</div>
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" href="{{route('hr.organisation.branches.index')}}">BATAL</a>
					<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
				</div>
			</div>			
		</form>
	</div>
@stop