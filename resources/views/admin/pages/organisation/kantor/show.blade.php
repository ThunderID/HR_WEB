@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card-head card-head-sm style-primary">
				<div class="col-md-12 pt-5 ">
					<div class="col-md-12">
						<div class="row">
							<a href="{{route('hr.organisation.branches.index')}}" class="btn btn-flat ink-reaction pull-left">
								<i class="md md-reply"></i> Kembali
							</a>
							<a href="{{route('hr.organisation.branches.delete', [$data['id']])}}" class="btn btn-flat ink-reaction pull-right">
								<i class="fa fa-trash"></i> Hapus
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card tabs-left style-default-light">
				<ul class="card-head nav nav-tabs" data-toggle="tabs">
					<li class="active"><a href="#detaile">Detail</a></li>
					<li><a href="#contact">Kontak</a></li>
					<li><a class="oc" href="#structure">Struktur</a></li>
				</ul>
				<div class="card-body tab-content style-default-bright">
					<div class="tab-pane active" id="detaile">
						<div class="row">
							<div class="col-sm-3"><h4 class="text-bold">Nama</h4></div>
							<div class="col-sm-9"><h4 class="text-light">{{$data['name']}}</h4></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><h4 class="text-bold">NPWP</h4></div>
							<div class="col-sm-9"><h4 class="text-light">{{$data['npwp']}}</h4></div>
						</div>
						<div class="row">
							<div class="col-sm-3"><h4 class="text-bold">Ijin Perusahaan</h4></div>
							<div class="col-sm-9"><h4 class="text-light">{{$data['license']}}</h4></div>
						</div>	
						<div class="row">
							<div class="col-sm-3"><h4 class="text-bold">Bidang Bisnis</h4></div>
							<div class="col-sm-9"><h4 class="text-light">{{$data['business_fields']}}</h4></div>
						</div>	
						<div class="row">
							<div class="col-sm-3"><h4 class="text-bold">Kegiatan Bisnis</h4></div>
							<div class="col-sm-9"><h4 class="text-light">{{$data['business_activities']}}</h4></div>
						</div>	
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<a class="btn btn-flat" href="{{route('hr.organisation.branches.edit', ['id' => $data['id']]) }}">EDIT</a>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="contact">
						@foreach($data['contacts'] as $key => $value)
							<div class="row">
								<div class="col-sm-3"><h4 class="text-bold">{{ucwords(str_replace('_',' ',$value['item']))}}</h4></div>
								<div class="col-sm-9"><h4 class="text-light">{{$value['value']}}</h4></div>
							</div>
						@endforeach
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<a class="btn btn-flat" href="{{route('hr.organisation.branches.edit', ['id' => $data['id']]) }}">EDIT</a>
							</div>
						</div>
					</div>					
					<div class="tab-pane" id="structure">
						<h3 class="text-light">Struktur Perusahaan</h3>
						<div class="row">
							<div class="card-body pt-10 pb-0" id="orgc">
							</div>
						</div>
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<a class="btn btn-flat" href="{{route('hr.organisation.charts.create', ['org_id' => $data['organisation_id']]) }}">EDIT</a>
							</div>
						</div>
					</div>
				</div><!--end .card-body -->
			</div><!--end .col -->
		</div><!--end .row -->
		<!-- END LAYOUT LEFT SIDEBAR -->	
	</div>
@stop

@section('css')
	{!! HTML::style('css/base.css')!!}
	{!! HTML::style('css/spacetree.css')!!}
@stop

@section('js')
	{!! HTML::script('js/jit.min.js')!!}
	@include('admin.pages.organisation.'.$controller_name.'.orgchart')
	<script type="text/javascript">
		$(document).ready(function () {
			$('.oc').click(function () {
				document.getElementById('orgc').innerHTML = '<div id="orgchart"></div>';
				init();
			})
		});
	</script>
@stop