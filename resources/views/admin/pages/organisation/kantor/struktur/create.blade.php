<div class="tab-pane" id="structure">
	<h3 class="text-light">Struktur Perusahaan</h3>
	<div class="col-md-12" style="padding-left:0px;padding-right:0px;">
		<div id="orgChartContainer">
		    <div id="orgChart" style="overflow:scroll;"></div>
		</div>
	</div>
</div>

	<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="add_title"></h4>
				</div>
				<form class="form-horizontal" role="form">
					<div class="modal-body">
						<div class="form-group">
							<div class="col-sm-3">
								<label for="name" class="control-label">Nama</label>
							</div>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" name="name" placeholder="Nama">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-3">
								<label for="min" class="control-label">Jumlah Minimum</label>
							</div>
							<div class="col-sm-9">
								<input name="min" id="min" class="form-control" placeholder="Minimum">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-3">
								<label for="ideal" class="control-label">Jumlah Ideal</label>
							</div>
							<div class="col-sm-9">
								<input name="ideal" id="ideal" class="form-control" placeholder="Ideal">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-3">
								<label for="max" class="control-label">Jumlah Maksimum</label>
							</div>
							<div class="col-sm-9">
								<input name="max" id="max" class="form-control" placeholder="Maksimum">
							</div>
						</div>	
						<div class="form-group">
							<input type="hidden" class="form-control" id="chart_id" name="chart_id">
						</div>
					</div>
					<div class="modal-footer" id="generated_button">
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="simpleModalLabel">Hapus Data</h4>
				</div>
				<div class="modal-body">
					<h4 class="modal-title" id="add_title"></h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal" onClick="delete_node();">Hapus</button>
				</div>
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
	<script type ="text/javascript">
	    var testData 	= {!!$structure!!};
	    var dt 			= testData;
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
	                generate_button('add');
	                $('#formModal').modal('show');
	            },
	            onDeleteNode: function(node){
	                $('h4#add_title').html('Apakah Anda yakin akan menghapus data ' + node.data.name);
	                $('#simpleModal').modal('show');
	                tmp_node_id = node.data.id;
	            },
	            onClickNode: function(node){
	                document.getElementById("chart_id").value 	= dt[node.data.id]['chart_id'];
	                document.getElementById("name").value 		= dt[node.data.id]['name'];
	                document.getElementById("min").value 		= dt[node.data.id]['min'];
	                document.getElementById("ideal").value 		= dt[node.data.id]['ideal'];
	                document.getElementById("max").value 		= dt[node.data.id]['max'];                
	                $('h4#add_title').html('Informasi Struktur Cabang ' + dt[node.data.id]['name']);
	                tmp_node_id = node.data.id;
	                parent_node = node.data.parent;
	                generate_button('edit');
	                $('#formModal').modal('show');
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
			        dt[node_ctr] = {name : nama, min : min, ideal : ideal, max : max, chart_id : result.id};
					alert(result.message);
				},
				error: function(xhr, Status, err, result) 
				{
					org_chart.deleteNode(node_ctr); 
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
			dt[tmp_node_id]	= {name : nama, min : min, ideal : ideal, max : max, chart_id : id};

			editdt 			= {id: id, name: nama, graph:tmp_node_id, graph_parent: parent_node, min_employee : min, ideal_employee : ideal, max_employee : max};
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
			        org_chart.startEdit(tmp_node_id, result.name);
				},
				error: function(xhr, Status, err, result) 
				{
					alert(result.message);
				}
				
			});
			clear_fields();
	    };

	    function delete_node(){
			deletedata 	= {id : dt[tmp_node_id]['chart_id']};
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
						org_chart.deleteNode(tmp_node_id); 
					}
					alert(result.message);
				},
				error: function(xhr, Status, err) 
				{
					alert('Data Tidak Terhapus !');
				}
			});
	    }

	    function generate_button(src){
	    	if(src == 'add'){
		    	document.getElementById('generated_button').innerHTML = '<button type="button" class="btn btn-primary" onClick="save_node();" data-dismiss="modal">Tambah</button>';
	    	}else if(src == 'edit'){
		    	document.getElementById('generated_button').innerHTML = '<button type="button" class="btn btn-primary" onClick="edit_node();" data-dismiss="modal">Edit</button>';
	    	}
	    }

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