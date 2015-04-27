	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="simpleModalLabel">Hapus Data</h4>
			</div>
			<div class="modal-body">
				<p>Apakah Anda yakin akan menghapus data? Silahkan masukkan password Anda untuk konfirmasi.</p>
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
			<div class="modal-footer">
				<p>{!! Form::hidden('from_confirm_form', 'Yes') !!}</p>
				<a type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
				<button type="submit" type="button" class="btn btn-danger">Hapus</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	