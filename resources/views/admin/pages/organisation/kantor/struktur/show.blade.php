@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card-head card-head-sm style-primary">
		<div class="col-md-12 pt-5 ">
			<a href="{{route('hr.organisation.branches.show', $data['branch']['id'])}}" class="btn btn-flat ink-reaction pull-left">
				<i class="md md-reply"></i> Kembali
			</a>
		</div>
	</div>
	<div class="card tabs-left style-default-light">
		<div class="card-body tab-content style-default-bright">
			<div class="row">
				<div class="col-sm-3">
					<div class="alert alert-callout alert-danger no-margin">
						<strong class="pull-right text-danger text-lg">{{ ($data['min_employee']%($data['ideal_employee'])/$data['ideal_employee'])*100 }}%</strong>
						<strong class="text-xl">{{ $data['min_employee'] }}</strong><br/>
						<span class="opacity-50">Min. Karyawan</span>
						<div class="stick-bottom-left-right">
							<div class="progress progress-hairline no-margin">
								<div class="progress-bar progress-bar-danger" style="width:{{ ($data['min_employee']%($data['ideal_employee'])/$data['ideal_employee'])*100 }}%"></div>
							</div>
						</div>
					</div>
				</div><!--end .card -->
				<div class="col-sm-3">
					<div class="alert alert-callout alert-success no-margin">
						<strong class="pull-right text-success text-lg">{{ 100 }}%</strong>
						<strong class="text-xl">{{ $data['ideal_employee'] }}</strong><br/>
						<span class="opacity-50">Ideal Karyawan</span>
						<div class="stick-bottom-left-right">
							<div class="progress progress-hairline no-margin">
								<div class="progress-bar progress-bar-success" style="width:{{ 100 }}%"></div>
							</div>
						</div>
					</div>
				</div><!--end .card -->
				<div class="col-sm-3">
					<div class="alert alert-callout alert-warning no-margin">
						<strong class="pull-right text-warning text-lg">{{ ($data['max_employee']%($data['ideal_employee'])/$data['ideal_employee'])*100 }}%</strong>
						<strong class="text-xl">{{ $data['max_employee'] }}</strong><br/>
						<span class="opacity-50">Max. Karyawan</span>
						<div class="stick-bottom-left-right">
							<div class="progress progress-hairline no-margin">
								<div class="progress-bar progress-bar-warning" style="width:{{ ($data['max_employee']%($data['ideal_employee'])/$data['ideal_employee'])*100 }}%"></div>
							</div>
						</div>
					</div>
				</div><!--end .card -->
				<div class="col-sm-3">
					<div class="alert alert-callout alert-info no-margin">
						<strong class="pull-right text-info text-lg">{{ ($data['current_employee']%($data['ideal_employee'])/$data['ideal_employee'])*100}}%</strong>
						<strong class="text-xl">{{ $data['current_employee'] }}</strong><br/>
						<span class="opacity-50">Karyawan Sekarang</span>
						<div class="stick-bottom-left-right">
							<div class="progress progress-hairline no-margin">
								<div class="progress-bar progress-bar-info" style="width:{{ ($data['current_employee']%($data['ideal_employee'])/$data['ideal_employee'])*100 }}%"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
			<h3 class="text-light">AKSES</h3>
			<form class="form" role="form" action="{{route('hr.organisation.charts.store', $data['branch']['id'])}}" method="post">
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
								@foreach($data['applications'] as $key => $value)
									<tr class="row">
										<td class="col-sm-4">{{$value['name']}}</td>
										<td class="col-sm-4">{{$value['menu']}}</td>
										<td class="col-sm-1"> <label class="checkbox-inline checkbox-styled checkbox-info">{!!Form::checkbox('is_create['.$key.']', 'value', $value['pivot']['is_create'])!!}</label></td>
										<td class="col-sm-1"> <label class="checkbox-inline checkbox-styled checkbox-info">{!!Form::checkbox('is_read['.$key.']', 'value', $value['pivot']['is_read'])!!}</label></td>
										<td class="col-sm-1"> <label class="checkbox-inline checkbox-styled checkbox-info">{!!Form::checkbox('is_update['.$key.']', 'value', $value['pivot']['is_update'])!!}</label></td>
										<td class="col-sm-1"> <label class="checkbox-inline checkbox-styled checkbox-info">{!!Form::checkbox('is_delete['.$key.']', 'value', $value['pivot']['is_delete'])!!}</label></td>
										{!!Form::input('hidden', 'application_id['.$key.']', $value['pivot']['application_id'])!!}
										{!!Form::input('hidden', 'id['.$key.']', $value['pivot']['id'])!!}
									</tr>
								@endforeach
							<tbody>
						</table>
						{!!Form::input('hidden', 'chart_id', $data['id'])!!}
					</div>
				</div>
				<div class="clearfix">&nbsp;</div>
				<!-- BEGIN FORM FOOTER -->
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<a class="btn btn-flat" href="{{route('hr.organisation.branches.show', $data['branch']['id'])}}">BATAL</a>
						<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
					</div><!--end .card-actionbar-row -->
				</div><!--end .card-actionbar -->
			</form>
		</div>
	</div><!--end .col -->
@stop
