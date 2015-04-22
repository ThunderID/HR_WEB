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
		<div class="card-tiles">
			<!-- BEGIN LEFTBAR -->
			<div class="hbox-column col-md-2" id="sidebar_left">
				<ul class="nav nav-pills nav-stacked">
					<li><small>CATEGORIES</small></li>
					<li><a href="{{route('hr.persons.show', [$data['id']])}}">Profil  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.relatives.index', [$data['id']])}}">Kerabat </a>  <small class="pull-right text-bold opacity-75"></small></a></li>
					<li><a href="{{route('hr.persons.works.index', [$data['id']])}}">Pekerjaan </a> <small class="pull-right text-bold opacity-75"></small></a></li>
				</ul>
				<ul class="nav nav-pills nav-stacked">
					<li><small>DOKUMEN</small></li>
					<?php $tag = null;?>
					@foreach($documents as $key => $value)
						@if($value['tag']!=$tag)
							<li @if($person_document['document']['tag']==$value['tag']) class="active"@endif><a href="{{route('hr.persons.documents.index', [$data['id'],'page' => 1, 'q' => Input::get('q'), 'tag' => $value['tag']])}}">{{$value['tag']}} <small class="pull-right text-bold opacity-75"></small></a></li>
							<?php $tag = $value['tag'];?>
						@endif
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
					<h1 class="text-light no-margin">{{$data['prefix_title'].' '.$data['full_name'].' '.$data['suffix_title']}}</h1>
					<h5>
						@if(isset($data['works'][0]))
							{{$data['works'][0]['name']}} di {{$data['works'][0]['branch']['name']}}
						@endif
					</h5>
					&nbsp;&nbsp;
				</div>
				<ul class="nav nav-tabs" data-toggle="tabs">
					<li class="active"><a href="#details">{{$person_document['document']['name']}}</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="details">
						<a class="btn btn-sm pull-right ink-reaction btn-floating-action btn-danger del-modal mt-5" type="button" data-toggle="modal" data-target="#del_modal">
							<i class="fa fa-trash"></i>
						</a>
						<br/>
						<br/>
						@foreach($person_document['details'] as $key => $value)
							<div class="row">
								<div class="col-sm-3"><h5 class="text-bold">{{ucwords($value['template']['field'])}}</h5></div>
								<div class="col-sm-9"><h5 class="text-light">@if($value['numeric']!=0) {{$value['numeric']}} @else {{$value['text']}} @endif</h5></div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<!-- BEGIN RIGHTBAR -->
			@include('admin.helpers.person-rightbar')		
		</div>
	</div>
	<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="simpleModalLabel">Hapus Data Dokumen</h4>
				</div>
				<div class="modal-body">
					<p>Apakah Anda yakin akan menghapus data dokumen?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a href="{{ route('hr.persons.documents.delete' ,[ $data['id'],$person_document['id']]) }}" type="button" class="btn btn-danger">Hapus</a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
@stop
