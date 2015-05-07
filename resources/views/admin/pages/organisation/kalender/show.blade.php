@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords('Kantor')}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.calendars.index')}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i>&nbsp;Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i>&nbsp;Hapus
				</a>
				<a href="" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i>&nbsp;Edit
				</a>
				<a href="" class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#scheduleCreate">
					<i class="fa fa-plus-circle"></i>&nbsp;Tambah
				</a>
			</div>
		</div>
		<!-- END CARD HEADER -->

		<!-- BEGIN CARD TILES -->
		<div class="card-tiles">
			<div class = "col-md-12 hbox-md">
				<!-- BEGIN MIDDLE -->					
				<div class="hbox-column col-md-12">
					<div class="col-md-12">
						<div class="row">
							<div class="margin-bottom-xxl">
								<h1 class="text-light no-margin">{{$data['name']}}</h1>
								<h5 class="mb-30 border-bottom">
									<span class="opacity-50"><i class = "fa fa-tags"></i></span>
									@if(isset($data['charts']))
										@foreach($data['charts'] as $key => $value)
											<span class="badge style-info text-sm opacity-75 mt-5">{{$value['name']}} - {{$value['branch']['name']}}</span>
										@endforeach
									@endif
								</h5>
								<h3 class="text-light no-margin">
									<span class="selected-day">&nbsp;</span> &nbsp;<small class="selected-date">&nbsp;</small>
									<span class="pull-right">
										<a id="calender-prev" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-angle-left"></i></a>
										<a id="calender-next" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-angle-right"></i></a>
									</span>
								</h3>
								<h5>
									<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
										<li data-mode="month" class="active"><a href="#">Month</a></li>
										<li data-mode="agendaWeek"><a href="#">Week</a></li>
										<li data-mode="agendaDay"><a href="#">Day</a></li>
									</ul>
								</h5>
								
									<div id="calendar"></div>
								
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	{!! Form::open(array('route' => array('hr.calendars.delete', $data['id']),'method' => 'POST')) !!}
		<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}

	{!! Form::open(array('route' => array('hr.persons.create'),'method' => 'POST')) !!}
		@include('admin.modals.schedule.create')
	{!! Form::close() !!}	

@stop


@section('js')
	{!! HTML::script('js/DemoCalendar.js')!!}
@stop
