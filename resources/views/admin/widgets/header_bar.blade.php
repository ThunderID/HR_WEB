<div class="headerbar">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="headerbar-left">
		<ul class="header-nav header-nav-options">
			<li class="header-nav-brand">
				<div class="brand-holder">
					<a href="../../html/dashboards/dashboard.html">
						<span class="text-lg text-bold text-primary">{{$html_title}}</span>
					</a>
				</div>
			</li>
			<li>
				<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
					<i class="fa fa-bars"></i>
				</a>
			</li>
		</ul>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="headerbar-right">
		<ul class="header-nav header-nav-profile">
			<li class="dropdown">
				<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
					@if(Config::get('user.gender')=='male')
						<img src="{{url('images/male.png')}}" alt="">
					@else
						<img src="{{url('images/female.png')}}" alt="">
					@endif
					<span class="profile-info">
						{{Config::get('user.name')}}
						<small>{{Config::get('user.role')}}</small>
					</span>
				</a>
				<ul class="dropdown-menu animation-dock">
					<li><a href="{{route('hr.logout.get')}}"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
				</ul><!--end .dropdown-menu -->
			</li><!--end .dropdown -->
		</ul><!--end .header-nav-profile -->
	</div><!--end #header-navbar-collapse -->
</div>