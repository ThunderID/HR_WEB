<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link type="text/css" rel="stylesheet" href="{{ elixir('css/admin.css') }}" />
</head>
<body style="background-color:#fff">
	<div class="row p-20">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12 text-center">
					kop surat
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p class="text-uppercase text-xl"><u>{{ $data['name'] }}</u></p>
					<p class="text-lg mtm-20">Nomor: PROSEDUR-SP-I-SP-II-2462584.S.594154.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3 mt-30">
					{!! $data['template'] !!}
				</div>
			</div>
		</div>
	</div>
</body>
</html>