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
                    <th colspan="2" style="background-color:brown;">Month</th>
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
 $sql = "SELECT SUM(NRB_Revenue) As nrb, SUM(RB_Revenue) As rb, SUM(FB_Revenue) As fb, SUM(AlRevenue) As al, SUM(SRevenue) As sr,
     SUM(ORevenue) As ore, SUM(HotRevenue) As htr, Month, Year, Establishment_id  
     FROM monthly_data_entry where Month >= {$month1} and Month <= {$month2} and Year = {$year} group by Month";
    $result_set = mysql_query($sql);
    $xls_report = mysql_query("delete from rbm");
    $row = mysql_num_rows($result_set);
                                  
                             
    $i=0;  
  while($length = mysql_fetch_array($result_set))  
     { 
   $myMon = $length['Month'];
          
    $getMonth = "SELECT * FROM month_tb WHERE month_no= '{$myMon}' order by month_name Asc";
     $resu = mysql_query($getMonth);
   
     while($repair = mysql_fetch_array($resu)) { 
     $yeah = $repair['month_name'];   
    
      $nrg = $length['nrb'];
     $rg = $length['rb']; 
     $fr = $length['fb'];
     $al = $length['al'];
     $sr = $length['sr'];
     $OR = $length['ore'];
     $hr = $length['htr'];
     $wealthy =  $nrg + $rg + $fr + $al + $sr + $OR + $hr;
       if(!empty($rg) && !empty($nrg)) {
   
    ?>
    <tr>
    <td colspan="2"><?php echo $yeah; ?></td>
    <td colspan="2"><?php echo $nrg; ?></td>
    <td colspan="2"><?php echo $rg; ?></td>   
    <td><?php echo $fr; ?></td> 
    <td><?php echo $al; ?></td>
    <td><?php echo $sr; ?></td>   
    <td><?php echo $OR; ?></td>
    <td><?php echo $hr; ?></td>
    <td><?php echo $wealthy; ?></td>   
     </tr>
   
      <?php  
      $show_rpt = mysql_query("insert into rbm(mon,nonres,res,foodrev,alchol,softd,hotd,otherrev,totrev) values('$yeah','$nrg','$rg','$fr','$al','$sr','$OR','$hr','$wealthy')"); 
    
      $i++;
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
      $whn[] = $wealthy;       
      
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
     
                  <tr style="background-color:orange;">
                  <td  colspan="2" style="font-size:15px; font-weight: bold;"><i>Grand Total</i></td> 
                    <td colspan="2"><?php echo $t;?></td>
                    <td colspan="2"><?php echo $twit;?></td>
                    <td><?php echo $usa = round($m,2);?></td>
                    <td><?php echo $england = round($book,2);?></td>    
                    <td><?php echo $intelligence = round($pen,2);?></td>
                    <td><?php echo $nasa = round($csv,2);?></td>
                    <td><?php echo $satellite = round($dat,2);?></td>    
                    <td><?php echo $rocket = round($mdb,2);?></td>
                  </tr>
                                                   
                  <?php 
       $show_rpt = mysql_query("insert into rbm(mon,nonres,res,foodrev,alchol,softd,hotd,otherrev,totrev) 
       values('G.Total','$t','$twit','$usa','$england','$intelligence','$nasa','$satellite','$rocket')"); 

                  } ?>
                  
                </tbody>
               </table>     
               
      </div>									                                              
	</div>
    </div>
  </div>

<!-- this row will not appear when printing -->
       <div  id="samm"  class="container">   
			   
			   <form action="rbm.php" method="POST">
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
  echo "<script type=\"text/javascript\"> alert( \"First Sumbit Your Entry \");  window.location = \"reportRBM.php\"  </script>";
  }
  ?>

</body>
</html>
  
