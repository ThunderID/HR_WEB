@section('content')
	<section class="section-account">
		<div class="card contain-sm style-transparent">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12">
						@if (isset($alert_success))
							<div class='alert alert-success style-solid'>
								<div class="row">
									<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center">
										<i class="fa fa-check-circle" style="font-size:60px"></i>
									</div>
									<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
										<p>{{$alert_success}}</p>
									</div>
								</div>
							</div>
						@endif
						<br/>
						<span class="text-lg text-bold text-primary">GANTI DEVICE CONFIG</span>

						<br/><br/>
						<form class="form floating-label" action="{{ route('hr.devices.update') }}" accept-charset="utf-8" method="post">
							<input type='hidden' name='_token' value="{{csrf_token()}}">
							<div class="form-group">
								<input type="text" class="form-control" id="client" name="client" value="{{$client}}">
								<label for="client">Client</label>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="old_secret" name="old_secret">
								<label for="old_secret">Secret Lama</label>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="secret" name="secret">
								<label for="secret">Secret Baru</label>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="secret_confirmation" name="secret_confirmation">
								<label for="devices_confirmation">Ulangi Secret Baru</label>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password">
								<label for="password">Password Anda</label>
							</div>
							<br/>
							<div class="row">
								<div class="col-xs-6 text-left">
								</div><!--end .col -->
								<div class="col-xs-6 text-right">
									<button class="btn btn-primary btn-raised" type="submit">Simpan</button>
								</div><!--end .col -->
							</div><!--end .row -->
						</form>
					</div><!--end .col -->
				</div><!--end .row -->
			</div><!--end .card-body -->
		</div><!--end .card -->
	</section>
	<!-- END LOGIN SECTION -->
@stop