<div class="modal fade modalChart" id="chartCreate" tabindex="-1" role="dialog" aria-labelledby="chartCreate" aria-hidden="true">
	<div class="modal-dialog form">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-xl modal_contact_title" id="formModalLabel">Tambah Cuti untuk posisi tertentu</h4>
			</div>
			<div class="modal-body style-default-light">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="text-primary">Petunjuk</h4>
						<article class="margin-bottom-xxl">
							<p class="opacity-75">
								Untuk Menambahkan banyak chart silahkan gunakan comma (,)
							</p>
						</article>
					</div><!--end .col -->
				</div><!--end .row -->	
						
				<div class="row">
					<div class="tabs col-md-12  pt-20">
						<div class="col-md-12">
							<div class="form-group">
								<input name="chart" id="chart" class="form-control getCompany">
								<label for="chart">Nama</label>
							</div>
						</div>
					</div>					
				</div>	
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="input-daterange input-group">
								<div class="input-group-content">
									{!! Form::input('text', 'start', null, ['class' => 'form-control modal_workleave_start date_mask', 'data-inputmask' => '"alias" : "date"']) !!}							
									<label>Tanggal</label>
								</div>
								<span class="input-group-addon">to</span>
								<div class="input-group-content">
									{!! Form::input('text', 'end', null, ['class' => 'form-control modal_workleave_end date_mask', 'data-inputmask' => '"alias" : "date"']) !!}
									<div class="form-control-line"></div>
								</div>									
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
										<input type="checkbox" name="is_default" class="modal_is_default"><span>Hak Cuti</span>
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
				<button type="submit" type="button" class="btn btn-flat btn-primary modal_schedule_btn_save">Tambah</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>	