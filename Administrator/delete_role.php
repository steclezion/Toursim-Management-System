<?php
include('dbcon.php');

$id=$_GET['id'];

mysql_query("delete from roles where  id='$id'") or die(mysql_error());

header('location:roles.php');
?>