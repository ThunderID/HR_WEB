@extends('admin.pages.personalia.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#details">Karir</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="details">
			<br/>	
				<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#workCreate" data-value-id="0" data-action="{{route('hr.persons.works.store', $data['id'])}}">Tambah Data</button>
			<br/>	
			<div class="tab-pane" id="details">
				<br/>
				@if(count($works) > 0)
					<ul class="timeline collapse-lg timeline-hairline no-shadow">						
						@foreach($works as $key => $value)
							@if($key==0)
								<li class="timeline-inverted">
							@else
								<li>
							@endif
								<div class="timeline-circ style-accent"></div>
								<div class="timeline-entry">
									<div class="card style-default-light">
										<div class="card-body small-padding">
											<small class="text-uppercase text-primary pull-right">{{date("F Y", strtotime($value['start']))}} - @if($value['end']=='0000-00-00') Present @else {{date("F Y", strtotime($value['end']))}} @endif</small>
											<p>
												<span class="text-lg text-medium">{{($value['chart']['name'] ? $value['chart']['name'] : $value['position'])}} ({{$value['status']}})</span><br/>
												<span class="text-lg text-light">{{($value['chart']['branch']['name'] ? $value['chart']['branch']['name'] : $value['organisation'])}}</span>
											</p>
											<p>
												@if(empty ($value['reason_end_job']))
													{{'Pegawai Aktif'}}
												@else
													{{'Pegawai Nonaktif'}}
													<br/>
												@endif
												
												{{$value['reason_end_job']}}
											</p>

											<a class="btn pull-right ink-reaction btn-icon-toggle del-modal" type="button" data-toggle="modal" data-target="#del_modal_relation_{{$value['id']}}" data-action="{{ route('hr.persons.works.delete', ['person_id' => $data['id'], 'id' => $value['id']]) }}">
										<i class="fa fa-trash"></i>
									</a>	

	{!! Form::open(array('route' => array('hr.persons.works.delete',  $data['id'], $value['id']),'method' => 'POST')) !!}
		<div class="modal fade" id="del_modal_relation_{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="del_modal_relation_{{$value['id']}}" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}	
											<a data-toggle="modal" data-target="#workCreate" class="btn pull-right ink-reaction btn-icon-toggle" data-action="{{route('hr.persons.works.update', ['person_id' => $data['id'], 'id' => $value['id']])}}" data-id="{{$data['id']}}" data-value-id="{{$value['id']}}" data-chart-id="{{$value['chart_id']}}" data-work-start="{{date('d-m-Y', strtotime($value['start'])) }}" data-work-end="@if(is_null($value['end'])||$value['end']=='0000-00-00'){{'null'}}@else{{date('d-m-Y', strtotime($value['end']))}}@endif" data-reason-resign="@if($value['reason_end_job']){{$value['reason_end_job']}}@endif" data-work-status="{{$value['status']}}" data-work-position="{{$value['position']}}" data-work-organisation="{{$value['organisation']}}" data-work-company-path="{{$value['chart']['path']}}" data-work-company-name="{{$value['chart']['name']}}" data-work-branch-name="{{$value['chart']['branch']['name']}}" data-work-calendar-id="{{ $value['calendar_id'] }}">
												<i class="fa fa-pencil" style="margin-right:0px"></i>
											</a>
							
										</div>
									</div>
								</div>
							</li>
						@endforeach
					</ul><!--end .timeline -->
					@if(count($works))
						@include('admin.helpers.pagination')
					@endif
				@else
					<ul class="list-unstyled">
						<div class="alert alert-callout alert-warning" role="alert">
							<strong>Perhatian!</strong> Data belum dimasukkan.
						</div>					
					</ul>
				@endif
			</div>
		</div>
	</div>

	<!-- BEGIN MODAL -->
	<?php $key = 0;?>
	<?php $isNew = true;?>
	<?php $value = null;?>
	
	{!! Form::open(['route' => ['hr.persons.works.update', $data['id']], 'method' => 'post', 'class' => 'modal_form_work']) !!}
			@include('admin.modals.work.create')
	{!! Form::close() !!}
@stop
