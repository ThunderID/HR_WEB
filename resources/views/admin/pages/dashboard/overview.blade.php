@section('content')
	<div class="row">
		<div class="col-sm-12 text-right mb-20">
			<button class="btn btn-primary btn-raised ink-reaction" data-toggle="modal" data-target="#widgetmodal">Tambah Widget</button>
		</div>
	</div>
	<div class="row">
		<?php $color = ['warning', 'danger', 'success', 'info']; $x= 0;?>
		@foreach ($dashboard as $key => $db)
			@if ($db['type'] == 'stat')
				<?php 
					$data['number']		= $db['data']['number'];
					$data['title'] 		= ucwords($db['title']); 
					$data['function'] 	= $db['function']; 
					$data['style'] 		= $color[$x];
					$x++;
				?>
			@else
				<?php
					$data['data']		= $db['data']['data'];
					$data['title'] 		= ucwords($db['title']); 
					$data['function'] 	= $db['function']; 
					$x++;
				?>
			@endif
				@include('admin.widgets.'.$db['type'], ['title' => $db['title'], 
												'mode' => '', 
												'route' => '', 
												$data])
		@endforeach
	</div>
	<!-- BEGIN FORM MODAL MARKUP -->
	<div class="modal fade" id="widgetmodal" tabindex="-1" role="dialog" aria-labelledby="widgetmodalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-xl" id="formModalLabel">Tambah Widget</h4>
				</div>
				<form class="form-horizontal" role="form">
					<div class="modal-body">
						<a class="btn btn-primary ink-reaction pull-right" data-toggle="modal" href="#addwidgetmodal">Tambah Widget</a>
						<ul class="list pt-20">
							@foreach($dashboard as $key => $value)
								<li class="tile">
									<a class="tile-content ink-reaction" href="#2">
										<div class="tile-text">{{ucwords($value['title'])}}</div>
									</a>
									<a class="btn btn-flat ink-reaction" href="{{route('hr.dashboard.widgets.delete', [$value['id']])}}">
										<i class="fa fa-trash"></i>
									</a>
								</li>
							@endforeach
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
	</div><!-- /.modal -->
	<!-- END FORM MODAL MARKUP -->
@stop

@section('css')
	{!! HTML::style('css/toastr.css')!!}	
@stop

@section('js')
	{!! HTML::script('js/toastr.js')!!}
	<script type="text/javascript">
		$(document).ready(function (){
			$('#type_widgets').change(function(){
				var val = $(this).val();
				var data_old = $(this).attr('data-old');;

				$('#'+data_old).css('display', 'none');
				$('#'+val).css('display', 'block');	

				$(this).attr('data-old', val);
			});

			$('.card-widget').hover(function(){
				$(this).find('.btn-group').toggleClass('show');
			});
		});
	</script>
@stop