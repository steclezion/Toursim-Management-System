<?php include('dbcon.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>

  <script>
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
  }
</script> 
            
<?php 
If(isset($_POST['Report'])) {
  
  $title = trim($_POST['title']);
  $month1 = trim($_POST['month1']);
  $month2 = trim($_POST['month2']);
  $year = trim($_POST['year']);

?>	
	<html>
        <head>
  
            </head>	
            <body>	
  <div ><br><br><br></div>
   
       <div id="printdv" class="container">

         <div id="sam" class="span">
		 <div class="jumbotron">
         <h3><B style="color:RED" ><?php  echo $title; ?></B></h3>
         </div>

                <div class="row">
                 <div class="col-xs-12 table-responsive">        
               <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="ex" >

	             <thead> 
                            
                  <tr style="background-color: green;">
                    <th>Year</th>
                    <th>Month</th>
                    <th>Establishment Town</th>
                    <th>Sum Of No Rooms</th>
                    <th>Sum Of No Beds</th>
                    <th>Count Of Establishment Id</th>
                    </tr>
                </thead>
     <tbody>
              
                
          
  <?php 
  
  //  $getMyDataBack = monthly_data_entry::find_by_Id();
    $sql = "SELECT Sum(Offered_Rooms) As ro, Sum(Offered_Beds) As ob, Month, Year, COUNT(Establishment_id) As estId, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year}";
    $result_set = mysql_query($sql);
    $xls_report = mysql_query("delete from countEstab");
                             
    $i=0;  
  while($length = mysql_fetch_array($result_set))  
     { 
   $myI = $length['Establishment_id'];
   
   $year = $length['Year'];
   $month= $length['Month'];
   $totRooms = $length['ro'];
   $totBeds = $length['ob'];
   $totEstId = $length['estId'];
     
     $getTo = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myI}";
     $mind = mysql_query($getTo);
     while($mi = mysql_fetch_array($mind)) {
      $estabTown = $mi['Establishment_Town'];
    if(!empty($totRooms) && !empty($totBeds)) {
     ?>    
          
    
   <tr>
     <td><?php echo $year; ?></td>
     <td><?php  echo $month ?></td>   
     <td><?php  echo $estabTown; ?></td>
     <td><?php  echo $totRooms; ?></td>  
     <td><?php echo $totBeds; ?></td>
     <td><?php echo $totEstId; ?></td>   
    
     
     </tr>
    
      <?php
    $show_rpt = mysql_query("insert into countEstab(year,month,estabTown,sor,sob,cestabid) values('$year','$month','$estabTown','$totRooms','$totBeds','$totEstId')"); 
   
      $i++;
     } 
          }
            }                 
         ?>
         </tbody>
               </table>     
               
   </div>									                                              
	</div>
    </div>
  </div>
<!-- this row will not appear when printing -->
       <div  id="samm"  class="container">   
			   
			   <form action="countEst.php" method="POST">
			     <div class="pull-right">
					 <input  class='alert btn-danger' type="button" onClick="printDiv('printdv')" value="Print/Pdf" />
					 <input  type="submit" name="Export"  class='alert btn-primary'  value="Excel" />
					  <input  type="submit" name="rtf"  class='alert btn-primary'  value="RTF(Ritch Text Format)" />
					 
		         </div>                                                                                
               </form>                                                       
								</div>	

<?php
  }
  else
  {
  echo "<script type=\"text/javascript\"> alert( \"First Sumbit Your Entry \");  window.location = \"reportCountEstab.php\"  </script>";
  }
  ?>
</body>
</html>
  
