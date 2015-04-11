<?php
	/*
		-------- GUIDE --------
		$title 	 			= title widgets
		$data['content'] 	= data widgets
		$data['component']	= content component
	 */
?>
<?php $title = str_replace('_', ' ', $title); ?>
@if ($mode == 'person')
	<div class="col-md-6">
		<div class="card ">
			<div class="card-head">
				<header class="mt-10">{{ ucwords($title) }}</header>
			</div><!--end .card-head -->
			<div class="card-body no-padding height-9 scroll">
				<ul class="list divider-full-bleed">
					@foreach($person as $value)
						<li class="tile">
							<div class="tile-content">
								<div class="tile-icon">
									<img src="{{url('images/male.png')}}" alt="" />
								</div>
								<div class="tile-text">
									<a class="btn-link" href="{{ $route }}">
										{{ $value['first_name'] .' '. $value['middle_name'] . ' ' . $value['last_name'] }}
									</a>
									<small>{{ $data['row'] }}</small>
								</div>
							</div>
						</li>
					@endforeach
				</ul>
			</div><!--end .card-body -->
		</div><!--end .card -->
	</div><!--end .col -->
@else
	<div class="col-md-6">
		<div class="card ">
			<div class="card-head">
				<header class="mt-10">{{ ucwords($title) }}</header>
			</div><!--end .card-head -->
			<div class="card-body no-padding height-9 scroll">
				<ul class="list divider-full-bleed">
					@foreach($person as $value)
						<li class="tile">
							<div class="tile-content">
								<div class="tile-icon pt-0">
									<i class="fa fa-envelope-o fa-lg pb-10"></i>
								</div>
								<div class="tile-text">
									<a class="btn-link" href="{{ $route }}">
										{{ $data['field'] }}
									</a>
								</div>
							</div>
						</li>
					@endforeach
				</ul>
			</div><!--end .card-body -->
		</div><!--end .card -->
	</div><!--end .col -->
@endif