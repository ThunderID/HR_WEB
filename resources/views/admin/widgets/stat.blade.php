<?php 
/* 
	---------------------- GUIDE -------------------------
	
	$icon  			= icon in widget use ['letters', 'documents', 'branches', 'workers']
	$mode  			= mode widget
	$data['value'] 	= number score
	$data['field']	= label score $data['value']

*/

	$icon = ['total_letters' => 'fa-envelope', 'total_branches' => 'fa-building', 'total_employees' => 'fa-users', 'total_documents' => 'fa-suitcase']; 

?>
@if ($mode == 'animation')
	<div class="col-md-3 col-sm-6">
		<div class="card">
			<div class="card-head" style='min-height:0'>
				<header style="height:38px">&nbsp;</header>
				<div class="tools" style="padding-right:0" >
				<div class="tools">
					<div class="btn-group mt-5 hide">
						<a href="{{ route('hr.organisation.branches.index') }}" class="btn btn-default btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="lihat data semua"><i class="md md-visibility"></i></a>
						<a href="javascript:;" data-content=" {{route('hr.dashboard.widgets.store')}}" class="btn btn-default btn-flat edit_widget" data-toggle="tooltip" data-placement="top" data-original-title="ubah widget"><i class="md md-settings"></i></a>
						<a href="javascript:;" data-content="{{ route('hr.dashboard.widgets.delete', ['id' => $data['id']]) }}" class="btn btn-default btn-flat del_widget" data-toggle="tooltip" data-placement="top" data-original-title="hapus widget"><i class="md md-delete"></i></a>
					</div>
				</div>
			</div><!--end .card-head -->
			<div class="card-body no-padding">
				<div class="alert alert-callout alert-{{ $data['style'] }} no-margin">
					<strong class="pull-right text-{{ $data['style'] }} text-lg"><i class="fa {{ $icon[$data['function']] }} fa-2x"></i></strong>
					<strong class="text-xl">{{ $data['number'] }}</strong><br/>
					<span class="opacity-50">{{ $data['title'] }}</span>
					<div class="stick-bottom-left-right">
						<div class="progress progress-hairline no-margin">
							<div class="progress-bar progress-bar-{{ $data['style'] }}" style="width:{{ ($data['number']*1)/100 }}%"></div>
						</div>
					</div>
				</div>
			</div><!--end .card-body -->
		</div><!--end .card -->
	</div><!--end .col -->
@else
	<div class="col-md-3 col-sm-6">
		<div class="card card-widget">
			<div class="card-head border-left border-alert-{{ $data['style'] }}" style="min-height:0px">
				<header style="height:38px">&nbsp;</header>
				<div class="tools" style="padding-right:0" >
					<div class="btn-group mt-5 hide">
						<a href="{{ route('hr.organisation.branches.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="lihat data semua"><i class="md md-visibility"></i></a>
						<a href="javascript:;" data-content=" {{route('hr.dashboard.widgets.store')}}" class="btn btn-icon-toggle btn-default btn-sm edit_widget" data-toggle="tooltip" data-placement="top" data-original-title="ubah widget"><i class="md md-settings"></i></a>
						<a href="javascript:;" data-content="{{ route('hr.dashboard.widgets.delete', ['id' => $data['id']]) }}" class="btn btn-icon-toggle btn-default btn-sm del_widget" data-toggle="tooltip" data-placement="top" data-original-title="hapus widget"><i class="md md-delete"></i></a>
					</div>
				</div>
			</div><!--end .card-head -->
			<div class="card-body no-padding">
				<div class="alert alert-callout alert-{{ $data['style'] }} no-margin" style="border:none;padding-top:0px">
					<strong class="pull-right text-{{ $data['style'] }} text-xl"><i class="fa {{ $icon[$data['function']] }} fa-2x"></i></strong>
					<strong class="text-xxl">{{ $data['number'] }}</strong><br/>
					<span class="opacity-50">{{ $data['title'] }}</span>
				</div>
			</div><!--end .card-body -->
		</div><!--end .card -->
	</div>
@endif