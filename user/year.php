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
$q = intval($_GET['q']);
session_start();
$_SESSION['year_t']=$q ;
 include('dbcon.php');
	$Today = date('y:m:d');
	$new = date(' Y', strtotime($Today));
?>		
		
		<div class="control-group">
		<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary disabled">Month</button></label>
				<div class="controls">
					<select name="Month" required onchange="showUser(this.value)">
					<option value=""> </option>
				<?php

$sql="SELECT Distinct Month FROM monthly_data_entry  where (Year='$q' and Check_Status=0) order by Month";
$sam=mysql_query($sql);
if(isset($sam)){

     ?>

	    <?php while($row_sub_zoba=mysql_fetch_array($sam)) {  ?>
		  
		<option value="<?php echo $row_sub_zoba[0]; ?>"><?php echo $row_sub_zoba[0]; ?> </option>
	               
					    
							 <?php 
		
						 }  
}
else { ?> 		<option value=""><?php  echo " Desired Month cant be founMonth"; }unset_sesssion();?> </option>
						
						
				
				</select>
				</div>
					
			</div>
		
		