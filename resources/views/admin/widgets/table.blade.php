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