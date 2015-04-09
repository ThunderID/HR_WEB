@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row pb-10">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a href="{{route('hr.documents.create') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Create New</a>

		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form pull-right">
			{!! Form::open(['route' => null, 'class' => 'form-inline']) !!}
				<div class="form-group col-sm-9">
					<input type="text" class="form-control" name="q" style="width:100%">
					<label for="">Search</label>
				</div>
				<button class="btn btn-raised btn-default-light ink-reaction" type="submit">Search</button>
			{!! Form::close() !!}
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<header>{{$data['name']}}</header>
				</div>				
				<div class="card-body">
					<div class="row  pb-20">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">{{$data['organisation']['name']}}</label>
							</div>
						</div><!--end .col -->
					</div>

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
									<td><?php print_r($value);?></td>
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
			</div>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function () {
			$('.select2').select2();
		});
	</script>
@stop

