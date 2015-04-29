<div class="modal fade modalContact" id="contactCreate" tabindex="-1" role="dialog" aria-labelledby="contactCreate" aria-hidden="true">
	<div class="modal-dialog form">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-xl modal_contact_title" id="formModalLabel">Tambah Kontak</h4>
			</div>
			<div class="modal-body style-default-light">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="text-primary">Petunjuk</h4>
						<article class="margin-bottom-xxl">
							<p class="opacity-75">
								Pilih jenis kontak kemudian isikan data kontak pada kolom isian.
							</p>
						</article>
					</div><!--end .col -->
				</div><!--end .row -->	
						
				<div class="row">
					<div class="tabs col-md-12  pt-20">
						<div class="col-md-6">
							<div class="form-group">
								<input name="item[1]" id="item[1]" class="form-control getContacts inp_item" data-comp="">																
								<label for="item[1]">Jenis Kontak</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control inp_value" id="value[1]" name="value[1]">
								<label for="value[1]">Isian</label>
							</div>
						</div>					
					</div>					
				</div>	
				<input class="input_id" type="hidden" name="id_item">
			</div>			
			<div class="modal-footer style-default-light">
				<a type="button" class="btn btn-flat" data-dismiss="modal">Batal</a>
				<button type="submit" type="button" class="btn btn-flat btn-primary btn_save">Tambah</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>	