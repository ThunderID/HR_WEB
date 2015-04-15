<div class="tab-pane" id="structure">
	<h3 class="text-light">Struktur Perusahaan</h3>
	<div class="card-body style-bright">
		<div class="row">
			<div class="col-xs-12">
				<h4  style="text-primary"id="add_title">Informasi</h4>
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
					<div class="col-md-2">
						<div class="form-group">
							<input type="hidden" class="form-control" id="chart_id" name="chart_id">
						</div>
					</div>	
				</div><!--end .row -->
			</div><!--end .col -->
		</div><!--end .row -->
		<div class="row">
			<div class="col-xs-12">
				<h4 style="text-primary">Hak Akses</h4>
				<div class="row">

				</div>
			</div>
		</div>
	</div><!--end .card-body -->
	<div class="card-actionbar">
		<div class="card-actionbar-row">
			<button type="button" onClick="save_node();" class="btn btn-flat btn-primary ink-reaction">Tambah</button>
			<button type="button" onClick="edit_node();" class="btn btn-flat btn-primary ink-reaction">Edit</button>
		</div><!--end .card-actionbar-row -->
	</div><!--end .card-actionbar -->
	<div class="col-md-12" style="padding-left:0px;padding-right:0px;">
		<div id="orgChartContainer">
		    <div id="orgChart" style="overflow:scroll;"></div>
		</div>
	</div>
</div>

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
	    var testData = {!!$structure!!};

	    var dt = testData;
	    var tmp_node_id = 1;

	    $(function(){
	        org_chart = $('#orgChart').orgChart({
	            data: testData,
	            showControls: true,
	            allowEdit: false,
	            onAddNode: function(node){ 
	            	clear_fields();
	                tmp_node_id = node.data.id;
	                $('h4#add_title').html('Tambah Informasi Struktur Cabang ' + node.data.name);
	            },
	            onDeleteNode: function(node)
	            {
	                deletedata 	= {id : dt[node.data.id-1]['chart_id']};
	                $.ajax({
						url : "{!!route('hr.organisation.charts.delete', [$data['id']])!!}", 
						type: "post", //form method
						data: deletedata,
						dataType:"json", //misal kita ingin format datanya brupa json
						beforeSend:function(){
							 $(".loading").html("Please wait....");
						},
						success:function(result)
						{
							if(result.is_delete)
							{
								log('Deleted node '+node.data.id);
								org_chart.deleteNode(node.data.id); 
							}
							alert(result.message);
						},
						error: function(xhr, Status, err) 
						{
							alert('Data Tidak Terhapus !');
						}
					});
	            },
	            onClickNode: function(node){
	                document.getElementById("chart_id").value 	= dt[node.data.id -1]['chart_id'];
	                document.getElementById("name").value 		= dt[node.data.id -1]['name'];
	                document.getElementById("min").value 		= dt[node.data.id -1]['min'];
	                document.getElementById("ideal").value 		= dt[node.data.id -1]['ideal'];
	                document.getElementById("max").value 		= dt[node.data.id -1]['max'];                
	                $('h4#add_title').html('Informasi Struktur Cabang ' + dt[node.data.id -1]['name']);
	                tmp_node_id = node.data.id-1;
	                parent_node = node.data.parent;
	            }
	        });
	    });

	    function save_node()
	    {
			var node_ctr 	= org_chart.newNode(tmp_node_id); 

			var nama 		= document.getElementById("name").value;
			var min 		= document.getElementById("min").value;
			var ideal 		= document.getElementById("ideal").value;
			var max 		= document.getElementById("max").value;

			savedata 		= {id: null, name: nama, graph:node_ctr, graph_parent: tmp_node_id, min_employee : min, ideal_employee : ideal, max_employee : max};
			$.ajax({

				url : "{!!route('hr.organisation.charts.store', $data['id'])!!}", 
				type: "post", //form method
				data: savedata,
				dataType:"json", //misal kita ingin format datanya brupa json
				beforeSend:function(){
					 $(".loading").html("Please wait....");
				},
				success:function(result)
				{
					org_chart.startEdit(node_ctr, result.name);
			        dt[tmp_node_id] = {name : nama, min : min, ideal : ideal, max : max, chart_id : result.id};
					alert(result.message);
				},
				error: function(xhr, Status, err, result) 
				{
					alert(result.message);
				}
				
			});
			clear_fields();
		}

	    function edit_node()
	    {
			var id 			= document.getElementById("chart_id").value;
			var nama 		= document.getElementById("name").value;
			var min 		= document.getElementById("min").value;
			var ideal 		= document.getElementById("ideal").value;
			var max 		= document.getElementById("max").value;
	        dt[tmp_node_id] = [nama, min, ideal, max];

			editdt 			= {id: id, name: nama, graph:tmp_node_id+1, graph_parent: parent_node, min_employee : min, ideal_employee : ideal, max_employee : max};
			$.ajax({

				url : "{!!route('hr.organisation.charts.store', $data['id'])!!}", 
				type: "post", //form method
				data: editdt,
				dataType:"json", //misal kita ingin format datanya brupa json
				beforeSend:function(){
					 $(".loading").html("Please wait....");
				},
				success:function(result)
				{
			        org_chart.startEdit(tmp_node_id+1, result.name);
				},
				error: function(xhr, Status, err, result) 
				{
					alert(result.message);
				}
				
			});
			clear_fields();
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