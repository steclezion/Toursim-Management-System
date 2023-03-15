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
$k = intval($_GET['k']);

 include('dbcon.php');

$sql="update sub_zobas set Mark=0";
$result = mysql_query($sql);
$sql1="update sub_zobas set Mark=1  WHERE zoba_id = '".$k."'";
$result1 = mysql_query($sql1);
 
							
								


?>
		<div class="control-group">
				<label class="control-label" for="inputEmail">Establishment Town</label>
				<div class="controls">
			
					
	<?php

$sql="SELECT * FROM sub_zobas  where zoba_id = '".$k."'";
$sam=mysql_query($sql);
     ?>
	
<select name='town' required  >
	  
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