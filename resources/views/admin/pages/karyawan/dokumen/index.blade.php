@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-md-12 pt-5 ">
				<a href="{{route('hr.persons.index')}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i> Kembali
				</a>
			</div>
		</div>				
		<!-- END CARD HEADER -->
		<div class="card-tiles">
			<div class="hbox-column col-md-2">
				<ul class="nav nav-pills nav-stacked">
					<li><small>CATEGORIES</small></li>
					<li><a href="{{route('hr.persons.show', [$data['id']])}}">Profil  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.relatives.index', [$data['id']])}}">Kerabat </a>  <small class="pull-right text-bold opacity-75"></small></a></li>
					<li class="active"><a href="{{route('hr.persons.documents.index', [$data['id']])}}">Dokumen </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.works.index', [$data['id']])}}">Pekerjaan </a> <small class="pull-right text-bold opacity-75"></small></a></li>
				</ul>
			</div>
			<div class="hbox-column col-md-10">
				<button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#demo">Tambah Data</button>
				<div id="demo" class="row collapse out">
					<div class="col-md-12">
						<form class="form" role="form" action="{{route('hr.persons.documents.store', [$data['id']])}}" method="post">
							<ul class="list-unstyled" id="workList">
								<li class="clearfix">
									<br/>
									<div class="card">
										<!-- BEGIN RELASI DETAIL -->			
										<div class="card-head">
											<ul class="nav nav-tabs" data-toggle="tabs">
												@foreach($docs as $key => $value)
													<li @if($key==0) class="active" @endif><a href="#docs[{{$key}}]">{{$value['id']}}</a></li>
												@endforeach
											</ul>
										</div>

										<div class="card-body tab-content">
											@foreach($docs as $key => $value)
												<div class="tab-pane  @if($key==0) active @endif" id="#docs[{{$key}}]">
													<input name="documents_id[{{$key}}]"type="hidden" value="{{$value['id']}}">											
													<input name="documents[{{$key}}]"type="hidden" value="">
													@foreach($value['templates'] as $key2 => $value2)
														<div class="form-group">
															@if($value2['type']=='numeric' || $value2['type']=='string')
																<input name="template_value[{{$key}}][{{$key2}}]" id="template_value[{{$key}}][{{$key2}}]" class="form-control">											
																<label for="template_value[{{$key}}][{{$key2}}]">{{$value2['field']}}</label>
																<input name="template_id[{{$key}}][{{$key2}}]"type="hidden" value="{{$value2['id']}}">											
															@elseif($value2['type']=='date')
																<div class="input-daterange input-group" id="template_value[{{$key}}][{{$key2}}]" style="width:100%;">
																	<div class="input-group-content">
																		<input type="text" class="form-control" name="template_value[{{$key}}][{{$key2}}]">
																	</div>
																</div>
																<label for="template_value[{{$key}}][{{$key2}}]">{{$value2['field']}}</label>
																<input name="template_id[{{$key}}][{{$key2}}]"type="hidden" value="{{$value2['id']}}">											
															@elseif($value2['type']=='text')
																<textarea name="template_value[{{$key}}][{{$key2}}]" id="template_value[{{$key}}][{{$key2}}]" class="form-control"></textarea>										
																<label for="template_value[{{$key}}][{{$key2}}]">{{$value2['field']}}</label>
																<input name="template_id[{{$key}}][{{$key2}}]"type="hidden" value="{{$value2['id']}}">											
															@endif
														</div>
													@endforeach
												</div>
												<!-- END RELASI DETAIL -->
											@endforeach
										</div>
									</div>
								</li>
							</ul>
							<div class="card-actionbar">
								<div class="card-actionbar-row">
									<a class="btn btn-flat" href="{{route('hr.persons.index')}}">BATAL</a>
									<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
								</div><!--end .card-actionbar-row -->
							</div><!--end .card-actionbar -->
						</form>
					</div>
				</div>
				<div class="page-header no-border holder">
					<h4 class="text-accent">Daftar Dokumen</h4>
				</div>
				<div class="list-results pl-10" style="margin-bottom:0px;">
					@foreach($documents as $key => $value)	
						<div class="row">
							<div class="col-xs-12">
								<a href="{{route('hr.persons.documents.show', [$data['id'], $value['id']])}}">
									<p class="clearfix">
										<span class="fa fa-fw fa-file-o fa-2x pull-left"></span>
										<span class="pull-left">
											<span class="text-bold">{{date("l, d F Y", strtotime($value['created_at']))}}</span><br/>
											<span class="opacity-50">{{$value['document']['name']}}</span><br/>
										</span>
									</p>
								</a>
							</div>
						</div><!--end .row -->
					@endforeach
				</div><!--end .hbox-md -->
				@if(count($documents))
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
@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

