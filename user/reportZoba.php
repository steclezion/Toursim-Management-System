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
                    <th colspan="6" style="text-align:center; background-color:brown;"></th>  
                    <th colspan="3" style="text-align:center; background-color:green"><i>Average Duration Of Stay</i></th> 
                    <th colspan="3" style="text-align:center; background-color:yellow;"><i>Guest Night</i></th>                      
                    </tr>                
                  <tr>
                    <th style="text-align:center; background-color:brown;">Zoba</th>
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
           
            
                 <tr>
                  <td colspan="12" class="info"><i style="color:blue; font-size:18px; font-weight: bold;">All Zoba's</i></td>  
                  </tr>
                                                   
                  <!--Maekel-->
                  <?php   
            $getsql = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
            $eresult= mysql_query($getsql);
            $xls_report = mysql_query("delete from zobatown");
            while ($len= mysql_fetch_array($eresult)) {
             $showId = $len['Establishment_id'];
          
                            
                $sequel = "SELECT * FROM establishment_entry WHERE Establishment_Id = {$showId}";
                $rest = mysql_query($sequel);
              
                while ($lent = mysql_fetch_array($rest)) {                                
                  $mydata= $lent['Establishment_Id'];
                  $estabName= $lent['Establishment_Name'];
                  $estabZoba = $lent['Establishment_Zoba'];
                  
                  if($estabZoba == 'Maekel') {         
                                
              $i=0;  
              $ro = $len['ro'];        
              $ob = $len['ob'];
              $nrg = $len['nrg'];   
              $tnrG = $len['tnrG'];
              $rg = $len['rg'];
              $trg = $len['trg'];     
    //  Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
        if(!empty($ro) && !empty($ob) && !empty($nrg) && !empty($tnrG) && !empty($rg) && !empty($trg)) {

   
   // calculation person per room
     $PPR = $ob / $ro;
      
    //Average Duration of Stay for non resident  
    $NRS = $tnrG / $PPR;
    $ADSNR = $ro / $NRS;
    
    //Average Duration of Stay for resident    
    $NRSNR = $trg / $PPR;
    $ADSR = $ro / $NRSNR;
  
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
     
      
          
                                            
           
           $roo = round($final, 2).'%';
           $boo = round($result, 2).'%';  
           $pp = round($PPR, 2); 
     
           $ads = round($ADSNR, 2);
           $asr = round($ADSR, 2); 
           $orl = round($overall, 2);
    
           $sum = $nrg + $rg;                                          
                 
       
                   $i++; 
          if(!empty($ro) && !empty($ob) && !empty($tnrG) && !empty($trg) && !empty($nrg) && !empty($rg) && !empty($sum)) { 
     
      $to[] = $ro; 
      $men[] = $ob;     
      $myP[] = $tnrG;     
      $dot[] =  $trg;     
      $baby[] = $nrg;
      $babe[] = $rg;
      $wmen[] = $sum;
                   $nnn=0;
                   $frequency[] = $i;
                   $nnn = $nnn + $frequency[0]++; 
            }
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
  
                          if(!empty($t) && !empty($m) && !empty($candy) && !empty($dell) && !empty($camry) 
                   && !empty($toshiba) && !empty($apple) && !empty($ksa) && !empty($twit) && !empty($book) && !empty($pen)) {
         ?>
               
                 
                   <tr>
                  <td class="danger" style="font-size:15px; font-weight: bold;"><i>Maekel</i></td>
                    <td><?php echo $t;?></td>
                    <td><?php echo $m;?></td>
                   <td><?php echo $ford = round($candy,2).'%';?></td>
                    <td><?php echo $camry = round($dell,2).'%';?></td>   
                    <td><?php echo $ferrari = round($camry,2);?></td>
                    <td><?php echo $lambo = round($toshiba,2);?></td>
                    <td><?php echo $das = round($apple,2);?></td>  
                    <td><?php echo $carbo = round($ksa,2);?></td>
                    <td><?php echo $twit;?></td>
                    <td><?php echo $book;?></td>    
                    <td><?php echo $pen;?></td>
                  </tr>
                  <?php 
      $show_rpt = mysql_query("insert into zobatown(estabname,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
        values('SubTotal','$t','$m','$ford','$camry','$ferrari','$lambo','$das','$carbo','$twit','$book','$pen')"); 

                  } ?>
      
      
                                  
                  <!--Debub-->
                  <?php   
            $getsql1 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
            $eresult1= mysql_query($getsql1);
        
            while ($len1= mysql_fetch_array($eresult1)) {
             $showId1 = $len1['Establishment_id'];
          
                            
                $sequel1 = "SELECT * FROM establishment_entry WHERE Establishment_Id = {$showId1}";
                $rest1 = mysql_query($sequel1);
              
                while ($lent1 = mysql_fetch_array($rest1)) {                                
                  $mydata1= $lent1['Establishment_Id'];
                  $estabName1= $lent1['Establishment_Name'];
                  $estabZoba1 = $lent1['Establishment_Zoba'];
                  
                  if($estabZoba1 == 'Debub') {         
                                
              $i1=0;  
              $ro1 = $len1['ro'];        
              $ob1 = $len1['ob'];
              $nrg1 = $len1['nrg'];   
              $tnrG1 = $len1['tnrG'];
              $rg1 = $len1['rg'];
              $trg1 = $len1['trg'];     
    //  Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
        if(!empty($ro1) && !empty($ob1) && !empty($nrg1) && !empty($tnrG1) && !empty($rg1) && !empty($trg1)) {

   
   // calculation person per room
     $PPR1 = $ob1 / $ro1;
      
    //Average Duration of Stay for non resident  
    $NRS1 = $tnrG1 / $PPR1;
    $ADSNR1 = $ro1 / $NRS1;
    
    //Average Duration of Stay for resident    
    $NRSNR1 = $trg1 / $PPR1;
    $ADSR1 = $ro1 / $NRSNR1;
  
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
     
   
                    
           $roo1 = round($final1, 2).'%';
           $boo1 = round($result1, 2).'%';  
           $pp1 = round($PPR1, 2); 
     
           $ads1 = round($ADSNR1, 2);
           $asr1 = round($ADSR1, 2); 
           $orl1 = round($overall1, 2);
    
           $sum1 = $nrg1 + $rg1;                                          
                 
                  
                   
                  $i1++; 
          if(!empty($ro1) && !empty($ob1) && !empty($tnrG1) && !empty($trg1) && !empty($nrg1) && !empty($rg1) && !empty($sum1)) { 
     
      $to1[] = $ro1; 
      $men1[] = $ob1;     
      $myP1[] = $tnrG1;     
      $dot1[] =  $trg1;     
      $baby1[] = $nrg1;
      $babe1[] = $rg1;
      $wmen1[] = $sum1;
                   $nnn1=0;
                   $frequency1[] = $i1;
                   $nnn1 = $nnn1 + $frequency1[0]++;   
            }
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
      while ($n1 < $nnn1) { 
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
  
                      if(!empty($t1) && !empty($m1) && !empty($candy1) && !empty($dell1) && !empty($camry1) 
                   && !empty($toshiba1) && !empty($apple1) && !empty($ksa1) && !empty($twit1) && !empty($book1) && !empty($pen1)) {
         ?>
              
                   <tr>
                  <td class="danger" style="font-size:15px; font-weight: bold;"><i>Debub</i></td>
                    <td><?php echo $t1;?></td>
                    <td><?php echo $m1;?></td>
                   <td><?php echo $ford1 = round($candy1,2).'%';?></td>
                    <td><?php echo $camry1 = round($dell1,2).'%';?></td>   
                    <td><?php echo $ferrari1 = round($camry1,2);?></td>
                    <td><?php echo $lambo1 = round($toshiba1,2);?></td>
                    <td><?php echo $das1 = round($apple1,2);?></td>  
                    <td><?php echo $carbo1 = round($ksa1,2);?></td>
                    <td><?php echo $twit1;?></td>
                    <td><?php echo $book1;?></td>    
                    <td><?php echo $pen1;?></td>
                  </tr>
                  <?php 
      $show_rpt = mysql_query("insert into zobatown(estabname,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
        values('SubTotal','$t1','$m1','$ford1','$camry1','$ferrari1','$lambo1','$das1','$carbo1','$twit1','$book1','$pen1')"); 
                  } ?>
      
                 
                                  
                  <!--Zoba Anseba-->
                  <?php   
            $getsql2 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
            $eresult2= mysql_query($getsql2);
           
            while ($len2= mysql_fetch_array($eresult2)) {
             $showId2 = $len2['Establishment_id'];
          
                            
                $sequel2 = "SELECT * FROM establishment_entry WHERE Establishment_Id = {$showId2}";
                $rest2 = mysql_query($sequel2);
              
                while ($lent2 = mysql_fetch_array($rest2)) {                                
                  $mydata2= $lent2['Establishment_Id'];
                  $estabName2= $lent2['Establishment_Name'];
                  $estabZoba2 = $lent2['Establishment_Zoba'];
                  
                  if($estabZoba2 == 'Anseba') {         
                                
              $i2=0;  
              $ro2 = $len2['ro'];        
              $ob2 = $len2['ob'];
              $nrg2 = $len2['nrg'];   
              $tnrG2 = $len2['tnrG'];
              $rg2 = $len2['rg'];
              $trg2 = $len2['trg'];     
    //  Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
        if(!empty($ro2) && !empty($ob2) && !empty($nrg2) && !empty($tnrG2) && !empty($rg2) && !empty($trg2)) {

   
   // calculation person per room
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
     
     
           $roo2 = round($final2, 2).'%';
           $boo2 = round($result2, 2).'%';  
           $pp2 = round($PPR2, 2); 
     
           $ads2 = round($ADSNR2, 2);
           $asr2 = round($ADSR2, 2); 
           $orl2 = round($overall2, 2);
    
           $sum2 = $nrg2 + $rg2;                                         
                 
             
  
                  $i2++; 
          if(!empty($ro2) && !empty($ob2) && !empty($tnrG2) && !empty($trg2) && !empty($nrg2) && !empty($rg2) && !empty($sum2)) { 
     
      $to2[] = $ro2; 
      $men2[] = $ob2;     
      $myP2[] = $tnrG2;     
      $dot2[] =  $trg2;     
      $baby2[] = $nrg2;
      $babe2[] = $rg2;
      $wmen2[] = $sum2;
                   $nnn2=0;
                   $frequency2[] = $i2;
                   $nnn2 = $nnn2 + $frequency2[0]++;  
            }
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
  
                      if(!empty($t2) && !empty($m2) && !empty($candy2) && !empty($dell2) && !empty($camry2) 
                   && !empty($toshiba2) && !empty($apple2) && !empty($ksa2) && !empty($twit2) && !empty($book2) && !empty($pen2)) {
         ?>
                
                 
                   <tr>
                  <td class="danger" style="font-size:15px; font-weight: bold;"><i>Anseba</i></td>
                    <td><?php echo $t2;?></td>
                    <td><?php echo $m2;?></td>
                   <td><?php echo $ford2 = round($candy2,2).'%';?></td>
                    <td><?php echo $camry2 = round($dell2,2).'%';?></td>   
                    <td><?php echo $ferrari2 = round($camry2,2);?></td>
                    <td><?php echo $lambo2 = round($toshiba2,2);?></td>
                    <td><?php echo $das2 = round($apple2,2);?></td>  
                    <td><?php echo $carbo2 = round($ksa2,2);?></td>
                    <td><?php echo $twit2;?></td>
                    <td><?php echo $book2;?></td>    
                    <td><?php echo $pen2;?></td>
                  </tr>
                  <?php 
       $show_rpt = mysql_query("insert into zobatown(estabname,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
        values('SubTotal','$t2','$m2','$ford2','$camry2','$ferrari2','$lambo2','$das2','$carbo2','$twit2','$book2','$pen2')"); 
                  } ?>
      
                                  
                  <!--Zoba Northern Red Sea-->
                  <?php   
            $getsql3 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
            $eresult3= mysql_query($getsql3);
                    
            while ($len3= mysql_fetch_array($eresult3)) {
             $showId3 = $len3['Establishment_id'];
          
                            
                $sequel3 = "SELECT * FROM establishment_entry WHERE Establishment_Id = {$showId3}";
                $rest3 = mysql_query($sequel3);
              
                while ($lent3 = mysql_fetch_array($rest3)) {                                
                  $mydata3= $lent3['Establishment_Id'];
                  $estabName3= $lent3['Establishment_Name'];
                  $estabZoba3 = $lent3['Establishment_Zoba'];
                  
                  if($estabZoba3 == 'Northern Red Sea') {         
                                
              $i3=0;  
              $ro3 = $len3['ro'];        
              $ob3 = $len3['ob'];
              $nrg3 = $len3['nrg'];   
              $tnrG3 = $len3['tnrG'];
              $rg3 = $len3['rg'];
              $trg3 = $len3['trg'];     
    //  Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
        if(!empty($ro3) && !empty($ob3) && !empty($nrg3) && !empty($tnrG3) && !empty($rg3) && !empty($trg3)) {

   
   // calculation person per room
     $PPR3 = $ob3 / $ro3;
      
    //Average Duration of Stay for non resident  
    $NRS3 = $tnrG3 / $PPR3;
    $ADSNR3 = $ro3 / $NRS3;
    
    //Average Duration of Stay for resident    
    $NRSNR3 = $trg3 / $PPR3;
    $ADSR3 = $ro3 / $NRSNR3;
  
     //Average Duration of Stay for resident
     $sumof3 = $ADSNR3 + $ADSR3;
     $overall3 = $sumof3 / 2;
     
     // Total Guest
     $sum3 = $nrg3 + $rg3;
     
      //calculatin Room Occupancy
    $ROR3 = $sum3 * 100;
    $final3 = $ROR3 / $ro3;
    
    //calculatin Bed Occupancy
    $BOR3 = $sum3 * 100;
    $result3 = $BOR3 / $ob3;
     
           $roo3 = round($final3, 2).'%';
           $boo3 = round($result3, 2).'%';  
           $pp3 = round($PPR3, 2); 
     
           $ads3 = round($ADSNR3, 2);
           $asr3 = round($ADSR3, 2); 
           $orl3 = round($overall3, 2);
    
           $sum3 = $nrg3 + $rg3;    

      

                   $i3++; 
          if(!empty($ro3) && !empty($ob3) && !empty($tnrG3) && !empty($trg3) && !empty($nrg3) && !empty($rg3) && !empty($sum3)) { 
     
      $to3[] = $ro3; 
      $men3[] = $ob3;     
      $myP3[] = $tnrG3;     
      $dot3[] =  $trg3;     
      $baby3[] = $nrg3;
      $babe3[] = $rg3;
      $wmen3[] = $sum3;
                   $nnn3=0;
                   $frequency3[] = $i3;
                   $nnn3 = $nnn3 + $frequency3[0]++;   
            }
                     }
                        
                  } 
                
                     }  
                            
                     } 
               
      $n3=0;
      $t3=0;
      $m3=0;     
      $r3=0;     
      $d3=0;    
      $twit3=0;
      $book3=0;
      $pen3=0;
      
      if(!empty($nnn3)) {
      while ($n3 < $nnn3) { 
        $t3 = $t3 + $to3[$n3];
        $m3 = $m3 + $men3[$n3];      
        $r3 = $r3 + $myP3[$n3];
        $d3 = $d3 + $dot3[$n3];
        $twit3 = $twit3 + $baby3[$n3];
        $book3 = $book3 + $babe3[$n3];
        $pen3 = $pen3 + $wmen3[$n3];     
      $n3++;
      }
      
      // person per room
      $camry3 = $m3 / $t3;
      // room occupancy rate
      $cresida3 = $pen3 * 100;
      $candy3 = $cresida3 / $t3;
      // bed occupancy rate
      $dell3 = $cresida3 / $m3;
      //non -residence
      $hp3 = $r3 / $camry3;
      $toshiba3 = $t3 / $hp3;
      //residence
      $lenovo3 = $d3 / $camry3;
      $apple3 =  $t3 / $lenovo3;
      //overall
      $gmt3 = $toshiba3 + $apple3;
      $ksa3 = $gmt3 / 2;
        } 
  
                         if(!empty($t3) && !empty($m3) && !empty($candy3) && !empty($dell3) && !empty($camry3) 
                   && !empty($toshiba3) && !empty($apple3) && !empty($ksa3) && !empty($twit3) && !empty($book3) && !empty($pen3)) {
         ?>
                                 
                   <tr>
                  <td class="danger" style="font-size:15px; font-weight: bold;"><i>Northern Red Sea</i></td>
                    <td><?php echo $t3;?></td>
                    <td><?php echo $m3;?></td>
                   <td><?php echo $ford3 = round($candy3,2).'%';?></td>
                    <td><?php echo $camry3 = round($dell3,2).'%';?></td>   
                    <td><?php echo $ferrari3 = round($camry3,2);?></td>
                    <td><?php echo $lambo3 = round($toshiba3,2);?></td>
                    <td><?php echo $das3 = round($apple3,2);?></td>  
                    <td><?php echo $carbo3 = round($ksa3,2);?></td>
                    <td><?php echo $twit3;?></td>
                    <td><?php echo $book3;?></td>    
                    <td><?php echo $pen3;?></td>
                  </tr>
                  <?php 
$show_rpt = mysql_query("insert into zobatown(estabname,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
        values('SubTotal','$t3','$m3','$ford3','$camry3','$ferrari3','$lambo3','$das3','$carbo3','$twit3','$book3','$pen3')"); 
                  } ?>
      
      
      
                  <?php   
            $getsql4 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
            $eresult4= mysql_query($getsql4);
        
            while ($len4= mysql_fetch_array($eresult4)) {
             $showId4 = $len4['Establishment_id'];
          
                            
                $sequel4 = "SELECT * FROM establishment_entry WHERE Establishment_Id = {$showId4}";
                $rest4 = mysql_query($sequel4);
              
                while ($lent4 = mysql_fetch_array($rest4)) {                                
                  $mydata4= $lent4['Establishment_Id'];
                  $estabName4= $lent4['Establishment_Name'];
                  $estabZoba4 = $lent4['Establishment_Zoba'];
                  
                  if($estabZoba4 == 'GashBarka') {         
                                
              $i4=0;  
              $ro4 = $len4['ro'];        
              $ob4 = $len4['ob'];
              $nrg4 = $len4['nrg'];   
              $tnrG4 = $len4['tnrG'];
              $rg4 = $len4['rg'];
              $trg4 = $len4['trg'];     
    //  Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
        if(!empty($ro4) && !empty($ob4) && !empty($nrg4) && !empty($tnrG4) && !empty($rg4) && !empty($trg4)) {

   
   // calculation person per room
     $PPR4 = $ob4 / $ro4;
      
    //Average Duration of Stay for non resident  
    $NRS4 = $tnrG4 / $PPR4;
    $ADSNR4 = $ro4 / $NRS4;
    
    //Average Duration of Stay for resident    
    $NRSNR4 = $trg4 / $PPR4;
    $ADSR4 = $ro4 / $NRSNR4;
  
     //Average Duration of Stay for resident
     $sumof4 = $ADSNR4 + $ADSR4;
     $overall4 = $sumof4 / 2;
     
     // Total Guest
     $sum4 = $nrg4 + $rg4;
     
      //calculatin Room Occupancy
    $ROR4 = $sum4 * 100;
    $final4 = $ROR4 / $ro4;
    
    //calculatin Bed Occupancy
    $BOR4 = $sum4 * 100;
    $result4 = $BOR4 / $ob4;
     
    
           $roo4 = round($final4, 2).'%';
           $boo4 = round($result4, 2).'%';  
           $pp4 = round($PPR4, 2); 
     
           $ads4 = round($ADSNR4, 2);
           $asr4 = round($ADSR4, 2); 
           $orl4 = round($overall4, 2);
    
           $sum4 = $nrg4 + $rg4;    

                   $i4++; 
          if(!empty($ro4) && !empty($ob4) && !empty($tnrG4) && !empty($trg4) && !empty($nrg4) && !empty($rg4) && !empty($sum4)) { 
     
      $to4[] = $ro4; 
      $men4[] = $ob4;     
      $myP4[] = $tnrG4;     
      $dot4[] =  $trg4;     
      $baby4[] = $nrg4;
      $babe4[] = $rg4;
      $wmen4[] = $sum4;
                   $nnn4=0;
                   $frequency4[] = $i4;
                   $nnn4 = $nnn4 + $frequency4[0]++;
            }
                     }
                        
                  } 
                
                     }  
                                
                     } 
               
      $n4=0;
      $t4=0;
      $m4=0;     
      $r4=0;     
      $d4=0;    
      $twit4=0;
      $book4=0;
      $pen4=0;
      
      if(!empty($nnn4)) {
      while ($n4 < $nnn4) { 
        $t4 = $t4 + $to4[$n4];
        $m4 = $m4 + $men4[$n4];      
        $r4 = $r4 + $myP4[$n4];
        $d4 = $d4 + $dot4[$n4];
        $twit4 = $twit4 + $baby4[$n4];
        $book4 = $book4 + $babe4[$n4];
        $pen4 = $pen4 + $wmen4[$n4];     
      $n4++;
      }
      
      // person per room
      $camry4 = $m4 / $t4;
      // room occupancy rate
      $cresida4 = $pen4 * 100;
      $candy4 = $cresida4 / $t4;
      // bed occupancy rate
      $dell4 = $cresida4 / $m4;
      //non -residence
      $hp4 = $r4 / $camry4;
      $toshiba4 = $t4 / $hp4;
      //residence
      $lenovo4 = $d4 / $camry4;
      $apple4 =  $t4 / $lenovo4;
      //overall
      $gmt4 = $toshiba4 + $apple4;
      $ksa4 = $gmt4 / 2;
        } 
  
                      if(!empty($t4) && !empty($m4) && !empty($candy4) && !empty($dell4) && !empty($camry4) 
                   && !empty($toshiba4) && !empty($apple4) && !empty($ksa4) && !empty($twit4) && !empty($book4) && !empty($pen4)) {
         ?>
                                 
                   <tr>
                  <td class="danger" style="font-size:15px; font-weight: bold;"><i>Gash Barka</i></td>
                    <td><?php echo $t4;?></td>
                    <td><?php echo $m4;?></td>
                   <td><?php echo $ford4 = round($candy4,2).'%';?></td>
                    <td><?php echo $camry4 = round($dell4,2).'%';?></td>   
                    <td><?php echo $ferrari4 = round($camry4,2);?></td>
                    <td><?php echo $lambo4 = round($toshiba4,2);?></td>
                    <td><?php echo $das4 = round($apple4,2);?></td>  
                    <td><?php echo $carbo4 = round($ksa4,2);?></td>
                    <td><?php echo $twit4;?></td>
                    <td><?php echo $book4;?></td>    
                    <td><?php echo $pen4;?></td>
                  </tr>
                  <?php 
$show_rpt = mysql_query("insert into zobatown(estabname,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
        values('SubTotal','$t4','$m4','$ford4','$camry4','$ferrari4','$lambo4','$das4','$carbo4','$twit4','$book4','$pen4')"); 
                  } ?>
                  
                  
                          
                                  
                  
                  <?php   
            $getsql5 = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} Group By Establishment_id";
            $eresult5= mysql_query($getsql5);
        
            while ($len5= mysql_fetch_array($eresult5)) {
             $showId5 = $len5['Establishment_id'];          
                            
                $sequel5 = "SELECT * FROM establishment_entry WHERE Establishment_Id = {$showId5}";
                $rest5 = mysql_query($sequel5);
              
                while ($lent5 = mysql_fetch_array($rest5)) {                                
                  $mydata5= $lent5['Establishment_Id'];
                  $estabName5= $lent5['Establishment_Name'];
                  $estabZoba5 = $lent5['Establishment_Zoba'];
                  
                  if($estabZoba5 == 'Southern Red Sea') {         
                                
              $i5=0;  
              $ro5 = $len5['ro'];        
              $ob5 = $len5['ob'];
              $nrg5 = $len5['nrg'];   
              $tnrG5 = $len5['tnrG'];
              $rg5 = $len5['rg'];
              $trg5 = $len5['trg'];     
    //  Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room
        if(!empty($ro5) && !empty($ob5) && !empty($nrg5) && !empty($tnrG5) && !empty($rg5) && !empty($trg5)) {

   
   // calculation person per room
     $PPR5 = $ob5 / $ro5;
      
    //Average Duration of Stay for non resident  
    $NRS5 = $tnrG5 / $PPR5;
    $ADSNR5 = $ro5 / $NRS5;
    
    //Average Duration of Stay for resident    
    $NRSNR5 = $trg5 / $PPR5;
    $ADSR5 = $ro5 / $NRSNR5;
  
     //Average Duration of Stay for resident
     $sumof5 = $ADSNR5 + $ADSR5;
     $overall5 = $sumof5 / 2;
     
     // Total Guest
     $sum5 = $nrg5 + $rg5;
     
      //calculatin Room Occupancy
    $ROR5 = $sum5 * 100;
    $final5 = $ROR5 / $ro5;
    
    //calculatin Bed Occupancy
    $BOR5 = $sum5 * 100;
    $result5 = $BOR5 / $ob5;
     
           $roo5 = round($final5, 2).'%';
           $boo5 = round($result5, 2).'%';  
           $pp5 = round($PPR5, 2); 
     
           $ads5 = round($ADSNR5, 2);
           $asr5 = round($ADSR5, 2); 
           $orl5 = round($overall5, 2);
    
           $sum5 = $nrg5 + $rg5;    

  

                  $i5++; 
          if(!empty($ro5) && !empty($ob5) && !empty($tnrG5) && !empty($trg5) && !empty($nrg5) && !empty($rg5) && !empty($sum5)) { 
     
      $to5[] = $ro5; 
      $men5[] = $ob5;     
      $myP5[] = $tnrG5;     
      $dot5[] =  $trg5;     
      $baby5[] = $nrg5;
      $babe5[] = $rg5;
      $wmen5[] = $sum5;
                   $nnn5=0;
                   $frequency5[] = $i5;
                   $nnn5 = $nnn5 + $frequency5[0]++;
            }
                     }
                        
                  } 
                
                     }  
                                
                     } 
               
      $n5=0;
      $t5=0;
      $m5=0;     
      $r5=0;     
      $d5=0;    
      $twit5=0;
      $book5=0;
      $pen5=0;
      
      if(!empty($nnn5)) {
      while ($n5 < $nnn5) { 
        $t5 = $t5 + $to5[$n5];
        $m5 = $m5 + $men5[$n5];      
        $r5 = $r5 + $myP5[$n5];
        $d5 = $d5 + $dot5[$n5];
        $twit5 = $twit5 + $baby5[$n5];
        $book5 = $book5 + $babe5[$n5];
        $pen5 = $pen5 + $wmen5[$n5];     
      $n5++;
      }
      
      // person per room
      $camry5 = $m5 / $t5;
      // room occupancy rate
      $cresida5 = $pen5 * 100;
      $candy5 = $cresida5 / $t5;
      // bed occupancy rate
      $dell5 = $cresida5 / $m5;
      //non -residence
      $hp5 = $r5 / $camry5;
      $toshiba5 = $t5 / $hp5;
      //residence
      $lenovo5 = $d5 / $camry5;
      $apple5 =  $t5 / $lenovo5;
      //overall
      $gmt5 = $toshiba5 + $apple5;
      $ksa5 = $gmt5 / 2;
        } 

      if(!empty($t5) && !empty($m5) && !empty($candy5) && !empty($dell5) && !empty($camry5) 
                   && !empty($toshiba5) && !empty($apple5) && !empty($ksa5) && !empty($twit5) && !empty($book5) && !empty($pen5)) {
         ?>
                                
                   <tr>
                  <td class="danger" style="font-size:15px; font-weight: bold;"><i>Southern Red Sea</i></td>
                    <td><?php echo $t5;?></td>
                    <td><?php echo $m5;?></td>
                   <td><?php echo $ford5 = round($candy5,2).'%';?></td>
                    <td><?php echo $camry5 = round($dell5,2).'%';?></td>   
                    <td><?php echo $ferrari5 = round($camry5,2);?></td>
                    <td><?php echo $lambo5 = round($toshiba5,2);?></td>
                    <td><?php echo $das5 = round($apple5,2);?></td>  
                    <td><?php echo $carbo5 = round($ksa5,2);?></td>
                    <td><?php echo $twit5;?></td>
                    <td><?php echo $book5;?></td>    
                    <td><?php echo $pen5;?></td>
                  </tr>
                  <?php 
$show_rpt = mysql_query("insert into zobatown(estabname,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
        values('SubTotal','$t5','$m5','$ford5','$camry5','$ferrari5','$lambo5','$das5','$carbo5','$twit5','$book5','$pen5')"); 
                  } ?>
                  
                   
                   
                     <!--G.Total-->
                  <?php
                  
                    $sharp = $t + $t1 + $t2 + $t3 + $t4 + $t5;
                    $vb = $m + $m1 + $m2 + $m3 + $m4 + $m5;
                    $vision = $r + $r1 + $r2 + $r3 + $r4 + $r5;
                    $doc = $d + $d1 + $d2 + $d3 + $d4 + $d5;
                
                    $basic = $twit + $twit1+ $twit2 + $twit3 + $twit4 + $twit5;
                    $cctv = $book + $book1 + $book2 + $book3 + $book4 + $book5;
                    $bbc = $pen + $pen1 + $pen2 + $pen3 + $pen4 + $pen5;
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
                
                  <tr style=" background-color:orange;">
                  <td  class="danger" style="font-size:20px; font-weight: bold;"><i>G.Total</i></td> 
                    <td class="danger"><?php echo $sharp;?></td>
                    <td class="danger"><?php echo $vb;?></td>
                    <td class="danger"><?php echo $power = round($core,2).'%';?></td>
                    <td class="danger"><?php echo $rule = round($atp,2).'%';?></td>   
                    <td class="danger"><?php echo $law = round($car,2);?></td>
                    <td class="success"><?php echo $conccur = round($lens,2);?></td>
                    <td class="success"><?php echo $war = round($wet,2);?></td>  
                    <td class="success"><?php echo $attack = round($score,2);?></td>
                    <td class="info"><?php echo $basic;?></td>
                    <td class="info"><?php echo $cctv;?></td>    
                    <td class="info"><?php echo $bbc;?></td>
                  </tr>
                
                 <?php 
           $show_rpt = mysql_query("insert into zobatown(estabname,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total)
            values('G.Total','$sharp','$vb','$power','$rule','$law','$conccur','$war','$attack','$basic','$cctv','$bbc')"); 
?> 
                  
                  
                   
                </tbody>
              </table>            
          </div>
     </div>                                                               
  </div>
    </div>
  </div>
  
   <!-- this row will not appear when printing -->
       <div id="samm" class="container"> 
          <form action="zobatown.php" method="POST">
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
  echo "<script type=\"text/javascript\"> alert( \"First Sumbit Your Entry \");  window.location = \"reportZobaTown.php\"  </script>";
  }
  ?>
</body>
</html>
  
