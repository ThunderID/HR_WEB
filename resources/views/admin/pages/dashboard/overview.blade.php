@section('content')
	<div class="row">
		@for($i=0; $i<2; $i++)
			@include('admin.widgets.panel_list', [
					'mode'	=> 'person',
					'title'	=> 1,
					'route'	=> '',
					'data'	=> ['field' => '', 'row' => '']
					
			])
		@endfor
	</div>
@stop