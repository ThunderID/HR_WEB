@section('breadcrumb')
	<li>Home</li>
	<li>{{ucwords($data['name'])}}</li>
	<li>{{ucwords($branch['name'])}}</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		@if($branch['id'])
			<form class="form" role="form" action="{{route('hr.branches.charts.update', [$branch['id'], $chart['id']])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.branches.charts.store', [$branch['id']])}}" method="post">
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
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" id="path" name="path">
								<option value=""></option>
								@foreach($charts as $key => $value)
									<option value="{{$value['path']}}" @if($value['path'] == $chart['chart']['path']) selected @endif)>{{$value['name']}}</option>
								@endforeach
							</select>
							<label for="path">Atasan</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">	
							<input type="text" class="form-control" id="grade" name="tag" value="{{$chart['tag']}}">
							<label for="grade">Departemen</label>
						</div>				
					</div>				
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="name" name="name" value="{{$chart['name']}}">
							<label for="name">Nama</label>
						</div>
					</div>
				</div><!--end .row -->
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" id="min_employee" name="min_employee" value="{{$chart['min_employee']}}">
							<label for="min_employee">Jumlah Minimum Pegawai</label>
						</div>
					</div><!--end .col -->
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" id="ideal_employee" name="ideal_employee" value="{{$chart['ideal_employee']}}">
							<label for="ideal_employee">Jumlah Ideal Pegawai</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" id="max_employee" name="max_employee" value="{{$chart['max_employee']}}">
							<label for="max_employee">Jumlah Maksimum Pegawai</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" id="grade" name="grade" Placehoder="(Biarkan kosong untuk departemen)" value="{{$chart['grade']}}">
							<label for="grade">Grade</label>
						</div>
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