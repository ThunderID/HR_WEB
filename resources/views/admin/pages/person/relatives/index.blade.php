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
							</div>
						</div>
					</div>
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
									<div class="row">
										<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#demo">Tambah Data</button>
									</div>
									<div id="demo" class="row collapse out">
										<div class="col-md-12">
											<form class="form" role="form" action="{{route('hr.persons.works.store', $data['id'])}}" method="post">
												<ul class="list-unstyled" id="workList">
													<li class="clearfix">
														<div class="page-header no-border holder">
		 													<h4 class="text-accent">Profil Relasi</h4>
														</div>
														<br/>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<select  id="relationship" name="relationship" class="form-control">
																		<option value=""></option>
																		<option value="parent">Orang Tua</option>
																		<option value="spouse">Pasangan</option>
																		<option value="child">Anak</option>
																	</select>
																	<label for="relationship">Hubungan/Relasi</label>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="card">
																<!-- BEGIN RELASI DETAIL -->			
																<div class="card-head style-primary-dark">
																	<header>Nama</header>
																</div>
																<div class="card-head">
																	<ul class="nav nav-tabs" data-toggle="tabs">
																		<li class="active"><a href="#first1">Data yang sudah ada</a></li>
																		<li><a href="#second1">Data baru</a></li>
																	</ul>
																</div>

																<div class="card-body tab-content">
																	<div class="tab-pane active" id="first1">
																		<div class="row">
																			<div class="col-md-12">
																				<div class="form-group">
																					<input name="relation" id="relation" class="form-control getName">											
																					<label for="relation">Nama</label>
																				</div>
																			</div>
																		</div>							
																	</div>

																	<div class="tab-pane" id="second1">														
																		<div class="row">
																			<div class="col-xs-12">
																				<div class="row">
																					<div class="col-md-12">
																						<div class="form-group">
																							<input type="text" class="form-control" id="prefix_title_relation" name="prefix_title_relation">
																							<label for="prefix_title_relation">Gelar Depan</label>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<div class="col-md-4">
																						<div class="form-group">
																							<input type="text" class="form-control" id="first_name_relation" name="first_name_relation">
																							<label for="first_name_relation">Nama Depan</label>
																						</div>
																					</div>
																					<div class="col-md-4">
																						<div class="form-group">
																							<input type="text" class="form-control" id="midle_name_relation" name="midle_name_relation">
																								<label for="midle_name_relation">Nama Tengah</label>
																						</div>
																					</div>
																					<div class="col-md-4">
																						<div class="form-group">
																							<input type="text" class="form-control" id="last_name_relation" name="last_name_relation">
																							<label for="last_name_relation">Nama Belakang</label>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<div class="col-md-12">
																						<div class="form-group">
																							<input type="text" class="form-control" id="suffix_title_relation" name="suffix_title_relation">
																							<label for="suffix_title_relation">Gelar Belakang</label>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<header class="card-head">Profil Relasi</header>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<input type="text" class="form-control" id="nick_name_relation" name="nick_name_relation">
																					<label for="nick_name_relation">Nama Panggilan</label>
																				</div>
																			</div>
																			<div class="col-md-2">
																				<div class="form-group">
																					<label>
																						Jenis Kelamin
																					</label>
																				</div>
																			</div>
																			<div class="col-md-2">
																				<div class="radio radio-styled">
																					<label>
																						<input name="gender_relation" type="radio" value="male">
																						<span>Laki-laki</span>
																					</label>
																				</div>
																			</div>
																			<div class="col-md-2">
																				<div class="radio radio-styled">
																					<label>
																						<input name="gender_relation" type="radio" value="female">
																						<span>Perempuan</span>
																					</label>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<input type="text" class="form-control" id="place_of_birth_relation" name="place_of_birth_relation">
																					<label for="place_of_birth_relation">Tempat Lahir</label>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<div class="input-daterange input-group" id="date_of_birth_relation" style="width:100%; text-align:left;">
																						<div class="input-group-content">
																							<input type="text" class="form-control" name="date_of_birth_relation" />
																							<label>Tanggal Lahir</label>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<!-- END RELASI DETAIL -->
																</div><!--end .card-body -->														
															</div>
														</div>
													</li>
												</ul>
												<div class="card-actionbar">
													<div class="card-actionbar-row">
														<a class="btn btn-flat" href="{{route('hr.persons.index')}}">BATAL</a>
														<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
													</div><!--end .card-actionbar-row -->
												</div><!--end .card-actionbar -->
											</form>
										</div>
									</div>

									<div class="page-header no-border holder">
											<h4 class="text-accent">Daftar Relasi</h4>
									</div>									
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

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

@section('js')
	{!! HTML::script('js/bootstrap-datepicker.js')!!}
	{!! HTML::script('js/pluginmicrotemplating.min.js')!!}

	<script type="text/javascript">
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
