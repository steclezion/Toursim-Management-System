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
                    <tr>
                    <th colspan="2"  style="background-color:brown;"></th> 
                    <th colspan="4"  style="text-align:center; background-color:green;"><i>Bed Revenue</i></th> 
                    <th colspan="6"  style="background-color:yellow;"></th>                                                                 
                    </tr>                
                  <tr>
                    <th colspan="2" style="background-color:brown;">Activity</th>
                    <th colspan="2" style="text-align:center; background-color:green;">Non-Residence</th>
                    <th colspan="2" style="text-align:center; background-color:green;">Residence</th>
                    <th style="background-color:yellow;">Food & Beverage Revenue</th>
                    <th style="background-color:yellow;">Alcoholic Revenue</th>
                    <th style="background-color:yellow;">Soft Drinks Revenue</th>  
                    <th  style="background-color:yellow;">Hot Drinks Revenue</th>
                    <th  style="background-color:yellow;">Other Revenue</th>
                    <th  style="background-color:yellow;">Total Revenue</th>
                    </tr>
                </thead>
      <tbody>
                
              <?php 
              
            //  condition for hotel
            
    $sql = "SELECT * FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year}";
    $result_set = mysql_query($sql);
    $xls_report = mysql_query("delete from aggRev");
    $row = mysql_num_rows($result_set);
        
     
  while($length = mysql_fetch_array($result_set))  
     { 
   $myPID = $length['Establishment_id'];
 
        $getMyDataBack = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myPID}";
        $ex = mysql_query($getMyDataBack);
      
        while ($getMy = mysql_fetch_array($ex)) {
        $myAct = $getMy['Activity'];
         $i=0; 
         if($myAct == 'Hotel') {
            
       ?>
       
      
    <!--Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room-->
    <?php
     $nrg = $length['NRB_Revenue'];
     $rg = $length['RB_Revenue']; 
     $fr = $length['FB_Revenue'];
     $al = $length['AlRevenue'];
     $sr = $length['SRevenue'];
     $OR = $length['ORevenue'];
     $hr = $length['HotRevenue'];
   
         
      $to[] = $nrg;   
      $baby[] = $rg;
      $men[] = $fr;
      $babe[] = $al;
      $wmen[] = $sr;
      $wat[] = $OR;
      $how[] = $hr;      
      
            
         $i++; 
                   $nnn=0;
                   $frequency[] = $i;
                   $nnn = $nnn + $frequency[0]++; 
          }
                   
        
       } // foreach
                  
           } // while loop
          
 
                    $some=0;
                    $t=0;
                    $m=0;
                    $twit=0;
                    $book=0;
                    $pen=0;
                    $csv=0;
                    $dat=0;
                    $mdb=0;
                  
                   if(!empty($nnn) && !empty($to)) {
                   while ($some < $nnn) {
                   $t = $t + $to[$some];  // resident bed revenue
                   $twit = $twit + $baby[$some];  // non resident bed revenue
                   $m = $m + $men[$some];  // food revenue                  
                   $book = $book + $babe[$some]; // alcoholic revenue
                   $pen = $pen + $wmen[$some];  // soft drink revenue
                   $csv = $csv + $wat[$some]; // other revenue
                   $dat = $dat + $how[$some]; // hot revenue
                                   
                   $some++;
                   } 
                
                      }
                         // get total revenue 
                   $wealthy =  $t + $twit + $m + $book + $pen + $csv + $dat;
                              
                    if(!empty($nnn) && !empty($twit))  {
                     ?>
                    
                   <tr>
                      <td colspan="2">Hotel</td>
                      <td colspan="2"><?php echo $t;?></td>   
                      <td colspan="2"><?php  echo $twit; ?></td>
                      <td><?php echo $m; ?></td>
                      <td><?php echo $book; ?></td>   
                      <td><?php echo $pen; ?></td>         
                      <td><?php echo $csv; ?></td>
                      <td><?php  echo $dat; ?></td>   
                      <td><?php  echo $wealthy; ?></td>       
                      </tr>
                    <?php
    $show_rpt = mysql_query("insert into aggRev(town,nonres,res,foodrev,alchol,softd,hotd,otherrev,totrev) values('Hotel','$t','$twit','$m','$book','$pen','$csv','$dat','$wealthy')"); 

                     } ?>  
                 
                 
          <!--Pension-->
          <?php
          
   $sql = "SELECT * FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year}";
    $result_set = mysql_query($sql);
    $row = mysql_num_rows($result_set);
  
            
   
  while($length = mysql_fetch_array($result_set))  
     { 
   $myPID1 = $length['Establishment_id'];
 
        $getMyDataBack = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myPID1}";
        $ex1 = mysql_query($getMyDataBack);
      
        while ($getMy = mysql_fetch_array($ex1)) {
         $myActive1 = $getMy['Activity'];
         $myTown1 = $getMy['Establishment_Town'];
            $i1=0; 
         if($myActive1 == 'Pension') {        
               
       ?>
     
  
    <!--Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room-->
    <?php
     $nrg1 = $length['NRB_Revenue'];
     $rg1 = $length['RB_Revenue']; 
     $fr1 = $length['FB_Revenue'];
     $al1 = $length['AlRevenue'];
     $sr1 = $length['SRevenue'];
     $OR1 = $length['ORevenue'];
     $hr1 = $length['HotRevenue'];    
              
     
      $to1[] = $nrg1;   
      $baby1[] = $rg1;
      $men1[] = $fr1;
      $babe1[] = $al1;
      $wmen1[] = $sr1;
      $wat1[] = $OR1;
      $how1[] = $hr1;      
      
           
               $i1++;  
               $nnn1=0;
                   $frequency1[] = $i1;
                   $nnn1 = $nnn1 + $frequency1[0]++; 
        }
       } // foreach
                  
           } // while loop
      
                    $some1=0;
                    $t1=0;
                    $m1=0;
                    $twit1=0;
                    $book1=0;
                    $pen1=0;
                    $csv1=0;
                    $dat1=0;
                    $mdb1=0;
                
                   if(!empty($nnn1) && !empty($to1)) {
                   while ($some1 < $i1) {
                   $t1 = $t1 + $to1[$some1];  // resident bed revenue
                   $twit1 = $twit1 + $baby1[$some1];  // non resident bed revenue
                   $m1 = $m1 + $men1[$some1];  // food revenue                  
                   $book1 = $book1 + $babe1[$some1]; // alcoholic revenue
                   $pen1 = $pen1 + $wmen1[$some1];  // soft drink revenue
                   $csv1 = $csv1 + $wat1[$some1]; // other revenue
                   $dat1 = $dat1 + $how1[$some1]; // hot revenue
                                   
                   $some1++;
                   } 
                   
                      }
                        // get total revenue 
                   $wealthy1 =  $t1 + $twit1 + $m1 + $book1 + $pen1 + $csv1 + $dat1;
                       
                   if(!empty($nnn1) && !empty($twit1)) {
                     ?>
                    
                   <tr>
                      <td colspan="2">Pension</td>
                      <td colspan="2"><?php echo $t1;?></td>   
                      <td colspan="2"><?php  echo $twit1; ?></td>
                      <td><?php echo $m1; ?></td>
                      <td><?php echo $book1; ?></td>   
                      <td><?php echo $pen1; ?></td>         
                      <td><?php echo $csv1; ?></td>
                      <td><?php  echo $dat1; ?></td>   
                      <td><?php  echo $wealthy1; ?></td>       
                      </tr>
                    <?php
     $show_rpt = mysql_query("insert into aggRev(town,nonres,res,foodrev,alchol,softd,hotd,otherrev,totrev) values('Pension','$t1','$twit1','$m1','$book1','$pen1','$csv1','$dat1','$wealthy1')");                
                     } ?>  
                                    
                  
                   <!--Guest House-->
          <?php
                      
   $sql = "SELECT * FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year}";
    $result_set = mysql_query($sql);
    $row = mysql_num_rows($result_set);
       
  while($length = mysql_fetch_array($result_set))  
     { 
    $myPID2 = $length['Establishment_id'];
 
        $getMyDataBack = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myPID2}";
        $ex = mysql_query($getMyDataBack);
     
        while ($getMy = mysql_fetch_array($ex)) {
         $myActive2 = $getMy['Activity'];
         $myTown2 = $getMy['Establishment_Town'];
            $i2=0; 
         if($myActive2 == 'Guest House') {        
       ?>
      
  <!--Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room-->
    <?php
     $nrg2 = $length['NRB_Revenue'];
     $rg2 = $length['RB_Revenue']; 
     $fr2 = $length['FB_Revenue'];
     $al2 = $length['AlRevenue'];
     $sr2 = $length['SRevenue'];
     $OR2 = $length['ORevenue'];
     $hr2 = $length['HotRevenue'];     
     
      
       
      $to2[] = $nrg2;   
      $baby2[] = $rg2;
      $men2[] = $fr2;
      $babe2[] = $al2;
      $wmen2[] = $sr2;
      $wat2[] = $OR2;
      $how2[] = $hr2;      
      
              
               $i2++; 
                   $nnn2=0;
                   $frequency2[] = $i2;
                   $nnn2 = $nnn2 + $frequency2[0]++; 
        }
              
       } // foreach
                  
           } // while loop
                    $some2=0;
                    $t2=0;
                    $m2=0;
                    $twit2=0;
                    $book2=0;
                    $pen2=0;
                    $csv2=0;
                    $dat2=0;
                    $mdb2=0;
                  
                   if(!empty($nnn2) & !empty($to2)) {
                   while ($some2 < $i2) {
                   $t2 = $t2 + $to2[$some2];  // resident bed revenue
                   $twit2 = $twit2 + $baby2[$some2];  // non resident bed revenue
                   $m2 = $m2 + $men2[$some2];  // food revenue                  
                   $book2 = $book2 + $babe2[$some2]; // alcoholic revenue
                   $pen2 = $pen2 + $wmen2[$some2];  // soft drink revenue
                   $csv2 = $csv2 + $wat2[$some2]; // other revenue
                   $dat2 = $dat2 + $how2[$some2]; // hot revenue
                                   
                   $some2++;
                   } 
                 
                      }
                       // get total revenue 
                   $wealthy2 =  $t2 + $twit2 + $m2 + $book2 + $pen2 + $csv2 + $dat2;         
                   if(!empty($nnn2) && !empty($twit2)) {
                     ?>
                    
                   <tr>
                      <td colspan="2">Guest House</td>
                      <td colspan="2"><?php echo $t2;?></td>   
                      <td colspan="2"><?php  echo $twit2; ?></td>
                      <td><?php echo $m2; ?></td>
                      <td><?php echo $book2; ?></td>   
                      <td><?php echo $pen2; ?></td>         
                      <td><?php echo $csv2; ?></td>
                      <td><?php  echo $dat2; ?></td>   
                      <td><?php  echo $wealthy2; ?></td>       
                      </tr>
                    <?php 
     $show_rpt = mysql_query("insert into aggRev(town,nonres,res,foodrev,alchol,softd,hotd,otherrev,totrev)
      values('Guest House','$t2','$twit2','$m2','$book2','$pen2','$csv2','$dat2','$wealthy2')");
                    }  
                                 
                                        
                     // Grand Total
                    $act1 = $t + $t1 + $t2;
                    $act2 = $twit + $twit1 + $twit2;
                    $act3 = $m + $m1 + $m2;
                    $act4 = $book + $book1 + $book2;
                    $act5 = $pen + $pen1 + $pen2; 
                    $act6 = $csv + $csv1 + $csv2; 
                    $act7 = $dat + $dat1 + $dat2; 
                    $act8 = $wealthy + $wealthy1 + $wealthy2;  
                    $show_rpt = mysql_query("insert into aggRev(town,nonres,res,foodrev,alchol,softd,hotd,otherrev,totrev)
                     values('G.Total','$act1','$act2','$act3','$act4','$act5','$act6','$act7','$act8')");
                   
                     ?>
                     
                <tr><td></td></tr>
                    <tr style="background-color:orange;">
                    <td colspan="2"><i style="color:blue; font-size:18px; font-weight: bold;">Grand Total</i></td> 
                    <td  colspan="2"><?php echo $act1;?></td>
                    <td  colspan="2"><?php echo $act2;?></td>
                    <td class="info"><?php echo $act3;?></td>
                    <td class="info"><?php echo $act4;?></td>
                    <td class="info"><?php echo $act5;?></td>                     
                    <td class="info"><?php echo $act6;?></td>
                    <td class="info"><?php echo $act7;?></td>    
                    <td class="info"><?php echo $act8;?></td>
                    </tr>
               
                  
                </tbody>
               </table>     
               
     </div>									                                              
	  </div>
   </div>
  </div>
  
  <!-- this row will not appear when printing -->
       <div  id="samm"  class="container">   
			   
			   <form action="aggRev.php" method="POST">
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
  echo "<script type=\"text/javascript\"> alert( \"First Sumbit Your Entry \");  window.location = \"reportAggRevenue.php\"  </script>";
  }
  ?>
</body>
</html>
  
