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
						<div class="col-sm-12 col-md-12">
							<div class="margin-bottom-xxl row">
								<div class="col-sm-10 col-md-10 ml-20">
									<h1 class="text-light no-margin">PT. Makmur Sejati</h1>
									<div class="form-horizontal">
										<div class="row pt-10 no-margin">
											<div class="col-sm-3 col-md-3">
												<label class="text-lg text-medium">Nomor Ijin Perusahaan</label>
											</div>
											<div class="col-sm-3 col-md-3">
												<label class="text-lg text-light">09090909080</label>
											</div>
											<div class="col-sm-3 col-md-3">
												<label class="text-lg text-light text-medium">NPWP</label>
											</div>
											<div class="col-sm-3 col-md-3 pr-0">
												<label class="text-lg text-light">09090909080</label>
											</div>
										</div>
										<div class="row no-margin">
											<div class="col-sm-3 col-md-3">
												<label class="text-lg text-light text-medium">Kegiatan Bisnis</label>
											</div>
											<div class="col-sm-3 col-md-3 pr-0">
												<label class="text-lg text-light">IT</label>
											</div>
											<div class="col-sm-3 col-md-3">
												<label class="text-lg text-light text-medium">Bidang Bisnis</label>
											</div>
											<div class="col-sm-3 col-md-3 pr-0">
												<label class="text-lg text-light">Industri IT</label>
											</div>
										</div>
										<a id="detail" class="pull-right" data-toggle="collapse" href="#detail-company" aria-expanded="false" aria-controls="collapseExample" style="margin-right:-95px">
											<i class="fa fa-plus-circle fa-lg"></i> lihat detail
										</a>
										<hr class="ruler-xl"></hr>
										<div id="detail-company" class="collapse">
											<div class="row no-margin pt-20" >
												<div class="col-sm-3 col-md-3">
													<label class="text-lg text-light text-medium">Alamat</label>
												</div>
												<div class="col-sm-6 col-md-6 pr-0">
													<label class="text-lg text-light">Jln. Kota Araya Blok A10</label>
												</div>
											</div>
											<div class="row no-margin pt-5">
												<div class="col-sm-3 col-md-3">
													<label class="text-lg text-light text-medium">RT / RW</label>
												</div>
												<div class="col-sm-3 col-md-3 pr-0">
													<label class="text-lg text-light">03 / 05</label>
												</div>
												<div class="col-sm-3 col-md-3">
													<label class="text-lg text-light text-medium">Kecamatan</label>
												</div>
												<div class="col-sm-3 col-md-3 pr-0">
													<label class="text-lg text-light">Blimbing</label>
												</div>
											</div>
											<div class="row no-margin">
												<div class="col-sm-3 col-md-3">
													<label class="text-lg text-light text-medium">Kelurahan	</label>
												</div>
												<div class="col-sm-3 col-md-3 pr-0">
													<label class="text-lg text-light">Blimbing</label>
												</div>
												<div class="col-sm-3 col-md-3">
													<label class="text-lg text-light text-medium">Kota</label>
												</div>
												<div class="col-sm-3 col-md-3 pr-0">
													<label class="text-lg text-light">Malang</label>
												</div>
											</div>
											<div class="row no-margin">
												<div class="col-sm-3 col-md-3">
													<label class="text-lg text-light text-medium">Provinsi</label>
												</div>
												<div class="col-sm-3 col-md-3 pr-0">
													<label class="text-lg text-light">Jawa Timur</label>
												</div>
												<div class="col-sm-3 col-md-3">
													<label class="text-lg text-light text-medium">Negara</label>
												</div>
												<div class="col-sm-3 col-md-3 pr-0">
													<label class="text-lg text-light">Indonesia</label>
												</div>
											</div>
											<hr class="ruler-xl"></hr>
											<div class="row no-margin pt-20">
												<div class="col-sm-3 col-md-3">
													<label class="text-lg text-light text-medium">No Tlp</label>
												</div>
												<div class="col-sm-3 col-md-3 pr-0">
													<label class="text-lg text-light">+62 856 780 900</label>
												</div>
												<div class="col-sm-3 col-md-3">
													<label class="text-lg text-light text-medium">Email</label>
												</div>
												<div class="col-sm-3 col-md-3 pr-0">
													<label class="text-lg text-light">kota@malang.com</label>
												</div>
											</div>
											<div class="row no-margin">
												<div class="col-sm-3 col-md-3">
													<label class="text-lg text-light text-medium">BBM</label>
												</div>
												<div class="col-sm-3 col-md-3 pr-0">
													<label class="text-lg text-light">5133cad3</label>
												</div>
												<div class="col-sm-3 col-md-3">
													<label class="text-lg text-light text-medium">Line</label>
												</div>
												<div class="col-sm-3 col-md-3 pr-0">
													<label class="text-lg text-light">kotamalang</label>
												</div>
											</div>
											<div class="row no-margin">
												<div class="col-sm-3 col-md-3">
													<label class="text-lg text-light text-medium">Whatsapp</label>
												</div>
												<div class="col-sm-3 col-md-3 pr-0">
													<label class="text-lg text-light">+62 856 780 900</label>
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
		<div class="col-sm-12 col-md-12">
			<div class="card">
				<div class="card-head">
					<header class="mt-10">
						Struktur Perusahaan
					</header>
				</div>
				<div class="card-body pt-10 pb-0">
					<div id="orgchart"></div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('css')
	{!! HTML::style('css/base.css')!!}
	{!! HTML::style('css/spacetree.css')!!}
@stop

@section('js')
	{!! HTML::script('js/jit.min.js')!!}
	@include('admin.pages.organisation.company.orgchart')
	<script type="text/javascript">
		$(document).ready(function () {
			$('#detail').click(function () {
				if ($('#detail > i').hasClass('fa fa-plus-circle')){
					$('#detail').html('<i class="fa fa-minus-circle"></i> Tutup detail');
				} else {
					$('#detail').html('<i class="fa fa-plus-circle"></i> Lihat detail');
				}
			})
		});
	</script>
@stop