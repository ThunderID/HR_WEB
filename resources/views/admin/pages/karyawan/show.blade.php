@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.persons.index')}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i> Kembali
				</a>
				<a href="{{route('hr.persons.delete', [$data['id']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-trash"></i> Hapus
				</a>
				<a href="{{route('hr.persons.edit', [$data['id']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i> Edit
				</a>				
			</div>
		</div>
		<!-- END CARD HEADER -->

		<!-- BEGIN CARD TILES -->
		<div class="card-tiles">
			<!-- BEGIN LEFTBAR -->
			<div class="hbox-column col-md-2" id="sidebar_left">
				<ul class="nav nav-pills nav-stacked">
					<li><small>CATEGORIES</small></li>
					<li class="active"><a href="{{route('hr.persons.show', [$data['id']])}}">Profil </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.relatives.index', [$data['id']])}}">Kerabat </a> <small class="pull-right text-bold opacity-75"></small></a></li>
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
				<!-- END MIDDLE -->
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
	{!! HTML::style('css/dropzone.css')!!}
@stop

@section('js')
	{!! HTML::script('js/dropzone.min.js')!!}
	<script type="text/javascript">
		window.onload=col_justify('sidebar_left','sidebar_mid','sidebar_right');

        $("#document_upload").dropzone({ 
			url: '{{ route("hr.images.upload") }}' ,
			maxFilesize: 1,
			addRemoveLinks: true,
			init: function(){
				this.on('success', function(file){
					var accepted_files = this.getAcceptedFiles();
					var uploaded_files = [];
					var gallery_json;

					if (accepted_files.length > 0)
					{
						accepted_files.forEach(function(cur_value, index, array){
							var response = $.parseJSON(cur_value.xhr.response);
							uploaded_files.push(response.file.url);
						});
					}

					$('#gallery_file_url').val(JSON.stringify(uploaded_files));
				});
			}
		});	
    </script>
@stop