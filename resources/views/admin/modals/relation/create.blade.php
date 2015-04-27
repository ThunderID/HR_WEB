	<div class="modal-dialog modal-lg form">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-xl" id="formModalLabel">Tambah Relasi</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<h4>Petunjuk</h4>
						<article class="margin-bottom-xxl">
							<p>
								Silahkan memilih hubungan/relasi terlebih dahulu. Bila data relasi sebelumnya telah di-inputkan, maka pilih "Data Lama" dan ketikkan nama relasi. Nila data relasi belum pernah di0input, pilih "Data Baru" dan masukkan informasi sesuai dengan inputan yang tersedia.
							</p>
						</article>
					</div><!--end .col -->
				</div><!--end .row -->
				<div class="form-group">
					<select  id="relationship" name="relationship" class="form-control">
						<option value=""></option>
						<option value="parent">Orang Tua</option>
						<option value="spouse">Pasangan</option>
						<option value="child">Anak</option>
					</select>
					<label for="relationship">Hubungan/Relasi</label>
				</div>
				<div class="tabs-left style-default-light">
					<ul class="card-head nav nav-tabs" data-toggle="tabs">
						<li><a href="#first5">Data Lama</a></li>
						<li class="active"><a href="#second5">Data Baru</a></li>
					</ul>
					<div class="card-body tab-content style-default-bright">
						<!-- tab1 -->
						<div class="tab-pane" id="first5">
							<div class="form-group">
								<input name="relation" id="relation" class="form-control getName">
								<label for="relation">Nama</label>
							</div>
						</div>
						<!-- tab2 -->

						<div class="tab-pane active" id="second5">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										{!! Form::input('text', 'prefix_title', null, ['class' => 'form-control']) !!}
										<label for="company">Gelar Depan</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-6">
									<div class="form-group @if ($errors->first('name')) has-error @endif">
										{!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
										<label for="name">Nama Lengkap</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-3">
									<div class="form-group">
										{!! Form::input('text', 'suffix_title', null, ['class' => 'form-control']) !!}
										<label for="suffix_title">Gelar Belakang</label>
									</div>
								</div><!--end .col -->									
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group @if ($errors->first('place_of_birth')) has-error @endif">
										{!! Form::input('text', 'place_of_birth', null, ['class' => 'form-control']) !!}
										<label for="place_of_birth">Tempat Lahir</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-6">
									<div class="form-group @if ($errors->first('date_of_birth')) has-error @endif">
										{!! Form::input('text', 'date_of_birth', null, ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"', 'id'=>'date_of_birth']) !!}
										<label for="date_of_birth">Tanggal Lahir</label>
									</div>		
								</div>
							</div><!--end .row -->	
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label>
											Jenis Kelamin
										</label>
									</div>
								</div>
								<div class="col-md-2 @if ($errors->first('gender')) has-error @endif">
									<div class="radio radio-styled">
										<label>
											<input name="gender" type="radio" value="male">
											<span>Laki-laki</span>
										</label>
									</div>
								</div>
								<div class="col-md-2  @if ($errors->first('gender')) has-error @endif">
									<div class="radio radio-styled">
										<label>
											<input name="gender" type="radio" value="female">
											<span>Perempuan</span>
										</label>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group @if ($errors->first('phone')) has-error @endif">
										{!! Form::input('text', 'phone', null, ['class' => 'form-control']) !!}
										<label for="phone">Nomor Telepon</label>
									</div>
								</div><!--end .col -->
							</div><!--end .row -->	


						</div>
					</div>
				</div>
			</div>
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" data-dismiss="modal" aria-hidden="true">BATAL</a>
					<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
		</div>
	</div>
