<!-- BEGIN LEFTBAR -->
<div class="hbox-column col-md-2" id="sidebar_left">
	<ul class="nav nav-pills nav-stacked">
		<li class="text-primary">{{ strtoupper($data['name']) }}</li>
		<li class="text-primary pt-25">CABANG {{ strtoupper($branch['name']) }}</li>
		<li>
			<a href="{{route('hr.organisation.branches.edit', [$branch['id'], 'org_id' => $data['id'], 'src' => 'show'])}}">Ubah</a>
		</li>
		<li><a href="javascript:;" data-toggle="modal" data-target="#del_modal">Hapus</a></li>
		<li class="text-primary pt-25">PENGATURAN</li>
		<li @if(isset($contacts)) class="active" @endif>
			<a href="{{ route('hr.organisation.branches.show', ['page' => 1, 'org_id' => $data['id'], 'id' => $branch['id']]) }}" title="Lihat Data Kontak">Kontak</a>
		</li>
		<li @if(isset($charts)) class="active" @endif>
			<a href="{{ route('hr.branches.charts.index', ['page' => 1, 'org_id' => $data['id'], 'branchid' => $branch['id']]) }}" title="Lihat Struktur/Jabatan">Struktur / Jabatan</a>
		</li>
		<li @if(isset($finger)) class="active" @endif>
			<a href="{{ route('hr.branches.finger.show', ['page' => 1, 'org_id' => $data['id'], 'branchid' => $branch['id']]) }}" title="Lihat Sidik Jari Absensi">Sidik Jari Absensi</a>
		</li>
		<li @if(isset($apis)) class="active" @endif>
			<a href="{{ route('hr.branches.apis.index', ['page' => 1, 'org_id' => $data['id'], 'branchid' => $branch['id']]) }}" title="Lihat API key">API Key</a>
		</li>
		<li class="text-primary pt-25">DATA</li>
		<li>
			<a href="{{ route('hr.persons.index', ['page' => 1, 'org_id' => $data['id'], 'karyawan' => 'active', 'branch' => $branch['id']]) }}" title="Lihat Data Karyawan">Karyawan</a>
		</li>
		@if(isset($filters))
			@foreach($filters as $key => $value)
				<li class="text-primary pt-25">{{strtoupper($value['title'])}}</li>
					@foreach($value['filters'] as $key2 => $value2)
						<li @if(Input::get($value['input']) == $value2[$value['filter']]) class="active" @endif>
							<a href="{{route(Route::currentRouteName(), ['branchid' => $branch['id'],'org_id' => $data['id'], 'page' => 1,$value['input'] => $value2[$value['filter']]])}}">
								@if ($value2[$value['filter']] == 'address')
									Alamat
								@else
									{{ucwords($value2[$value['filter']])}}
								@endif
							</a>
						</li>
					@endforeach
			@endforeach
		@endif
	</ul>
</div>