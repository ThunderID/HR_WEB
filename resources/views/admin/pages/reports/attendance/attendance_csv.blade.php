<html> 
<body> 	
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th rowspan="2" style="text-align:center; vertical-align:middle">No</th>
				<th rowspan="2" style="vertical-align:middle">Nama</th>
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
					<th rowspan="2"> </th>
				@endif
			</tr>
			<tr>
				<th></th>
				<th></th>
				<th style="text-align:center; height:18px">FP</th>
				<th style="text-align:center; height:18px">TR</th>
				<th style="text-align:center; height:18px">FP</th>
				<th style="text-align:center; height:18px">TR</th>
			</tr>
		</thead>
		<tbody>			
			<?php $prev = 0;?>
			@foreach($data as $key => $value)
				<tr style="height:15px">
					<td style="text-align:center">{{ $key+1 }}.</td>
					<td>
						{{ $value['name'] }}
					</td>
					<td style="text-align:center">
						{{ gmdate("H:i:s", $value['avg_fp_start']) }}
					</td>
					<td style="text-align:center">
						{{ gmdate("H:i:s", $value['avg_start']) }}
					</td>
					<td style="text-align:center">
						{{ gmdate("H:i:s", $value['avg_fp_end']) }}
					</td>
					<td style="text-align:center">
						{{ gmdate("H:i:s", $value['avg_end']) }}
					</td>
					<td style="text-align:center">
						{{ gmdate("H:i:s", $value['avg_idle']) }}
					</td>
					<td style="text-align:center">
						{{ gmdate("H:i:s", $value['avg_sleep']) }}
					</td>
					<td style="text-align:center">
						{{ gmdate("H:i:s", $value['avg_active']) }}
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
						@foreach($value['log_notes'] as $key2 => $value2)
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