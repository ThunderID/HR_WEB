	<div class="modal-dialog form">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-xl" id="formModalLabel">Hapus Data</h4>
			</div>
			<div class="modal-body style-default-light">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="text-danger">Perhatian</h4>
						<p class="opacity-75">
							Apakah Anda yakin akan menghapus data? Silahkan masukkan password Anda untuk konfirmasi.
						</p>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-sm-3">
							<label for="password" class="control-label">Password</label>
						</div>
						<div class="col-sm-9">
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
						</div>
					</div>					
				</div>
			</div>
			<div class="modal-footer style-default-light">
				<p>{!! Form::hidden('from_confirm_form', 'Yes') !!}</p>
				<a type="button" class="btn btn-flat" data-dismiss="modal">Batal</a>
				<button type="submit" type="button" class="btn btn-flat btn-danger">Hapus</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	