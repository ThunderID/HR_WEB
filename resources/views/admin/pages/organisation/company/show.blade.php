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
						<a href="{{route('hr.organisation.branches.index')}}" class="btn btn-flat ink-reaction">
							<i class="md md-reply"></i> Kembali
						</a>
					</header>
				</div>
				<div class="card-body pt-10 pb-0">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="margin-bottom-xxl row">
								<div class="col-sm-10 col-md-10 ml-20">
									<h1 class="text-light no-margin">{{$data['name']}}</h1>
									<div class="form-horizontal">
										<div class="row pt-10 no-margin">
											<div class="col-sm-3 col-md-3">
												<label class="text-lg text-medium">Ijin Perusahaan</label>
											</div>
											<div class="col-sm-3 col-md-3">
												<label class="text-lg text-light">{{$data['license']}}</label>
											</div>
											<div class="col-sm-3 col-md-3">
												<label class="text-lg text-light text-medium">NPWP</label>
											</div>
											<div class="col-sm-3 col-md-3 pr-0">
												<label class="text-lg text-light">{{$data['npwp']}}</label>
											</div>
										</div>
										<div class="row no-margin">
											<div class="col-sm-3 col-md-3">
												<label class="text-lg text-light text-medium">Kegiatan Bisnis</label>
											</div>
											<div class="col-sm-3 col-md-3 pr-0">
												<label class="text-lg text-light">{{$data['business_activities']}}</label>
											</div>
											<div class="col-sm-3 col-md-3">
												<label class="text-lg text-light text-medium">Bidang Bisnis</label>
											</div>
											<div class="col-sm-3 col-md-3 pr-0">
												<label class="text-lg text-light">{{$data['business_fields']}}</label>
											</div>
										</div>
										<a id="detail" class="pull-right" data-toggle="collapse" href="#detail-company" aria-expanded="false" aria-controls="collapseExample" style="margin-right:-95px">
											<i class="fa fa-plus-circle fa-lg"></i> lihat detail
										</a>
										<hr class="ruler-xl"></hr>
										<div id="detail-company" class="collapse">
											@foreach($data['contacts'] as $key => $value)
												<div class="row no-margin pt-20" >
													<div class="col-sm-4">
														<label class="text-lg text-light text-medium">{{$value['item']}}</label>
													</div>
													<div class="col-sm-8 pr-0">
														<label class="text-lg text-light">{{$value['value']}}</label>
													</div>
												</div>
											@endforeach
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