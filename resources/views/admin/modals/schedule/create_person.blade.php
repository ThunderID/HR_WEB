<div class="modal fade modalPerson" id="personCreate" tabindex="-1" role="dialog" aria-labelledby="personCreate" aria-hidden="true">
	<div class="modal-dialog form">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-xl modal_contact_title" id="formModalLabel">Tambah Karyawan di Kalender ini</h4>
			</div>
			<div class="modal-body style-default-light">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="text-primary">Petunjuk</h4>
						<article class="margin-bottom-xxl">
							<p class="opacity-75">
								Untuk Menambahkan banyak karyawan silahkan gunakan comma (,)
							</p>
						</article>
					</div><!--end .col -->
				</div><!--end .row -->	
						
				<div class="row">
					<div class="tabs col-md-12  pt-20">
						<div class="col-md-12">
							<div class="form-group">
								<input name="person" id="person" class="form-control getName">
								<label for="person">Nama</label>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="date" class="form-control modal_when_tgl date_mask" id="when" name="when" data-inputmask="'alias':'date'">
								<label for="when">Mulai Tanggal</label>
							</div>
						</div>
					</div>					
				</div>	
				<input class="modal_contact_input_id" type="hidden" name="id_item[1]">
			</div>			
			<div class="modal-footer style-default-light">
				<a type="button" class="btn btn-flat" data-dismiss="modal">Batal</a>
				<button type="submit" type="button" class="btn btn-flat btn-primary modal_schedule_btn_save">Tambah</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>	