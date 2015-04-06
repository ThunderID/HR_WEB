@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-head style-primary">
			<header>Tambah data orang</header>
		</div>
		<form class="form" role="form">
			<div class="card-body style-primary form-inverse">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group floating-label">
									<input type="text" class="form-control" id="preffix_title" name="preffix_title">
									<label for="company">Gelar Depan</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="row">
							<div class="col-md-4">
								<div class="form-group floating-label">
									<input type="text" class="form-control input-lg" id="firstname" name="firstname" disabled>
									<label for="firstname">Nama Depan</label>
								</div>
							</div><!--end .col -->
							<div class="col-md-4">
								<div class="form-group floating-label">
									<input type="text" class="form-control input-lg" id="midlename" name="midlename">
									<label for="midlename">Nama Tengah</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group floating-label">
									<input type="text" class="form-control input-lg" id="lastname" name="lastname">
									<label for="lastname">Nama Belakang</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group floating-label">
									<input type="text" class="form-control" id="suffix_title" name="suffix_title">
									<label for="functiontitle">Gelar Belakang</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
					</div><!--end .col -->
				</div><!--end .row -->
			</div><!--end .card-body -->
			<!-- END DEFAULT FORM ITEMS -->

			<!-- BEGIN FORM TABS -->
			<div class="card-head style-primary">
				<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
					<li class="active"><a href="#profil">PROFIL</a></li>
					<li><a href="#relation">RELASI</a></li>
					<li><a href="#work">PEKERJAAN</a></li>
					<li><a href="#contact">KONTAK</a></li>
					<li><a href="#document">DOKUMEN</a></li>
				</ul>
			</div><!--end .card-head -->
			<!-- END FORM TABS -->

			<!-- BEGIN FORM TAB PANES -->
			<div class="card-body tab-content">
				<div class="tab-pane active" id="profil">
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="nickname" name="nickname">
										<label for="nickname">Nama Panggilan</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-2">
									<div class="form-group">
										<label>
											Jenis Kelamin
										</label>
									</div>
								</div>
								<div class="col-md-2">
									<div class="radio radio-styled">
										<label>
											<input name="gender" type="radio" value="male">
											<span>Laki-laki</span>
										</label>
									</div>
								</div>
								<div class="col-md-2">
									<div class="radio radio-styled">
										<label>
											<input name="gender" type="radio" value="female">
											<span>Perempuan</span>
										</label>
									</div>
								</div>
							</div><!--end .row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="place_of_birth" name="place_of_birth">
										<label for="place_of_birth">Tempat Lahir</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-daterange input-group" id="date_of_birth" style="width:100%;">
											<div class="input-group-content">
												<input type="text" class="form-control" name="date_of_birth" />
												<label>Tanggal Lahir</label>
											</div>
										</div>
									</div>
								</div>
							</div><!--end .row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="place_of_birth" name="place_of_birth">
										<label for="place_of_birth">Kebangsaan</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-6">
									<div class="form-group">
										<select name="marital_status" class="form-control" id="marital_status">
											<option value=""></option>
											<option value="single">Belum Kawin</option>
											<option value="married">Kawin</option>
											<option value="divorced">Cerai Hidup</option>
											<option value="widowed">Cerai Mati</option>
										</select>
										<label for="marital_status">Status Kawin</label>
									</div><!--end .form -->
								</div><!--end .col -->
							</div><!--end .row -->
						</div><!--end .col -->
					</div><!--end .row -->
				</div><!--end .tab-pane -->
				<div class="tab-pane" id="relation">
					<ul class="list-unstyled" id="relationList"></ul>
					<div class="form-group">
						<a class="btn btn-raised btn-default-bright" data-duplicate="relationTmpl" data-target="#relationList">TAMBAHKAN RELASI</a>
					</div><!--end .form-group -->
				</div><!--end .tab-pane -->
				<div class="tab-pane" id="work">
					<ul class="list-unstyled" id="workList"></ul>
					<div class="form-group">
						<a class="btn btn-raised btn-default-bright" data-duplicate="workTmpl" data-target="#workList">TAMBAHKAN PEKERJAAN</a>
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
				<div class="tab-pane " id="document">
					<ul class="list-unstyled" id="documentList"></ul>
					<div class="form-group">
						<a class="btn btn-raised btn-default-bright" data-duplicate="skillTmpl" data-target="#documentList">TAMBAH DOKUMEN</a>
					</div><!--end .form-group -->
				</div><!--end .tab-pane -->
			</div><!--end .card-body.tab-content -->
			<!-- END FORM TAB PANES -->

			<!-- BEGIN FORM FOOTER -->
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" href="#">BATAL</a>
					<button type="button" class="btn btn-flat btn-accent">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
			<!-- END FORM FOOTER -->
		</form>
	</div><!--end .card -->

@stop

@section('css')
	{!! HTML::style('css/summernote.css')!!}	
@stop

@section('js')
	{!! HTML::script('js/summernote.min.js')!!}
	{!! HTML::script('js/microtemplating.min.js')!!}
	{!! HTML::script('js/pluginmicrotemplating.min.js')!!}

	<!-- BEGIN RELATION TEMPLATES -->
	<script type="text/html" id="relationTmpl">
		<li class="clearfix">
			<div class="page-header no-border holder">
				<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
				<h4 class="text-accent">Relasi <%=index%></h4>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<select  id="relationship<%=index%>" name="relationship<%=index%>" class="form-control">
							<option value=""></option>
							<option value="father">Ayah</option>
							<option value="mother">Ibu</option>
							<option value="husband">Suami</option>
							<option value="wife">Istri</option>
							<option value="daughter">Anak Perempuan</option>
							<option value="son">Anak Laki-laki</option>
						</select>
						<label for="relationship<%=index%>">Relasi</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control" id="relation_name_<%=index%>" name="relation_name_<%=index%>">
						<label for="relation_name_<%=index%>">Nama</label>
					</div>
					</div>
			</div>
			<div class="row">
				<div class="card style-primary-dark">
					<!-- BEGIN RELASI DETAIL -->			
					<div class="card-head style-primary-dark">
						<header>Nama</header>
					</div>
					<div class="card-body style-primary-dark form-inverse">
						<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="prefix_title_relation_<%=index%>" name="prefix_title_relation_<%=index%>">
											<label for="prefix_title_relation_<%=index%>">Gelar Depan</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control" id="first_name_relation_<%=index%>" name="first_name_relation_<%=index%>">
											<label for="first_name_relation_<%=index%>">Nama Depan</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control" id="midle_name_relation_<%=index%>" name="midle_name_relation_<%=index%>">
												<label for="midle_name_relation_<%=index%>">Nama Tengah</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control" id="last_name_relation_<%=index%>" name="last_name_relation_<%=index%>">
											<label for="last_name_relation_<%=index%>">Nama Belakang</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="suffix_title_relation_<%=index%>" name="suffix_title_relation_<%=index%>">
											<label for="suffix_title_relation_<%=index%>">Gelar Belakang</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--end .card-body -->
					<div class="card-head style-primary-dark">
						<header>Profil Relasi</header>
					</div>
					<div class="card-body style-primary-dark form-inverse">
						<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" id="nickname_relation_<%=index%>" name="nickname_relation_<%=index%>">
											<label for="nickname_relation_<%=index%>">Nama Panggilan</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label>
												Jenis Kelamin
											</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="radio radio-styled">
											<label>
												<input name="gender_relation_<%=index%>" type="radio" value="male">
												<span>Laki-laki</span>
											</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="radio radio-styled">
											<label>
												<input name="gender_relation_<%=index%>" type="radio" value="female">
												<span>Perempuan</span>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" id="place_of_birth_relation_<%=index%>" name="place_of_birth_relation_<%=index%>">
											<label for="place_of_birth_relation_<%=index%>">Tempat Lahir</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="input-daterange input-group" id="date_of_birth_relation_<%=index%>" style="width:100%; text-align:left;">
												<div class="input-group-content">
													<input type="text" class="form-control" name="date_of_birth_relation_<%=index%>" />
													<label>Tanggal Lahir</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" id="nationality_relation_<%=index%>" name="nationality_relation_<%=index%>">
											<label for="nationality_relation_<%=index%>">Kebangsaan</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<select name="marital_status_relation_<%=index%>" id="marital_status_relation_<%=index%>" class="form-control">
														<option value=""></option>
														<option value="single">Belum Kawin</option>
														<option value="married">Kawin</option>
														<option value="divorced">Cerai Hidup</option>
														<option value="widowed">Cerai Mati</option>
											</select>
											<label for="marital_status_relation_<%=index%>">Status Kawin</label>
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
					<!-- END RELASI DETAIL -->
				</div>
			</div>
		</li>
	</script>
	<!-- END RELATION TEMPLATES -->


	<!-- BEGIN WORK TEMPLATES -->
	<script type="text/html" id="workTmpl">
		<li class="clearfix">
			<div class="page-header no-border holder">
				<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
				<h4 class="text-accent">Pekerjaan <%=index%></h4>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="work_company_<%=index%>" name="work_company_<%=index%>">
						<label for="work_company_<%=index%>">Perusahaan</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="work_department_<%=index%>" name="work_department_<%=index%>">
						<label for="work_department_<%=index%>">Departemen</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="work_position_<%=index%>" name="work_position_<%=index%>">
						<label for="work_position_<%=index%>">Posisi</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="work_status_<%=index%>" name="work_status_<%=index%>">
						<label for="work_status_<%=index%>">Status Pegawai</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="work_department_<%=index%>" name="work_department_<%=index%>">
						<label for="work_department_<%=index%>">Mulai Bekerja</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="work_position_<%=index%>" name="work_position_<%=index%>">
						<label for="work_position_<%=index%>">Berhenti Bekerja</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<textarea name="work_reason_quit_<%=index%>" id="work_reason_quit_<%=index%>" class="form-control" rows="3"></textarea>
				<label for="work_reason_quit_<%=index%>">Alasan Berhenti</label>
			</div>
		</li>
	</script>
	<!-- END WORK TEMPLATES -->

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


	<!-- BEGIN DOCUMENT TEMPLATES -->
	<script type="text/html" id="skillTmpl">
		<li class="clearfix">
			<div class="page-header no-border holder">
				<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
				<h4 class="text-accent">Dokumen <%=index%></h4>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<select name="document_name_<%=index%>" id="document_name_<%=index%>" class="form-control">
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
						<label for="document_name_<%=index%>">Jenis Dokumen</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" id="input_text<%=index%>" name="input_text<%=index%>">
								<label for="input_text<%=index%>">input text</label>
							</div>	
						</div>	
					</div>	

					<div class="row">
						<div class="col-md-12">	
							<div class="form-group">							
								<div class="input-daterange input-group" id="input_date" style="width:100%;">
									<div class="input-group-content">
										<input type="text" class="form-control" name="input_date" />
										<label>input date</label>
									</div>
								</div>
							</div>
						</div>	
					</div>	


					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<select name="input_select<%=index%>" id="input_select<%=index%>" class="form-control">										
									<option value=""></option>
									<option value="a">a</option>
									<option value="b">b</option>						
								</select>					
								<label for="input_text<%=index%>">input select</label>
							</div>	
						</div>	
					</div>	
				</div>	
			</div>																																																											
		</li>
	</script>
@stop