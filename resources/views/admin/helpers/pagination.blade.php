@if ($paginator)
	<div class='row'>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			Displaying {{$paginator->from_page}} to {{$paginator->to_page}} of {{$paginator->total_item}}
			@if(isset($route))
				<p>{!! $paginator->links(Route::currentRouteName(), $route) !!}</p>
			@else
				<p>{!! $paginator->links(Route::currentRouteName(), Input::all()) !!}</p>
			@endif
		</div>
	</div>
@endif