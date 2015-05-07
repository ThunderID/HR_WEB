@if ($mode == 'grid')
	{{-- mode GRID --}}
@elseif ($mode == 'list')
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

		@if (isset($toggle['calendar']))
			<div class="clearfix">
				<div class="col-xs-1">
					<span class="opacity-50"><i class = "fa fa-tags"></i></span>
				</div>
				<div class="col-xs-11">
					@if(isset($data_content['charts']))
						@foreach($data_content['charts'] as $key => $value)
							<span class="badge style-info text-sm opacity-75 mt-5">{{$value['name']}} - {{$value['branch']['name']}}</span>
						@endforeach
					@endif
				</div>
			</div>
		@endif

		@if (isset($toggle['branch']))
			<div class="clearfix">
				<div class="col-lg-12">
				</div>
			</div>
		@endif

		@if (!isset($toggle['document']))

			@if(isset($data_content['contacts'])&&count($data_content['contacts']))
				<ul class="fa-ul" style="padding-left:5px;">
					@foreach($data_content['contacts'] as $key2 => $value2)
						@if($value2['item']=='phone')
							<li class="opacity-75"><i class="fa-li fa fa-mobile-phone fa-lg" style="margin-top:2px"></i> {!! $value2['value'] !!}</li>
						@elseif($value2['item']=='email')
							<li class="opacity-75"><i class="fa-li fa fa-envelope" style="margin-top:2px"></i> {!! $value2['value'] !!}</li>
						@endif
					@endforeach
				</ul>
			@endif
			
		@endif
	</div>

	@if (isset($toggle['document']))
		</a>
	@endif
@elseif ($mode == 'list_simple')								
	@if($value['item']=='address')
		<ul class="list-unstyled">
			<div class="alert alert-callout alert-info" role="alert" style="border-style:none;">
				<div class="row">
				<div class="col-md-10">
					<strong class="text-primary">Alamat @if($value['is_default']) Sekarang @else Lama @endif</strong><br/>
					{{$value['value']}}
				</div>
				<div class="col-md-2">
					<a class="btn btn-icon-toggle btn-primary pull-right" data-toggle="modal" data-target="#addressCreate" data-modal-address-item={{$value['item']}} data-modal-address-value={{str_replace(' ','_',$value['value'])}} data-modal-address-id={{$value['id']}}>
						<i class="fa fa-pencil"></i>
					</a>
				</div>
				</div>
			</div>					
		</ul>		
	@else
		<ul class="list-unstyled">
			<div class="alert alert-callout alert-info" role="alert" style="border-style:none;">
				<div class="row">
				<div class="col-md-10">
					<strong class="text-primary">{{ucwords(str_replace('_',' ',$value['item']))}} @if($value['is_default']) Sekarang @else Lama @endif</strong><br/>
					{{$value['value']}}
				</div>
				<div class="col-md-2">
					<a class="btn btn-icon-toggle btn-primary pull-right btn_modal" data-toggle="modal" data-target="#contactCreate" data-modal-contact-item={{$value['item']}} data-modal-contact-value={{$value['value']}} data-modal-contact-id={{$value['id']}}><i class="fa fa-pencil"></i></a>
				</div>
				</div>
			</div>					
		</ul>	
	@endif
@endif