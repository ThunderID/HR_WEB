@section('content')
	<div class="row">
		<div class="col-sm-12 text-right mb-20">
			<button class="btn btn-primary btn-raised ink-reaction" data-toggle="modal" data-target="#widgetmodal">Custom Widget</button>
		</div>
	</div>
	<div class="row">
		<?php $color = ['warning', 'danger', 'success', 'info']; $x= 0;?>
		@foreach ($dashboard as $key => $db)
			@if ($db == 'stats')
				<?php 
					if ($key == 'total_branches') {
						$data['number'] = count($branches); 
					}
					else if ($key == 'total_workers') {
						$data['number']	= count($person);
					}
					else if ($key == 'total_documents') {
						$data['number']	= count($branches);	
					}
					else {
						$data['number']	= count($person);
					}
					$data['title'] = ucwords($key); 
					$data['style'] = $color[$x];
					$x++;
				?>
			@else
				<?php $data['row'] = $key; ?>
			@endif 
			
			@if ($key == 'new_person')
				<?php $data['field'] =  $person; ?>
				@include('admin.widgets.'.$db, ['title'	=> $key, 
												'route' => '',
												'mode'  => 'person',
											$data])
			@elseif ($key == 'new_branch')
				<?php $data['field'] =  $branches; ?>
				@include('admin.widgets.'.$db, ['title'	=> $key, 
												'route' => '',
												'mode'  => '',
											$data])
			@else
				@include('admin.widgets.'.$db, ['title' => $key, 
												'mode' => '', 
												'route' => '', 
											$data])
			@endif
		@endforeach
	</div>
	<!-- BEGIN FORM MODAL MARKUP -->
	<div class="modal fade" id="widgetmodal" tabindex="-1" role="dialog" aria-labelledby="widgetmodalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-xl" id="formModalLabel">Custom Widget</h4>
				</div>
				<form class="form-horizontal" role="form">
					<div class="modal-body">
						<a class="btn btn-primary ink-reaction pull-right" data-toggle="modal" href="#addwidgetmodal">Tambah Widget</a>
						<ul class="list pt-20">
							<li class="tile">
								<a class="tile-content ink-reaction" href="#2">
									<div class="tile-text">Total Letters</div>
								</a>
								<a class="btn btn-flat ink-reaction">
									<i class="fa fa-trash"></i>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-text">Total Branches</div>
								</a>
								<a class="btn btn-flat ink-reaction">
									<i class="fa fa-trash"></i>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-text">Total Workers</div>
								</a>
								<a class="btn btn-flat ink-reaction">
									<i class="fa fa-trash"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<div class="modal fade" id="addwidgetmodal" tabindex="-1" role="dialog" aria-labelledby="addwidgetmodalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-xl" id="formModalLabel">Tambah Widget</h4>
				</div>
				<form class="form" role="form">
					<div class="modal-body">
						<div class="form-group">
							<input class="form-control" id="title" type="text" name="title">
							<label for="title">Title Widget</label>
						</div>
						<div class="form-group">
							<select id="type_widgets" name="type" class="form-control" data-old="">
								<option value="">&nbsp;</option>
								<option value="table">Table</option>
								<option value="panel_list">Panel List</option>
								<option value="stats">Stats</option>
							</select>
							<label for="select1">Type</label>
						</div>

						<div class="" id="table" style="display:none">
							<div class="form-group">
								<select name="data_table" class="form-control select2-list" data-placeholder="Data Field">
									<option value="">&nbsp;</option>
									<option value="person_new">Karyawan Terbaru</option>
									<option value="letter_new">Document Terbaru</option>
								</select>
								<label>Data Field</label>
							</div>
						</div>

						<div class="" id="panel_list" style="display:none">
							<div class="form-group">
								<select name="data_panel_list" class="form-control select2-list" data-placeholder="Data Field">
									<option value="">&nbsp;</option>
									<option value="person_new">Karyawan Terbaru</option>
									<option value="letter_new">Document Terbaru</option>
								</select>
								<label>Data Field</label>
							</div>
						</div>

						<div class="" id="stats" style="display:none">
							<div class="form-group">
								<select id="data_stats" name="data_stats" class="form-control">
									<option value="">&nbsp;</option>
									{{-- <option value="letters">Letters</option> --}}
									<option value="branches">Branches</option>
									<option value="workers">Workers</option>
									<option value="documents">Documents</option>
								</select>
								<label for="data">Data Field</label>
							</div>
						</div>

						<div class="form-group">
							<select id="select1" name="order" class="form-control">
								<option value="">&nbsp;</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
							<label for="select1">Urutan</label>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
						<button type="button" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- END FORM MODAL MARKUP -->
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function (){
			$('#type_widgets').change(function(){
				var val = $(this).val();
				var data_old = $(this).attr('data-old');;

				$('#'+data_old).css('display', 'none');
				$('#'+val).css('display', 'block');	

				$(this).attr('data-old', val);
			});
		});
	</script>
@stop