@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<!-- BEGIN SEARCH HEADER -->
		<div class="card-head style-primary">
			<div class="col-md-6 col-xs-6" style="padding-left:0px; margin-top: 3px">
				<div class="tools pull-left">
					<form class="navbar-search" role="search">
						{!! Form::open(['route' => ('hr.organisations.index'), 'method' => 'get']) !!}
						<div class="form-group">
							<input type="text" class="form-control" name="q" placeholder="Ketik kata kunci">
						</div>
						<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
						{!! Form::close() !!}
					</form>
				</div>
			</div>
			<div class="col-md-6 col-xs-6 mt-10" style="padding-right:0px; ">
				<div class="tools pull-right">
					<a class="btn btn-flat ink-reaction" href="{{route('hr.organisations.create') }}">
						<i class="fa fa-plus-circle fa-lg"></i>&nbsp;Tambah
					</a>
				</div>
			</div>
		</div><!--end .card-head -->
		<!-- END SEARCH HEADER -->

		<!-- END SEARCH HEADER -->
		<div class="card-body">
			<div class="row">
				<div class="col-sm-12">
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">
							@if(count($data)) Total data <strong>{{$paginator->total_item}}</strong> @else Tidak ada data @endif
						</span>
						<div class="btn-group btn-group-sm pull-right">
							@if (Input::get('q'))
								<a href="{{ route('hr.organisations.index') }}" class="btn btn-default-light mr-20"><i class="fa fa-trash"></i> Hapus Filter</a>
							@endif
						</div>
					</div><!--end .margin-bottom-xxl -->
					<div class="list-results" style="margin-bottom:0px;">
						@foreach($data as $key => $value)	
							@if($key%2==0 && $key!=0)
								</div>
								<div class="list-results" style="margin-bottom:0px;">
							@endif		
							
							<div class="col-xs-12 col-lg-6 hbox-xs">
								@include('admin.widgets.contents', [
									'route'				=> route('hr.organisations.show', ['organisation' => $value['id']]),
									'mode'				=> 'list',
									'data_content'		=> $value,
									'toggle'			=> ['organisation' 	=> true],
									'class'				=> ['top'		=> 'height-2']
								])
							</div>
						@endforeach
					</div>
					@if(count($data))
						@include('admin.helpers.pagination')
					@endif
				</div><!--end .list-results -->
			</div>
		</div>
	</div>
	{!! Form::open(array('route' => array('hr.organisations.delete', 0),'method' => 'POST')) !!}
		<div class="modal fade modalOrganisationDelete" id="del_organisation_modal" tabindex="-1" role="dialog" aria-labelledby="del_organisation_modal" aria-hidden="true">
			@include('admin.modals.delete.delete')
		</div>	
	{!! Form::close() !!}
@stop

@section('js')
	<script>
		$('.modalOrganisationDelete').on('show.bs.modal', function(e) {
			var action = $(e.relatedTarget).attr('data-delete-action');
			$(this).parent().attr('action', action);
		});
	</script>
@stop
