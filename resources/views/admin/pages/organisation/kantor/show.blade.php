@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords('Kantor')}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.organisation.branches.index')}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i>&nbsp;Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i>&nbsp;Hapus
				</a>
				<a href="{{route('hr.organisation.branches.edit', [$data['id']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i>&nbsp;Edit
				</a>
				<a href="{{route('hr.persons.index', ['page' => 1, 'branch' => $data['name']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-users"></i>&nbsp;Karyawan
				</a>
			</div>
		</div>
		<!-- END CARD HEADER -->

		<!-- BEGIN CARD TILES -->
		<div class="card-tiles">
			<div class = "col-md-12 hbox-md">
				@include('admin.helpers.company-leftbar')

				<!-- BEGIN MIDDLE -->					
				<div class="hbox-column col-md-7" id="sidebar_mid">
					<div class="col-md-12">
						<div class="row">
							<div class="margin-bottom-xxl">
								<h1 class="text-light no-margin">{{$data['name']}}</h1>
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

	{!! Form::open(array('route' => array('hr.organisation.branches.delete', $data['id']),'method' => 'POST')) !!}
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

	</script>
@stop