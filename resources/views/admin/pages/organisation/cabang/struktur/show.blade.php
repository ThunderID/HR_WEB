@section('breadcrumb')
	<li>Home</li>
	<li>{{ucwords($data['name'])}}</li>
	<li>{{ucwords($branch['name'])}}</li>
	<li class='active'>{{ucwords($chart['name'])}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.branches.charts.index', ['page' => 1,'org_id' => $data['id'], 'branchid' => $branch['id']])}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i>&nbsp;Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i>&nbsp;Hapus
				</a>
				<a href="{{route('hr.branches.charts.edit', ['id' => $chart['id'],'branchid' => $branch['id'], 'org_id' => $data['id'], 'src' => 'show'])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i>&nbsp;Edit
				</a>
				<a href="{{route('hr.persons.index', ['page' => 1, 'branch' => $branch['id'], 'chart' => $chart['id'], 'org_id' => $data['id']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-users"></i>&nbsp;Karyawan
				</a>
				<a href="" class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#calendarCreate" data-id="0" data-action="{{ route('hr.charts.calendars.store', $data['id']) }}">
					<i class="fa fa-plus-circle"></i>&nbsp;Kalender
				</a>
			</div>
		</div>
		<!-- END CARD HEADER -->

		<!-- BEGIN CARD TILES -->
		<div class="card-tiles">
			<div class = "col-md-12 hbox-md">
				@include('admin.filters.chart')

				<!-- BEGIN MIDDLE -->					
				<div class="hbox-column col-md-10" id="sidebar_mid">
					<div class="row">
						<div class="col-md-12">
							<div class="margin-bottom-xxl">
								<h1 class="text-light no-margin">{{$chart['name']}}</h1>
								&nbsp;&nbsp;
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="alert alert-callout alert-danger no-margin">
								<strong class="pull-right text-danger text-lg"><i class="fa fa-users fa-2x"></i></strong>
								<strong class="text-xl">{{ $chart['min_employee'] }}</strong><br/>
								<span class="opacity-50">Min Pegawai</span>
								<div class="stick-bottom-left-right">
									<div class="progress progress-hairline no-margin">
										<div class="progress-bar progress-bar-danger" style="width:{{ ($chart['min_employee']*1)/100 }}%"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="alert alert-callout alert-success no-margin">
								<strong class="pull-right text-success text-lg"><i class="fa fa-users fa-2x"></i></strong>
								<strong class="text-xl">{{ $chart['ideal_employee'] }}</strong><br/>
								<span class="opacity-50">Ideal Pegawai</span>
								<div class="stick-bottom-left-right">
									<div class="progress progress-hairline no-margin">
										<div class="progress-bar progress-bar-success" style="width:{{ ($chart['ideal_employee']*1)/100 }}%"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="alert alert-callout alert-info no-margin">
								<strong class="pull-right text-info text-lg"><i class="fa fa-users fa-2x"></i></strong>
								<strong class="text-xl">{{ $chart['current_employee'] }}</strong><br/>
								<span class="opacity-50">Total Pegawai</span>
								<div class="stick-bottom-left-right">
									<div class="progress progress-hairline no-margin">
										<div class="progress-bar progress-bar-info" style="width:{{ ($chart['current_employee']*1)/100 }}%"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="alert alert-callout alert-warning no-margin">
								<strong class="pull-right text-warning text-lg"><i class="fa fa-users fa-2x"></i></strong>
								<strong class="text-xl">{{ $chart['max_employee'] }}</strong><br/>
								<span class="opacity-50">Max Pegawai</span>
								<div class="stick-bottom-left-right">
									<div class="progress progress-hairline no-margin">
										<div class="progress-bar progress-bar-warning" style="width:{{ ($chart['max_employee']*1)/100 }}%"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th  class="text-center" rowspan="2" width="15%">Aplikasi</th>
										<th  class="text-center" rowspan="2" width="15%">Menu</th>
										<th  class="text-center" colspan="4">Autentikasi</th>
									</tr>
									<tr>
										<th  class="text-center">Tambah</th>
										<th  class="text-center">Akses</th>
										<th  class="text-center">Ubah</th>
										<th  class="text-center">Hapus</th>
									</tr>
								</thead>
								<tbody>
									<?php $prev = null;?>
									<form class="check" action="" method="post">
									@foreach($authentications as $key => $value)
										@foreach($value['menus'] as $key2 => $value2)
											<tr>
												@if($prev != $value2['application_id'])
												<td rowspan="{{count($value['menus'])}}">
													{{ucwords($value['name'])}}
												</td>
												@endif
												<td>
													{{$value2['name']}}
												</td>
												<td class="text-center">
													<div class="checkbox checkbox-inline checkbox-styled">
														<label>	
															<input type="checkbox" class="thumb" data-checked-action="@if(isset($value2['authentications'][0]['create']) && $value2['authentications'][0]['create']) {{ route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'wrong' => 'create', 'org_id' => $data['id']]) }} @endif" data-unchecked-action="@if (isset($value2['authentications'][0]['create'])) {{ route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'right' => 'create', 'org_id' => $data['id']]) }} @else {{ route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'right' => 'create', 'org_id' => $data['id']]) }} @endif" @if(isset($value2['authentications'][0]['create']) && $value2['authentications'][0]['create']) checked @endif>
														</label>
													</div>
													{{-- @if(isset($value2['authentications'][0]['create']) && $value2['authentications'][0]['create'])  --}}
														{{-- <a href="{{route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'wrong' => 'create', 'org_id' => $data['id']])}}"><i class="fa fa-check"> </i>  --}}
													{{-- @elseif(isset($value2['authentications'][0]['create']))  --}}
														{{-- <a href="{{route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'right' => 'create', 'org_id' => $data['id']])}}"><i class="fa fa-minus"> </i>  --}}
													{{-- @else --}}
														{{-- <a href="{{route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'right' => 'create', 'org_id' => $data['id']])}}"><i class="fa fa-minus"> </i>  --}}
													{{-- @endif --}}
												</td>
												<td class="text-center">
													<div class="checkbox checkbox-inline checkbox-styled">
														<label>	
															<input type="checkbox" class="thumb" data-checked-action=" @if(isset($value2['authentications'][0]['read']) && $value2['authentications'][0]['read']) {{ route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'wrong' => 'read', 'org_id' => $data['id']]) }} @endif" data-unchecked-action="@if (isset($value2['authentications'][0]['read'])) {{ route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'right' => 'read', 'org_id' => $data['id']]) }} @else {{ route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'right' => 'read', 'org_id' => $data['id']]) }} @endif" @if(isset($value2['authentications'][0]['read']) && $value2['authentications'][0]['read']) checked @endif>
														</label>
													</div>
													{{-- @if(isset($value2['authentications'][0]['read']) && $value2['authentications'][0]['read'])  --}}
														{{-- <a href="{{route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'wrong' => 'read', 'org_id' => $data['id']])}}"><i class="fa fa-check"> </i>  --}}
													{{-- @elseif(isset($value2['authentications'][0]['read']))  --}}
														{{-- <a href="{{route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'right' => 'read', 'org_id' => $data['id']])}}"><i class="fa fa-minus"> </i>  --}}
													{{-- @else --}}
														{{-- <a href="{{route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'right' => 'read', 'org_id' => $data['id']])}}"><i class="fa fa-minus"> </i>  --}}
													{{-- @endif --}}
												</td>
												<td class="text-center">
													<div class="checkbox checkbox-inline checkbox-styled">
														<label>	
															<input type="checkbox" class="thumb" data-checked-action="@if(isset($value2['authentications'][0]['update']) && $value2['authentications'][0]['update']) {{ route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'wrong' => 'update', 'org_id' => $data['id']]) }} @endif" data-unchecked-action="@if (isset($value2['authentications'][0]['update'])) {{ route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'right' => 'update', 'org_id' => $data['id']]) }} @else {{ route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'right' => 'update', 'org_id' => $data['id']]) }} @endif" @if(isset($value2['authentications'][0]['update']) && $value2['authentications'][0]['update']) checked @endif>
														</label>
													</div>
													{{-- @if(isset($value2['authentications'][0]['update']) && $value2['authentications'][0]['update'])  --}}
														{{-- <a href="{{route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'wrong' => 'update', 'org_id' => $data['id']])}}"><i class="fa fa-check"> </i>  --}}
													{{-- @elseif(isset($value2['authentications'][0]['update']))  --}}
														{{-- <a href="{{route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'right' => 'update', 'org_id' => $data['id']])}}"><i class="fa fa-minus"> </i>  --}}
													{{-- @else --}}
														{{-- <a href="{{route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'right' => 'update', 'org_id' => $data['id']])}}"><i class="fa fa-minus"> </i>  --}}
													{{-- @endif --}}
												</td>
												<td class="text-center">
													<div class="checkbox checkbox-inline checkbox-styled">
														<label>	
															<input type="checkbox" class="thumb" data-checked-action="@if(isset($value2['authentications'][0]['delete']) && $value2['authentications'][0]['delete']) {{ route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'wrong' => 'delete', 'org_id' => $data['id']]) }} @endif" data-unchecked-action="@if (isset($value2['authentications'][0]['delete'])) {{ route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'right' => 'delete', 'org_id' => $data['id']]) }} @else {{ route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'right' => 'delete', 'org_id' => $data['id']]) }} @endif" @if(isset($value2['authentications'][0]['delete']) && $value2['authentications'][0]['delete']) checked @endif>
														</label>
													</div>
													{{-- @if(isset($value2['authentications'][0]['delete']) && $value2['authentications'][0]['delete'])  --}}
														{{-- <a href="{{route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'wrong' => 'delete', 'org_id' => $data['id']])}}"><i class="fa fa-check"> </i>  --}}
													{{-- @elseif(isset($value2['authentications'][0]['delete']))  --}}
														{{-- <a href="{{route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'auth_id' => $value2['authentications'][0]['id'], 'right' => 'delete', 'org_id' => $data['id']])}}"><i class="fa fa-minus"> </i>  --}}
													{{-- @else --}}
														{{-- <a href="{{route('hr.charts.authentications.store', ['chart_id' => $chart['id'], 'menu_id' => $value2['id'], 'right' => 'delete', 'org_id' => $data['id']])}}"><i class="fa fa-minus"> </i>  --}}
													{{-- @endif --}}
												</td>
											</tr>
										<?php $prev = $value['id'];?>
										@endforeach
									@endforeach
									</form>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<!-- BEGIN RIGHTBAR -->
			</div>
		</div>
	</div>

	{!! Form::open(array('url' => route('hr.organisation.branches.delete', ['id' => $branch['id'], 'org_id' => $data['id']]),'method' => 'POST')) !!}
		<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}

	{!! Form::open(array('url' => route('hr.charts.calendars.store', ['org_id' => $data['id'], 'id' => $chart['id']]),'method' => 'POST')) !!}
		@include('admin.modals.schedule.create_calendar')
	{!! Form::close() !!}	
@stop

@section('css')
	{!! HTML::style('css/toastr.css')!!}	
@stop

@section('js')
	{!! HTML::script('js/toastr.js')!!}
	<script type="text/javascript">
		$(document).ready(function(){
			$('.del_charts').click(function(){
				var x = $(this).attr('data-target');
				$(x).modal();
			});

			$('.getContacts').select2({
				tokenSeparators: [",", " ", "_", "-"],
				tags: [],
				minimumInputLength: 1,
				placeholder: "",
				maximumSelectionSize: 1,
				selectOnBlur: true
	        });
		});			


		$('.modalContact').on('show.bs.modal', function(e) {
			var id = $(e.relatedTarget).attr('data-modal-contact-id');
			var item = $(e.relatedTarget).attr('data-modal-contact-item');
			var val = $(e.relatedTarget).attr('data-modal-contact-value');

			if(id != 0){
				$('.modal_contact_inp_value').val(val);
				$('.modal_contact_input_id').val(id);
				$('.getContacts').select2("data", { id: item, text: item });
				$('.getContacts').prop('readonly',true);
				$('.modal_contact_title').text('Edit ' + item);
				$('.modal_contact_btn_save').text('Simpan');
			}else{
				$('.modal_contact_inp_value').val('');
				$('.modal_contact_input_id').val('');
				$('.getContacts').select2("val", "");
				$('.getContacts').prop('readonly',false);
				$('.modal_contact_title').text('Tambah Kontak');
				$('.modal_contact_btn_save').text('Tambah');
			}
		});


		$('.modalAddress').on('show.bs.modal', function(e) {
			var id = $(e.relatedTarget).attr('data-modal-address-id');
			var item = $(e.relatedTarget).attr('data-modal-address-item');
			var val = $(e.relatedTarget).attr('data-modal-address-value');

			if(id != 0){
				val = val.replace(/\_/g, ' ');
				$('.modal_address_value').text(val);

				$('.modal_address_input_id').val(id);


				$('.modal_address_title').text('Edit Alamat');
				$('.modal_address_btn_save').text('Simpan');
			}else{
				$('.modal_address_value').text('');

				$('.modal_address_input_id').val('');


				$('.modal_address_title').text('Tambah Alamat');
				$('.modal_address_btn_save').text('Tambah');
			}
		});		

		$('.getCalendar').select2({
			tokenSeparators: [","],
			tags: [],
			placeholder: "",
			minimumInputLength: 1,
			selectOnBlur: true,
            ajax: {
                url: "{{route('hr.ajax.calendar')}}",
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
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
		$('.thumb').change(function(e){
			var x = $(this).attr('data-checked-action');
			var y = $(this).attr('data-unchecked-action');
			$(this).prop('disabled', true);

			if ($(this).attr('checked')==='checked') {
				$('.check').attr('action', y);
				$('.check').submit();
				console.log(x);
				console.log('checked');
			}
			else {
				$('.check').attr('action', x);
				$('.check').submit();
				console.log(x);
				console.log('unchecked');
			}
		});

	</script>
@stop