@section('content')
	<section class="section-account">
		<div class="img-backdrop" style="background-image: url('{{asset("images/bg-login.jpg")}}')"></div>
		<div class="spacer"></div>
		<div class="card contain-sm style-transparent">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<span class="text-lg text-bold text-primary">LOGIN USER</span>
						<br/><br/>
						@include('admin.widgets.alerts')	
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<br>
						<form class="form floating-label" action="{{ route('hr.login.post') }}" accept-charset="utf-8" method="post">
							<input type='hidden' name='_token' value="{{csrf_token()}}">
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" autofocus>
								<label for="email">Email</label>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password">
								<label for="password">Password</label>
							</div>
							<br/>
							<div class="row">
								<div class="col-xs-6 text-left">&nbsp;</div><!--end .col -->
								<div class="col-xs-6 text-right">
									<button class="btn btn-primary btn-raised" type="submit">Login</button>
								</div><!--end .col -->
							</div><!--end .row -->
						</form>
					</div><!--end .col -->
					
					<div class="col-md-5 col-md-offset-1 text-center">
						<h3 class="text-light">
							Unauthorized User?
						</h3>
						<p class='text-left'>
							If you are an unauthorized user to control panel, please leave this page. 
							We are tracking IP Addresses and we will take legal action for anyone trying to breach our system
						</p>

						<h3 class="text-light">
							Forgot Your Password?
						</h3>
						<p class='text-left'>Please contact your system administrator to retrieve your new password</p>
						<br><br><br>
					</div><!--end .col -->

				</div><!--end .row -->
			</div><!--end .card-body -->
		</div><!--end .card -->
	</section>
	<!-- END LOGIN SECTION -->
@stop