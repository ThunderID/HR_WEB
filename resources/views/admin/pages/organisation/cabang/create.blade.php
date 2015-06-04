@section('breadcrumb')
	<li>Home</li>
	<li>{{ucwords($data['name'])}}</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		@if($branch['id'])
			<form class="form" role="form" action="{{route('hr.organisation.branches.update', $branch['id'])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.organisation.branches.store')}}" method="post">
		@endif
			<!-- END DEFAULT FORM ITEMS -->
			<div class="card-head card-head-sm style-primary">
				<div class="col-xs-12 pt-5">
					<a href="{{route('hr.organisation.branches.index', ['page' => 1,'org_id' => $data['id']])}}" class="btn btn-flat ink-reaction pull-left">
						<i class="md md-reply"></i>&nbsp;Kembali
					</a>
				</div>
			</div><!--end .card-head -->		
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-tiles">
				<div class = "col-md-12 hbox-md">
					@include('admin.filters.organisation')
				
					<div class="hbox-column col-md-10" id="sidebar_mid">
						<div class="row">
							<div class="col-md-12">
								<h1 class="text-light no-margin">{{$data['name']}}</h1>
								&nbsp;&nbsp;
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 mtm-20">
								<h3 class="text-light">Tambah Cabang</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="name" name="name" value="{{$branch['name']}}">
									<label for="name">Nama Cabang</label>
								</div>
							</div>
						</div>
						<div class="row mt-20">
							<div class="col-md-12">
								<div class="text-right">
									<a class="btn btn-flat" href="{{ URL::previous() }}">BATAL</a>
									<button type="submit" class="btn btn-flat btn-primary">SIMPAN DATA</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
@stop