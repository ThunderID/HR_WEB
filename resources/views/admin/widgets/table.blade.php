<?php $title = str_replace('_', ' ', $title); ?>
<?php print_r($data['data'][0]); ?>
@if (str_is('*employee*', strtolower($title)))
	<div class="col-md-6 col-sm-6">
		<div class="card">
			<div class="card-head">
				<header class="mt-10">{{ ucwords($title) }}</header>
			</div><!--end .card-head -->
			<div class="card-body no-padding">
				<table class="table">
					<thead>
						<tr>
							@foreach($data['data'][0] as $f => $value)

								<th>{{ $f }}</th>		
							@endforeach
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
@else
	<div class="col-md-6 col-sm-6">
		<div class="card">
			<div class="card-head">
				<header class="mt-10">{{ ucwords($title) }}</header>
			</div><!--end .card-head -->
			<div class="card-body no-padding">
				<table class="table">
					<thead>
						<tr>
							@foreach($data['data'] as $f => $value)
								<th>{{ $f }}</th>					
							@endforeach
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
@endif