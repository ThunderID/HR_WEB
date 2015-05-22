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



@stop