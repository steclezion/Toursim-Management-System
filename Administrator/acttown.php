 <?php
	include("dbcon.php");
	if(isset($_POST["Export"])){
	
	  $query = "select * from acttown";  
      $result = mysql_query($query); 
	  $num_rows= mysql_num_rows($result); 

	  if ($num_rows > 0){
 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=AggregateActivityReport.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output,array('Activity','Room Offered','Bed Offered','Room Occupancy Rate','Bed Occupancy Rate','Person Per Room','Non Resident','Resident','Overall','Non Resident','Resident','Total'));  

    $query_result= mysql_query("select * from acttown");

					
      while($Q = mysql_fetch_assoc($query_result))
      {  
           fputcsv($output, $Q );  
      }  
	  fclose($output);
  
	  }
  }
	  	else if(isset($_POST["rtf"])){
	
	  $query = "select * from acttown";  
     $result = mysql_query($query); 
	  $num_rows= mysql_num_rows($result); 

	  if ( $num_rows > 0){
 
      header('Content-Type: text/rtf; charset=utf-8');  
      header('Content-Disposition: attachment; filename=AggregateActivityReport.rtf');  
      $output = fopen("php://output", "w");  
      fputcsv($output,array('Activity','Room Offered','Bed Offered','Room Occupancy Rate','Bed Occupancy Rate','Person Per Room','Non Resident','Resident','Overall','Non Resident','Resident','Total'));  

      $query_result= mysql_query("select * from acttown");

					
      while($Q = mysql_fetch_assoc($query_result))
      {  
           fputcsv($output, $Q );  
      }  
	  fclose($output);
  
	  }
  }
	 
	  
		
?>