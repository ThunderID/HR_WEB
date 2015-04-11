@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card">

				<!-- BEGIN CONTACT DETAILS HEADER -->
				<div class="card-head card-head-sm style-primary">
					<header style="padding-top:5px;padding-bottom:5px">
						<a href="{{route('hr.persons.index')}}" class="btn btn-flat ink-reaction">
							<i class="md md-reply"></i> Back
						</a>
					</header>
				</div>
				<!-- END CONTACT DETAILS HEADER -->

				<!-- BEGIN CONTACT DETAILS -->
				<div class="card-body">
					<div class="hbox-md col-md-12">
						<div class="hbox-column col-md-12">
							<div class="row">

								<!-- BEGIN CONTACTS NAV -->
								<div class="col-sm-5 col-md-4 col-lg-3">
									<ul class="nav nav-pills nav-stacked">
										<li><small>CATEGORIES</small></li>
										<li><a href="{{route('hr.persons.show', [$data['id']])}}">Informasi Umum  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
										<li class="active"><a href="{{route('hr.persons.relatives.index', [$data['id']])}}">Kerabat </a>  <small class="pull-right text-bold opacity-75"></small></a></li>
									</ul>
								</div><!--end .col -->
								<!-- END CONTACTS NAV -->

								<!-- BEGIN CONTACTS MAIN CONTENT -->
								<div class="col-sm-7 col-md-8 col-lg-9">
									<div class="list-results" style="margin-bottom:0px;">
										@foreach($relatives as $key => $value)	
											@if($key%2==0 && $key!=0)
												</div>
												<div class="list-results" style="margin-bottom:0px;">
											@endif											
											<div class="col-xs-12 col-lg-6 hbox-xs">

												<div class="hbox-column width-3">
													<img class="img-circle img-responsive" alt="" @if($value['gender'] =='male') src="{{url('images/male.png')}}" @else src="{{url('images/female.png')}}" @endif></img>
												</div><!--end .hbox-column -->
												<div class="hbox-xs v-top height-4">
													<div class="clearfix">
														<div class="col-lg-12 margin-bottom-lg">
															<a class="text-lg text-medium" href="{{ route('hr.persons.show' ,['id'=> $value['id']]) }}">{{$value['first_name'].' '.$value['middle_name'] .' '.$value['last_name']}}</a>
														</div>
													</div>
													@if(count($value['contacts']))
														@foreach($data['contacts'] as $key2 => $value2)
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
												</div><!--end .hbox-column -->
											</div><!--end .hbox-xs -->
										@endforeach
									</div><!--end .hbox-md -->
									@if(count($relatives))
										@include('admin.helpers.pagination')
									@else
										<div class="row">
											<div class="col-sm-12 text-center">
												<p>Tidak ada data</p>
											</div>
										</div>
									@endif
								</div><!--end .hbox-md -->
							</div><!--end .card-tiles -->
						</div><!--end .card-tiles -->
					</div><!--end .card-tiles -->
				</div><!--end .card -->
			</div><!--end .card -->
		</div>
	</div>

@stop

@section('js')
	<script type="text/javascript">

	</script>
@stop
