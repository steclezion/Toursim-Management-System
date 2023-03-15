<?php
  include("dbcon.php");
	if (isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=sha1($_POST['password']);
	$firstname=$_POST['firstname'];
		$Middle_Name=$_POST['Middle_Name'];
	$lastname=$_POST['lastname'];
    $Tel=$_POST['Tel'];
    $role=$_POST['role'];

	$sam=mysql_query("insert into users (First_name,Middle_Name,Last_Name,Tel_Number,user_Name,Password,Time_Created,Role) values('$firstname','$Middle_Name','$lastname','$Tel','$username','$password',NOW(),'$role')")or die(mysql_error());
	if(isset($sam))
	{
		
		header("location:users.php");
	}
	}
	?>