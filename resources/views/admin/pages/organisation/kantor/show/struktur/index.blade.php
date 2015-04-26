@extends('admin.pages.organisation.kantor.show')
@section('kantor.show')
	<div class="card-actionbar">
		<a class="btn btn-primary pull-right" href="" data-toggle="modal" data-target="#add_modal">TAMBAH</a>
	</div>
	<div class="clearfix">&nbsp;</div>
	@foreach($data['charts'] as $key => $value)
		<div class="row">
			<div class="col-sm-10">@for($i=1;$i<count(explode(',',$value['path']));$i++)&nbsp;&nbsp;&nbsp;@endfor <i class="fa fa-chevron-circle-right"></i>&nbsp;&nbsp;{{$value['name']}}</div>
			<div class="text-right col-sm-1">
				<a href="#" data-toggle="modal" data-target="#del_modal2_{{$value['id']}}">
					<i class="fa fa-trash"></i>
				</a>
			</div>
			<div class="text-right col-sm-1">
				<a class="btn_edit" href="{{route('hr.organisation.charts.show', [$data['id'], $value['id'], 'page' => 1, 'tag' => $value['tag']])}}">
					<i class="fa fa-pencil"></i>
				</a>
			</div>
		</div>

		{!! Form::open(array('route' => array('hr.organisation.branches.delete', $data['id']),'method' => 'POST')) !!}
			<div class="modal fade" id="del_modal2_{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="del_modal2_{{$value['id']}}" aria-hidden="true">
				@include('admin.modals.delete.delete')
			</div>	
		{!! Form::close() !!}	
	@endforeach

	{!! Form::open(array('route' => array('hr.organisation.charts.store', $data['id']),'method' => 'POST')) !!}
		<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
			@include('admin.modals.branch.create')
		</div>	
	{!! Form::close() !!}	
@stop
