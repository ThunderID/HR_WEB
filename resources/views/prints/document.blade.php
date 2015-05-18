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
				<h1>{{ucwords($document['document']['name'])}}</h1>
				<h3 style="text-align:left;">
					{{strtoupper($document['document_number'])}}
				</h3>
				<h3 style="text-align:right;">
					{{date('Y-m-d',strtotime($document['created_at']))}}
				</h3>
				<p>
					{!!$template!!}
				</p>
			</div>
		</div>
	</body>
</html>
