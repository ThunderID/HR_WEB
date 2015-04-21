	<div class="card-actionbar">
		<a class="btn btn-primary pull-right" href="{{route('hr.organisation.charts.create', ['id' => $data['id']]) }}">TAMBAH</a>
	</div>
	<div class="clearfix">&nbsp;</div>
	@foreach($data['charts'] as $key => $value)
		<div class="row">
			<div class="col-sm-9">@for($i=1;$i<count(explode(',',$value['path']));$i++)&nbsp;&nbsp;&nbsp;@endfor <i class="fa fa-chevron-circle-right"></i>&nbsp;&nbsp;{{$value['name']}}</div>
			<div class="text-right col-sm-1">
				<a href="#" data-toggle="modal" data-target="#del_modal2">
					<i class="fa fa-trash"></i>
				</a>
			</div>
			<div class="text-right col-sm-1">
				<a href="{{route('hr.organisation.charts.edit', [$data['id'], $value['id']])}}">
					<i class="fa fa-pencil"></i>
				</a>
			</div>
			<div class="text-right col-sm-1">
				<a href="{{route('hr.organisation.charts.show', [$data['id'], $value['id']])}}">
					<i class="fa fa-eye"></i>
				</a>
			</div>
		</div>
	@endforeach
