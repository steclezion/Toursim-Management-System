<!DOCTYPE html>
<html>
<head>
<style>
table { width: 100%; border-collapse: collapse;}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>


<?php
$w= intval($_GET['w']);

 include('dbcon.php');
	$Today = date('y:m:d');
	$new = date(' Y', strtotime($Today));
?>		
		
		
		
		<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-inverse	disabled">Until-- Month </button></label>
				<div class="controls">
			
					
	<?php

$sql="SELECT Distinct Month FROM monthly_data_entry where Month >='$w' order by Month ASC ";
$sam=mysql_query($sql);
     ?>
	
<select name='Month_two' required onchange="show(this.value)" >
	  
		<option value="" ></option>
	    <?php while($row_sub_zoba=mysql_fetch_array($sam))
		{  ?>
		  
		<option value="<?php echo $row_sub_zoba[0]; ?>"><?php echo $row_sub_zoba[0]; ?> </option>
	               
					    
							 <?php 
						 
	    }  
						 ?>
						 
						   </select>  
			
				</div>
			</div>
			
		<div  class="control"  id="txtHintPol"><b>.</b></div>
</body>
</html>