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
					@foreach($data['field'] as $value)
						<li class="tile">
							<div class="tile-content">
								<div class="tile-icon">
									@if($value['gender'] == 'male') 
										<img src="{{url('images/male.png')}}" alt="" />
									@else
										<img src="{{url('images/female.png')}}" alt="" />
									@endif
								</div>
								<div class="tile-text">
									<a class="btn-link" href="{{ $route }}">
										{{ $value['first_name']. ' '. $value['middle_name'] . ' ' . $value['last_name'] }}
									</a>
									
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
					@foreach($branches as $value2)
						<li class="tile">
							<div class="tile-content">
								<div class="tile-icon pt-0">
									<i class="fa fa-building fa-lg pb-10"></i>
								</div>
								<div class="tile-text">
									<a class="btn-link" href="{{ $route }}">
										{{ $value2['name'] }}
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