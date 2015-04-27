	<div class="modal-dialog modal-lg form">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-xl" id="formModalLabel">Edit Pekerjaan</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<h4>Petunjuk</h4>
						<article class="margin-bottom-xxl">
							<p>
								Isikan posisi pekerjaan, dan status pegawai. Pastikan data yang anda isikan adalah benar.<br/>
								Untuk pegawai yang saat ini masih bekerja, inputan "Berhenti Bekerja" dan "Alasan Berhenti" dapat dikosongkan.
							</p>
						</article>
					</div><!--end .col -->
				</div><!--end .row -->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							@if($isNew == false)
								<input name="work_company" id="work_company{{$key}}" class="form-control getExtCompany{{$key}}" data-comp="" value="{{$value['chart']['path']}}">											
							@else
								<input name="work_company" id="work_company{{$key}}" class="form-control getCompany" data-comp="">											
							@endif
							<label for="work_company">Posisi</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<select  id="work_status" name="work_status" class="form-control">
								<option value=""></option>
								@if($value['status']=="contract" && $isNew == false)
									<option selected value="contract">Contract</option>
								@else
									<option value="contract">Contract</option>
								@endif

								@if($value['status']=="trial" && $isNew == false)
									<option selected value="trial">Trial</option>
								@else
									<option value="trial">Trial</option>
								@endif

								@if($value['status']=="permanent" && $isNew == false)
									<option selected value="permanent">Permanent</option>
								@else
									<option value="permanent">Permanent</option>
								@endif

								@if($value['status']=="internship" && $isNew == false)
									<option selected value="internship">Internship</option>
								@else
									<option value="internship">Internship</option>
								@endif

								@if($value['status']=="previous" && $isNew == false)
									<option selected value="previous">Previous</option>
								@else
									<option value="previous">Previous</option>
								@endif										
							</select>
							<label for="work_status">Status Pegawai</label>
						</div>
					</div>
				</div>
				<div class="row">
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
										@if(is_null($value['end']))
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
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<textarea style="resize: vertical;" name="work_quit_reason" id="work_quit_reason" class="form-control" rows="3">
								@if($isNew == false)
									{{$value['reason_end_job']}}
								@endif
							</textarea>
							<label for="work_quit_reason">Alasan Berhenti</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group text-right">
							<a class="btn btn-flat" data-dismiss="modal" aria-hidden="true">BATAL</a>
							<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
						</div><!--end .card-actionbar -->
					</div>
				</div>
			</div>
		</div>
	</div>