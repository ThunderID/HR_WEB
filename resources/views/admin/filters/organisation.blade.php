<!-- BEGIN LEFTBAR -->
<div class="hbox-column col-md-2" id="sidebar_left">
	<ul class="nav nav-pills nav-stacked">
		<li class="text-primary">ORGANISASI</li>
		<li class="">
			<a href="{{ route('hr.organisations.edit', [$data['id'], 'src' => 'show']) }}">Ubah</a>
		</li>
		<li>
			<a href="javascript:;" data-toggle="modal" data-target="#del_modal">Hapus</a>
		</li>
		<li class="text-primary pt-25">PENGATURAN</li>
		<li @if (isset($calendars)) class="active" @endif>
			@if (!$data['has_calendars']) 
				<i class="fa fa-exclamation pull-left mt-15 text-warning"></i> 
			@endif
			<a href="{{ route('hr.organisation.calendars.index', ['page' => 1, 'org_id' => $data['id']]) }}" title="Lihat Kalender Kerja">Kalender Kerja</a>
			<a href="{{ route('hr.organisation.calendars.create', ['org_id' => $data['id']]) }}" class="add-button" title="Tambah Kalender Kerja Baru">
				<i class="fa fa-plus" style="color:#333"></i>
			</a>
		</li>
		<li @if (isset($workleaves)) class="active" @endif>
			@if (!$data['has_workleaves']) 
				<i class="fa fa-exclamation pull-left mt-15 text-warning"></i> 
			@endif
			<a href="{{ route('hr.organisation.workleaves.index', ['page' => 1, 'org_id' => $data['id']]) }}" title="Lihat Jenis Cuti">Jenis Cuti</a>
			<a href="{{ route('hr.organisation.workleaves.create', ['org_id' => $data['id']]) }}" class="add-button" title="Tambah Jenis Cuti Baru">
				<i class="fa fa-plus" style="color:#333"></i>
			</a>
		</li>
		<li @if(isset($documents)) class="active" @endif>
			@if(!$data['has_documents']) 
				<i class="fa fa-exclamation pull-left mt-15 text-warning"></i> 
			@endif
			<a href="{{ route('hr.organisation.documents.index', ['page' => 1, 'org_id' => $data['id']]) }}" title="Lihat Dok. Personalia">Dok. Personalia</a>
			<a href="{{ route('hr.organisation.documents.create', ['org_id' => $data['id']]) }}" class="add-button" title="Tambah Dok. Personalia Baru">
				<i class="fa fa-plus" style="color:#333"></i>
			</a>
		</li>
		<li class="text-primary pt-25">DATA</li>
		<li @if(isset($branches)) class="active" @endif>
			<a href="{{ route('hr.organisations.show', ['page' => 1, 'org_id' => $data['id']]) }}" title="Lihat Data Cabang">
				@if(!$data['has_branches']) 
					<i class="fa fa-exclamation pull-right mt-5 text-warning"></i> 
				@endif Cabang  
			</a>
			<a href="{{ route('hr.organisation.branches.create', ['org_id' => $data['id']]) }}" class="add-button" title="Tambah Cabang Baru">
				<i class="fa fa-plus" style="color:#333"></i>
			</a>
		</li>
		<li>
			<a href="{{ route('hr.persons.index', ['page' => 1, 'org_id' => $data['id'], 'karyawan' => 'active']) }}" title="Lihat Data Karyawan">Karyawan</a>
		</li>

		@if(isset($filters))
			@foreach($filters as $key => $value)
				<li class="text-primary pt-25">{{strtoupper($value['title'])}}</li>
					@foreach($value['filters'] as $key2 => $value2)
						<li @if(Input::get($value['input']) == $value2[$value['filter']]) class="active" @endif>
							<a href="{{route(Route::currentRouteName(), ['org_id' => $data['id'], 'page' => 1,$value['input'] => $value2[$value['filter']]])}}">
								{{$value2[$value['display']]}}
							</a>
						</li>
					@endforeach
			@endforeach
		@endif
	</ul>
</div>