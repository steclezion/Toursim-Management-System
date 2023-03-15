<?php
include('dbcon.php');
$id=$_GET['id'];
mysql_query("delete  from  activity where Activity_Id='$id'")or die(mysql_error());
header('location:activity.php');
?>