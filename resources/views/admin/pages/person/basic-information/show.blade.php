@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<header style="padding-top:5px;padding-bottom:5px">
						<a href="#" class="btn btn-flat ink-reaction">
							<i class="md md-reply"></i> Back
						</a>
					</header>
				</div>
				<div class="card-body pt-10 pb-0">
					<div class="row">
						<div class="col-sm-10">
							<div class="margin-bottom-xxl row">
								<div class="col-sm-3 col-md-3">
									<img class="img-circle size-3" src="{{url('images/male.png')}}" alt="" />
								</div>
								<div class="col-sm-9 col-md-9">
									<h1 class="text-light no-margin">Prof. Dr. Philip Ericsson, S.T, P.Hd</h1>
									<div class="form-horizontal">
										<div class="row pt-10 no-margin">
											<div class="form-group">
												<div class="col-sm-4">
													<label class="text-lg text-light">Nama panggilan</label>
												</div>
												<div class="col-sm-8">
													<label class="text-lg text-light">Philip</label>
												</div>
											</div>
										
											<div class="form-group">
												<div class="col-sm-4 col-md-4">
													<label class="text-lg text-light">Tempat & tanggal lahir</label>
												</div>
												<div class="col-sm-8 col-md-8 pr-0">
													<label class="text-lg text-light">Ujung padang, 08 Agustus 1987</label>
												</div>
											</div>
										
											<div class="form-group">
												<div class="col-sm-4 col-md-4">
													<label class="text-lg text-light">Jenis kelamin</label>
												</div>
												<div class="col-sm-8 col-md-8">
													<label class="text-lg text-light">Laki-laki</label>
												</div>
											</div>

											<div class="form-group">
												<div class="col-sm-4 col-md-4">
													<label class="text-lg text-light">Status Pernikahan</label>
												</div>
												<div class="col-sm-8 col-md-8">
													<label class="text-lg text-light">Belum menikah</label>
												</div>
											</div>

											<div class="form-group">
												<div class="col-sm-4 col-md-4">
													<label class="text-lg text-light">Kewarganegaraan</label>
												</div>
												<div class="col-sm-8 col-md-8">
													<label class="text-lg text-light">Indonesia</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>				
					</div>
				</div>
			</div>	
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<header>
						Pekerjaan
					</header>
				</div>
				<div class="card-body height-5">
					<div class="clearfix">
						<p class="mtm-5 mb-0 text-xl">Mentari Pagi Sejahtera</p>
						<p class="mtm-5 mb-0 text-lg opacity-50">Thunder Indonesia</p>
						<p class="mt-0 mb-0 opacity-75">Web Designers</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<header >
						Contact
					</header>
				</div>
				<div class="card-body height-5">
					<div class="clearfix">
						<p class="mtm-5 mb-0 text-lg">Mobile</p>
						<p class="mtm-5 mb-0 opacity-50">+6287979797979</p>
						<p class="mtm-0 mb-0 text-lg">Work</p>
						<p class="mtm-5 mb-0 opacity-50">+623419900876</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="card card-underline">
				<div class="card-head card-head-sm style-primary">
					<header >
						Document
					</header>
				</div>
				<div class="nano height-5">
					<div class="nano-content">
						<div class="card-body no-padding">
							<ul class="list">
								@for($x=0; $x<5; $x++)
									<li class="tile">
										<a href="" class="tile-content ink-reaction">
											<div class="tile-icon">
												<i class="fa fa-file-text-o"></i>
											</div>
											<div class="tile-text">
												Surat kenaikan jabatan
											</div>
										</a>
									</li>
								@endfor
							</ul>
						</div>
					</div>
					<div class="nano-pane">
						<div class="nano-slider"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card card-underline">
				<div class="card-head card-head-sm style-primary">
					<header >
						Relasi
					</header>
				</div>
				<div class="nano height-5">
					<div class="nano-content">
						<div class="card-body no-padding">
							<ul class="list">
								<li class="tile">
									<a href="" class="tile-content ink-reaction">
										<div class="tile-icon">
											<img src="{{url('images/male.png')}}" alt="">
										</div>
										<div class="tile-text">
											Abbey Johson
											<small>Ayah</small>
										</div>
									</a>
								</li>
								<li class="tile">
									<a href="" class="tile-content ink-reaction">
										<div class="tile-icon">
											<img src="{{url('images/female.png')}}" alt="">
										</div>
										<div class="tile-text">
											Marry Gileen
											<small>Ibu</small>
										</div>
									</a>
								</li>
								<li class="tile">
									<a href="" class="tile-content ink-reaction">
										<div class="tile-icon">
											<img src="{{url('images/male.png')}}" alt="">
										</div>
										<div class="tile-text">
											Firdy Clify
											<small>Kakak</small>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="nano-pane">
						<div class="nano-slider"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">

	</script>
@stop