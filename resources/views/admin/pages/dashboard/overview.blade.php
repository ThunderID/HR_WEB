@section('content')
	<div class="row">
		<div class="col-sm-12 text-right mb-20">
			<button class="btn btn-primary btn-raised ink-reaction add_widget">Tambah Widget</button>
		</div>
	</div>
	<?php $color = ['warning', 'danger', 'success', 'info']; 
		$x 	= 0; 
		$st 	= 1;
		$pn 	= 1;
		$tb 	= 1;
	?>
		@foreach ($dashboard as $key => $db)
			@if ($db['type'] == 'stat')
				@if ($st == 1)
					<div class="row">
				@endif
				<?php 
					$data['title'] 		= ucwords($db['title']); 
					$data['number']		= $db['data']['number'];
					$data['function'] 	= $db['function']; 
					$data['style'] 		= $color[$x];
					$x++;
					$st++;
				?>
			@elseif ($db['type'] == 'panel')
				@if ($pn == 1)
					</div>
					<div class="row">
				@endif
				<?php
					$data['title'] 		= ucwords($db['title']); 
					$data['data']		= $db['data']['data'];
					$data['function'] 	= $db['function']; 
					$x++;
					$pn++;
				?>
			@elseif ($db['type'] == 'table')
				<?php
					$data['title']		= ucwords($db['title']);
					$data['data']		= $db['data']['data'];
					$data['function']	= $db['function'];
					$data['field']		= $db['field'];
					$x++;
					$tb++;
				?>
			@endif

			<?php $data['id'] = $db['id']; ?>
			@include('admin.widgets.'.$db['type'], ['title' => $db['title'], 
											'mode' => '', 
											'route' => '', 
											$data])
		@endforeach
	</div>
	<!-- BEGIN FORM MODAL MARKUP -->
	<div class="modal fade" id="widgetmodal" tabindex="-1" role="dialog" aria-labelledby="widgetmodalLabel" aria-hidden="true" data-action="create">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-xl" id="formModalLabel">Tambah Widget</h4>
				</div>
				<form class="form form_store" role="form" action="{{route('hr.dashboard.widgets.store')}}" method="post">
					<div class="modal-body">
						<div class="form-group">
							<input class="form-control" id="title" type="text" name="title">
							<label for="title">Title Widget</label>
						</div>
						<div class="form-group">
							<select id="type" name="function" class="form-control select2-list" data-old="">
								<option value="">-- Pilih --</option>
								<option value="total_documents">Total Dokumen</option>
								<option value="index_documents">List Dokumen</option>
								<option value="total_employees">Total Karyawan</option>
								<option value="index_employees">List Karyawan</option>
								<option value="total_branches">Total Perusahaan</option>
								<option value="index_branches">List Perusahaan</option>
							</select>
							<label for="select1">Data Field</label>
						</div>
						<div id="type_widgets" style="display:none">
							<div class="form-group">
								<select id="type_widget" name="type" class="form-control select2-list" data-old="">
									<option value="panel">Panel List</option>
									<option value="table">Table</option>
								</select>
								<label for="select1">Type</label>
							</div>
						</div>

						<div class="total_documents index_documents" style="display:none">
							<div class="form-group">
								<select name="content_documents" id="list_type_document" class="form-control select2-list">
									<option value="all">Semua</option>
									<option value="sp">Surat Peringatan</option>
								</select>
								<label for="">Tipe Dokumen</label>
							</div>
						</div>

						<div class="total_employees index_employees" style="display:none">
							<div class="form-group">
								<select name="content_employees" id="content_employees" class="form-control select2-list">
									<option value="all">Semua Karyawan</option>
									<option value="checkcreate">Karyawan Terbaru</option>
									<option value="checkresign">Karyawan Resign</option>
								</select>
								<label for="">Field Karyawan</label>
							</div>
						</div>

						<div class="total_branches index_branches" style="display:none">
							<div class="form-group">
								<select name="content_branches" id="content_branches" class="form-control select2-list">
									<option value="all">Semua Perusahaan</option>
									<option value="checkcreate">Perusahaan Terbaru</option>
									<option value="countworkerbystatus">Jumlah Karyawan di Perusahaan</option>
									<option value="countresign">Jumlah Karyawan Resign di Perusahaan</option>
								</select>
								<label for="">Field Perusahaan</label>
							</div>
						</div>

						<div class="form-group">
							<select name="date" id="list_date" class="form-control select2-list">
								<option value="3_days">Per 3 hari</option>
								<option value="7_days">Per 7 hari</option>
								<option value="1_months">Per 1 bulan</option>
								<option value="3_months">Per 3 bulan</option>
								<option value="5_months">Per 5 bulan</option>
								<option value="1_years">Per 1 tahun</option>
								<option value="all">Tidak ada batas waktu</option>
							</select>
							<label for="">Batas Tanggal</label>
						</div>

						<div class="form-group">
							<input type="text" name="order" class="form-control">
							{{-- <select id="select1" name="order" class="form-control"> --}}
								{{-- @for($i=count($dashboard)+1;$i<=6;$i++) --}}
									{{-- <option value="{{$i}}">{{$i}}</option> --}}
								{{-- @endfor --}}
							{{-- </select> --}}
							<label for="select1">Urutan</label>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="modal fade" id="delete_widget" tabindex="-1" role="dialog" aria-labelledby="deleteWidgetModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<form class="form form_delete_widget" role="form" action="" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="simpleModalLabel">Hapus Widget</h4>
					</div>
					<div class="modal-body">
						<p>Anda yakin ingin menghapus widget ini ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
						<button type="submit" class="btn btn-primary">HAPUS</button>
					</div>
				</div><!-- /.modal-content -->
			</form><!-- /.modal-dialog -->
		</div>
	</div>

	{{-- <div class="modal fade" id="addwidgetmodal" tabindex="-1" role="dialog" aria-labelledby="addwidgetmodalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-xl" id="formModalLabel">Tambah Widget</h4>
				</div>
				<form class="form" role="form" action="{{route('hr.dashboard.widgets.store')}}" method="post">
					<div class="modal-body">
						<div class="form-group">
							<input class="form-control" id="title" type="text" name="title">
							<label for="title">Title Widget</label>
						</div>
						<div class="form-group">
							<select id="type_widgets" name="type" class="form-control" data-old="">
								<option value="">&nbsp;</option>
								<option value="table">Table</option>
								<option value="panel">Panel List</option>
								<option value="stat">Stats</option>
							</select>
							<label for="select1">Type</label>
						</div>

						<div class="" id="table" style="display:none">
							<div class="form-group">
								<select name="data_table" class="form-control select2-list" data-placeholder="Data Field">
									<option value="">&nbsp;</option>
									<option value="new_employees_3_days">Karyawan Terbaru Dalam 3 Hari</option>
									<option value="new_employees_7_days">Karyawan Terbaru Dalam 7 Hari</option>
									<option value="new_branches_1_year">Perusahaan Terdaftar Dalam 1 Tahun</option>
								</select>
								<label>Data Field</label>
							</div>
						</div>

						<div class="" id="panel" style="display:none">
							<div class="form-group">
								<select name="data_panel" class="form-control select2-list" data-placeholder="Data Field">
									<option value="">&nbsp;</option>
									<option value="new_employees_3_days">Karyawan Terbaru Dalam 3 Hari</option>
									<option value="new_employees_7_days">Karyawan Terbaru Dalam 7 Hari</option>
									<option value="new_branches_1_year">Perusahaan Terdaftar Dalam 1 Tahun</option>
								</select>
								<label>Data Field</label>
							</div>
						</div>

						<div class="" id="stat" style="display:none">
							<div class="form-group">
								<select id="data_stat" name="data_stat" class="form-control">
									<option value="">&nbsp;</option>
									<option value="total_documents">Letters</option>
									<option value="total_letters">Branches</option>
									<option value="total_employees">Workers</option>
									<option value="total_branches">Documents</option>
								</select>
								<label for="data">Data Field</label>
							</div>
						</div>

						<div class="form-group">
							<select id="select1" name="order" class="form-control">
								@for($i=count($dashboard)+1;$i<=6;$i++)
									<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>
							<label for="select1">Urutan</label>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal --> --}}
	<!-- END FORM MODAL MARKUP -->
@stop

@section('css')
	{!! HTML::style('css/toastr.css')!!}	
@stop

@section('js')
	{!! HTML::script('js/toastr.js')!!}
	<script type="text/javascript">
		$(document).ready(function (){
			$('.add_widget').click(function(){
				var action = "{{ route('hr.dashboard.widgets.store') }}";
				$('.form_store').attr('action', action);
				$('#widgetmodal').modal();
			});
			$('.edit_widget').click(function(){
				var action = $(this).attr('data-content');
				$('.form_store').attr('action', action);
				$('#widgetmodal').modal();
			});
			$('.del_widget').click(function(){
				var action = $(this).attr('data-content');
				$('.form_delete_widget').attr('action', action);
				$('#delete_widget').modal();
			});
			$('#type').change(function(){
				var val = $(this).val();
				var data_old = $(this).attr('data-old');
				var tot = 'total', branch = 'branches', emp = 'employees', doc = 'documents';

				if ((val.indexOf(tot) != -1)||(val=='')) {
					$('#type_widgets').css('display', 'none');
				}
				else {
					$('#type_widgets').css('display', 'block');
				}
				
				if (data_old != '') {
					$('.'+data_old).css('display', 'none');
				}
				$('.'+val).css('display', 'block');	

				$(this).attr('data-old', val);
			});


			$('.card-widget').hover(function(){
				$(this).find('.btn-group').toggleClass('show');
			});
		});
	</script>
@stop