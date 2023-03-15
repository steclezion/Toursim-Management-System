<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>


		<?php
$q = intval($_GET['q']);
	$Today = date('y:m:d');
	$new = date(' Y', strtotime($Today));
 include('dbcon.php');?>
 <div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary disabled">Months </button></label>
				<div class="controls">
			
					
	<?php

$sql="SELECT Distinct Month  FROM monthly_data_entry   where  (Year='".$q."' and Check_Status=1) ";
$sam=mysql_query($sql);
     ?>
	
<select name='Month' required onchange="showEsta(this.value)" >
	  
		<option value="" ></option>
	    <?php while($row_data=mysql_fetch_array($sam)){  ?>
		  
		<option value="<?php echo $row_data[0]; ?>"><?php echo $row_data[0]; ?> </option>
	               
					    
							 <?php 
						 
						 }  
						 ?>
						 
						   </select>
			
				</div>
			</div>

	         	
		
</body>
</html>