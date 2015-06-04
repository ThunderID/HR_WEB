<html>
<body>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th colspan="@if($cs==0) {{$cs+6}} @else {{$cs+7}} @endif">
					Reports Aktivitas ({{date('d-m-Y', strtotime($start))}} s/d {{date('d-m-Y', strtotime($end))}})
				</th>
			</tr>
			<tr style="height:32px">
				<th rowspan="2" style="text-align:center;vertical-align:middle">No </th>
				<th rowspan="2" style="vertical-align:middle">Nama</th>
				<th rowspan="2" style="text-align:center; vertical-align:middle">Hak Cuti<br> (Hari)</th>
				<th @if($cs==0) colspan="{{$cs+1}}" rowspan="2" @else colspan="{{$cs}}" @endif style="text-align:center; vertical-align:middle">Pengurang Cuti<br> (Hari)</th>
				<th rowspan="2" style="text-align:center; vertical-align:middle">Penambah Cuti<br> (Hari)</th>
				<th rowspan="2" style="text-align:center; vertical-align:middle">Sisa Cuti<br> (Hari)</th>
				<th rowspan="2" style="text-align:center; vertical-align:middle">Faktor <br/>Pengurang <br/>Gaji</th>
			</tr>
			<tr>
				@foreach($status as $key2 => $value2)
					<th>
						{{ucwords($value2)}}
					</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
			<?php $label = ['late' => 'danger', 'overtime' => 'info', 'earlier' => 'danger', 'ontime' => 'success'];?>
			@foreach($data as $key => $value)
				<tr style="height:15px">
					<td style="text-align:center">{{ $key+1 }}</td>
					<td>
						{{$value['name']}}
					</td>
					<td style="text-align:center">
						{{$value['quota']}}
					</td>
					@foreach($status as $key2 => $value2)
						<td style="text-align:center">
							{{(isset($value['status'][$value2]) ? $value['status'][$value2] : '')}}
						</td>
					@endforeach
					<td style="text-align:center">
						@if($value['plus_quota'] != 0 )
							{{$value['plus_quota']}}
						@endif
					</td>
					<td style="text-align:center">
						{{$value['residue_quota']}}
					</td>
					<td style="text-align:center">
						@if($value['residue_quota'] < 0 )
							{{0 - $value['residue_quota']}}
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>