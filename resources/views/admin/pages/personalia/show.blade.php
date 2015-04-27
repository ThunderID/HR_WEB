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
						<li @if(isset($relatives)) class="active" @endif><a href="{{route('hr.persons.relatives.index', [$data['id']])}}">Kerabat </a>  <small class="pull-right text-bold opacity-75"></small></a></li>
						<li @if(isset($works)) class="active" @endif><a href="{{route('hr.persons.works.index', [$data['id']])}}">Pekerjaan </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					</ul>
					<ul class="nav nav-pills nav-stacked">
						<li class="text-primary">CONTACTS</li>
						<?php $isAddress = false; ?>
						<?php $isPhone = false; ?>
						@foreach($data['tagcontacts'] as $key => $value)
							@if($value == 'address')
								<?php $isAddress = true ?>
							@elseif($key == 'phone')
								<?php $isPhone = true ?>
							@endif
							<li @if(Input::has('item') && Input::get('item') == $value['item']) class="active" @endif><a href="{{route('hr.persons.contacts.index', [$data['id'], 'page' => 1,'item' => $value['item']])}}">{{ucwords(str_replace('_',' ',$value['item']))}}  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
						@endforeach
						@if($isAddress == false)
							<li><a href="{{route('hr.persons.contacts.index', [$data['id'], 'page' => 1,'item' => 'address'])}}"><i class="fa fa-exclamation pull-right mt-5 text-warning"></i>Address</a></li>
						@endif
						@if($isPhone == false)
							<li><a href="{{route('hr.persons.contacts.index', [$data['id'], 'page' => 1,'item' => 'phone'])}}"><i class="fa fa-exclamation pull-right mt-5 text-warning"></i>Phone</a></li>
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
						&nbsp;&nbsp;
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
@stop

@section('js')
	{!! HTML::script('js/dropzone.min.js')!!}
	<script type="text/javascript">

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
