@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.persons.show',[ $data['id']])}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i> Kembali
				</a>
			</div>
		</div>				
		<!-- END CARD HEADER -->
		<div class="card-tiles">
			<!-- BEGIN LEFTBAR -->
			<div class="hbox-column col-md-2" id="sidebar_left">
				<ul class="nav nav-pills nav-stacked">
					<li><small>CATEGORIES</small></li>
					<li><a href="{{route('hr.persons.show', [$data['id']])}}">Profil  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					<li class="active"><a href="{{route('hr.persons.relatives.index', [$data['id']])}}">Kerabat </a>  <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.documents.index', [$data['id']])}}">Dokumen </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.works.index', [$data['id']])}}">Pekerjaan </a> <small class="pull-right text-bold opacity-75"></small></a></li>
				</ul>
			</div>
			
			<!-- BEGIN MIDDLE -->					
			<div class="hbox-column col-md-7" id="sidebar_mid">
				<div class="margin-bottom-xxl">
					<div class="pull-left width-3 clearfix hidden-xs">
						<img class="img-circle img-responsive" alt="" @if($data['gender'] =='male') src="{{url('images/male.png')}}" @else src="{{url('images/female.png')}}" @endif></img>
					</div>
					<h1 class="text-light no-margin">{{$data['prefix_title'].' '.$data['first_name'].' '.$data['middle_name'].' '.$data['last_name'].' '.$data['suffix_title']}}</h1>
					<h5>
						@if(isset($data['works'][0]))
							{{$data['works'][0]['name']}} di {{$data['works'][0]['branch']['name']}}
						@endif
					</h5>
					&nbsp;&nbsp;
				</div>
				<ul class="nav nav-tabs" data-toggle="tabs">
					<li class="active"><a href="#details">Kerabat</a></li>
				</ul>
				<div class="page-header no-border holder" style="margin-top:0px;">
					<br/>
					<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#demo">Tambah Data</button>
				</div>
				<div class="tab-content">
					<div class="tab-pane active" id="details">
						<br/>
						<br/>
						<div class="list-results" style="margin-bottom:0px;">
							@foreach($relatives as $key => $value)	
								@if($key%2==0 && $key!=0)
									</div>
									<div class="list-results" style="margin-bottom:0px;">
								@endif											
								<div class="col-xs-12 col-lg-12 hbox-xs">
									<div class="hbox-column width-3">
										<img class="img-circle img-responsive" alt="" @if($value['gender'] =='male') src="{{url('images/male.png')}}" @else src="{{url('images/female.png')}}" @endif></img>
									</div><!--end .hbox-column -->
									<div class="hbox-xs v-top height-4">
										<div class="clearfix">
											<div class="col-lg-12 margin-bottom-lg">
												<a href="{{ route('hr.persons.relatives.delete' ,[ $data['id'],$value['relative_id']]) }}" class="btn pull-right ink-reaction btn-floating-action btn-danger" type="button">
													<i class="fa fa-trash"></i>
												</a>
												<a class="text-lg text-medium" href="{{ route('hr.persons.show' ,['id'=> $value['id']]) }}">{{$value['first_name'].' '.$value['middle_name'] .' '.$value['last_name']}}</a>
											</div>
										</div>

										@if(count($value['contacts']))
											@foreach($value['contacts'] as $key2 => $value2)
												<div class="clearfix">
													<div class="col-lg-12">
														@if($value2['item']=='phone_number')
															<span class="opacity-75"><span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;{{$value2['value']}}</span>
														@elseif($value2['item']=='email')
															<span class="opacity-75"><span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;{{$value2['value']}}</span>
														@elseif($value2['item']=='address')
															<span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;{{$value2['value']}}</span>
														@endif
													</div>
												</div>
											@endforeach
										@endif
									</div>
								</div>
							@endforeach

						</div>
						@if(count($relatives))
							@include('admin.helpers.pagination')
						@else
							<div class="row">
								<div class="col-sm-12 text-center">
									<p>Tidak ada data</p>
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>

			<!-- BEGIN RIGHTBAR -->
			<div class="hbox-column col-md-3 style-default-light" id="sidebar_right">
				<div class="row" style='height:100%;'>
					<div class="col-xs-12">
						<h4>Ringkas</h4>
						<br/>
						<dl class="dl-horizontal dl-icon">
							@if(isset($data['works'][0]))
								<dt><span class="fa fa-fw fa-graduation-cap fa-lg opacity-50"></span></dt>
								<dd>
									<span class="opacity-50">Karir</span><br/>
									<span class="text-medium">{{$data['works'][0]['name']}} di {{$data['works'][0]['branch']['name']}} </span>
								</dd>
							@endif
							<dt><span class="fa fa-fw fa-gift fa-lg opacity-50"></span></dt>
							<dd>
								<span class="opacity-50">Ulang Tahun</span><br/>
								<span class="text-medium">{{date("d F", strtotime($data['date_of_birth']))}}</span>
							</dd>
						</dl><!--end .dl-horizontal -->
						<br/>
						@if(isset($data['contacts']))
							<h4>Kontak</h4>
						@endif
						<br/>
						<dl class="dl-horizontal dl-icon">
							@foreach($data['contacts'] as $key => $value)
								@if($value['item']=='phone_number')
									<dt><span class="fa fa-fw fa-mobile fa-lg opacity-50"></span></dt>
									<span class="opacity-50">{{$value['item']}}</span><br/>
								@elseif($value['item']=='email')
									<dt><span class="fa fa-fw fa-envelope-square fa-lg opacity-50"></span></dt>
									<span class="opacity-50">{{$value['item']}}</span><br/>
								@elseif($value['item']=='address')
									<dt><span class="fa fa-fw fa-location-arrow fa-lg opacity-50"></span></dt>
									<span class="opacity-50">{{$value['item']}}</span><br/>
								@else
									<dt><span class="fa fa-fw fa-mobile fa-lg opacity-50"></span></dt>
									<span class="opacity-50">{{$value['item']}}</span>
								@endif
								<dd>
									<span class="text-medium">{{$value['value']}}</span> &nbsp;<span class="opacity-50"></span><br/>
								</dd>
							@endforeach
						</dl>
					</div>
				</div>			
				<div class="clearfix"></div>
			</div>	
		</div>
	</div>
@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

@section('js')
	{!! HTML::script('js/bootstrap-datepicker.js')!!}
	{!! HTML::script('js/pluginmicrotemplating.min.js')!!}

	<script type="text/javascript">
		window.onload=col_justify('sidebar_left','sidebar_mid','sidebar_right');

		$(document).ready(function () {
			$('#relation').select2({
	            minimumInputLength: 3,
	            placeholder: '',
	            ajax: {
	                url: "{{route('hr.ajax.name')}}",
	                dataType: 'json',
	                quietMillis: 500,
	               data: function (term) {
	                    return {
	                        term: term
	                    };
	                },
	                results: function (data) {
	                    return {
	                        results: $.map(data, function (item) {
	                            return {
	                                text: item.first_name + ' ' + item.middle_name + ' ' + item.last_name ,
	                                id: item.id
	                            }
	                        })
	                    };
	                }
	            }
	        });
        });

	</script>
@stop
