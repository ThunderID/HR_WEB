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
						{!! Form::open(['route' => ('hr.authentications.index'), 'method' => 'get']) !!}
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
				<a class="btn btn-flat ink-reaction" data-toggle="modal" data-target="#createAuthentication">
						<i class="fa fa-plus-circle fa-lg"></i>&nbsp;Tambah
					</a>				
				</div>
			</div>
		</div><!--end .card-head -->
		<!-- END SEARCH HEADER -->

		<!-- BEGIN SEARCH RESULTS -->
		<div class="card-body">
			<div class="row">

				<!-- BEGIN SEARCH NAV -->
				<div class="col-sm-4 col-md-3 col-lg-2">
					<ul class="nav nav-pills nav-stacked pb-25">
						<li class="text-primary">TAMPILKAN</li>
						<li @if(!Input::has('application')) class="active" @endif><a href="{{route('hr.authentications.index', ['page' => 1, 'q' => Input::get('q')])}}">Semua</a></li>
					</ul>
					<ul class="nav nav-pills nav-stacked pb-25">
						<li class="text-primary">CATEGORIES</li>
						@foreach($applications as $key => $value)
							<li @if(Input::get('application')==$value['name']) class="active"@endif><a href="{{route('hr.authentications.index', ['page' => 1, 'q' => Input::get('q'), 'application' => $value['name']])}}">{{ucwords($value['name'])}} </a></li>
						@endforeach
					</ul>
				</div><!--end .col -->
				<!-- END SEARCH NAV -->

				<div class="col-sm-8 col-md-9 col-lg-10">
					<!-- BEGIN SEARCH RESULTS LIST -->
					<div class="margin-bottom-xxl">
						<span class="text-light text-lg">
							@if(count($data)) Total data <strong>{{$paginator->total_item}}</strong> @else Tidak ada data @endif
						</span>
						<div class="btn-group btn-group-sm pull-right">
							@if (Input::get('q'))
								<a href="{{ route('hr.authentications.index') }}" class="btn btn-default-light mr-20"><i class="fa fa-trash"></i> Hapus Filter</a>
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
									'route'				=> '',
									'mode'				=> 'list',
									'data_content'		=> $value,
									'toggle'			=> ['menu' => true],
									'class'				=> ['top'		=> 'height-2']
								])
							</div>
						@endforeach
					</div>

					{!! Form::open(array('route' => array('hr.authentications.delete', '0'),'method' => 'POST')) !!}
						<div class="modal fade modalAuthenMenu" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="del_modal" aria-hidden="true">
							@include('admin.modals.delete.delete')
						</div>	
					{!! Form::close() !!}	

					@if(count($data))
						@include('admin.helpers.pagination')
					@endif
				</div><!--end .list-results -->
			</div>
		</div>
	</div>

	{!! Form::open(array('url' => route('hr.authentications.store'),'method' => 'POST')) !!}
		@include('admin.modals.application.create_authentication')
	{!! Form::close() !!}
@stop

@section('js')
	<script type="text/javascript">		
		$('.modalAuthenMenu').on('show.bs.modal', function(e) {
			var action = $(e.relatedTarget).attr('data-action');

			$(this).parent().attr('action', action);
		});

		$('.getCompany').select2({
			tokenSeparators: [","],
			tags: [],
			placeholder: "",
			minimumInputLength: 1,
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
                                text: item.name + ' department '+ item.tag + ' di '+ item.branch.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
    </script>
@stop
