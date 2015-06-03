<!-- BEGIN LEFTBAR -->
<div class="hbox-column col-md-2" id="sidebar_left">
	<ul class="nav nav-pills nav-stacked">
		<li class="text-primary">MENU</li>
		<li @if(isset($branches)) class="active" @endif><a href="{{route('hr.organisations.show', ['page' => 1, 'org_id' => $data['id']])}}">@if(!$data['has_branches']) <i class="fa fa-exclamation pull-right mt-5 text-warning"></i> @endif Cabang  </a></li>
		<li class="text-primary pt-25">PENGATURAN</li>
		<li @if(isset($calendars)) class="active" @endif><a href="{{route('hr.organisation.calendars.index', ['page' => 1, 'org_id' => $data['id']])}}">@if(!$data['has_calendars']) <i class="fa fa-exclamation pull-right mt-5 text-warning"></i> @endif Kalendar  </a></li>
		<li @if(isset($workleaves)) class="active" @endif><a href="{{route('hr.organisation.workleaves.index', ['page' => 1, 'org_id' => $data['id']])}}">@if(!$data['has_workleaves']) <i class="fa fa-exclamation pull-right mt-5 text-warning"></i> @endif Template Cuti  </a></li>
		<li @if(isset($documents)) class="active" @endif><a href="{{route('hr.organisation.documents.index', ['page' => 1, 'org_id' => $data['id']])}}">@if(!$data['has_documents']) <i class="fa fa-exclamation pull-right mt-5 text-warning"></i> @endif Dokumen  </a></li>
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