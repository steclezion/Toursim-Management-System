 <?php
	include("dbcon.php");
	if(isset($_POST["Export"])){
	
	  $query = "select * from aggdr";  
      $result = mysql_query($query); 
	  $num_rows= mysql_num_rows($result); 

	  if ($num_rows > 0){
 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=DetailedRevenue.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output,array('EstablishmentName','Non-Resident','Resident','Food & Beverage Revenue','Alcoholic Revenue','Soft Drinks Revenue','Hot Drinks Revenue','Other Revenue','Total Revenue'));  

    $query_result= mysql_query("select * from aggdr");

					
      while($Q = mysql_fetch_assoc($query_result))
      {  
           fputcsv($output, $Q );  
      }  
	  fclose($output);
  
	  }
  }
	  	else if(isset($_POST["rtf"])){
	
	  $query = "select * from aggdr";  
     $result = mysql_query($query); 
	  $num_rows= mysql_num_rows($result); 

	  if ( $num_rows > 0){
 
      header('Content-Type: text/rtf; charset=utf-8');  
      header('Content-Disposition: attachment; filename=DetailedRevenue.rtf');  
      $output = fopen("php://output", "w");  
      fputcsv($output,array('EstablishmentName','Non-Resident','Resident','Food & Beverage Revenue','Alcoholic Revenue','Soft Drinks Revenue','Hot Drinks Revenue','Other Revenue','Total Revenue'));  

      $query_result= mysql_query("select * from aggdr");

					
      while($Q = mysql_fetch_assoc($query_result))
      {  
           fputcsv($output, $Q );  
      }  
	  fclose($output);
  
	  }
  }
	 
	  
		
?>