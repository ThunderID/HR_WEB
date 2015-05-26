<!-- BEGIN LEFTBAR -->
<div class="hbox-column col-md-2" id="sidebar_left">
	<ul class="nav nav-pills nav-stacked">
		<li class="text-primary">MENU</li>
		<li @if(isset($contacts)) class="active" @endif><a href="{{route('hr.organisation.branches.show', ['page' => 1, 'org_id' => $data['id'], 'id' => $branch['id']])}}">@if(!$branch['has_contacts']) <i class="fa fa-exclamation pull-right mt-5 text-warning"></i> @endif Kontak  </a></li>
		<li @if(isset($charts)) class="active" @endif><a href="{{route('hr.branches.charts.index', ['page' => 1, 'org_id' => $data['id'], 'branchid' => $branch['id']])}}">@if(!$branch['has_charts']) <i class="fa fa-exclamation pull-right mt-5 text-warning"></i> @endif Struktur  </a></li>
		<li class="text-primary pt-25">PENGATURAN</li>
		<li @if(isset($apis)) class="active" @endif><a href="{{route('hr.branches.apis.index', ['page' => 1, 'org_id' => $data['id'], 'branchid' => $branch['id']])}}"> Api Keys  </a></li>
		<li @if(isset($finger)) class="active" @endif><a href="{{route('hr.branches.finger.show', ['page' => 1, 'org_id' => $data['id'], 'branchid' => $branch['id']])}}"> Finger of the Day  </a></li>
		@if(isset($filters))
			@foreach($filters as $key => $value)
				<li class="text-primary pt-25">{{strtoupper($value['title'])}}</li>
					@foreach($value['filters'] as $key2 => $value2)
						<li @if(Input::get($value['input']) == $value2[$value['filter']]) class="active" @endif>
							<a href="{{route(Route::currentRouteName(), ['branchid' => $branch['id'],'org_id' => $data['id'], 'page' => 1,$value['input'] => $value2[$value['filter']]])}}">
								{{ucwords($value2[$value['filter']])}}
							</a>
						</li>
					@endforeach
			@endforeach
		@endif
	</ul>
</div>