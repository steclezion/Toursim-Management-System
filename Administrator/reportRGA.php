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
                    <th style="text-align:center; background-color:brown;">Room Group</th>
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
                
                 <tbody>
             
             <!--Hotel-->
                  <tr>
                  <td colspan="12" style="color:blue; font-size:18px; font-weight: bold;"><i><?php echo $town;?></i><i style="margin-left:60px;"> Hotel</i></td>  
                  </tr>
                
             
  <?php 
    // 500 - 251
 $sql52 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set52 = mysql_query($sql52);  
      $xls_report = mysql_query("delete from roomG");                          
            $i52=0;  
           while($length52 = mysql_fetch_array($result_set52))  
            { 
          $myId52 = $length52['Establishment_id'];
         
          
          $getBack52 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId52} And Establishment_Town= '{$town}' ";
            $exe52 = mysql_query($getBack52);
             while ($len52 = mysql_fetch_array($exe52)) { 
                 $myActive52= $len52['Activity'];
                $roomCap52 = $len52['No_Rooms'];
                
               if($myActive52 == 'Hotel' && ($roomCap52 <=520 && $roomCap52 >=251)) {  
              $okID52 = $len52['Establishment_Id']; 
     $sql5252 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID52} Group By Establishment_id";
    $result_set5252 = mysql_query($sql5252);                      
                   $i52=0;        
           while($length5252 = mysql_fetch_array($result_set5252))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro52 = $length5252['ro']; 
    $ob52 = $length5252['ob'];
    
    //Average Duration of Stay for non resident
    $nrg52 = $length5252['nrg'];   
    $tnrG52 = $length5252['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg52 = $length5252['rg'];
    $trg52 = $length5252['trg'];  
    $sum52 = $nrg52 + $rg52;
     $i52++;        
     if(!empty($ro52) && !empty($ob52) && !empty($nrg52) && !empty($trg52) && !empty($tnrG52)  && !empty($rg52) && !empty($sum52)) {       
      $to52[] = $ro52;     
      $men52[] = $ob52;
      $baby52[] = $nrg52;
      $babe52[] = $rg52;
      $wmen52[] = $sum52;
      $wat52[] = $tnrG52;
      $how52[] = $trg52;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
        
                    $some52=0;
                    $t52=0;
                    $m52=0;
                    $o52=0;
                    $q52=0;                                    
                    $twit52=0;
                    $book52=0;
                    $pen52=0;
                    $rateRO52=0;                  
                    $totalG52=0;
                    $totalQ52=0;
                    $tSquare52=0;
                    $trench52 = 0;
                    $dc52=0;
                    $volt52=0;
                    $alpha52=0;
                    $omega52=0;
                    $electric52=0;
                    $city52=0;
                    $row52=0;
                    $xls52=0;
                    $doc52=0;
                    $csv52=0;
                    $dat52=0;
                    $mdb52=0;
                    
                   if(!empty($i52) && !empty($babe52)) {
                   while ($some52 < $i52) {
                   $twit52 = $twit52 + $baby52[$some52];
                   $book52 = $book52 + $babe52[$some52];
                   $pen52 = $pen52 + $wmen52[$some52];  
                     
                   $t52 = $t52 + $to52[$some52];  // offered rooms
                   $m52 = $m52 + $men52[$some52];  // offered beds
                   
                     //ppr
                   $rateRO52 = $m52 / $t52;
                   $tSquare52 = $rateRO52 * $t52;
                   //total Guest
                   $totalG52= $pen52 * 100;
                   //room Occupancy rate
                   $totalQ52 = $totalG52 / $t52;
                   
                   // bed Occupancy rate
                   $trench52 = $totalG52 / $m52;
                   
                   //average duration of stay non-resident                                    
                   $o52 = $o52 + $wat52[$some52];
                   $dc52 = $o52 / $rateRO52;
                   $volt52 = $t52 / $dc52;
                   
                   //average duration of stay resident                                    
                   $q52 = $q52 + $how52[$some52];
                   $alpha52 = $q52 / $rateRO52;
                   $omega52 = $t52 / $alpha52;
                   
                  // overall duration of stay 
                  $electric52 = $volt52 + $omega52;
                  $city52 = $electric52 / 2;             
                   
                   $some52++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i52) && !empty($city52) && !empty($electric52) && !empty($omega52) && !empty($alpha52) && !empty($volt52) && !empty($dc52) && !empty($tSquare52) &&  !empty($trench52) &&  !empty($totalQ52) &&  !empty($totalG52) && !empty($t52) && !empty($m52) && !empty($o52) && !empty($rateRO52) && !empty($q52) && !empty($twit52) && !empty($book52) && !empty($pen52)) {
                     ?>
                    
                   <tr>
                    <td>500 - 251</td> 
                    <td><?php echo $t52;?></td>
                    <td><?php echo $m52;?></td>
                    <td><?php echo $row52 = round($totalQ52,2).'%';?></td>
                    <td><?php echo $xls52 = round($trench52,2).'%';?></td>
                    <td><?php echo $doc52 = round($rateRO52,2);?></td>   
                    <td><?php echo $csv52 = round($volt52,2);?></td>
                    <td><?php echo $dat52 = round($omega52,2);?></td>
                    <td><?php echo $mdb52 = round($city52,2);?></td>                         
                    <td><?php echo $twit52;?></td>
                    <td><?php echo $book52;?></td>    
                    <td><?php echo $pen52;?></td>
                    </tr>
                    <?php 
                     $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) values('500 - 251','$t52','$m52','$row52','$xls52','$doc52','$csv52','$dat52','$mdb52','$twit52','$book52','$pen52')"); 

                    } 
  
  
  
  // 250-151
 $sql25 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set25 = mysql_query($sql25);                   
            $i25=0;  
           while($length25 = mysql_fetch_array($result_set25))  
            { 
          $myId25 = $length25['Establishment_id'];
         
          
          $getBack25 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId25} And Establishment_Town= '{$town}' ";
            $exe25 = mysql_query($getBack25);
             while ($len25 = mysql_fetch_array($exe25)) { 
                 $myActive25= $len25['Activity'];
                $roomCap25 = $len25['No_Rooms'];
                
               if($myActive25 == 'Hotel' && ($roomCap25 <=250 && $roomCap25 >=151)) {  
              $okID25 = $len25['Establishment_Id']; 
     $sql2525 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID25} Group By Establishment_id";
    $result_set2525 = mysql_query($sql2525);                      
                   $i25=0;        
           while($length2525 = mysql_fetch_array($result_set2525))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro25 = $length2525['ro']; 
    $ob25 = $length2525['ob'];
    
    //Average Duration of Stay for non resident
    $nrg25 = $length2525['nrg'];   
    $tnrG25 = $length2525['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg25 = $length2525['rg'];
    $trg25 = $length2525['trg'];  
    $sum25 = $nrg25 + $rg25;
     $i25++;        
     if(!empty($ro25) && !empty($ob25) && !empty($nrg25) && !empty($trg25) && !empty($tnrG25)  && !empty($rg25) && !empty($sum25)) {       
      $to25[] = $ro25;     
      $men25[] = $ob25;
      $baby25[] = $nrg25;
      $babe25[] = $rg25;
      $wmen25[] = $sum25;
      $wat25[] = $tnrG25;
      $how25[] = $trg25;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
           
                    $some25=0;
                    $t25=0;
                    $m25=0;
                    $o25=0;
                    $q25=0;                                    
                    $twit25=0;
                    $book25=0;
                    $pen25=0;
                    $rateRO25=0;                  
                    $totalG25=0;
                    $totalQ25=0;
                    $tSquare25=0;
                    $trench25 = 0;
                    $dc25=0;
                    $volt25=0;
                    $alpha25=0;
                    $omega25=0;
                    $electric25=0;
                    $city25=0;
                    $row25=0;
                    $xls25=0;
                    $doc25=0;
                    $csv25=0;
                    $dat25=0;
                    $mdb25=0;
                    
                   if(!empty($i25) && !empty($babe25)) {
                   while ($some25 < $i25) {
                   $twit25 = $twit25 + $baby25[$some25];
                   $book25 = $book25 + $babe25[$some25];
                   $pen25 = $pen25 + $wmen25[$some25];  
                     
                   $t25 = $t25 + $to25[$some25];  // offered rooms
                   $m25 = $m25 + $men25[$some25];  // offered beds
                   
                     //ppr
                   $rateRO25 = $m25 / $t25;
                   $tSquare25 = $rateRO25 * $t25;
                   //total Guest
                   $totalG25= $pen25 * 100;
                   //room Occupancy rate
                   $totalQ25 = $totalG25 / $t25;
                   
                   // bed Occupancy rate
                   $trench25 = $totalG25 / $m25;
                   
                   //average duration of stay non-resident                                    
                   $o25 = $o25 + $wat25[$some25];
                   $dc25 = $o25 / $rateRO25;
                   $volt25 = $t25 / $dc25;
                   
                   //average duration of stay resident                                    
                   $q25 = $q25 + $how25[$some25];
                   $alpha25 = $q25 / $rateRO25;
                   $omega25 = $t25 / $alpha25;
                   
                  // overall duration of stay 
                  $electric25 = $volt25 + $omega25;
                  $city25 = $electric25 / 2;             
                   
                   $some25++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i25) && !empty($city25) && !empty($electric25) && !empty($omega25) && !empty($alpha25) && !empty($volt25) && !empty($dc25) && !empty($tSquare25) &&  !empty($trench25) &&  !empty($totalQ25) &&  !empty($totalG25) && !empty($t25) && !empty($m25) && !empty($o25) && !empty($rateRO25) && !empty($q25) && !empty($twit25) && !empty($book25) && !empty($pen25)) {
                     ?>
                    
                   <tr>
                    <td>250 - 251</td> 
                    <td><?php echo $t25;?></td>
                    <td><?php echo $m25;?></td>
                    <td><?php echo $row25 = round($totalQ25,2).'%';?></td>
                    <td><?php echo $xls25 = round($trench25,2).'%';?></td>
                    <td><?php echo $doc25 = round($rateRO25,2);?></td>   
                    <td><?php echo $csv25 = round($volt25,2);?></td>
                    <td><?php echo $dat25 = round($omega25,2);?></td>
                    <td><?php echo $mdb25 = round($city25,2);?></td>                              
                    <td><?php echo $twit25;?></td>
                    <td><?php echo $book25;?></td>    
                    <td><?php echo $pen25;?></td>
                    </tr>
                    <?php 
                     $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('250 - 251','$t25','$m25','$row25','$xls25','$doc25','$csv25','$dat25','$mdb25','$twit25','$book25','$pen25')"); 
                    } 
  
  
  
  
  
  // 150-91
   
 $sql15 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set15 = mysql_query($sql15);                   
            $i15=0;  
           while($length15 = mysql_fetch_array($result_set15))  
            { 
          $myId15 = $length15['Establishment_id'];
         
          
          $getBack15 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId15} And Establishment_Town= '{$town}' ";
            $exe15 = mysql_query($getBack15);
             while ($len15 = mysql_fetch_array($exe15)) { 
                 $myActive15= $len15['Activity'];
                $roomCap15 = $len15['No_Rooms'];
                
               if($myActive15 == 'Hotel' && ($roomCap15 <=150 && $roomCap15 >=91)) {  
              $okID15 = $len15['Establishment_Id']; 
     $sql1515 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID15} Group By Establishment_id";
    $result_set1515 = mysql_query($sql1515);                      
                   $i15=0;        
           while($length1515 = mysql_fetch_array($result_set1515))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro15 = $length1515['ro']; 
    $ob15 = $length1515['ob'];
    
    //Average Duration of Stay for non resident
    $nrg15 = $length1515['nrg'];   
    $tnrG15 = $length1515['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg15 = $length1515['rg'];
    $trg15 = $length1515['trg'];  
    $sum15 = $nrg15 + $rg15;
     $i15++;        
     if(!empty($ro15) && !empty($ob15) && !empty($nrg15) && !empty($trg15) && !empty($tnrG15)  && !empty($rg15) && !empty($sum15)) {       
      $to15[] = $ro15;     
      $men15[] = $ob15;
      $baby15[] = $nrg15;
      $babe15[] = $rg15;
      $wmen15[] = $sum15;
      $wat15[] = $tnrG15;
      $how15[] = $trg15;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
        
                    $some15=0;
                    $t15=0;
                    $m15=0;
                    $o15=0;
                    $q15=0;                                    
                    $twit15=0;
                    $book15=0;
                    $pen15=0;
                    $rateRO15=0;                  
                    $totalG15=0;
                    $totalQ15=0;
                    $tSquare15=0;
                    $trench15 = 0;
                    $dc15=0;
                    $volt15=0;
                    $alpha15=0;
                    $omega15=0;
                    $electric15=0;
                    $city15=0;
                    $row15=0;
                    $xls15=0;
                    $doc15=0;
                    $csv15=0;
                    $dat15=0;
                    $mdb15=0;
                    
                   if(!empty($i15) && !empty($babe15)) {
                   while ($some15 < $i15) {
                   $twit15 = $twit15 + $baby15[$some15];
                   $book15 = $book15 + $babe15[$some15];
                   $pen15 = $pen15 + $wmen15[$some15];  
                     
                   $t15 = $t15 + $to15[$some15];  // offered rooms
                   $m15 = $m15 + $men15[$some15];  // offered beds
                   
                     //ppr
                   $rateRO15 = $m15 / $t15;
                   $tSquare15 = $rateRO15 * $t15;
                   //total Guest
                   $totalG15= $pen15 * 100;
                   //room Occupancy rate
                   $totalQ15 = $totalG15 / $t15;
                   
                   // bed Occupancy rate
                   $trench15 = $totalG15 / $m15;
                   
                   //average duration of stay non-resident                                    
                   $o15 = $o15 + $wat15[$some15];
                   $dc15 = $o15 / $rateRO15;
                   $volt15 = $t15 / $dc15;
                   
                   //average duration of stay resident                                    
                   $q15 = $q15 + $how15[$some15];
                   $alpha15 = $q15 / $rateRO15;
                   $omega15 = $t15 / $alpha15;
                   
                  // overall duration of stay 
                  $electric15 = $volt15 + $omega15;
                  $city15 = $electric15 / 2;             
                   
                   $some15++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i15) && !empty($city15) && !empty($electric15) && !empty($omega15) && !empty($alpha15) && !empty($volt15) && !empty($dc15) && !empty($tSquare15) &&  !empty($trench15) &&  !empty($totalQ15) &&  !empty($totalG15) && !empty($t15) && !empty($m15) && !empty($o15) && !empty($rateRO15) && !empty($q15) && !empty($twit15) && !empty($book15) && !empty($pen15)) {
                     ?>
                    
                   <tr>
                    <td>150 - 91</td> 
                    <td><?php echo $t15;?></td>
                    <td><?php echo $m15;?></td>
                    <td><?php echo $row15 = round($totalQ15,2).'%';?></td>
                    <td><?php echo $xls15 = round($trench15,2).'%';?></td>
                    <td><?php echo $doc15 = round($rateRO15,2);?></td>   
                    <td><?php echo $csv15 = round($volt15,2);?></td>
                    <td><?php echo $dat15 = round($omega15,2);?></td>
                    <td><?php echo $mdb15 = round($city15,2);?></td>                           
                    <td><?php echo $twit15;?></td>
                    <td><?php echo $book15;?></td>    
                    <td><?php echo $pen15;?></td>
                    </tr>
                    <?php 
                     $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('150 - 91','$t15','$m15','$row15','$xls15','$doc15','$csv15','$dat15','$mdb15','$twit15','$book15','$pen15')"); 
                    
                    } ?>
  
  
  <?php
    // 90 - 71
    
 $sql9 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set9 = mysql_query($sql9);                   
            $i90=0;  
           while($length9 = mysql_fetch_array($result_set9))  
            { 
          $myId9 = $length9['Establishment_id'];
         
          
          $getBack9 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId9} And Establishment_Town= '{$town}' ";
            $exe9 = mysql_query($getBack9);
             while ($len9 = mysql_fetch_array($exe9)) { 
                 $myActive9= $len9['Activity'];
                $roomCap9 = $len9['No_Rooms'];
                
               if($myActive9 == 'Hotel' && ($roomCap9 <=90 && $roomCap9 >=71)) {  
              $okID9 = $len9['Establishment_Id']; 
     $sql99 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID9} Group By Establishment_id";
    $result_set99 = mysql_query($sql99);                      
                   $i90=0;        
           while($length99 = mysql_fetch_array($result_set99))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro9 = $length99['ro']; 
    $ob9 = $length99['ob'];
    
    //Average Duration of Stay for non resident
    $nrg9 = $length99['nrg'];   
    $tnrG9 = $length99['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg9 = $length99['rg'];
    $trg9 = $length99['trg'];  
    $sum9 = $nrg9 + $rg9;
     $i90++;        
     if(!empty($ro9) && !empty($ob9) && !empty($nrg9) && !empty($trg9) && !empty($tnrG9)  && !empty($rg9) && !empty($sum9)) {       
      $to9[] = $ro9;     
      $men9[] = $ob9;
      $baby9[] = $nrg9;
      $babe9[] = $rg9;
      $wmen9[] = $sum9;
      $wat9[] = $tnrG9;
      $how9[] = $trg9;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
        
                    $some9=0;
                    $t9=0;
                    $m9=0;
                    $o9=0;
                    $q9=0;                                    
                    $twit9=0;
                    $book9=0;
                    $pen9=0;
                    $rateRO9=0;                  
                    $totalG9=0;
                    $totalQ9=0;
                    $tSquare9=0;
                    $trench9 = 0;
                    $dc9=0;
                    $volt9=0;
                    $alpha9=0;
                    $omega9=0;
                    $electric9=0;
                    $city9=0;
                    $row9=0;
                    $xls9=0;
                    $doc9=0;
                    $csv9=0;
                    $dat9=0;
                    $mdb9=0;
                   
                   if(!empty($i90) && !empty($babe90)) {
                   while ($some9 < $i90) {
                   $twit9 = $twit9 + $baby9[$some9];
                   $book9 = $book9 + $babe9[$some9];
                   $pen9 = $pen9 + $wmen9[$some9];  
                     
                   $t9 = $t9 + $to9[$some9];  // offered rooms
                   $m9 = $m9 + $men9[$some9];  // offered beds
                   
                     //ppr
                   $rateRO9 = $m9 / $t9;
                   $tSquare9 = $rateRO9 * $t9;
                   //total Guest
                   $totalG9= $pen9 * 100;
                   //room Occupancy rate
                   $totalQ9 = $totalG9 / $t9;
                   
                   // bed Occupancy rate
                   $trench9 = $totalG9 / $m9;
                   
                   //average duration of stay non-resident                                    
                   $o9 = $o9 + $wat9[$some9];
                   $dc9 = $o9 / $rateRO9;
                   $volt9 = $t9 / $dc9;
                   
                   //average duration of stay resident                                    
                   $q9 = $q9 + $how9[$some9];
                   $alpha9 = $q9 / $rateRO9;
                   $omega9 = $t9 / $alpha9;
                   
                  // overall duration of stay 
                  $electric9 = $volt9 + $omega9;
                  $city9 = $electric9 / 2;             
                   
                   $some9++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i90) && !empty($city9) && !empty($electric9) && !empty($omega9) && !empty($alpha9) && !empty($volt9) && !empty($dc9) && !empty($tSquare9) &&  !empty($trench9) &&  !empty($totalQ9) &&  !empty($totalG9) && !empty($t9) && !empty($m9) && !empty($o9) && !empty($rateRO9) && !empty($q9) && !empty($twit9) && !empty($book9) && !empty($pen9)) {
                     ?>
                    
                   <tr>
                    <td>90 - 71</td> 
                    <td><?php echo $t9;?></td>
                    <td><?php echo $m9;?></td>
                    <td><?php echo $row9 = round($totalQ9,2).'%';?></td>
                    <td><?php echo $xls9 = round($trench9,2).'%';?></td>
                    <td><?php echo $doc9 = round($rateRO9,2);?></td>   
                    <td><?php echo $csv9 = round($volt9,2);?></td>
                    <td><?php echo $dat9 = round($omega9,2);?></td>
                    <td><?php echo $mdb9 = round($city9,2);?></td>                               
                    <td><?php echo $twit9;?></td>
                    <td><?php echo $book9;?></td>    
                    <td><?php echo $pen9;?></td>
                    </tr>
                    <?php
                      $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('90 - 71','$t9','$m9','$row9','$xls9','$doc9','$csv9','$dat9','$mdb9','$twit9','$book9','$pen9')"); 
                    
                     } 
    //  70-50
     
$sql50 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set50 = mysql_query($sql50);                      
             $i50=0;       
           while($length50 = mysql_fetch_array($result_set50))  
            { 
          $myId50 = $length50['Establishment_id'];
         
          
          $getBack50 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId50} And Establishment_Town= '{$town}' ";
            $exe50 = mysql_query($getBack50);
             while ($len50 = mysql_fetch_array($exe50)) { 
                 $myActive50= $len50['Activity'];
                $roomCap50 = $len50['No_Rooms'];
              
      if ($myActive50 == 'Hotel' && ($roomCap50 <=70 && $roomCap50 >=50)) {
      $okID50 = $len50['Establishment_Id']; 
     $sql55 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID50} Group By Establishment_id";
    $result_set55 = mysql_query($sql55);                      
                   $i50=0;        
           while($length55 = mysql_fetch_array($result_set55))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro50 = $length55['ro']; 
    $ob50 = $length55['ob'];
    
    //Average Duration of Stay for non resident
    $nrg50 = $length55['nrg'];   
    $tnrG50 = $length55['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg50 = $length55['rg'];
    $trg50 = $length55['trg'];  
    $sum50 = $nrg50 + $rg50;
     $i50++;        
     if(!empty($ro50) && !empty($ob50) && !empty($nrg50) && !empty($trg50) && !empty($tnrG50)  && !empty($rg50) && !empty($sum50)) {       
      $to50[] = $ro50;     
      $men50[] = $ob50;
      $baby50[] = $nrg50;
      $babe50[] = $rg50;
      $wmen50[] = $sum50;
      $wat50[] = $tnrG50;
      $how50[] = $trg50;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
    
                    $some50=0;
                    $t50=0;
                    $m50=0;
                    $o50=0;
                    $q50=0;                                    
                    $twit50=0;
                    $book50=0;
                    $pen50=0;
                    $rateRO50=0;                  
                    $totalG50=0;
                    $totalQ50=0;
                    $tSquare50=0;
                    $trench50 = 0;
                    $dc50=0;
                    $volt50=0;
                    $alpha50=0;
                    $omega50=0;
                    $electric50=0;
                    $city50=0;
                    $row50=0;
                    $xls50=0;
                    $doc50=0;
                    $csv50=0;
                    $dat50=0;
                    $mdb50=0;
                    
                  
                   if(!empty($i50) && !empty($baby50)) {
                   while ($some50 < $i50) {
                   $twit50 = $twit50 + $baby50[$some50];
                   $book50 = $book50 + $babe50[$some50];
                   $pen50 = $pen50 + $wmen50[$some50];  
                     
                   $t50 = $t50 + $to50[$some50];  // offered rooms
                   $m50 = $m50 + $men50[$some50];  // offered beds
                   
                     //ppr
                   $rateRO50 = $m50 / $t50;
                   $tSquare50 = $rateRO50 * $t50;
                   //total Guest
                   $totalG50= $pen50 * 100;
                   //room Occupancy rate
                   $totalQ50 = $totalG50 / $t50;
                   
                   // bed Occupancy rate
                   $trench50 = $totalG50 / $m50;
                   
                   //average duration of stay non-resident                                    
                   $o50 = $o50 + $wat50[$some50];
                   $dc50 = $o50 / $rateRO50;
                   $volt50 = $t50 / $dc50;
                   
                   //average duration of stay resident                                    
                   $q50 = $q50 + $how50[$some50];
                   $alpha50 = $q50 / $rateRO50;
                   $omega50 = $t50 / $alpha50;
                   
                  // overall duration of stay 
                  $electric50 = $volt50 + $omega50;
                  $city50 = $electric50 / 2;             
                   
                   $some50++;
                   } 
                      }
                   
                      
                    if(!empty($i50) && !empty($city50) && !empty($electric50) && !empty($omega50) && !empty($alpha50) 
                    && !empty($volt50) && !empty($dc50) && !empty($tSquare50) &&  !empty($trench50) &&  !empty($totalQ50) 
                    &&  !empty($totalG50) && !empty($t50) && !empty($m50) && !empty($o50) && !empty($rateRO50) && !empty($q50)
                     && !empty($twit50) && !empty($book50) && !empty($pen50)) {
                     ?>
                    
                   <tr>
                    <td>70 - 50</td> 
                    <td><?php echo $t50;?></td>
                    <td><?php echo $m50;?></td>
                    <td><?php echo $row5 = round($totalQ50,2).'%';?></td>
                    <td><?php echo $xls5 = round($trench50,2).'%';?></td>
                    <td><?php echo $doc5 = round($rateRO50,2);?></td>   
                    <td><?php echo $csv5 = round($volt50,2);?></td>
                    <td><?php echo $dat5 = round($omega50,2);?></td>
                    <td><?php echo $mdb5 = round($city50,2);?></td>                         
                    <td><?php echo $twit50;?></td>
                    <td><?php echo $book50;?></td>    
                    <td><?php echo $pen50;?></td>
                    </tr>
                    <?php 
                      $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('70 - 50','$t50','$m50','$row5','$xls5','$doc5','$csv5','$dat5','$mdb5','$twit50','$book50','$pen50')"); 
                    
                    } 
                    
                    
                    
                    // 49 - 30
$sql30 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set30 = mysql_query($sql30);                      
                  
           while($length30 = mysql_fetch_array($result_set30))  
            { 
          $myId30 = $length30['Establishment_id'];
         
          
          $getBack30 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId30} And Establishment_Town= '{$town}' ";
            $exe30 = mysql_query($getBack30);
             while ($len30 = mysql_fetch_array($exe30)) { 
                 $myActive30= $len30['Activity'];
                $roomCap30 = $len30['No_Rooms'];
                //$okID = $len30['Establishment_Id']; 
    
      if ($myActive30 == 'Hotel' && ($roomCap30 <=49 && $roomCap30 >=30)) {
       $okID = $len30['Establishment_Id']; 
     $sql33 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID} Group By Establishment_id";
    $result_set33 = mysql_query($sql33);                      
                $i30=0;       
           while($length33 = mysql_fetch_array($result_set33))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro30 = $length33['ro']; 
    $ob30 = $length33['ob'];
    
    //Average Duration of Stay for non resident
    $nrg30 = $length33['nrg'];   
    $tnrG30 = $length33['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg30 = $length33['rg'];
    $trg30 = $length33['trg'];  
    $sum30 = $nrg30 + $rg30;
     $i30++;        
     if(!empty($ro30) && !empty($ob30) && !empty($nrg30) && !empty($trg30) && !empty($tnrG30)  && !empty($rg30) && !empty($sum30)) {       
      $to30[] = $ro30;     
      $men30[] = $ob30;
      $baby30[] = $nrg30;
      $babe30[] = $rg30;
      $wmen30[] = $sum30;
      $wat30[] = $tnrG30;
      $how30[] = $trg30;     
      
              }
        ?>
    
    
  
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
     
                    $some30=0;
                    $t30=0;
                    $m30=0;
                    $o30=0;
                    $q30=0;                                    
                    $twit30=0;
                    $book30=0;
                    $pen30=0;
                    $rateRO30=0;                  
                    $totalG30=0;
                    $totalQ30=0;
                    $tSquare30=0;
                    $trench30 = 0;
                    $dc30=0;
                    $volt30=0;
                    $alpha30=0;
                    $omega30=0;
                    $electric30=0;
                    $city30=0;
                    $row30=0;
                    $xls30=0;
                    $doc30=0;
                    $csv30=0;
                    $dat30=0;
                    $mdb30=0;
                  
                   if(!empty($i30) && !empty($baby30)) {
                   while ($some30 < $i30) {
                   $twit30 = $twit30 + $baby30[$some30];
                   $book30 = $book30 + $babe30[$some30];
                   $pen30 = $pen30 + $wmen30[$some30];  
                     
                   $t30 = $t30 + $to30[$some30];  // offered rooms
                   $m30 = $m30 + $men30[$some30];  // offered beds
                   
                     //ppr
                   $rateRO30 = $m30 / $t30;
                   $tSquare30 = $rateRO30 * $t30;
                   //total Guest
                   $totalG30= $pen30 * 100;
                   //room Occupancy rate
                   $totalQ30 = $totalG30 / $t30;
                   
                   // bed Occupancy rate
                   $trench30 = $totalG30 / $m30;
                   
                   //average duration of stay non-resident                                    
                   $o30 = $o30 + $wat30[$some30];
                   $dc30 = $o30 / $rateRO30;
                   $volt30 = $t30 / $dc30;
                   
                   //average duration of stay resident                                    
                   $q30 = $q30 + $how30[$some30];
                   $alpha30 = $q30 / $rateRO30;
                   $omega30 = $t30 / $alpha30;
                   
                  // overall duration of stay 
                  $electric30 = $volt30 + $omega30;
                  $city30 = $electric30 / 2;             
                   
                   $some30++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i30) && !empty($city30) && !empty($electric30) && !empty($omega30) && !empty($alpha30) && !empty($volt30) && !empty($dc30) && !empty($tSquare30) &&  !empty($trench30) &&  !empty($totalQ30) &&  !empty($totalG30) && !empty($t30) && !empty($m30) && !empty($o30) && !empty($rateRO30) && !empty($q30) && !empty($twit30) && !empty($book30) && !empty($pen30)) {
                     ?>
                    
                   <tr>
                    <td>49 - 30</td> 
                    <td><?php echo $t30;?></td>
                    <td><?php echo $m30;?></td>
                    <td><?php echo $row30 = round($totalQ30,2).'%';?></td>
                    <td><?php echo $xls30 = round($trench30,2).'%';?></td>
                    <td><?php echo $doc30 = round($rateRO30,2);?></td>   
                    <td><?php echo $csv30 = round($volt30,2);?></td>
                    <td><?php echo $dat30 = round($omega30,2);?></td>
                    <td><?php echo $mdb30 = round($city30,2);?></td>                                
                    <td><?php echo $twit30;?></td>
                    <td><?php echo $book30;?></td>    
                    <td><?php echo $pen30;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('49 - 30','$t30','$m30','$row30','$xls30','$doc30','$csv30','$dat30','$mdb30','$twit30','$book30','$pen30')"); 
                     
                    } 
    
    
  //29 - 20
 $sql29 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set29 = mysql_query($sql29);                   
            $i29=0;  
           while($length29 = mysql_fetch_array($result_set29))  
            { 
          $myId29 = $length29['Establishment_id'];
         
          
          $getBack29 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId29} And Establishment_Town= '{$town}' ";
            $exe29 = mysql_query($getBack29);
             while ($len29 = mysql_fetch_array($exe29)) { 
                 $myActive29= $len29['Activity'];
                $roomCap29 = $len29['No_Rooms'];
                
               if($myActive29 == 'Hotel' && ($roomCap29 <=29 && $roomCap29 >=20)) {  
              $okID29 = $len29['Establishment_Id']; 
     $sql2929 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID29} Group By Establishment_id";
    $result_set2929 = mysql_query($sql2929);                      
                   $i29=0;        
           while($length2929 = mysql_fetch_array($result_set2929))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro29 = $length2929['ro']; 
    $ob29 = $length2929['ob'];
    
    //Average Duration of Stay for non resident
    $nrg29 = $length2929['nrg'];   
    $tnrG29 = $length2929['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg29 = $length2929['rg'];
    $trg29 = $length2929['trg'];  
    $sum29 = $nrg29 + $rg29;
     $i29++;        
     if(!empty($ro29) && !empty($ob29) && !empty($nrg29) && !empty($trg29) && !empty($tnrG29)  && !empty($rg29) && !empty($sum29)) {       
      $to29[] = $ro29;     
      $men29[] = $ob29;
      $baby29[] = $nrg29;
      $babe29[] = $rg29;
      $wmen29[] = $sum29;
      $wat29[] = $tnrG29;
      $how29[] = $trg29;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
           
                    $some29=0;
                    $t29=0;
                    $m29=0;
                    $o29=0;
                    $q29=0;                                    
                    $twit29=0;
                    $book29=0;
                    $pen29=0;
                    $rateRO29=0;                  
                    $totalG29=0;
                    $totalQ29=0;
                    $tSquare29=0;
                    $trench29 = 0;
                    $dc29=0;
                    $volt29=0;
                    $alpha29=0;
                    $omega29=0;
                    $electric29=0;
                    $city29=0;
                    $row29=0;
                    $xls29=0;
                    $doc29=0;
                    $csv29=0;
                    $dat29=0;
                    $mdb29=0;
                    
                   if(!empty($i29) && !empty($babe29)) {
                   while ($some29 < $i29) {
                   $twit29 = $twit29 + $baby29[$some29];
                   $book29 = $book29 + $babe29[$some29];
                   $pen29 = $pen29 + $wmen29[$some29];  
                     
                   $t29 = $t29 + $to29[$some29];  // offered rooms
                   $m29 = $m29 + $men29[$some29];  // offered beds
                   
                     //ppr
                   $rateRO29 = $m29 / $t29;
                  
                   //total Guest
                   $totalG29= $pen29 * 100;
                   //room Occupancy rate
                   $totalQ29 = $totalG29 / $t29;
                   
                   // bed Occupancy rate
                   $trench29 = $totalG29 / $m29;
                   
                   //average duration of stay non-resident                                    
                   $o29 = $o29 + $wat29[$some29];
                   $dc29 = $o29 / $rateRO29;
                   $volt29 = $t29 / $dc29;
                   
                   //average duration of stay resident                                    
                   $q29 = $q29 + $how29[$some29];
                   $alpha29 = $q29 / $rateRO29;
                   $omega29 = $t29 / $alpha29;
                   
                  // overall duration of stay 
                  $electric29 = $volt29 + $omega29;
                  $city29 = $electric29 / 2;             
                   
                   $some29++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i29) && !empty($city29) && !empty($electric29) && !empty($omega29) && !empty($alpha29) && !empty($volt29) && !empty($dc29) && !empty($tSquare29) &&  !empty($trench29) &&  !empty($totalQ29) &&  !empty($totalG29) && !empty($t29) && !empty($m29) && !empty($o29) && !empty($rateRO29) && !empty($q29) && !empty($twit29) && !empty($book29) && !empty($pen29)) {
                     ?>
                    
                   <tr>
                    <td>29 - 20</td> 
                    <td><?php echo $t29;?></td>
                    <td><?php echo $m29;?></td>
                    <td><?php echo $row29 = round($totalQ29,2).'%';?></td>
                    <td><?php echo $xls29 = round($trench29,2).'%';?></td>
                    <td><?php echo $doc29 = round($rateRO29,2);?></td>   
                    <td><?php echo $csv29 = round($volt29,2);?></td>
                    <td><?php echo $dat29 = round($omega29,2);?></td>
                    <td><?php echo $mdb29 = round($city29,2);?></td>                         
                    <td><?php echo $twit29;?></td>
                    <td><?php echo $book29;?></td>    
                    <td><?php echo $pen29;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('29 - 20','$t29','$m29','$row29','$xls29','$doc29','$csv29','$dat29','$mdb29','$twit29','$book29','$pen29')"); 
                      
                    } 
            
            
            // 19 - 10
 
 $sql19 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set19 = mysql_query($sql19);                   
            $i19=0;  
           while($length19 = mysql_fetch_array($result_set19))  
            { 
          $myId19 = $length19['Establishment_id'];
         
          
          $getBack19 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId19} And Establishment_Town= '{$town}' ";
            $exe19 = mysql_query($getBack19);
             while ($len19 = mysql_fetch_array($exe19)) { 
                 $myActive19= $len19['Activity'];
                $roomCap19 = $len19['No_Rooms'];
                
               if($myActive19 == 'Hotel' && ($roomCap19 <=19 && $roomCap19 >=10)) {  
              $okID19 = $len19['Establishment_Id']; 
     $sql1919 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID19} Group By Establishment_id";
    $result_set1919 = mysql_query($sql1919);                      
                   $i19=0;        
           while($length1919 = mysql_fetch_array($result_set1919))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro19 = $length1919['ro']; 
    $ob19 = $length1919['ob'];
    
    //Average Duration of Stay for non resident
    $nrg19 = $length1919['nrg'];   
    $tnrG19 = $length1919['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg19 = $length1919['rg'];
    $trg19 = $length1919['trg'];  
    $sum19 = $nrg19 + $rg19;
     $i19++;        
     if(!empty($ro19) && !empty($ob19) && !empty($nrg19) && !empty($trg19) && !empty($tnrG19)  && !empty($rg19) && !empty($sum19)) {       
      $to19[] = $ro19;     
      $men19[] = $ob19;
      $baby19[] = $nrg19;
      $babe19[] = $rg19;
      $wmen19[] = $sum19;
      $wat19[] = $tnrG19;
      $how19[] = $trg19;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
           
        
                    $some19=0;
                    $t19=0;
                    $m19=0;
                    $o19=0;
                    $q19=0;                                    
                    $twit19=0;
                    $book19=0;
                    $pen19=0;
                    $rateRO19=0;                  
                    $totalG19=0;
                    $totalQ19=0;
                    $tSquare19=0;
                    $trench19 = 0;
                    $dc19=0;
                    $volt19=0;
                    $alpha19=0;
                    $omega19=0;
                    $electric19=0;
                    $city19=0;
                    $row19=0;
                    $xls19=0;
                    $doc19=0;
                    $csv19=0;
                    $dat19=0;
                    $mdb19=0;
                    
                   if(!empty($i19) && !empty($babe19)) {
                   while ($some19 < $i19) {
                   $twit19 = $twit19 + $baby19[$some19];
                   $book19 = $book19 + $babe19[$some19];
                   $pen19 = $pen19 + $wmen19[$some19];  
                     
                   $t19 = $t19 + $to19[$some19];  // offered rooms
                   $m19 = $m19 + $men19[$some19];  // offered beds
                   
                     //ppr
                   $rateRO19 = $m19 / $t19;
                   $tSquare19 = $rateRO19 * $t19;
                   //total Guest
                   $totalG19= $pen19 * 100;
                   //room Occupancy rate
                   $totalQ19 = $totalG19 / $t19;
                   
                   // bed Occupancy rate
                   $trench19 = $totalG19 / $m19;
                   
                   //average duration of stay non-resident                                    
                   $o19 = $o19 + $wat19[$some19];
                   $dc19 = $o19 / $rateRO19;
                   $volt19 = $t19 / $dc19;
                   
                   //average duration of stay resident                                    
                   $q19 = $q19 + $how19[$some19];
                   $alpha19 = $q19 / $rateRO19;
                   $omega19 = $t19 / $alpha19;
                   
                  // overall duration of stay 
                  $electric19 = $volt19 + $omega19;
                  $city19 = $electric19 / 2;             
                   
                   $some19++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i19) && !empty($city19) && !empty($electric19) && !empty($omega19) && !empty($alpha19) && !empty($volt19) && !empty($dc19) && !empty($tSquare19) &&  !empty($trench19) &&  !empty($totalQ19) &&  !empty($totalG19) && !empty($t19) && !empty($m19) && !empty($o19) && !empty($rateRO19) && !empty($q19) && !empty($twit19) && !empty($book19) && !empty($pen19)) {
                     ?>
                    
                   <tr>
                    <td>19 - 10</td> 
                    <td><?php echo $t19;?></td>
                    <td><?php echo $m19;?></td>
                    <td><?php echo $row19 = round($totalQ19,2).'%';?></td>
                    <td><?php echo $xls19 = round($trench19,2).'%';?></td>
                    <td><?php echo $doc19 = round($rateRO19,2);?></td>   
                    <td><?php echo $csv19 = round($volt19,2);?></td>
                    <td><?php echo $dat19 = round($omega19,2);?></td>
                    <td><?php echo $mdb19 = round($city19,2);?></td>                 
                    <td><?php echo $twit19;?></td>
                    <td><?php echo $book19;?></td>    
                    <td><?php echo $pen19;?></td>
                    </tr>
                    <?php 
                     $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('19 - 10','$t19','$m19','$row19','$xls19','$doc19','$csv19','$dat19','$mdb19','$twit19','$book19','$pen19')"); 
                                          
                    } 
                    
                    
                    
                    // < 10
  
 $sql10 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set10 = mysql_query($sql10);                   
            $i10=0;  
           while($length10 = mysql_fetch_array($result_set10))  
            { 
          $myId10 = $length10['Establishment_id'];
         
          
          $getBack10 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId10} And Establishment_Town= '{$town}' ";
            $exe10 = mysql_query($getBack10);
             while ($len10 = mysql_fetch_array($exe10)) { 
                 $myActive10= $len10['Activity'];
                $roomCap10 = $len10['No_Rooms'];
                
               if($myActive10 == 'Hotel' && ($roomCap10 < 10)) {  
              $okID10 = $len10['Establishment_Id']; 
     $sql1010 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID10} Group By Establishment_id";
    $result_set1010 = mysql_query($sql1010);                      
                   $i10=0;        
           while($length1010 = mysql_fetch_array($result_set1010))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro10 = $length1010['ro']; 
    $ob10 = $length1010['ob'];
    
    //Average Duration of Stay for non resident
    $nrg10 = $length1010['nrg'];   
    $tnrG10 = $length1010['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg10 = $length1010['rg'];
    $trg10 = $length1010['trg'];  
    $sum10 = $nrg10 + $rg10;
     $i10++;        
     if(!empty($ro10) && !empty($ob10) && !empty($nrg10) && !empty($trg10) && !empty($tnrG10)  && !empty($rg10) && !empty($sum10)) {       
      $to10[] = $ro10;     
      $men10[] = $ob10;
      $baby10[] = $nrg10;
      $babe10[] = $rg10;
      $wmen10[] = $sum10;
      $wat10[] = $tnrG10;
      $how10[] = $trg10;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
           
        
                    $some10=0;
                    $t10=0;
                    $m10=0;
                    $o10=0;
                    $q10=0;                                    
                    $twit10=0;
                    $book10=0;
                    $pen10=0;
                    $rateRO10=0;                  
                    $totalG10=0;
                    $totalQ10=0;
                    $tSquare10=0;
                    $trench10 = 0;
                    $dc10=0;
                    $volt10=0;
                    $alpha10=0;
                    $omega10=0;
                    $electric10=0;
                    $city10=0;
                    $row10=0;
                    $xls10=0;
                    $doc10=0;
                    $csv10=0;
                    $dat10=0;
                    $mdb10=0;
                    $eyes=0;
                    $div=0;
                    $pop=0;
                    $corn=0;
                    $loly=0;
                    $cream=0;
                    $donat=0;
                    $div=0;
                    $pop=0;
                    $corn=0;
                    $loly=0;
                    $cream=0;
                    $donat=0;
                    
                   if(!empty($i10) && !empty($babe10)) {
                   while ($some10 < $i10) {
                   $twit10 = $twit10 + $baby10[$some10];
                   $book10 = $book10 + $babe10[$some10];
                   $pen10 = $pen10 + $wmen10[$some10];  
                     
                   $t10 = $t10 + $to10[$some10];  // offered rooms
                   $m10 = $m10 + $men10[$some10];  // offered beds
                   
                     //ppr
                   $rateRO10 = $m10 / $t10;
                   $tSquare10 = $rateRO10 * $t10;
                   //total Guest
                   $totalG10= $pen10 * 100;
                   //room Occupancy rate
                   $totalQ10 = $totalG10 / $t10;
                   
                   // bed Occupancy rate
                   $trench10 = $totalG10 / $m10;
                   
                   //average duration of stay non-resident                                    
                   $o10 = $o10 + $wat10[$some10];
                   $dc10 = $o10 / $rateRO10;
                   $volt10 = $t10 / $dc10;
                   
                   //average duration of stay resident                                    
                   $q10 = $q10 + $how10[$some10];
                   $alpha10 = $q10 / $rateRO10;
                   $omega10 = $t10 / $alpha10;
                   
                  // overall duration of stay 
                  $electric10 = $volt10 + $omega10;
                  $city10 = $electric10 / 2;             
                   
                   $some10++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i10) && !empty($city10) && !empty($electric10) && !empty($omega10) && !empty($alpha10) && !empty($volt10) && !empty($dc10) && !empty($tSquare10) &&  !empty($trench10) &&  !empty($totalQ10) &&  !empty($totalG10) && !empty($t10) && !empty($m10) && !empty($o10) && !empty($rateRO10) && !empty($q10) && !empty($twit10) && !empty($book10) && !empty($pen10)) {
                     ?>
                    
                    <tr>
                    <td> < 10 </td> 
                    <td><?php echo $t10;?></td>
                    <td><?php echo $m10;?></td>
                    <td><?php echo $row10 = round($totalQ10,2).'%';?></td>
                    <td><?php echo $xls10 = round($trench10,2).'%';?></td>
                    <td><?php echo $doc10 = round($rateRO10,2);?></td>   
                    <td><?php echo $csv10 = round($volt10,2);?></td>
                    <td><?php echo $dat10 = round($omega10,2);?></td>
                    <td><?php echo $mdb10 = round($city10,2);?></td>                      
                    <td><?php echo $twit10;?></td>
                    <td><?php echo $book10;?></td>    
                    <td><?php echo $pen10;?></td>
                    </tr>
                    <?php 
                     $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('< 10','$t10','$m10','$row10','$xls10','$doc10','$csv10','$dat10','$mdb10','$twit10','$book10','$pen10')"); 
                       
                    } 
                    
                    // sub Total
                   
                    $cell1 = $t52 + $t25 + $t15 + $t9 + $t50 + $t30 + $t29 + $t19 + $t10;
                    $cell2 = $m52 + $m25 + $m15 + $m9 + $m50 + $m30 + $m29 + $m19 + $m10;
                    $row2 =  $o52 + $o25 + $o15 + $o9 + $o50 + $o30 + $o29 + $o19 + $o10; 
                    $tourism1 = $q52 + $q25 + $q15 + $q9 + $q50 + $q30 + $q29 + $q19 + $q10;
                    
                    $cell3 = $row52 + $row25 + $row15 + $row9 + $row50 + $row30 + $row29 + $row19 + $row10;
                    $cell4 = $xls52 + $xls25 + $xls15 + $xls9 + $xls50 + $xls30 + $xls29 + $xls19 + $xls10;
                    $cell5 = $doc52 + $doc25 + $doc15 + $doc9 + $doc50 + $doc30 + $doc29 + $doc19 + $doc10;
                    $cell6 = $csv52 + $csv25 + $csv15 + $csv9 + $csv50 + $csv30 + $csv29 + $csv19 + $csv10;
                    $cell7 = $dat52 + $dat25 + $dat15 + $dat9 + $dat50 + $dat30 + $dat29 + $dat19 + $dat10;
                    $cell8 = $mdb52 + $mdb25 + $mdb15 + $mdb9 + $mdb50 + $mdb30 + $mdb29 + $mdb19 + $mdb10;
                    $cell9 = $twit52 + $twit25 + $twit15 + $twit9 + $twit50 + $twit30 + $twit29 + $twit19 + $twit10;
                    $cell10 = $book52 + $book25 + $book15 + $book9 + $book50 + $book30 + $book29 + $book19 + $book10;
                    $cell11 = $pen52 + $pen25 + $pen15 + $pen9 + $pen50 + $pen30 + $pen29 + $pen19 + $pen10;                    
                 
                   if(!empty($cell1)) {
                    $parabola1 = $cell11 * 100;
                    // person per room
                    $circle1 = $cell2 / $cell1;
                    // non residence
                    $sphere1 = $row2 / $circle1;
                    $joint1 = $cell1 / $sphere1;
                    //residence
                    $nsa1 = $tourism1 / $circle1;
                    $grow1 = $cell1 /$nsa1;
                    //overall
                    $grownup1 = $joint1 + $grow1;
                    $downlink1 = $grownup1 / 2;
                    
                    $div = round($parabola1 / $cell1,2);
                    $pop = round($parabola1 / $cell2,2);
                    $corn = round($circle1,2);
                    $loly = round($joint1,2);
                    $cream = round($grow1,2);
                    $donat = round($downlink1,2);                   
                    
                   }
                   if(!empty($div) && !empty($pop) && !empty($corn) && !empty($loly) && !empty($cream) && !empty($donat)) {           
                     ?>
                    <tr>
                    <td class="success"><i style="color:blue; font-size:18px; font-weight: bold;">Total</i></td> 
                    <td class="danger"><?php echo $cell1;?></td>
                    <td class="danger"><?php echo $cell2;?></td>
                    <td class="danger"><?php echo $div.'%';?></td>
                    <td class="danger"><?php echo $pop.'%';?></td>
                    <td class="danger"><?php echo $corn;?></td>   
                    <td class="success"><?php echo $loly;?></td>
                    <td class="success"><?php echo $cream;?></td>
                    <td class="success"><?php echo $donat;?></td>                      
                    <td class="info"><?php echo $cell9;?></td>
                    <td class="info"><?php echo $cell10;?></td>    
                    <td class="info"><?php echo $cell11;?></td>
                    </tr>
               <?php }  ?>
               
              <!--Pension-->
          
                 <tr>
                  <td colspan="12" style="color:blue; font-size:18px; font-weight: bold;"><i><?php echo $town;?></i><i style="margin-left:60px;"> Pension</i></td>  
                  </tr>  
              
          <?php 
          
    // 500 - 251
    
 $sql52 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set52 = mysql_query($sql52);                   
            $i52=0;  
           while($length52 = mysql_fetch_array($result_set52))  
            { 
             
          $myId52 = $length52['Establishment_id'];
         
          
          $getBack52 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId52} And Establishment_Town= '{$town}' ";
            $exe52 = mysql_query($getBack52);
             while ($len52 = mysql_fetch_array($exe52)) { 
                 $myActive52= $len52['Activity'];
                $roomCap52 = $len52['No_Rooms'];
                
               if($myActive52 == 'Pension' && ($roomCap52 <=520 && $roomCap52 >=251)) {  
              $okID52 = $len52['Establishment_Id']; 
     $sql5252 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID52} Group By Establishment_id";
    $result_set5252 = mysql_query($sql5252);                      
                   $i52=0;        
           while($length5252 = mysql_fetch_array($result_set5252))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro52 = $length5252['ro']; 
    $ob52 = $length5252['ob'];
    
    //Average Duration of Stay for non resident
    $nrg52 = $length5252['nrg'];   
    $tnrG52 = $length5252['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg52 = $length5252['rg'];
    $trg52 = $length5252['trg'];  
    $sum52 = $nrg52 + $rg52;
     $i52++;        
     if(!empty($ro52) && !empty($ob52) && !empty($nrg52) && !empty($trg52) && !empty($tnrG52)  && !empty($rg52) && !empty($sum52)) {       
      $to52[] = $ro52;     
      $men52[] = $ob52;
      $baby52[] = $nrg52;
      $babe52[] = $rg52;
      $wmen52[] = $sum52;
      $wat52[] = $tnrG52;
      $how52[] = $trg52;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
        
                    $some52=0;
                    $t52=0;
                    $m52=0;
                    $o52=0;
                    $q52=0;                                    
                    $twit52=0;
                    $book52=0;
                    $pen52=0;
                    $rateRO52=0;                  
                    $totalG52=0;
                    $totalQ52=0;
                    $tSquare52=0;
                    $trench52 = 0;
                    $dc52=0;
                    $volt52=0;
                    $alpha52=0;
                    $omega52=0;
                    $electric52=0;
                    $city52=0;
                    $row52=0;
                    $xls52=0;
                    $doc52=0;
                    $csv52=0;
                    $dat52=0;
                    $mdb52=0;
                    
                   if(!empty($i52) && !empty($babe52)) {
                   while ($some52 < $i52) {
                   $twit52 = $twit52 + $baby52[$some52];
                   $book52 = $book52 + $babe52[$some52];
                   $pen52 = $pen52 + $wmen52[$some52];  
                     
                   $t52 = $t52 + $to52[$some52];  // offered rooms
                   $m52 = $m52 + $men52[$some52];  // offered beds
                   
                     //ppr
                   $rateRO52 = $m52 / $t52;
                   $tSquare52 = $rateRO52 * $t52;
                   //total Guest
                   $totalG52= $pen52 * 100;
                   //room Occupancy rate
                   $totalQ52 = $totalG52 / $t52;
                   
                   // bed Occupancy rate
                   $trench52 = $totalG52 / $m52;
                   
                   //average duration of stay non-resident                                    
                   $o52 = $o52 + $wat52[$some52];
                   $dc52 = $o52 / $rateRO52;
                   $volt52 = $t52 / $dc52;
                   
                   //average duration of stay resident                                    
                   $q52 = $q52 + $how52[$some52];
                   $alpha52 = $q52 / $rateRO52;
                   $omega52 = $t52 / $alpha52;
                   
                  // overall duration of stay 
                  $electric52 = $volt52 + $omega52;
                  $city52 = $electric52 / 2;             
                   
                   $some52++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i52) && !empty($city52) && !empty($electric52) && !empty($omega52) && !empty($alpha52) && !empty($volt52) && !empty($dc52) && !empty($tSquare52) &&  !empty($trench52) &&  !empty($totalQ52) &&  !empty($totalG52) && !empty($t52) && !empty($m52) && !empty($o52) && !empty($rateRO52) && !empty($q52) && !empty($twit52) && !empty($book52) && !empty($pen52)) {
                     ?>
                    
                   <tr>
                    <td>500 - 251</td> 
                    <td><?php echo $t52;?></td>
                    <td><?php echo $m52;?></td>
                    <td><?php echo $row52 = round($totalQ52,2).'%';?></td>
                    <td><?php echo $xls52 = round($trench52,2).'%';?></td>
                    <td><?php echo $doc52 = round($rateRO52,2);?></td>   
                    <td><?php echo $csv52 = round($volt52,2);?></td>
                    <td><?php echo $dat52 = round($omega52,2);?></td>
                    <td><?php echo $mdb52 = round($city52,2);?></td>                         
                    <td><?php echo $twit52;?></td>
                    <td><?php echo $book52;?></td>    
                    <td><?php echo $pen52;?></td>
                    </tr>
                    <?php 
                  $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
values('500 - 251','$t52','$m52','$row52','$xls52','$doc52','$csv52','$dat52','$mdb52','$twit52','$book52','$pen52')"); 
       
                    } 
  
  
  
  // 250-151
 $sql25 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set25 = mysql_query($sql25);                   
            $i25=0;  
           while($length25 = mysql_fetch_array($result_set25))  
            { 
          $myId25 = $length25['Establishment_id'];
         
          
          $getBack25 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId25} And Establishment_Town= '{$town}' ";
            $exe25 = mysql_query($getBack25);
             while ($len25 = mysql_fetch_array($exe25)) { 
                 $myActive25= $len25['Activity'];
                $roomCap25 = $len25['No_Rooms'];
                
               if($myActive25 == 'Pension' && ($roomCap25 <=250 && $roomCap25 >=151)) {  
              $okID25 = $len25['Establishment_Id']; 
     $sql2525 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID25} Group By Establishment_id";
    $result_set2525 = mysql_query($sql2525);                      
                   $i25=0;        
           while($length2525 = mysql_fetch_array($result_set2525))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro25 = $length2525['ro']; 
    $ob25 = $length2525['ob'];
    
    //Average Duration of Stay for non resident
    $nrg25 = $length2525['nrg'];   
    $tnrG25 = $length2525['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg25 = $length2525['rg'];
    $trg25 = $length2525['trg'];  
    $sum25 = $nrg25 + $rg25;
     $i25++;        
     if(!empty($ro25) && !empty($ob25) && !empty($nrg25) && !empty($trg25) && !empty($tnrG25)  && !empty($rg25) && !empty($sum25)) {       
      $to25[] = $ro25;     
      $men25[] = $ob25;
      $baby25[] = $nrg25;
      $babe25[] = $rg25;
      $wmen25[] = $sum25;
      $wat25[] = $tnrG25;
      $how25[] = $trg25;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
           
                    $some25=0;
                    $t25=0;
                    $m25=0;
                    $o25=0;
                    $q25=0;                                    
                    $twit25=0;
                    $book25=0;
                    $pen25=0;
                    $rateRO25=0;                  
                    $totalG25=0;
                    $totalQ25=0;
                    $tSquare25=0;
                    $trench25 = 0;
                    $dc25=0;
                    $volt25=0;
                    $alpha25=0;
                    $omega25=0;
                    $electric25=0;
                    $city25=0;
                    $row25=0;
                    $xls25=0;
                    $doc25=0;
                    $csv25=0;
                    $dat25=0;
                    $mdb25=0;
                    
                   if(!empty($i25) && !empty($babe25)) {
                   while ($some25 < $i25) {
                   $twit25 = $twit25 + $baby25[$some25];
                   $book25 = $book25 + $babe25[$some25];
                   $pen25 = $pen25 + $wmen25[$some25];  
                     
                   $t25 = $t25 + $to25[$some25];  // offered rooms
                   $m25 = $m25 + $men25[$some25];  // offered beds
                   
                     //ppr
                   $rateRO25 = $m25 / $t25;
                   $tSquare25 = $rateRO25 * $t25;
                   //total Guest
                   $totalG25= $pen25 * 100;
                   //room Occupancy rate
                   $totalQ25 = $totalG25 / $t25;
                   
                   // bed Occupancy rate
                   $trench25 = $totalG25 / $m25;
                   
                   //average duration of stay non-resident                                    
                   $o25 = $o25 + $wat25[$some25];
                   $dc25 = $o25 / $rateRO25;
                   $volt25 = $t25 / $dc25;
                   
                   //average duration of stay resident                                    
                   $q25 = $q25 + $how25[$some25];
                   $alpha25 = $q25 / $rateRO25;
                   $omega25 = $t25 / $alpha25;
                   
                  // overall duration of stay 
                  $electric25 = $volt25 + $omega25;
                  $city25 = $electric25 / 2;             
                   
                   $some25++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i25) && !empty($city25) && !empty($electric25) && !empty($omega25) && !empty($alpha25) && !empty($volt25) && !empty($dc25) && !empty($tSquare25) &&  !empty($trench25) &&  !empty($totalQ25) &&  !empty($totalG25) && !empty($t25) && !empty($m25) && !empty($o25) && !empty($rateRO25) && !empty($q25) && !empty($twit25) && !empty($book25) && !empty($pen25)) {
                     ?>
                    
                   <tr>
                    <td>250 - 251</td> 
                    <td><?php echo $t25;?></td>
                    <td><?php echo $m25;?></td>
                    <td><?php echo $row25 = round($totalQ25,2).'%';?></td>
                    <td><?php echo $xls25 = round($trench25,2).'%';?></td>
                    <td><?php echo $doc25 = round($rateRO25,2);?></td>   
                    <td><?php echo $csv25 = round($volt25,2);?></td>
                    <td><?php echo $dat25 = round($omega25,2);?></td>
                    <td><?php echo $mdb25 = round($city25,2);?></td>                              
                    <td><?php echo $twit25;?></td>
                    <td><?php echo $book25;?></td>    
                    <td><?php echo $pen25;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('250 - 251','$t25','$m25','$row25','$xls25','$doc25','$csv25','$dat25','$mdb25','$twit25','$book25','$pen25')"); 
    
                    } 
  
  // 150-91
   
 $sql15 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set15 = mysql_query($sql15);                   
            $i15=0;  
           while($length15 = mysql_fetch_array($result_set15))  
            { 
          $myId15 = $length15['Establishment_id'];
         
          
          $getBack15 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId15} And Establishment_Town= '{$town}' ";
            $exe15 = mysql_query($getBack15);
             while ($len15 = mysql_fetch_array($exe15)) { 
                 $myActive15= $len15['Activity'];
                $roomCap15 = $len15['No_Rooms'];
                
               if($myActive15 == 'Pension' && ($roomCap15 <=150 && $roomCap15 >=91)) {  
              $okID15 = $len15['Establishment_Id']; 
     $sql1515 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID15} Group By Establishment_id";
    $result_set1515 = mysql_query($sql1515);                      
                   $i15=0;        
           while($length1515 = mysql_fetch_array($result_set1515))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro15 = $length1515['ro']; 
    $ob15 = $length1515['ob'];
    
    //Average Duration of Stay for non resident
    $nrg15 = $length1515['nrg'];   
    $tnrG15 = $length1515['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg15 = $length1515['rg'];
    $trg15 = $length1515['trg'];  
    $sum15 = $nrg15 + $rg15;
     $i15++;        
     if(!empty($ro15) && !empty($ob15) && !empty($nrg15) && !empty($trg15) && !empty($tnrG15)  && !empty($rg15) && !empty($sum15)) {       
      $to15[] = $ro15;     
      $men15[] = $ob15;
      $baby15[] = $nrg15;
      $babe15[] = $rg15;
      $wmen15[] = $sum15;
      $wat15[] = $tnrG15;
      $how15[] = $trg15;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
        
                    $some15=0;
                    $t15=0;
                    $m15=0;
                    $o15=0;
                    $q15=0;                                    
                    $twit15=0;
                    $book15=0;
                    $pen15=0;
                    $rateRO15=0;                  
                    $totalG15=0;
                    $totalQ15=0;
                    $tSquare15=0;
                    $trench15 = 0;
                    $dc15=0;
                    $volt15=0;
                    $alpha15=0;
                    $omega15=0;
                    $electric15=0;
                    $city15=0;
                    $row15=0;
                    $xls15=0;
                    $doc15=0;
                    $csv15=0;
                    $dat15=0;
                    $mdb15=0;
                    
                   if(!empty($i15) && !empty($babe15)) {
                   while ($some15 < $i15) {
                   $twit15 = $twit15 + $baby15[$some15];
                   $book15 = $book15 + $babe15[$some15];
                   $pen15 = $pen15 + $wmen15[$some15];  
                     
                   $t15 = $t15 + $to15[$some15];  // offered rooms
                   $m15 = $m15 + $men15[$some15];  // offered beds
                   
                     //ppr
                   $rateRO15 = $m15 / $t15;
                   $tSquare15 = $rateRO15 * $t15;
                   //total Guest
                   $totalG15= $pen15 * 100;
                   //room Occupancy rate
                   $totalQ15 = $totalG15 / $t15;
                   
                   // bed Occupancy rate
                   $trench15 = $totalG15 / $m15;
                   
                   //average duration of stay non-resident                                    
                   $o15 = $o15 + $wat15[$some15];
                   $dc15 = $o15 / $rateRO15;
                   $volt15 = $t15 / $dc15;
                   
                   //average duration of stay resident                                    
                   $q15 = $q15 + $how15[$some15];
                   $alpha15 = $q15 / $rateRO15;
                   $omega15 = $t15 / $alpha15;
                   
                  // overall duration of stay 
                  $electric15 = $volt15 + $omega15;
                  $city15 = $electric15 / 2;             
                   
                   $some15++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i15) && !empty($city15) && !empty($electric15) && !empty($omega15) && !empty($alpha15) && !empty($volt15) && !empty($dc15) && !empty($tSquare15) &&  !empty($trench15) &&  !empty($totalQ15) &&  !empty($totalG15) && !empty($t15) && !empty($m15) && !empty($o15) && !empty($rateRO15) && !empty($q15) && !empty($twit15) && !empty($book15) && !empty($pen15)) {
                     ?>
                    
                   <tr>
                    <td>150 - 91</td> 
                    <td><?php echo $t15;?></td>
                    <td><?php echo $m15;?></td>
                    <td><?php echo $row15 = round($totalQ15,2).'%';?></td>
                    <td><?php echo $xls15 = round($trench15,2).'%';?></td>
                    <td><?php echo $doc15 = round($rateRO15,2);?></td>   
                    <td><?php echo $csv15 = round($volt15,2);?></td>
                    <td><?php echo $dat15 = round($omega15,2);?></td>
                    <td><?php echo $mdb15 = round($city15,2);?></td>                           
                    <td><?php echo $twit15;?></td>
                    <td><?php echo $book15;?></td>    
                    <td><?php echo $pen15;?></td>
                    </tr>
                    <?php 
                     $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('150 - 91','$t15','$m15','$row15','$xls15','$doc15','$csv15','$dat15','$mdb15','$twit15','$book15','$pen15')"); 
     
                    
                    } ?>
  
  
  <?php
    // 90 - 71
    
 $sql9 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set9 = mysql_query($sql9);                   
            $i90=0;  
           while($length9 = mysql_fetch_array($result_set9))  
            { 
          $myId9 = $length9['Establishment_id'];
         
          
          $getBack9 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId9} And Establishment_Town= '{$town}' ";
            $exe9 = mysql_query($getBack9);
             while ($len9 = mysql_fetch_array($exe9)) { 
                 $myActive9= $len9['Activity'];
                $roomCap9 = $len9['No_Rooms'];
                
               if($myActive9 == 'Pension' && ($roomCap9 <=90 && $roomCap9 >=71)) {  
              $okID9 = $len9['Establishment_Id']; 
     $sql99 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID9} Group By Establishment_id";
    $result_set99 = mysql_query($sql99);                      
                   $i90=0;        
           while($length99 = mysql_fetch_array($result_set99))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro9 = $length99['ro']; 
    $ob9 = $length99['ob'];
    
    //Average Duration of Stay for non resident
    $nrg9 = $length99['nrg'];   
    $tnrG9 = $length99['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg9 = $length99['rg'];
    $trg9 = $length99['trg'];  
    $sum9 = $nrg9 + $rg9;
     $i90++;        
     if(!empty($ro9) && !empty($ob9) && !empty($nrg9) && !empty($trg9) && !empty($tnrG9)  && !empty($rg9) && !empty($sum9)) {       
      $to9[] = $ro9;     
      $men9[] = $ob9;
      $baby9[] = $nrg9;
      $babe9[] = $rg9;
      $wmen9[] = $sum9;
      $wat9[] = $tnrG9;
      $how9[] = $trg9;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
        
                    $some9=0;
                    $t9=0;
                    $m9=0;
                    $o9=0;
                    $q9=0;                                    
                    $twit9=0;
                    $book9=0;
                    $pen9=0;
                    $rateRO9=0;                  
                    $totalG9=0;
                    $totalQ9=0;
                    $tSquare9=0;
                    $trench9 = 0;
                    $dc9=0;
                    $volt9=0;
                    $alpha9=0;
                    $omega9=0;
                    $electric9=0;
                    $city9=0;
                    $row9=0;
                    $xls9=0;
                    $doc9=0;
                    $csv9=0;
                    $dat9=0;
                    $mdb9=0;
                   
                   if(!empty($i90) && !empty($babe9)) {
                   while ($some9 < $i90) {
                   $twit9 = $twit9 + $baby9[$some9];
                   $book9 = $book9 + $babe9[$some9];
                   $pen9 = $pen9 + $wmen9[$some9];  
                     
                   $t9 = $t9 + $to9[$some9];  // offered rooms
                   $m9 = $m9 + $men9[$some9];  // offered beds
                   
                     //ppr
                   $rateRO9 = $m9 / $t9;
                   $tSquare9 = $rateRO9 * $t9;
                   //total Guest
                   $totalG9= $pen9 * 100;
                   //room Occupancy rate
                   $totalQ9 = $totalG9 / $t9;
                   
                   // bed Occupancy rate
                   $trench9 = $totalG9 / $m9;
                   
                   //average duration of stay non-resident                                    
                   $o9 = $o9 + $wat9[$some9];
                   $dc9 = $o9 / $rateRO9;
                   $volt9 = $t9 / $dc9;
                   
                   //average duration of stay resident                                    
                   $q9 = $q9 + $how9[$some9];
                   $alpha9 = $q9 / $rateRO9;
                   $omega9 = $t9 / $alpha9;
                   
                  // overall duration of stay 
                  $electric9 = $volt9 + $omega9;
                  $city9 = $electric9 / 2;             
                   
                   $some9++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i90) && !empty($city9) && !empty($electric9) && !empty($omega9) && !empty($alpha9) && !empty($volt9) && !empty($dc9) && !empty($tSquare9) &&  !empty($trench9) &&  !empty($totalQ9) &&  !empty($totalG9) && !empty($t9) && !empty($m9) && !empty($o9) && !empty($rateRO9) && !empty($q9) && !empty($twit9) && !empty($book9) && !empty($pen9)) {
                     ?>
                    
                   <tr>
                    <td>90 - 71</td> 
                    <td><?php echo $t9;?></td>
                    <td><?php echo $m9;?></td>
                    <td><?php echo $row9 = round($totalQ9,2).'%';?></td>
                    <td><?php echo $xls9 = round($trench9,2).'%';?></td>
                    <td><?php echo $doc9 = round($rateRO9,2);?></td>   
                    <td><?php echo $csv9 = round($volt9,2);?></td>
                    <td><?php echo $dat9 = round($omega9,2);?></td>
                    <td><?php echo $mdb9 = round($city9,2);?></td>                               
                    <td><?php echo $twit9;?></td>
                    <td><?php echo $book9;?></td>    
                    <td><?php echo $pen9;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('90 - 71','$t9','$m9','$row9','$xls9','$doc9','$csv9','$dat9','$mdb9','$twit9','$book9','$pen9')"); 
      
                    } 
    //  70-50
     
$sql50 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set50 = mysql_query($sql50);                      
             $i50=0;       
           while($length50 = mysql_fetch_array($result_set50))  
            { 
          $myId50 = $length50['Establishment_id'];
         
          
          $getBack50 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId50} And Establishment_Town= '{$town}' ";
            $exe50 = mysql_query($getBack50);
             while ($len50 = mysql_fetch_array($exe50)) { 
                 $myActive50= $len50['Activity'];
                $roomCap50 = $len50['No_Rooms'];
              
      if ($myActive50 == 'Pension' && ($roomCap50 <=70 && $roomCap50 >=50)) {
      $okID50 = $len50['Establishment_Id']; 
     $sql55 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID50} Group By Establishment_id";
    $result_set55 = mysql_query($sql55);                      
                   $i50=0;        
           while($length55 = mysql_fetch_array($result_set55))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro50 = $length55['ro']; 
    $ob50 = $length55['ob'];
    
    //Average Duration of Stay for non resident
    $nrg50 = $length55['nrg'];   
    $tnrG50 = $length55['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg50 = $length55['rg'];
    $trg50 = $length55['trg'];  
    $sum50 = $nrg50 + $rg50;
     $i50++;        
     if(!empty($ro50) && !empty($ob50) && !empty($nrg50) && !empty($trg50) && !empty($tnrG50)  && !empty($rg50) && !empty($sum50)) {       
      $to50[] = $ro50;     
      $men50[] = $ob50;
      $baby50[] = $nrg50;
      $babe50[] = $rg50;
      $wmen50[] = $sum50;
      $wat50[] = $tnrG50;
      $how50[] = $trg50;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
    
                    $some50=0;
                    $t50=0;
                    $m50=0;
                    $o50=0;
                    $q50=0;                                    
                    $twit50=0;
                    $book50=0;
                    $pen50=0;
                    $rateRO50=0;                  
                    $totalG50=0;
                    $totalQ50=0;
                    $tSquare50=0;
                    $trench50 = 0;
                    $dc50=0;
                    $volt50=0;
                    $alpha50=0;
                    $omega50=0;
                    $electric50=0;
                    $city50=0;
                    $row50=0;
                    $xls50=0;
                    $doc50=0;
                    $csv50=0;
                    $dat50=0;
                    $mdb50=0;
                    
                  
                   if(!empty($i50) && !empty($baby50)) {
                   while ($some50 < $i50) {
                   $twit50 = $twit50 + $baby50[$some50];
                   $book50 = $book50 + $babe50[$some50];
                   $pen50 = $pen50 + $wmen50[$some50];  
                     
                   $t50 = $t50 + $to50[$some50];  // offered rooms
                   $m50 = $m50 + $men50[$some50];  // offered beds
                   
                     //ppr
                   $rateRO50 = $m50 / $t50;
                   $tSquare50 = $rateRO50 * $t50;
                   //total Guest
                   $totalG50= $pen50 * 100;
                   //room Occupancy rate
                   $totalQ50 = $totalG50 / $t50;
                   
                   // bed Occupancy rate
                   $trench50 = $totalG50 / $m50;
                   
                   //average duration of stay non-resident                                    
                   $o50 = $o50 + $wat50[$some50];
                   $dc50 = $o50 / $rateRO50;
                   $volt50 = $t50 / $dc50;
                   
                   //average duration of stay resident                                    
                   $q50 = $q50 + $how50[$some50];
                   $alpha50 = $q50 / $rateRO50;
                   $omega50 = $t50 / $alpha50;
                   
                  // overall duration of stay 
                  $electric50 = $volt50 + $omega50;
                  $city50 = $electric50 / 2;             
                   
                   $some50++;
                   } 
                      }
                   
                      
                    if(!empty($i50) && !empty($city50) && !empty($electric50) && !empty($omega50) && !empty($alpha50) 
                    && !empty($volt50) && !empty($dc50) && !empty($tSquare50) &&  !empty($trench50) &&  !empty($totalQ50) 
                    &&  !empty($totalG50) && !empty($t50) && !empty($m50) && !empty($o50) && !empty($rateRO50) && !empty($q50)
                     && !empty($twit50) && !empty($book50) && !empty($pen50)) {
                     ?>
                    
                   <tr>
                    <td>70 - 50</td> 
                    <td><?php echo $t50;?></td>
                    <td><?php echo $m50;?></td>
                    <td><?php echo $row5 = round($totalQ50,2).'%';?></td>
                    <td><?php echo $xls5 = round($trench50,2).'%';?></td>
                    <td><?php echo $doc5 = round($rateRO50,2);?></td>   
                    <td><?php echo $csv5 = round($volt50,2);?></td>
                    <td><?php echo $dat5 = round($omega50,2);?></td>
                    <td><?php echo $mdb5 = round($city50,2);?></td>                         
                    <td><?php echo $twit50;?></td>
                    <td><?php echo $book50;?></td>    
                    <td><?php echo $pen50;?></td>
                    </tr>
                    <?php 
                     $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('70 - 50','$t50','$m50','$row5','$xls5','$doc5','$csv5','$dat5','$mdb5','$twit50','$book50','$pen50')"); 
      
                    } 
                    
                    
                    
                    // 49 - 30
$sql30 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set30 = mysql_query($sql30);                      
               $i30=0;            
           while($length30 = mysql_fetch_array($result_set30))  
            { 
          $myId30 = $length30['Establishment_id'];
         
          
          $getBack30 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId30} And Establishment_Town= '{$town}' ";
            $exe30 = mysql_query($getBack30);
             while ($len30 = mysql_fetch_array($exe30)) { 
                 $myActive30= $len30['Activity'];
                $roomCap30 = $len30['No_Rooms'];
                   
      if ($myActive30 == 'Pension' && ($roomCap30 <=49 && $roomCap30 >=30)) {
       $okID = $len30['Establishment_Id']; 
     $sql33 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID} Group By Establishment_id";
    $result_set33 = mysql_query($sql33);                      
                $i30=0;       
           while($length33 = mysql_fetch_array($result_set33))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro30 = $length33['ro']; 
    $ob30 = $length33['ob'];
    
    //Average Duration of Stay for non resident
    $nrg30 = $length33['nrg'];   
    $tnrG30 = $length33['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg30 = $length33['rg'];
    $trg30 = $length33['trg'];  
    $sum30 = $nrg30 + $rg30;
     $i30++;        
     if(!empty($ro30) && !empty($ob30) && !empty($nrg30) && !empty($trg30) && !empty($tnrG30)  && !empty($rg30) && !empty($sum30)) {       
      $to30[] = $ro30;     
      $men30[] = $ob30;
      $baby30[] = $nrg30;
      $babe30[] = $rg30;
      $wmen30[] = $sum30;
      $wat30[] = $tnrG30;
      $how30[] = $trg30;     
      
              }
        ?>
    
    
  
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
     
                    $some30=0;
                    $t30=0;
                    $m30=0;
                    $o30=0;
                    $q30=0;                                    
                    $twit30=0;
                    $book30=0;
                    $pen30=0;
                    $rateRO30=0;                  
                    $totalG30=0;
                    $totalQ30=0;
                    $tSquare30=0;
                    $trench30 = 0;
                    $dc30=0;
                    $volt30=0;
                    $alpha30=0;
                    $omega30=0;
                    $electric30=0;
                    $city30=0;
                    $row30=0;
                    $xls30=0;
                    $doc30=0;
                    $csv30=0;
                    $dat30=0;
                    $mdb30=0;
                  
                   if(!empty($i30) && !empty($baby30)) {
                   while ($some30 < $i30) {
                   $twit30 = $twit30 + $baby30[$some30];
                   $book30 = $book30 + $babe30[$some30];
                   $pen30 = $pen30 + $wmen30[$some30];  
                     
                   $t30 = $t30 + $to30[$some30];  // offered rooms
                   $m30 = $m30 + $men30[$some30];  // offered beds
                   
                     //ppr
                   $rateRO30 = $m30 / $t30;
                   $tSquare30 = $rateRO30 * $t30;
                   //total Guest
                   $totalG30= $pen30 * 100;
                   //room Occupancy rate
                   $totalQ30 = $totalG30 / $t30;
                   
                   // bed Occupancy rate
                   $trench30 = $totalG30 / $m30;
                   
                   //average duration of stay non-resident                                    
                   $o30 = $o30 + $wat30[$some30];
                   $dc30 = $o30 / $rateRO30;
                   $volt30 = $t30 / $dc30;
                   
                   //average duration of stay resident                                    
                   $q30 = $q30 + $how30[$some30];
                   $alpha30 = $q30 / $rateRO30;
                   $omega30 = $t30 / $alpha30;
                   
                  // overall duration of stay 
                  $electric30 = $volt30 + $omega30;
                  $city30 = $electric30 / 2;             
                   
                   $some30++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i30) && !empty($city30) && !empty($electric30) && !empty($omega30) && !empty($alpha30) && !empty($volt30) && !empty($dc30) && !empty($tSquare30) &&  !empty($trench30) &&  !empty($totalQ30) &&  !empty($totalG30) && !empty($t30) && !empty($m30) && !empty($o30) && !empty($rateRO30) && !empty($q30) && !empty($twit30) && !empty($book30) && !empty($pen30)) {
                     ?>
                    
                   <tr>
                    <td>49 - 30</td> 
                    <td><?php echo $t30;?></td>
                    <td><?php echo $m30;?></td>
                    <td><?php echo $row30 = round($totalQ30,2).'%';?></td>
                    <td><?php echo $xls30 = round($trench30,2).'%';?></td>
                    <td><?php echo $doc30 = round($rateRO30,2);?></td>   
                    <td><?php echo $csv30 = round($volt30,2);?></td>
                    <td><?php echo $dat30 = round($omega30,2);?></td>
                    <td><?php echo $mdb30 = round($city30,2);?></td>                                
                    <td><?php echo $twit30;?></td>
                    <td><?php echo $book30;?></td>    
                    <td><?php echo $pen30;?></td>
                    </tr>
                    <?php 
                     $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('49 - 30','$t30','$m30','$row30','$xls30','$doc30','$csv30','$dat30','$mdb30','$twit30','$book30','$pen30')"); 
         
                    } 
    
    
  //29 - 20
 $sql29 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set29 = mysql_query($sql29);                   
            $i29=0;  
           while($length29 = mysql_fetch_array($result_set29))  
            { 
          $myId29 = $length29['Establishment_id'];
         
          
          $getBack29 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId29} And Establishment_Town= '{$town}' ";
            $exe29 = mysql_query($getBack29);
             while ($len29 = mysql_fetch_array($exe29)) { 
                 $myActive29= $len29['Activity'];
                $roomCap29 = $len29['No_Rooms'];
                
               if($myActive29 == 'Pension' && ($roomCap29 <=29 && $roomCap29 >=20)) {  
                  $roomCap29 = $len29['No_Rooms'];
              $okID29 = $len29['Establishment_Id']; 
     $sql2929 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID29} Group By Establishment_id";
    $result_set2929 = mysql_query($sql2929);                      
                   $i29=0;        
           while($length2929 = mysql_fetch_array($result_set2929))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro29 = $length2929['ro']; 
    $ob29 = $length2929['ob'];
    
    //Average Duration of Stay for non resident
    $nrg29 = $length2929['nrg'];   
    $tnrG29 = $length2929['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg29 = $length2929['rg'];
    $trg29 = $length2929['trg'];  
    $sum29 = $nrg29 + $rg29;
     $i29++;        
     if(!empty($ro29) && !empty($ob29) && !empty($nrg29) && !empty($trg29) && !empty($tnrG29)  && !empty($rg29) && !empty($sum29)) {       
      $to29[] = $ro29;     
      $men29[] = $ob29;
      $baby29[] = $nrg29;
      $babe29[] = $rg29;
      $wmen29[] = $sum29;
      $wat29[] = $tnrG29;
      $how29[] = $trg29;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
           
                    $some29=0;
                    $t29=0;
                    $m29=0;
                    $o29=0;
                    $q29=0;                                    
                    $twit29=0;
                    $book29=0;
                    $pen29=0;
                    $rateRO29=0;                  
                    $totalG29=0;
                    $totalQ29=0;
                    $tSquare29=0;
                    $trench29 = 0;
                    $dc29=0;
                    $volt29=0;
                    $alpha29=0;
                    $omega29=0;
                    $electric29=0;
                    $city29=0;
                    $row29=0;
                    $xls29=0;
                    $doc29=0;
                    $csv29=0;
                    $dat29=0;
                    $mdb29=0;
                    
                   if(!empty($i29) && !empty($babe29)) {
                   while ($some29 < $i29) {
                   $twit29 = $twit29 + $baby29[$some29];
                   $book29 = $book29 + $babe29[$some29];
                   $pen29 = $pen29 + $wmen29[$some29];  
                     
                   $t29 = $t29 + $to29[$some29];  // offered rooms
                   $m29 = $m29 + $men29[$some29];  // offered beds
                   
                     //ppr
                   $rateRO29 = $m29 / $t29;
                   $tSquare29 = $rateRO29 * $t29;
                   //total Guest
                   $totalG29= $pen29 * 100;
                   //room Occupancy rate
                   $totalQ29 = $totalG29 / $t29;
                   
                   // bed Occupancy rate
                   $trench29 = $totalG29 / $m29;
                   
                   //average duration of stay non-resident                                    
                   $o29 = $o29 + $wat29[$some29];
                   $dc29 = $o29 / $rateRO29;
                   $volt29 = $t29 / $dc29;
                   
                   //average duration of stay resident                                    
                   $q29 = $q29 + $how29[$some29];
                   $alpha29 = $q29 / $rateRO29;
                   $omega29 = $t29 / $alpha29;
                   
                  // overall duration of stay 
                  $electric29 = $volt29 + $omega29;
                  $city29 = $electric29 / 2;             
                   
                   $some29++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i29) && !empty($city29) && !empty($electric29) && !empty($omega29) && !empty($alpha29) && !empty($volt29) && !empty($dc29) && !empty($tSquare29) &&  !empty($trench29) &&  !empty($totalQ29) &&  !empty($totalG29) && !empty($t29) && !empty($m29) && !empty($o29) && !empty($rateRO29) && !empty($q29) && !empty($twit29) && !empty($book29) && !empty($pen29)) {
                     ?>
                    
                   <tr>
                    <td>29 - 20</td> 
                    <td><?php echo $t29;?></td>
                    <td><?php echo $m29;?></td>
                    <td><?php echo $row29 = round($totalQ29,2).'%';?></td>
                    <td><?php echo $xls29 = round($trench29,2).'%';?></td>
                    <td><?php echo $doc29 = round($rateRO29,2);?></td>   
                    <td><?php echo $csv29 = round($volt29,2);?></td>
                    <td><?php echo $dat29 = round($omega29,2);?></td>
                    <td><?php echo $mdb29 = round($city29,2);?></td>                         
                    <td><?php echo $twit29;?></td>
                    <td><?php echo $book29;?></td>    
                    <td><?php echo $pen29;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('29 - 20','$t29','$m29','$row29','$xls29','$doc29','$csv29','$dat29','$mdb29','$twit29','$book29','$pen29')"); 
   
                    } 
            
            
            // 19 - 10
 
 $sql19 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set19 = mysql_query($sql19);                   
            $i19=0;  
           while($length19 = mysql_fetch_array($result_set19))  
            { 
          $myId19 = $length19['Establishment_id'];
         
          
          $getBack19 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId19} And Establishment_Town= '{$town}' ";
            $exe19 = mysql_query($getBack19);
             while ($len19 = mysql_fetch_array($exe19)) { 
                 $myActive19= $len19['Activity'];
                $roomCap19 = $len19['No_Rooms'];
                
               if($myActive19 == 'Pension' && ($roomCap19 <=19 && $roomCap19 >=10)) { 
                         $okID19 = $len19['Establishment_Id']; 
     $sql1919 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID19} Group By Establishment_id";
    $result_set1919 = mysql_query($sql1919);                      
                   $i19=0;        
           while($length1919 = mysql_fetch_array($result_set1919))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro19 = $length1919['ro']; 
    $ob19 = $length1919['ob'];
    
    //Average Duration of Stay for non resident
    $nrg19 = $length1919['nrg'];   
    $tnrG19 = $length1919['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg19 = $length1919['rg'];
    $trg19 = $length1919['trg'];  
    $sum19 = $nrg19 + $rg19;
     $i19++;        
     if(!empty($ro19) && !empty($ob19) && !empty($nrg19) && !empty($trg19) && !empty($tnrG19)  && !empty($rg19) && !empty($sum19)) {       
      $to19[] = $ro19;     
      $men19[] = $ob19;
      $baby19[] = $nrg19;
      $babe19[] = $rg19;
      $wmen19[] = $sum19;
      $wat19[] = $tnrG19;
      $how19[] = $trg19;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
           
        
                    $some19=0;
                    $t19=0;
                    $m19=0;
                    $o19=0;
                    $q19=0;                                    
                    $twit19=0;
                    $book19=0;
                    $pen19=0;
                    $rateRO19=0;                  
                    $totalG19=0;
                    $totalQ19=0;
                    $tSquare19=0;
                    $trench19 = 0;
                    $dc19=0;
                    $volt19=0;
                    $alpha19=0;
                    $omega19=0;
                    $electric19=0;
                    $city19=0;
                    $row19=0;
                    $xls19=0;
                    $doc19=0;
                    $csv19=0;
                    $dat19=0;
                    $mdb19=0;
                    
                   if(!empty($i19) && !empty($babe19)) {
                   while ($some19 < $i19) {
                   $twit19 = $twit19 + $baby19[$some19];
                   $book19 = $book19 + $babe19[$some19];
                   $pen19 = $pen19 + $wmen19[$some19];  
                     
                   $t19 = $t19 + $to19[$some19];  // offered rooms
                   $m19 = $m19 + $men19[$some19];  // offered beds
                   
                     //ppr
                   $rateRO19 = $m19 / $t19;
                   $tSquare19 = $rateRO19 * $t19;
                   //total Guest
                   $totalG19= $pen19 * 100;
                   //room Occupancy rate
                   $totalQ19 = $totalG19 / $t19;
                   
                   // bed Occupancy rate
                   $trench19 = $totalG19 / $m19;
                   
                   //average duration of stay non-resident                                    
                   $o19 = $o19 + $wat19[$some19];
                   $dc19 = $o19 / $rateRO19;
                   $volt19 = $t19 / $dc19;
                   
                   //average duration of stay resident                                    
                   $q19 = $q19 + $how19[$some19];
                   $alpha19 = $q19 / $rateRO19;
                   $omega19 = $t19 / $alpha19;
                   
                  // overall duration of stay 
                  $electric19 = $volt19 + $omega19;
                  $city19 = $electric19 / 2;             
                   
                   $some19++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i19) && !empty($city19) && !empty($electric19) && !empty($omega19) && !empty($alpha19) && !empty($volt19) && !empty($dc19) && !empty($tSquare19) &&  !empty($trench19) &&  !empty($totalQ19) &&  !empty($totalG19) && !empty($t19) && !empty($m19) && !empty($o19) && !empty($rateRO19) && !empty($q19) && !empty($twit19) && !empty($book19) && !empty($pen19)) {
                     ?>
                    
                   <tr>
                    <td>19 - 10</td> 
                    <td><?php echo $t19;?></td>
                    <td><?php echo $m19;?></td>
                    <td><?php echo $row19 = round($totalQ19,2).'%';?></td>
                    <td><?php echo $xls19 = round($trench19,2).'%';?></td>
                    <td><?php echo $doc19 = round($rateRO19,2);?></td>   
                    <td><?php echo $csv19 = round($volt19,2);?></td>
                    <td><?php echo $dat19 = round($omega19,2);?></td>
                    <td><?php echo $mdb19 = round($city19,2);?></td>                 
                    <td><?php echo $twit19;?></td>
                    <td><?php echo $book19;?></td>    
                    <td><?php echo $pen19;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('19 - 10','$t19','$m19','$row19','$xls19','$doc19','$csv19','$dat19','$mdb19','$twit19','$book19','$pen19')"); 
   
                    } 
                    
                    
                    
                    // < 10
  
 $sql10 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set10 = mysql_query($sql10);                   
            $i10=0;  
           while($length10 = mysql_fetch_array($result_set10))  
            { 
          $myId10 = $length10['Establishment_id'];
         
          
          $getBack10 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId10} And Establishment_Town= '{$town}' ";
            $exe10 = mysql_query($getBack10);
             while ($len10 = mysql_fetch_array($exe10)) { 
                 $myActive10= $len10['Activity'];
                $roomCap10 = $len10['No_Rooms'];
                
               if($myActive10 == 'Pension' && ($roomCap10 < 10)) {  
              $okID10 = $len10['Establishment_Id']; 
     $sql1010 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID10} Group By Establishment_id";
    $result_set1010 = mysql_query($sql1010);                      
                   $i10=0;        
           while($length1010 = mysql_fetch_array($result_set1010))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro10 = $length1010['ro']; 
    $ob10 = $length1010['ob'];
    
    //Average Duration of Stay for non resident
    $nrg10 = $length1010['nrg'];   
    $tnrG10 = $length1010['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg10 = $length1010['rg'];
    $trg10 = $length1010['trg'];  
    $sum10 = $nrg10 + $rg10;
     $i10++;        
     if(!empty($ro10) && !empty($ob10) && !empty($nrg10) && !empty($trg10) && !empty($tnrG10)  && !empty($rg10) && !empty($sum10)) {       
      $to10[] = $ro10;     
      $men10[] = $ob10;
      $baby10[] = $nrg10;
      $babe10[] = $rg10;
      $wmen10[] = $sum10;
      $wat10[] = $tnrG10;
      $how10[] = $trg10;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
        
        
                    $some10=0;
                    $t10=0;
                    $m10=0;
                    $o10=0;
                    $q10=0;                                    
                    $twit10=0;
                    $book10=0;
                    $pen10=0;
                    $rateRO10=0;                  
                    $totalG10=0;
                    $totalQ10=0;
                    $tSquare10=0;
                    $trench10 = 0;
                    $dc10=0;
                    $volt10=0;
                    $alpha10=0;
                    $omega10=0;
                    $electric10=0;
                    $city10=0;
                    $row10=0;
                    $xls10=0;
                    $doc10=0;
                    $csv10=0;
                    $dat10=0;
                    $mdb10=0;
                    $eyes=0;                      
                    $divP=0;
                    $popP=0;
                    $cornP=0;
                    $lolyP=0;
                    $creamP=0;
                    $donatP=0;
                   
                   if(!empty($i10) && !empty($babe10)) {
                   while ($some10 < $i10) {
                   $twit10 = $twit10 + $baby10[$some10];
                   $book10 = $book10 + $babe10[$some10];
                   $pen10 = $pen10 + $wmen10[$some10];  
                     
                   $t10 = $t10 + $to10[$some10];  // offered rooms
                   $m10 = $m10 + $men10[$some10];  // offered beds
                   
                     //ppr
                   $rateRO10 = $m10 / $t10;
                   $tSquare10 = $rateRO10 * $t10;
                   //total Guest
                   $totalG10= $pen10 * 100;
                   //room Occupancy rate
                   $totalQ10 = $totalG10 / $t10;
                   
                   // bed Occupancy rate
                   $trench10 = $totalG10 / $m10;
                   
                   //average duration of stay non-resident                                    
                   $o10 = $o10 + $wat10[$some10];
                   $dc10 = $o10 / $rateRO10;
                   $volt10 = $t10 / $dc10;
                   
                   //average duration of stay resident                                    
                   $q10 = $q10 + $how10[$some10];
                   $alpha10 = $q10 / $rateRO10;
                   $omega10 = $t10 / $alpha10;
                   
                  // overall duration of stay 
                  $electric10 = $volt10 + $omega10;
                  $city10 = $electric10 / 2;             
                   
                   $some10++;
                   } 
                      }
                         
                 
                      
                    if(!empty($i10) && !empty($city10) && !empty($electric10) && !empty($omega10) && !empty($alpha10) && !empty($volt10) && !empty($dc10) && !empty($tSquare10) &&  !empty($trench10) &&  !empty($totalQ10) &&  !empty($totalG10) && !empty($t10) && !empty($m10) && !empty($o10) && !empty($rateRO10) && !empty($q10) && !empty($twit10) && !empty($book10) && !empty($pen10)) {
                     ?>
                    
                    <tr>
                    <td> < 10 </td> 
                    <td><?php echo $t10;?></td>
                    <td><?php echo $m10;?></td>
                    <td><?php echo $row10 = round($totalQ10,2).'%';?></td>
                    <td><?php echo $xls10 = round($trench10,2).'%';?></td>
                    <td><?php echo $doc10 = round($rateRO10,2);?></td>   
                    <td><?php echo $csv10 = round($volt10,2);?></td>
                    <td><?php echo $dat10 = round($omega10,2);?></td>
                    <td><?php echo $mdb10 = round($city10,2);?></td>                      
                    <td><?php echo $twit10;?></td>
                    <td><?php echo $book10;?></td>    
                    <td><?php echo $pen10;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('< 10','$t10','$m10','$row10','$xls10','$doc10','$csv10','$dat10','$mdb10','$twit10','$book10','$pen10')"); 
  
                    } 
                    
                    // sub Total
                  
                    $cellP1 = $t52 + $t25 + $t15 + $t9 + $t50 + $t30 + $t29 + $t19 + $t10;
                    $cellP2 = $m52 + $m25 + $m15 + $m9 + $m50 + $m30 + $m29 + $m19 + $m10;
                    $rowP2 =  $o52 + $o25 + $o15 + $o9 + $o50 + $o30 + $o29 + $o19 + $o10; 
                    $tourismP = $q52 + $q25 + $q15 + $q9 + $q50 + $q30 + $q29 + $q19 + $q10;
                    
                    $cellP3 = $row52 + $row25 + $row15 + $row9 + $row50 + $row30 + $row29 + $row19 + $row10;
                    $cellP4 = $xls52 + $xls25 + $xls15 + $xls9 + $xls50 + $xls30 + $xls29 + $xls19 + $xls10;
                    $cellP5 = $doc52 + $doc25 + $doc15 + $doc9 + $doc50 + $doc30 + $doc29 + $doc19 + $doc10;
                    $cellP6 = $csv52 + $csv25 + $csv15 + $csv9 + $csv50 + $csv30 + $csv29 + $csv19 + $csv10;
                    $cellP7 = $dat52 + $dat25 + $dat15 + $dat9 + $dat50 + $dat30 + $dat29 + $dat19 + $dat10;
                    $cellP8 = $mdb52 + $mdb25 + $mdb15 + $mdb9 + $mdb50 + $mdb30 + $mdb29 + $mdb19 + $mdb10;
                    $cellP9 = $twit52 + $twit25 + $twit15 + $twit9 + $twit50 + $twit30 + $twit29 + $twit19 + $twit10;
                    $cellP10 = $book52 + $book25 + $book15 + $book9 + $book50 + $book30 + $book29 + $book19 + $book10;
                    $cellP11 = $pen52 + $pen25 + $pen15 + $pen9 + $pen50 + $pen30 + $pen29 + $pen19 + $pen10;                    
                 
                   if(!empty($cellP1)) {
                    $parabola = $cellP11 * 100;
                    // person per room
                    $circle = $cellP2 / $cellP1;
                    // non residence
                    $sphere = $rowP2 / $circle;
                    $joint = $cellP1 / $sphere;
                    //residence
                    $nsa = $tourismP / $circle;
                    $grow = $cellP1 /$nsa;
                    //overall
                    $grownup = $joint + $grow;
                    $downlink = $grownup / 2;
                    
                    $divP = round($parabola / $cellP1,2);
                    $popP = round($parabola / $cellP2,2);
                    $cornP = round($circle,2);
                    $lolyP = round($joint,2);
                    $creamP = round($grow,2);
                    $donatP = round($downlink,2);
                   }
                    if(!empty($divP) && !empty($popP) && !empty($cornP) && !empty($lolyP) && !empty($creamP) && !empty($donatP)) {          
                     ?>
                    <tr>
                    <td class="success"><i style="color:blue; font-size:18px; font-weight: bold;">Total</i></td> 
                    <td class="danger"><?php echo $cellP1;?></td>
                    <td class="danger"><?php echo $cellP2;?></td>
                    <td class="danger"><?php echo $divP.'%';?></td>
                    <td class="danger"><?php echo $popP.'%';?></td>
                    <td class="danger"><?php echo $cornP;?></td>   
                    <td class="success"><?php echo $lolyP;?></td>
                    <td class="success"><?php echo $creamP;?></td>
                    <td class="success"><?php echo $donatP;?></td>                      
                    <td class="info"><?php echo $cellP9;?></td>
                    <td class="info"><?php echo $cellP10;?></td>    
                    <td class="info"><?php echo $cellP11;?></td>
                    </tr>
               <?php }  ?>
          
          <!--Guest House-->
                  <tr>
                  <td colspan="12" style="color:blue; font-size:18px; font-weight: bold;"><i><?php echo $town;?></i><i style="margin-left:60px;"> Guest House</i></td>  
                  </tr>           
        
          <?php 
          
    // 500 - 251
    
 $sql52 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set52 = mysql_query($sql52);                   
            $i52=0;  
           while($length52 = mysql_fetch_array($result_set52))  
            { 
          $myId52 = $length52['Establishment_id'];
         
          
          $getBack52 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId52} And Establishment_Town= '{$town}' ";
            $exe52 = mysql_query($getBack52);
             while ($len52 = mysql_fetch_array($exe52)) { 
                 $myActive52= $len52['Activity'];
                $roomCap52 = $len52['No_Rooms'];
                
               if($myActive52 == 'Guest House' && ($roomCap52 <=520 && $roomCap52 >=251)) {  
              $okID52 = $len52['Establishment_Id']; 
     $sql5252 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID52} Group By Establishment_id";
    $result_set5252 = mysql_query($sql5252);                      
                   $i52=0;        
           while($length5252 = mysql_fetch_array($result_set5252))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro52 = $length5252['ro']; 
    $ob52 = $length5252['ob'];
    
    //Average Duration of Stay for non resident
    $nrg52 = $length5252['nrg'];   
    $tnrG52 = $length5252['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg52 = $length5252['rg'];
    $trg52 = $length5252['trg'];  
    $sum52 = $nrg52 + $rg52;
     $i52++;        
     if(!empty($ro52) && !empty($ob52) && !empty($nrg52) && !empty($trg52) && !empty($tnrG52)  && !empty($rg52) && !empty($sum52)) {       
      $to52[] = $ro52;     
      $men52[] = $ob52;
      $baby52[] = $nrg52;
      $babe52[] = $rg52;
      $wmen52[] = $sum52;
      $wat52[] = $tnrG52;
      $how52[] = $trg52;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
        
                    $some52=0;
                    $t52=0;
                    $m52=0;
                    $o52=0;
                    $q52=0;                                    
                    $twit52=0;
                    $book52=0;
                    $pen52=0;
                    $rateRO52=0;                  
                    $totalG52=0;
                    $totalQ52=0;
                    $tSquare52=0;
                    $trench52 = 0;
                    $dc52=0;
                    $volt52=0;
                    $alpha52=0;
                    $omega52=0;
                    $electric52=0;
                    $city52=0;
                    $row52=0;
                    $xls52=0;
                    $doc52=0;
                    $csv52=0;
                    $dat52=0;
                    $mdb52=0;
                    
                   if(!empty($i52) && !empty($babe52)) {
                   while ($some52 < $i52) {
                   $twit52 = $twit52 + $baby52[$some52];
                   $book52 = $book52 + $babe52[$some52];
                   $pen52 = $pen52 + $wmen52[$some52];  
                     
                   $t52 = $t52 + $to52[$some52];  // offered rooms
                   $m52 = $m52 + $men52[$some52];  // offered beds
                   
                     //ppr
                   $rateRO52 = $m52 / $t52;
                   $tSquare52 = $rateRO52 * $t52;
                   //total Guest
                   $totalG52= $pen52 * 100;
                   //room Occupancy rate
                   $totalQ52 = $totalG52 / $t52;
                   
                   // bed Occupancy rate
                   $trench52 = $totalG52 / $m52;
                   
                   //average duration of stay non-resident                                    
                   $o52 = $o52 + $wat52[$some52];
                   $dc52 = $o52 / $rateRO52;
                   $volt52 = $t52 / $dc52;
                   
                   //average duration of stay resident                                    
                   $q52 = $q52 + $how52[$some52];
                   $alpha52 = $q52 / $rateRO52;
                   $omega52 = $t52 / $alpha52;
                   
                  // overall duration of stay 
                  $electric52 = $volt52 + $omega52;
                  $city52 = $electric52 / 2;             
                   
                   $some52++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i52) && !empty($city52) && !empty($electric52) && !empty($omega52) && !empty($alpha52) && !empty($volt52) && !empty($dc52) && !empty($tSquare52) &&  !empty($trench52) &&  !empty($totalQ52) &&  !empty($totalG52) && !empty($t52) && !empty($m52) && !empty($o52) && !empty($rateRO52) && !empty($q52) && !empty($twit52) && !empty($book52) && !empty($pen52)) {
                     ?>
                    
                   <tr>
                    <td>500 - 251</td> 
                    <td><?php echo $t52;?></td>
                    <td><?php echo $m52;?></td>
                    <td><?php echo $row52 = round($totalQ52,2).'%';?></td>
                    <td><?php echo $xls52 = round($trench52,2).'%';?></td>
                    <td><?php echo $doc52 = round($rateRO52,2);?></td>   
                    <td><?php echo $csv52 = round($volt52,2);?></td>
                    <td><?php echo $dat52 = round($omega52,2);?></td>
                    <td><?php echo $mdb52 = round($city52,2);?></td>                         
                    <td><?php echo $twit52;?></td>
                    <td><?php echo $book52;?></td>    
                    <td><?php echo $pen52;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
         values('500 - 251','$t52','$m52','$row52','$xls52','$doc52','$csv52','$dat52','$mdb52','$twit52','$book52','$pen52')"); 
     
                    } 
  
  
  
  // 250-151
 $sql25 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set25 = mysql_query($sql25);                   
            $i25=0;  
           while($length25 = mysql_fetch_array($result_set25))  
            { 
          $myId25 = $length25['Establishment_id'];
         
          
          $getBack25 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId25} And Establishment_Town= '{$town}' ";
            $exe25 = mysql_query($getBack25);
             while ($len25 = mysql_fetch_array($exe25)) { 
                 $myActive25= $len25['Activity'];
                $roomCap25 = $len25['No_Rooms'];
                
               if($myActive25 == 'Guest House' && ($roomCap25 <=250 && $roomCap25 >=151)) {  
              $okID25 = $len25['Establishment_Id']; 
     $sql2525 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID25} Group By Establishment_id";
    $result_set2525 = mysql_query($sql2525);                      
                   $i25=0;        
           while($length2525 = mysql_fetch_array($result_set2525))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro25 = $length2525['ro']; 
    $ob25 = $length2525['ob'];
    
    //Average Duration of Stay for non resident
    $nrg25 = $length2525['nrg'];   
    $tnrG25 = $length2525['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg25 = $length2525['rg'];
    $trg25 = $length2525['trg'];  
    $sum25 = $nrg25 + $rg25;
     $i25++;        
     if(!empty($ro25) && !empty($ob25) && !empty($nrg25) && !empty($trg25) && !empty($tnrG25)  && !empty($rg25) && !empty($sum25)) {       
      $to25[] = $ro25;     
      $men25[] = $ob25;
      $baby25[] = $nrg25;
      $babe25[] = $rg25;
      $wmen25[] = $sum25;
      $wat25[] = $tnrG25;
      $how25[] = $trg25;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
           
                    $some25=0;
                    $t25=0;
                    $m25=0;
                    $o25=0;
                    $q25=0;                                    
                    $twit25=0;
                    $book25=0;
                    $pen25=0;
                    $rateRO25=0;                  
                    $totalG25=0;
                    $totalQ25=0;
                    $tSquare25=0;
                    $trench25 = 0;
                    $dc25=0;
                    $volt25=0;
                    $alpha25=0;
                    $omega25=0;
                    $electric25=0;
                    $city25=0;
                    $row25=0;
                    $xls25=0;
                    $doc25=0;
                    $csv25=0;
                    $dat25=0;
                    $mdb25=0;
                    
                   if(!empty($i25) && !empty($babe25)) {
                   while ($some25 < $i25) {
                   $twit25 = $twit25 + $baby25[$some25];
                   $book25 = $book25 + $babe25[$some25];
                   $pen25 = $pen25 + $wmen25[$some25];  
                     
                   $t25 = $t25 + $to25[$some25];  // offered rooms
                   $m25 = $m25 + $men25[$some25];  // offered beds
                   
                     //ppr
                   $rateRO25 = $m25 / $t25;
                   $tSquare25 = $rateRO25 * $t25;
                   //total Guest
                   $totalG25= $pen25 * 100;
                   //room Occupancy rate
                   $totalQ25 = $totalG25 / $t25;
                   
                   // bed Occupancy rate
                   $trench25 = $totalG25 / $m25;
                   
                   //average duration of stay non-resident                                    
                   $o25 = $o25 + $wat25[$some25];
                   $dc25 = $o25 / $rateRO25;
                   $volt25 = $t25 / $dc25;
                   
                   //average duration of stay resident                                    
                   $q25 = $q25 + $how25[$some25];
                   $alpha25 = $q25 / $rateRO25;
                   $omega25 = $t25 / $alpha25;
                   
                  // overall duration of stay 
                  $electric25 = $volt25 + $omega25;
                  $city25 = $electric25 / 2;             
                   
                   $some25++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i25) && !empty($city25) && !empty($electric25) && !empty($omega25) && !empty($alpha25) && !empty($volt25) && !empty($dc25) && !empty($tSquare25) &&  !empty($trench25) &&  !empty($totalQ25) &&  !empty($totalG25) && !empty($t25) && !empty($m25) && !empty($o25) && !empty($rateRO25) && !empty($q25) && !empty($twit25) && !empty($book25) && !empty($pen25)) {
                     ?>
                    
                   <tr>
                    <td>250 - 251</td> 
                    <td><?php echo $t25;?></td>
                    <td><?php echo $m25;?></td>
                    <td><?php echo $row25 = round($totalQ25,2).'%';?></td>
                    <td><?php echo $xls25 = round($trench25,2).'%';?></td>
                    <td><?php echo $doc25 = round($rateRO25,2);?></td>   
                    <td><?php echo $csv25 = round($volt25,2);?></td>
                    <td><?php echo $dat25 = round($omega25,2);?></td>
                    <td><?php echo $mdb25 = round($city25,2);?></td>                              
                    <td><?php echo $twit25;?></td>
                    <td><?php echo $book25;?></td>    
                    <td><?php echo $pen25;?></td>
                    </tr>
                    <?php 
                     $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('250 - 251','$t25','$m25','$row25','$xls25','$doc25','$csv25','$dat25','$mdb25','$twit25','$book25','$pen25')"); 
     
                    } 
  
  
  
  // 150-91
   
 $sql15 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set15 = mysql_query($sql15);                   
            $i15=0;  
           while($length15 = mysql_fetch_array($result_set15))  
            { 
          $myId15 = $length15['Establishment_id'];
         
          
          $getBack15 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId15} And Establishment_Town= '{$town}' ";
            $exe15 = mysql_query($getBack15);
             while ($len15 = mysql_fetch_array($exe15)) { 
                 $myActive15= $len15['Activity'];
                $roomCap15 = $len15['No_Rooms'];
                
               if($myActive15 == 'Guest House' && ($roomCap15 <=150 && $roomCap15 >=91)) {  
              $okID15 = $len15['Establishment_Id']; 
     $sql1515 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID15} Group By Establishment_id";
    $result_set1515 = mysql_query($sql1515);                      
                   $i15=0;        
           while($length1515 = mysql_fetch_array($result_set1515))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro15 = $length1515['ro']; 
    $ob15 = $length1515['ob'];
    
    //Average Duration of Stay for non resident
    $nrg15 = $length1515['nrg'];   
    $tnrG15 = $length1515['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg15 = $length1515['rg'];
    $trg15 = $length1515['trg'];  
    $sum15 = $nrg15 + $rg15;
     $i15++;        
     if(!empty($ro15) && !empty($ob15) && !empty($nrg15) && !empty($trg15) && !empty($tnrG15)  && !empty($rg15) && !empty($sum15)) {       
      $to15[] = $ro15;     
      $men15[] = $ob15;
      $baby15[] = $nrg15;
      $babe15[] = $rg15;
      $wmen15[] = $sum15;
      $wat15[] = $tnrG15;
      $how15[] = $trg15;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
        
                    $some15=0;
                    $t15=0;
                    $m15=0;
                    $o15=0;
                    $q15=0;                                    
                    $twit15=0;
                    $book15=0;
                    $pen15=0;
                    $rateRO15=0;                  
                    $totalG15=0;
                    $totalQ15=0;
                    $tSquare15=0;
                    $trench15 = 0;
                    $dc15=0;
                    $volt15=0;
                    $alpha15=0;
                    $omega15=0;
                    $electric15=0;
                    $city15=0;
                    $row15=0;
                    $xls15=0;
                    $doc15=0;
                    $csv15=0;
                    $dat15=0;
                    $mdb15=0;
                    
                   if(!empty($i15) && !empty($babe15)) {
                   while ($some15 < $i15) {
                   $twit15 = $twit15 + $baby15[$some15];
                   $book15 = $book15 + $babe15[$some15];
                   $pen15 = $pen15 + $wmen15[$some15];  
                     
                   $t15 = $t15 + $to15[$some15];  // offered rooms
                   $m15 = $m15 + $men15[$some15];  // offered beds
                   
                     //ppr
                   $rateRO15 = $m15 / $t15;
                   $tSquare15 = $rateRO15 * $t15;
                   //total Guest
                   $totalG15= $pen15 * 100;
                   //room Occupancy rate
                   $totalQ15 = $totalG15 / $t15;
                   
                   // bed Occupancy rate
                   $trench15 = $totalG15 / $m15;
                   
                   //average duration of stay non-resident                                    
                   $o15 = $o15 + $wat15[$some15];
                   $dc15 = $o15 / $rateRO15;
                   $volt15 = $t15 / $dc15;
                   
                   //average duration of stay resident                                    
                   $q15 = $q15 + $how15[$some15];
                   $alpha15 = $q15 / $rateRO15;
                   $omega15 = $t15 / $alpha15;
                   
                  // overall duration of stay 
                  $electric15 = $volt15 + $omega15;
                  $city15 = $electric15 / 2;             
                   
                   $some15++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i15) && !empty($city15) && !empty($electric15) && !empty($omega15) && !empty($alpha15) && !empty($volt15) && !empty($dc15) && !empty($tSquare15) &&  !empty($trench15) &&  !empty($totalQ15) &&  !empty($totalG15) && !empty($t15) && !empty($m15) && !empty($o15) && !empty($rateRO15) && !empty($q15) && !empty($twit15) && !empty($book15) && !empty($pen15)) {
                     ?>
                    
                   <tr>
                    <td>150 - 91</td> 
                    <td><?php echo $t15;?></td>
                    <td><?php echo $m15;?></td>
                    <td><?php echo $row15 = round($totalQ15,2).'%';?></td>
                    <td><?php echo $xls15 = round($trench15,2).'%';?></td>
                    <td><?php echo $doc15 = round($rateRO15,2);?></td>   
                    <td><?php echo $csv15 = round($volt15,2);?></td>
                    <td><?php echo $dat15 = round($omega15,2);?></td>
                    <td><?php echo $mdb15 = round($city15,2);?></td>                           
                    <td><?php echo $twit15;?></td>
                    <td><?php echo $book15;?></td>    
                    <td><?php echo $pen15;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('150 - 91','$t15','$m15','$row15','$xls15','$doc15','$csv15','$dat15','$mdb15','$twit15','$book15','$pen15')"); 
    
                    } ?>
  
  
  <?php
    // 90 - 71
    
 $sql9 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set9 = mysql_query($sql9);                   
            $i90=0;  
           while($length9 = mysql_fetch_array($result_set9))  
            { 
          $myId9 = $length9['Establishment_id'];
         
          
          $getBack9 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId9} And Establishment_Town= '{$town}' ";
            $exe9 = mysql_query($getBack9);
             while ($len9 = mysql_fetch_array($exe9)) { 
                 $myActive9= $len9['Activity'];
                $roomCap9 = $len9['No_Rooms'];
                
               if($myActive9 == 'Guest House' && ($roomCap9 <=90 && $roomCap9 >=71)) {  
              $okID9 = $len9['Establishment_Id']; 
     $sql99 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID9} Group By Establishment_id";
    $result_set99 = mysql_query($sql99);                      
                   $i90=0;        
           while($length99 = mysql_fetch_array($result_set99))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro9 = $length99['ro']; 
    $ob9 = $length99['ob'];
    
    //Average Duration of Stay for non resident
    $nrg9 = $length99['nrg'];   
    $tnrG9 = $length99['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg9 = $length99['rg'];
    $trg9 = $length99['trg'];  
    $sum9 = $nrg9 + $rg9;
     $i90++;        
     if(!empty($ro9) && !empty($ob9) && !empty($nrg9) && !empty($trg9) && !empty($tnrG9)  && !empty($rg9) && !empty($sum9)) {       
      $to9[] = $ro9;     
      $men9[] = $ob9;
      $baby9[] = $nrg9;
      $babe9[] = $rg9;
      $wmen9[] = $sum9;
      $wat9[] = $tnrG9;
      $how9[] = $trg9;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
        
                    $some9=0;
                    $t9=0;
                    $m9=0;
                    $o9=0;
                    $q9=0;                                    
                    $twit9=0;
                    $book9=0;
                    $pen9=0;
                    $rateRO9=0;                  
                    $totalG9=0;
                    $totalQ9=0;
                    $tSquare9=0;
                    $trench9 = 0;
                    $dc9=0;
                    $volt9=0;
                    $alpha9=0;
                    $omega9=0;
                    $electric9=0;
                    $city9=0;
                    $row9=0;
                    $xls9=0;
                    $doc9=0;
                    $csv9=0;
                    $dat9=0;
                    $mdb9=0;
                   
                   if(!empty($i90) && !empty($babe9)) {
                   while ($some9 < $i90) {
                   $twit9 = $twit9 + $baby9[$some9];
                   $book9 = $book9 + $babe9[$some9];
                   $pen9 = $pen9 + $wmen9[$some9];  
                     
                   $t9 = $t9 + $to9[$some9];  // offered rooms
                   $m9 = $m9 + $men9[$some9];  // offered beds
                   
                     //ppr
                   $rateRO9 = $m9 / $t9;
                   $tSquare9 = $rateRO9 * $t9;
                   //total Guest
                   $totalG9= $pen9 * 100;
                   //room Occupancy rate
                   $totalQ9 = $totalG9 / $t9;
                   
                   // bed Occupancy rate
                   $trench9 = $totalG9 / $m9;
                   
                   //average duration of stay non-resident                                    
                   $o9 = $o9 + $wat9[$some9];
                   $dc9 = $o9 / $rateRO9;
                   $volt9 = $t9 / $dc9;
                   
                   //average duration of stay resident                                    
                   $q9 = $q9 + $how9[$some9];
                   $alpha9 = $q9 / $rateRO9;
                   $omega9 = $t9 / $alpha9;
                   
                  // overall duration of stay 
                  $electric9 = $volt9 + $omega9;
                  $city9 = $electric9 / 2;             
                   
                   $some9++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i90) && !empty($city9) && !empty($electric9) && !empty($omega9) && !empty($alpha9) && !empty($volt9) && !empty($dc9) && !empty($tSquare9) &&  !empty($trench9) &&  !empty($totalQ9) &&  !empty($totalG9) && !empty($t9) && !empty($m9) && !empty($o9) && !empty($rateRO9) && !empty($q9) && !empty($twit9) && !empty($book9) && !empty($pen9)) {
                     ?>
                    
                   <tr>
                    <td>90 - 71</td> 
                    <td><?php echo $t9;?></td>
                    <td><?php echo $m9;?></td>
                    <td><?php echo $row9 = round($totalQ9,2).'%';?></td>
                    <td><?php echo $xls9 = round($trench9,2).'%';?></td>
                    <td><?php echo $doc9 = round($rateRO9,2);?></td>   
                    <td><?php echo $csv9 = round($volt9,2);?></td>
                    <td><?php echo $dat9 = round($omega9,2);?></td>
                    <td><?php echo $mdb9 = round($city9,2);?></td>                               
                    <td><?php echo $twit9;?></td>
                    <td><?php echo $book9;?></td>    
                    <td><?php echo $pen9;?></td>
                    </tr>
                    <?php 
                     $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('90 - 71','$t9','$m9','$row9','$xls9','$doc9','$csv9','$dat9','$mdb9','$twit9','$book9','$pen9')"); 
   
                    } 
    //  70-50
     
$sql50 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set50 = mysql_query($sql50);                      
             $i50=0;       
           while($length50 = mysql_fetch_array($result_set50))  
            { 
          $myId50 = $length50['Establishment_id'];
         
          
          $getBack50 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId50} And Establishment_Town= '{$town}' ";
            $exe50 = mysql_query($getBack50);
             while ($len50 = mysql_fetch_array($exe50)) { 
                 $myActive50= $len50['Activity'];
                $roomCap50 = $len50['No_Rooms'];
              
      if ($myActive50 == 'Guest House' && ($roomCap50 <=70 && $roomCap50 >=50)) {
      $okID50 = $len50['Establishment_Id']; 
     $sql55 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID50} Group By Establishment_id";
    $result_set55 = mysql_query($sql55);                      
                   $i50=0;        
           while($length55 = mysql_fetch_array($result_set55))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro50 = $length55['ro']; 
    $ob50 = $length55['ob'];
    
    //Average Duration of Stay for non resident
    $nrg50 = $length55['nrg'];   
    $tnrG50 = $length55['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg50 = $length55['rg'];
    $trg50 = $length55['trg'];  
    $sum50 = $nrg50 + $rg50;
     $i50++;        
     if(!empty($ro50) && !empty($ob50) && !empty($nrg50) && !empty($trg50) && !empty($tnrG50)  && !empty($rg50) && !empty($sum50)) {       
      $to50[] = $ro50;     
      $men50[] = $ob50;
      $baby50[] = $nrg50;
      $babe50[] = $rg50;
      $wmen50[] = $sum50;
      $wat50[] = $tnrG50;
      $how50[] = $trg50;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
    
                    $some50=0;
                    $t50=0;
                    $m50=0;
                    $o50=0;
                    $q50=0;                                    
                    $twit50=0;
                    $book50=0;
                    $pen50=0;
                    $rateRO50=0;                  
                    $totalG50=0;
                    $totalQ50=0;
                    $tSquare50=0;
                    $trench50 = 0;
                    $dc50=0;
                    $volt50=0;
                    $alpha50=0;
                    $omega50=0;
                    $electric50=0;
                    $city50=0;
                    $row50=0;
                    $xls50=0;
                    $doc50=0;
                    $csv50=0;
                    $dat50=0;
                    $mdb50=0;
                    
                  
                   if(!empty($i50) && !empty($baby50)) {
                   while ($some50 < $i50) {
                   $twit50 = $twit50 + $baby50[$some50];
                   $book50 = $book50 + $babe50[$some50];
                   $pen50 = $pen50 + $wmen50[$some50];  
                     
                   $t50 = $t50 + $to50[$some50];  // offered rooms
                   $m50 = $m50 + $men50[$some50];  // offered beds
                   
                     //ppr
                   $rateRO50 = $m50 / $t50;
                   $tSquare50 = $rateRO50 * $t50;
                   //total Guest
                   $totalG50= $pen50 * 100;
                   //room Occupancy rate
                   $totalQ50 = $totalG50 / $t50;
                   
                   // bed Occupancy rate
                   $trench50 = $totalG50 / $m50;
                   
                   //average duration of stay non-resident                                    
                   $o50 = $o50 + $wat50[$some50];
                   $dc50 = $o50 / $rateRO50;
                   $volt50 = $t50 / $dc50;
                   
                   //average duration of stay resident                                    
                   $q50 = $q50 + $how50[$some50];
                   $alpha50 = $q50 / $rateRO50;
                   $omega50 = $t50 / $alpha50;
                   
                  // overall duration of stay 
                  $electric50 = $volt50 + $omega50;
                  $city50 = $electric50 / 2;             
                   
                   $some50++;
                   } 
                      }
                   
                      
                    if(!empty($i50) && !empty($city50) && !empty($electric50) && !empty($omega50) && !empty($alpha50) 
                    && !empty($volt50) && !empty($dc50) && !empty($tSquare50) &&  !empty($trench50) &&  !empty($totalQ50) 
                    &&  !empty($totalG50) && !empty($t50) && !empty($m50) && !empty($o50) && !empty($rateRO50) && !empty($q50)
                     && !empty($twit50) && !empty($book50) && !empty($pen50)) {
                     ?>
                    
                   <tr>
                    <td>70 - 50</td> 
                    <td><?php echo $t50;?></td>
                    <td><?php echo $m50;?></td>
                    <td><?php echo $row5 = round($totalQ50,2).'%';?></td>
                    <td><?php echo $xls5 = round($trench50,2).'%';?></td>
                    <td><?php echo $doc5 = round($rateRO50,2);?></td>   
                    <td><?php echo $csv5 = round($volt50,2);?></td>
                    <td><?php echo $dat5 = round($omega50,2);?></td>
                    <td><?php echo $mdb5 = round($city50,2);?></td>                         
                    <td><?php echo $twit50;?></td>
                    <td><?php echo $book50;?></td>    
                    <td><?php echo $pen50;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('70 - 50','$t50','$m50','$row5','$xls5','$doc5','$csv5','$dat5','$mdb5','$twit50','$book50','$pen50')"); 
    
                    } 
                                        
                    
                    // 49 - 30
$sql30 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set30 = mysql_query($sql30);                      
               $i30=0;            
           while($length30 = mysql_fetch_array($result_set30))  
            { 
          $myId30 = $length30['Establishment_id'];
         
          
          $getBack30 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId30} And Establishment_Town= '{$town}' ";
            $exe30 = mysql_query($getBack30);
             while ($len30 = mysql_fetch_array($exe30)) { 
                 $myActive30= $len30['Activity'];
                $roomCap30 = $len30['No_Rooms'];
                   
      if ($myActive30 == 'Guest House' && ($roomCap30 <=49 && $roomCap30 >=30)) {
       $okID = $len30['Establishment_Id']; 
     $sql33 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID} Group By Establishment_id";
    $result_set33 = mysql_query($sql33);                      
                $i30=0;       
           while($length33 = mysql_fetch_array($result_set33))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro30 = $length33['ro']; 
    $ob30 = $length33['ob'];
    
    //Average Duration of Stay for non resident
    $nrg30 = $length33['nrg'];   
    $tnrG30 = $length33['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg30 = $length33['rg'];
    $trg30 = $length33['trg'];  
    $sum30 = $nrg30 + $rg30;
     $i30++;        
     if(!empty($ro30) && !empty($ob30) && !empty($nrg30) && !empty($trg30) && !empty($tnrG30)  && !empty($rg30) && !empty($sum30)) {       
      $to30[] = $ro30;     
      $men30[] = $ob30;
      $baby30[] = $nrg30;
      $babe30[] = $rg30;
      $wmen30[] = $sum30;
      $wat30[] = $tnrG30;
      $how30[] = $trg30;     
      
              }
        ?>
    
    
  
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
     
                    $some30=0;
                    $t30=0;
                    $m30=0;
                    $o30=0;
                    $q30=0;                                    
                    $twit30=0;
                    $book30=0;
                    $pen30=0;
                    $rateRO30=0;                  
                    $totalG30=0;
                    $totalQ30=0;
                    $tSquare30=0;
                    $trench30 = 0;
                    $dc30=0;
                    $volt30=0;
                    $alpha30=0;
                    $omega30=0;
                    $electric30=0;
                    $city30=0;
                    $row30=0;
                    $xls30=0;
                    $doc30=0;
                    $csv30=0;
                    $dat30=0;
                    $mdb30=0;
                  
                   if(!empty($i30) && !empty($baby30)) {
                   while ($some30 < $i30) {
                   $twit30 = $twit30 + $baby30[$some30];
                   $book30 = $book30 + $babe30[$some30];
                   $pen30 = $pen30 + $wmen30[$some30];  
                     
                   $t30 = $t30 + $to30[$some30];  // offered rooms
                   $m30 = $m30 + $men30[$some30];  // offered beds
                   
                     //ppr
                   $rateRO30 = $m30 / $t30;
                   $tSquare30 = $rateRO30 * $t30;
                   //total Guest
                   $totalG30= $pen30 * 100;
                   //room Occupancy rate
                   $totalQ30 = $totalG30 / $t30;
                   
                   // bed Occupancy rate
                   $trench30 = $totalG30 / $m30;
                   
                   //average duration of stay non-resident                                    
                   $o30 = $o30 + $wat30[$some30];
                   $dc30 = $o30 / $rateRO30;
                   $volt30 = $t30 / $dc30;
                   
                   //average duration of stay resident                                    
                   $q30 = $q30 + $how30[$some30];
                   $alpha30 = $q30 / $rateRO30;
                   $omega30 = $t30 / $alpha30;
                   
                  // overall duration of stay 
                  $electric30 = $volt30 + $omega30;
                  $city30 = $electric30 / 2;             
                   
                   $some30++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i30) && !empty($city30) && !empty($electric30) && !empty($omega30) && !empty($alpha30) && !empty($volt30) && !empty($dc30) && !empty($tSquare30) &&  !empty($trench30) &&  !empty($totalQ30) &&  !empty($totalG30) && !empty($t30) && !empty($m30) && !empty($o30) && !empty($rateRO30) && !empty($q30) && !empty($twit30) && !empty($book30) && !empty($pen30)) {
                     ?>
                    
                   <tr>
                    <td>49 - 30</td> 
                    <td><?php echo $t30;?></td>
                    <td><?php echo $m30;?></td>
                    <td><?php echo $row30 = round($totalQ30,2).'%';?></td>
                    <td><?php echo $xls30 = round($trench30,2).'%';?></td>
                    <td><?php echo $doc30 = round($rateRO30,2);?></td>   
                    <td><?php echo $csv30 = round($volt30,2);?></td>
                    <td><?php echo $dat30 = round($omega30,2);?></td>
                    <td><?php echo $mdb30 = round($city30,2);?></td>                                
                    <td><?php echo $twit30;?></td>
                    <td><?php echo $book30;?></td>    
                    <td><?php echo $pen30;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('49 - 30','$t30','$m30','$row30','$xls30','$doc30','$csv30','$dat30','$mdb30','$twit30','$book30','$pen30')"); 
    
                    } 
    
    
  //29 - 20
 $sql29 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set29 = mysql_query($sql29);                   
            $i29=0;  
           while($length29 = mysql_fetch_array($result_set29))  
            { 
          $myId29 = $length29['Establishment_id'];
         
          
          $getBack29 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId29} And Establishment_Town= '{$town}' ";
            $exe29 = mysql_query($getBack29);
             while ($len29 = mysql_fetch_array($exe29)) { 
                 $myActive29= $len29['Activity'];
                $roomCap29 = $len29['No_Rooms'];
                
               if($myActive29 == 'Guest House' && ($roomCap29 <=29 && $roomCap29 >=20)) {  
              $okID29 = $len29['Establishment_Id']; 
     $sql2929 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID29} Group By Establishment_id";
    $result_set2929 = mysql_query($sql2929);                      
                   $i29=0;        
           while($length2929 = mysql_fetch_array($result_set2929))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro29 = $length2929['ro']; 
    $ob29 = $length2929['ob'];
    
    //Average Duration of Stay for non resident
    $nrg29 = $length2929['nrg'];   
    $tnrG29 = $length2929['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg29 = $length2929['rg'];
    $trg29 = $length2929['trg'];  
    $sum29 = $nrg29 + $rg29;
     $i29++;        
     if(!empty($ro29) && !empty($ob29) && !empty($nrg29) && !empty($trg29) && !empty($tnrG29)  && !empty($rg29) && !empty($sum29)) {       
      $to29[] = $ro29;     
      $men29[] = $ob29;
      $baby29[] = $nrg29;
      $babe29[] = $rg29;
      $wmen29[] = $sum29;
      $wat29[] = $tnrG29;
      $how29[] = $trg29;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
           
                    $some29=0;
                    $t29=0;
                    $m29=0;
                    $o29=0;
                    $q29=0;                                    
                    $twit29=0;
                    $book29=0;
                    $pen29=0;
                    $rateRO29=0;                  
                    $totalG29=0;
                    $totalQ29=0;
                    $tSquare29=0;
                    $trench29 = 0;
                    $dc29=0;
                    $volt29=0;
                    $alpha29=0;
                    $omega29=0;
                    $electric29=0;
                    $city29=0;
                    $row29=0;
                    $xls29=0;
                    $doc29=0;
                    $csv29=0;
                    $dat29=0;
                    $mdb29=0;
                    
                   if(!empty($i29) && !empty($babe29)) {
                   while ($some29 < $i29) {
                   $twit29 = $twit29 + $baby29[$some29];
                   $book29 = $book29 + $babe29[$some29];
                   $pen29 = $pen29 + $wmen29[$some29];  
                     
                   $t29 = $t29 + $to29[$some29];  // offered rooms
                   $m29 = $m29 + $men29[$some29];  // offered beds
                   
                     //ppr
                   $rateRO29 = $m29 / $t29;
                   $tSquare29 = $rateRO29 * $t29;
                   //total Guest
                   $totalG29= $pen29 * 100;
                   //room Occupancy rate
                   $totalQ29 = $totalG29 / $t29;
                   
                   // bed Occupancy rate
                   $trench29 = $totalG29 / $m29;
                   
                   //average duration of stay non-resident                                    
                   $o29 = $o29 + $wat29[$some29];
                   $dc29 = $o29 / $rateRO29;
                   $volt29 = $t29 / $dc29;
                   
                   //average duration of stay resident                                    
                   $q29 = $q29 + $how29[$some29];
                   $alpha29 = $q29 / $rateRO29;
                   $omega29 = $t29 / $alpha29;
                   
                  // overall duration of stay 
                  $electric29 = $volt29 + $omega29;
                  $city29 = $electric29 / 2;             
                   
                   $some29++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i29) && !empty($city29) && !empty($electric29) && !empty($omega29) && !empty($alpha29) && !empty($volt29) && !empty($dc29) && !empty($tSquare29) &&  !empty($trench29) &&  !empty($totalQ29) &&  !empty($totalG29) && !empty($t29) && !empty($m29) && !empty($o29) && !empty($rateRO29) && !empty($q29) && !empty($twit29) && !empty($book29) && !empty($pen29)) {
                     ?>
                    
                   <tr>
                    <td>29 - 20</td> 
                    <td><?php echo $t29;?></td>
                    <td><?php echo $m29;?></td>
                    <td><?php echo $row29 = round($totalQ29,2).'%';?></td>
                    <td><?php echo $xls29 = round($trench29,2).'%';?></td>
                    <td><?php echo $doc29 = round($rateRO29,2);?></td>   
                    <td><?php echo $csv29 = round($volt29,2);?></td>
                    <td><?php echo $dat29 = round($omega29,2);?></td>
                    <td><?php echo $mdb29 = round($city29,2);?></td>                         
                    <td><?php echo $twit29;?></td>
                    <td><?php echo $book29;?></td>    
                    <td><?php echo $pen29;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('29 - 20','$t29','$m29','$row29','$xls29','$doc29','$csv29','$dat29','$mdb29','$twit29','$book29','$pen29')"); 
   } 
            
            
            // 19 - 10
 
 $sql19 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set19 = mysql_query($sql19);                   
            $i19=0;  
           while($length19 = mysql_fetch_array($result_set19))  
            { 
          $myId19 = $length19['Establishment_id'];
         
          
          $getBack19 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId19} And Establishment_Town= '{$town}' ";
            $exe19 = mysql_query($getBack19);
             while ($len19 = mysql_fetch_array($exe19)) { 
                 $myActive19= $len19['Activity'];
                $roomCap19 = $len19['No_Rooms'];
                
               if($myActive19 == 'Guest House' && ($roomCap19 <=19 && $roomCap19 >=10)) {  
              $okID19 = $len19['Establishment_Id']; 
     $sql1919 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID19} Group By Establishment_id";
    $result_set1919 = mysql_query($sql1919);                      
                   $i19=0;        
           while($length1919 = mysql_fetch_array($result_set1919))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro19 = $length1919['ro']; 
    $ob19 = $length1919['ob'];
    
    //Average Duration of Stay for non resident
    $nrg19 = $length1919['nrg'];   
    $tnrG19 = $length1919['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg19 = $length1919['rg'];
    $trg19 = $length1919['trg'];  
    $sum19 = $nrg19 + $rg19;
     $i19++;        
     if(!empty($ro19) && !empty($ob19) && !empty($nrg19) && !empty($trg19) && !empty($tnrG19)  && !empty($rg19) && !empty($sum19)) {       
      $to19[] = $ro19;     
      $men19[] = $ob19;
      $baby19[] = $nrg19;
      $babe19[] = $rg19;
      $wmen19[] = $sum19;
      $wat19[] = $tnrG19;
      $how19[] = $trg19;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
           
        
                    $some19=0;
                    $t19=0;
                    $m19=0;
                    $o19=0;
                    $q19=0;                                    
                    $twit19=0;
                    $book19=0;
                    $pen19=0;
                    $rateRO19=0;                  
                    $totalG19=0;
                    $totalQ19=0;
                    $tSquare19=0;
                    $trench19 = 0;
                    $dc19=0;
                    $volt19=0;
                    $alpha19=0;
                    $omega19=0;
                    $electric19=0;
                    $city19=0;
                    $row19=0;
                    $xls19=0;
                    $doc19=0;
                    $csv19=0;
                    $dat19=0;
                    $mdb19=0;
                    
                   if(!empty($i19) && !empty($babe19)) {
                   while ($some19 < $i19) {
                   $twit19 = $twit19 + $baby19[$some19];
                   $book19 = $book19 + $babe19[$some19];
                   $pen19 = $pen19 + $wmen19[$some19];  
                     
                   $t19 = $t19 + $to19[$some19];  // offered rooms
                   $m19 = $m19 + $men19[$some19];  // offered beds
                   
                     //ppr
                   $rateRO19 = $m19 / $t19;
                   $tSquare19 = $rateRO19 * $t19;
                   //total Guest
                   $totalG19= $pen19 * 100;
                   //room Occupancy rate
                   $totalQ19 = $totalG19 / $t19;
                   
                   // bed Occupancy rate
                   $trench19 = $totalG19 / $m19;
                   
                   //average duration of stay non-resident                                    
                   $o19 = $o19 + $wat19[$some19];
                   $dc19 = $o19 / $rateRO19;
                   $volt19 = $t19 / $dc19;
                   
                   //average duration of stay resident                                    
                   $q19 = $q19 + $how19[$some19];
                   $alpha19 = $q19 / $rateRO19;
                   $omega19 = $t19 / $alpha19;
                   
                  // overall duration of stay 
                  $electric19 = $volt19 + $omega19;
                  $city19 = $electric19 / 2;             
                   
                   $some19++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i19) && !empty($city19) && !empty($electric19) && !empty($omega19) && !empty($alpha19) && !empty($volt19) && !empty($dc19) && !empty($tSquare19) &&  !empty($trench19) &&  !empty($totalQ19) &&  !empty($totalG19) && !empty($t19) && !empty($m19) && !empty($o19) && !empty($rateRO19) && !empty($q19) && !empty($twit19) && !empty($book19) && !empty($pen19)) {
                     ?>
                    
                   <tr>
                    <td>19 - 10</td> 
                    <td><?php echo $t19;?></td>
                    <td><?php echo $m19;?></td>
                    <td><?php echo $row19 = round($totalQ19,2).'%';?></td>
                    <td><?php echo $xls19 = round($trench19,2).'%';?></td>
                    <td><?php echo $doc19 = round($rateRO19,2);?></td>   
                    <td><?php echo $csv19 = round($volt19,2);?></td>
                    <td><?php echo $dat19 = round($omega19,2);?></td>
                    <td><?php echo $mdb19 = round($city19,2);?></td>                 
                    <td><?php echo $twit19;?></td>
                    <td><?php echo $book19;?></td>    
                    <td><?php echo $pen19;?></td>
                    </tr>
                    <?php 
                     $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('19 - 10','$t19','$m19','$row19','$xls19','$doc19','$csv19','$dat19','$mdb19','$twit19','$book19','$pen19')"); 
    
                    } 
                    
                    
                    
                    // < 10
  
 $sql10 = "SELECT Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
    $result_set10 = mysql_query($sql10);                   
            $i10=0;  
           while($length10 = mysql_fetch_array($result_set10))  
            { 
          $myId10 = $length10['Establishment_id'];
         
          
          $getBack10 = "SELECT * FROM establishment_entry WHERE Establishment_Id={$myId10} And Establishment_Town= '{$town}' ";
            $exe10 = mysql_query($getBack10);
             while ($len10 = mysql_fetch_array($exe10)) { 
                 $myActive10= $len10['Activity'];
                $roomCap10 = $len10['No_Rooms'];
                
               if($myActive10 == 'Guest House' && ($roomCap10 < 10)) {  
              $okID10 = $len10['Establishment_Id']; 
     $sql1010 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Establishment_id FROM monthly_data_entry where Establishment_id={$okID10} Group By Establishment_id";
    $result_set1010 = mysql_query($sql1010);                      
                   $i10=0;        
           while($length1010 = mysql_fetch_array($result_set1010))  
            {
            // Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
    $ro10 = $length1010['ro']; 
    $ob10 = $length1010['ob'];
    
    //Average Duration of Stay for non resident
    $nrg10 = $length1010['nrg'];   
    $tnrG10 = $length1010['tnrG'];    
    
    //Average Duration of Stay for resident
    $rg10 = $length1010['rg'];
    $trg10 = $length1010['trg'];  
    $sum10 = $nrg10 + $rg10;
     $i10++;        
     if(!empty($ro10) && !empty($ob10) && !empty($nrg10) && !empty($trg10) && !empty($tnrG10)  && !empty($rg10) && !empty($sum10)) {       
      $to10[] = $ro10;     
      $men10[] = $ob10;
      $baby10[] = $nrg10;
      $babe10[] = $rg10;
      $wmen10[] = $sum10;
      $wat10[] = $tnrG10;
      $how10[] = $trg10;     
      
              }
        ?>
    
    <?php
      }
      }
      
       } // foreach
           
           } // while loop
           
        
                    $some10=0;
                    $t10=0;
                    $m10=0;
                    $o10=0;
                    $q10=0;                                    
                    $twit10=0;
                    $book10=0;
                    $pen10=0;
                    $rateRO10=0;                  
                    $totalG10=0;
                    $totalQ10=0;
                    $tSquare10=0;
                    $trench10 = 0;
                    $dc10=0;
                    $volt10=0;
                    $alpha10=0;
                    $omega10=0;
                    $electric10=0;
                    $city10=0;
                    $row10=0;
                    $xls10=0;
                    $doc10=0;
                    $csv10=0;
                    $dat10=0;
                    $mdb10=0;
                    $eyes=0;
                    $divG=0;
                    $popG=0;
                    $cornG=0;
                    $lolyG=0;
                    $creamG=0;
                    $donatG=0;
                    
                    
                   if(!empty($i10) && !empty($babe10)) {
                   while ($some10 < $i10) {
                   $twit10 = $twit10 + $baby10[$some10];
                   $book10 = $book10 + $babe10[$some10];
                   $pen10 = $pen10 + $wmen10[$some10];  
                     
                   $t10 = $t10 + $to10[$some10];  // offered rooms
                   $m10 = $m10 + $men10[$some10];  // offered beds
                   
                     //ppr
                   $rateRO10 = $m10 / $t10;
                   $tSquare10 = $rateRO10 * $t10;
                   //total Guest
                   $totalG10= $pen10 * 100;
                   //room Occupancy rate
                   $totalQ10 = $totalG10 / $t10;
                   
                   // bed Occupancy rate
                   $trench10 = $totalG10 / $m10;
                   
                   //average duration of stay non-resident                                    
                   $o10 = $o10 + $wat10[$some10];
                   $dc10 = $o10 / $rateRO10;
                   $volt10 = $t10 / $dc10;
                   
                   //average duration of stay resident                                    
                   $q10 = $q10 + $how10[$some10];
                   $alpha10 = $q10 / $rateRO10;
                   $omega10 = $t10 / $alpha10;
                   
                  // overall duration of stay 
                  $electric10 = $volt10 + $omega10;
                  $city10 = $electric10 / 2;             
                   
                   $some10++;
                   } 
                      }
                        
                 
                      
                    if(!empty($i10) && !empty($city10) && !empty($electric10) && !empty($omega10) && !empty($alpha10) && !empty($volt10) && !empty($dc10) && !empty($tSquare10) &&  !empty($trench10) &&  !empty($totalQ10) &&  !empty($totalG10) && !empty($t10) && !empty($m10) && !empty($o10) && !empty($rateRO10) && !empty($q10) && !empty($twit10) && !empty($book10) && !empty($pen10)) {
                     ?>
                    
                    <tr>
                    <td> < 10 </td> 
                    <td><?php echo $t10;?></td>
                    <td><?php echo $m10;?></td>
                    <td><?php echo $row10 = round($totalQ10,2).'%';?></td>
                    <td><?php echo $xls10 = round($trench10,2).'%';?></td>
                    <td><?php echo $doc10 = round($rateRO10,2);?></td>   
                    <td><?php echo $csv10 = round($volt10,2);?></td>
                    <td><?php echo $dat10 = round($omega10,2);?></td>
                    <td><?php echo $mdb10 = round($city10,2);?></td>                      
                    <td><?php echo $twit10;?></td>
                    <td><?php echo $book10;?></td>    
                    <td><?php echo $pen10;?></td>
                    </tr>
                    <?php 
                    $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('< 10','$t10','$m10','$row10','$xls10','$doc10','$csv10','$dat10','$mdb10','$twit10','$book10','$pen10')"); 
  
                    } 
          
                    // sub Total
                   
                  
                    $cellG1 = $t52 + $t25 + $t15 + $t9 + $t50 + $t30 + $t29 + $t19 + $t10;
                    $cellG2 = $m52 + $m25 + $m15 + $m9 + $m50 + $m30 + $m29 + $m19 + $m10;
                    $rowG2 =  $o52 + $o25 + $o15 + $o9 + $o50 + $o30 + $o29 + $o19 + $o10; 
                    $tourismG = $q52 + $q25 + $q15 + $q9 + $q50 + $q30 + $q29 + $q19 + $q10;
                    
                    $cellG3 = $row52 + $row25 + $row15 + $row9 + $row50 + $row30 + $row29 + $row19 + $row10;
                    $cellG4 = $xls52 + $xls25 + $xls15 + $xls9 + $xls50 + $xls30 + $xls29 + $xls19 + $xls10;
                    $cellG5 = $doc52 + $doc25 + $doc15 + $doc9 + $doc50 + $doc30 + $doc29 + $doc19 + $doc10;
                    $cellG6 = $csv52 + $csv25 + $csv15 + $csv9 + $csv50 + $csv30 + $csv29 + $csv19 + $csv10;
                    $cellG7 = $dat52 + $dat25 + $dat15 + $dat9 + $dat50 + $dat30 + $dat29 + $dat19 + $dat10;
                    $cellG8 = $mdb52 + $mdb25 + $mdb15 + $mdb9 + $mdb50 + $mdb30 + $mdb29 + $mdb19 + $mdb10;
                    $cellG9 = $twit52 + $twit25 + $twit15 + $twit9 + $twit50 + $twit30 + $twit29 + $twit19 + $twit10;
                    $cellG10 = $book52 + $book25 + $book15 + $book9 + $book50 + $book30 + $book29 + $book19 + $book10;
                    $cellG11 = $pen52 + $pen25 + $pen15 + $pen9 + $pen50 + $pen30 + $pen29 + $pen19 + $pen10;                    
                 
                    if(!empty($cellG1)) {
                    $parabolaG = $cellG11 * 100;
                    // person per room
                    $circleG = $cellG2 / $cellG1;
                    // non residence
                    $sphereG = $rowG2 / $circleG;
                    $jointG = $cellG1 / $sphereG;
                    //residence
                    $nsaG = $tourismG / $circleG;
                    $growG = $cellG1 /$nsaG;
                    //overall
                    $grownupG = $jointG + $growG;
                    $downlinkG = $grownupG / 2;                    
                                 
                    $divG = round($parabolaG / $cellG1,2);
                    $popG = round($parabolaG / $cellG2,2);
                    $cornG = round($circleG,2);
                    $lolyG = round($jointG,2);
                    $creamG = round($growG,2);
                    $donatG = round($downlinkG,2);  
                    } 
                   if(!empty($divG) && !empty($popG) && !empty($cornG) && !empty($lolyG) && !empty($creamG) && !empty($donatG)) {
                     ?>
                    <tr>
                    <td class="success"><i style="color:blue; font-size:18px; font-weight: bold;">Total</i></td> 
                    <td class="danger"><?php echo $cellG1;?></td>
                    <td class="danger"><?php echo $cellG2;?></td>
                    <td class="danger"><?php echo $divG.'%';?></td>
                    <td class="danger"><?php echo $popG.'%';?></td>
                    <td class="danger"><?php echo $cornG;?></td>   
                    <td class="success"><?php echo $lolyG;?></td>
                    <td class="success"><?php echo $creamG;?></td>
                    <td class="success"><?php echo $donatG;?></td>                      
                    <td class="info"><?php echo $cellG9;?></td>
                    <td class="info"><?php echo $cellG10;?></td>    
                    <td class="info"><?php echo $cellG11;?></td>
                    </tr>
               <?php }   
                      
               
                  // Grand Total
                    $act1 = $cell1 + $cellP1 + $cellG1;
                    $act2 = $cell2 + $cellP2 + $cellG2;
                  
                    $act3 = $div + $divP + $divG;
                    $act4 = $pop + $popP + $popG;
                    $act5 = $corn + $cornP + $cornG; 
                    $act6 = $loly + $lolyP + $lolyG; 
                    $act7 = $cream + $creamP + $creamG; 
                    $act8 = $donat + $donatP + $donatG; 
                    $act9 = $cell9 + $cellP9 + $cellG9;
                    $act10 = $cell10 + $cellP10 + $cellG10;
                    $act11 = $cell11 + $cellP11 + $cellG11;
                    
                    $act12 = $row2 + $rowP2 + $rowG2;
                    $act13 = $tourism1 + $tourismP + $tourismG;
                    if(!empty($act1) && !empty($act2)) {                  
                    // person per room
                    $showme = $act2 / $act1;
                    //room occupancy
                    $titi = $act11 * 100;
                    $ocr = $titi / $act1;
                    // bed occupancy
                    $carina = $titi / $act2;
                   // non residence
                    $corola = $act12 / $showme;
                    $bmw = $act1 / $corola;
                    //residence
                    $forever = $act13 / $showme;
                    $buggatti = $act1 / $forever;
                    // overall
                    $ford = $bmw + $buggatti;
                    $mini = $ford / 2;
                    
                    $apple = round($ocr ,2);
                    $banana = round($carina ,2);
                    $wine = round($showme ,2);
                    $grape = round($bmw ,2);
                    $coffe = round($buggatti ,2);
                    $nescafe = round($mini ,2); 
                   
                    }                  
                     ?>
                    <tr>
                    <td class="success"><i style="color:blue; font-size:18px; font-weight: bold;">G.Total</i></td> 
                    <td class="danger"><?php echo $act1;?></td>
                    <td class="danger"><?php echo $act2;?></td>
                    <td class="danger"><?php echo $smart = $apple.'%';?></td>
                    <td class="danger"><?php echo $city = $banana.'%';?></td>
                    <td class="danger"><?php echo $wine;?></td>   
                    <td class="success"><?php echo $grape;?></td>
                    <td class="success"><?php echo $coffe;?></td>
                    <td class="success"><?php echo $nescafe;?></td>                      
                    <td class="info"><?php echo $act9;?></td>
                    <td class="info"><?php echo $act10;?></td>    
                    <td class="info"><?php echo $act11;?></td>
                    </tr>
                <?php
                 $show_rpt = mysql_query("insert into roomG(rog,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                     values('G.Total','$act1','$act2','$smart','$city','$wine','$grape','$coffe','$nescafe','$act9','$act10','$act11')"); 
 
                ?>
                </tbody>
               </table>     
               
     </div>									                                              
	</div>
    </div>
  </div>
    <!-- this row will not appear when printing -->
       <div  id="samm"  class="container">   
			   
			   <form action="rga.php" method="POST">
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
  echo "<script type=\"text/javascript\"> alert( \"First Sumbit Your Entry \");  window.location = \"reportRGA.php\"  </script>";
  }
  ?>
</body>
</html>
  
