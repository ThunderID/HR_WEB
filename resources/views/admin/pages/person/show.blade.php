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
					<div class="col-md-12 pt-5 ">
						<div class="row">
							<div class="col-md-12">
								<a href="{{route('hr.persons.index')}}" class="btn btn-flat ink-reaction pull-left">
									<i class="md md-reply"></i> Kembali
								</a>
								<a href="{{route('hr.persons.delete', [$data['id']])}}" class="btn btn-flat ink-reaction pull-right">
									<i class="fa fa-trash"></i> Hapus
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- END CONTACT DETAILS HEADER -->

				<!-- BEGIN CONTACT DETAILS -->
				<div class="card-tiles">
					<div class="hbox-md col-md-12">
						<div class="hbox-column col-md-9">
							<div class="row">

								<!-- BEGIN CONTACTS NAV -->
								<div class="col-sm-5 col-md-4 col-lg-3">
									<ul class="nav nav-pills nav-stacked">
										<li><small>CATEGORIES</small></li>
										<li class="active"><a href="{{route('hr.persons.show', [$data['id']])}}">Informasi Umum </a> <small class="pull-right text-bold opacity-75"></small></a></li>
										<li><a href="{{route('hr.persons.relatives.index', [$data['id']])}}">Kerabat </a> <small class="pull-right text-bold opacity-75"></small></a></li>
									</ul>
								</div><!--end .col -->
								<!-- END CONTACTS NAV -->

								<!-- BEGIN CONTACTS MAIN CONTENT -->

								<div class="col-sm-7 col-md-8 col-lg-9 pt-5">
									<div class="row">
										<p><a href="{{route('hr.persons.edit', [$data['id']])}}" type="button" class="btn pull-right ink-reaction btn-floating-action btn-primary"><i class="fa fa-pencil"></i></a></p>						
									</div>
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
									</div><!--end .margin-bottom-xxl -->
									<ul class="nav nav-tabs" data-toggle="tabs">
										<li class="active"><a href="#notes">Dokumen</a></li>
										<li><a href="#details">Karir</a></li>
									</ul>
									<div class="tab-content">

										<!-- BEGIN CONTACTS NOTES -->
										<div class="tab-pane active" id="notes">
											<br/>
											<div class="row">
												<div class="col-lg-12">
													<div class="card">
														<div class="card-head style-primary">
															<header>Tambah Dokumen</header>
														</div>
														<div class="card-body no-padding">
															<div class ="col-md-12">
																<form action="../../html/forms/advanced.html" class="dropzone dz-clickable" id="my-awesome-dropzone">
																	<div class="dz-message">
																		<h3>Klik atau Drag sebuah file untuk di unggah</h3>
																	</div>
																</form>
															</div>
														</div><!--end .card-body -->
													</div><!--end .card -->
													<em class="text-caption">* untuk menambahkan file, klik area diatas atau drag file pada area tersebut</em>
													<button type="submit" class="btn btn-raised btn-default-light pull-right">Tambahkan dokumen</button>
												</div><!--end .col -->
											</div>
											<br/>
											<div class="list-results list-results-underlined">
												<div class="col-xs-12">
													@foreach($data['documents'] as $key => $value)
														<div class="row">
															<div class="col-xs-6">
																<p class="clearfix">
																	<img class="img-responsive" style ="padding-left:5%; max-width:95%" alt="" src=""></img>
																</p>
															</div>
															<div class="col-xs-6">
																<p class="clearfix">
																	<span class="pull-left">
																		<span class="text-bold">{{date("l, d F Y", strtotime($value['created_at']))}}</span><br/>
																		<span class="opacity-50">{{$value['name']}}</span><br/>
																	</span>
																</p>
															</div><!--end .col -->
														</div><!--end .row -->
													@endforeach
												</div><!--end .col -->
											</div><!--end .list-results -->
										</div><!--end #notes -->
										<!-- END CONTACTS NOTES -->

									<!-- BEGIN CONTACTS DETAILS -->
									<div class="tab-pane" id="details">
										<div class="tab-pane" id="work">
											<form class="form" role="form" action="{{route('hr.persons.works.store', $data['id'])}}" method="post">
												<ul class="list-unstyled" id="workList">
													<li class="clearfix">
														<div class="page-header no-border holder">
															<h4 class="text-accent">Tambahkan Pekerjaan </h4>
															<br/>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<input name="work_company" id="work_company" class="form-control getCompany" data-comp="">											
																	<label for="work_company">Posisi</label>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<input type="text" class="form-control" id="work_status" name="work_status">
																	<label for="work_status">Status Pegawai (contract, trial, permanent, internship)</label>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<input type="text" class="form-control" id="work_start[]" name="work_start">
																	<label for="work_start">Mulai Bekerja</label>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<input type="text" class="form-control" id="work_end" name="work_end">
																	<label for="work_end">Berhenti Bekerja</label>
																</div>
															</div>
														</div>
														<div class="form-group">
															<textarea style="resize: vertical;" name="work_quit_reason" id="work_quit_reason" class="form-control" rows="3"></textarea>
															<label for="work_quit_reason">Alasan Berhenti</label>
														</div>

														<div class="form-group text-right">
															<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
														</div><!--end .card-actionbar -->
													</li>
												</ul>
											</form>
										</div><!--end .tab-pane -->
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
										</ul><!--end .timeline -->
										
									</div><!--end #details -->
									<!-- END CONTACTS DETAILS -->

								</div><!--end .tab-content -->
							</div><!--end .col -->
							<!-- END CONTACTS MAIN CONTENT -->

						</div><!--end .row -->
					</div><!--end .hbox-column -->

					<!-- BEGIN CONTACTS COMMON DETAILS -->
					<div class="hbox-column col-md-3 style-default-light">
						<div class="row">
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
								</dl><!--end .dl-horizontal -->
							</div><!--end .col -->
						</div><!--end .row -->
					</div><!--end .hbox-column -->
					<!-- END CONTACTS COMMON DETAILS -->

				</div><!--end .hbox-md -->
			</div><!--end .card-tiles -->
			<!-- END CONTACT DETAILS -->

		</div><!--end .card -->
		</div>
	</div>

@stop

@section('css')
	{!! HTML::style('css/dropzone.css')!!}
@stop

@section('js')
	<script type="text/javascript">
		$('.getCompany').select2({
            minimumInputLength: 3,
            placeholder: '',
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
                }
            }
        });
    </script>
	{!! HTML::script('js/dropzone.min.js')!!}
@stop