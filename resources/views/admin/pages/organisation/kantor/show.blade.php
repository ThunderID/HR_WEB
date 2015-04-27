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
					<div class="margin-bottom-xxl">
						<h1 class="text-light no-margin">{{$data['name']}}</h1>
						<h5>
							{{$data['business_activities']}}
						</h5>
						<h5>
							{{$data['business_fields']}}
						</h5>
						&nbsp;&nbsp;
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
		window.onload=col_justify('sidebar_left','sidebar_mid','sidebar_right');
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.del_charts').click(function(){
				var x = $(this).attr('data-target');
				$(x).modal();
			});
		});
	</script>
@stop