@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row pb-10">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a href="{{route('hr.organisations.create') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Tambah</a>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form pull-right">
			{!! Form::open(['route' => 'hr.organisations.index', 'class' => 'form-inline', 'method' => 'get']) !!}
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
					<table class="table no-margin">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Organisasi</th>
								<th colspan="3"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $key => $value)
							<tr>
								<td>
									{{$value['id']}}
								</td>
								<td>
									{{$value['name']}}
								</td>
								<td>
									<a href="{{ route('hr.organisations.delete', [$value['id']]) }}">
										Hapus
									</a>
								</td>
								<td>
									<a href="{{ route('hr.organisations.edit', [$value['id']]) }}">
										Edit
									</a>
								</td>
								<td>
									<a href="{{ route('hr.organisations.show', [$value['id']]) }}">
										Detail
									</a>
								</td>
							</tr>	
							@endforeach					
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	
	@if(count($data))
		@include('admin.helpers.pagination')
	@else
		<div class="row">
			<div class="col-sm-12 text-center">
				<p>Tidak ada data</p>
			</div>
		</div>
	@endif
@stop


