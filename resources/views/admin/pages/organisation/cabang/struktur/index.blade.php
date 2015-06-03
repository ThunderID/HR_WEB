@extends('admin.pages.organisation.cabang.show')
@section('kantor.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#alamat">Struktur</a></li>
	</ul>
	<br/>
	<div class="tab-content">
		<div class="card-actionbar">
			<a class="btn btn-primary pull-right" href="" data-toggle="modal" data-target="#add_modal">TAMBAH</a>
		</div>
		<div class="clearfix">&nbsp;</div>
		@forelse($charts as $key => $value)
			<div class="row">
				<div class="col-sm-10">
					@for($i=1;$i<count(explode(',',$value['path']));$i++)&nbsp;&nbsp;&nbsp;@endfor 
					<i class="fa fa-chevron-circle-right"></i>&nbsp;&nbsp;<a href="{{route('hr.branches.charts.show', ['branchid' => $branch['id'], 'org_id' => $data['id'], 'id' => $value['id']])}}">{{$value['name']}} - {{$value['tag']}}</a>
				</div>
				<div class="text-right col-sm-2">
					<a class="btn ink-reaction btn-icon-toggle btn_edit" href="{{route('hr.branches.charts.show', ['org_id' => $data['id'], 'id' => $value['id'], 'page' => 1, 'tag' => $value['tag'], 'branchid' => $branch['id']])}}" data-toggle="tooltip" data-placement="top" data-original-title="edit struktur">
						<i class="fa fa-pencil"></i>
					</a>
					<a href="javascript:;" class="btn ink-reaction btn-icon-toggle del_charts" data-toggle="tooltip" data-target="#del_modal2_{{$value['id']}}" data-placement="top" data-original-title="hapus struktur">
						<i class="fa fa-trash"></i>
					</a>
				</div>
			</div>

			{!! Form::open(array('url' => route('hr.branches.charts.delete', ['org_id' => $data['id'], 'id' => $value['id'], 'branchid' => $branch['id']]),'method' => 'POST')) !!}
				<div class="modal fade" id="del_modal2_{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="del_modal2_{{$value['id']}}" aria-hidden="true">
					@include('admin.modals.delete.delete')
				</div>	
			{!! Form::close() !!}	
		@empty
			<div class="alert alert-callout alert-warning" role="alert">
				<strong>Perhatian!</strong> Data belum dimasukkan.
			</div>
		@endforelse		

		{!! Form::open(array('route' => array('hr.branches.charts.store', $branch['id']),'method' => 'POST')) !!}
			<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
				@include('admin.modals.chart.create')
			</div>	
		{!! Form::close() !!}	
	</div>
@stop
