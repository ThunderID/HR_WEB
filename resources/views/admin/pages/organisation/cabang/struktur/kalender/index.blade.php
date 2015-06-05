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
		<div class="card-body">
			<div class = "col-md-12 hbox-md">
				@include('admin.filters.chart')

				<!-- BEGIN MIDDLE -->					
				<div class="hbox-column col-md-10" id="sidebar_mid">
					
					<div class="row mb-20">
						<h1 class="text-light no-margin pull-left pl-5">Kalender Kerja {{$chart['name']}}</h1>
						<div class="clearfix">&nbsp;</div>
						<h5 class="pl-10">
							@if(count($follows)) Total data <strong>{{$paginator->total_item}}</strong> @else Tidak ada data @endif
						</h5>
						<div class="btn-group btn-group-sm pull-right">
							@if (Input::get('q'))
								<a href="{{ route('hr.organisations.index') }}" class="btn btn-default-light mr-20"><i class="fa fa-trash"></i> Hapus Filter</a>
							@endif
						</div>
					</div><!--end .margin-bottom-xxl -->
					<div class="list-results" style="margin-bottom:0px;">
						@foreach($follows as $key => $value)	
							@if($key%2==0 && $key!=0)
								</div>
								<div class="list-results" style="margin-bottom:0px;">
							@endif		
							
							<div class="col-xs-12 col-md-6 hbox-xs">
								@include('admin.widgets.contents', [
									'route'				=> '',
									'mode'				=> 'list',
									'data_content'		=> $value['calendar'],
									'toggle'			=> ['follow' => true],
									'class'				=> ['top'		=> 'height-2']
								])
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
	{!! Form::open(array('url' => route('hr.charts.calendars.store', ['id' => $chart['id'], 'chartid' => $chart['id']]),'method' => 'POST')) !!}
		@include('admin.modals.schedule.create_calendar')
	{!! Form::close() !!}	

	{!! Form::open(array('url' => route('hr.charts.calendars.delete', ['id' => $value['id'], 'chartid' => $value['chart_id']]),'method' => 'POST')) !!}
		<div class="modal fade modalOrganisationKalendar" id="del_organisation_kalendar_modal" tabindex="-1" role="dialog" aria-labelledby="del_organisation_kalendar_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}
@stop

@section('js')
	<script type="text/javascript">
		$('.modalOrganisationKalendar').on('show.bs.modal', function(e) {
			var action = $(e.relatedTarget).attr('data-action');
			$(this).parent().attr('action', action);
		});	

		$('.getCalendar').select2({
			tokenSeparators: [","],
			tags: [],
			placeholder: "",
			minimumInputLength: 1,
			selectOnBlur: true,
            ajax: {
                url: "{{route('hr.ajax.calendar')}}",
                dataType: 'json',
                quietMillis: 500,
               	data: function (term) {
                    return {
                        term: term
                    };
                },
                results: function (data) {
                    return {
                        results: $.map(data, function (item) {
                        	console.log(item);
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
	</script>
@stop
