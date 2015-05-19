			<!-- BEGIN LEFTBAR -->
			<div class="hbox-column col-md-2" id="sidebar_left">
				<ul class="nav nav-pills nav-stacked">
					<li><small>CATEGORIES</small></li>
					<li @if(!isset($schedules) && !isset($relatives) && !isset($works) && !Input::has('tag')) class="active" @endif><a href="{{route('hr.persons.show', [$data['id']])}}">Profil  </a> </li>
					<li @if(isset($relatives)) class="active" @endif><a href="{{route('hr.persons.relatives.index', [$data['id']])}}">Kerabat </a> </li>
					<li @if(isset($works)) class="active" @endif><a href="{{route('hr.persons.works.index', [$data['id']])}}">Pekerjaan </a></li>
				</ul>
				<ul class="nav nav-pills nav-stacked">
					<li><small>DOKUMEN</small></li>
					<?php $tag = null;?>
					@foreach($documents as $key => $value)
						@if($value['tag']!=$tag)
							<li @if(Input::has('tag') && Input::get('tag')==$value['tag']) class="active" @endif><a href="{{route('hr.persons.documents.index', ['id' => $data['id'], 'page' => '1', 'tag' => $value['tag']] )}}">{{$value['tag']}}</a><small class="pull-right text-bold opacity-75"></small></a></li>			
							<?php $tag = $value['tag'];?>
						@endif
					@endforeach
				</ul>
			</div>