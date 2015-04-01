@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-body pt-10 pb-0">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<a href='/admin/person-basic-information/add' class='btn btn-primary ink-reaction mt-10'>Create New</a>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form pull-right">
					{!! Form::open(['route' => null, 'class' => 'form-inline']) !!}
						<div class="form-group col-sm-9">
							<input type="text" class="form-control" name="q" style="width:100%">
							<label for="">Search</label>
						</div>
						<button class="btn  btn-default-light ink-reaction" type="submit">Search</button>
					{!! Form::close() !!}
				</div>
				
			</div>
		</div>
	</div>
	
	@for($x=0; $x<3; $x++)
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-2 hbox-xs">
							<div class="hbox-column width-1 pt-5">
								<img class="img-circle img-responsive" alt="" src="{{url('images/male.png')}}"></img>
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
							<div class="hbox-column width-1 pt-5">
								<img class="img-circle img-responsive" alt="" src="{{url('images/female.png')}}"></img>
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