<div class="modal fade modalWorkleave" id="workleaveCreate" tabindex="-1" role="dialog" aria-labelledby="workleaveCreate" aria-hidden="true">
	<div class="modal-dialog form">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-xl modal_contact_title" id="formModalLabel">Tambah Cuti</h4>
			</div>
			<div class="modal-body style-default-light">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="text-primary">Petunjuk</h4>
						<article class="margin-bottom-xxl">
							<p class="opacity-75">
								Start merupakan waktu tanggal mulai, dan end merupakan tanggal berakhir.
							</p>
						</article>
					</div><!--end .col -->
				</div><!--end .row -->	
				{!! Form::input('hidden', 'id', null, ['class' => 'form-control modal_workleave_id']) !!}
						
				<div class="row">
					<div class="tabs col-md-12  pt-20">
						<div class="col-sm-12">
							<div class="form-group">
								<input name="workleave" id="workleave" class="form-control getWorkleave">
								<label for="item[1]">Cuti</label>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<div class="input-daterange input-group">
									<div class="input-group-content">
										{!! Form::input('text', 'start', null, ['class' => 'form-control modal_workleave_date_start date_mask', 'data-inputmask' => '"alias" : "date"']) !!}							
										<label>Tanggal</label>
									</div>
									<span class="input-group-addon">to</span>
									<div class="input-group-content">
										{!! Form::input('text', 'end', null, ['class' => 'form-control modal_workleave_date_end date_mask', 'data-inputmask' => '"alias" : "date"']) !!}
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
								<div class="checkbox checkbox-styled">
									<input type="checkbox" name="is_default" class="modal_is_default">
									<label for="is_default">Hak Cuti</label>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>			
			<div class="modal-footer style-default-light">
				@if (Route::currentRouteName() == 'hr.persons.workleaves.index')
					<a class='delete_workleave modal_workleave_btn_del pull-left btn btn-flat btn-danger hide' data-toggle='modal' data-target='#del_workleave_modal' data-delete-action="0">delete</a>
				@endif
				<a type="button" class="btn btn-flat" data-dismiss="modal">Batal</a>
				<button type="submit" type="button" class="btn btn-flat btn-primary modal_workleave_btn_save">Tambah</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>	