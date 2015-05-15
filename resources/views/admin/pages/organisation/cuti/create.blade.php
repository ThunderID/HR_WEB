@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		@if($data['id'])
			<form class="form" role="form" action="{{route('hr.workleaves.update', $data['id'])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.workleaves.store')}}" method="post">
		@endif
			<!-- END DEFAULT FORM ITEMS -->
			<div class="card-head style-primary">
				<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
					<li class="active"><a>PROFIL</a></li>
				</ul>
			</div><!--end .card-head -->		
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body tab-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="name" name="name" value="{{$data['name']}}">
									<label for="name">Judul</label>
								</div>
							</div><!--end .col -->
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="quota" name="quota" value="{{$data['quota']}}">
									<label for="quota">Quota Cuti</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
										{!! Form::input('text', 'apply', $data['apply'], ['class' => 'form-control modal_schedule_date_start date_mask', 'data-inputmask' => '"alias" : "date"']) !!}							
									<label for="apply">Mulai Berlaku</label>
								</div>
							</div><!--end .col -->
							<div class="col-md-6">
								<div class="form-group">
										{!! Form::input('text', 'expired', $data['expired'], ['class' => 'form-control modal_schedule_date_start date_mask', 'data-inputmask' => '"alias" : "date"']) !!}							
									<label for="expired">Expire</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->	

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input name="chart" id="chart" class="form-control getCompany">
									<label for="chart">Posisi</label>
								</div>
							</div>
						</div>				
					</div>
				</div>
			</div>
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" href="{{ URL::previous() }}">BATAL</a>
					<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
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
		$(".date_mask").inputmask();
		$('.getCompany').select2({
			tokenSeparators: [","],
			tags: [],
			placeholder: "",
			minimumInputLength: 1,
			selectOnBlur: true,
            ajax: {
                url: "{{route('hr.ajax.company')}}",
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
                            return {
                                text: item.name + ' department '+ item.tag + ' di '+ item.branch.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
    </script>
@stop

@section('Workleave-active')
	active
@stop
