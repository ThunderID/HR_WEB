<div class="modal fade modalSchedule" id="createAuthentication" tabindex="-1" role="dialog" aria-labelledby="createAuthentication" aria-hidden="true">
	<div class="modal-dialog form">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-xl modal_contact_title" id="formModalLabel">Tambah Autentikasi</h4>
			</div>
			<div class="modal-body style-default-light">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="text-primary">Petunjuk</h4>
						<article class="margin-bottom-xxl">
							<p class="opacity-75">
								Pilih menu aplikasi, dan isikan nama departemen. Jika banyak department, gunakan comma (,)
							</p>
						</article>
					</div><!--end .col -->
				</div><!--end .row -->	
				{!! Form::input('hidden', 'id', null, ['class' => 'form-control modal_schedule_id']) !!}
						
				<div class="row">
					<div class="tabs col-md-12  pt-20">
						<div class="col-md-6">
							<div class="form-group">
								{!! Form::input('text', 'name', null, ['class' => 'form-control modal_schedule_name']) !!}
								<label for="item[1]">Nama</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="input-daterange input-group">
									<div class="input-group-content">
										{!! Form::input('text', 'date_start', null, ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"']) !!}							
										<label>Tanggal</label>
									</div>
									<span class="input-group-addon">to</span>
									<div class="input-group-content">
										{!! Form::input('text', 'date_end', null, ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"']) !!}
										<div class="form-control-line"></div>
									</div>									
								</div>
							</div>
						</div>
					</div>					
				</div>	
				<div class="row">
					<div class="tabs col-md-12  pt-20">
						<div class="col-md-12">
							<div class="form-group">
								{!! Form::input('text', 'start', null, ['class' => 'form-control modal_schedule_start time_mask']) !!}								
								<label for="item[1]">Start</label>
							</div>
						</div>
					</div>
				</div>	
			</div>			
			<div class="modal-footer style-default-light">
				<a type="button" class="btn btn-flat" data-dismiss="modal">Batal</a>
				<button type="submit" type="button" class="btn btn-flat btn-primary modal_schedule_btn_save">Tambah</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>	