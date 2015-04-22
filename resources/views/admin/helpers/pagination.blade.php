@if ($paginator)
	<div class="clearfix">&nbsp;</div>
	<div class='row'>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			Menampilkan {{$paginator->from_page}} - {{$paginator->to_page}}
		</div>
	</div>
	<div class='row'>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			@if(isset($route))
				{!! $paginator->links(Route::currentRouteName(), $route) !!}
			@else
				{!! $paginator->links(Route::currentRouteName(), Input::all()) !!}
			@endif
		</div>
	</div>
@endif