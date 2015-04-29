			<!-- BEGIN LEFTBAR -->
			<div class="hbox-column col-md-2" id="sidebar_left">
				<ul class="nav nav-pills nav-stacked">
					<li class="text-primary">CATEGORIES</li>
					<li @if(!Input::has('tag') && !Input::has('item')) class="active" @endif><a href="{{route('hr.organisation.branches.show', [$data['id']])}}">@if(!count($data['charts'])) <i class="fa fa-exclamation pull-right mt-5 text-warning"></i> @endif Profil  </a> <small class="pull-right text-bold opacity-75"></small></a></li>
				</ul>
				<ul class="nav nav-pills nav-stacked">
					<li class="text-primary">CONTACTS</li>
					<?php $isAddress = 0; ?>
					<?php $isPhone = 0; ?>
					<?php $isEmail = 0; ?>
					<?php $isMsgSVC = 0; ?>

					@foreach($data['tagcontacts'] as $key => $value)
						@if($value['item'] == 'address' && $isAddress == 0) 
							<?php $isAddress = 1 ?>
						@elseif($value['item'] == 'phone' && $isPhone == 0) 
							<?php $isPhone = 1 ?>
						@elseif($value['item'] == 'email' && $isEmail == 0) 
							<?php $isEmail = 1 ?>
						@elseif($value['item'] != 'email' && $value['item'] != 'phone' && $value['item'] != 'address' && $isMsgSVC == 0) 
							<?php $isMsgSVC = 1 ?>							
						@endif

						@if($value['item'] != 'email' && $value['item'] != 'phone' && $value['item'] != 'address')
							<?php $isMsgSVC = 2 ?>	
						@else
							<li @if(Input::has('item') && Input::get('item') == $value['item']) class="active" @endif><a href="{{route('hr.branches.contacts.index', [$data['id'], 'page' => 1,'item' => $value['item']])}}">{{ucwords(str_replace('_',' ',$value['item']))}}</a> <small class="pull-right text-bold opacity-75"></small></a></li>
						@endif
					@endforeach

					@if($isAddress == 0)
						<li @if(Input::has('item') && Input::get('item') == 'address') class="active" @endif><a href="{{route('hr.branches.contacts.index', [$data['id'], 'page' => 1,'item' => 'address'])}}"><i class="fa fa-exclamation pull-right mt-5 text-warning"></i>Address</a></li>
					@endif
					@if($isPhone == 0)
						<li @if(Input::has('item') && Input::get('item') == 'phone') class="active" @endif><a href="{{route('hr.branches.contacts.index', [$data['id'], 'page' => 1,'item' => 'phone'])}}"><i class="fa fa-exclamation pull-right mt-5 text-warning"></i>Phone</a></li>
					@endif
					@if($isEmail == 0)
						<li @if(Input::has('item') && Input::get('item') == 'email') class="active" @endif><a href="{{route('hr.branches.contacts.index', [$data['id'], 'page' => 1,'item' => 'email'])}}"><i class="fa fa-exclamation pull-right mt-5 text-warning"></i>Email</a></li>
					@endif
					@if($isMsgSVC == 0)
						<li @if(Input::has('messageService')) class="active" @endif><a href="{{route('hr.branches.contacts.index', [$data['id'], 'page' => 1,'messageService' => true])}}"><i class="fa fa-exclamation pull-right mt-5 text-warning"></i>Message Service</a></li>
					@elseif($isMsgSVC == 2)
						<li @if(Input::has('messageService')) class="active" @endif><a href="{{route('hr.branches.contacts.index', [$data['id'], 'page' => 1,'messageService' => true])}}">Message Service</a> <small class="pull-right text-bold opacity-75"></small></a></li>
					@endif					
					<br/>					
				</ul>
				<ul class="nav nav-pills nav-stacked">
					@if(count($data['departments']) > 0)
						<li class="text-primary">DEPARTMENT</li>
					@endif
					@foreach($data['departments'] as $key => $value)
						<li @if(Input::has('tag') && strtolower(Input::get('tag') == $value['tag'])) class="active" @endif><a href="{{route('hr.organisation.branches.show', ['id' => $data['id'], 'page' => '1', 'tag' => $value['tag']] )}}">{{$value['tag']}}</a><small class="pull-right text-bold opacity-75"></small></a></li>			
					@endforeach
				</ul>					
			</div>