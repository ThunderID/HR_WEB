@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="row pb-10">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a href="{{route('hr.documents.create') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Tambah</a>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form pull-right">
			{!! Form::open(['route' => 'hr.documents.index', 'method' => 'get']) !!}
				<div class="form-group col-sm-9">
					<input type="text" class="form-control" name="q" style="width:100%">
					<label for="">Cari</label>
				</div>
				<button class="btn btn-raised btn-default-light ink-reaction" type="submit">Cari</button>
			{!! Form::close() !!}
		</div>
		
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					@if(count($data))			
						<table class="table no-margin">
							<thead>
								<tr>
									<th>No</th>
									<th>Jenis Dokumen</th>
									<th>Jumlah</th>
									<th colspan="2"></th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $key => $value)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$value['name']}}</td>
										<td>{{count($value['persons'])}}</td>
										<td>
											<a href="{{route('hr.documents.edit', $value['id']) }}">
												Edit
											</a>
										</td>
										<td>
											<a href="{{route('hr.documents.show', $value['id']) }}">
												Detail
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div class="clearfix">&nbsp;</div>
						@include('admin.helpers.pagination')
						@else
						<div class="row">
							<div class="col-sm-12 text-center">
								<p>Tidak ada data</p>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@stop