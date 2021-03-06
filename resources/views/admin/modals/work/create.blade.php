<div class="modal fade modalWork" id="workCreate" tabindex="-1" role="dialog" aria-labelledby="workCreate" aria-hidden="true">
	<div class="modal-dialog modal-lg form">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-xl" id="formModalLabel">Tambah Pekerjaan</h4>
			</div>
			<div class="modal-body style-default-light">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="text-primary">Petunjuk</h4>
						<article class="margin-bottom-xxl">
							<p class="opacity-75">
								Isikan posisi pekerjaan, dan status pegawai. Pastikan data yang anda isikan adalah benar.<br/>
								Untuk pegawai yang saat ini masih bekerja, inputan "Berhenti Bekerja" dan "Alasan Berhenti" dapat dikosongkan.
								Untuk pegawai yang saat ini tidak bekerja, dikantor ini lagi inputan "Berhenti Bekerja" dan "Alasan Berhenti" dapat diisi.
								Untuk mengisi pengalaman kerja pegawai pilih tab pengalaman.
							</p>
						</article>
					</div><!--end .col -->
				</div><!--end .row -->
				<div class="tabs style-default-light">
					<ul class="card-head nav nav-tabs" data-toggle="tabs">
						{{-- @if($isNew == true || $value['chart_id']!=0) --}}
							<li class="active"><a href="#first5">Perusahaan ini</a></li>
						{{-- @endif --}}
						{{-- @if($isNew == true || $value['chart_id']==0) --}}
							<li class="tab_chart" id="tab_chart"><a href="#second5">Perusahaan lain</a></li>
						{{-- @endif --}}
					</ul>
				</div>
				<div class="card-body tab-content style-default-bright">
					<!-- tab1 -->
					<div class="tab-pane active" id="first5">
					{{-- <div class="tab-pane @if($isNew == true || $value['chart_id']!=0) active @endif" id="first5"> --}}
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									{{-- @if($isNew == false) --}}
										{{-- <input name="work_company" id="work_company[{{$key}}]" class="form-control getExtCompany{{$key}}" data-comp="" value="">											 --}}
									{{-- @else --}}
										<input name="work_company" id="work_company" class="form-control getCompany getAjax modal_work_company" data-comp="" tab-index="1">
									{{-- @endif --}}
									<label for="work_company">Posisi</label>
								</div>
							</div>
						</div>
					</div>
					<!-- tab2 -->
					<div class="tab-pane" id="second5">
					{{-- <div class="tab-pane @if($isNew == false && $value['chart_id']==0) active @endif" id="second5"> --}}
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									{!! Form::input('text', 'work_organisation', '', ['class' => 'form-control modal_work_organisation', 'tab-index' => '2']) !!}

									{{-- {!! Form::input('text', 'work_organisation', (isset($value['organisation']) ? $value['organisation'] : null), ['class' => 'form-control']) !!} --}}
									<label for="work_organisation">Perusahaan</label>
								</div>
							</div><!--end .col -->
							<div class="col-md-6">
								<div class="form-group @if ($errors->first('position')) has-error @endif">
									{!! Form::input('text', 'work_position', '', ['class' => 'form-control modal_work_position', 'tab-index' => '3']) !!}
									{{-- {!! Form::input('text', 'work_position', (isset($value['position']) ? $value['position'] : null), ['class' => 'form-control']) !!} --}}
									<label for="work_position">Posisi</label>
								</div>
							</div><!--end .col -->
						</div>
					</div>

					<div class="col-md-12">
						<div class="row">
							<div class="form-group">
								<select name="calendar" id="getCalendar" class="form-control modal_calendar" tab-index="4">
									<option value="">Pilih</option>
								</select>
								<label>Kalender</label>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="form-group">
								@if($isNew == false)
									<?php $data_value = $value['status'] ?>
									@include('admin.helpers.dropdowns.work-status')
								@else
									<?php $data_value = Null ?>
									@include('admin.helpers.dropdowns.work-status')
								@endif
								<label for="work_status">Status Pegawai</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6" style="padding-left:0px;">
								<div class="form-group">
									<div class="input-group" id="work_start" style="width:100%;">
										<div class="input-group-content">
										{{-- @if($isNew == false) --}}
											{{-- {!! Form::input('text', 'work_start', date("d-m-Y", strtotime($value['start'])), ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"', 'id'=>'work_start']) !!} --}}
										{{-- @else --}}
										{{-- @endif --}}
											{!! Form::input('text', 'work_start', null, ['class' => 'form-control date_mask modal_work_start', 'data-inputmask' => '"alias" : "date"', 'id'=>'work_start']) !!}
										</div>
									</div>
									<label for="work_start">Mulai Bekerja</label>
								</div>
							</div>
							<div class="col-md-6" style="padding-right:0px;">
								<div class="form-group">
									<div class="input-group" id="work_end" style="width:100%;">
										<div class="input-group-content">
													{!! Form::input('text', 'work_end', null, ['class' => 'form-control date_mask modal_work_end', 'data-inputmask' => '"alias" : "date"', 'id'=>'work_end']) !!}
											{{-- @if($isNew == false) --}}
												{{-- @if(is_null($value['end']) || $value['end'] == '0000-00-00') --}}
												{{-- @else --}}
													{{-- {!! Form::input('text', 'work_end', date("d-m-Y", strtotime($value['end'])), ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"', 'id'=>'work_end']) !!} --}}
													<input type="hidden" id="cur_work_end" name="cur_work_end" value="">	
													{{-- <input type="hidden" id="cur_work_end" name="cur_work_end" value="{{date("d F Y", strtotime($value['end']))}}"> --}}
												{{-- @endif --}}
											{{-- @else --}}
												{{-- {!! Form::input('text', 'work_end', null, ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"', 'id'=>'work_end']) !!} --}}
											{{-- @endif --}}
										</div>
									</div>
									<label for="work_end">Berhenti Bekerja</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<textarea style="resize: none;" name="work_quit_reason" id="work_quit_reason" class="form-control modal_reason_resign" rows="3">
									{{-- @if($isNew == false){{$value['reason_end_job']}}@endif --}}
								</textarea>
								<label for="work_quit_reason">Alasan Berhenti</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-actionbar style-default-light">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" data-dismiss="modal" aria-hidden="true">BATAL</a>
					<button type="submit" class="btn btn-flat btn-primary modal_btn_work">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
		</div>
	</div>
</div>