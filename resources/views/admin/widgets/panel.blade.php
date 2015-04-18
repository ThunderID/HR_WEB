<?php
	/*
		-------- GUIDE --------
		$title 	 			= title widgets
		$data['content'] 	= data widgets
		$data['component']	= content component
	 */
?>
<?php $title = str_replace('_', ' ', $title); ?>
@if (str_is('*employee*', strtolower($title)))
	<div class="col-md-6">
		<div class="card card-widget">
			<div class="card-head">
				<header class="mt-10">{{ ucwords($title) }}</header>
				<div class="tools" style="padding-right:0">
					<div class="btn-group mt-5 hide">
						<a href="{{ route('hr.persons.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="lihat data semua"><i class="md md-visibility"></i></a>
						<a href="{{ route('hr.persons.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="ubah widget"><i class="md md-settings"></i></a>
						<a href="{{ route('hr.persons.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="hapus widget"><i class="md md-delete"></i></a>
					</div>
				</div>
			</div><!--end .card-head -->
			<div class="card-body no-padding height-9 scroll">
				<ul class="list divider-full-bleed">
					@foreach($data['data'] as $value)
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
									<a class="btn-link" href="{{ route('hr.persons.show', [$value['id']]) }}">
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
		<div class="card card-widget">
			<div class="card-head">
				<header class="mt-10">{{ ucwords($title) }}</header>
				<div class="tools" style="padding-right:0">
					<div class="btn-group mt-5 hide">
						<a href="{{ route('hr.organisation.branches.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="lihat data semua"><i class="md md-visibility"></i></a>
						<a href="{{ route('hr.organisation.branches.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="ubah widget"><i class="md md-settings"></i></a>
						<a href="{{ route('hr.organisation.branches.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="hapus widget"><i class="md md-delete"></i></a>
					</div>
				</div>
			</div><!--end .card-head -->
			<div class="card-body no-padding height-9 scroll">
				<ul class="list divider-full-bleed">
					@foreach($data['data'] as $value)
						<li class="tile">
							<div class="tile-content">
								<div class="tile-icon pt-0">
									<i class="fa fa-building fa-lg pb-10"></i>
								</div>
								<div class="tile-text">
									<a class="btn-link" href="{{ route('hr.organisation.branches.show', [$value['id']]) }}">
										{{ $value['name'] }}
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