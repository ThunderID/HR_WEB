<div class="col-md-6 col-sm-6">
	<div class="card">
		<div class="card-head">
			<header class="mt-10">{{ ucwords($title) }}</header>
		</div><!--end .card-head -->
		<div class="card-body no-padding">
			<table class="table {{ $style }}">
				<thead>
					<tr>
						@foreach($field as $f)
							<th>{{ $f }}</th>					
						@endforeach
					</tr>
				</thead>
				<tbody>
					@foreach($row as $val)
						<tr>
							@foreach($val as $val2)
								<td><a class="btn-link" href="{{ $route }}">{{ $val2 }}</a></td>
							@endforeach
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>