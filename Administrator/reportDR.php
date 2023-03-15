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
include("dbcon.php"); 
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
                    <th colspan="2" style="background-color:brown;">Establishment Name</th>
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
      
       <td colspan="12" class="info"><i style="color:blue; font-size:18px; font-weight: bold; margin-left: 40px;">
       Hotel</i>       
       </tr> 
             
  <?php 
   
   $sql = "SELECT * FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} order by Month Asc";
    $result_set = mysql_query($sql);
    $xls_report = mysql_query("delete from aggdr");
    $row = mysql_num_rows($result_set);
                        
    $i=0;  
  while($length = mysql_fetch_array($result_set))  
     { 
   $ownId = $length['Establishment_id'];
          
     $getMe = "SELECT * FROM establishment_entry WHERE Establishment_Id={$ownId}";
     $getaway = mysql_query($getMe);
     while ($getIn = mysql_fetch_array($getaway)) {
       $myZoba = $getIn['Establishment_Zoba'];
       $myTown = $getIn['Establishment_Town'];
       $myActive = $getIn['Activity'];
       $estabName = $getIn['Establishment_Name'];
       if($myActive == 'Hotel') {
     ?>
     
              
     
     <?php   
     $nrg = $length['NRB_Revenue'];
     $rg = $length['RB_Revenue']; 
     $fr = $length['FB_Revenue'];
     $al = $length['AlRevenue'];
     $sr = $length['SRevenue'];
     $OR = $length['ORevenue'];
     $hr = $length['HotRevenue'];
     $treasure = $nrg + $rg + $fr + $al + $sr + $OR + $hr;
     
     if(!empty($rg) && !empty($nrg)) {
   
    ?>
    
    <td colspan="2"><?php echo $estabName; ?></td>
    <td colspan="2"><?php echo $nrg; ?></td>
    <td colspan="2"><?php echo $rg; ?></td>   
    <td><?php echo $fr; ?></td> 
    <td><?php  echo $al; ?></td>
    <td><?php  echo $sr; ?></td>   
    <td><?php  echo $OR; ?></td>
    <td><?php echo $hr; ?></td>
    <td><?php  echo $treasure; ?></td>   
    </tr>
   
      <?php  
     $show_rpt = mysql_query("insert into aggdr(estabname,nonres,res,foodrev,alchol,softd,hotd,otherrev,totrev) values('$estabName','$nrg','$rg','$fr','$al','$sr','$OR','$hr','$treasure')"); 

      $i++; 
      }
      } 
     }
       if(!empty($rg) && !empty($nrg)) {       
      $to[] = $nrg;   
      $baby[] = $rg;
      $men[] = $fr;
      $babe[] = $al;
      $wmen[] = $sr;
      $wat[] = $OR;
      $how[] = $hr;
      $whn[] = $treasure;       
      
     }
       } 
     
      
                    $some=0;
                    $t=0;
                    $m=0;
                    $twit=0;
                    $book=0;
                    $pen=0;
                    $csv=0;
                    $dat=0;
                    $mdb=0;
                    
                   if(!empty($i)) {
                   while ($some < $i) {
                   $t = $t + $to[$some];  // resident guest
                   $twit = $twit + $baby[$some];  // non resident guest
                   $m = $m + $men[$some];  // food revenue                  
                   $book = $book + $babe[$some]; // alcoholic revenue
                   $pen = $pen + $wmen[$some];  // soft drink revenue
                   $csv = $csv + $wat[$some]; // other revenue
                   $dat = $dat + $how[$some]; // hot revenue
                   $mdb = $mdb + $whn[$some]; // total revenue
                   
                   $some++;
                   } 
                      }
                         
         if(!empty($i) && !empty($t) && !empty($twit)) {
                     ?>
     
                  <tr>
                  <td colspan="2" style="font-size:15px; font-weight: bold;"><i>Total</i></td> 
                    <td  colspan="2"><?php echo $t;?></td>
                    <td  colspan="2"><?php echo $twit;?></td>
                    <td ><?php echo round($m,2);?></td>
                    <td><?php echo round($book,2);?></td>    
                    <td><?php echo round($pen,2);?></td>
                    <td><?php echo round($csv,2);?></td>
                    <td><?php echo round($dat,2);?></td>    
                    <td><?php echo round($mdb,2);?></td>
                  </tr>
                 
                  <?php } ?>
                  
                 <td colspan="12" class="info"><i style="color:blue; font-size:18px; font-weight: bold; margin-left: 40px;">
  Pension</i>
       
       </tr>   
                  <!--pension-->
                  <?php 
   $sql1 = "SELECT * FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} order by Month Asc";
    $result_set1 = mysql_query($sql1);
    $row1 = mysql_num_rows($result_set1);
                                  
                             
    $i1=0;  
  while($length1 = mysql_fetch_array($result_set1))  
     { 
  $ownId1 = $length1['Establishment_id'];
          
     $getMe1 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$ownId1}";
     $getaway1 = mysql_query($getMe1);
     while ($getIn1 = mysql_fetch_array($getaway1)) {
       $myZoba1 = $getIn1['Establishment_Zoba'];
       $myTown1 = $getIn1['Establishment_Town'];
       $myActive1 = $getIn1['Activity'];
       $estabName1 = $getIn1['Establishment_Name'];
       if($myActive1 == 'Pension') {
     ?>
     
       
     
     <?php   
    $nrg1 = $length1['NRB_Revenue'];
     $rg1 = $length1['RB_Revenue']; 
     $fr1 = $length1['FB_Revenue'];
     $al1 = $length1['AlRevenue'];
     $sr1 = $length1['SRevenue'];
     $OR1 = $length1['ORevenue'];
     $hr1 = $length1['HotRevenue'];
    
      $treasure1 = $nrg1 + $rg1 + $fr1 + $al1 + $sr1 + $OR1 + $hr1;

    if(!empty($rg1) && !empty($nrg1)) {       
    
    ?>
    
    <td colspan="2"><?php echo $estabName1; ?></td>
    <td colspan="2"><?php echo $nrg1; ?></td>
    <td colspan="2"><?php echo $rg1; ?></td>   
    <td><?php echo $fr1; ?></td> 
    <td><?php  echo $al1; ?></td>
    <td><?php  echo $sr1; ?></td>   
    <td><?php  echo $OR1; ?></td>
    <td><?php echo $hr1; ?></td>
    <td><?php  echo $treasure1; ?></td>   
     </tr>
   
      <?php  
     $show_rpt = mysql_query("insert into aggdr(estabname,nonres,res,foodrev,alchol,softd,hotd,otherrev,totrev) values('$estabName1','$nrg1','$rg1','$fr1','$al1','$sr1','$OR1','$hr1','$treasure1')"); 

      $i1++;
    } 
       } 
     }
       if(!empty($rg1) && !empty($nrg1)) {       
      $to1[] = $nrg1;   
      $baby1[] = $rg1;
      $men1[] = $fr1;
      $babe1[] = $al1;
      $wmen1[] = $sr1;
      $wat1[] = $OR1;
      $how1[] = $hr1;
      $whn1[] = $treasure1;       
      
     }
        } 
     

                    $some1=0;
                    $t1=0;
                    $m1=0;
                    $twit1=0;
                    $book1=0;
                    $pen1=0;
                    $csv1=0;
                    $dat1=0;
                    $mdb1=0;
                    
                   if(!empty($i1)) {
                   while ($some1 < $i1) {
                   $t1 = $t1 + $to1[$some1];  // resident guest
                   $twit1 = $twit1 + $baby1[$some1];  // non resident guest
                   $m1 = $m1 + $men1[$some1];  // food revenue                  
                   $book1 = $book1 + $babe1[$some1]; // alcoholic revenue
                   $pen1 = $pen1 + $wmen1[$some1];  // soft drink revenue
                   $csv1 = $csv1 + $wat1[$some1]; // other revenue
                   $dat1 = $dat1 + $how1[$some1]; // hot revenue
                   $mdb1 = $mdb1 + $whn1[$some1]; // total revenue
                   
                   $some1++;
                   } 
                      } 
                      
                      
                if(!empty($i1) && !empty($t1) && !empty($twit1)) {
                     ?>
     
                  <tr>
                  <td colspan="2" style="font-size:15px; font-weight: bold;"><i>Total</i></td> 
                    <td colspan="2"><?php echo $t1;?></td>
                    <td colspan="2"><?php echo $twit1;?></td>
                    <td><?php echo round($m1,2);?></td>
                    <td><?php echo round($book1,2);?></td>    
                    <td><?php echo round($pen1,2);?></td>
                    <td><?php echo round($csv1,2);?></td>
                    <td><?php echo round($dat1,2);?></td>    
                    <td><?php echo round($mdb1,2);?></td>
                  </tr>
                 
                  <?php } ?>
                  
            <tr>
       <td colspan="12" class="info"><i style="color:blue; font-size:18px; font-weight: bold; margin-left: 40px;">
       Guest House</i>
       
       </tr>              
                                 
                  <!--Guest House-->
                  <?php 
   $sql2 = "SELECT * FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} order by Month Asc";
    $result_set2 = mysql_query($sql2);
    $row2 = mysql_num_rows($result_set2);
                                  
                             
    $i2=0;  
  while($length2 = mysql_fetch_array($result_set2))  
     { 
   $ownId2 = $length2['Establishment_id'];
          
     $getMe2 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$ownId2}";
     $getaway2 = mysql_query($getMe2);
     while ($getIn2 = mysql_fetch_array($getaway2)) {
       $myZoba2 = $getIn2['Establishment_Zoba'];
       $myTown2 = $getIn2['Establishment_Town'];
       $myActive2 = $getIn2['Activity'];
       $estabName2 = $getIn2['Establishment_Name'];
       if($myActive2 == 'Guest House') {
     ?>
     
         
     
     <?php   
    $nrg2 = $length2['NRB_Revenue'];
     $rg2 = $length2['RB_Revenue']; 
     $fr2 = $length2['FB_Revenue'];
     $al2 = $length2['AlRevenue'];
     $sr2 = $length2['SRevenue'];
     $OR2 = $length2['ORevenue'];
     $hr2 = $length2['HotRevenue'];
    
     $treasure2 = $nrg2 + $rg2 + $fr2 + $al2 + $sr2 + $OR2 + $hr2;

    if(!empty($rg2) && !empty($nrg2)) {       
    
    ?>
    
    <td colspan="2"><?php echo $estabName2; ?></td>
    <td colspan="2"><?php echo $nrg2; ?></td>
    <td colspan="2"><?php echo $rg2; ?></td>   
    <td><?php echo $fr2; ?></td> 
    <td><?php  echo $al2; ?></td>
    <td><?php  echo $sr2; ?></td>   
    <td><?php  echo $OR2; ?></td>
    <td><?php echo $hr2; ?></td>
    <td><?php  echo $treasure2; ?></td>   
     </tr>
   
      <?php  
    $show_rpt = mysql_query("insert into aggdr(estabname,nonres,res,foodrev,alchol,softd,hotd,otherrev,totrev) values('$estabName1','$nrg1','$rg1','$fr1','$al1','$sr1','$OR1','$hr1','$treasure1')"); 

      $i2++;
    } 
       } 
     }
       if(!empty($rg2) && !empty($nrg2)) {       
      $to2[] = $nrg2;   
      $baby2[] = $rg2;
      $men2[] = $fr2;
      $babe2[] = $al2;
      $wmen2[] = $sr2;
      $wat2[] = $OR2;
      $how2[] = $hr2;
      $whn2[] = $treasure2;       
      
     }
        } 
     

                    $some2=0;
                    $t2=0;
                    $m2=0;
                    $twit2=0;
                    $book2=0;
                    $pen2=0;
                    $csv2=0;
                    $dat2=0;
                    $mdb2=0;
                    
                   if(!empty($i2)) {
                   while ($some2 < $i2) {
                   $t2 = $t2 + $to2[$some2];  // resident guest
                   $twit2 = $twit2 + $baby2[$some2];  // non resident guest
                   $m2 = $m2 + $men2[$some2];  // food revenue                  
                   $book2 = $book2 + $babe2[$some2]; // alcoholic revenue
                   $pen2 = $pen2 + $wmen2[$some2];  // soft drink revenue
                   $csv2 = $csv2 + $wat2[$some2]; // other revenue
                   $dat2 = $dat2 + $how2[$some2]; // hot revenue
                   $mdb2 = $mdb2 + $whn2[$some2]; // total revenue
                   
                   $some2++;
                   } 
                      } 
                      
                      
                if(!empty($i2) && !empty($t2) && !empty($twit2)) {
                     ?>
     
                  <tr>
                  <td colspan="2" style="font-size:15px; font-weight: bold;"><i>Total</i></td> 
                    <td colspan="2"><?php echo $t2;?></td>
                    <td colspan="2"><?php echo $twit2;?></td>
                    <td><?php echo round($m2,2);?></td>
                    <td><?php echo round($book2,2);?></td>    
                    <td><?php echo round($pen2,2);?></td>
                    <td><?php echo round($csv2,2);?></td>
                    <td><?php echo round($dat2,2);?></td>    
                    <td><?php echo round($mdb2,2);?></td>
                  </tr>
                 
                  <?php } 
                                 
                  
                  // Grand Total
                   
                  
                    $sharp = $t + $t1 + $t2;                   
                    $basic = $twit + $twit1+ $twit2;
                    $vb = $m + $m1 + $m2;
                    $cctv = $book + $book1 + $book2;
                    $bbc = $pen + $pen1 + $pen2;
                    $java = $csv + $csv1 + $csv2;
                    $ccna = $dat + $dat1 + $dat2;
                    $pyton = $mdb + $mdb1 + $mdb2;
                    
                    $show_rpt = mysql_query("insert into aggdr(estabname,nonres,res,foodrev,alchol,softd,hotd,otherrev,totrev) 
                    values('G.Total','$sharp','$basic','$vb','$cctv','$bbc','$java','$ccna','$pyton')"); 
                 
                  ?>
        <tr>
          <td></td>
        </tr>
                  <tr style="background-color:orange;"> 
                    <td colspan="2" style="font-size:18px; font-weight: bold;"><i>Grand Total</i></td> 
                    <td colspan="2"><?php echo $sharp;?></td>
                    <td colspan="2"><?php echo $basic;?></td>
                    <td><?php echo $vb;?></td>
                    <td><?php echo $cctv;?></td>    
                    <td><?php echo $bbc;?></td>
                    <td><?php echo $java;?></td>    
                    <td><?php echo $ccna;?></td>
                    <td><?php echo $pyton; ?></td>  
                  
                  </tr>
                   
                </tbody>
        
               </table>     
             
     </div>									                                              
	</div>
    </div>
  </div>
<!-- this row will not appear when printing -->
       <div  id="samm"  class="container">   
			   
			   <form action="dr.php" method="POST">
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
  echo "<script type=\"text/javascript\"> alert( \"First Sumbit Your Entry \");  window.location = \"reportDR.php\"  </script>";
  }
  ?>

</body>
</html>
  
