@if ($paginator)
	<div class='row'>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			Menampilkan {{$paginator->from_page}} sampai {{$paginator->to_page}} dari {{$paginator->total_item}}
			@if(isset($route))
				<p>{!! $paginator->links(Route::currentRouteName(), $route) !!}</p>
			@else
				<p>{!! $paginator->links(Route::currentRouteName(), Input::all()) !!}</p>
			@endif
		</div>
	</div>
@endif