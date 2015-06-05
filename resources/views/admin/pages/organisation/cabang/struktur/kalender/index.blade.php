@section('breadcrumb')
	<li>Home</li>
	<li>{{ucwords($data['name'])}}</li>
	<li>{{ucwords($branch['name'])}}</li>
	<li class='active'>{{ucwords($chart['name'])}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.branches.charts.index', ['page' => 1,'org_id' => $data['id'], 'branchid' => $branch['id']])}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i>&nbsp;Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i>&nbsp;Hapus
				</a>
				<a href="{{route('hr.branches.charts.edit', ['id' => $chart['id'],'branchid' => $branch['id'], 'org_id' => $data['id'], 'src' => 'show'])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i>&nbsp;Edit
				</a>
				<a href="{{route('hr.persons.index', ['page' => 1, 'branch' => $branch['id'], 'chart' => $chart['id'], 'org_id' => $data['id']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-users"></i>&nbsp;Karyawan
				</a>
				<a href="" class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#calendarCreate" data-id="0" data-action="{{ route('hr.charts.calendars.store', $data['id']) }}">
					<i class="fa fa-plus-circle"></i>&nbsp;Kalender
				</a>
			</div>
		</div>
		<!-- END CARD HEADER -->

		<!-- BEGIN CARD TILES -->
		<div class="card-tiles">
			<div class = "col-md-12 hbox-md">
				@include('admin.filters.chart')

				<!-- BEGIN MIDDLE -->					
				<div class="hbox-column col-md-10" id="sidebar_mid">
					
					<div class="row">
						<span class="text-light text-lg">
							@if(count($follows)) Total data <strong>{{$paginator->total_item}}</strong> @else Tidak ada data @endif
						</span>
						<div class="btn-group btn-group-sm pull-right">
							@if (Input::get('q'))
								<a href="{{ route('hr.organisations.index') }}" class="btn btn-default-light mr-20"><i class="fa fa-trash"></i> Hapus Filter</a>
							@endif
						</div>
					</div><!--end .margin-bottom-xxl -->
					<div class="row list-results" style="margin-bottom:0px;">
						@foreach($follows as $key => $value)	
							@if($key%2==0 && $key!=0)
								</div>
								<div class="list-results" style="margin-bottom:0px;">
							@endif		
							
							<div class="col-xs-12 col-lg-6 hbox-xs">
								@include('admin.widgets.contents', [
									'route'				=> '',
									'mode'				=> 'list',
									'data_content'		=> $value['calendar'],
									'toggle'			=> ['follow' => true],
									'class'				=> ['top'		=> 'height-2']
								])
								{!! Form::open(array('url' => route('hr.charts.calendars.delete', ['id' => $value['id'], 'chartid' => $value['chart_id']]),'method' => 'POST')) !!}
									<div class="modal fade" id="del_organisation_modal_{{$value['calendar']['id']}}" tabindex="-1" role="dialog" aria-labelledby="del_organisation_modal_{{$value['calendar']['id']}}" aria-hidden="true">
										@include('admin.modals.delete.delete')
									</div>	
								{!! Form::close() !!}
							</div>
						@endforeach
					</div>
					@if(count($follows))
						@include('admin.helpers.pagination')
					@endif
				</div>

				<!-- BEGIN RIGHTBAR -->
			</div>
		</div>
	</div>
@stop
