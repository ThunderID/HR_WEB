@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.documents.index')}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i> Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i> Hapus
				</a>
				<a href="{{route('hr.documents.edit', [$data['id']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i> Edit
				</a>				
				<a href="#" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-print"></i> Print
				</a>				
			</div>
		</div>
		<!-- END CARD HEADER -->

		<!-- BEGIN CARD TILES -->
		<div class="card-tiles">
			<!-- BEGIN LEFTBAR -->
			<div class="hbox-column col-md-2" id="sidebar_left">
				<ul class="nav nav-pills nav-stacked">
					<li class="text-primary">CATEGORIES</li>
					<li @if(is_null($persons)) class="active" @endif><a href="{{route('hr.documents.show', [$data['id']])}}">@if(!count($data['templates'])) <i class="fa fa-exclamation pull-right mt-5 text-warning"></i> @endif Detail  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					<li @if(($persons)) class="active" @endif><a href="{{route('hr.document.persons.index', [$data['id'], 'page' => 1])}}">Karyawan </a>  <small class="pull-right text-bold opacity-75"></small></a></li>
				</ul>
			</div>

			<!-- BEGIN MIDDLE -->					
			<div class="hbox-column col-md-9" id="sidebar_mid">
				<div class="pull-left width-3 clearfix hidden-xs">
				</div>
				<h1 class="text-light no-margin">{{ucwords($data['name'])}}</h1>
				<h5>
					{{(isset($paginator) ? $paginator->total_item.' Dokumen' : '')}}
				</h5>
				&nbsp;&nbsp;
				@if(is_null($persons))
					<ul class="nav nav-tabs" data-toggle="tabs">
						<li class="active"><a href="#details">Template Dokumen</a></li>
					</ul>
					<div class="tab-content height-8">
						<div class="tab-pane active" id="details">
							<br/>
							@foreach($data['templates'] as $key => $value)
								<div class="row">
									<div class="col-sm-10">{{ucwords($value['field'])}} ({{$value['type']}})</div>
									<div class="text-right col-sm-2">
										<a href="{{route('hr.document.templates.delete', [$value['id']])}}">
											<i class="fa fa-trash"></i>
										</a>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				@else
					<ul class="nav nav-tabs" data-toggle="tabs">
						<li class="active"><a href="#details">Karyawan</a></li>
					</ul>
					<div class="page-header no-border holder" style="margin-top:0px;">
					</div>
					<div class="tab-content">
						<div class="tab-pane active" id="details">
							<br/>
							<br/>
							<ul class="list-unstyled" id="workList">
								<li class="clearfix">
									<div class="list-results pl-10" style="margin-bottom:0px;">
										@foreach($persons as $key => $value)	
											<div class="row">
												<div class="col-xs-12">
													<a href="{{route('hr.persons.documents.show', [$value['person']['id'], $value['id']])}}">
														<p>
															<span class="fa fa-fw fa-file-o fa-2x pull-left"></span>
															<span class="pull-left">
																<span class="text-bold">{{$value['person']['name']}}</span><br/>
																<span class="opacity-50">{{date("l, d F Y", strtotime($value['created_at']))}}</span><br/>
															</span>
														</p>
													</a>
												</div>
											</div><!--end .row -->
										@endforeach
									</div><!--end .hbox-md -->
									@if(count($persons))
										@include('admin.helpers.pagination')
									@else
										<div class="row">
											<div class="col-sm-12 text-center">
												<p>Tidak ada data</p>
											</div>
										</div>
									@endif			
								</li>
							</ul>
						</div>
					</div>
				@endif
				<!-- END MIDDLE -->
			</div>

			<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						{!! Form::open(array('route' => array('hr.documents.delete', $data['id']),'method' => 'POST')) !!}
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="simpleModalLabel">Hapus Data Dokumen</h4>
						</div>
						<div class="modal-body">
							<p>Apakah Anda yakin akan menghapus data dokumen? Silahkan masukkan password Anda untuk konfirmasi.</p>
							<div class="row">
								<div class="form-group">
									<div class="col-sm-3">
										<label for="password1" class="control-label">Password</label>
									</div>
									<div class="col-sm-9">
										<input type="password" name="password" id="password" class="form-control" placeholder="Password">
									</div>
								</div>					
							</div>
						</div>
						<div class="modal-footer">
							<p>{!! Form::hidden('from_confirm_form', 'Yes') !!}</p>
							<a type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
							<button type="submit" type="button" class="btn btn-danger">Hapus</button>
						</div>
						{!! Form::close() !!}
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>	
			<!-- BEGIN RIGHTBAR -->
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function () {
			$('.select2').select2();
		});
	</script>
@stop

