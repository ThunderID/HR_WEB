@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<br>
			<a href='' class='btn btn-primary btn-raised ink-reaction'>Create</a>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form">

		</div>
	</div>

	<div class='card'>
		<div class='card-body'>
			<table class="table table-responsive no-margin">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>N I K</th>
						<th>Contact Person</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@if ($data->count())
						<?php $i = -1; ?>
						@foreach ($data as $it => $x)
							<tr>
								<td>{{$it+1}}</td>
								<td>{{$x->first_name.' '.$x->middle_name.' '.$x->last_name}}</td>
								<td>{{$x->nik}}</td>
								<td>{{$x->mobile_phone_number_1}}</td>
								<td class='text-center'>
									<a href='' class='btn btn-flat  btn-primary'>Edit</a>
									<a href='' class='btn btn-flat  btn-primary'>Show</a>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan='5' class='text-center text-light text-xs'>No data found</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
		
	</div>
@stop