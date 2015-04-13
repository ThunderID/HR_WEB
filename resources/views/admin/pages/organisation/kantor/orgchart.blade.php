<script type="text/javascript">
	var labelType, useGradients, nativeTextSupport, animate;

	(function() {
	  var ua = navigator.userAgent,
		  iStuff = ua.match(/iPhone/i) || ua.match(/iPad/i),
		  typeOfCanvas = typeof HTMLCanvasElement,
		  nativeCanvasSupport = (typeOfCanvas == 'object' || typeOfCanvas == 'function'),
		  textSupport = nativeCanvasSupport 
			&& (typeof document.createElement('canvas').getContext('2d').fillText == 'function');
	  //I'm setting this based on the fact that ExCanvas provides text support for IE
	  //and that as of today iPhone/iPad current text support is lame
	  labelType = (!nativeCanvasSupport || (textSupport && !iStuff))? 'Native' : 'HTML';
	  nativeTextSupport = labelType == 'Native';
	  useGradients = nativeCanvasSupport;
	  animate = !(iStuff || !nativeCanvasSupport);
	})();


	function init(){
		//init data
		var json = {
			id: "node02",
			name: "CEO",
			data: {},
			children: [{
				id: "node13",
				name: "HRD",
				data: {},
				children: [{
					id: "node24",
					name: "Akutansi",
					data: {},
					children: [{
						id: "node35",
						name: "Sekretaris",
						data: {}
					}, {
						id: "node37",
						name: "Pengembangan",
						data: {},
						children: [{
							id: "node48",
							name: "Supervisor Legal",
							data: {},
							children: []
						}, {
							id: "node49",
							name: "Departemen Pengadaan",
							data: {},
							children: []
						}, {
							id: "node410",
							name: "Departemen Legal",
							data: {},
							children: []
						}, {
							id: "node411",
							name: "Departemen Hubungan Luar",
							data: {},
							children: []
						}]
					}, {
						id: "node312",
						name: "Lapangan",
						data: {},
						children: [{
							id: "node413",
							name: "Pengeboran",
							data: {},
							children: []
						}]
					}]
				}, {
					id: "node222",
					name: "IT",
					data: {},
					children: [{
						id: "node323",
						name: "Database",
						data: {},
						children: [{
							id: "node424",
							name: "Oracle",
							data: {},
							children: []
						}]
					}]
			}, {
				id: "node125",
				name: "Departemen Riset Pengembangan Organisasi dan Kerjasama",
				data: {},
				children: [{
					id: "node226",
					name: "Pangan dan Makan",
					data: {},
					children: []
					}, {
						id: "node330",
						name: "Riset",
						data: {},
						children: [{
							id: "node431",
							name: "Teknologi",
							data: {},
							children: []
						}]
					}, {
						id: "node332",
						name: "Pengembangan",
						data: {},
						children: [{
							id: "node433",
							name: "Tolak Ukur",
							data: {},
							children: []
						}]
					}]
				}, {
					id: "node237",
					name: "Sandang dan Pangan",
					data: {},
					children: [{
						id: "node338",
						name: "Sandang",
						data: {},
						children: []
					}, {
						id: "node342",
						name: "Pangan",
						data: {},
						children: []
					}]
				}, {
					id: "node258",
					name: "Dirut",
					data: {},
					children: [{
						id: "node359",
						name: "Kepala Bagian",
						data: {},
						children: [{
							id: "node460",
							name: "Unit Laka",
							data: {},
							children: []
						}, {
							id: "node461",
							name: "Unit Pencegahan",
							data: {},
							children: []
						}, {
							id: "node462",
							name: "Unit Penanganan",
							data: {},
							children: []
						}, {
							id: "node463",
							name: "Unit Ganti Rugi",
							data: {},
							children: []
						}]
					}]
				}]
			}, {
				id: "node1130",
				name: "Manager",
				data: {},
				children: [{
					id: "node2131",
					name: "Supervisor",
					data: {},
					children: [{
						id: "node3132",
						name: "Kepala Cabang",
						data: {},
						children: [{
							id: "node4133",
							name: "Kepala Gudang",
							data: {},
							children: []
						}, {
							id: "node4134",
							name: "Kepala Pengadaan",
							data: {},
							children: []
						}, {
							id: "node4135",
							name: "Kepala Riset",
							data: {},
							children: []
						}, {
							id: "node4136",
							name: "Kepala Kehadiran",
							data: {},
							children: []
						}, {
							id: "node4137",
							name: "Kepala Training",
							data: {},
							children: []
						}]
					}]
				}, {
					id: "node2138",
					name: "Akuntasi",
					data: {},
					children: [{
						id: "node3139",
						name: "Kepala Teller",
						data: {},
						children: [{
							id: "node4140",
							name: "Teller",
							data: {},
							children: []
						}, {
							id: "node4141",
							name: "Teller",
							data: {},
							children: []
						}]
					}]
				}]
			}]
		};
		//end
		//init Spacetree
		//Create a new ST instance
		var st = new $jit.ST({
			//id of viz container element
			injectInto: 'orgchart',
			//set duration for the animation
			duration: 400,
			//set animation transition type
			transition: $jit.Trans.Quart.easeInOut,
			//set distance between node and its children
			levelDistance: 50,
			//enable panning
			Navigation: {
			  enable:true,
			  panning:true
			},
			//set node and edge styles
			//set overridable=true for styling individual
			//nodes or edges
			Node: {
				height: 70,
				width: 210,
				type: 'rectangle',
				color: '#90CAF9',
				overridable: true
			},
			
			Edge: {
				type: 'line',
				overridable: true
			},
			
			
			//This method is called on DOM label creation.
			//Use this method to add event handlers and styles to
			//your node.
			onCreateLabel: function(label, node){
				label.id = node.id;            
				label.innerHTML = node.name;
				label.onclick = function(){
					
					  st.onClick(node.id);
					
				};
				//set label styles
				var style = label.style;
				style.width = 210 + 'px';
				style.height = 70 + 'px';            
				style.cursor = 'pointer';
				style.color = '#fff';
				style.fontSize = '1.3em';
				style.textAlign= 'center';
				style.lineHeight = '20px';
			},
			
			//This method is called right before plotting
			//a node. It's useful for changing an individual node
			//style properties before plotting it.
			//The data properties prefixed with a dollar
			//sign will override the global node style properties.
			onBeforePlotNode: function(node){
				//add some color to the nodes in the path between the
				//root node and the selected node.
				if (node.selected) {
					node.data.$color = "#2A8AEA";
				}
				else {
					delete node.data.$color;
					//if the node belongs to the last plotted level
					if(!node.anySubnode("exist")) {
						//count children number
						var count = 0;
						node.eachSubnode(function(n) { count++; });
						//assign a node color based on
						//how many children it has
						node.data.$color = ['#90CAF9', '#90CAF9', '#90CAF9', '#90CAF9', '#90CAF9', '#90CAF9'][count];                    
					}
				}
			},
			
			//This method is called right before plotting
			//an edge. It's useful for changing an individual edge
			//style properties before plotting it.
			//Edge data proprties prefixed with a dollar sign will
			//override the Edge global style properties.
			onBeforePlotLine: function(adj){
				if (adj.nodeFrom.selected && adj.nodeTo.selected) {
					adj.data.$color = "#90CAF9";
					adj.data.$lineWidth = 3;
				}
				else {
					delete adj.data.$color;
					delete adj.data.$lineWidth;
				}
			}
		});
		// #FFF875, #AA9A9A, #DE9D9C, #9A9A9A, #CB9B9A, #BB9B9B, #2A8AEA
		//load json data
		st.loadJSON(json);
		//compute node positions and layout
		st.compute();
		//optional: make a translation of the tree
		st.geom.translate(new $jit.Complex(-200, 0), "current");
		//emulate a click on the root node.
		st.onClick(st.root);
		//end
		

	}
</script>