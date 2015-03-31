@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row" style="margin-bottom:20px">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<br>
			<a href='' class='btn btn-primary btn-raised ink-reaction'>Create</a>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form">

		</div>
	</div>
	
	@for($x=0; $x<3; $x++)
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-2 hbox-xs">
							<div class="hbox-column width-1">
								<img class="img-circle img-responsive" alt="" src="{{url('images/avatar9.jpg')}}"></img>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="clearfix">
								<h3><a href="#" class="margin-bottom-lg">Mark Ketijerk</a></h3>
								<p>Malang, 11 Agustus 1987</p>
								<p>Jln. Raya Araya no 43, Blimbing, Malang, Jawa Timur</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<button type="submit" class="btn btn-flat btn-primary">EDIT</button>
						<button type="submit" class="btn btn-flat btn-primary">SHOW</button>
					</div>
				</div>
			</div>		
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-head">
					<header>
						<a href="#" class="margin-bottom-lg">00000000000</a>
					</header>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-2 hbox-xs">
							<div class="hbox-column width-1">
								<img class="img-circle img-responsive" alt="" src="{{url('images/avatar9.jpg')}}"></img>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="clearfix">
								<h3><a href="#" class="margin-bottom-lg">Mark Ketijerk</a></h3>
								<p>Malang, 11 Agustus 1987</p>
								<p>Jln. Raya Araya no 43, Blimbing, Malang, Jawa Timur</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<button type="submit" class="btn btn-flat btn-primary">EDIT</button>
						<button type="submit" class="btn btn-flat btn-primary">SHOW</button>
					</div>
				</div>
			</div>		
		</div>
	</div>
	@endfor
		
@stop