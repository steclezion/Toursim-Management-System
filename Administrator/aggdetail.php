 <?php
	include("dbcon.php");
	if(isset($_POST["Export"])){
	
	  $query = "select * from aggdetail";  
      $result = mysql_query($query); 
	  $num_rows= mysql_num_rows($result); 

	  if ($num_rows > 0){
 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=AggregateDetail.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output,array('No.','Establishment Name','Room Offered','Bed Offered','Room Occupancy Rate','Bed Occupancy Rate','Person Per Room','Non Resident','Resident','Overall','Non Resident','Resident','Total'));  

    $query_result= mysql_query("select * from aggdetail");

					
      while($Q = mysql_fetch_assoc($query_result))
      {  
           fputcsv($output, $Q );  
      }  
	  fclose($output);
  
	  }
  }
	  	else if(isset($_POST["rtf"])){
	
	  $query = "select * from aggdetail";  
     $result = mysql_query($query); 
	  $num_rows= mysql_num_rows($result); 

	  if ( $num_rows > 0){
 
      header('Content-Type: text/rtf; charset=utf-8');  
      header('Content-Disposition: attachment; filename=AggregateDetail.rtf');  
      $output = fopen("php://output", "w");  
      fputcsv($output,array('No.','Establishment Name','Bed Offered','Room Occupancy Rate','Bed Occupancy Rate','Person Per Room','Non Resident','Resident','Overall','Non Resident','Resident','Total'));  

      $query_result= mysql_query("select * from aggdetail");

					
      while($Q = mysql_fetch_assoc($query_result))
      {  
           fputcsv($output, $Q );  
      }  
	  fclose($output);
  
	  }
  }
	 
	  
		
?>