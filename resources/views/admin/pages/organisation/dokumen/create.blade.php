@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		@if($data['id'])
			<form class="form" role="form" action="{{route('hr.documents.update', $data['id'])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.documents.store')}}" method="post">
		@endif
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body tab-content">
				<ul class="list-unstyled">
					<li class="clearfix">
						<div class="row p-20">
							<div class="col-xs-12">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="name" name="name" value="{{$data['name']}}">
									<label for="name">Judul</label>
								</div>
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="tag" name="tag" value="{{$data['tag']}}">
									<label for="">Kategori</label>
								</div>
								<div class="form-group">
									<div class="checkbox checkbox-styled">
										<label>
											<input id="required" name="required" type="checkbox" value="required"
											@if (isset($data['is_required']))
													 checked="checked"
											@endif
											>
										</label>
										<label for="required">Wajib</label>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
				@if($data['id'])
					<ul class="list-unstyled">
						<li class="clearfix">
							@forelse($data['templates'] as $key => $value)
								<div class="row p-20">
									<div class="col-md-6">
										<div class="form-group">
											<input type="hidden" class="form-control" id="id_template[{{$key}}]" name="id_template[{{$key}}]" value="{{$value['id']}}">
											<input type="text" class="form-control" id="field[{{$key}}]" name="field[{{$key}}]" value="{{$value['field']}}">
											<label for="field[{{$key}}]">Nama Input</label>
										</div>	
									</div>	
									<div class="col-md-5">
										<div class="form-group">
											<select id="Type" class="form-control form-control input-md" name="type[$key]">
												<option value="numeric" @if($value['type']=='numeric') selected @endif>Angka</option>
												<option value="date" @if($value['type']=='date') selected @endif>Tanggal</option>
												<option value="string" @if($value['type']=='string') selected @endif>Teks Singkat</option>
												<option value="text" @if($value['type']=='text') selected @endif>Teks Panjang</option>
											</select>	
											<label for="Type">Tipe Input</label>
										</div>
									</div>
									<div class="col-md-1 pull-left">
										<a class="btn btn-icon-toggle btn-accent btn-delete pull-left mlm-15 mt-20" href="{{route('hr.document.templates.delete', [$value['id']])}}"><span class="md md-delete"></span></a>
									</div>
								</div>
							@empty
								<p>Tidak ada isi untuk dokumen ini</p>
							@endforelse
							<div class="row p-20">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="field[{{count($data['templates'])+1}}]" name="field[{{count($data['templates'])+1}}]">
										<label for="field[{{count($data['templates'])+1}}]">Nama Input</label>
									</div>	
								</div>	
								<div class="col-md-5">
									<div class="form-group">
										<select id="Type" class="form-control form-control input-md" name="type[{{count($data['templates'])+1}}]">
											<option value="numeric">Angka</option>
											<option value="date">Tanggal</option>
											<option value="string">Teks Singkat</option>
											<option value="text">Teks Panjang</option>
										</select>	
										<label for="Type">Tipe Input</label>
									</div>
								</div>
								<div class="col-md-1 pull-left">
									<a class="btn btn-icon-toggle btn-accent btn-delete pull-left mlm-15 mt-20"><i class="md md-delete"></i></a>
								</div>
							</div>
						</li>
					</ul>
				@else
					<ul class="list-unstyled" id="documentList"></ul>
					<div class="form-group p-20">
						<a class="btn btn-raised btn-default-bright" data-duplicate="skillTmpl" data-target="#documentList">TAMBAH INPUTAN</a>
					</div><!--end .form-group -->
				@endif
				<ul class="list-unstyled">
					<li class="clearfix">
						<div class="row p-20">
							<div class="col-md-12">
								<div class="form-group" style="padding-top:30px">
									<textarea name="template" id="content_document" class="form-control" rows="8" placeholder="">{{$data['template']}}</textarea>
									<label for="textarea1">Template Surat <small>*untuk mengganti nama dengan nama karyawan gunanakan //nama// , untuk posisi gunakan //position// *</small></label>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div><!--end .card-body.tab-content -->
			<!-- END FORM TAB PANES -->

			<!-- BEGIN FORM FOOTER -->
			<div class="card-actionbar">
				<div class="card-actionbar-row mr-20">
					<a class="btn btn-flat" href="{{ URL::previous() }}">BATAL</a>
					<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
			<!-- END FORM FOOTER -->
		</form>
	</div><!--end .card -->
	
	<!-- BEGIN DOCUMENT TEMPLATES -->
	<script type="text/html" id="skillTmpl">
		<li class="clearfix">
			<div class="row pl-20 pr-20 mtm-10">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" id="field[<%=index%>]" name="field[<%=index%>]">
								<label for="field[<%=index%>]">Nama Input</label>
							</div>	
						</div>	
						<div class="col-md-5">
							<div class="form-group">
								<select id="Type" class="form-control form-control input-md" name="type[<%=index%>]">
									<option value="numeric">Angka</option>
									<option value="date">Tanggal</option>
									<option value="string">Teks Singkat</option>
									<option value="text">Teks Panjang</option>
								</select>	
								<label for="Type">Tipe Input</label>
							</div>
						</div>
						<div class="col-md-1 pull-left">
							<a class="btn btn-icon-toggle btn-accent btn-delete pull-left mlm-15 mt-20"><i class="md md-delete"></i></a>
						</div>
					</div>

				</div>
			</div>
		</li>
	</script>
	<!-- END DOCUMENT TEMPLATES -->	
@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
	{!! HTML::style('css/summernote.css')!!}	
@stop

@section('js')
	{!! HTML::script('js/bootstrap-datepicker.js')!!}
	{!! HTML::script('js/summernote.min.js')!!}
	{!! HTML::script('js/microtemplating.min.js')!!}
	{!! HTML::script('js/pluginmicrotemplating.min.js')!!}
	<script>
		$('#content_document').summernote({
			height: 350,
			toolbar: [
				['style', ['bold', 'italic', 'underline', 'clear', 'fontsize']],
				['para', ['ul', 'ol', 'paragraph']]
			]
		});
	</script>
@stop