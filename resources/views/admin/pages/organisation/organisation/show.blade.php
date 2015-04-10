@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-head card-head-sm style-primary">
			<header style="padding-top:5px;padding-bottom:5px">
				<a href="{{route('hr.organisations.index')}}" class="btn btn-flat ink-reaction">
					<i class="md md-reply"></i> Kembali
				</a>
			</header>
		</div>
		<div class="card-body pt-10 pb-0">
			<div class="row">
				<div class="col-sm-10">
					<div class="margin-bottom-xxl row">
						<div class="col-sm-10 col-md-10">
							<h1 class="text-light no-margin">{{$data['name']}}</h1>										
						</div>											
					</div>
				</div>											
			</div>
		</div>
	</div>

	<a id="detail" class="pull-right" data-toggle="collapse" href="#detail-api" aria-expanded="false" aria-controls="collapseExample" style="margin-right:0px">
		<i class="fa fa-plus-circle fa-lg"></i> API KEYS
	</a>
	<hr class="ruler-xl"></hr>
	<div id="detail-api" class="collapse">

	<div class="row pb-25">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a href="{{route('hr.organisations.apis.create', [$data['id']])}}" class='btn btn-raised btn-primary ink-reaction mt-10'>Tambah</a>
		</div>
	</div>	
		<div class="row">
			<?php $i=0;?>
			@foreach($data['authentications'] as $key => $value)
				@if($value['role']=='application')
					@if($i%2==0 && $key!=0)
						</div>
						<div class="row">
					@endif
					<div class="col-sm-6">
						<div class="card">
							<div class="card-head card-head-sm style-primary">
								<header >
									{{'API Keys '.($i+1)}}
								</header>
							</div>
							<div class="card-body height-4">
								<div class="clearfix">
									<p class="mtm-5 mb-0 text-lg">API Key</p>
									<p class="mtm-5 mb-0 opacity-50">{{$value['client']}}</p>
									<p class="mtm-0 mb-0 text-lg">API Secret</p>
									<p class="mtm-5 mb-0 opacity-50">{{$value['secret']}}</p>
								</div>
							</div>
							<div class="card-actionbar">
								<div class="card-actionbar-row">
									<a class="btn btn-flat btn-primary ink-reaction" href="#">EDIT</a>
									<a class="btn btn-flat btn-primary ink-reaction" href="#">HAPUS</a>
								</div><!--end .card-actionbar-row -->
							</div><!--end .card-actionbar -->
						</div>
					</div>
					<?php $i++;?>
				@endif
			@endforeach
		</div>
	</div>

	<a id="detail" class="pull-right" data-toggle="collapse" href="#detail-superadmin" aria-expanded="false" aria-controls="collapseExample" style="margin-right:0px">
		<i class="fa fa-plus-circle fa-lg"></i> SUPERADMIN
	</a>
	<hr class="ruler-xl"></hr>
	<div id="detail-superadmin" class="collapse">
		<div class="row pb-25">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<a href="#" class='btn btn-raised btn-primary ink-reaction mt-10'>Tambah</a>
			</div>
		</div>	
		<div class="row">
			<?php $i=0;?>
			@foreach($data['authentications'] as $key => $value)
				@if($value['role']=='superadmin')
					@if($i%2==0 && $key!=0)
						</div>
						<div class="row">
					@endif
					<div class="col-sm-6">
						<div class="card">
							<div class="card-head card-head-sm style-primary">
								<header >
									{{'Superadmin '.($i+1)}}
								</header>
							</div>
							<div class="card-body height-4">
								<div class="clearfix">
									<p class="mtm-5 mb-0 text-lg">{{$value['person']['nick_name']}}</p>
									<p class="mtm-5 mb-0 opacity-50">{{$value['client']}}</p>
								</div>
							</div>
							<div class="card-actionbar">
								<div class="card-actionbar-row">
									<a class="btn btn-flat btn-primary ink-reaction" href="#">EDIT</a>
									<a class="btn btn-flat btn-primary ink-reaction" href="#">HAPUS</a>
								</div><!--end .card-actionbar-row -->
							</div><!--end .card-actionbar -->
						</div>
					</div>
					<?php $i++;?>
				@endif
			@endforeach
		</div>
	</div>
@stop