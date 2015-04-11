@section('content')
	<section class="section-account">
		<div class="card contain-sm style-transparent">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12">
						<br/>
						<span class="text-lg text-bold text-primary">GANTI PASSWORD</span>

						<br/><br/>
						<form class="form floating-label" action="{{ route('hr.password.post') }}" accept-charset="utf-8" method="post">
							<input type='hidden' name='_token' value="{{csrf_token()}}">
							@include('admin.widgets.alerts')
							<div class="form-group">
								<input type="password" class="form-control" id="old_password" name="old_password">
								<label for="old_password">Password Lama</label>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password">
								<label for="password">Password Baru</label>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
								<label for="password_confirmation">Ulangi Password Baru</label>
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