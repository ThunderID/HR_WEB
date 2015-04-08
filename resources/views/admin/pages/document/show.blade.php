@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row pb-10">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a href="{{route('admin.document.add') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Create New</a>

		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form pull-right">
			{!! Form::open(['route' => null, 'class' => 'form-inline']) !!}
				<div class="form-group col-sm-9">
					<input type="text" class="form-control" name="q" style="width:100%">
					<label for="">Search</label>
				</div>
				<button class="btn btn-raised btn-default-light ink-reaction" type="submit">Search</button>
			{!! Form::close() !!}
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<header>Surat Peringatan</header>
				</div>				
				<div class="card-body">
					<div class="row  pb-20">
						<div class="col-md-12">
							<div class="form-group">
								<select name="company" id="company" class="form-control select2">
									<option value="">Nama Perusahaan</option>
									<option value="mps">PT. Mentari Pagi Sejahtera</option>
								</select>
							</div>
						</div><!--end .col -->
					</div>

					<table class="table no-margin">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Pegawai</th>
								<th>Tanggal (Created @)</th>								
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Mark Zuckenbrugebreg</td>
								<td>12 Desember 2001</td>
								<td>
									<a href="{{route('admin.document-detail.index') }}">
										detail
									</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function () {
			$('.select2').select2();
		});
	</script>
@stop

