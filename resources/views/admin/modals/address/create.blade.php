<div class="modal fade modalAddress" id="addressCreate" tabindex="-1" role="dialog" aria-labelledby="addressCreate" aria-hidden="true">
	<div class="modal-dialog form">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-xl modal_address_title" id="formModalLabel">Tambah Alamat</h4>
			</div>
			<div class="modal-body style-default-light">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="text-primary">Petunjuk</h4>
						<article class="margin-bottom-xxl">
							<p class="opacity-75">
								Isikan alamat lengkap pada kolom dibawah ini.
							</p>
						</article>
					</div><!--end .col -->
				</div><!--end .row -->					
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<textarea class="form-control modal_address_value" name="address_address[1]" style="resize: none;" rows="2"></textarea>
							<label for="address_address[1]">Alamat Lengkap</label>
						</div>
					</div>
				</div>	
				<input class="modal_address_input_id" type="hidden" name="id_address[1]">
			</div>			
			<div class="modal-footer style-default-light">
				<a type="button" class="btn btn-flat" data-dismiss="modal">Batal</a>
				<button type="submit" type="button" class="btn btn-flat btn-primary modal_address_btn_save">Tambah</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>	