@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-head style-primary">
			<header>Tambah data perusahaan</header>
		</div>
		@if($data['id'])
			<form class="form" role="form" action="{{route('hr.organisation.branches.update', $data['id'])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.organisation.branches.store')}}" method="post">
		@endif

			<!-- BEGIN DEFAULT FORM ITEMS -->
			<div class="card-body style-primary form-inverse">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group floating-label">
									<input type="text" class="form-control input-lg" id="name" name="name">
									<label for="name">Nama Perusahaan</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group floating-label">
									<input type="text" class="form-control" id="license" name="license">
									<label for="license">Nomor Ijin Perusahaan</label>
								</div>
							</div><!--end .col -->
							<div class="col-md-6">
								<div class="form-group floating-label">
									<input type="text" class="form-control" id="npwp" name="npwp">
									<label for="npwp">NPWP</label>
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
										<input type="text" class="form-control" id="business_activities" name="business_activities">
										<label for="business_activities">Kegiatan Bisnis</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="business_fields" name="business_fields">
										<label for="business_fields">Bidang Bisnis</label>
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
					<a class="btn btn-flat" href="{{route('hr.organisation.branches.index')}}">BATAL</a>
					<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
			<!-- END FORM FOOTER -->
		</form>
	</div><!--end .card -->
@stop


@section('js')
	{!! HTML::script('js/microtemplating.min.js')!!}
	{!! HTML::script('js/pluginmicrotemplating.min.js')!!}

	<script type="text/html" id="departmentTmpl">
		<li class="clearfix">
			<div class="page-header no-border holder">
				<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
				<h4 class="text-accent">Departemen[<%=index%>]</h4>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control" id="department_name[<%=index%>]" name="department_name[<%=index%>]">
						<label for="department_name[<%=index%>]">Nama Departemen</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="min_employee[<%=index%>]" name="min_employee[<%=index%>]">
						<label for="min_employee[<%=index%>]">Jumlah Minimum Pegawai</label>
					</div>
					</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="ideal_employee[<%=index%>]" name="ideal_employee[<%=index%>]">
						<label for="ideal_employee[<%=index%>]">Jumlah Ideal Pegawai</label>
					</div>
					</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="max_employee[<%=index%>]" name="max_employee[<%=index%>]">
						<label for="max_employee[<%=index%>]">Jumlah Maximum Pegawai</label>
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
				<h4 class="text-accent">Jabatan[<%=index%>]</h4>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control" id="position_department_name[<%=index%>]" name="position_department_name[<%=index%>]">
						<label for="position_department_name[<%=index%>]">Nama Departemen</label>
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
											<input type="text" class="form-control" id="postion_add_department_name[<%=index%>]" name="postion_add_department_name[<%=index%>]">
											<label for="postion_add_department_name[<%=index%>]">Nama Departemen</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control" id="min_employee[<%=index%>]" name="min_employee[<%=index%>]">
											<label for="min_employee[<%=index%>]">Jumlah Minimum Pegawai</label>
										</div>
				 					</div>
									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control" id="ideal_employee[<%=index%>]" name="ideal_employee[<%=index%>]">
											<label for="ideal_employee[<%=index%>]">Jumlah Ideal Pegawai</label>
										</div>
				 					</div>
									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control" id="max_employee[<%=index%>]" name="max_employee[<%=index%>]">
											<label for="max_employee[<%=index%>]">Jumlah Maximum Pegawai</label>
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
						<input type="text" class="form-control" id="position_nam[<%=index%>]" name="position_nam[<%=index%>]">
						<label for="position_nam[<%=index%>]">Nama Jabatan</label>
					</div>
					</div>	
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="position_grade[<%=index%>]" name="position_grade[<%=index%>]">
						<label for="position_grade[<%=index%>]">Grade Jabatan</label>
					</div>
					</div>	 								
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="min_employee[<%=index%>]" name="min_employee[<%=index%>]">
						<label for="min_employee[<%=index%>]">Jumlah Minimum Pegawai</label>
					</div>
					</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="ideal_employee[<%=index%>]" name="ideal_employee[<%=index%>]">
						<label for="ideal_employee[<%=index%>]">Jumlah Ideal Pegawai</label>
					</div>
					</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="max_employee[<%=index%>]" name="max_employee[<%=index%>]">
						<label for="max_employee[<%=index%>]">Jumlah Maximum Pegawai</label>
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
				<h4 class="text-accent">Alamat[<%=index%>]</h4>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<input type="text" class="form-control" id="address_address[<%=index%>]" name="address_address[<%=index%>]">
						<label for="address_address[<%=index%>]">Alamat Lengkap</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="address_kode_pos[<%=index%>]" name="address_kode_pos[<%=index%>]">
						<label for="address_kode_pos[<%=index%>]">Kode Pos</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<input type="text" class="form-control" id="address_RT[<%=index%>]" name="address_RT[<%=index%>]">
						<label for="address_RT[<%=index%>]">RT</label>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<input type="text" class="form-control" id="address_RW[<%=index%>]" name="address_RW[<%=index%>]">
						<label for="address_RW[<%=index%>]">RW</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="address_kecamatan[<%=index%>]" name="address_kecamatan[<%=index%>]">
						<label for="address_kecamatan[<%=index%>]">Kecamatan</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="address_kelurahan[<%=index%>]" name="address_kelurahan[<%=index%>]">
						<label for="address_kelurahan[<%=index%>]">Kelurahan</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="address_kota[<%=index%>]" name="address_kota[<%=index%>]">
						<label for="address_kota[<%=index%>]">Kota</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="address_provinsi[<%=index%>]" name="address_provinsi[<%=index%>]">
						<label for="address_provinsi[<%=index%>]">Provinsi</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="address_negara[<%=index%>]" name="address_negara[<%=index%>]">
						<label for="address_negara[<%=index%>]">Negara</label>
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
				<h4 class="text-accent">Kontak[<%=index%>]</h4>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="contact_phone[<%=index%>]" name="contact_phone[<%=index%>]">
						<label for="contact_phone[<%=index%>]">Nomor Telepon</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="contact_email[<%=index%>]" name="contact_email[<%=index%>]">
						<label for="contact_email[<%=index%>]">Alamat Email</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="contact_BBM[<%=index%>]" name="contact_BBM[<%=index%>]">
						<label for="contact_BBM[<%=index%>]">Akun BBM</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="contact_LINE[<%=index%>]" name="contact_LINE[<%=index%>]">
						<label for="contact_LINE[<%=index%>]">Akun LINE</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="contact_WhatsApp[<%=index%>]" name="contact_WhatsApp[<%=index%>]">
						<label for="contact_WhatsApp[<%=index%>]">Akun WhatsApp</label>
					</div>
				</div>
			</div>
		</li>
	</script>
@stop
