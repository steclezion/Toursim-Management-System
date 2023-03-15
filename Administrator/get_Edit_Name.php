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
	$Today = date('y:m:d');
	$new = date(' Y', strtotime($Today));
 include('dbcon.php');

$sql="SELECT Establishment_Name FROM establishment_entry   where  (Establishment_id='".$q."') ";
$sam=mysql_query($sql);
$row=mysql_fetch_array($sam);
     ?>	

			<div class="control-group">
				<div class="controls">
				<button name="samino" type="submit" class="alert badge-inverse"><i class="icon-save icon-large"></i>&nbsp; Edit Selected Establishment(<b style="color:RED"><?php echo $row[0];?></b>)</button>
				</div>
			</div>

</body>
</html>