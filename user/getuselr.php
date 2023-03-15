

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"tourism");
$sql="update sub_zobas set Mark=1  WHERE zoba_id = '".$q."'";
$result = mysqli_query($con,$sql);
                
	   ?>

	  
		
