@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<!-- END DEFAULT FORM ITEMS -->
			<div class="card-head card-head-sm style-primary">
				<div class="col-xs-12 pt-5">
					<a href="{{route('hr.organisations.index')}}" class="btn btn-flat ink-reaction pull-left">
						<i class="md md-reply"></i>&nbsp;Kembali
					</a>
				</div>
			</div><!--end .card-head -->
		@if($data['id'])
			<form class="form" role="form" action="{{route('hr.organisations.update', [$data['id'], 'src' => Input::get('src')])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.organisations.store')}}" method="post">
		@endif
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body tab-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
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
					<a class="btn btn-flat btn-default ink-reaction" href="@if(!Input::get('src')) {{route('hr.organisations.index')}} @else {{ route('hr.organisations.show', ['organisation' => $data['id']]) }} @endif">BATAL</a>
					<button type="submit" class="btn btn-flat btn-primary ink-reaction">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
			<!-- END FORM FOOTER -->
		</form>
	</div><!--end .card -->
@stop