<script type="text/javascript">
	function col_justify(col1,col2,col3){
		var h_col1 = document.getElementById(col1).clientHeight;
		var h_col2 = document.getElementById(col2).clientHeight;
		var h_col3 = document.getElementById(col3).clientHeight;
		var rslt = 0;

		if(h_col1 > h_col2 && h_col1 > h_col3){
			rslt = h_col1;
		}else if(h_col2 > h_col1 && h_col2 > h_col3){
			rslt = h_col2;
		}else if(h_col3 > h_col1 && h_col3 > h_col2){
			rslt = h_col3;
		}

		document.getElementById(col1).style.height = rslt;
		document.getElementById(col2).style.height = rslt;
		document.getElementById(col3).style.height = rslt;
	}
</script>