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
			<div class="card-head style-primary">
				<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
					<li class="active"><a>CABANG</a></li>
				</ul>
			</div><!--end .card-head -->		
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body tab-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="name" name="name" value="{{$branch['name']}}">
									<label for="name">Nama Cabang</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
					</div>
				</div>
				{!!Form::hidden('org_id', $data['id'])!!}
			</div>
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" href="{{ URL::previous() }}">BATAL</a>
					<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
				</div>
			</div>			
		</form>
	</div>
@stop