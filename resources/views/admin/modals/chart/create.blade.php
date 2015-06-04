	<div class="modal-dialog modal-lg form">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-xl" id="formModalLabel">Tambah Chart</h4>
			</div>
			<div class="modal-body style-default-light">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="text-primary">Petunjuk</h4>
						<article class="margin-bottom-xxl">
							<p class="opacity-75">
								Masukkan data sesuai dengan inputan yang ada. 
							</p>
						</article>
					</div><!--end .col -->
				</div><!--end .row -->
				<div class="tabs-left style-default-light">
					<div class="card-body tab-content style-default-bright">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control" id="path" name="path">
										<option value=""></option>
										@foreach($charts as $key => $value)
											<option value="{{$value['path']}}">{{$value['name']}} - {{$value['tag']}}</option>
										@endforeach
									</select>
									<label for="path">Atasan</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">	
									<input type="text" class="form-control" id="grade" name="tag">
									<label for="grade">Departemen</label>
								</div>				
							</div>				
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control input-lg" id="name" name="name">
									<label for="name">Nama</label>
								</div>
							</div>
						</div><!--end .row -->
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="min_employee" name="min_employee">
									<label for="min_employee">Jumlah Minimum Pegawai</label>
								</div>
							</div><!--end .col -->
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="ideal_employee" name="ideal_employee">
									<label for="ideal_employee">Jumlah Ideal Pegawai</label>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="max_employee" name="max_employee">
									<label for="max_employee">Jumlah Maksimum Pegawai</label>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="grade" name="grade" Placehoder="(Biarkan kosong untuk departemen)">
									<label for="grade">Grade</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			{!!Form::hidden('org_id', $data['id'])!!}
			<div class="card-actionbar style-default-light">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" data-dismiss="modal" aria-hidden="true">BATAL</a>
					<button type="submit" class="btn btn-flat btn-primary">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->				
		</div>
	</div>
