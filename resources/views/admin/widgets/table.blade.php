@if (str_is('*documents*', strtolower($data['function'])))
	<div class="col-md-6 col-sm-6">
		<div class="card card-widget">
			<div class="card-head">
				<div class="tools" style="padding-right:0; margin-bottom:-50px">
					<div class="btn-group mt-5 hide">
						<a href="{{ route('hr.persons.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="lihat data semua"><i class="md md-visibility"></i></a>
						<a href="{{ route('hr.persons.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="ubah widget"><i class="md md-settings"></i></a>
						<a href="javascript:;" class="btn btn-icon-toggle btn-default btn-sm del_widget" data-toggle="tooltip" data-placement="top" data-original-title="hapus widget"><i class="md md-delete"></i></a>
					</div>
				</div>
				<header class="mt-30 mb-5"> @replace_delimiter($title) </header>
			</div><!--end .card-head -->
			<div class="card-body height-9 scroll" style="padding-top:10px">
				<table class="table">
					<thead>
						<tr>
							@foreach ($data['field'] as $f => $field)
								@if ($field == 'full_name')
									<?php $field = 'Nama Pegawai'; ?>
									<th> {{ $field }} </th>
								@elseif ($field == 'created_at')
									<?php $field = 'Tanggal'; ?>
									<th class='text-center'> {{ $field }} </th>
								@else
									<th> @replace_delimiter($field) </th>
								@endif
							@endforeach
						</tr>
					</thead>
					<tbody>
						@foreach($data['data'][0]['persons'] as $value)
							<tr>
								@foreach($data['field'] as $field2)
									@if ($field2 == 'created_at')
										<td class='text-center'> @date($value[$field2]) </td>
									@else
										<td> {{ $value[$field2] }} </td>
									@endif
								@endforeach
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@else
	<div class="col-md-6 col-sm-6">
		<div class="card card-widget">
			<div class="card-head">
				<div class="tools" style="padding-right:0;margin-bottom:-50px;">
					<div class="btn-group mt-5 hide">
						<a href="{{ route('hr.persons.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="lihat data semua"><i class="md md-visibility"></i></a>
						<a href="{{ route('hr.persons.index') }}" class="btn btn-icon-toggle btn-default btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="ubah widget"><i class="md md-settings"></i></a>
						<a href="javascript:;" class="btn btn-icon-toggle btn-default btn-sm del_widget" data-toggle="tooltip" data-placement="top" data-original-title="hapus widget"><i class="md md-delete"></i></a>
					</div>
				</div>
				<header class="mt-30"> @replace_delimiter($title) </header>
			</div><!--end .card-head -->
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							@foreach ($data['field'] as $field)
								@if ($field == 'count')
									<?php $field = 'Jumlah'; ?>
									<th class="text-center">{{ $field }}</th>
								@else
									<th>{{ $field }}</th>
								@endif
							@endforeach
						</tr>
					</thead>
					<tbody>
						@foreach ($data['data'] as $value)
							<tr>
								@foreach ($data['field'] as $field2)
									@if ($field2 == 'count')
										<td class='text-center'>{{ isset($value['charts'][0]['works'][0][$field2]) ? $value['charts'][0]['works'][0][$field2] : 0 }}</td>
									@else
										<td>{{ $value[$field2] }}</td>		
									@endif
								@endforeach
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endif