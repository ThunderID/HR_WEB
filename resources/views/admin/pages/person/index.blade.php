@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row pb-10">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a href="{{route('hr.persons.create') }}" class='btn btn-raised btn-primary ink-reaction mt-10'>Create New</a>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form pull-right">
			{!! Form::open(['route' => ('hr.persons.index'), 'class' => 'form-inline', 'method' => 'get']) !!}
				<div class="form-group col-sm-9">
					<input type="text" class="form-control" name="q" style="width:100%">
					<label for="">Search</label>
				</div>
				<button class="btn btn-raised btn-default-light ink-reaction" type="submit">Search</button>
			{!! Form::close() !!}
		</div>
		
	</div>
	
	<div class="row">
		@foreach($data as $key => $value)
			@if($key%2==0 && $key!=0)
				</div>
				<div class="row">
			@endif
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-2 hbox-xs">
								<div class="hbox-column width-1 pt-5">
									<img class="img-circle img-responsive" alt="" @if($value['gender'] =='male') src="{{url('images/male.png')}}" @else src="{{url('images/female.png')}}" @endif></img>
								</div>
							</div>
							<div class="col-sm-10">
								<div class="clearfix">
									<p class="mt-0 mb-0 text-lg">{{$value['contacts'][1]['value']}}</p>
									<p class="mtm-15 mb-0 text-xl"><a href="{{ route('hr.persons.show' ,['id'=> $value['id']]) }}">{{$value['first_name'].' '.$value['middle_name'] .' '.$value['last_name']}}</a></p>
									<p class="mt-0 mb-0">{{$value['place_of_birth']}}, {{$value['date_of_birth']}}</p>
									<p class="mt-0 mb-0">{{$value['contacts'][0]['value']}}</p>
								</div>
							</div>
						</div>
					</div>
					<div class="card-actionbar">
						<div class="card-actionbar-row">
							<a href="{{ route('hr.persons.edit' ,['id'=> $value['id']]) }}" class="btn btn-flat btn-primary ink-reaction">EDIT</a>
							<a href="{{ route('hr.persons.show' ,['id'=> $value['id']]) }}" class="btn btn-flat btn-primary ink-reaction">LIHAT</a>
						</div>
				</div>
			</div>		
		</div>
		@endforeach
	</div>
	@if(count($data))
		@include('admin.helpers.pagination')
	@else
		<div class="row">
			<div class="col-sm-12 text-center">
				<p>Tidak ada data</p>
			</div>
		</div>
	@endif
@stop