<style>



</style>
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
	if(isset($_POST['Report'])){
	  $Title_Report =$_POST['Title_Report'];
	  $activity =$_POST['activity'];
	  $zoba =$_POST['zoba'];
	  $Year =$_POST['Year'];
	  $Month_two =$_POST['Month_two'];
	  $Month_one =$_POST['Month_one'];
			
?>
	
			
  <div ><br><br><br></div>
   
<div  id="printdv"  class="container">

 
  
         <div  class="span">
		                           <div  class="jumbotron">

                                   <h3> <B style="color:RED" >Employee Report Based on Town</B></h3>
 </div>

 <div class="row">
  <br><br>
   <div class="container">
   <div class="well"><h3 style="color:BLUE">Zoba  <?php echo  $zoba; ?>&nbsp;  Activity-<?php  echo  $activity; ?>&nbsp; From Month  <span class="badge"><?php echo $Month_one ;?> </span> Till Month  <span class="badge"><?php echo $Month_two; ?> </span>  Year <span class="badge"><?php echo $Year; ?> </span></h3></div>
   </div>                      <center class="panel">
					                                     <h1><?php  echo $Title_Report; ?></h1>
						                                 </center>
														 <br/>
														  <?php
						if($_POST['zoba'] != 'All_Zobas')
						{
						?>
     <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="ex" >
								                              
    <thead >
			<tr>
               <th colspan="1" rowspan="1" style="width:70px" tabindex="0" class="jumbotron">Establishment Name</th>
               <th colspan="1" rowspan="1" style="width:70px" tabindex="0"  class="jumbotron">Male</th>
               <th colspan="1" rowspan="1" style="width:100px" tabindex="0" class="jumbotron">Female</th>
			   <th colspan="1" rowspan="1" style="width:100px;Fill:Red" tabindex="0" class="jumbotron" >Average</th>
		 </tr>
                           
    </thead>
        <tbody > 
                       	<?php
						$query_Drop = mysql_query("Drop view `tourism`.`sample3`");
						$query_Create = mysql_query("CREATE VIEW `tourism`.`sample3` AS select *  from  report_employee_town where (Year='$Year' and Establishment_Zoba='$zoba' and Activity='$activity' and Check_Status=1 and  (Month BETWEEN '$Month_one'  and '$Month_two') )");
					    $query_report_one= mysql_query("select count(Distinct Establishment_Name) from sample3`");	$N= mysql_fetch_array( $query_report_one);$check=$N[0];
						$i=0;
						$table_report=mysql_query("delete from employee_report");
					if  ( $check>=1)
					{
						   $query_report= mysql_query("select Distinct Establishment_Name from `sample3`");
							while($f = mysql_fetch_assoc($query_report))
							{$value=$f['Establishment_Name'];
                         $query_result= mysql_query("select Establishment_Name ,SUM(Male),SUM(Female) from `sample3` where Establishment_Name='$value' and Month BETWEEN '$Month_one' and '$Month_two' ");
							$Q = mysql_fetch_array($query_result);
				
							if( $Q>1){
								if($i%2==0) $class = 'even'; else $class = 'odd';
								$Q_a=$Q[0];$Q_b=$Q[1];$Q_c=$Q[2];
					         	$avg=($Q[1]+$Q[2])/2;
							$table_report_exec=mysql_query("insert into employee_report (Establishment_Name,Male,Female,Average,Avg) values ('$Q_a','$Q_b','$Q_c','$avg','$avg')");
							
							echo'<tr class="'.$class.'"> 
                           <td colspan="1" rowspan="1" style="width:70px" tabindex="0" class="alert alert-warning"><b><u style="color:red"><span style="color:black"  >'.$Q[0].' </span></b></td>
                 <td colspan="1" rowspan="1" style="width:70px" tabindex="0" class="alert alert-warning"><mark ><u><span  >'.$Q[1].' </span></u></mark></td>
							   <td colspan="1" rowspan="1" style="width:70px" tabindex="0" class="alert  alert-warning"><mark><u><span >'.$Q[2].' </span></u></mark></td>
							   <td colspan="1" rowspan="1" style="width:70px" tabindex="0" class="alert badge-inverse"><span >'.$avg.' </span></td>';
							}
								else
								{ echo "<script type=\"text/javascript\">
                                           alert( \"Data Entered Is out Of Range \");  window.location = \"dashboard.php\"  </script>"	;
							
							
								}
							}
				
					}
					else
								{ echo "<script type=\"text/javascript\">
                                           alert( \"Data Entered Is out Of Range\");  window.location = \"dashboard.php\"  </script>"	;
							
							
								}
						?>
                        </tbody>
						
							<?php $Aji_M= mysql_query("select SUM(Male),SUM(Female) ,SUM(Average)  from employee_report ");
	                                  $fetch_FILI=mysql_fetch_array($Aji_M);
							
                                   							?>							                                                  
                    </table>
					  <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="ex" >
								                              
    <thead >
			<tr>
               <th colspan="1" rowspan="1" style="width:70px;color:Yellow" tabindex="0" class="alert btn-primary">Grand Total</th>
 <th colspan="1" rowspan="1" style="width:70px;color:Yellow" tabindex="0" class="alert btn-primary"><?php echo $fetch_FILI[0]; ?></th>
                             <th colspan="1" rowspan="1" style="width:70px;color:Yellow" tabindex="0" class="alert btn-primary"><?php echo $fetch_FILI[1] ;?></th>
			                 <th colspan="1" rowspan="1" style="width:70px;color:Yellow" tabindex="0" class="alert btn-primary"><?php echo $fetch_FILI[2] ;?></th>
<?php $table_report=mysql_query("insert into employee_report (Establishment_Name,Male,Female,Average) values ('Grand_Total','$fetch_FILI[0]','$fetch_FILI[1]','$fetch_FILI[2]')");?>
		 </tr>
                           
    </thead>
	</table>
        </div>
														                                              
	</div>
        </div>
		       <div  id="samm"  class="container">   
			   
			   <form action="function.php" method="POST">
			     <div class="pull-right">
					 <input  class='alert btn-danger' type="button" onClick="printDiv('printdv')" value="Print/Pdf" />
					 <input  type="submit" name="Export"  class='alert btn-primary'  value="Excel" />
					  <input  type="submit" name="rtf"  class='alert btn-primary'  value="RTF(Ritch Text Format)" />
					 
		         </div>                                                                                
                                </form>                                                       
								</div>		

   
<script type="application/javascript" src="jss/awesomechart.js"> </script>

<?php
mysql_select_db('tourism',mysql_connect('localhost','root',''))or die(mysql_error());
?>
  
<body>
            <div id="printdv" class="container">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="hero-unit-table">
                            <div class="charts_container">
                                <div class="chart_container">
                                    <div class="alert alert-info">Statistics For Male And Female</div>  
                                    <canvas id="motorcycle_graph" width="1100" height="400">
                                        Your web-browser does not support the HTML 5 canvas element.
                                    </canvas>
                                </div>
                            </div>
						</div>


<div >

<script type="application/javascript">
    var motorcycle_pie = new AwesomeChart('motorcycle_graph');
    motorcycle_pie.data = [
    <?php
    $query_p	= mysql_query("select * from employee_report order by Avg ASC") or die(mysql_error());
    while ($row_p = mysql_fetch_array($query_p)) {
        ?>
        <?php echo $row_p[3] . ','; ?>	
    <?php }; ?>
    ];

    motorcycle_pie.labels = [
    <?php
    $query = mysql_query("select * from employee_report employee_report order by Avg ASC ") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        ?>
        <?php echo "'" . $row[0] . "'" . ','; ?>	
    <?php }; ?>
    ];
    motorcycle_pie.colors = ['gold', 'skyblue', '#FF6600', 'pink', 'darkblue', 'lightpink', 'green'];
    motorcycle_pie.randomColors = true;
    motorcycle_pie.animate = true;
    motorcycle_pie.animationFrames = 30;
    motorcycle_pie.draw();
	motorcycle_pie.render();
</script></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
											
								                                                                          
	<?php
						}
						elseif($_POST['zoba'] == 'All_Zobas')
						{
							include("employee_all_zobas.php");
							
							
							
						}
					else
	{
	echo "<script type=\"text/javascript\"> alert( \"Unable To Find Result \");  window.location = \"dashboard.php\"  </script>"	;
	}	
						
						
						
						
	}
	else
	{
	echo "<script type=\"text/javascript\"> alert( \"First Sumbit Your Entry \");  window.location = \"dashboard.php\"  </script>"	;
	}
	?>
</body>
</html>

<?php //include('footer.php') ?>