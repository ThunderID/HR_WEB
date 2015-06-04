@section('breadcrumb')
	<li>Home</li>
	<li>{{ucwords($data['name'])}}</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		@if($calendar['id'])
			<form class="form" role="form" action="{{route('hr.organisation.calendars.update', ['id' => $calendar['id'], 'org_id' => $data['id'], 'src' => Input::get('src')])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.organisation.calendars.store', ['org_id' => $data['id']])}}" method="post">
		@endif
			<!-- END DEFAULT FORM ITEMS -->
			<div class="card-head style-primary">
				<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
					<li class="active"><a>TAMBAH KALENDER</a></li>
				</ul>
			</div><!--end .card-head -->		
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body tab-content">
				<div class="form-group">
					<input type="text" class="form-control input-lg" id="name" name="name" value="{{$calendar['name']}}">
					<label for="name">Nama Kalender</label>
				</div><!--end .form -->
				<div class="form-group">
					<input type="text" class="form-control input-lg getWorkdays" id="workdays" name="workdays" value="{{$calendar['workdays']}}">
					<label for="workdays">Hari Kerja</label>
				</div><!--end .form -->
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control time_mask" id="start" name="start" value="{{$calendar['start']}}">
							<label for="start">Jam Masuk (Default)</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control time_mask" id="end" name="end" value="{{$calendar['end']}}">
							<label for="end">Jam Pulang (Default)</label>
						</div>
					</div>
				</div>
			</div>

			{!!Form::hidden('org_id', $data['id'])!!}
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" href="{{ route('hr.organisation.calendars.index', ['org_id' => $data['id']]) }}">BATAL</a>
					<button type="submit" class="btn btn-flat btn-primary">SIMPAN DATA</button>
				</div>
			</div>			
		</form>
	</div>
@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

@section('js')
	{!! HTML::script('js/jquery.inputmask.min.js')!!}
	<script type="text/javascript">
		$(document).ready(function () {
			$('.time_mask').inputmask('h:s', {placeholder: 'hh:mm'});
			$('.getWorkdays').select2({
				tokenSeparators: [",", " ", "_", "-", "."],
				tags: ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'],
				placeholder: "",
				selectOnBlur: true,
				createSearchChoice: function() { return null; }
	        });
		});
	</script>
@stop