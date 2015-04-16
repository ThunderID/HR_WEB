@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-head style-primary">
			<header>Tambah Struktur</header>
		</div>
		<div class="card-body">
			<form class="form" role="form" action="#" method="post">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="path_name" name="path_name" value="">
							<label for="path_name">Parent (ajax)</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="name" name="name" value="">
							<label for="name">Nama</label>
						</div>
					</div>
				</div><!--end .row -->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" class="form-control" id="min" name="min" value="">
							<label for="min">Jumlah Minimum Pegawai</label>
						</div>
					</div><!--end .col -->
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" class="form-control" id="ideal" name="ideal" value="">
							<label for="ideal">Jumlah Ideal Pegawai</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" class="form-control" id="max" name="max" value="">
							<label for="max">Jumlah Maksimum Pegawai</label>
						</div>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<a class="btn btn-flat" href="{{route('hr.organisation.branches.index')}}">BATAL</a>
						<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
					</div><!--end .card-actionbar-row -->
				</div><!--end .card-actionbar -->				
			</form>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function () {
			$('#path_name').select2({
	            minimumInputLength: 3,
	            placeholder: '',
	            ajax: {
	                url: "{{route('hr.ajax.chart',[1])}}",
	                dataType: 'json',
	                quietMillis: 500,
	               data: function (term) {},
	                results: function (data) {
	                    return {
	                        results: $.map(data, function (item) {
	                            return {
	                                text: item.name,
	                                id: item.id,
	                            }			                        
	                        })
	                    };
	                }
	            }
	        });
	    });	
   </script>
@stop