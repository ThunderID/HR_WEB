@extends('admin.pages.karyawan.show')
@section('karyawan.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#details">Kerabat</a></li>
	</ul>
	<div class="page-header no-border holder" style="margin-top:0px;">
		<br/>
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#add_modal">Tambah Data</button>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="details">
			<br/>
			<br/>
			<div class="list-results" style="margin-bottom:0px;">
				@foreach($relatives as $key => $value)	
					@if($key%2==0 && $key!=0)
						</div>
						<div class="list-results" style="margin-bottom:0px;">
					@endif											
					<div class="col-xs-12 col-lg-12 hbox-xs">
						<div class="hbox-column width-3">
							<img class="img-circle img-responsive" alt="" @if($value['gender'] =='male') src="{{url('images/male.png')}}" @else src="{{url('images/female.png')}}" @endif></img>
						</div><!--end .hbox-column -->
						<div class="hbox-xs v-top height-4">
							<div class="clearfix">
								<div class="col-lg-12 margin-bottom-lg">
									<a class="btn pull-right ink-reaction btn-floating-action btn-danger del-modal" type="button" data-toggle="modal" data-target="#del_modal_2_{{$value['id']}}">
										<i class="fa fa-trash"></i>
									</a>
									<a class="text-lg text-medium" href="{{ route('hr.persons.show' ,['id'=> $value['id']]) }}">{{$value['first_name'].' '.$value['middle_name'] .' '.$value['last_name']}}</a>
								</div>
							</div>

							@if(count($value['contacts']))
								@foreach($value['contacts'] as $key2 => $value2)
									<div class="clearfix">
										<div class="col-lg-12">
											@if($value2['item']=='phone_number')
												<span class="opacity-75"><span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;{{$value2['value']}}</span>
											@elseif($value2['item']=='email')
												<span class="opacity-75"><span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;{{$value2['value']}}</span>
											@elseif($value2['item']=='address')
												<span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;{{$value2['value']}}</span>
											@endif
										</div>
									</div>
								@endforeach
							@endif
						</div>
					</div>

					<!-- BEGIN MODAL -->
					<div class="modal fade" id="del_modal_2_{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="del_modal_2_{{$value['id']}}" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								{!! Form::open(array('route' => array('hr.persons.relatives.delete',  $data['id'],$value['relative_id']),'method' => 'POST')) !!}
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="simpleModalLabel">Hapus Data Relasi</h4>
								</div>
								<div class="modal-body">
									<p>Apakah Anda yakin akan menghapus data relasi? Silahkan masukkan password Anda untuk konfirmasi.</p>
									<div class="row">
										<div class="form-group">
											<div class="col-sm-3">
												<label for="password1" class="control-label">Password</label>
											</div>
											<div class="col-sm-9">
												<input type="password" name="password" id="password" class="form-control" placeholder="Password">
											</div>
										</div>					
									</div>
								</div>
								<div class="modal-footer">
									<p>{!! Form::hidden('from_confirm_form', 'Yes') !!}</p>
									<a type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
									<button type="submit" type="button" class="btn btn-danger">Hapus</button>
								</div>
								{!! Form::close() !!}
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div>		
				@endforeach

			</div>
			@if(count($relatives))
				@include('admin.helpers.pagination')
			@else
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>Tidak ada data</p>
					</div>
				</div>
			@endif
		</div>
	</div>

	<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-xl" id="formModalLabel">Tambah Relasi</h4>
				</div>
				<form class="form" role="form" action="{{route('hr.persons.relatives.store', $data['id'])}}" method="post">
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-12">
								<h4>Petunjuk</h4>
								<article class="margin-bottom-xxl">
									<p>
										Silahkan memilih hubungan/relasi terlebih dahulu. Bila data relasi sebelumnya telah di-inputkan, maka pilih "Data Lama" dan ketikkan nama relasi. Nila data relasi belum pernah di0input, pilih "Data Baru" dan masukkan informasi sesuai dengan inputan yang tersedia.
									</p>
								</article>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="form-group">
							<select  id="relationship" name="relationship" class="form-control">
								<option value=""></option>
								<option value="parent">Orang Tua</option>
								<option value="spouse">Pasangan</option>
								<option value="child">Anak</option>
							</select>
							<label for="relationship">Hubungan/Relasi</label>
						</div>
						<div class="tabs-left">
							<ul class="card-head nav nav-tabs" data-toggle="tabs">
								<li><a href="#first5">Data Lama</a></li>
								<li class="active"><a href="#second5">Data Baru</a></li>
							</ul>
							<div class="card-body tab-content style-default-bright">
								<!-- tab1 -->
								<div class="tab-pane" id="first5">
									<div class="form-group">
										<input name="relation" id="relation" class="form-control getName">
										<label for="relation">Nama</label>
									</div>
								</div>
								<!-- tab2 -->
								<div class="tab-pane active" id="second5">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control" id="prefix_title_relation" name="prefix_title_relation">
												<label for="prefix_title_relation">Gelar Depan</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control" id="first_name_relation" name="first_name_relation">
												<label for="first_name_relation">Nama Depan</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control" id="midle_name_relation" name="midle_name_relation">
												<label for="midle_name_relation">Nama Tengah</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control" id="last_name_relation" name="last_name_relation">
												<label for="last_name_relation">Nama Belakang</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control" id="suffix_title_relation" name="suffix_title_relation">
												<label for="suffix_title_relation">Gelar Belakang</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control" id="nick_name_relation" name="nick_name_relation">
												<label for="nick_name_relation">Nama Panggilan</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label>
													Jenis Kelamin
												</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="radio radio-styled">
												<label>
													<input name="gender_relation" type="radio" value="male">
													<span>Laki-laki</span>
												</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="radio radio-styled">
												<label>
													<input name="gender_relation" type="radio" value="female">
													<span>Perempuan</span>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control" id="place_of_birth_relation" name="place_of_birth_relation">
												<label for="place_of_birth_relation">Tempat Lahir</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<div class="input-group" style="width:100%; text-align:left;">
													<div class="input-group-content">
														<input type="text" class="form-control date-pick" name="date_of_birth_relation" />
														<label>Tanggal Lahir</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control" id="phone_relation" name="phone_relation">
												<label for="phone_relation">Nomor Telepon</label>
											</div>
										</div>
									</div>
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
				</form>
			</div>
		</div>
	</div>

@stop


@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
@stop

@section('js')
	{!! HTML::script('js/bootstrap-datepicker.js')!!}
	{!! HTML::script('js/pluginmicrotemplating.min.js')!!}

	<script type="text/javascript">
		window.onload=col_justify('sidebar_left','sidebar_mid','sidebar_right');

		$(document).ready(function () {
			$('.date-pick').datepicker({
				format:"dd MM yyyy"
			});

			$('.del-modal').click(function() {
				$('#del-modal').modal('show');
			});


			$('#relation').select2({
	            minimumInputLength: 3,
	            placeholder: '',
	            ajax: {
	                url: "{{route('hr.ajax.name')}}",
	                dataType: 'json',
	                quietMillis: 500,
	               data: function (term) {
	                    return {
	                        term: term
	                    };
	                },
	                results: function (data) {
	                    return {
	                        results: $.map(data, function (item) {
	                            return {
	                                text: item.first_name + ' ' + item.middle_name + ' ' + item.last_name ,
	                                id: item.id
	                            }
	                        })
	                    };
	                }
	            }
	        });
        });

	</script>
@stop