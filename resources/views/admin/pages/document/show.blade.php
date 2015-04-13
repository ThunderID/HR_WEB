@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<div class="col-md-12 pt-5 ">
						<div class="col-md-12">
							<div class="row">
								<a href="{{route('hr.documents.index')}}" class="btn btn-flat ink-reaction pull-left">
									<i class="md md-reply"></i> Kembali
								</a>
								<a href="{{route('hr.documents.delete', [$data['id']])}}" class="btn btn-flat ink-reaction pull-right">
									<i class="fa fa-trash"></i> Hapus
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body pt-10 pb-0">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="margin-bottom-xxl row">
								<div class="col-sm-10 col-md-10 ml-20">
									<h1 class="text-light no-margin">{{$data['name']}}</h1>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- BEGIN LAYOUT LEFT SIDEBAR -->
		<div class="col-md-12">
			<div class="card tabs-left style-default-light">
				<ul class="card-head nav nav-tabs" data-toggle="tabs">
					<li><a class="oc" href="#structure">Struktur</a></li>
					<li><a class="oc" href="#person">Karyawan</a></li>
				</ul>
				<div class="card-body tab-content style-default-bright">
					<div class="tab-pane active" id="structure">
						<table class="table no-margin">
							<thead>
								<tr>
									<th>No</th>
									<th>Field</th>
									<th>Type</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['templates'] as $key => $value)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$value['field']}}</td>
										<td>{{$value['type']}}</td>
										<td>
											<a href="{{route('hr.persons.show', ['person_id' => $data['id']])}}">
												detail
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="person">
						<table class="table no-margin">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Pegawai</th>
									<th>Tanggal (Created @)</th>								
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['persons'] as $key => $value)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$value['first_name'].' '.$value['last_name']}}</td>
										<td>{{date("d F Y", strtotime($value['created_at']))}}</td>
										<td>
											<a href="{{route('hr.persons.show', ['person_id' => $data['id']])}}">
												detail
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div><!--end .card-body -->
			</div><!--end .card -->
		</div><!--end .col -->
	</div>
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function () {
			$('.select2').select2();
		});
	</script>
@stop

