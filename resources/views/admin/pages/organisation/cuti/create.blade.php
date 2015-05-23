@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		@if($data['id'])
			<form class="form" role="form" action="{{route('hr.workleaves.update', $data['id'])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.workleaves.store')}}" method="post">
		@endif
			<!-- END DEFAULT FORM ITEMS -->
			<div class="card-head style-primary">
				<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
					<li class="active"><a>TAMBAH CUTI</a></li>
				</ul>
			</div><!--end .card-head -->		
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body tab-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="name" name="name" value="{{$data['name']}}">
									<label for="name">Judul</label>
								</div>
							</div><!--end .col -->
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="quota" name="quota" value="{{$data['quota']}}">
									<label for="quota">Quota Cuti</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
					</div>
				</div>
			</div>
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" href="{{ URL::previous() }}">BATAL</a>
					<button type="submit" class="btn btn-flat btn-primary">SIMPAN DATA</button>
				</div>
			</div>			
		</form>
	</div>
@stop

@section('Workleave-active')
	active
@stop
