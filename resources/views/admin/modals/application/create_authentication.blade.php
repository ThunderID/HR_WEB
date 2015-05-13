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
								Pilih menu aplikasi, dan isikan nama departemen (bisa tunggal atau jamak).
							</p>
						</article>
					</div><!--end .col -->
				</div><!--end .row -->	
				{!! Form::input('hidden', 'id', null, ['class' => 'form-control modal_schedule_id']) !!}
						
				<div class="row">
					<div class="tabs col-md-12  pt-20">
						<div class="col-md-12">
							<div class="form-group">
								<select class="form-control modal_menu_id" id ="menuid" name="menu_id">
									@foreach($data as $key => $value)
										<option value="{{$value['id']}}">{{ucwords($value['application']['name'])}} - {{$value['name']}}</option>
									@endforeach
								</select>
								<label for="menuid">Aplikasi</label>
							</div>
						</div>
					</div>					
				</div>	
				<div class="row">
					<div class="tabs col-md-12  pt-20">
						<div class="col-md-12">
							<div class="form-group">
								<input name="chart" id="chart" class="form-control getCompany">
								<label for="chart">Posisi</label>
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