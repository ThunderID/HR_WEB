			<!-- BEGIN LEFTBAR -->
			<div class="hbox-column col-md-2" id="sidebar_left">
				<ul class="nav nav-pills nav-stacked">
					<li class="text-primary">CATEGORIES</li>
					<li @if(!Input::has('tag')) class="active" @endif><a href="{{route('hr.organisation.branches.show', [$data['id']])}}">Profil  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
				</ul>
				<ul class="nav nav-pills nav-stacked">
					<li class="text-primary">DEPARTMENT</li>
					@foreach($data['departments'] as $key => $value)
						<li @if(Input::has('tag') && strtolower(Input::get('tag') == $value['tag'])) class="active" @endif><a href="{{route('hr.organisation.branches.show', ['id' => $data['id'], 'page' => '1', 'tag' => $value['tag']] )}}">{{$value['tag']}}</a><small class="pull-right text-bold opacity-75"></small></a></li>			
					@endforeach
				</ul>					
			</div>