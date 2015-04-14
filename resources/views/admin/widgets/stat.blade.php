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
		<div class="card">
			<div class="card-body no-padding">
				<div class="alert alert-callout alert-{{ $data['style'] }} no-margin">
					<strong class="pull-right text-{{ $data['style'] }} text-lg"><i class="fa {{ $icon[$data['function']] }} fa-2x"></i></strong>
					<strong class="text-xl">{{ $data['number'] }}</strong><br/>
					<span class="opacity-50">{{ $data['title'] }}</span>
				</div>
			</div><!--end .card-body -->
		</div><!--end .card -->
	</div>
@endif