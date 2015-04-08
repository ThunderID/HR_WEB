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
						<div class="col-sm-12">
							<div class="margin-bottom-xxl row">
								<div class="col-md-12">
									<h1 class="text-light no-margin">SURAT PERINGATAN</h1>
									<div class="form-horizontal">
										<div class="row pt-10 no-margin">
											<div class="form-group">
												<div class="col-md-3">
													<label class="text-lg text-light">Nomor Induk karyawan</label>
												</div>
												<div class="col-md-1">
													<label class="text-lg text-light">:</label>
												</div>												
												<div class="col-md-7">
													<label class="text-lg text-light">23642752567235467</label>
												</div>
											</div>


											<div class="form-group">
												<div class="col-md-3">
													<label class="text-lg text-light">Nama Pegawai</label>
												</div>
												<div class="col-md-1">
													<label class="text-lg text-light">:</label>
												</div>												
												<div class="col-md-7">
													<label class="text-lg text-light">Philip</label>
												</div>
											</div>
										
											<div class="form-group">
												<div class="col-md-3">
													<label class="text-lg text-light">Input 1</label>
												</div>
												<div class="col-md-1">
													<label class="text-lg text-light">:</label>
												</div>												
												<div class="col-md-7">
													<label class="text-lg text-light">nilai input 1</label>
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

@Stop