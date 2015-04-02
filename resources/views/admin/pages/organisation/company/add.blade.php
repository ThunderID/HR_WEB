@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-head style-primary">
			<header>Tambah data perusahaan</header>
		</div>
		<form class="form" role="form">

			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body style-primary form-inverse">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group floating-label">
									<input type="text" class="form-control input-lg" id="companyName" name="companyName">
									<label for="companyName">Nama Perusahaan</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group floating-label">
									<input type="text" class="form-control" id="company_license" name="company_license">
									<label for="company_license">Nomor Ijin Perusahaan</label>
								</div>
							</div><!--end .col -->
							<div class="col-md-6">
								<div class="form-group floating-label">
									<input type="text" class="form-control" id="company_npwp" name="company_npwp">
									<label for="company_npwp">NPWP</label>
								</div>
							</div>
						</div><!--end .row -->
					</div><!--end .col -->
				</div><!--end .row -->
			</div><!--end .card-body -->
			<!-- END DEFAULT FORM ITEMS -->

			<!-- BEGIN FORM TABS -->
			<div class="card-head style-primary">
				<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
					<li class="active"><a href="#profil">PROFIL</a></li>
					<li><a href="#department">DEPARTEMEN</a></li>
					<li><a href="#position">JABATAN</a></li>
					<li><a href="#contact">KONTAK</a></li>
				</ul>
			</div><!--end .card-head -->
			<!-- END FORM TABS -->

			<!-- BEGIN FORM TAB PANES -->
			<div class="card-body tab-content">
				<div class="tab-pane active" id="profil">
					<div class="row">
						<div class="col-md-12">
							<div class="page-header no-border holder">
								<h4 class="text-accent">Profil Perusahaan</h4>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="business_activity" name="business_activity">
										<label for="business_activity">Kegiatan Bisnis</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="business_field" name="business_field">
										<label for="business_field">Bidang Bisnis</label>
									</div>
								</div>
							</div><!--end .row -->
						</div><!--end .col -->
					</div><!--end .row -->
				</div><!--end .tab-pane -->
				<div class="tab-pane" id="department">
					<ul class="list-unstyled" id="departmentList"></ul>
					<div class="form-group">
						<a class="btn btn-raised btn-default-bright" data-duplicate="departmentTmpl" data-target="#departmentList">TAMBAHKAN DEPARTEMEN
						</a>
					</div><!--end .form-group -->
				</div><!--end .tab-pane -->
				<div class="tab-pane" id="position">
					<ul class="list-unstyled" id="positionList"></ul>
					<div class="form-group">
						<a class="btn btn-raised btn-default-bright" data-duplicate="positionTmpl" data-target="#positionList">TAMBAHKAN JABATAN
						</a>
					</div><!--end .form-group -->
				</div><!--end .tab-pane -->
				<div class="tab-pane " id="contact">
					<ul class="list-unstyled" id="addressList"></ul>
					<div class="form-group">
						<a class="btn btn-raised btn-default-bright" data-duplicate="addressTmpl" data-target="#addressList">TAMBAHKAN ALAMAT</a>
					</div><!--end .form-group -->
					<ul class="list-unstyled" id="contactList"></ul>
					<div class="form-group">
						<a class="btn btn-raised btn-default-bright" data-duplicate="contactTmpl" data-target="#contactList">TAMBAHKAN KONTAK</a>
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

	<!-- BEGIN JAVASCRIPT -->

	<!-- BEGIN DEPARTMENT TEMPLATES -->
	<script type="text/html" id="departmentTmpl">
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

	<!-- BEGIN POSITION TEMPLATES -->
	<script type="text/html" id="positionTmpl">
		<li class="clearfix">
			<div class="page-header no-border holder">
				<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
				<h4 class="text-accent">Jabatan <%=index%></h4>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control" id="position_department_name_<%=index%>" name="position_department_name_<%=index%>">
						<label for="position_department_name_<%=index%>">Nama Departemen</label>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="card style-primary-dark">
					<!-- BEGIN RELASI DETAIL -->			
					<div class="card-head style-primary-dark">
						<header>Departemen</header>
					</div>
					<div class="card-body style-primary-dark form-inverse">
						<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="postion_add_department_name_<%=index%>" name="postion_add_department_name_<%=index%>">
											<label for="postion_add_department_name_<%=index%>">Nama Departemen</label>
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
							</div>
						</div>
					</div>
					<div class="card-actionbar">
						<div class="card-actionbar-row">
							<a class="btn btn-flat" href="../../../html/pages/contacts/search.html">BATAL</a>
							<button type="button" class="btn btn-flat">SIMPAN DATA</button>
						</div>
					</div>
				</div>
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

	<!-- BEGIN ADDRESS TEMPLATES -->
	<script type="text/html" id="addressTmpl">
		<li class="clearfix">
			<div class="page-header no-border holder">
				<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
				<h4 class="text-accent">Alamat <%=index%></h4>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<input type="text" class="form-control" id="address_address_<%=index%>" name="address_address_<%=index%>">
						<label for="address_address_<%=index%>">Alamat Lengkap</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="address_posstal_code_<%=index%>" name="address_posstal_code_<%=index%>">
						<label for="address_posstal_code_<%=index%>">Kode Pos</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<input type="text" class="form-control" id="address_RT_<%=index%>" name="address_RT_<%=index%>">
						<label for="address_RT_<%=index%>">RT</label>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<input type="text" class="form-control" id="address_RW_<%=index%>" name="address_RW_<%=index%>">
						<label for="address_RW_<%=index%>">RW</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="address_kecamatan_<%=index%>" name="address_kecamatan_<%=index%>">
						<label for="address_kecamatan_<%=index%>">Kecamatan</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="address_kelurahan_<%=index%>" name="address_kelurahan_<%=index%>">
						<label for="address_kelurahan_<%=index%>">Kelurahan</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="address_city_<%=index%>" name="address_city_<%=index%>">
						<label for="address_city_<%=index%>">Kota</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="address_province_<%=index%>" name="address_province_<%=index%>">
						<label for="address_province_<%=index%>">Provinsi</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="address_country_<%=index%>" name="address_country_<%=index%>">
						<label for="address_country_<%=index%>">Negara</label>
					</div>
				</div>					
			</div>
		</li>
	</script>
	<!-- END ADDRESS TEMPLATES -->

	<!-- BEGIN CONTACT TEMPLATES -->
	<script type="text/html" id="contactTmpl">
		<li class="clearfix">
			<div class="page-header no-border holder">
				<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
				<h4 class="text-accent">Kontak <%=index%></h4>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="contact_phone_<%=index%>" name="contact_phone_<%=index%>">
						<label for="contact_phone_<%=index%>">Nomor Telepon</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="contact_email_<%=index%>" name="contact_email_<%=index%>">
						<label for="contact_email_<%=index%>">Alamat Email</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="contact_BBM_<%=index%>" name="contact_BBM_<%=index%>">
						<label for="contact_BBM_<%=index%>">Akun BBM</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="contact_LINE_<%=index%>" name="contact_LINE_<%=index%>">
						<label for="contact_LINE_<%=index%>">Akun LINE</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="contact_WhatsApp_<%=index%>" name="contact_WhatsApp_<%=index%>">
						<label for="contact_WhatsApp_<%=index%>">Akun WhatsApp</label>
					</div>
				</div>
			</div>
		</li>
	</script>
	<!-- END PHONE TEMPLATES -->
@stop
