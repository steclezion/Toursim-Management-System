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
  $town = trim($_POST['estabtown']);

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
                    <th colspan="6" style="text-align:center; background-color:brown;"></th>  
                    <th colspan="3" style="text-align:center; background-color:green"><i>Average Duration Of Stay</i></th> 
                    <th colspan="3" style="text-align:center; background-color:yellow;"><i>Guest Night</i></th>                      
                    </tr>                
                  <tr>
                    <th style="text-align:center; background-color:brown;">Month</th>
                    <th style="text-align:center; background-color:brown;">Rooms Offered</th>
                    <th style="text-align:center; background-color:brown;">Beds Offered</th>
                    <th style="text-align:center; background-color:brown;">Room Occupancy Rate</th>
                    <th style="text-align:center; background-color:brown;">Bed Occupancy Rate</th>
                    <th style="text-align:center; background-color:brown;">Persons Per Room</th>  
                    <th  style="text-align:center; background-color:green">Non-Residence</th>
                    <th  style="text-align:center; background-color:green">Residence</th>
                    <th  style="text-align:center; background-color:green">Overall</th>
                    <th  style="text-align:center; background-color:yellow;">Non-Residence</th>
                    <th style="text-align:center; background-color:yellow;">Residence</th>
                    <th style="text-align:center; background-color:yellow;">Total</th>
                    </tr>
                </thead>
                
                
                      <tr>
                  <td colspan="12" style="color:blue; font-size:18px; font-weight: bold;"><i><?php echo $town;?></i><i style="margin-left:40px;">Hotel</i></td>  
                  </tr>
      
             <?php   
            $getsql = "SELECT DISTINCT Establishment_Town, Activity, Establishment_Id FROM establishment_entry WHERE Establishment_Town='{$town}' ";
            $eresult= mysql_query($getsql);
            $xls_report = mysql_query("delete from monthta");
            
            while ($len= mysql_fetch_array($eresult)) {
            $myActive = $len['Activity'];
            $id = $len['Establishment_Id'];
             if($myActive == 'Hotel') {  
            
                     
    $sql = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} and Establishment_id = {$id} Group By Month order by Month ASC";
    $result_set = mysql_query($sql);
    $row = mysql_num_rows($result_set);
                                  
                             
    $i=0;  
  while($length = mysql_fetch_array($result_set))  
     { 
   $myMon = $length['Month'];
          
     $getMonth = "SELECT * FROM month_tb WHERE month_no= '{$myMon}' order by month_name Asc";
     $resu = mysql_query($getMonth);
   
     while($repair = mysql_fetch_array($resu)) { 
     $yeah = $repair['month_name']; 
     $nrg = $length['nrg'];   
     $tnrG = $length['tnrG']; 
     $rg = $length['rg'];
     $trg = $length['trg'];
     $ro = $length['ro']; 
     $ob = $length['ob'];   
       ?>
      
    <?php 
    $s=0;
     if(!empty($yeah) && !empty($ro) && !empty($ob) && !empty($nrg) && !empty($tnrG) && !empty($rg) && !empty($trg)) {

     //calculatin Room Occupancy
    $PPR = $ob / $ro;
      
    //Average Duration of Stay for non resident      
    $NRS = $tnrG / $PPR;
    $ADSNR = $ro / $NRS;
    
    //Average Duration of Stay for resident   
    $NRSNR = $trg / $PPR;
    $ADSR = $ro / $NRSNR;
  // round($ADSR[10]);
  
     //Average Duration of Stay for resident
     $sumof = $ADSNR + $ADSR;
     $overall = $sumof / 2;
     
     // Total Guest
     $sum = $nrg + $rg;
     
      //calculatin Room Occupancy
    $ROR = $sum * 100;
    $final = $ROR / $ro;
    
    //calculatin Bed Occupancy
    $BOR = $sum * 100;
    $result = $BOR / $ob;
    ?>
     <tr>
    <td><?php echo $yeah; ?></td>
    <td><?php  echo $ro; ?></td>   
    <td><?php  echo $ob; ?></td>
    <td><?php echo $roo = round($final, 2).'%'; ?></td>
    <td><?php echo $boo = round($result, 2).'%'; ?></td>   
    <td><?php echo $pp = round($PPR, 2); ?></td>  
     
    <td><?php  echo $ads = round($ADSNR, 2); ?></td>
    <td><?php  echo $asr = round($ADSR, 2); ?></td>   
    <td><?php  echo $orl = round($overall, 2); ?></td> 
    
    <td><?php echo $nrg; ?></td>
    <td><?php  echo $rg; ?></td>   
    <td><?php  echo $sum ?></td>       
     </tr>
    
      <?php 
      $show_rpt = mysql_query("insert into monthta(monthName,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) values('$yeah','$ro','$ob','$roo','$boo','$pp','$ads','$asr','$orl','$nrg','$rg','$sum')"); 
   
        $s++; 
     } 
      
        if(!empty($ro) && !empty($ob) && !empty($tnrG) && !empty($trg) && !empty($nrg) && !empty($rg) && !empty($sum)) { 
     
      $to[] = $ro; 
      $men[] = $ob;     
      $myP[] = $tnrG;     
      $dot[] =  $trg;     
      $baby[] = $nrg;
      $babe[] = $rg;
      $wmen[] = $sum;
                   $nnn=0;
                   $frequency[] = $s;
                   $nnn = $nnn + $frequency[0]++; 
            }
   
    
     $i++; 
     }
       
      } 
                
                }
               }    
      $n=0;
      $t=0;
      $m=0;     
      $r=0;     
      $d=0;    
      $twit=0;
      $book=0;
      $pen=0;
      
      if(!empty($nnn)) {
      while ($n < $nnn) { 
        $t = $t + $to[$n];
        $m = $m + $men[$n];      
        $r = $r + $myP[$n];
        $d = $d + $dot[$n];
        $twit = $twit + $baby[$n];
        $book = $book + $babe[$n];
        $pen = $pen + $wmen[$n];     
      $n++;
      }
      // person per room
      $camry = $m / $t;
      // room occupancy rate
      $cresida = $pen * 100;
      $candy = $cresida / $t;
      // bed occupancy rate
      $dell = $cresida / $m;
      //non -residence
      $hp = $r / $camry;
      $toshiba = $t / $hp;
      //residence
      $lenovo = $d / $camry;
      $apple =  $t / $lenovo;
      //overall
      $gmt = $toshiba + $apple;
      $ksa = $gmt / 2;
        }
        


        if(!empty($nnn) && !empty($t) && !empty($m) && !empty($candy) && !empty($dell) && !empty($camry) 
                   && !empty($toshiba) && !empty($apple) && !empty($ksa) && !empty($twit) && !empty($book) && !empty($pen)) {
         ?>
                 <tr><td></td></tr>
                 
                  <tr>
                  <td class="danger" style="font-size:15px; font-weight: bold;"><i>Sub Total</i></td>
                    <td><?php echo $t;?></td>
                    <td><?php echo $m;?></td>
                   <td><?php echo round($candy,2).'%';?></td>
                    <td><?php echo round($dell,2).'%';?></td>   
                    <td><?php echo round($camry,2);?></td>
                    <td><?php echo round($toshiba,2);?></td>
                    <td><?php echo round($apple,2);?></td>  
                    <td><?php echo round($ksa,2);?></td>
                    <td><?php echo $twit;?></td>
                    <td><?php echo $book;?></td>    
                    <td><?php echo $pen;?></td>
                  </tr>
                  <?php } ?>
             
             
             <!--Pension-->
                  
                  <tr>
                  <td colspan="12" style="color:blue; font-size:18px; font-weight: bold;"><i><?php echo $town;?></i><i style="margin-left: 50px">Pension</i></td>  
                  </tr>
  <?php 
     $getsql = "SELECT DISTINCT Establishment_Town, Activity, Establishment_Id FROM establishment_entry WHERE Establishment_Town='{$town}'";
            $eresult= mysql_query($getsql);
            while ($len= mysql_fetch_array($eresult)) {
            $myActive = $len['Activity'];
            $id = $len['Establishment_Id'];
             if($myActive == 'Pension') {  
                   ?>
               
                  <?php     
  $sql = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} and Establishment_id = {$id} Group By Month order by Month ASC";
    $result_set = mysql_query($sql);
    $row = mysql_num_rows($result_set);
                                  
                             
    $i1=0;  
  while($length = mysql_fetch_array($result_set))  
     { 
   $myMon = $length['Month'];
          
     $getMonth = "SELECT * FROM month_tb WHERE month_no= '{$myMon}' order by month_name Asc";
     $resu = mysql_query($getMonth);
   
     while($repair = mysql_fetch_array($resu)) { 
     $yeah1 = $repair['month_name']; 
     $nrg1 = $length['nrg'];   
     $tnrG1 = $length['tnrG'];
     $rg1 = $length['rg'];
     $trg1 = $length['trg'];
     $ro1 = $length['ro']; 
     $ob1 = $length['ob'];       
       ?>
    
     
    <!--Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room-->
    <?php 
     $s1=0;
        if(!empty($yeah1) && !empty($ro1) && !empty($ob1) && !empty($nrg1) && !empty($tnrG1) && !empty($rg1) && !empty($trg1)) {
    //calculatin Room Occupancy
    $PPR1 = $ob1 / $ro1;
      
    //Average Duration of Stay for non resident
   
    $NRS1 = $tnrG1 / $PPR1;
    $ADSNR1 = $ro1 / $NRS1;
    
    //Average Duration of Stay for resident
   
    $NRSNR1 = $trg1 / $PPR1;
    $ADSR1 = $ro1 / $NRSNR1;
  // round($ADSR[10]);
  
     //Average Duration of Stay for resident
     $sumof1 = $ADSNR1 + $ADSR1;
     $overall1 = $sumof1 / 2;
     
     // Total Guest
     $sum1 = $nrg1 + $rg1;
     
      //calculatin Room Occupancy
    $ROR1 = $sum1 * 100;
    $final1 = $ROR1 / $ro1;
    
    //calculatin Bed Occupancy
    $BOR1 = $sum1 * 100;
    $result1 = $BOR1 / $ob1;
    ?>
    <tr>
    <td><?php echo $yeah1; ?></td>
    <td><?php  echo $ro1; ?></td>   
    <td><?php  echo $ob1; ?></td>
    <td><?php echo $roo1 = round($final1, 2).'%'; ?></td>
    <td><?php echo $boo1 = round($result1, 2).'%'; ?></td>   
    <td><?php echo $pp1 = round($PPR1, 2); ?></td>  
     
    <td><?php  echo $ads1 = round($ADSNR1, 2); ?></td>
    <td><?php  echo $asr1 = round($ADSR1, 2); ?></td>   
    <td><?php  echo $orl1 = round($overall1, 2); ?></td> 
    
      <td><?php echo $nrg1; ?></td>
    <td><?php  echo $rg1; ?></td>   
    <td><?php  echo $sum1; ?></td>       
     </tr>
    
      <?php 
     $show_rpt = mysql_query("insert into monthta(monthName,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) values('$yeah1','$ro1','$ob1','$roo1','$boo1','$pp1','$ads1','$asr1','$orl1','$nrg1','$rg1','$sum1')"); 
 
       $s1++;  
     }
      
       if(!empty($ro1) && !empty($ob1) && !empty($tnrG1) && !empty($trg1) && !empty($nrg1) && !empty($rg1) && !empty($sum1)) { 
     
      $to1[] = $ro1; 
      $men1[] = $ob1;     
      $myP1[] = $tnrG1;     
      $dot1[] =  $trg1;     
      $baby1[] = $nrg1;
      $babe1[] = $rg1;
      $wmen1[] = $sum1;
                   $nnn1=0;
                   $frequency1[] = $s1;
                   $nnn1 = $nnn1 + $frequency1[0]++; 
            }
            
            $i1++;  
           } 
     }          
                   
                }
                   }
      
      $n1=0;
      $t1=0;
      $m1=0;     
      $r1=0;     
      $d1=0;    
      $twit1=0;
      $book1=0;
      $pen1=0;
      
     if(!empty($nnn1)) {
      while ($n1 <  $nnn1) { 
        $t1 = $t1 + $to1[$n1];
        $m1 = $m1 + $men1[$n1];      
        $r1 = $r1 + $myP1[$n1];
        $d1 = $d1 + $dot1[$n1];
        $twit1 = $twit1 + $baby1[$n1];
        $book1 = $book1 + $babe1[$n1];
        $pen1 = $pen1 + $wmen1[$n1];     
      $n1++;
      }
      // person per room
      $camry1 = $m1 / $t1;
      // room occupancy rate
      $cresida1 = $pen1 * 100;
      $candy1 = $cresida1 / $t1;
      // bed occupancy rate
      $dell1 = $cresida1 / $m1;
      //non -residence
      $hp1 = $r1 / $camry1;
      $toshiba1 = $t1 / $hp1;
      //residence
      $lenovo1 = $d1 / $camry1;
      $apple1 =  $t1 / $lenovo1;
      //overall
      $gmt1 = $toshiba1 + $apple1;
      $ksa1 = $gmt1 / 2;
        }
        
       if(!empty($nnn1) && !empty($t1) && !empty($m1) && !empty($candy1) && !empty($dell1) && !empty($camry1) 
                   && !empty($toshiba1) && !empty($apple1) && !empty($ksa1) && !empty($twit1) && !empty($book1) && !empty($pen1)) {
         ?>
                 <tr><td></td></tr>
                 
                  <tr>
                  <td class="danger" style="font-size:15px; font-weight: bold;"><i>Sub Total</i></td> 
                    <td><?php echo $t1;?></td>
                    <td><?php echo $m1;?></td>
                   <td><?php echo round($candy1,2).'%';?></td>
                    <td><?php echo round($dell1,2).'%';?></td>   
                    <td><?php echo round($camry1,2);?></td>
                    <td><?php echo round($toshiba1,2);?></td>
                    <td><?php echo round($apple1,2);?></td>  
                    <td><?php echo round($ksa1,2);?></td>
                    <td><?php echo $twit1;?></td>
                    <td><?php echo $book1;?></td>    
                    <td><?php echo $pen1;?></td>
                  </tr>
                  <?php } ?>
                  
                  
                <!--Guest house-->
                  
                  <tr>
                  <td colspan="12" style="color:blue; font-size:18px; font-weight: bold;"><i><?php echo $town;?></i><i style="margin-left: 50px">Guest House</i></td>  
                  </tr>
                  
                  <?php 
            $getsql = "SELECT DISTINCT Establishment_Town, Activity, Establishment_Id FROM establishment_entry WHERE Establishment_Town='{$town}'";
            $eresult= mysql_query($getsql);
            while ($len= mysql_fetch_array($eresult)) {
            $myActive = $len['Activity'];
            $id = $len['Establishment_Id'];
             if($myActive == 'Guest House') {  
                  
   $sql = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} and Establishment_id = {$id} Group By Month";
    $result_set = mysql_query($sql);
    $row = mysql_num_rows($result_set);
                                  
                             
    $i2=0;  
  while($length = mysql_fetch_array($result_set))  
     { 
   $myMon = $length['Month'];
          
     $getMonth = "SELECT * FROM month_tb WHERE month_no= '{$myMon}' order by month_name Asc";
     $resu = mysql_query($getMonth);
   
     while($repair = mysql_fetch_array($resu)) { 
     $yeah2 = $repair['month_name']; 
     $nrg2 = $length['nrg'];   
     $tnrG2 = $length['tnrG'];
     $rg2 = $length['rg'];
     $trg2 = $length['trg'];
     $ro2 = $length['ro'];
     $ob2 = $length['ob'];      
       ?>      
       
 
    <!--Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room-->
    <?php 
    $s2=0;
     if(!empty($yeah2) && !empty($ro2) && !empty($ob2) && !empty($nrg2) && !empty($tnrG2) && !empty($rg2) && !empty($trg2)) {

    $PPR2 = $ob2 / $ro2;
      
    //Average Duration of Stay for non resident
    
    $NRS2 = $tnrG2 / $PPR2;
    $ADSNR2 = $ro2 / $NRS2;
    
    //Average Duration of Stay for resident
     
    $NRSNR2 = $trg2 / $PPR2;
    $ADSR2 = $ro2 / $NRSNR2;
  
     //Average Duration of Stay for resident
     $sumof2 = $ADSNR2 + $ADSR2;
     $overall2 = $sumof2 / 2;
     
     // Total Guest
     $sum2 = $nrg2 + $rg2;
     
      //calculatin Room Occupancy
    $ROR2 = $sum2 * 100;
    $final2 = $ROR2 / $ro2;
    
    //calculatin Bed Occupancy
    $BOR2 = $sum2 * 100;
    $result2 = $BOR2 / $ob2;
    ?>
    <tr>
    <td><?php echo $yeah2; ?></td>
    <td><?php  echo $ro2; ?></td>   
    <td><?php  echo $ob2; ?></td>
    <td><?php echo $roo2 = round($final2, 2).'%'; ?></td>
    <td><?php echo $boo2 = round($result2, 2).'%'; ?></td>   
    <td><?php echo $pp2 = round($PPR2, 2); ?></td>  
     
    <td><?php  echo $ads2 = round($ADSNR2, 2); ?></td>
    <td><?php  echo $asr2 = round($ADSR, 2); ?></td>   
    <td><?php  echo $orl2 = round($overall2, 2); ?></td> 
    
      <td><?php echo $nrg2; ?></td>
    <td><?php  echo $rg2; ?></td>   
    <td><?php  echo $sum2 = $nrg2 + $rg2; ?></td>       
     </tr>
    
      <?php 
            $show_rpt = mysql_query("insert into monthta(monthName,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) values('$yeah2','$ro2','$ob2','$roo2','$boo2','$pp2','$ads2','$asr2','$orl2','$nrg2','$rg2','$sum2')"); 
  
        $s2++; 
       }
      
        if(!empty($ro2) && !empty($ob2) && !empty($tnrG2) && !empty($trg2) && !empty($nrg2) && !empty($rg2) && !empty($sum2)) { 
     
      $to2[] = $ro2; 
      $men2[] = $ob2;     
      $myP2[] = $tnrG2;     
      $dot2[] =  $trg2;     
      $baby2[] = $nrg2;
      $babe2[] = $rg2;
      $wmen2[] = $sum2;
                   $nnn2=0;
                   $frequency2[] = $s2;
                   $nnn2 = $nnn2 + $frequency2[0]++; 
           
           }
   $i2++; 
         }
      } 
                  
                }
                   }
      
       $n2=0;
      $t2=0;
      $m2=0;     
      $r2=0;     
      $d2=0;    
      $twit2=0;
      $book2=0;
      $pen2=0;
      
      if(!empty($nnn2)) {
      while ($n2 < $nnn2) { 
        $t2 = $t2 + $to2[$n2];
        $m2 = $m2 + $men2[$n2];      
        $r2 = $r2 + $myP2[$n2];
        $d2 = $d2 + $dot2[$n2];
        $twit2 = $twit2 + $baby2[$n2];
        $book2 = $book2 + $babe2[$n2];
        $pen2 = $pen2 + $wmen2[$n2];     
      $n2++;
      }
      // person per room
      $camry2 = $m2 / $t2;
      // room occupancy rate
      $cresida2 = $pen2 * 100;
      $candy2 = $cresida2 / $t2;
      // bed occupancy rate
      $dell2 = $cresida2 / $m2;
      //non -residence
      $hp2 = $r2 / $camry2;
      $toshiba2 = $t2 / $hp2;
      //residence
      $lenovo2 = $d2 / $camry2;
      $apple2 =  $t2 / $lenovo2;
      //overall
      $gmt2 = $toshiba2 + $apple2;
      $ksa2 = $gmt2 / 2;
        } 
  
                    if(!empty($nnn2) && !empty($t2) && !empty($m2) && !empty($candy2) && !empty($dell2) && !empty($camry2) 
                   && !empty($toshiba2) && !empty($apple2) && !empty($ksa2) && !empty($twit2) && !empty($book2) && !empty($pen2)) {
         ?>
                 <tr><td></td></tr>
                 
                  <tr>
                  <td class="danger" style="font-size:15px; font-weight: bold;"><i>Sub Total</i></td> 
                    <td><?php echo $t2;?></td>
                    <td><?php echo $m2;?></td>
                   <td><?php echo round($candy2,2).'%';?></td>
                    <td><?php echo round($dell2,2).'%';?></td>   
                    <td><?php echo round($camry2,2);?></td>
                    <td><?php echo round($toshiba2,2);?></td>
                    <td><?php echo round($apple2,2);?></td>  
                    <td><?php echo round($ksa2,2);?></td>
                    <td><?php echo $twit2;?></td>
                    <td><?php echo $book2;?></td>    
                    <td><?php echo $pen2;?></td>
                  </tr>
                  <?php } ?>
                   
                  
                  
                  
                <!--G.Total-->
                  <?php
                  
                    $sharp = $t + $t1 + $t2;
                    $vb = $m + $m1 + $m2;
                    $vision = $r + $r1 + $r2;
                    $doc = $d + $d1 + $d2;
                
                    $basic = $twit + $twit1+ $twit2;
                    $cctv = $book + $book1 + $book2;
                    $bbc = $pen + $pen1 + $pen2;
                     // person per room
                 $car = $vb / $sharp;
                 $ronald = $bbc * 100;
                 //room occupancy rate 
                 $core = $ronald / $sharp;
                 // bed occupancy rate
                 $atp = $ronald / $vb;
                  //non -residence
                 $chess = $vision / $car;
                 $lens = $sharp / $chess; 
                   //residence
                 $hot = $doc / $car;
                 $wet =  $sharp / $hot;
                 //overall
                 $goal = $lens + $wet;
                 $score = $goal / 2;
                  ?>
                  
      <tr><td></td></tr>
                  <tr style="background-color: orange;">
                  <td  class="danger" style="font-size:20px; font-weight: bold;"><i>Grand Total</i></td> 
                    <td class="danger"><?php echo $sharp;?></td>
                    <td class="danger"><?php echo $vb;?></td>
                    <td class="danger"><?php echo $nuclear = round($core,2).'%';?></td>
                    <td class="danger"><?php echo $reactor = round($atp,2).'%';?></td>   
                    <td class="danger"><?php echo $nitrogen = round($car,2);?></td>
                    <td class="success"><?php echo $bomb = round($lens,2);?></td>
                    <td class="success"><?php echo $korea = round($wet,2);?></td>  
                    <td class="success"><?php echo $kim = round($score,2);?></td>
                    <td class="info"><?php echo $basic;?></td>
                    <td class="info"><?php echo $cctv;?></td>    
                    <td class="info"><?php echo $bbc;?></td>
                  </tr>
               <?php 
            $show_rpt = mysql_query("insert into monthta(monthName,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
            values('G.Total','$sharp','$vb','$nuclear','$reactor','$nitrogen','$bomb','$korea','$kim','$basic','$cctv','$bbc')"); 

               ?>
                
               </table>     
               
               
     </div>									                                              
	</div>
    </div>
  </div>
   <!-- this row will not appear when printing -->
       <div id="samm" class="container">   
			   
			   <form action="monthta.php" method="POST">
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
  echo "<script type=\"text/javascript\"> alert( \"First Sumbit Your Entry \");  window.location = \"reportMonthTA.php\"  </script>";
  }
  ?>
</body>
</html>
  
