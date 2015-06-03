@section('breadcrumb')
	<li>Home</li>
	<li>Report</li>
	<li class='active'>{{ $controller_name }}</li>
@stop

@section('content')
	<div class="card">
		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<header>
				<h3>Report</h3>
			</header>
		</div>
		<div class="card-body">
			@if(Route::currentRouteName()=='hr.report.attendance.get')
				{!! Form::open(array('route' => ['hr.report.attendance.post', 'page' => 1], 'class' => 'form', 'method' => 'get')) !!}
			@elseif(Route::currentRouteName()=='hr.report.performance.get')
				{!! Form::open(array('route' => ['hr.report.performance.post', 'page' => 1], 'class' => 'form', 'method' => 'get')) !!}
			@elseif(Route::currentRouteName()=='hr.report.wages.get')
				{!! Form::open(array('route' => ['hr.report.wages.post', 'page' => 1], 'class' => 'form', 'method' => 'get')) !!}
			@endif
				<div class="form-group">
					<div class="input-daterange input-group">
						<div class="input-group-content">
							{!! Form::input('text', 'start', null, ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"']) !!}							
							<label>Date range</label>
						</div>
						<span class="input-group-addon">to</span>
						<div class="input-group-content">
							{!! Form::input('text', 'end', null, ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"']) !!}
							<div class="form-control-line"></div>
						</div>
						<span class="input-group-addon">
							<button type="submit" class="btn btn-flat btn-primary">GENERATE REPORT</button>
						</span>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

@section('js')
	{!! HTML::script('js/bootstrap-datepicker.js')!!}	
	{!! HTML::script('js/jquery.inputmask.min.js')!!}

	<script type="text/javascript">
		$(document).ready(function () {
			$(".date_mask").inputmask();

			$('.date_picker').datepicker({
				format: 'dd/mm/yyyy',
				autoclose: true, 
				todayHighlight: true				
			});
        });	
	</script>
@stop