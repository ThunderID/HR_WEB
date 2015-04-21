@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<div class="card-head card-head-sm style-primary">
			<div class="col-md-12 pt-5 ">
				<a href="{{route('hr.organisation.branches.show', $branch_id)}}" class="btn btn-flat ink-reaction pull-left">
					<i class="md md-reply"></i> Kembali
				</a>
			</div>
		</div>
		<div class="card-body">
			@if($data['id'])
				<form class="form" role="form" action="{{route('hr.organisation.charts.update', [$branch_id, $data['id']])}}" method="post">
			@else
				<form class="form" role="form" action="{{route('hr.organisation.charts.store', [$branch_id])}}" method="post">
			@endif
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" id="path" name="path" value="{{$data['chart']['path']}}">
								@foreach($data_branch['data']['charts'] as $key => $value)
									<option value="{{$value['path']}}">{{$value['name']}}</option>
								@endforeach
							</select>
							<label for="path">Atasan</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">	
							<input type="text" class="form-control" id="grade" name="tag" value="{{$data['tag']}}">
							<label for="grade">Departemen</label>
						</div>				
					</div>				
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="name" name="name" value="{{$data['name']}}">
							<label for="name">Nama</label>
						</div>
					</div>
				</div><!--end .row -->
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" id="min_employee" name="min_employee" value="{{$data['min_employee']}}">
							<label for="min_employee">Jumlah Minimum Pegawai</label>
						</div>
					</div><!--end .col -->
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" id="ideal_employee" name="ideal_employee" value="{{$data['ideal_employee']}}">
							<label for="ideal_employee">Jumlah Ideal Pegawai</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" id="max_employee" name="max_employee" value="{{$data['max_employee']}}">
							<label for="max_employee">Jumlah Maksimum Pegawai</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="text" class="form-control" id="grade" name="grade" value="{{$data['grade']}}" Placehoder="(Biarkan kosong untuk departemen)">
							<label for="grade">Grade</label>
						</div>
					</div>
				</div>
				<div class="card-actionbar">
					<div class="card-actionbar-row">
						<a class="btn btn-flat" href="{{route('hr.organisation.branches.index')}}">BATAL</a>
						<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
					</div><!--end .card-actionbar-row -->
				</div><!--end .card-actionbar -->				
			</form>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
		@if ($data['id'])
			var preload_data = [];
			var id = "{{$data['chart']['path']}}";
			var text ="{{$data['chart']['name']}}";
			preload_data.push({ id: id, text: text});
			<?php $neighbor = $data['path'];?>
		@else
			var preload_data = [];
			<?php $neighbor = null;?>
		@endif
		$('#path').select2({
		    tokenSeparators: [",", " "],
			tags: [],
			minimumInputLength: 3,
			placeholder: "",
			maximumSelectionSize: 1,
			selectOnBlur: true,
		    ajax: {
		        url: "{{route('hr.ajax.chart',[$branch_id, $neighbor])}}",
		        dataType: 'json',
		        quietMillis: 500,
				data: function (term) {
				return {
				        term: term
				    };
				},
		        results: function (data) {
		            return {
		                results: $.map(data, function (item) {
		                    return {
		                        text: item.name,
		                        id: item.path,
		                    }			                        
		                })
		            };
		        },
		        query: function (query){
			    var data = {results: []};
			     
			    $.each(preload_data, function(){
			        if(query.term.length == 0 || this.text.toUpperCase().indexOf(query.term.toUpperCase()) >= 0 ){
			            data.results.push({id: this.id, text: this.text });
			        }
			    });

			    query.callback(data);
		        }
		    }
		});
        $('#path').select2('data', preload_data );
   </script>
@stop