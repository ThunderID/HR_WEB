@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<form class="form" role="form" action="{{route('hr.report.attendance.post', ['page' => 1])}}" method="get">
		<div class="input-daterange input-group" id="demo-date-range">
			<div class="input-group-content">
				<input class="form-control" name="start" type="text">
				<label>Date range</label>
			</div>
			<span class="input-group-addon">to</span>
			<div class="input-group-content">
				<input class="form-control" name="end" type="text">
				<div class="form-control-line"></div>
			</div>
		</div>
		
		<button type="submit" class="btn btn-flat btn-accent">GENERATE REPORT</button>
	</form>
@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

@section('js')
	{!! HTML::script('js/bootstrap-datepicker.js')!!}
	{!! HTML::script('js/summernote.min.js')!!}
	<script type="text/javascript">
		$(document).ready(function () {
			$(".date_mask").inputmask();
        });	
	</script>
@stop