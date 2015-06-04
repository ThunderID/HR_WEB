@section('breadcrumb')
	<li>Home</li>
	<li>{{ucwords($data['name'])}}</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">

		<!-- BEGIN CARD HEADER -->
		<div class="card-head card-head-sm style-primary">
			<div class="col-xs-12 pt-5 ">
				<a href="{{route('hr.organisations.index')}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i>&nbsp;Kembali
				</a>
				<a class="btn btn-flat ink-reaction pull-right" data-toggle="modal" data-target="#del_modal">
					<i class="fa fa-trash"></i>&nbsp;Hapus
				</a>
				<a href="{{route('hr.organisations.edit', ['id' => $data['id'], 'src' => 'show'])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-pencil"></i>&nbsp;Ubah
				</a>
				<a href="{{route('hr.organisation.documents.create', ['org_id' => $data['id']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-plus-circle fa-lg"></i>&nbsp;Dokumen
				</a>
				<a href="{{route('hr.persons.index', ['page' => 1, 'organisation' => $data['name']])}}" class="btn btn-flat ink-reaction pull-right">
					<i class="fa fa-users"></i>&nbsp;Karyawan
				</a>
			</div>
		</div>
		<!-- END CARD HEADER -->

		<!-- BEGIN CARD TILES -->
		<div class="card-body">
			<div class = "col-md-12 hbox-md">
				@include('admin.filters.organisation')

				<!-- BEGIN MIDDLE -->					
				<div class="hbox-column col-md-10" id="sidebar_mid">
					<div class="col-md-12">
						<div class="row">
							<div class="margin-bottom-xxl">
								<h1 class="text-light no-margin pull-left">{{$data['name']}}</h1>
								<div class="btn-group btn-group-sm pull-right">
									@if (Input::get('q'))
										<a href="{{ route('hr.organisation.documents.index') }}" class="btn btn-default-light mr-20"><i class="fa fa-trash"></i> Hapus Filter</a>
									@endif
									<button type="button" class="btn btn-default-light dropdown-toggle" data-toggle="dropdown">
										<span class="glyphicon glyphicon-arrow-down"></span> Urutkan
									</button>
									<ul class="dropdown-menu dropdown-menu-right animation-dock" role="menu">
										<li @if(!Input::has('sort_name')) || Input::get('sort_name')=='asc') class="active" @endif><a href="{{route('hr.organisation.documents.index', ['id' => $data['id'], 'page' => 1, 'sort_name' => 'asc'])}}">Nama (A-Z)</a></li>
										<li @if(Input::get('sort_name')=='desc')class="active" @endif><a href="{{route('hr.organisation.documents.index', ['id' => $data['id'], 'page' => 1, 'sort_name' => 'desc'])}}">Nama (Z-A)</a></li>
									</ul>
								</div>
								<div class="clearfix">&nbsp;</div>
								<h5>
									@if(count($documents)) Total {{$controller_name}} <strong>{{$paginator->total_item}}</strong> @else Tidak ada data @endif
								</h5>
							</div><!--end .margin-bottom-xxl -->

							<div class="list-results" style="margin-bottom:-1px;border-top:1px solid #eee;border-bottom:1px solid #eee;">
								@foreach($documents as $key => $value)	
									@if($key%2==0 && $key!=0)
										</div>
										<div class="list-results" style="margin-bottom:-1px;border-bottom:1px solid #eee">
									@endif											
									<div class="col-xs-12 col-lg-6 hbox-xs">
										@include('admin.widgets.contents',[
											'route'				=> route('hr.organisation.documents.show', ['id' => $value['id'], 'org_id' => $data['id']]),
											'editroute'			=> 'hr.organisation.documents.edit',
											'deleteroute'		=> 'hr.organisation.documents.delete',
											'mode'				=> 'list',
											'data_content'		=> $value,
											'toggle'			=> [
																	'document'	=> true
																	]
										])
									</div>
								@endforeach
							</div>
						</div>
					</div>
					@if(count($documents))
						@include('admin.helpers.pagination')
					@endif
				</div>
			</div>
		</div>
	</div>
@stop
