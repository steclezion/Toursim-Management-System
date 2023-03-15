<?php
include('dbcon.php');
$id=$_GET['id'];
mysql_query("delete  from  sub_zobas where sub_zoba_Id='$id'")or die(mysql_error());
header('location:sub_zoba.php');
?>