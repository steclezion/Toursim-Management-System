 <?php include('header.php'); ?>
<?php include('session.php'); ?>
 
	<?php
	if ( isset($_POST['Rooms_Beds'])) {
	  $Est_id=	$_SESSION['Establishment_E'];
	   $year=$_SESSION['year_E'];
      $Month=$_SESSION['Month_E'];
	$rooms =$_POST['rooms'];
	$bed =$_POST['bed'];
	$un_rooms =$_POST['un_rooms'];
	$un_bed =$_POST['un_bed'];
	$set=mysql_query ("update monthly_data_entry set offered_Rooms='$rooms',Offered_Beds='$bed',Unoffered_Rooms='$un_bed',Unoffered_Beds='$un_bed',Check_Status=1 where ( Establishment_Id='$Est_id' and Month='$Month' and  Year='$year')");

	if(isset($set)){
	  $_SESSION['ActiveG']='active';
	  $_SESSION['Active']='empty';

		echo "<script type=\"text/javascript\">
alert(\"Rooms and Beds Has Been Saved\");
window.location = \"Edit_monthly_entry.php\"
  </script>";
	}

	
	else
		
		{echo "<script type=\"text/javascript\">
alert(\"Not saveds.\");
window.location = \"index.php\"
  </script>";}
	}
	elseif(isset($_POST['Guests']))
	{
   $Est_id=$_SESSION['Establishment_E'];
   $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Non_Res =$_POST['Non_Res'];
   $Resident =$_POST['Resident'];
   
   $Occupied_Rooms =$_POST['Occupied_Rooms'];
   $Rtotal_Resident =$_POST['Total_Resident'];
   $Total_Non_Resident =$_POST['Total_Non_Resident'];
   $Total_Num_Guests = $_POST['Total_Num_Guests'];
		
$set=mysql_query ("update monthly_data_entry set NR_Guest='$Non_Res',R_NewGuest='$Resident',Rooms_Occupied='$Occupied_Rooms',TNR_Guest='$Total_Non_Resident',TR_Guest='$Rtotal_Resident',Total_Guest='$Total_Num_Guests'  where ( Establishment_Id='$Est_id' and Month='$Month' and  Year='$year')");

	if(isset($set))
	{
	  $_SESSION['ActiveG']='empty';
	  $_SESSION['Active']='empty';
	  $_SESSION['ActiveRE']='active';
	  $_SESSION['ActiveE']='empty';

		echo "<script type=\"text/javascript\">
alert(\"Guests Data Has been Saved .\");
window.location = \"Edit_monthly_entry.php\"
  </script>";
  
	}
	}
	elseif(isset($_POST['Revenue']))
	{
   $Est_id=$_SESSION['Establishment_E'];
   $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Non_Resident_Bed_Revnue =$_POST['Non_Resident_Bed_Revnue'];
   $Resident_Bed_Revenue =$_POST['Resident_Bed_Revenue'];
   $Food_Revenue =$_POST['Food_Revenue'];
   $Alcholic_Bed_Revenue =$_POST['Alcholic_Bed_Revenue'];
   $soft_Drinks_Revenue =$_POST['soft_Drinks_Revenue'];
   $Other_Revenue = $_POST['Other_Revenue'];
   $Hot_Drinks=$_POST['Hot_Drinks'];
   $set=mysql_query ("update monthly_data_entry set NRB_Revenue=' $Non_Resident_Bed_Revnue',RB_Revenue='$Resident_Bed_Revenue',FB_Revenue='$Food_Revenue',AlRevenue='$Alcholic_Bed_Revenue',HotRevenue='$Hot_Drinks',SRevenue='$soft_Drinks_Revenue',ORevenue='$Other_Revenue' where ( Establishment_Id='$Est_id' and Month='$Month' and  Year='$year')");

	if(isset($set))
	{
	  $_SESSION['ActiveG']='empty';
	  $_SESSION['Active']='empty';
	  $_SESSION['ActiveRE']='empty';
	  $_SESSION['ActiveE']='active';

		echo "<script type=\"text/javascript\">
alert(\"Revenues Has been Saved .\");
window.location = \"Edit_monthly_entry.php\"
  </script>";
  }
  }
  elseif(isset($_POST['Employee']))
	{
   $Est_id=$_SESSION['Establishment_E'];
   $year=$_SESSION['year_E'];
   $Month=$_SESSION['Month_E'];
   $Female =$_POST['Female'];
   $Male =$_POST['Male'];
   $set=mysql_query ("update monthly_data_entry set Male='$Male',Female='$Female' where ( Establishment_Id='$Est_id' and Month='$Month' and  Year='$year')");

	if(isset($set))
	{
	  $_SESSION['ActiveG']='empty';
	  $_SESSION['Active']='empty';
	  $_SESSION['ActiveRE']='empty';
	  $_SESSION['ActiveE']='empty';

		echo "<script type=\"text/javascript\">
alert(\"Employees Has been Saved .\");
window.location = \"Edit_monthly_entry.php\"
  </script>";
  }
  }
	
	
	
	
	
	
	
	
	
	
	
	
	
	?>