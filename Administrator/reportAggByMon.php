
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
          <style type="text/css">
.mychart {

   font: normal .Ben/1em Arial, Helvetica, Geneva, sans-serif;
    
background: #4F6161;
background:-webkit-linear-gradient(rgba(97,126,118,0.6), rgba(53, 56,67, .5));
background:-moz-linear-gradient(rgba(97,126,118,0.6), rgba(53, 56,67, .5));
background:-ms-linear-gradient(rgba(97,126,118,0.6), rgba(53, 56,67, .5));
background:-o-linear-gradient(rgba(97,126,118,0.6), rgba(53, 56,67, .5));
  
-webkit-border-radius: 10px;
-moz-border-radius: 10px; 
border-radius: 10px;

width: 400%;
margin: 0 auto;
max-width:2000px;
}
          </style>
            </head>	
            <body>	
  <div><br><br><br></div>
   
       <div id="printdv" class="container">
         <div id="sam" class="span">
		       <div class="jumbotron">            
         <h3><B style="color:RED" ><?php echo $title; ?></B></h3>        
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
                    <th style="text-align:center; background-color:green">Non-Residence</th>
                    <th style="text-align:center; background-color:green">Residence</th>
                    <th style="text-align:center; background-color:green">Overall</th>
                    <th style="text-align:center; background-color:yellow;">Non-Residence</th>
                    <th style="text-align:center; background-color:yellow;">Residence</th>
                    <th style="text-align:center; background-color:yellow;">Total</th>
                    </tr>
                </thead>
                <tbody>
                                   
  <?php 
    $sql = "SELECT SUM(Offered_Rooms) As ro, SUM(Offered_Beds) As ob, SUM(NR_Guest) As nrg, SUM(R_NewGuest) As rg, SUM(TNR_Guest) As tnrG, SUM(TR_Guest) As trg, Month, Year  FROM monthly_data_entry where Month between {$month1} and {$month2} and Year = {$year} Group By Month";
    $result_set = mysql_query($sql);
    $row = mysql_num_rows($result_set);
    $xls_report = mysql_query("delete from aggbymon");
    
     $i=0; 
    while($length = mysql_fetch_array($result_set))
     { 
     $myMon = $length['Month'];
     $getMonth = "SELECT * FROM month_tb WHERE month_no= '{$myMon}' order by month_name Asc";
     $resu = mysql_query($getMonth);
     while($repair = mysql_fetch_array($resu)) { 
     $mon= $repair['month_name']; 
     
         
          $ro = $length['ro'];
          $ob = $length['ob'];
          $nrg = $length['nrg'];   
          $tnrG = $length['tnrG'];  
          $rg = $length['rg'];
          $trg = $length['trg']; 
          
         
          if(!empty($mon) && !empty($ro) && !empty($ob) && !empty($nrg) && !empty($tnrG) && !empty($rg) && !empty($trg)) {
         ?>
   <tr>
    <td><?php echo $mon; ?></td>
    <td><?php  echo $ro; ?></td>   
    <td><?php  echo  $ob; ?></td>
    
    <!--Calculating Bed Occupancy, Average Duration of Stay , room Occupancy, Person Per Room-->
    <?php 
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
    <td><?php echo $roo = round($final, 2).'%'; ?></td>
    <td><?php echo $boo = round($result, 2).'%'; ?></td>   
    <td><?php echo $pp = round($PPR, 2); ?></td>  
     
    <td><?php  echo $ads = round($ADSNR, 2); ?></td>
    <td><?php  echo $asr = round($ADSR, 2); ?></td>   
    <td><?php  echo $orl = round($overall, 2); ?></td> 
    
      <td><?php echo $nrg; ?></td>
    <td><?php  echo $rg; ?></td>   
    <td><?php  echo $sum; ?></td>
           
     </tr>
      <?php
      $show_rpt = mysql_query("insert into aggbymon(mon,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total) values('$mon','$ro','$ob','$roo','$boo','$pp','$ads','$asr','$orl','$nrg','$rg','$sum')"); 
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
                  <td class="danger" style="font-size:15px; font-weight: bold;"><i>Grand Total</i></td>
                    <td><?php echo $t;?></td>
                    <td><?php echo $m;?></td>
                   <td><?php echo $viber = round($candy,2).'%';?></td>
                    <td><?php echo $google = round($dell,2).'%';?></td>   
                    <td><?php echo $youtube = round($camry,2);?></td>
                    <td><?php echo $yahoo = round($toshiba,2);?></td>
                    <td><?php echo $MS = round($apple,2);?></td>  
                    <td><?php echo $dos = round($ksa,2);?></td>
                    <td><?php echo $twit;?></td>
                    <td><?php echo $book;?></td>    
                    <td><?php echo $pen;?></td>
                  </tr>
                  <?php 
          $show_rpt = mysql_query("insert into aggbymon(mon,ro,bo,ror,bor,ppr,nr,res,overall,nonres,resident,total)
           values('G.Total','$t','$m','$viber','$google','$youtube','$yahoo','$MS','$dos','$twit','$book','$pen')"); 

                  } ?>
                </tbody>    
               </table>    

               <div></div>
                <div class="col-md-6" style="text-align:center">
                  <!-- Bar chart -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="fa fa-bar-chart-"></i>
                  <h3 class="box-title">Stastical Report</h3>
                </div>
                <div class="box-body">
                  <div id="bar-chart" class="mychart" style="height: 300px; width: 600px;"></div>
                </div><!-- /.box-body-->
              </div><!-- /.box -->  
              </div> 
           
     </div>									                                              
	</div>
    </div>


  </div>
    
 
           
    
    <!-- this row will not appear when printing -->
       <div  id="samm"  class="container">   
			      <div>&nbsp;</div> 
			  <form action="aggbymonF.php" method="POST">
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
  echo "<script type=\"text/javascript\"> alert( \"First Sumbit Your Entry \");  window.location = \"reportAggByMon.php\"  </script>";
  }
  ?>

  <script src="chart/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="chart/bootstrap.min.js" type="text/javascript"></script>
     <!-- FLOT CHARTS -->
    <script src="chart/jquery.flot.min.js" type="text/javascript"></script>
     <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="chart/jquery.flot.categories.min.js" type="text/javascript"></script>

     <!-- Page script -->
    <script type="text/javascript">

      $(function () {

        /*
         * BAR CHART
         * ---------
         */

        var bar_data = {
          data: [["Jan", 10], ["Feb", 8], ["Mar", 4], ["Apr", 13], ["May", 17], ["Jun", 9], ["Jul",10], ["Aug",19], ["Sep", 17], ["Oct", 15],
          ["Nov", 13], ["Dec", 8]],
          color: "#3c8dbc"
        };
        $.plot("#bar-chart", [bar_data], {
          grid: {
            borderWidth: 1,
            borderColor: "#f3f3f3",
            tickColor: "#f3f3f3"
          },
          series: {
            bars: {
              show: true,
              barWidth: 0.5,
              align: "center"
            }
          },
          xaxis: {
            mode: "categories",
            tickLength: 0
          }
        });
        /* END BAR CHART */       

      });

      
     
    </script>

</body>
</html>
  
