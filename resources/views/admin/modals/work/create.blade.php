	<div class="modal-dialog modal-lg form">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-xl" id="formModalLabel">Tambah Pekerjaan</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<h4>Petunjuk</h4>
						<article class="margin-bottom-xxl">
							<p>
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
						@if($isNew == true || $value['chart_id']!=0)
							<li class="active"><a href="#first5">Perusahaan ini</a></li>
						@endif
						@if($isNew == true || $value['chart_id']==0)
							<li><a href="#second5">Perusahaan lain</a></li>
						@endif
					</ul>
					<div class="card-body tab-content style-default-bright">
						<!-- tab1 -->
						<div class="tab-pane @if($isNew == true || $value['chart_id']!=0) active @endif" id="first5">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										@if($isNew == false)
											<input name="work_company" id="work_company[{{$key}}]" class="form-control getExtCompany{{$key}}" data-comp="" value="{{$value['chart']['path']}}">											
										@else
											<input name="work_company" id="work_company[{{$key}}]" class="form-control getCompany" data-comp="">											
										@endif
										<label for="work_company">Posisi</label>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane @if($isNew == false && $value['chart_id']==0) active @endif" id="second5">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										{!! Form::input('text', 'work_organisation', (isset($value['organisation']) ? $value['organisation'] : null), ['class' => 'form-control']) !!}
										<label for="work_organisation">Perusahaan</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-6">
									<div class="form-group @if ($errors->first('position')) has-error @endif">
										{!! Form::input('text', 'work_position', (isset($value['position']) ? $value['position'] : null), ['class' => 'form-control']) !!}
										<label for="work_position">Posisi</label>
									</div>
								</div><!--end .col -->
							</div>
						</div>
					</div>
				</div>

				<div class="row pl-25">
					<div class="col-md-12">
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
				</div>
				<div class="row pl-25">
					<div class="col-md-6">
						<div class="form-group">
							<div class="input-group" id="work_start" style="width:100%;">
								<div class="input-group-content">
								@if($isNew == false)
									{!! Form::input('text', 'work_start', date("d m Y", strtotime($value['start'])), ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"', 'id'=>'work_start']) !!}
								@else
									{!! Form::input('text', 'work_start', null, ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"', 'id'=>'work_start']) !!}
								@endif
								</div>
							</div>
							<label for="work_start">Mulai Bekerja</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="input-group" id="work_end" style="width:100%;">
								<div class="input-group-content">
									@if($isNew == false)
										@if(is_null($value['end']) || $value['end'] == '0000-00-00')
											{!! Form::input('text', 'work_end', null, ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"', 'id'=>'work_end']) !!}
										@else
											{!! Form::input('text', 'work_end', date("d m Y", strtotime($value['end'])), ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"', 'id'=>'work_end']) !!}
											<input type="hidden" id="cur_work_end" name="cur_work_end" value="{{date("d F Y", strtotime($value['end']))}}">
										@endif
									@else
										{!! Form::input('text', 'work_end', null, ['class' => 'form-control date_mask', 'data-inputmask' => '"alias" : "date"', 'id'=>'work_end']) !!}
									@endif
								</div>
							</div>
							<label for="work_end">Berhenti Bekerja</label>
						</div>
					</div>
				</div>
				<div class="row pl-25">
					<div class="col-md-12">
						<div class="form-group">
							<textarea style="resize: vertical;" name="work_quit_reason" id="work_quit_reason" class="form-control" rows="3">@if($isNew == false){{$value['reason_end_job']}}@endif</textarea>
							<label for="work_quit_reason">Alasan Berhenti</label>
						</div>
					</div>
				</div>
			</div>
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" data-dismiss="modal" aria-hidden="true">BATAL</a>
					<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
		</div>
	</div>
