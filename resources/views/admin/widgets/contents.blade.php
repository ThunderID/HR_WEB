@if ($mode == 'grid')
	{{-- mode GRID --}}
@else
	{{-- mode LIST --}}
	@if (isset($toggle['avatar']))
		<div class="hbox-column width-3">
			@if($data_content['avatar']!='')
				<img class="img-circle img-responsive" alt="" src="{{url($data_content['avatar'])}}"></img>
			@else
				<img class="img-circle img-responsive" alt="" @if($data_content['gender'] =='male') src="{{url('images/male.png')}}" @else src="{{url('images/female.png')}}" @endif></img>
			@endif
		</div>
	@endif

	@if (isset($toggle['document']))
		<a href="{{ $route }}">
	@endif

	<div class="hbox-xs v-top @if (isset($class['top'])) {{ $class['top'] }} @else height-4 @endif ">

		@if (isset($toggle['document']))
			<div class="clearfix">
				<span class="fa fa-fw fa-file-o fa-2x pull-left mt-10"></span>
				<span class="pull-left">
					<span class="text-bold">{{ucwords($data_content['name'])}}</span><br>
					<span class="opacity-50"><i class = "fa fa-tags"></i> {{ucwords($data_content['tag'])}}</span><br>
					<span class="opacity-50">{{(isset($data_content['persons'][0]['count']) ? $data_content['persons'][0]['count'].' Dokumen' : '')}} </span>
				</span>
			</div>
		@else
			<div class="clearfix">
				<div class="col-lg-12 margin-bottom-lg">
					<a class="text-lg text-medium" href="{{ $route }}">{{$data_content['name']}}</a>
				</div>
			</div>
		@endif

		@if (isset($toggle['person']))
			<div class="clearfix">
				<div class="col-lg-12">
					@if(isset($data_content['works']))
						@foreach($data_content['works'] as $key2 => $value2)
							@if($key2 == 0)
								<span>{{$value2['name']}} di {{$value2['branch']['name']}}</span>
							@endif
						@endforeach
					@endif
				</div>
			</div>
		@endif

		@if (isset($toggle['branch']))
			<div class="clearfix">
				<div class="col-lg-12">
					<span>{{$value['business_activities']}}</span><br/>
					<span>{{$value['business_fields']}}</span>
				</div>
			</div>
		@endif

		@if (!isset($toggle['document']))

			@if(count($data_content['contacts']))
				@foreach($data_content['contacts'] as $key2 => $value2)
					<div class="clearfix">
						<div class="col-lg-12">

							@if($value2['item']=='phone')
								<span class="opacity-75"><span class="glyphicon glyphicon-phone text-sm"></span> {!! $value2['value'] !!}</span>
							@elseif($value2['item']=='email')
								<span class="opacity-75"><span class="glyphicon glyphicon-envelope text-sm"></span> {!! $value2['value'] !!}</span>
							@endif

						</div>
					</div>
				@endforeach

			@endif
			
		@endif
	</div>

	@if (isset($toggle['document']))
		</a>
	@endif
@endif