@section('content')
	<div class="row">
		@for($i=0; $i<2; $i++)
			@include('admin.widgets.panel_list', [
					'mode'	=> 'person',
					'title'	=> $count,
					'route'	=> '',
					'data'	=> ['field' => '', 'row' => '']
					
			])
		@endfor
	</div>
@stop