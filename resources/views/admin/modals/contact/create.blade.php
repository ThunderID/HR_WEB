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
						<div class="col-md-12">
							<div class="form-group">	
								{{-- <select name="item[1]" id="" class="form-control getContacts modal_contact_inp_item">
									<option value="bbm">BBM</option>
									<option value="whatsapp">Whatsapp</option>
									<option value="line">LINE</option>
									<option value="email">Email</option>
								</select>							 --}}
								<input name="item[1]" id="item[1]" class="form-control getContacts modal_contact_inp_item" data-comp="">																
								<label for="item[1]">Jenis</label>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea class="form-control modal_contact_inp_value" name="value[1]" style="resize: none;" rows="2"></textarea>
								<label for="value[1]">Isian</label>
							</div>
						</div>
					</div>					
				</div>	
				<div class="row">
					<div class="tabs col-md-12  pt-20">
						<div class="col-md-12">
							<div class="form-group">
								<div class="checkbox checkbox-styled">
									<label class="checkbox-inline checkbox-styled">
										<input type="checkbox" name="default_contact" class="modal_default_contact"><span class="text-light">Kontak Primary</span>
									</label>									
								</div>
							</div>
						</div>
					</div>
				</div>
				<input class="modal_contact_input_id" type="hidden" name="id_item[1]">
			</div>			
			<div class="modal-footer style-default-light">
				<a type="button" class="btn btn-flat" data-dismiss="modal">Batal</a>
				<button type="submit" type="button" class="btn btn-flat btn-primary modal_contact_btn_save">Tambah</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>	