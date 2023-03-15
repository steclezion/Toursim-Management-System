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
$p= intval($_GET['p']);

 include('dbcon.php');
	$Today = date('y:m:d');
	$new = date(' Y', strtotime($Today));
?>		
		
		
		
		<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-inverse	disabled"> Starting from Month </button></label>
				<div class="controls">
			
					
	<?php

$sql="SELECT Distinct Month FROM monthly_data_entry order by Month ASC";
$sam=mysql_query($sql);
     ?>
	
<select name='Month_one' required onchange="showRam(this.value)" >
	  
		<option value="" ></option>
	    <?php while($row_sub_zoba=mysql_fetch_array($sam))
		{  ?>
		  
		<option value="<?php echo $row_sub_zoba[0]; ?>"><?php echo $row_sub_zoba[0]; ?> </option>
	               
					    
							 <?php 
						 
	    }  
						 ?>
						 
						   </select>  <div class="btn btn-inverse">  TO </div>
			
				</div>
			</div>
			
		<div  class="control"  id="ass"><b>.</b></div>
</body>
</html>