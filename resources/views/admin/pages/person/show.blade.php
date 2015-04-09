@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<header style="padding-top:5px;padding-bottom:5px">
						<a href="{{route('hr.persons.index')}}" class="btn btn-flat ink-reaction">
							<i class="md md-reply"></i> Back
						</a>
					</header>
				</div>
				<div class="card-body pt-10 pb-0">
					<div class="row">
						<div class="col-sm-10">
							<div class="margin-bottom-xxl row">
								<div class="col-sm-3 col-md-3">
									<img class="img-circle size-3" src="{{url('images/male.png')}}" alt="" />
								</div>
								<div class="col-sm-9 col-md-9">
									<h1 class="text-light no-margin">{{$data['prefix_title'].' '.$data['first_name'].' '.$data['middle_name'].' '.$data['last_name'].' '.$data['suffix_title']}}</h1>
									<div class="form-horizontal">
										<div class="row pt-10 no-margin">
											<div class="form-group">
												<div class="col-sm-4">
													<label class="text-lg text-light">Nama panggilan</label>
												</div>
												<div class="col-sm-8">
													<label class="text-lg text-light">{{$data['nick_name']}}</label>
												</div>
											</div>
										
											<div class="form-group">
												<div class="col-sm-4 col-md-4">
													<label class="text-lg text-light">Tempat & tanggal lahir</label>
												</div>
												<div class="col-sm-8 col-md-8 pr-0">
													<label class="text-lg text-light">{{$data['place_of_birth']}}, {{$data['date_of_birth']}}</label>
												</div>
											</div>
										
											<div class="form-group">
												<div class="col-sm-4 col-md-4">
													<label class="text-lg text-light">Jenis kelamin</label>
												</div>
												<div class="col-sm-8 col-md-8">
													<label class="text-lg text-light">{{$data['gender']}}</label>
												</div>
											</div>

											<div class="form-group">
												<div class="col-sm-4 col-md-4">
													<label class="text-lg text-light">Status Pernikahan</label>
												</div>
												<div class="col-sm-8 col-md-8">
													<label class="text-lg text-light">{{$data['marital_status']}}</label>
												</div>
											</div>

											<div class="form-group">
												<div class="col-sm-4 col-md-4">
													<label class="text-lg text-light">Kewarganegaraan</label>
												</div>
												<div class="col-sm-8 col-md-8">
													<label class="text-lg text-light">{{$data['nationality']}}</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>				
					</div>
				</div>
			</div>	
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<header>
						Pekerjaan
					</header>
				</div>
				<div class="card-body height-5">
					@foreach($data['works'] as $key => $value)
					<div class="clearfix">
						<p class="mtm-5 mb-0 text-xl">{{$value['branch']['organisation']['name']}}</p>
						<p class="mtm-5 mb-0 text-lg opacity-50">{{$value['branch']['name']}}</p>
						<p class="mt-0 mb-0 opacity-75">{{ucfirst($value['name'])}}</p>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-head card-head-sm style-primary">
					<header >
						Kontak
					</header>
				</div>
				<div class="nano height-5">
					<div class="nano-content">
						<div class="card-body no-padding">
							<ul class="list">
								@foreach($data['contacts'] as $key => $value)
									<li class="tile">
										<div class="tile-content ink-reaction">
											<div class="tile-text">
												{{$value['item']}}
												<small>
													{{$value['value']}}
												</small>
											</div>
										</div>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="nano-pane">
						<div class="nano-slider"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="card card-underline">
				<div class="card-head card-head-sm style-primary">
					<header >
						Document
					</header>
				</div>
				<div class="nano height-5">
					<div class="nano-content">
						<div class="card-body no-padding">
							<ul class="list">
								<?php $doc = [];?>
								@foreach($data['documents'] as $key => $value)
									@if(!in_array($value['pivot']['document_id'], $doc))
										<li class="tile">
											<a href="{{route('hr.person.document.show', ['person_id' => $data['id'], 'id' => $value['pivot']['document_id']])}}" class="tile-content ink-reaction">
												<div class="tile-icon">
													<i class="fa fa-file-text-o"></i>
												</div>
												<div class="tile-text">
													{{$value['name']}}
												</div>
											</a>
										</li>
										<?php $doc[] = $value['pivot']['document_id'];?>
									@endif
								@endforeach
							</ul>
						</div>
					</div>
					<div class="nano-pane">
						<div class="nano-slider"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card card-underline">
				<div class="card-head card-head-sm style-primary">
					<header >
						Kerabat
					</header>
				</div>
				<div class="nano height-5">
					<div class="nano-content">
						<div class="card-body no-padding">
							<ul class="list">
								@foreach($data['relatives'] as $key => $value)
									<li class="tile">
										<a href="{{route('hr.persons.show', [$value['id']])}}" class="tile-content ink-reaction">
											<div class="tile-icon">
												@if($value['gender']=='male')
													<img src="{{url('images/male.png')}}" alt="">
												@else
													<img src="{{url('images/female.png')}}" alt="">
												@endif
											</div>
											<div class="tile-text">
												{{$value['first_name'].' '.$value['last_name']}}
												<small>{{$value['pivot']['relationship']}}</small>
											</div>
										</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="nano-pane">
						<div class="nano-slider"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">

	</script>
@stop