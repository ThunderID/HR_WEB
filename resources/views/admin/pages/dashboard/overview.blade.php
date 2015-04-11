@section('content')
	<div class="row">
		<div class="col-sm-12 text-right mb-20">
			<a href="" class="btn btn-floating-action btn-primary">
				<i class="fa fa-plus"></i>
			</a>
		</div>
	</div>
	<div class="row">
		<?php $color = ['warning', 'danger', 'success', 'info']; $x= 0;?>
		@foreach ($dashboard as $key => $db)
			@if ($db == 'stats')
				<?php 
					$data['number'] = 30; 
					$data['title'] = ucwords($key); 
					$data['style'] = $color[$x];
					$x++;
				?>
			@else
				<?php $data['field'] = 30; $data['row'] = $key; ?>
			@endif 
			
			@if ($key == 'new_person')
				@include('admin.widgets.'.$db, ['title'	=> $key, 
												'mode' 	=> '', 
												'route' => '',
												'mode'  => 'person',
											$data])
			@else
				@include('admin.widgets.'.$db, ['title' => $key, 
												'mode' => '', 
												'route' => '', 
											$data])
			@endif
		@endforeach
	</div>
@stop