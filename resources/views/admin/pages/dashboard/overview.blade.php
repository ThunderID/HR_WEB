@section('content')
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