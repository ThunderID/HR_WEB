@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-head style-primary">
			<header>Tambah data Organisasi</header>
		</div>
		<form class="form" role="form">
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body style-primary form-inverse">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group floating-label">
									<input type="text" class="form-control input-lg" id="org_name" name="org_name">
									<label for="org_name">Nama Organisasi</label>
								</div>										
							</div>
						</div><!--end .row -->
					</div><!--end .col -->
				</div><!--end .row -->
			</div><!--end .card-body -->
			
			<!-- BEGIN FORM FOOTER -->
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