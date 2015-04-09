<?php
	/*
		-------- GUIDE --------
		$title 	 			= title widgets
		$data['content'] 	= data widgets
		$data['component']	= content component
	 */
?>
@if ($mode == 'person')
	<div class="col-md-6">
		<div class="card ">
			<div class="card-head">
				<header>{{ $title }}</header>
			</div><!--end .card-head -->
			<div class="card-body no-padding height-9 scroll">
				<ul class="list divider-full-bleed">
					<li class="tile">
						<div class="tile-content">
							<div class="tile-icon">
								<img src="{{url('images/male.png')}}" alt="" />
							</div>
							<div class="tile-text">
								<a class="btn-link" href="{{ $route }}">
									{{ $data['field'] }}
								</a>
								<small>{{ $data['row'] }}</small>
							</div>
						</div>
					</li>
				</ul>
			</div><!--end .card-body -->
		</div><!--end .card -->
	</div><!--end .col -->
@else
	<div class="col-md-6">
		<div class="card ">
			<div class="card-head">
				<header>{{ $title }}</header>
			</div><!--end .card-head -->
			<div class="card-body no-padding height-9 scroll">
				<ul class="list divider-full-bleed">
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
				</ul>
			</div><!--end .card-body -->
		</div><!--end .card -->
	</div><!--end .col -->
@endif