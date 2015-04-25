@extends('admin.pages.organisation.kantor.show')
@section('kantor.show')
<ul class="nav nav-tabs" data-toggle="tabs">
	<li class="active"><a href="#details">{{$chart['name']}}</a></li>
	<li><a href="#stats">Stats</a></li>
	<li><a href="#access">Akses</a></li>
</ul>
<div class="tab-content">
	<div class="tab-pane active" id="details">
		<div class="clearfix">&nbsp;</div>
		@if($chart['id'])
			<form class="form" role="form" action="{{route('hr.organisation.charts.update', [$data['id'], $chart['id']])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.organisation.charts.store', [$data['id']])}}" method="post">
		@endif
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<select class="form-control" id="path" name="path" value="{{$chart['chart']['path']}}">
							@foreach($charts as $key => $value)
								<option @if($value['path']==$chart['chart']['path']) selected @endif value="{{$value['path']}}">{{$value['name']}}</option>
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
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="min_employee" name="min_employee" value="{{$chart['min_employee']}}">
						<label for="min_employee">Jumlah Minimum Pegawai</label>
					</div>
				</div><!--end .col -->
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="ideal_employee" name="ideal_employee" value="{{$chart['ideal_employee']}}">
						<label for="ideal_employee">Jumlah Ideal Pegawai</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="max_employee" name="max_employee" value="{{$chart['max_employee']}}">
						<label for="max_employee">Jumlah Maksimum Pegawai</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="grade" name="grade" value="{{$chart['grade']}}" Placehoder="(Biarkan kosong untuk departemen)">
						<label for="grade">Grade</label>
					</div>
				</div>
			</div>
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" href="{{route('hr.organisation.branches.index')}}">BATAL</a>
					<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->				
		</form>
	</div>
	<div class="tab-pane" id="stats">
		<div class="clearfix">&nbsp;</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="alert alert-callout alert-danger no-margin">
					<strong class="pull-right text-danger text-lg">{{ ($chart['min_employee']%($chart['ideal_employee'])/$chart['ideal_employee'])*100 }}%</strong>
					<strong class="text-xl">{{ $chart['min_employee'] }}</strong><br/>
					<span class="opacity-50">Min. Karyawan</span>
					<div class="stick-bottom-left-right">
						<div class="progress progress-hairline no-margin">
							<div class="progress-bar progress-bar-danger" style="width:{{ ($chart['min_employee']%($chart['ideal_employee'])/$chart['ideal_employee'])*100 }}%"></div>
						</div>
					</div>
				</div>
			</div><!--end .card -->
			<div class="col-sm-6">
				<div class="alert alert-callout alert-success no-margin">
					<strong class="pull-right text-success text-lg">{{ 100 }}%</strong>
					<strong class="text-xl">{{ $chart['ideal_employee'] }}</strong><br/>
					<span class="opacity-50">Ideal Karyawan</span>
					<div class="stick-bottom-left-right">
						<div class="progress progress-hairline no-margin">
							<div class="progress-bar progress-bar-success" style="width:{{ 100 }}%"></div>
						</div>
					</div>
				</div>
			</div><!--end .card -->
		</div><!--end .card -->
		<div class="clearfix">&nbsp;</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="alert alert-callout alert-warning no-margin">
					<strong class="pull-right text-warning text-lg">{{ ($chart['max_employee']%($chart['ideal_employee'])/$chart['ideal_employee'])*100 }}%</strong>
					<strong class="text-xl">{{ $chart['max_employee'] }}</strong><br/>
					<span class="opacity-50">Max. Karyawan</span>
					<div class="stick-bottom-left-right">
						<div class="progress progress-hairline no-margin">
							<div class="progress-bar progress-bar-warning" style="width:{{ ($chart['max_employee']%($chart['ideal_employee'])/$chart['ideal_employee'])*100 }}%"></div>
						</div>
					</div>
				</div>
			</div><!--end .card -->
			<div class="col-sm-6">
				<div class="alert alert-callout alert-info no-margin">
					<strong class="pull-right text-info text-lg">{{ ($chart['current_employee']%($chart['ideal_employee'])/$chart['ideal_employee'])*100}}%</strong>
					<strong class="text-xl">{{ $chart['current_employee'] }}</strong><br/>
					<span class="opacity-50">Karyawan Sekarang</span>
					<div class="stick-bottom-left-right">
						<div class="progress progress-hairline no-margin">
							<div class="progress-bar progress-bar-info" style="width:{{ ($chart['current_employee']%($chart['ideal_employee'])/$chart['ideal_employee'])*100 }}%"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="access">
		<div class="clearfix">&nbsp;</div>
		<form class="form" role="form" action="{{route('hr.organisation.charts.update', [$chart['branch']['id'], $chart['id']])}}" method="post">
			<div class="row">
				<div class="col-sm-12">
					<table class="table no-margin">
						<thead>
							<tr class="row">
								<th class="col-sm-4">
									Perangkat
								</th>
								<th class="col-sm-4">
									Menu
								</th class="col-sm-1">
								<th>
									C
								</th>
								<th class="col-sm-1">
									R
								</th>
								<th class="col-sm-1">
									U
								</th>
								<th class="col-sm-1">
									D
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($applications as $key => $value)
								<tr class="row">
									<td class="col-sm-4">{{$value['application']['name']}}</td>
									<td class="col-sm-4">{{$value['application']['menu']}}</td>
									<td class="col-sm-1"> <label class="checkbox-inline checkbox-styled checkbox-info">{!!Form::checkbox('is_create['.$key.']', 'value', $value['is_create'])!!}</label></td>
									<td class="col-sm-1"> <label class="checkbox-inline checkbox-styled checkbox-info">{!!Form::checkbox('is_read['.$key.']', 'value', $value['is_read'])!!}</label></td>
									<td class="col-sm-1"> <label class="checkbox-inline checkbox-styled checkbox-info">{!!Form::checkbox('is_update['.$key.']', 'value', $value['is_update'])!!}</label></td>
									<td class="col-sm-1"> <label class="checkbox-inline checkbox-styled checkbox-info">{!!Form::checkbox('is_delete['.$key.']', 'value', $value['is_delete'])!!}</label></td>
									{!!Form::input('hidden', 'application_id['.$key.']', $value['application_id'])!!}
									{!!Form::input('hidden', 'id['.$key.']', $value['id'])!!}
								</tr>
							@endforeach
						<tbody>
					</table>
					{!!Form::input('hidden', 'chart_id', $chart['id'])!!}
				</div>
			</div>
			@if(count($applications))
				@include('admin.helpers.pagination')
			@endif
			<div class="clearfix">&nbsp;</div>
			<!-- BEGIN FORM FOOTER -->
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" href="{{route('hr.organisation.branches.show', $chart['branch']['id'])}}">BATAL</a>
					<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
		</form>
	</div>
</div>
<!-- END MIDDLE -->
@stop

@section('js')
	<script type="text/javascript">
		window.onload=col_justify('sidebar_left','sidebar_mid','sidebar_right');	
	</script>
@stop