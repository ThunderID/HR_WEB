<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #000;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 72px;
				margin-bottom: 40px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				@foreach($data as $key => $value)
					<h1>{{$key}}</h1>
					<table width="100%">
						<thead>
							<tr>
								<th>
									Nama
								</th>
							</tr>	
						</thead>
						<tbody>
							@foreach($value as $key2 => $value2)
								<tr>
									<td>
										{{$value2['name']}}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@endforeach
			</div>
		</div>
	</body>
</html>
