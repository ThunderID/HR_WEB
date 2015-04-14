@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card">

				<!-- BEGIN CONTACT DETAILS HEADER -->
				<div class="card-head card-head-sm style-primary">
					<div class="col-md-12 pt-5 ">
						<a href="{{route('hr.persons.documents.index', [$data['person']['id']])}}" class="btn btn-flat ink-reaction pull-left">
							<i class="md md-reply"></i> Kembali
						</a>
						<a href="{{route('hr.persons.documents.delete', [$data['person']['id'], $data['id']])}}" class="btn btn-flat ink-reaction pull-right">
							<i class="fa fa-trash"></i> Hapus
						</a>
					</div>
				</div>				
				<!-- END CONTACT DETAILS HEADER -->

				<!-- BEGIN CONTACT DETAILS -->
				<div class="card-body">
					<div class="hbox-md col-md-12">
						<div class="hbox-column col-md-12">
							<div class="row">

								<!-- BEGIN CONTACTS NAV -->
								<div class="col-sm-5 col-md-4 col-lg-3">
									<ul class="nav nav-pills nav-stacked">
										<li><small>CATEGORIES</small></li>
										<li><a href="{{route('hr.persons.show', [$data['person']['id']])}}">Informasi Umum  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
										<li><a href="{{route('hr.persons.relatives.index', [$data['person']['id']])}}">Kerabat </a>  <small class="pull-right text-bold opacity-75"></small></a></li>
										<li class="active"><a href="{{route('hr.persons.documents.index', [$data['person']['id']])}}">Dokumen </a> <small class="pull-right text-bold opacity-75"></small></a></li>
										<li><a href="{{route('hr.persons.works.index', [$data['person']['id']])}}">Pekerjaan </a> <small class="pull-right text-bold opacity-75"></small></a></li>
									</ul>
								</div><!--end .col -->
								<!-- END CONTACTS NAV -->

								<!-- BEGIN CONTACTS MAIN CONTENT -->
								<div class="col-sm-7 col-md-8 col-lg-9">
									<div class="row">
										<div class="col-sm-12"><h4 class="text-bold">{{$data['document']['name']}}</h4></div>
									</div>
									@foreach($data['details'] as $key => $value)
										<div class="row">
											<div class="col-sm-3"><h5 class="text-bold">{{$value['template']['field']}}</h5></div>
											<div class="col-sm-9"><h5 class="text-light">{{$value['value']}}</h5></div>
										</div>
									@endforeach
								</div><!--end .hbox-md -->
							</div><!--end .card-tiles -->
						</div><!--end .card-tiles -->
					</div><!--end .card-tiles -->
				</div><!--end .card -->
			</div><!--end .card -->
		</div>
	</div>
@stop
