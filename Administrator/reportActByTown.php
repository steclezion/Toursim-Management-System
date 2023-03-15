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
                    <th style="text-align:center; background-color:brown;">Activity</th>
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
                  <td colspan="12" style="color:blue; font-size:18px; font-weight: bold;"><i><?php echo $town;?></i></td>  
                  </tr>
                     
                <?php 
                
                $sequel = "SELECT * FROM establishment_entry WHERE Establishment_Town = '{$town}'";
                $rest = mysql_query($sequel);
                $xls_report = mysql_query("delete from acttown");
                
                 while ($lent = mysql_fetch_array($rest)) {
                $myActive= $lent['Activity'];
                $estabT= $lent['Establishment_Town'];
                 $id = $lent['Establishment_Id'];
 
    $sql = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Month, Year, Establishment_id  FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} and Establishment_id = {$id} Group By Month";
    $result_set = mysql_query($sql);
    $row = mysql_num_rows($result_set);
                             
    $i=0;  
  while($length = mysql_fetch_array($result_set))  
     {    
    $nrg = $length['nrg'];   
    $tnrG = $length['tnrG'];
    $rg = $length['rg'];
    $trg = $length['trg']; 
    $ro = $length['ro'];   
    $ob = $length['ob'];        
       ?>
  
    
    <!--Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room-->
    <?php 
     if(!empty($myActive) && !empty($ro) && !empty($ob) && !empty($nrg) && !empty($tnrG) && !empty($rg) && !empty($trg)) {

    //calculatin Room Occupancy
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
    ?>
     <tr>
    <td><?php echo $myActive; ?></td>
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
    <td><?php  echo $sum = $nrg + $rg; ?></td>       
     </tr>
    
      <?php  
      $show_rpt = mysql_query("insert into acttown(activity,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) values('$myActive','$ro','$ob','$roo','$boo','$pp','$ads','$asr','$orl','$nrg','$rg','$sum')"); 

        $i++;  
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
                   $frequency[] = $i;
                   $nnn = $nnn + $frequency[0]++; 
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
                 
                  <tr style="background-color: orange;">
                  <td style="font-size:20px; font-weight: bold;"><i>G.Total</i></td> 
                    <td><?php echo $t;?></td>
                    <td><?php echo $m;?></td>
                   <td><?php echo $teresa = round($candy,2).'%';?></td>
                    <td><?php echo $may = round($dell,2).'%';?></td>   
                    <td><?php echo $macron = round($camry,2);?></td>
                    <td><?php echo $vladmir = round($toshiba,2);?></td>
                    <td><?php echo $putin = round($apple,2);?></td>  
                    <td><?php echo $russia = round($ksa,2);?></td>
                    <td><?php echo $twit;?></td>
                    <td><?php echo $book;?></td>    
                    <td><?php echo $pen;?></td>
                  </tr>
                  <?php 
                 $show_rpt = mysql_query("insert into acttown(activity,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) 
                 values('G.Total','$t','$m','$teresa','$may','$macron','$vladmir','$putin','$russia','$twit','$book','$pen')"); 

                  } ?>
                
               </table>     
          
     </div>									                                              
	</div>
    </div>
  </div>
  
   <!-- this row will not appear when printing -->
       <div id="samm" class="container"> 
			    <form action="acttown.php" method="POST">
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
  echo "<script type=\"text/javascript\"> alert( \"First Sumbit Your Entry \");  window.location = \"reportActByTown.php\"  </script>";
  }
  ?>
</body>
</html>
  
