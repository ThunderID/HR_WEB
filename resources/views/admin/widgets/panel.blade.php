@if (str_is('*employee*', strtolower($data['function'])))
	<div class="col-md-6">
		<div class="card card-widget">
			<div class="card-head">
				<div class="tools" style="padding-right:0; margin-bottom:-50px">
					<div class="btn-group mt-5 hide">
						<a href="{{ route('hr.persons.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="lihat data semua"><i class="md md-visibility"></i></a>
						<a href="javascript:;" data-content=" {{route('hr.dashboard.widgets.store')}}" class="btn btn-icon-toggle btn-default btn-sm edit_widget" data-toggle="tooltip" data-placement="top" data-original-title="ubah widget"><i class="md md-settings"></i></a>
						<a href="javascript:;" data-content="{{ route('hr.dashboard.widgets.delete', ['id' => $data['id']]) }}" class="btn btn-icon-toggle btn-default btn-sm del_widget" data-toggle="tooltip" data-target="#delete_widget" data-placement="top" data-original-title="hapus widget"><i class="md md-delete"></i></a>
					</div>
				</div>
				<header class="mt-30 mb-5"> @replace_delimiter($title) </header>
			</div><!--end .card-head -->
			<div class="card-body no-padding height-9 scroll">
				<ul class="list divider-full-bleed">
					@forelse($data['data'] as $value)
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
										{{ $value['name'] }}
									</a>
									
								</div>
							</div>
						</li>
					@empty
						<li class="tile">
							<div class="tile-text ml-25">
								<p class="text-sm">Tidak ada pegawai baru</p>
							</div>
						</li>
					@endforelse
				</ul>
			</div><!--end .card-body -->
		</div><!--end .card -->
	</div><!--end .col -->
@else
	<div class="col-md-6">
		<div class="card card-widget">
			<div class="card-head">
				<div class="tools" style="padding-right:0; margin-bottom:-50px">
					<div class="btn-group mt-5 hide">
						<a href="{{ route('hr.organisation.branches.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="lihat data semua"><i class="md md-visibility"></i></a>
						<a href="javascript:;" data-content=" {{route('hr.dashboard.widgets.store')}}" class="btn btn-icon-toggle btn-default btn-sm edit_widget" data-toggle="tooltip" data-placement="top" data-original-title="ubah widget"><i class="md md-settings"></i></a>
						<a href="javascript:;" data-content="{{ route('hr.dashboard.widgets.delete', ['id' => $data['id']]) }}" class="btn btn-icon-toggle btn-default btn-sm del_widget" data-toggle="tooltip" data-placement="top" data-original-title="hapus widget"><i class="md md-delete"></i></a>
					</div>
				</div>
				<header class="mt-30 mb-5"> @replace_delimiter($title) </header>
			</div><!--end .card-head -->
			<div class="card-body no-padding height-9 scroll">
				<ul class="list divider-full-bleed">
					@foreach($data['data'] as $value)
						<?php print_r($value); ?>
						<li class="tile">
							<div class="tile-content">
								<div class="tile-icon pt-0">
									<i class="fa fa-building fa-lg pb-10"></i>
								</div>
								<div class="tile-text">
									<a class="btn-link" href="{{ route('hr.organisation.branches.show', [$value['id']]) }}">
										{{ isset($value['name']) ? $value['name'] : '' }}
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