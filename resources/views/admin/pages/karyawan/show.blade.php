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
			<div class="hbox-column col-md-2" id="sidebar_left">
				<ul class="nav nav-pills nav-stacked">
					<li class="text-primary" style="text-transform: uppercase;">CATEGORIES</li>
					<li class="active"><a href="{{route('hr.persons.show', [$data['id']])}}">Profil  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.relatives.index', [$data['id']])}}">Kerabat </a>  <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.works.index', [$data['id']])}}">Pekerjaan </a> <small class="pull-right text-bold opacity-75"></small></a></li>
				</ul>
				<ul class="nav nav-pills nav-stacked">
					<li class="text-primary" style="text-transform: uppercase;">DOKUMEN</li>
					@foreach($documents as $key => $value)
						<li><a href="{{route('hr.persons.documents.index', ['id' => $data['id'], 'page' => '1', 'tag' => $value['tag']] )}}">{{$value['tag']}}</a><small class="pull-right text-bold opacity-75"></small></a></li>			
					@endforeach
				</ul>					
			</div>

			<!-- BEGIN MIDDLE -->					
			<div class="hbox-column col-md-7" id="sidebar_mid">
				<div class="margin-bottom-xxl">
					<div class="pull-left width-3 clearfix hidden-xs">
						@if($data['avatar']!='')
							<img class="img-circle img-responsive" alt="" src="{{url($data['avatar'])}}"></img>
						@else
							<img class="img-circle img-responsive" alt="" @if($data['gender'] =='male') src="{{url('images/male.png')}}" @else src="{{url('images/female.png')}}" @endif></img>
						@endif
					</div>
					<h1 class="text-light no-margin">{{$data['prefix_title'].' '.$data['full_name'].', '.$data['suffix_title']}}</h1>
					<h5>
						@if(isset($data['works'][0]))
							{{$data['works'][0]['name']}} di {{$data['works'][0]['branch']['name']}}
						@endif
					</h5>
					&nbsp;&nbsp;
				</div>
				@yield('karyawan.show')
				<!-- END MIDDLE -->
			</div>

			<!-- BEGIN RIGHTBAR -->
			@include('admin.helpers.person-rightbar')
		</div>
	</div>

	<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				{!! Form::open(array('route' => array('hr.persons.delete', $data['id']),'method' => 'POST')) !!}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="simpleModalLabel">Hapus Data Profil</h4>
				</div>
				<div class="modal-body">
					<p>Apakah Anda yakin akan menghapus data profil? Silahkan masukkan password Anda untuk konfirmasi.</p>
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
@stop

@section('css')
	{!! HTML::style('css/dropzone.css')!!}
@stop

@section('js')
	{!! HTML::script('js/dropzone.min.js')!!}
	<script type="text/javascript">
		window.onload=col_justify('sidebar_left','sidebar_mid','sidebar_right');

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
