@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-head style-primary">
			@if($controller_name == "department")
			<header>Tambah Data Departemen</header>
			@elseif($controller_name == "position")
			<header>Tambah Data Posisi</header>
			@endif
		</div>
		<form class="form" role="form">

			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body style-primary form-inverse">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<select name="company" id="company" class="form-control">
										<option value=""></option>
									</select>
									<label for="company">Nama Perusahaan</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->	
						@if($controller_name == "position")
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<select name="department" id="department" class="form-control">
										<option value=""></option>
									</select>
									<label for="department">Nama Departemen</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->	
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" id="min_employee_<%=index%>" name="min_employee_<%=index%>">
									<label for="min_employee_<%=index%>">Jumlah Minimum Pegawai</label>
								</div>
								</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" id="ideal_employee_<%=index%>" name="ideal_employee_<%=index%>">
									<label for="ideal_employee_<%=index%>">Jumlah Ideal Pegawai</label>
								</div>
								</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" id="max_employee_<%=index%>" name="max_employee_<%=index%>">
									<label for="max_employee_<%=index%>">Jumlah Maximum Pegawai</label>
								</div>
							</div> 					 					
						</div>											
						@endif
					</div><!--end .col -->
				</div><!--end .row -->
			</div><!--end .card-body -->
			<!-- END DEFAULT FORM ITEMS -->

			<!-- BEGIN FORM TAB PANES -->
			<div class="card-body tab-content">
				<div class="tab-pane active" id="profil">
						<ul class="list-unstyled" id="documentList"></ul>
						<div class="form-group">
							<a class="btn btn-raised btn-default-bright" data-duplicate="skillTmpl" data-target="#documentList">TAMBAH INPUTAN</a>
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
	
	@if($controller_name == "department")
	<!-- BEGIN DEPARTMENT TEMPLATES -->
	<script type="text/html" id="skillTmpl">
		<li class="clearfix">
			<div class="page-header no-border holder">
				<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
				<h4 class="text-accent">Departemen <%=index%></h4>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control" id="department_name_<%=index%>" name="department_name_<%=index%>">
						<label for="department_name_<%=index%>">Nama Departemen</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="min_employee_<%=index%>" name="min_employee_<%=index%>">
						<label for="min_employee_<%=index%>">Jumlah Minimum Pegawai</label>
					</div>
					</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="ideal_employee_<%=index%>" name="ideal_employee_<%=index%>">
						<label for="ideal_employee_<%=index%>">Jumlah Ideal Pegawai</label>
					</div>
					</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="max_employee_<%=index%>" name="max_employee_<%=index%>">
						<label for="max_employee_<%=index%>">Jumlah Maximum Pegawai</label>
					</div>
				</div> 					 					
			</div>
		</li>
	</script>
	<!-- END DEPARTMENT TEMPLATES -->	
	@elseif($controller_name == "position")
	<!-- BEGIN POSITION TEMPLATES -->
	<script type="text/html" id="skillTmpl">
		<li class="clearfix">
			<div class="page-header no-border holder">
				<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
				<h4 class="text-accent">Jabatan <%=index%></h4>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="position_name<%=index%>" name="position_name<%=index%>">
						<label for="position_name<%=index%>">Nama Jabatan</label>
					</div>
					</div>	
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="position_grade_<%=index%>" name="position_grade_<%=index%>">
						<label for="position_grade_<%=index%>">Grade Jabatan</label>
					</div>
					</div>	 								
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="min_employee_<%=index%>" name="min_employee_<%=index%>">
						<label for="min_employee_<%=index%>">Jumlah Minimum Pegawai</label>
					</div>
					</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="ideal_employee_<%=index%>" name="ideal_employee_<%=index%>">
						<label for="ideal_employee_<%=index%>">Jumlah Ideal Pegawai</label>
					</div>
					</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="max_employee_<%=index%>" name="max_employee_<%=index%>">
						<label for="max_employee_<%=index%>">Jumlah Maximum Pegawai</label>
					</div>
				</div> 					 					
			</div>
		</li>
	</script>
	<!-- END POSITION TEMPLATES -->		
	@endif
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