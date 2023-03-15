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
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary disabled">Establishment ID </button></label>
				<div class="controls">
			
					
	<?php

$sql="SELECT Establishment_id FROM monthly_data_entry  where  (Month='".$p."' AND Check_Status=1 ) order by Establishment_id ASC";
$sam=mysql_query($sql);
     ?>
	
<select name='Establishment_id' required onchange="showEstablishment_Name(this.value)" >
	  
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