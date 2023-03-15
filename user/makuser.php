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
$r = intval($_GET['r']);

 include('dbcon.php');

?>
		        <div class="control-group">
				<label class="control-label" for="inputPassword"><button type="button" class="btn btn-inverse disabled">Establishment Town</button></label>
				<div class="controls">
			
					
	<?php

$sql="SELECT * FROM sub_zobas  where zoba_id = '".$r."'";
$sam=mysql_query($sql);
     ?>
	
<select name="estabtown" required>
	  
		<option value="" ></option>
	    <?php while($row_sub_zoba=mysql_fetch_array($sam)) {  ?>
		  
		<option value="<?php echo $row_sub_zoba[1]; ?>"><?php echo $row_sub_zoba[1]; ?> </option>
	               
					    
							 <?php 
						 
						 }  
						 ?>
						 
						   </select>
			
				</div>
			</div>
</body>
</html>