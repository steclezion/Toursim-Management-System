 <?php
	include("dbcon.php");
	if(isset($_POST["Export"])){
	
	  $query = "select  Establishment_Name from employee_report";  
      $result = mysql_query($query); 
	  $num_rows= mysql_num_rows($result); 

	  if ( $num_rows > 0){
 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=EmployeeReport.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output,array('Establishment_Name','Male','Female','Average') );  

    $query_result= mysql_query("select * from employee_report");

					
      while($Q = mysql_fetch_assoc($query_result))
      {  
           fputcsv($output, $Q );  
      }  
	  fclose($output);
  
	  }
  }
	  	else if(isset($_POST["rtf"])){
	
	  $query = "select  Establishment_Name from employee_report";  
      $result = mysql_query($query); 
	  $num_rows= mysql_num_rows($result); 

	  if ( $num_rows > 0){
 
      header('Content-Type: text/rtf; charset=utf-8');  
      header('Content-Disposition: attachment; filename=EmployeeReport.rtf');  
      $output = fopen("php://output", "w");  
      fputcsv($output,array('Establishment_Name','Male','Female','Average') );  

    $query_result= mysql_query("select * from employee_report");

					
      while($Q = mysql_fetch_assoc($query_result))
      {  
           fputcsv($output, $Q );  
      }  
	  fclose($output);
  
	  }
  }
	 
	  
		
?>