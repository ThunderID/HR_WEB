@section('breadcrumb')
	<li>Home</li>
	<li>{{ucwords($data['name'])}}</li>
	<li class='active'>{{ucwords($branch['name'])}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.organisation.branches.index', ['page' => 1,'org_id' => $data['id']])}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i>&nbsp;Kembali
				</a>
				{{-- <a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i>&nbsp;Hapus
				</a>
				<a href="{{route('hr.organisation.branches.edit', [$branch['id'], 'org_id' => $data['id'], 'src' => 'show'])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i>&nbsp;Edit
				</a>
				<a href="{{route('hr.persons.index', ['page' => 1, 'org_id' => $data['id'], 'karyawan' => 'active', 'branch' => $branch['id']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-users"></i>&nbsp;Karyawan
				</a> --}}
			</div>
		</div>
		<!-- END CARD HEADER -->

		<!-- BEGIN CARD TILES -->
		<div class="card-tiles">
			<div class = "col-md-12 hbox-md">
				@include('admin.filters.branch')

				<!-- BEGIN MIDDLE -->					
				<div class="hbox-column col-md-7" id="sidebar_mid">
					<div class="col-md-12">
						<div class="row">
							<div class="margin-bottom-xxl">
								<h1 class="text-light no-margin">{{$branch['name']}}</h1>
								<h5>
									@if($paginator->total_item>0) Total Data <strong>{{$paginator->total_item}}</strong> @else Tidak ada data @endif
								</h5>
								&nbsp;&nbsp;
							</div>
						</div>
					</div>
					
					@yield('kantor.show')
				</div>

				<!-- BEGIN RIGHTBAR -->
				@include('admin.helpers.company-rightbar')
			</div>
		</div>
	</div>

	{!! Form::open(array('url' => route('hr.organisation.branches.delete', ['id' => $branch['id'], 'org_id' => $data['id']]),'method' => 'POST')) !!}
		<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
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
				tags: ['alamat', 'bbm', 'email', 'line', 'phone', 'whatsapp'],
				placeholder: "",
				maximumSelectionSize: 1,
				selectOnBlur: true
	        });
		});			


		$('.modalContact').on('show.bs.modal', function(e) {
			var id 		= $(e.relatedTarget).attr('data-modal-contact-id');
			var item 	= $(e.relatedTarget).attr('data-modal-contact-item');
			var val 	= $(e.relatedTarget).attr('data-modal-contact-value');
			var is_default 	= $(e.relatedTarget).attr('data-is-default');

			if(id != 0){
				$('.modal_contact_inp_value').val(val);
				$('.modal_contact_input_id').val(id);
				$('.getContacts').select2("data", { id: item, text: item });
				$('.getContacts').prop('readonly',true);
				$('.modal_contact_title').text('Edit ' + item);
				$('.modal_contact_btn_save').text('Simpan');

				if (is_default == 1) {
					$('.modal_default_contact').attr('checked', true);
				}
				else {
					$('.modal_default_contact').attr('checked', false);
				}
			}else{
				$('.modal_contact_inp_value').val('');
				$('.modal_contact_input_is_default').val('');
				$('.modal_contact_input_id').val('');
				$('.getContacts').select2("val", "");
				$('.getContacts').prop('readonly',false);
				$('.modal_contact_title').text('Tambah Kontak');
				$('.modal_default_contact').attr('checked', false);
				$('.modal_contact_btn_save').text('Tambah');
			}
		});


		$('.modalAddress').on('show.bs.modal', function(e) {
			var id 			= $(e.relatedTarget).attr('data-modal-address-id');
			var item 		= $(e.relatedTarget).attr('data-modal-address-item');
			var val 		= $(e.relatedTarget).attr('data-modal-address-value');
			var is_default 	= $(e.relatedTarget).attr('data-is-default');	

			if(id != 0){
				val = val.replace(/\_/g, ' ');
				$('.getContacts').select2("data", { id: item, text: item });
				$('.getContacts').prop('readonly',true);
				$('.modal_address_value').text(val);
				$('.modal_address_input_id').val(id);
				$('.modal_address_title').text('Edit Alamat');
				$('.modal_address_btn_save').text('Simpan');

				if (is_default == 1) {
					$('.modal_default_contact').attr('checked', true);
				}
				else {
					$('.modal_default_contact').attr('checked', false);
				}
			}else{
				$('.modal_address_value').text('');
				$('.modal_address_input_id').val('');
				$('.getContacts').select2("val", "");
				$('.getContacts').prop('readonly',false);
				$('.modal_address_title').text('Tambah Alamat');
				$('.modal_address_btn_save').text('Tambah');
				$('.modal_default_contact').attr('checked', false);	
			}
		});	

		$('.modalOrganisationDelete').on('show.bs.modal', function(e) {
			var action 	= $(e.relatedTarget).attr('data-delete-action');
			$(this).parent().attr('action', action);
		});	

		$('.thumb').change(function(e){
			var x = $(this).attr('data-checked-action');
			var y = $(this).attr('data-unchecked-action');
			$(this).prop('disabled', true);

			if ($(this).attr('checked')==='checked') {
				$('.check').attr('action', y);
				$('.check').submit();
				console.log('checked');
			}
			else {
				$('.check').attr('action', x);
				$('.check').submit();
				console.log('unchecked');
			}
		});

	</script>
@stop