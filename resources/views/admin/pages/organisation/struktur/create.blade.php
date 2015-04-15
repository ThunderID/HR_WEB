@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		<form class="form" role="form" action="#" method="post">
			<div class="card-head card-head-sm style-primary">
				<div class="col-md-12 pt-5 ">
					<div class="col-md-12">
						<div class="row">
							<a href="{{route('hr.organisation.branches.index')}}" class="btn btn-flat ink-reaction pull-left">
								<i class="md md-reply"></i> Kembali
							</a>
							<a href="{{route('hr.organisation.branches.delete', [$data['id']])}}" class="btn btn-flat ink-reaction pull-right">
								<i class="fa fa-save"></i> Simpan
							</a>
						</div>
					</div>
				</div>
			</div>		

			<div class="card-body style-bright">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name">
									<label for="name">Nama</label>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<input type="text" class="form-control" id="min" name="min">
									<label for="min">Jumlah Minimum</label>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<input type="text" class="form-control" id="ideal" name="ideal">
									<label for="ideal">Jumlah Ideal</label>
								</div>
							</div>	
							<div class="col-md-2">
								<div class="form-group">
									<input type="text" class="form-control" id="max" name="max">
									<label for="max">Jumlah Maksimum</label>
								</div>
							</div>	
						</div><!--end .row -->
					</div><!--end .col -->
				</div><!--end .row -->
			</div><!--end .card-body -->
			<!-- END DEFAULT FORM ITEMS -->

			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<button type="button" onClick="save_node();" class="btn btn-flat btn-primary ink-reaction">Tambah</button>
					<button type="button" onClick="edit_node();" class="btn btn-flat btn-primary ink-reaction">Edit</button>
					<button type="button"  onClick="show_node();" class="btn btn-flat btn-primary ink-reaction">Show</button>					
				</div><!--end .card-actionbar-row -->
			</div><!--end .card-actionbar -->
		</form>
		<div class="col-md-12" style="padding-left:0px;padding-right:0px;">
			<div id="orgChartContainer">
			    <div id="orgChart" style="overflow:scroll;"></div>
			</div>
		</div>
	</div>
@stop

@section('css')
	{!! HTML::style('css/base.css')!!}
	{!! HTML::style('css/spacetree.css')!!}
    {!! HTML::style('css/org-chart/jquery.orgchart.css')!!}
    <style type="text/css">
	    #orgChart{
	        width: auto;
	        height: 500px;
	    }

	    #orgChartContainer{
	        height: 500px;
	        overflow: auto;
	        background: #eee;
	    }
    </style>    
@stop

@section('js')
	{!! HTML::script('js/jit.min.js')!!}
    {!! HTML::script('js/jquery.orgchart.js')!!}
	<script type="text/javascript">
		$(document).ready(function () {
			$('.oc').click(function () {
				document.getElementById('orgc').innerHTML = '<div id="orgchart"></div>';
				init();
			})
		});

	    var testData = [
	        {id: 1, name: 'Acme Organization', parent: 0}
	    ];

	    var dt = [];
	    var tmp_node_id = 0;

	    $(function(){
	        org_chart = $('#orgChart').orgChart({
	            data: testData,
	            showControls: true,
	            allowEdit: false,
	            onAddNode: function(node){ 
	            	clear_fields();
	                tmp_node_id = node.data.id;
	                $('h4#add_title').html('Tambah Struktur Cabang ' + node.data.name);
	            },
	            onDeleteNode: function(node){
	                log('Deleted node '+node.data.id);
	                org_chart.deleteNode(node.data.id); 
	            },
	            onClickNode: function(node){
	                document.getElementById("name").value = dt[node.data.id][0];
	                document.getElementById("min").value = dt[node.data.id][1];
	                document.getElementById("ideal").value = dt[node.data.id][2];
	                document.getElementById("max").value = dt[node.data.id][3];                
	                $('h4#add_title').html('Edit Struktur Cabang ' + dt[node.data.id][0]);
	                tmp_node_id = node.data.id;
	            }
	        });
	    });

	    function save_node(){
	        var node_ctr = org_chart.newNode(tmp_node_id); 

	        var nama = document.getElementById("name").value;
	        var min = document.getElementById("min").value;
	        var ideal = document.getElementById("ideal").value;
	        var max = document.getElementById("max").value;

	        org_chart.startEdit(node_ctr, nama);
	        dt[node_ctr] = [nama, min, ideal, max];

	        clear_fields();
	        // testData[node_ctr-1].name = document.getElementById("name").value;
	    };    

	    function edit_node(){
	        var nama = document.getElementById("name").value;
	        var min = document.getElementById("min").value;
	        var ideal = document.getElementById("ideal").value;
	        var max = document.getElementById("max").value;

	        org_chart.startEdit(tmp_node_id, nama);
	        dt[tmp_node_id] = [nama, min, ideal, max];
			clear_fields();
	    };

	    function show_node(){
	        var asd = org_chart.getData();
	        console.log(asd);
	    };

	    function clear_fields(){
	        document.getElementById("name").value = '';
	        document.getElementById("min").value = '';
	        document.getElementById("ideal").value = '';
	        document.getElementById("max").value = '';     
	        $('h4#add_title').html('');
	    };
	    
	    // just for example purpose
	    function log(text){
	        $('#consoleOutput').append('<p>'+text+'</p>')
	    }
	    
	    function logs(updt){
	        dt = dt + updt;
	    }

	</script>
@stop