@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-md-12 pt-5 ">
				<div class="row">
					<div class="col-md-12">
						<a href="{{route('hr.persons.index')}}" class="btn btn-flat ink-reaction pull-left">
							<i class="md md-reply"></i> Kembali
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- END CARD HEADER -->
		<div class="card-tiles">
			<div class="hbox-column col-md-2">
				<ul class="nav nav-pills nav-stacked">
					<li><small>CATEGORIES</small></li>
					<li><a href="{{route('hr.persons.show', [$data['id']])}}">Profil  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.relatives.index', [$data['id']])}}">Kerabat </a>  <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.documents.index', [$data['id']])}}">Dokumen </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					<li class="active"><a href="{{route('hr.persons.works.index', [$data['id']])}}">Pekerjaan </a> <small class="pull-right text-bold opacity-75"></small></a></li>
				</ul>
			</div>
			<div class="hbox-column col-md-10">
				<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#demo2">Tambah Data</button>
				<div id="demo2" class="row collapse @if($work['id']) in @else out @endif">
					<div class="col-md-12">
						@if($work['id'])
							<form class="form" role="form" action="{{route('hr.persons.works.update', [$data['id'], $work['id']])}}" method="post">
						@else
							<form class="form" role="form" action="{{route('hr.persons.works.store', $data['id'])}}" method="post">
						@endif
							<h4 class="text-accent">Data Pekerjaan </h4>
							<br/>
							<div class="form-group">
								<input name="work_company" id="work_company" class="form-control getCompany" data-comp="">											
								<label for="work_company">Posisi</label>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="work_status" name="work_status" value="{{$work['status']}}">
								<label for="work_status">Status Pegawai (contract, trial, permanent, internship)</label>
							</div>
							<div class="form-group">
								<div class="input-daterange input-group" id="work_start" style="width:100%;">
									<div class="input-group-content">
										<input type="text" class="form-control" id="work_start" name="work_start" value="{{$work['start']}}">
									</div>
								</div>
								<label for="work_start">Mulai Bekerja</label>
							</div>
							<div class="form-group">
								<div class="input-daterange input-group" id="work_end" style="width:100%;">
									<div class="input-group-content">
										<input type="text" class="form-control" id="work_end" name="work_end" value="{{$work['end']}}">
									</div>
								</div>
								<label for="work_end">Berhenti Bekerja</label>
							</div>
							<div class="form-group">
								<textarea style="resize: vertical;" name="work_quit_reason" id="work_quit_reason" class="form-control" rows="3">{{$work['reason_end_job']}}</textarea>
								<label for="work_quit_reason">Alasan Berhenti</label>
							</div>

							<div class="form-group text-right">
								<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
							</div><!--end .card-actionbar -->
						</form>
					</div>
				</div>
				<div class="page-header no-border holder">
					<h4 class="text-accent">Karir</h4>
				</div>
				<div class="tab-pane" id="details">
					<br/>
					<ul class="timeline collapse-lg timeline-hairline no-shadow">
						@foreach($works as $key => $value)
							@if($key==0)
								<li class="timeline-inverted">
							@else
								<li>
							@endif
								<div class="timeline-circ style-accent"></div>
								<div class="timeline-entry">
									<div class="card style-default-bright">
										<div class="card-body small-padding">
											<a href="{{ route('hr.persons.works.edit' ,[ $data['id'],$value['id']]) }}" class="btn pull-right ink-reaction btn-floating-action btn-primary" type="button">
												<i class="fa fa-pencil"></i>
											</a>
											<small class="text-uppercase text-primary pull-right">{{date("F Y", strtotime($value['start']))}} - @if($value['end']=='0000-00-00') Present @else {{date("F Y", strtotime($value['end']))}} @endif</small>
											<p>
												<span class="text-lg text-medium">{{$value['organisation_chart']['name']}} ({{$value['status']}})</span><br/>
												<span class="text-lg text-light">{{$value['organisation_chart']['branch']['name']}}</span>
											</p>
											<p>
												{{$value['reason_end_job']}}
											</p>
										</div>
									</div>
								</div>
							</li>
						@endforeach
					</ul><!--end .timeline -->
					@if(count($works))
						@include('admin.helpers.pagination')
					@else
						<div class="row">
							<div class="col-sm-12 text-center">
								<p>Tidak ada data</p>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

@section('js')
	{!! HTML::script('js/bootstrap-datepicker.js')!!}
	{!! HTML::script('js/microtemplating.min.js')!!}
	{!! HTML::script('js/pluginmicrotemplating.min.js')!!}

	<script type="text/javascript">
		@if ($work['id'])
			var preload_data = [];
			var id = {{$work['organisation_chart_id']}};
			var text ="{{$work['organisationchart']['name'].' of '.$work['organisationchart']['branch']['name']}}";
			preload_data.push({ id: id, text: text});
        @else
            var preload_data = [];
        @endif

		$('.getCompany').select2({
			tokenSeparators: [",", " "],
			tags: [],
			minimumInputLength: 3,
			placeholder: "",
			maximumSelectionSize: 1,
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
                                text: item.name +' of '+ item.branch.name,
                                id: item.id
                            }
                        })
                    };
                },
				query: function (query){
				    var data = {results: []};
				     
				    $.each(preload_data, function(){
				        if(query.term.length == 0 || this.text.toUpperCase().indexOf(query.term.toUpperCase()) >= 0 ){
				            data.results.push({id: this.id, text: this.text });
				        }
				    });

				    query.callback(data);
				}
            }
        });
        $('.getCompany').select2('data', preload_data );
    </script>
@stop