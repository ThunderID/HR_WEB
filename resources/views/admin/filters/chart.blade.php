<!-- BEGIN LEFTBAR -->
<div class="hbox-column col-md-2" id="sidebar_left">
	<ul class="nav nav-pills nav-stacked">
		<li class="text-primary">MENU</li>
		<li @if(!isset($authentications)) class="active" @endif><a href="{{route('hr.branches.charts.show', ['id' => $chart['id'], 'org_id' => $data['id'], 'branchid' => $branch['id']])}}"> Stats </a></li>
		<li @if(isset($authentications)) class="active" @endif><a href="{{route('hr.branches.charts.show', ['id' => $chart['id'], 'org_id' => $data['id'], 'branchid' => $branch['id']])}}"> Authentikasi </a></li>
	</ul>
</div>