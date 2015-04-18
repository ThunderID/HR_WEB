@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-md-12 pt-5 ">
				<div class="row">
					<div class="col-md-12">
						<a href="{{route('hr.persons.index')}}" class="btn btn-flat ink-reaction pull-left">
							<i class="md md-reply"></i> Kembali
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- END CARD HEADER -->
		<div class="card-tiles">
			<!-- BEGIN LEFTBAR -->
			<div class="hbox-column col-md-2" id="sidebar_left">
				<ul class="nav nav-pills nav-stacked">
					<li><small>CATEGORIES</small></li>
					<li><a href="{{route('hr.persons.show', [$data['id']])}}">Profil  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.relatives.index', [$data['id']])}}">Kerabat </a>  <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.documents.index', [$data['id']])}}">Dokumen </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					<li class="active"><a href="{{route('hr.persons.works.index', [$data['id']])}}">Pekerjaan </a> <small class="pull-right text-bold opacity-75"></small></a></li>
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
					<li class="active"><a href="#details">Karir</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="details">
						<br/>	
						<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#demo2">Tambah Data</button>
						<br/>	
							<div class="tab-pane" id="details">
								<br/>
								<ul class="timeline collapse-lg timeline-hairline no-shadow">
									@foreach($works as $key => $value)
										@if($key==0)
											<li class="timeline-inverted">
										@else
											<li>
										@endif
											<div class="timeline-circ style-accent"></div>
											<div class="timeline-entry">
												<div class="card style-default-light">
													<div class="card-body small-padding">
														<small class="text-uppercase text-primary pull-right">{{date("F Y", strtotime($value['start']))}} - @if($value['end']=='0000-00-00') Present @else {{date("F Y", strtotime($value['end']))}} @endif</small>
														<p>
															<span class="text-lg text-medium">{{$value['organisation_chart']['name']}} ({{$value['status']}})</span><br/>
															<span class="text-lg text-light">{{$value['organisation_chart']['branch']['name']}}</span>
														</p>
														<p>
															@if(empty ($value['reason_end_job']))
																{{'Pegawai Aktif'}}
															@else
																{{'Pegawai Nonaktif'}}
																<br/>
															@endif

															{{$value['reason_end_job']}}
														</p>
														<a href="{{ route('hr.persons.works.edit' ,[ $data['id'],$value['id']]) }}" class="btn pull-right ink-reaction btn-primary" type="button">
															<i class="fa fa-pencil"></i>&nbsp;Edit
														</a>											
													</div>
												</div>
											</div>
										</li>
									@endforeach
								</ul><!--end .timeline -->
								@if(count($works))
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
			</div>
		</div>
	</div>
@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

@section('js')
	{!! HTML::script('js/bootstrap-datepicker.js')!!}
	{!! HTML::script('js/microtemplating.min.js')!!}
	{!! HTML::script('js/pluginmicrotemplating.min.js')!!}

	<script type="text/javascript">
		window.onload=col_justify('sidebar_left','sidebar_mid','sidebar_right');

		@if ($work['id'])
			var preload_data = [];
			var id = {{$work['chart_id']}};
			var text ="{{$work['organisationchart']['name'].' of '.$work['organisationchart']['branch']['name']}}";
			preload_data.push({ id: id, text: text});
		@else
		    var preload_data = [];
		@endif

		$('.getCompany').select2({
			tokenSeparators: [",", " "],
			tags: [],
			minimumInputLength: 3,
			placeholder: "",
			maximumSelectionSize: 1,
			selectOnBlur: true,
            ajax: {
                url: "{{route('hr.ajax.company')}}",
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
                                text: item.name +' of '+ item.branch.name,
                                id: item.id
                            }
                        })
                    };
                },
				query: function (query){
				    var data = {results: []};
				     
				    $.each(preload_data, function(){
				        if(query.term.length == 0 || this.text.toUpperCase().indexOf(query.term.toUpperCase()) >= 0 ){
				            data.results.push({id: this.id, text: this.text });
				        }
				    });

				    query.callback(data);
				}
            }
        });
        $('.getCompany').select2('data', preload_data );
    </script>
@stop
