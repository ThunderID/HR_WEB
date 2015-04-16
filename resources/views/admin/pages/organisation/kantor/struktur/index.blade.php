<div class="tab-pane" id="structure">
	<h3 class="text-light">Struktur Perusahaan</h3>
	<div class="col-md-12" style="padding-left:0px;padding-right:0px;">
		<table class="table no-margin">
			<thead>
				<tr>
					<th>Posisi</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($data['charts'] as $key => $value)
					<tr>
						<td class="col-sm-8">@for($i=1;$i<count(explode(',',$value['path']));$i++)&nbsp;&nbsp;&nbsp;@endfor <i class="fa fa-chevron-circle-right"></i>&nbsp;&nbsp;{{$value['name']}}</td>
						<td class="text-right col-sm-2">
							<a href="{{route('hr.organisation.charts.edit', [$data['id'], $value['id']])}}">
								Edit
							</a>				
						</td>
						<td class="text-right col-sm-2">
							<a href="{{route('hr.organisation.charts.show', [$data['id'], $value['id']])}}">
								Detail
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="card-actionbar">
			<div class="card-actionbar-row">
				<a class="btn btn-flat" href="{{route('hr.organisation.charts.create', ['id' => $data['id']]) }}">TAMBAH</a>
			</div>
		</div>
	</div>
</div>
