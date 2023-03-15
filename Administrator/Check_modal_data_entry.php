	
	
	<?php
	if (isset($_POST['sub'])){
		
	$Month=$_POST['Month'];
	$year=$_POST['year'];
	$Establishment_id=$_POST['Establishment_id'];
		session_start();
	$_SESSION['Establishment']=$Establishment_id;
	$_SESSION['Active']='active';
	$_SESSION['ActiveG']='empty';
	$_SESSION['ActiveE']='empty';
	$_SESSION['ActiveRE'] = 'empty';
$_SESSION['year']=$year;
$_SESSION['Month']=$Month;
	header("location:monthly_entry.php");
	}
	?>