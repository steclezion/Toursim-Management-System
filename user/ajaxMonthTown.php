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
$mt = intval($_GET['mt']);

 include('dbcon.php');

?>
		        <div class="control-group">
				<label class="control-label" for="inputPassword"><button type="button" class="btn btn-inverse disabled">To:</button></label>
				<div class="controls">
			
					
	<?php

$sql="SELECT month_no FROM month_tb  where month_no >= '".$mt."'";
$limit=mysql_query($sql);
     ?>
	
<select name="month2" required>
	  
		<option value="" ></option>
	    <?php while($month_limit=mysql_fetch_array($limit)) {  ?>
		  
		<option value="<?php echo $month_limit[0]; ?>"><?php echo $month_limit[0]; ?> </option>
	               
					    
							 <?php 
						 
						 }  
						 ?>
						 
						   </select>
			
				</div>
			</div>
</body>
</html>