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
$dd = intval($_GET['dd']);

 include('dbcon.php');

$sqld="update sub_zobas set Mark=0";
$resultd = mysql_query($sqld);
$sql1d="update sub_zobas set Mark=1  WHERE zoba_id = '".$dd."'";
$result1d = mysql_query($sql1d);

?>
		       
                <div class="control-group">
				<label class="control-label" for="inputPassword"><button type="button" class="btn btn-inverse disabled">Establishment Town</button></label>
				<div class="controls">
			
					
	<?php

$sqld="SELECT * FROM sub_zobas where zoba_id = '".$dd."'";
$samd=mysql_query($sqld);
     ?>
	
<select name="estabtown" required>
	  
		<option value="" ></option>
	    <?php while($row_sub_zobad=mysql_fetch_array($samd)) {  ?>
		  
		<option value="<?php echo $row_sub_zobad[1]; ?>"><?php echo $row_sub_zobad[1]; ?> </option>
	               
					    
							 <?php 
						 
						 }  
						 ?>
						 
						   </select>
			
				</div>
			</div>
</body>
</html>