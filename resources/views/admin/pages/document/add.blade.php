@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-head">
			<header>Tambah Dokumen</header>
		</div>
		<form class="form" role="form">
			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body tab-content">
				<div class="tab-pane active" id="profil">
					<div class="row">
						<div class="col-xs-12">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control input-lg" id="Name" name="Name">
										<label for="Name">Nama Pegawai</label>
									</div>
								</div><!--end .col -->
							</div>
							<p>NIK : 1234652542754</p>
						</div><!--end .row -->
					</div><!--end .col -->
				</div><!--end .row -->
			</div><!--end .card-body -->
			<!-- END DEFAULT FORM ITEMS -->

			<!-- BEGIN FORM TAB PANES -->
			<div class="card-body tab-content">
				<div class="tab-pane active" id="profil">
					<div class="row">
						<ul class="list-unstyled" id="documentList"></ul>
						<div class="form-group">
							<a class="btn btn-raised btn-default-bright" data-duplicate="skillTmpl" data-target="#documentList">TAMBAH INPUTAN</a>
						</div><!--end .form-group -->
						<div class="row">
						</div>
					</div><!--end .row -->
				</div><!--end .tab-pane -->
				<div class="tab-pane" id="general">
					<div class="form-group">
						<textarea id="summernote" name="message" class="form-control control-4-rows" placeholder="Enter note ..." spellcheck="false"></textarea>
					</div><!--end .form-group -->
				</div><!--end .tab-pane -->
			</div><!--end .card-body.tab-content -->
			<!-- END FORM TAB PANES -->

			<!-- BEGIN FORM FOOTER -->
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" href="../../../html/pages/contacts/search.html">BATAL</a>
					<button type="button" class="btn btn-flat btn-accent">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
			<!-- END FORM FOOTER -->
		</form>
	</div><!--end .card -->
	
	<!-- BEGIN DOCUMENT TEMPLATES -->
	<script type="text/html" id="skillTmpl">
		<li class="clearfix">
			<div class="col-xs-12">
				<div class="page-header no-border holder">
					<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
					<h4 class="text-accent">Inputan ke-<%=index%></h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<select name="Type" id="Type" class="form-control form-control input-lg">
								<option value=""></option>
								<option value="surat peringatan">surat peringatan</option>
								<option value="kontrak kerja">kontrak kerja</option>
								<option value="penilaian kinerja">penilaian kinerja</option>
								<option value="pendidikan formal">pendidikan formal</option>
								<option value="pendidikan non formal">pendidikan non formal formal</option>
								<option value="ktp">ktp formal</option>
								<option value="bpjs">bpjs formal</option>
								<option value="npwp">npwp formal</option>
								<option value="bank">bank formal</option>
								<option value="reksa dana">reksa dana formal</option>
								<option value="pengalaman kerja">pengalaman kerja formal</option>
								<option value="proyek">proyek formal</option>
							</select>	
							<label for="Type">Jenis Dokumen</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input type="text" class="form-control" id="input_string<%=index%>" name="input_string<%=index%>">
							<label for="input_string<%=index%>">inputan teks satu baris</label>
						</div>	
					</div>	
				</div>	

				<div class="row">
					<div class="col-md-12">	
						<div class="form-group">							
							<div class="input-daterange input-group" id="input_date" style="width:100%;">
								<div class="input-group-content">
									<input type="text" class="form-control" name="input_date" />
									<label>inputan tanggal</label>
								</div>
							</div>
						</div>
					</div>	
				</div>	

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<textarea name="input_text<%=index%>" id="input_text<%=index%>" class="form-control" rows="3"></textarea>
							<label for="input_text<%=index%>">inputan teks multibaris</label>
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
@stop