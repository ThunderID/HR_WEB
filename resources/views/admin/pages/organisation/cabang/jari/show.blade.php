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
				<form class="check" action="" method="post">
				<tr class="text-center">
					<td>
						<div class="checkbox checkbox-inline checkbox-styled">
							<label>	
								<input type="checkbox" class="thumb" data-checked-action="{{ route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_thumb']) }}" data-unchecked-action="{{ route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_thumb']) }}" @if($finger['left_thumb']) checked @endif>

							</label>
						</div>
						{{-- @if($finger['left_thumb']) --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_thumb'])}}"><i class="fa fa-check"> </i>  --}}
						{{-- @else --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_thumb'])}}"><i class="fa fa-minus"> </i>  --}}
						{{-- @endif --}}
					</td>
					<td>
						<div class="checkbox checkbox-inline checkbox-styled">
							<label>	
								<input type="checkbox" class="thumb" data-checked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_index_finger'])}}" data-unchecked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_index_finger'])}}" @if($finger['left_index_finger']) checked @endif>
							</label>
						</div>
						{{-- @if($finger['left_index_finger']) --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_index_finger'])}}"><i class="fa fa-check"> </i>  --}}
						{{-- @else --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_index_finger'])}}"><i class="fa fa-minus"> </i>  --}}
						{{-- @endif --}}
					</td>
					<td>
						<div class="checkbox checkbox-inline checkbox-styled">
							<label>	
								<input type="checkbox" class="thumb" data-checked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_middle_finger'])}}" data-unchecked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_middle_finger'])}}" @if($finger['left_middle_finger'])checked @endif>
							</label>
						</div>
						{{-- @if($finger['left_middle_finger']) --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_middle_finger'])}}"><i class="fa fa-check"> </i>  --}}
						{{-- @else --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_middle_finger'])}}"><i class="fa fa-minus"> </i>  --}}
						{{-- @endif --}}
					</td>
					<td>
						<div class="checkbox checkbox-inline checkbox-styled">
							<label>	
								<input type="checkbox" class="thumb" data-checked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_ring_finger'])}}" data-unchecked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_ring_finger'])}}" @if($finger['left_ring_finger'])checked @endif>
							</label>
						</div>
						{{-- @if($finger['left_ring_finger']) --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_ring_finger'])}}"><i class="fa fa-check"> </i>  --}}
						{{-- @else --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_ring_finger'])}}"><i class="fa fa-minus"> </i>  --}}
						{{-- @endif --}}
					</td>
					<td>
						<div class="checkbox checkbox-inline checkbox-styled">
							<label>	
								<input type="checkbox" class="thumb" data-checked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_little_finger'])}}" data-unchecked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_little_finger'])}}" @if($finger['left_little_finger'])checked @endif>
							</label>
						</div>
						{{-- @if($finger['left_little_finger']) --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'left_little_finger'])}}"><i class="fa fa-check"> </i>  --}}
						{{-- @else --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'left_little_finger'])}}"><i class="fa fa-minus"> </i>  --}}
						{{-- @endif --}}
					</td>
					<td>
						<div class="checkbox checkbox-inline checkbox-styled">
							<label>	
								<input type="checkbox" class="thumb" data-checked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_thumb'])}}" data-unchecked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_thumb'])}}" @if($finger['right_thumb'])checked @endif>
							</label>
						</div>
						{{-- @if($finger['right_thumb']) --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_thumb'])}}"><i class="fa fa-check"> </i>  --}}
						{{-- @else --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_thumb'])}}"><i class="fa fa-minus"> </i>  --}}
						{{-- @endif --}}
					</td>
					<td>
						<div class="checkbox checkbox-inline checkbox-styled">
							<label>	
								<input type="checkbox" class="thumb" data-checked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_index_finger'])}}" data-unchecked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_index_finger'])}}" @if($finger['right_index_finger'])checked @endif>
							</label>
						</div>
						{{-- @if($finger['right_index_finger']) --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_index_finger'])}}"><i class="fa fa-check"> </i>  --}}
						{{-- @else --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_index_finger'])}}"><i class="fa fa-minus"> </i>  --}}
						{{-- @endif --}}
					</td>
					<td>
						<div class="checkbox checkbox-inline checkbox-styled">
							<label>	
								<input type="checkbox" class="thumb" data-checked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_middle_finger'])}}" data-unchecked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_middle_finger'])}}" @if($finger['right_middle_finger'])checked @endif>
							</label>
						</div>
						{{-- @if($finger['right_middle_finger']) --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_middle_finger'])}}"><i class="fa fa-check"> </i>  --}}
						{{-- @else --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_middle_finger'])}}"><i class="fa fa-minus"> </i>  --}}
						{{-- @endif --}}
					</td>
					<td>
						<div class="checkbox checkbox-inline checkbox-styled">
							<label>	
								<input type="checkbox" class="thumb" data-checked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_ring_finger'])}}" data-unchecked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_ring_finger'])}}" @if($finger['right_ring_finger'])checked @endif>
							</label>
						</div>
						{{-- @if($finger['right_ring_finger']) --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_ring_finger'])}}"><i class="fa fa-check"> </i>  --}}
						{{-- @else --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_ring_finger'])}}"><i class="fa fa-minus"> </i>  --}}
						{{-- @endif --}}
					</td>
					<td>
						<div class="checkbox checkbox-inline checkbox-styled">
							<label>	
								<input type="checkbox" class="thumb" data-checked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_little_finger'])}}" data-unchecked-action="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_little_finger'])}}" @if($finger['right_little_finger'])checked @endif>
							</label>
						</div>
						{{-- @if($finger['right_little_finger']) --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'wrong' => 'right_little_finger'])}}"><i class="fa fa-check"> </i>  --}}
						{{-- @else --}}
							{{-- <a href="{{route('hr.branches.finger.store', ['branch_id' => $branch['id'], 'org_id' => $data['id'], 'finger' => $finger['id'], 'right' => 'right_little_finger'])}}"><i class="fa fa-minus"> </i>  --}}
						{{-- @endif --}}
					</td>
				</tr>
				</form>
			</tbody>
		</table>
	</div>
@stop
