@extends('admin.pages.personalia.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#details">Karir</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="details">
			<br/>
			<ul class="timeline collapse-lg timeline-hairline no-shadow">
				@foreach($data['experiences'] as $key => $value)
					@if($key==0)
						<li class="timeline-inverted">
					@else
						<li>
					@endif
						<div class="timeline-circ style-accent"></div>
						<div class="timeline-entry">
							<div class="card style-default-bright">
								<div class="card-body small-padding">
									<small class="text-uppercase text-primary pull-right">{{date("F Y", strtotime($value['pivot']['start']))}} - @if($value['pivot']['end']=='0000-00-00') Present @else {{date("F Y", strtotime($value['pivot']['end']))}} @endif</small>
									<p>
										<span class="text-lg text-medium">{{$value['name']}} ({{$value['pivot']['status']}})</span><br/>
										<span class="text-lg text-light">{{$value['branch']['name']}}</span>
									</p>
									<p>
										{{$value['pivot']['reason_end_job']}}
									</p>
								</div>
							</div>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
@stop