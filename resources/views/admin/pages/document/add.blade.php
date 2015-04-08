@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-head style-primary">
			<header>Tambah Template Dokumen</header>
		</div>
		<form class="form" role="form">

			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body style-primary form-inverse">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="Name" name="Name">
									<label for="Name">Nama Dokumen</label>
								</div>
							</div><!--end .col -->
							<div class="col-md-6">
								<div class="form-group">
									<select name="Type" id="Type" class="form-control form-control input-lg">
										<option value=""></option>
										<option value="letter">Surat</option>
										<option value="certificate">Sertifikat</option>
										<option value="identity">Identitas</option>
										<option value="account">Akun</option>
										<option value="portofolio">Portofolio</option>
									</select>	
									<label for="Type">Tipe Dokumen</label>
								</div>
							</div><!--end .col -->
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
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" id="work_company_<%=index%>" name="work_company_<%=index%>">
							<label for="work_company_<%=index%>">Nama Inputan</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<select name="doc_input_type_<%=index%>" id="doc_input_type_<%=index%>" class="form-control">
								<option value=""></option>
								<option value="string">inputan teks satu baris</option>
								<option value="text">inputan teks multibaris</option>
								<option value="date">inputan tanggal</option>
							</select>								
							<label for="doc_input_type_<%=index%>">Jenis Inputan</label>
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