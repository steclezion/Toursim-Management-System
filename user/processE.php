 <?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include("dbcon.php");?>
<?php
if($_GET['id'] and $_GET['NR_Guest_data'])
{  $year=$_SESSION['year_E'];
    $Month=$_SESSION['Month_E'];
	$Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['id'];
	$NR_Guest_data = $_GET['NR_Guest_data'];
	echo $id.$NR_Guest_data;
	if(mysql_query("update monthly_data_entry set NR_Guest='$NR_Guest_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	{
	echo 'success';
    }
}

if($_GET['Offered_Rooms'] and $_GET['Offered_Rooms_data'])
{  $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['Offered_Rooms'];
	$Establishment_Id_p=$_SESSION['Establishment_E'];
	$Offered_Rooms_data = $_GET['Offered_Rooms_data'];
	if(mysql_query("update monthly_data_entry  set Offered_Rooms='$Offered_Rooms_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['Offered_Beds'] and $_GET['Offered_Beds_data'])
{  $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['Offered_Beds'];
	$Offered_Beds_data = $_GET['Offered_Beds_data'];
	if(mysql_query("update monthly_data_entry  set Offered_Beds='$Offered_Beds_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['Unoffered_Rooms'] and $_GET['Unoffered_Rooms_data'])
{ $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['Unoffered_Rooms'];
	$Unoffered_Rooms_data = $_GET['Unoffered_Rooms_data'];
	if(mysql_query("update monthly_data_entry  set Unoffered_Rooms='$Unoffered_Rooms_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['Unoffered_Beds'] and $_GET['Unoffered_Beds_data'])
{  $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
   $id = $_GET['Unoffered_Beds'];
	$Unoffered_Beds_data = $_GET['Unoffered_Beds_data'];
	if(mysql_query("update monthly_data_entry  set Unoffered_Beds='$Unoffered_Beds_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['R_NewGuest'] and $_GET['R_NewGuest_data'])
{  $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['R_NewGuest'];
	$R_NewGuest_data = $_GET['R_NewGuest_data'];
	if(mysql_query("update monthly_data_entry  set R_NewGuest='$R_NewGuest_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['Rooms_Occupied'] and $_GET['Rooms_Occupied_data'])
{  $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['Rooms_Occupied'];
	$Rooms_Occupied_data = $_GET['Rooms_Occupied_data'];
	if(mysql_query("update monthly_data_entry  set Rooms_Occupied='$Rooms_Occupied_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['TNR_Guest'] and $_GET['TNR_Guest_data'])
{  $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['TNR_Guest'];
	$TNR_Guest_data = $_GET['TNR_Guest_data'];
	if(mysql_query("update monthly_data_entry  set TNR_Guest='$TNR_Guest_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['TR_Guest'] and $_GET['TR_Guest_data'])
{   $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['TR_Guest'];
	$TR_Guest_data = $_GET['TR_Guest_data'];
	if(mysql_query("update monthly_data_entry  set TR_Guest='$TR_Guest_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['Total_Guest'] and $_GET['Total_Guest_data'])
{   $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['Total_Guest'];
	$Total_Guest_data = $_GET['Total_Guest_data'];
	if(mysql_query("update monthly_data_entry  set Total_Guest='$Total_Guest_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['NRB_Revenue'] and $_GET['NRB_Revenue_data'])
{   $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['NRB_Revenue'];
	$NRB_Revenue_data = $_GET['NRB_Revenue_data'];
	if(mysql_query("update monthly_data_entry  set NRB_Revenue='$NRB_Revenue_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['RB_Revenue'] and $_GET['RB_Revenue_data'])
{   $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['RB_Revenue'];
	$RB_Revenue_data = $_GET['RB_Revenue_data'];
	if(mysql_query("update monthly_data_entry  set RB_Revenue='$RB_Revenue_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['FB_Revenue'] and $_GET['FB_Revenue_data'])
{  $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['FB_Revenue'];
	$FB_Revenue_data = $_GET['FB_Revenue_data'];
	if(mysql_query("update monthly_data_entry  set FB_Revenue='$FB_Revenue_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['AlRevenue'] and $_GET['AlRevenue_data'])
{  $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['AlRevenue'];
	$AlRevenue_data = $_GET['AlRevenue_data'];
	if(mysql_query("update monthly_data_entry  set AlRevenue='$AlRevenue_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['HotRevenue'] and $_GET['HotRevenue_data'])
{  $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['HotRevenue'];
	$HotRevenue_data = $_GET['HotRevenue_data'];
	if(mysql_query("update monthly_data_entry  set HotRevenue='$HotRevenue_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['SRevenue'] and $_GET['SRevenue_data'])
{   $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['SRevenue'];
	$SRevenue_data = $_GET['SRevenue_data'];
	if(mysql_query("update monthly_data_entry  set SRevenue='$SRevenue_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['ORevenue'] and $_GET['ORevenue_data'])
{   $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['ORevenue'];
	$ORevenue_data = $_GET['ORevenue_data'];
	if(mysql_query("update monthly_data_entry  set ORevenue='$ORevenue_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['Male'] and $_GET['Male_data'])
{   $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['Male'];
	$Male_data = $_GET['Male_data'];
	if(mysql_query("update monthly_data_entry  set Male='$Male_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
if($_GET['Female'] and $_GET['Female_data'])
{   $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Establishment_Id_p=$_SESSION['Establishment_E'];
	$id = $_GET['Female'];
	$Female_data = $_GET['Female_data'];
	if(mysql_query("update monthly_data_entry  set Female='$Female_data' where ( Establishment_Id='$Establishment_Id_p' and Month='$id' and  Year='$year')"))
	echo 'success';
}
?>