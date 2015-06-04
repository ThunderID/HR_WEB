<html> 
<body> 	
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th colspan="12">
					Reports Aktivitas {{$person['name']}} ({{date('d-m-Y', strtotime($start))}} s/d {{date('d-m-Y', strtotime($end))}})
				</th>
			</tr>
			<tr>
				<th rowspan="2" style="text-align:center; vertical-align:middle">No</th>
				<th rowspan="2" style="vertical-align:middle">Nama</th>
				<th rowspan="2" style="text-align:center; vertical-align:middle">Tanggal</th>
				<th colspan="2" style="text-align:center; height:18px">In</th>
				<th colspan="2" style="text-align:center; height:18px">Out</th>
				<th rowspan="2" style="text-align:center; vertical-align:middle">Total Idle</th>
				<th rowspan="2" style="text-align:center; vertical-align:middle">Total Sleep</th>
				<th rowspan="2" style="text-align:center; vertical-align:middle">Total Active</th>               
				@if($case && $case!='ontime')
					<th rowspan="2" style="text-align:center; vertical-align:middle"> {{ ucwords($case) }} <br/> (Hi - Lo) </th>
				@else
					<th rowspan="2" style="text-align:center;vertical-align:middle;font-weight:700">Go In</th>
					<th rowspan="2" style="text-align:center;vertical-align:middle;font-weight:700">Go Out</th>
				@endif
			</tr>
			<tr>				
				<th></th>
				<th></th>
				<th></th>
				<th style="text-align:center; height:18px">FP</th>
				<th style="text-align:center; height:18px">TR</th>
				<th style="text-align:center; height:18px">FP</th>
				<th style="text-align:center; height:18px">TR</th>
			</tr>
		</thead>
		<tbody>			
			@foreach($data as $key => $value)
				<tr style="height:15px;">
					<td style="text-align:center; vertical-align:top">{{ $key+1 }}</td>
					<td style="vertical-align:top">
						{{$person['name']}}
					</td>
					<td style="text-align:center">						
						{{ date('Y-m-d', strtotime($value['on'])) }}							
					</td>	
					<td style="text-align:center">
						{{ date("H:i:s", strtotime($value['fp_start'])) }}
					</td>
					<td style="text-align:center">
						{{ date("H:i:s", strtotime($value['start'])) }}
					</td>
					<td style="text-align:center">
						{{ date("H:i:s", strtotime($value['fp_end'])) }}
					</td>
					<td style="text-align:center">
						{{ date("H:i:s", strtotime($value['end'])) }}
					</td>
					<td style="text-align:center">
						{{ gmdate("H:i:s", $value['total_idle']) }}
					</td>
					<td style="text-align:center">
						{{ gmdate("H:i:s", $value['total_sleep']) }}
					</td>
					<td style="text-align:center">
						{{ gmdate("H:i:s", $value['total_active']) }}
					</td>					
					@if($case && $case!='ontime')
						<td style="text-align:center">
							<?php 
								switch ($case) 
								{
									case 'late':
										$margin = 0 - ($value['margin_start']);
										break;
									case 'ontime':
										$margin = null;
										break;
									case 'earlier':
										$margin = 0 - ($value['margin_end']);
										break;
									case 'overtime':
										$margin = ($value['margin_end']);
										break;
									default:
										$margin = null;
										break;
								}
							?>
							{{ gmdate("H:i:s", $margin) }}
						</td>
					@else
						@foreach($value['notes'] as $key2 => $value2)
							<td style="text-align:center">
								{{ $value2 }}
							</td>
						@endforeach
					@endif					
				</tr>
			@endforeach 
		</tbody>
	</table> 
</body> 
</html>