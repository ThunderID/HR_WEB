@section('breadcrumb')
	<li>Home</li>
	<li>{{ucwords($data['name'])}}</li>
	<li>{{ucwords($branch['name'])}}</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		@if($api['id'])
			<form class="form" role="form" action="{{route('hr.branches.apis.update', ['branch_id' => $branch['id'], 'id' => $api['id'], 'org_id' => $data['id']])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.branches.apis.store', [$branch['id'], 'org_id' => $data['id']])}}" method="post">
		@endif
			<!-- END DEFAULT FORM ITEMS -->
			<div class="card-head style-primary">
				<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
					<li class="active"><a>API</a></li>
				</ul>
			</div><!--end .card-head -->		
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body tab-content">
				<div class="form-group">
					<input type="text" class="form-control input-lg" id="client" name="client" value="{{$api['client']}}">
					<label for="client">Client</label>
				</div>
					
				<div class="form-group">
					<input type="password" class="form-control" id="secret" name="secret" value="">
					<label for="secret">Secret</label>
				</div>
				{!!Form::hidden('org_id', $data['id'])!!}
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