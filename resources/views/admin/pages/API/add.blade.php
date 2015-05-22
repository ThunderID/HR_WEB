@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
<div class="card">
		<div class="card-head style-primary">
			<header>Tambah API Keys</header>
		</div>
		<form class="form" role="form">
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body style-primary form-inverse">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="org_name" name="org_name">
									<label for="org_name">Nama Organisasi</label>
								</div>										
							</div>
						</div><!--end .row -->
					</div><!--end .col -->
				</div><!--end .row -->
				<div class="card-actionbar-row">
					<button type="button" class="btn btn-flat ink-reaction">Generate</button>
				</div><!--end .card-actionbar-row -->				
			</div><!--end .card-body -->
			
			<!-- BEGIN FORM FOOTER -->
			<div class="card-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-6">
								<p class="mtm-5 mb-0 text-lg">API Key</p>
								<p class="mtm-5 mb-0 opacity-50">123456789012345678901234567890123456789012345678901234567890</p>
							</div>
							<div class="col-md-6">	
								<p class="mtm-5 mb-0 text-lg">API Secret</p>
								<p class="mtm-5 mb-0 opacity-50">123456789012345678901234567890123456789012345678901234567890</p>
							</div>
						</div>	
					</div>	
				</div>				
			</div>
			<div class="card-actionbar">	
				<div class="card-actionbar-row">
					<a class="btn btn-flat btn-default ink-reaction" href="#">BATAL</a>
					<button type="button" class="btn btn-flat btn-primary ink-reaction">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
			<!-- END FORM FOOTER -->
		</form>
	</div><!--end .card -->
@stop