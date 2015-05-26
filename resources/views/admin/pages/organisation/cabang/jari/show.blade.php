@extends('admin.pages.organisation.cabang.show')
@section('kantor.show')
	<ul class="nav nav-tabs" data-toggle="tabs">
		<li class="active"><a href="#alamat">Jari Presensi</a></li>
	</ul>
	<br/>
	<div class="tab-content">
		<table class="table table-bordered text-sm">
			<thead>
				<tr>
					<th>Jempol Kiri</th>
					<th>Telunjuk Kiri</th>
					<th>Tengah Kiri</th>
					<th>Manis Kiri</th>
					<th>Kelingking Kiri</th>
					<th>Jempol Kanan</th>
					<th>Telunjuk Kanan</th>
					<th>Tengah Kanan</th>
					<th>Manis Kanan</th>
					<th>Kelingking Kanan</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						@if($finger['left_thumb'])
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_thumb'])}}"><i class="fa fa-check"> </i> 
						@else
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_thumb'])}}"><i class="fa fa-minus"> </i> 
						@endif
					</td>
					<td>
						@if($finger['left_index_finger'])
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_index_finger'])}}"><i class="fa fa-check"> </i> 
						@else
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_index_finger'])}}"><i class="fa fa-minus"> </i> 
						@endif
					</td>
					<td>
						@if($finger['left_middle_finger'])
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_middle_finger'])}}"><i class="fa fa-check"> </i> 
						@else
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_middle_finger'])}}"><i class="fa fa-minus"> </i> 
						@endif
					</td>
					<td>
						@if($finger['left_ring_finger'])
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_ring_finger'])}}"><i class="fa fa-check"> </i> 
						@else
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_ring_finger'])}}"><i class="fa fa-minus"> </i> 
						@endif
					</td>
					<td>
						@if($finger['left_little_finger'])
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_little_finger'])}}"><i class="fa fa-check"> </i> 
						@else
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_little_finger'])}}"><i class="fa fa-minus"> </i> 
						@endif
					</td>
					<td>
						@if($finger['right_thumb'])
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_thumb'])}}"><i class="fa fa-check"> </i> 
						@else
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_thumb'])}}"><i class="fa fa-minus"> </i> 
						@endif
					</td>
					<td>
						@if($finger['right_index_finger'])
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_index_finger'])}}"><i class="fa fa-check"> </i> 
						@else
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_index_finger'])}}"><i class="fa fa-minus"> </i> 
						@endif
					</td>
					<td>
						@if($finger['right_middle_finger'])
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_middle_finger'])}}"><i class="fa fa-check"> </i> 
						@else
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_middle_finger'])}}"><i class="fa fa-minus"> </i> 
						@endif
					</td>
					<td>
						@if($finger['right_ring_finger'])
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_ring_finger'])}}"><i class="fa fa-check"> </i> 
						@else
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_ring_finger'])}}"><i class="fa fa-minus"> </i> 
						@endif
					</td>
					<td>
						@if($finger['right_little_finger'])
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_little_finger'])}}"><i class="fa fa-check"> </i> 
						@else
							<a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_little_finger'])}}"><i class="fa fa-minus"> </i> 
						@endif
					</td>
				</tr>
			</tbody>
		</table>
	</div>
@stop
