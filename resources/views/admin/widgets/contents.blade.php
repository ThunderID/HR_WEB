@if ($mode == 'grid')
	{{-- mode GRID --}}
@elseif ($mode == 'list')
	{{-- mode LIST --}}
	@if (isset($toggle['avatar']))
		<div class="hbox-column width-3">
			@if($data_content['avatar']!='')
				<img class="img-circle img-responsive" alt="" src="{{url($data_content['avatar'])}}"></img>
			@else
				<img class="img-circle img-responsive" alt="" @if($data_content['gender'] =='male') src="{{url('images/male.png')}}" @else src="{{url('images/female.png')}}" @endif></img>
			@endif
		</div>
	@endif

	@if (isset($toggle['document']))
		<a href="{{ $route }}">
	@endif

	<div class="@if((isset($toggle['document']))|(isset($toggle['api']))|(isset($toggle['follow']))) @else hbox-column v-top @endif">

		@if (isset($toggle['document']))
			<div class="clearfix">
				<div class="col-md-1">
					<span class="fa fa-fw fa-file-o fa-2x pull-left mt-10"></span>
				</div>
				<div class="col-md-11">
					<span class="pull-left">
						<span class="text-bold">{{ucwords($data_content['name'])}}</span><br>
						<span class="opacity-50"><i class = "fa fa-tags"></i> {{ucwords($data_content['tag'])}}</span><br>
						<span class="opacity-50">{{(isset($data_content['persons'][0]['count']) ? $data_content['persons'][0]['count'].' Dokumen' : '')}} </span>
					</span>
				</div>
			</div>
			<div class="clearfix">
				<div class="col-lg-12 text-right">
					<a href="{{route($editroute, ['id' => $data_content['id'], 'org_id' => $data_content['organisation_id']])}}" class="btn border-default btn-circle" title="Edit">
						<i class="fa fa-pencil"></i>
					</a>
					<a href="javascript:;" class="btn border-default btn-circle" title="Hapus" data-toggle="modal" data-target="#del_organisation_modal_{{$data_content['id']}}" data-delete-action="{{ route($deleteroute, ['id' => $data_content['id']]) }}">
						<i class="fa fa-trash"></i>
					</a>
				</div>
			</div>
			<div class="clearfix">
				<div class="col-lg-12 pull-right">
					{!! Form::open(array('url' => route($deleteroute, ['id' => $data_content['id'], 'org_id' => $data_content['organisation_id']]),'method' => 'POST')) !!}
						<div class="modal fade modalOrganisationDelete" id="del_organisation_modal_{{$data_content['id']}}" tabindex="-1" role="dialog" aria-labelledby="del_organisation_modal_{{$data_content['id']}}" aria-hidden="true">
							@include('admin.modals.delete.delete')
						</div>	
					{!! Form::close() !!}
				</div>
			</div>
		@else
			<div class="clearfix">
				<div class="col-lg-9 margin-bottom-lg">
					@if(isset($data_content['value']['secret']))	
						<span class="text-lg text-medium" href="{{ $route }}">{{(isset($data_content['name']) ? $data_content['name'] : $data_content['value']['client'])}}</span>
					@else
						<a class="text-lg text-medium" href="{{ $route }}">{{(isset($data_content['name']) ? $data_content['name'] : $data_content['value']['client'])}}</a>
					@endif
				</div>
				@if(isset($data_content['value']['secret']))
					<div class="col-lg-3 text-right mt-10">
						<a href="{{ $route }}" class="btn btn-circle border-default" title="Ubah">
							<i class="fa fa-pencil"></i>
						</a>
						<a href="javascript:;" class="btn border-default btn-circle" title="Hapus" data-toggle="modal" data-target="#del_organisation_modal" data-delete-action="{{ route('hr.branches.apis.delete', ['id' => $data_content['value']['id'], 'branchid' => $data_content['branchid'], 'org_id' => $data_content['org_id']]) }}">
							<i class="fa fa-trash"></i>
						</a>
					</div>
				@endif
			</div>
		@endif

		@if (isset($toggle['person']))
			<div class="clearfix">
				<div class="col-lg-12">
					@if(isset($data_content['works']))
						@foreach($data_content['works'] as $key2 => $value2)
							@if($key2 == 0)
								<span>{{$value2['name']}} di {{$value2['branch']['name']}}</span>
							@endif
						@endforeach
					@endif
				</div>
			</div>	
		@endif

		@if (isset($toggle['calendar']))
			<div class="clearfix">
				<div class="col-xs-1">
					<span class="opacity-50"><i class = "fa fa-tags mt-5"></i></span>
				</div>
				<div class="col-xs-11 mlm-10">
					@if(isset($data_content['charts']))
						@foreach($data_content['charts'] as $key => $value)
							<span class="badge style-info text-sm opacity-75 mt-5">{{$value['name']}} - {{$value['tag']}} - {{$value['branch']['name']}}</span>
						@endforeach
					@elseif(isset($data_content['chart']))
						<span class="badge style-info text-sm opacity-75 mt-5">{{$data_content['chart']['name']}} - {{$data_content['chart']['tag']}} - {{$value['chart']['branch']['name']}}</span>
					@endif
					@if(isset($data_content['quota']))
						{{(number_format($data_content['quota']))}} Hari						
					@endif

					@if(isset($data_content['workdays']))
						<?php 
							$days 	= explode(',', $data_content['workdays']);
							$indodays = ['monday' => 'senin', 'tuesday' => 'selasa', 'wednesday' => 'rabu', 'thursday' => 'kamis', 'friday' => 'jumat', 'saturday' => 'sabtu', 'sunday' => 'minggu'];
						?>
						@foreach($days as $key => $value)
							{{(isset($indodays[strtolower($value)]) ? $indodays[strtolower($value)] : strtolower($value))}}@if(($key+1)<count($days)),&nbsp;@endif 
						@endforeach
					@endif
				</div>
				@if(isset($data_content['workdays']))
					<div class="col-xs-1">
						<span class="opacity-50"><i class = "fa fa-clock-o mt-5"></i></span>
					</div>
					<div class="col-xs-11 mlm-10">
						@time_indo($data_content['start']) s/d
						@time_indo($data_content['end'])
						
					</div>
				@endif
			</div>

			<div class="clearfix">
				<div class="col-lg-12 text-right">
					<a href="{{route($editroute, ['id' => $data_content['id'], 'org_id' => $data_content['organisation_id']])}}" class="btn border-default btn-circle" title="Edit">
						<i class="fa fa-pencil"></i>
					</a>
					<a href="javascript:;" class="btn border-default btn-circle" title="Hapus" data-toggle="modal" data-target="#del_organisation_modal_{{$data_content['id']}}" data-delete-action="{{ route($deleteroute, ['id' => $data_content['id']]) }}">
						<i class="fa fa-trash"></i>
					</a>
				</div>
			</div>
			<div class="clearfix">
				<div class="col-lg-12 pull-right">
					{!! Form::open(array('url' => route($deleteroute, ['id' => $data_content['id'], 'org_id' => $data_content['organisation_id']]),'method' => 'POST')) !!}
						<div class="modal fade modalOrganisationDelete" id="del_organisation_modal_{{$data_content['id']}}" tabindex="-1" role="dialog" aria-labelledby="del_organisation_modal_{{$data_content['id']}}" aria-hidden="true">
							@include('admin.modals.delete.delete')
						</div>	
					{!! Form::close() !!}
				</div>
			</div>
		@endif

		@if (isset($toggle['menu']))
			<div class="clearfix">
				<div class="col-xs-1">
					<span class="opacity-50"><i class = "fa fa-tags"></i></span>
				</div>
				<div class="col-xs-11">
					@if(isset($data_content['authentications']))
						@if(isset($data_content['application']))
							<span class="badge style-success text-sm opacity-75 mt-5 text-right">{{$data_content['application']['name']}}</span><br>
						@endif
						@foreach($data_content['authentications'] as $key => $value)
							<span class="badge style-info text-sm opacity-75 mt-5">
								{{$value['chart']['name']}} - {{$value['chart']['tag']}} - {{$value['chart']['branch']['name']}}
								<a class="ml-5" data-toggle="modal" data-target="#del_modal" data-action="{{ route('hr.authentications.delete', $value['id']) }}" title="Hapus Menu Otentikasi"><i class="fa fa-trash"></i></a>
							</span><br>
						@endforeach
					@endif
				</div>
			</div>
		@endif


		@if (isset($toggle['organisation']))
			<div class="clearfix">
				<div class="col-xs-1">
					<h4><i class = "fa fa-building-o"></i></h4>
				</div>
				<div class="col-xs-11">
					<h4>{{count($data_content['branches'])}}</h4>
				</div>
			</div>

			<div class="clearfix">
				<div class="col-xs-1">
					<h4><i class = "fa fa-users"></i></h4>
				</div>
				<?php $employee = 0;?>
				<div class="col-xs-11">
					@foreach($data_content['branches'] as $key => $value)
						@foreach($value['charts'] as $key2 => $value2)
							<?php $employee = $employee + $value2['current_employee'];?>
						@endforeach
					@endforeach
					<h4>{{count($employee)}}</h4>
				</div>
			</div>

			<div class="clearfix">
				<div class="col-lg-12 text-right">
					<a href="{{route('hr.organisations.edit', $data_content['id'])}}" class="btn border-default btn-circle" title="Edit">
						<i class="fa fa-pencil"></i>
					</a>
					<a type="button" href="javascript:;" class="btn border-default btn-circle" title="Hapus" data-toggle="modal" data-target="#del_organisation_modal" data-delete-action="{{ route('hr.organisations.delete', ['id' => $data_content['id']]) }}">
						<i class="fa fa-trash"></i>
					</a>
				</div>
			</div>
		@endif

		@if (isset($toggle['follow']))
			<div class="col-lg-12 text-right">
				<a type="button" href="javascript:;" class="btn border-default btn-circle" title="Hapus" data-toggle="modal" data-target="#del_organisation_kalendar_modal" data-delete-action="{{ route('hr.charts.calendars.delete', ['id' => $data_content['id']]) }}">
					<i class="fa fa-trash"></i>
				</a>
			</div>
		@endif

		@if(isset($data_content['contacts'])&&count($data_content['contacts']))
			<ul class="fa-ul" style="padding-left:5px;">
				@foreach($data_content['contacts'] as $key2 => $value2)
					@if($value2['item']=='phone')
						<li class="opacity-75"><i class="fa-li fa fa-mobile-phone fa-lg" style="margin-top:2px"></i> {!! $value2['value'] !!}</li>
					@elseif($value2['item']=='email')
						<li class="opacity-75"><i class="fa-li fa fa-envelope" style="margin-top:2px"></i> {!! $value2['value'] !!}</li>
					@endif
				@endforeach
			</ul>
		@endif
		@if (isset($toggle['branch']))
			<div class="clearfix">
				<div class="col-lg-12 text-right">
					<a href="{{route('hr.organisation.branches.edit', ['id' => $data_content['id'], 'org_id' => $data_content['organisation_id']])}}" class="btn border-default btn-circle mr-5" title="Edit">
						<i class="fa fa-pencil"></i>
					</a>
					<a href="javascript:;" class="btn border-default btn-circle" title="Hapus" data-toggle="modal" data-target="#del_organisation_modal" data-delete-action="{{ route('hr.organisation.branches.delete', ['id' => $data_content['id'], 'org_id' => $data_content['organisation_id']]) }}">
						<i class="fa fa-trash"></i>
					</a>
				</div>
			</div>
		@endif

		@if (isset($toggle['person']))
			<div class="pull-right">
				<a href="{{route('hr.persons.edit', [$data_content['id'], 'org_id' => Input::get('org_id')])}}" class="btn border-default btn-circle" title="Edit">
					<i class="fa fa-pencil"></i>
				</a>
				<a href="javascript:;" class="btn border-default btn-circle" title="Hapus" data-toggle="modal" data-target="#del_modal" data-delete-action="{{ route('hr.persons.delete', [$data_content['id'], 'org_id' => Input::get('org_id')]) }}">
					<i class="fa fa-trash"></i>
				</a>
			</div>
		@endif
	</div>

	@if (isset($toggle['document']))
		</a>
	@endif
@elseif ($mode == 'list_simple')								
	@if($value['item']=='address')
		<ul class="list-unstyled">
			<div class="alert alert-callout alert-info" role="alert" style="border-style:none;">
				<div class="row">
					<div class="col-md-10">
						<strong class="text-primary">Alamat </strong><br/>
						{{$value['value']}}
					</div>
					<div class="col-md-2">
						@if (isset($toggle['branch_kontak']))
							<a href="javascript:;" class="btn border-default btn-circle pull-right" title="Hapus" data-toggle="modal" data-target="#del_organisation_modal" data-delete-action="{{ route('hr.branches.contacts.delete', ['id' => $data_content['id'], 'branchid' => $branch['id'], 'org_id' => $branch['organisation_id']]) }}">
								<i class="fa fa-trash"></i>
							</a>
							<a class="btn border-default btn-circle pull-right mr-5" data-toggle="modal" data-target="#contactCreate" data-modal-contact-item={{$value['item']}} data-modal-contact-id={{$value['id']}} data-modal-contact-is-default={{$value['is_default']}} data-modal-contact-value={{str_replace(' ','_',$value['value'])}} data-modal-address-id={{$value['id']}} data-is-default="{{ $value['is_default'] }}">
								<i class="fa fa-pencil"></i>
							</a>
						@else
							<a href="javascript:;" class="btn border-default btn-circle pull-right" title="Hapus" data-toggle="modal" data-target="#del_organisation_modal" data-delete-action="{{ route('hr.persons.works.delete',  $data['id'], $data_content['id']) }}">
								<i class="fa fa-trash"></i>
							</a>
							<a class="btn border-default btn-circle pull-right mr-5" data-toggle="modal" data-target="#addressCreate" data-modal-address-item={{$value['item']}} data-modal-address-id={{$value['id']}} data-modal-address-is-default={{$value['is_default']}} data-modal-address-value={{str_replace(' ','_',$value['value'])}} data-modal-address-id={{$value['id']}} data-is-default="{{ $value['is_default'] }}">
								<i class="fa fa-pencil"></i>
							</a>
						@endif
					</div>
				</div>
			</div>					
		</ul>		
	@else
		<ul class="list-unstyled">
			<div class="alert alert-callout alert-info" role="alert" style="border-style:none;">
				<div class="row">
					<div class="col-md-10">
						<strong class="text-primary">{{ucwords(str_replace('_',' ',$value['item']))}} </strong><br/>
						{{$value['value']}}
					</div>
					<div class="col-md-2">
						@if (isset($toggle['branch_kontak']))
							<a href="javascript:;" class="btn border-default btn-circle pull-right" title="Hapus" data-toggle="modal" data-target="#del_organisation_modal" data-delete-action="{{ route('hr.branches.contacts.delete', ['id' => $data_content['id'], 'branchid' => $branch['id'], 'org_id' => $branch['organisation_id']]) }}">
								<i class="fa fa-trash"></i>
							</a>
						@else
							<a href="javascript:;" class="btn border-default btn-circle pull-right" title="Hapus" data-toggle="modal" data-target="#del_organisation_modal" data-delete-action="{{ route('hr.organisation.branches.delete', ['id' => $data_content['id']]) }}">
								<i class="fa fa-trash"></i>
							</a>
						@endif
						<a class="btn border-default btn-circle pull-right btn_modal mr-5" data-toggle="modal" data-target="#contactCreate" data-modal-contact-item={{$value['item']}} data-modal-contact-id={{$value['id']}} data-modal-contact-is-default={{$value['is_default']}} data-modal-contact-value={{$value['value']}} data-modal-contact-id={{$value['id']}} data-is-default="{{ $value['is_default'] }}"><i class="fa fa-pencil"></i></a>
					</div>
				</div>
			</div>					
		</ul>	
	@endif
@endif