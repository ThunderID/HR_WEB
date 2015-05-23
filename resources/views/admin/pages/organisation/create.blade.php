@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<!-- END DEFAULT FORM ITEMS -->
			<div class="card-head style-primary">
				<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
					<li class="active"><a>ORGANISASI</a></li>
				</ul>
			</div><!--end .card-head -->
		@if($data['id'])
			<form class="form" role="form" action="{{route('hr.organisations.update', $data['id'])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.organisations.store')}}" method="post">
		@endif
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body tab-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group floating-label">
									{!! Form::text('name', $data['name'], array('class'=>'form-control input-lg', 'id' => 'name')) !!}
									<label for="name">Nama Organisasi</label>
								</div>										
							</div>
						</div><!--end .row -->
					</div><!--end .col -->
				</div><!--end .row -->
			</div><!--end .card-body -->
			
			<!-- BEGIN FORM FOOTER -->
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat btn-default ink-reaction" href="{{route('hr.organisations.index')}}">BATAL</a>
					<button type="submit" class="btn btn-flat btn-primary ink-reaction">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
			<!-- END FORM FOOTER -->
		</form>
	</div><!--end .card -->
@stop