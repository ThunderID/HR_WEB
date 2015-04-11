@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-head style-primary">
			<header>Tambah data orang</header>
		</div>
		@if($data['id'])
			<form class="form" role="form" action="{{route('hr.persons.update', $data['id'])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.persons.store')}}" method="post">
		@endif
			<div class="card-body style-primary form-inverse">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group floating-label">
									<input type="text" class="form-control" id="prefix_title" name="prefix_title" value=@if (isset($data['prefix_title'])){{ $data['prefix_title'] }}@endif>
									<label for="company">Gelar Depan</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="row">
							<div class="col-md-4">
								<div class="form-group floating-label">
									<input type="text" class="form-control input-lg" id="first_name" name="first_name" value=@if (isset($data['first_name'])){{ $data['first_name'] }}@endif>
									<label for="first_name">Nama Depan</label>
								</div>
							</div><!--end .col -->
							<div class="col-md-4">
								<div class="form-group floating-label">
									<input type="text" class="form-control input-lg" id="middle_name" name="middle_name" value=@if (isset($data['middle_name'])){{ $data['middle_name'] }}@endif>
									<label for="middle_name">Nama Tengah</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group floating-label">
									<input type="text" class="form-control input-lg" id="last_name" name="last_name" value=@if (isset($data['last_name'])){{ $data['last_name'] }}@endif>
									<label for="last_name">Nama Belakang</label>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group floating-label">
									<input type="text" class="form-control" id="suffix_title" name="suffix_title" value=@if (isset($data['suffix_title'])){{ $data['suffix_title'] }}@endif>
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
										<input type="text" class="form-control" id="nick_name" name="nick_name" value=@if (isset($data['nick_name'])){{ $data['nick_name'] }}@endif>
										<label for="nick_name">Nama Panggilan</label>
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
											<input name="gender" type="radio" value="male"
											@if (isset($data['gender']))
												@if ($data['gender'] = "male")
													 checked="checked"
												@Endif
											@endif
											>
											<span>Laki-laki</span>
										</label>
									</div>
								</div>
								<div class="col-md-2">
									<div class="radio radio-styled">
										<label>
											<input name="gender" type="radio" value="female"
											@if (isset($data['gender']))
												@if ($data['gender'] = "female")
													 checked="checked"
												@Endif
											@endif
											>
											<span>Perempuan</span>
										</label>
									</div>
								</div>
							</div><!--end .row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value=@if (isset($data['place_of_birth'])){{ $data['place_of_birth'] }}@endif>
										<label for="place_of_birth">Tempat Lahir</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-daterange input-group" id="date_of_birth" style="width:100%;">
											<div class="input-group-content">
												<input type="text" class="form-control" name="date_of_birth" value=@if (isset($data['date_of_birth'])){{ $data['date_of_birth'] }}@endif>
												<label>Tanggal Lahir</label>
											</div>
										</div>
									</div>
								</div>
							</div><!--end .row -->
						</div><!--end .col -->
					</div><!--end .row -->
				</div><!--end .tab-pane -->
				<div class="tab-pane" id="relation">
					<ul class="list-unstyled" id="relationList"></ul>
					<div class="form-group">
						<a class="btn btn-raised btn-default-bright relation-add" data-duplicate="relationTmpl" data-target="#relationList">TAMBAHKAN RELASI</a>
					</div><!--end .form-group -->
				</div><!--end .tab-pane -->
				<div class="tab-pane" id="work">
					<ul class="list-unstyled" id="workList"></ul>
					<div class="form-group">
						<a class="btn btn-raised btn-default-bright work-add" data-duplicate="workTmpl" data-target="#workList">TAMBAHKAN PEKERJAAN</a>
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
					<a class="btn btn-flat" href="{{route('hr.persons.index')}}">BATAL</a>
					<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
			<!-- END FORM FOOTER -->
		</form>
	</div><!--end .card -->

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
						<select  id="relationship[<%=index%>]" name="relationship[<%=index%>]" class="form-control">
							<option value=""></option>
							<option value="parent">Orang Tua</option>
							<option value="spouse">Pasangan</option>
							<option value="child">Anak</option>
						</select>
						<label for="relationship[<%=index%>]">Relasi</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<input name="relation_id[<%=index%>]" id="relation_id[<%=index%>]" class="form-control getName">											
						<label for="relation_id[<%=index%>]">Nama</label>
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
											<input type="text" class="form-control" id="prefix_title_relation[<%=index%>]" name="prefix_title_relation[<%=index%>]">
											<label for="prefix_title_relation[<%=index%>]">Gelar Depan</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control" id="first_name_relation[<%=index%>]" name="first_name_relation[<%=index%>]">
											<label for="first_name_relation[<%=index%>]">Nama Depan</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control" id="midle_name_relation[<%=index%>]" name="midle_name_relation[<%=index%>]">
												<label for="midle_name_relation[<%=index%>]">Nama Tengah</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control" id="last_name_relation[<%=index%>]" name="last_name_relation[<%=index%>]">
											<label for="last_name_relation[<%=index%>]">Nama Belakang</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="suffix_title_relation[<%=index%>]" name="suffix_title_relation[<%=index%>]">
											<label for="suffix_title_relation[<%=index%>]">Gelar Belakang</label>
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
											<input type="text" class="form-control" id="nick_name_relation[<%=index%>]" name="nick_name_relation[<%=index%>]">
											<label for="nick_name_relation[<%=index%>]">Nama Panggilan</label>
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
												<input name="gender_relation[<%=index%>]" type="radio" value="male">
												<span>Laki-laki</span>
											</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="radio radio-styled">
											<label>
												<input name="gender_relation[<%=index%>]" type="radio" value="female">
												<span>Perempuan</span>
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" id="place_of_birth_relation[<%=index%>]" name="place_of_birth_relation[<%=index%>]">
											<label for="place_of_birth_relation[<%=index%>]">Tempat Lahir</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="input-daterange input-group" id="date_of_birth_relation[<%=index%>]" style="width:100%; text-align:left;">
												<div class="input-group-content">
													<input type="text" class="form-control" name="date_of_birth_relation[<%=index%>]" />
													<label>Tanggal Lahir</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-actionbar">
						<div class="card-actionbar-row">
							<a class="btn btn-flat" href="#">BATAL</a>
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
				<div class="col-md-12">
					<div class="form-group">
						<input name="work_company[<%=index%>]" id="work_company[<%=index%>]" class="form-control getCompany" data-comp="">											
						<label for="work_company[<%=index%>]">Posisi</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="work_status[<%=index%>]" name="work_status[<%=index%>]">
						<label for="work_status[<%=index%>]">Status Pegawai (contract, trial, permanent, internship)</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="work_start[<%=index%>]" name="work_start[<%=index%>]">
						<label for="work_start[<%=index%>]">Mulai Bekerja</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" id="work_end[<%=index%>]" name="work_end[<%=index%>]">
						<label for="work_end[<%=index%>]">Berhenti Bekerja</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<textarea style="resize: vertical;" name="work_quit_reason[<%=index%>]" id="work_quit_reason[<%=index%>]" class="form-control" rows="3"></textarea>
				<label for="work_quit_reason[<%=index%>]">Alasan Berhenti</label>
			</div>
		</li>
	</script>
	<!-- END WORK TEMPLATES -->

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


	<!-- BEGIN DOCUMENT TEMPLATES -->
	<script type="text/html" id="skillTmpl">
		<li class="clearfix">
			<div class="page-header no-border holder">
				<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
				<h4 class="text-accent">Dokumen <%=index%></h4>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<textarea name="input_text<%=index%>" id="input_text<%=index%>" class="form-control" rows="3"></textarea>
								<label for="input_text<%=index%>">DropZone Uploaded</label>
							</div>	
						</div>	
					</div>	
					
				</div>	
			</div>																																																											
		</li>
	</script>

	<script type="text/javascript">
		$(document).ready(function () {
			$('.getName').select2({
	            minimumInputLength: 3,
	            placeholder: '',
	            ajax: {
	                url: "{{route('hr.ajax.name')}}",
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
	                                text: item.first_name + ' ' + item.middle_name + ' ' + item.last_name ,
	                                id: item.id
	                            }
	                        })
	                    };
	                }
	            }
	        });

			$('.getCompany').select2({
	            minimumInputLength: 3,
	            placeholder: '',
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
	                }
	            }
	        });

			$('.relation-add').click(function(){
				$('.getName').select2({
		            minimumInputLength: 3,
		            placeholder: '',
		            ajax: {
		                url: "{{route('hr.ajax.name')}}",
		                dataType: 'json',
		                quietMillis: 500,
		               data: function (term) {},
		                results: function (data) {
		                    return {
		                        results: $.map(data, function (item) {
		                            return {
		                                text: item.name,
		                                id: item.id,
		                            }			                        
		                        })
		                    };
		                }
		            }
		        });	
	        });	

			$('.work-add').click(function(){
				$('.getCompany').select2({
		            minimumInputLength: 3,
		            placeholder: '',
		            ajax: {
		                url: "{{route('hr.ajax.company')}}",
		                dataType: 'json',
		                quietMillis: 500,
		               data: function (term) {},
		                results: function (data) {
		                    return {
		                        results: $.map(data, function (item) {
		                            return {
		                                text: item.name,
		                                id: item.id,
		                            }			                        
		                        })
		                    };
		                }
		            }
		        });	
	        });		        
        });	
	</script>
@stop