@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.persons.index')}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i> Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i> Hapus
				</a>
				<a href="{{route('hr.persons.edit', [$data['id']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i> Edit
				</a>
			</div>
		</div>
		<!-- END CARD HEADER -->

		<!-- BEGIN CARD TILES -->
		<div class="card-tiles">
			<!-- BEGIN LEFTBAR -->
			<div class="hbox-md col-md-12">
				<div class="hbox-column col-md-2" id="sidebar_left">
					<ul class="nav nav-pills nav-stacked">
						<li class="text-primary" style="text-transform: uppercase;">CATEGORIES</li>
						<li @if(!Input::has('tag') && !isset($contacts) && !isset($relatives) && !isset($works)) class="active" @endif><a href="{{route('hr.persons.show', [$data['id']])}}">Profil  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
						<li @if(isset($relatives)) class="active" @endif><a href="{{route('hr.persons.relatives.index', [$data['id']])}}"> @if(!$data['has_relatives']) <i class="fa fa-exclamation pull-right mt-5 text-warning"></i> @endif Kerabat </a>  <small class="pull-right text-bold opacity-75"></small></a></li>
						<li @if(isset($works)) class="active" @endif><a href="{{route('hr.persons.works.index', [$data['id']])}}">@if(!$data['has_works']) <i class="fa fa-exclamation pull-right mt-5 text-warning"></i> @endif Pekerjaan </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					</ul>
					<ul class="nav nav-pills nav-stacked">
						<li class="text-primary">CONTACTS</li>
						<?php $isAddress = 0; ?>
						<?php $isPhone = 0; ?>
						<?php $isEmail = 0; ?>
						<?php $isMsgSVC = 0; ?>


						@foreach($data['tagcontacts'] as $key => $value)
							@if($value['item'] == 'address' && $isAddress == 0) 
								<?php $isAddress = 1 ?>
							@elseif($value['item'] == 'phone' && $isPhone == 0) 
								<?php $isPhone = 1 ?>
							@elseif($value['item'] == 'email' && $isEmail == 0) 
								<?php $isEmail = 1 ?>
							@endif

							@if($value['item'] != 'email' && $value['item'] != 'phone' && $value['item'] != 'address')
								<?php $isMsgSVC = 2 ?>	
							@else
								<li @if(Input::has('item') && Input::get('item') == $value['item']) class="active" @endif><a href="{{route('hr.persons.contacts.index', [$data['id'], 'page' => 1,'item' => $value['item']])}}">{{ucwords(str_replace('_',' ',$value['item']))}}  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
							@endif
						@endforeach

						@if($isAddress == 0)
							<li @if(Input::has('item') && Input::get('item') == 'address') class="active" @endif><a href="{{route('hr.persons.contacts.index', [$data['id'], 'page' => 1,'item' => 'address'])}}"><i class="fa fa-exclamation pull-right mt-5 text-warning"></i>Address</a></li>
						@endif
						@if($isPhone == 0)
							<li @if(Input::has('item') && Input::get('item') == 'phone') class="active" @endif><a href="{{route('hr.persons.contacts.index', [$data['id'], 'page' => 1,'item' => 'phone'])}}"><i class="fa fa-exclamation pull-right mt-5 text-warning"></i>Phone</a></li>
						@endif
						@if($isEmail == 0)
							<li @if(Input::has('item') && Input::get('item') == 'email') class="active" @endif><a href="{{route('hr.persons.contacts.index', [$data['id'], 'page' => 1,'item' => 'email'])}}"><i class="fa fa-exclamation pull-right mt-5 text-warning"></i>Email</a></li>
						@endif
						@if($isMsgSVC == 0)
							<li @if(Input::has('messageService')) class="active" @endif><a href="{{route('hr.persons.contacts.index', [$data['id'], 'page' => 1,'messageService' => true])}}"><i class="fa fa-exclamation pull-right mt-5 text-warning"></i>Message Service</a></li>
						@elseif($isMsgSVC == 2)
							<li @if(Input::has('messageService')) class="active" @endif><a href="{{route('hr.persons.contacts.index', [$data['id'], 'page' => 1,'messageService' => true])}}">Message Service</a> <small class="pull-right text-bold opacity-75"></small></a></li>
						@endif							
						<br/>
					</ul>
					<ul class="nav nav-pills nav-stacked">
						<li class="text-primary" style="text-transform: uppercase;">DOKUMEN</li>
						<?php $tag =null;?>
						@foreach($documents as $key => $value)
							@if($value['tag']!=$tag)
								<li @if(Input::has('tag') && Input::get('tag')==$value['tag']) class="active" @endif ><a href="{{route('hr.persons.documents.index', ['id' => $data['id'], 'page' => '1', 'tag' => $value['tag']] )}}">{{$value['tag']}}</a><small class="pull-right text-bold opacity-75"></small></a></li>			
								<?php $tag = $value['tag'];?>
							@endif
						@endforeach
					</ul>					
				</div>

				<div class="hbox-column col-md-7" id="sidebar_mid">
					<div class="col-md-12">
						<div class="row">
							<div class="pull-left width-3 clearfix hidden-xs">
								@if($data['avatar']!='')
									<img class="img-circle img-responsive" alt="" src="{{url($data['avatar'])}}"></img>
								@else
									<img class="img-circle img-responsive" alt="" @if($data['gender'] =='male') src="{{url('images/male.png')}}" @else src="{{url('images/female.png')}}" @endif></img>
								@endif
							</div>
							<h1 class="text-light no-margin">{{$data['prefix_title'].' '.$data['name'].', '.$data['suffix_title']}}</h1>
							<h5>
								@if(isset($data['works'][0]))
									{{$data['works'][0]['name']}} di {{$data['works'][0]['branch']['name']}}
								@endif
							</h5>
						</div>
						&nbsp;
						@yield('karyawan.show')
					</div>
				</div>

			<!-- BEGIN RIGHTBAR -->
			@include('admin.helpers.person-rightbar')
			</div>
		</div>
	</div>

	{!! Form::open(array('route' => array('hr.persons.delete', $data['id']),'method' => 'POST')) !!}
		<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}		

@stop

@section('css')
	{!! HTML::style('css/dropzone.css')!!}
	{!! HTML::style('css/datepicker3.css')!!}
	{!! HTML::style('css/toastr.css')!!}	

@stop

@section('js')
	{!! HTML::script('js/dropzone.min.js')!!}
	{!! HTML::script('js/jquery.inputmask.min.js')!!}
	{!! HTML::script('js/toastr.js')!!}

	<script type="text/javascript">
		$(document).ready(function () {
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

        $('.modalWork').on('show.bs.modal', function(e) {
			var id 						= $(e.relatedTarget).attr('data-id');
			var chart_id 				= $(e.relatedTarget).attr('data-chart-id');
			var work_start 				= $(e.relatedTarget).attr('data-work-start');
			var work_end 				= $(e.relatedTarget).attr('data-work-end');
			var reason_resign 			= $(e.relatedTarget).attr('data-reason-resign');
			var work_status				= $(e.relatedTarget).attr('data-work-status');
			var work_position 			= $(e.relatedTarget).attr('data-work-position');
			var work_organisation		= $(e.relatedTarget).attr('data-work-organisation');
			var work_company_path		= $(e.relatedTarget).attr('data-work-company-path');
			var work_company_name 		= $(e.relatedTarget).attr('data-work-company-name');
			var work_branch_name 		= $(e.relatedTarget).attr('data-work-branch-name'); 	

			if (typeof chart_id == 'undefined'){
				$('#tab_chart').removeClass('hide');
			}
			else {
				$('#tab_chart').addClass('hide');
			}

			if (id != 0)
			{
				$('.modal_work_company').select2('data', { id: work_company, text: work_company_name+' di '+work_branch_name});
				$('.modal_work_company').prop('readonly', true);
				$('.modal_work_organition').val(work_organisation);
				$('.modal_work_position').val(work_position);
				$('.modal_work_status').val(work_status);
				$('.modal_work_start').val(work_start);
				$('.modal_work_end').val(work_end);
				$('.modal_reason_resign').text(reason_resign);
				$('.modal_btn_work').text('Simpan');
			}
			else
			{
				$('.modal.work_company').select2("val", "");	
				$('.modal_work_company').prop('readonly', false);
				$('.modal_work_organition').val('');
				$('.modal_work_position').val('');
				$('.modal_work_status').val('');
				$('.modal_work_start').val('');
				$('.modal_work_end').val('');
				$('.modal_reason_resign').text('');
				$('.modal_btn_work').text('Tambah');
			}
			console.log(chart_id);
		});

		$(".date_mask").inputmask();    

		$('.getCompany').select2({
			tokenSeparators: [",", " "],
			tags: [],
			minimumInputLength: 1,
			placeholder: "",
			maximumSelectionSize: 1,
			selectOnBlur: true,
            ajax: {
                url: "{{route('hr.ajax.company')}}",
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
                                text: item.name +' di '+ item.branch.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });


        $("#document_upload").dropzone({ 
			url: '{{ route("hr.images.upload") }}' ,
			maxFilesize: 1,
			addRemoveLinks: true,
			init: function(){
				this.on('success', function(file){
					var accepted_files = this.getAcceptedFiles();
					var uploaded_files = [];
					var gallery_json;

					if (accepted_files.length > 0)
					{
						accepted_files.forEach(function(cur_value, index, array){
							var response = $.parseJSON(cur_value.xhr.response);
							uploaded_files.push(response.file.url);
						});
					}

					$('#gallery_file_url').val(JSON.stringify(uploaded_files));
				});
			}
		});	
    </script>
@stop

@section('Karyawan-active')
	active
@stop
