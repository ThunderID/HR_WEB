<form role="form" action="{{route('hr.persons.documents.store', ['id' => $data['id'], 'tag' => Input::get('tag')])}}" method="post" class="modal_form_document">
	<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-xl" id="formModalLabel">Tambah Dokumen</h4>
				</div>
				<div class="modal-body style-default-light">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="text-primary">Petunjuk</h4>
							<article class="margin-bottom-xxl">
								<p class="opacity-75">
									Masukkan data sesuai dengan inputan yang ada. 
								</p>
							</article>
						</div><!--end .col -->
					</div><!--end .row -->
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<select id="docs_type" name="docs_type" class="form-control">
									<option value=""></option>								
									@foreach($documents as $key => $value)
										@if(Input::get('tag'))									
											@if($value['tag']==Input::get('tag'))
												<option value="{{$key}}">{{$value['name']}}</option>
											@endif
										@else
											<option value="{{$key}}">{{$value['name']}}</option>
										@endif
									@endforeach	
								</select>									
								<label for="docs_type">Jenis Dokumen</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 input_panel" id="input_panel">
						</div>
					</div>
				</div>

				<div class="card-actionbar-row style-default-light">
					<a class="btn btn-flat" data-dismiss="modal" aria-hidden="true">BATAL</a>
					<button type="submit" class="btn btn-flat btn-primary modal_btn_form_document">SIMPAN DATA</button>
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
		</div>
	</div>			
</form>

@foreach($documents as $key => $value)
	<script type="text/html" id="panel{{$key}}">
		<input name="documents_id[{{$key}}]"type="hidden" value="{{$value['id']}}">											
		<input name="documents[{{$key}}]"type="hidden" value="">
		@foreach($value['templates'] as $key2 => $value2)
			<div class="form-group">
				@if($value2['type']=='numeric' || $value2['type']=='string')
					<input name="template_value[{{$key}}][{{$key2}}]" id="template_value[{{$key}}][{{$key2}}]" class="form-control">											
					<label for="template_value[{{$key}}][{{$key2}}]">{{$value2['field']}}</label>
					<input name="template_id[{{$key}}][{{$key2}}]"type="hidden" value="{{$value2['id']}}">											
				@elseif($value2['type']=='date')
					<div class="input-daterange input-group" id="template_value[{{$key}}][{{$key2}}]" style="width:100%;">
						<div class="input-group-content">
							<input type="text" class="form-control" name="template_value[{{$key}}][{{$key2}}]">
						</div>
					</div>
					<label for="template_value[{{$key}}][{{$key2}}]">{{$value2['field']}}</label>
					<input name="template_id[{{$key}}][{{$key2}}]"type="hidden" value="{{$value2['id']}}">											
				@elseif($value2['type']=='text')
					<textarea name="template_value[{{$key}}][{{$key2}}]" id="template_value[{{$key}}][{{$key2}}]" class="form-control"></textarea>										
					<label for="template_value[{{$key}}][{{$key2}}]">{{$value2['field']}}</label>
					<input name="template_id[{{$key}}][{{$key2}}]"type="hidden" value="{{$value2['id']}}">											
				@endif
			</div>
		@endforeach
	</script>
@endforeach