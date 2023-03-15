<?php
						$query_Drop = mysql_query("Drop view `tourism`.`sample4`");
$query_Create = mysql_query("CREATE VIEW `tourism`.`sample4` AS select *  from  report_employee_town where (Year='$Year' and Establishment_Zoba='Debub' and Activity='$activity' and Check_Status=1 and  (Month BETWEEN '$Month_one'  and '$Month_two') )");
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
		