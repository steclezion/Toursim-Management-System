<?php
include('dbcon.php');

$id=$_GET['id'];

mysql_query("delete from establishment_entry where  establishment_id='$id'") or die(mysql_error());

header('location:Establishment.php');
?>