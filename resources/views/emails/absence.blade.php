<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link type="text/css" rel="stylesheet" href="{{ elixir('css/admin.css') }}" />
		<style>
			
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="card">
						<div class="card-body">
							@foreach($data as $key => $value)
								<h2 class="text-left">Absensi</h2>
								<h4 class="pull-right text-light text-default-light">Per tanggal : @date_indo($key)</h4>
								<table class="table">
									<thead>
										<tr>
											<th class="text-sm text-default-light">Nama</th>
											<th class="text-sm text-default-light text-right">Status</th>
										</tr>	
									</thead>
									<tbody>
										@foreach($value as $key2 => $value2)
											<tr>
												<td class="text-sm">{{$value2['name']}}</td>
												<td class="text-sm text-right">Hadir</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
