@foreach (['alert_success', 'alert_warning', 'alert_danger', 'alert_info'] as $alert)
	@if (Session::has($alert))
		<div class='alert {{str_replace("alert_", "style-", $alert)}}'>
			@if (is_array(Session::get($alert)))
				@foreach (Session::get($alert) as $message)
					<div class="row">
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center">
							@if ($alert == 'alert_danger')
								<i class="fa fa-exclamation-circle" style="font-size:60px"></i>
							@elseif ($alert == 'alert_warning')
								<i class="fa fa-warning" style="font-size:60px"></i>
							@elseif ($alert == 'alert_info')
								<i class="fa fa-info-circle" style="font-size:60px"></i>
							@else
								<i class="fa fa-check-circle" style="font-size:60px"></i>
							@endif
						</div>
						<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
							<p>{{$message}}</p>
						</div>
					</div>
				@endforeach
			@else
				<div class="row">
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center">
						@if (Session::get($alert) == 'alert_danger')
							<i class="fa fa-exclamation-circle" style="font-size:60px"></i>
						@elseif (Session::get($alert) == 'alert_warning')
							<i class="fa fa-warning" style="font-size:60px"></i>
						@elseif (Session::get($alert) == 'alert_info')
							<i class="fa fa-info-circle" style="font-size:60px"></i>
						@else
							<i class="fa fa-check-circle" style="font-size:60px"></i>
						@endif
					</div>
					<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
						<p>{{ Session::get($alert) }}</p>
					</div>
				</div>
			@endif
		</div>
	@endif
@endforeach

@if (isset($errors) && $errors->count())
	<div class='alert style-danger'>
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center">
				<i class="fa fa-exclamation-circle" style="font-size:60px"></i>
			</div>
			<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
				@foreach ($errors->all('<p>:message</p>') as $error)
					{!! $error !!}
				@endforeach
			</div>
		</div>
	</div>
@endif