@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<div class="col-md-12 pt-5 ">
						<div class="col-md-12">
							<div class="row">
								<a href="{{route('hr.organisation.branches.index')}}" class="btn btn-flat ink-reaction pull-left">
									<i class="md md-reply"></i> Kembali
								</a>
								<a href="{{route('hr.organisation.branches.delete', [$data['id']])}}" class="btn btn-flat ink-reaction pull-right">
									<i class="fa fa-trash"></i> Hapus
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body pt-10 pb-0">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="margin-bottom-xxl row">
								<div class="col-sm-10 col-md-10 ml-20">
									<h1 class="text-light no-margin">{{$data['name']}}</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
					<!-- BEGIN LAYOUT LEFT SIDEBAR -->
		<div class="col-md-12">
			<div class="card tabs-left style-default-light">
				<ul class="card-head nav nav-tabs" data-toggle="tabs">
					<li class="active"><a href="#detaile">Detail</a></li>
					<li><a href="#contact">Kontak</a></li>
					<li><a class="oc" href="#structure">Struktur</a></li>
					<li><a href="#Document">Dokumen</a></li>
				</ul>
				<div class="card-body tab-content style-default-bright">
					<div class="tab-pane active" id="detaile">
						<h3 class="text-light">Detail  Perusahaan</h3>
						<dl class="dl-horizontal">
							<dt>NPWP</dt>
							<dd>{{$data['npwp']}}</dd>

							<dt>Ijin Perusahaan</dt>
							<dd>{{$data['license']}}</dd>

							<dt>Bidang Bisnis</dt>
							<dd>{{$data['business_fields']}}</dd>	

							<dt>Kegiatan Bisnis</dt>
							<dd>{{$data['business_activities']}}</dd>
						</dl>	
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<a class="btn btn-flat" href="{{route('hr.organisation.branches.edit', ['id' => $data['id']]) }}">EDIT</a>
							</div>
						</div>												
					</div>
					<div class="tab-pane" id="contact">
						<h3 class="text-light">Kontak  Perusahaan</h3>
						<dl class="dl-horizontal">
							@foreach($data['contacts'] as $key => $value)
								<dt>{{$value['item']}}</dt>
								<dd>{{$value['value']}}</dd>
							@endforeach
						</dl>
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<a class="btn btn-flat" href="{{route('hr.organisation.branches.index')}}">EDIT</a>
							</div>
						</div>					
					</div>					
					<div class="tab-pane" id="structure">
						<h3 class="text-light">Struktur Perusahaan</h3>
						<div class="row">
							<div class="card-body pt-10 pb-0" id="orgc">
							</div>
						</div>
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<a class="btn btn-flat" href="{{route('hr.organisation.branches.index')}}">EDIT</a>
							</div>
						</div>							
					</div>
						<div class="col-md-12 tab-pane" id="Document">
							<ul class="card-head nav nav-tabs text-center" data-toggle="tabs">
								<li class="active">
									<a href="#data_document">
										<i class="fa fa-lg fa-file-text-o"></i>
										<br/>
										<h4>
											Data<br/>
										</h4>
									</a>
								</li>
								<li>
									<a href="#add_document">
										<i class="fa fa-lg fa-plus"></i>
										<br/>
										<h4>
											Tambah<br/>
										</h4>
									</a>
								</li>
							</ul>
							<div class="card-body tab-content style-default-bright">
								<div class="tab-pane active" id="data_document">
									<h3 class="text-light">Dokumen Perusahaan</h3>
									<br>
									<p class="lead">Ad ius duis dissentiunt, an sit harum primis persecuti, adipisci tacimates mediocrem sit et. Id illud voluptaria omittantur qui, te affert nostro mel. Cu conceptam vituperata temporibus has.</p>
									<p>Per at postea mediocritatem, vim numquam aliquid eu, in nam sale gubergren. Fuisset delicatissimi duo, qui ut animal noluisse erroribus. Ea eum veniam audire. Dicant vituperata consequuntur.</p>
									<br>
									<p class="lead">Ad ius duis dissentiunt, an sit harum primis persecuti, adipisci tacimates mediocrem sit et. Id illud voluptaria omittantur qui, te affert nostro mel. Cu conceptam vituperata temporibus has.</p>
									<p>Per at postea mediocritatem, vim numquam aliquid eu, in nam sale gubergren. Fuisset delicatissimi duo, qui ut animal noluisse erroribus. Ea eum veniam audire. Dicant vituperata consequuntur.</p>
								</div>

								<div class="tab-pane" id="add_document">

								<div class="col-md-12">
									<br>
									<form class="form" role="form">
										<div class="form-group floating-label">
											<input type="text" class="form-control" id="docs_name">
											<label for="docs_name">Nama Dokumen</label>
										</div>
									</form>
								</div><!--end .col -->	

								<div class="card-actionbar-row">
									<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
								</div><!--end .card-actionbar-row -->
							</div>				
						</div><!--end .card -->
					</div>
				</div><!--end .card-body -->
			</div><!--end .card -->
		</div><!--end .col -->
		<!-- END LAYOUT LEFT SIDEBAR -->	
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
			$('.oc').click(function () {
				document.getElementById('orgc').innerHTML = '<div id="orgchart"></div>';
				init();
			})
		});
	</script>
@stop