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
								<p class="mt-0 mb-0 text-lg"><a href="#">000-12345-6789-0</a></p>
								<p class="mtm-15 mb-0 text-xl"><a href="#">Mark Ketijerk</a></p>
								<p class="mt-0 mb-0">Malang, 11 Agustus 1987</p>
								<p class="mt-0 mb-0">Jln. Raya Araya no 43, Blimbing, Malang, Jawa Timur</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<a href="javascript:;" class="btn btn-flat btn-primary ink-reaction">EDIT</a>
						<a href="javascript:;" class="btn btn-flat btn-primary ink-reaction">LIHAT</a>
					</div>
				</div>
			</div>		
		</div>
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
								<p class="mt-0 mb-0 text-lg"><a href="#">000-86429-7531-0</a></p>
								<p class="mtm-15 mb-0 text-xl"><a href="#">Mark Ketijerk</a></p>
								<p class="mt-0 mb-0">Malang, 11 Agustus 1987</p>
								<p class="mt-0 mb-0">Jln. Raya Araya no 43, Blimbing, Malang, Jawa Timur</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<a href="javascript:;" class="btn btn-flat btn-default ink-reaction">EDIT</a>
						<a href="javascript:;" class="btn btn-flat btn-primary ink-reaction">LIHAT</a>
					</div>
				</div>
			</div>		
		</div>
	</div>
	@endfor
		
@stop