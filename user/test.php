<div class="row">	
			<div class="span12">	
			  
						<!--  -->
								 
						<!--  -->
						<center class="title">
						<h1>Top Movies List</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
								<div class="pull-right">
								<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
								</div>
								<p><a href="add_movies.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Add Movies</a></p>
							
                                <thead>
                                    <tr>
									    <th>Acc No.</th>                                 
                                        <th>Movie Title</th>                                 
                                        <th>Category</th>
										<th>Production Date</th>
										<th >Movies Poster</th>
										<th >Name Of The File</th>
										<th>Story Line</th>
										<th>Director</th>
										<th>Producer</th>
										<th>Size OF The Movie</th>
										<th>Rank</th>
										<th>Date Added</th>
										<th >Status</th>
										<th class="action">Action</th>		
                                    </tr>
                                </thead>
                               <tbody > 
                        <?php
						$query_Drop = mysql_query("Drop view `tourism`.`sample3`");
						$query_Create = mysql_query("CREATE VIEW `tourism`.`sample3` AS select *  from  report_employee_town where (Establishment_Zoba='$zoba' and Activity='$activity' and Check_Status=1 and  (Month BETWEEN '$Month_one'  and '$Month_two') )");
					    $query_report_one= mysql_query("select count(Distinct Establishment_Name) from sample3`");	$N= mysql_fetch_array( $query_report_one);$check=$N[0];
						$i=0;
					if  ( $check>=1)
					{
						   $query_report= mysql_query("select Distinct Establishment_Name from `sample3`");
							while($f = mysql_fetch_assoc($query_report))
							{$value=$f['Establishment_Name'];
                         $query_result= mysql_query("select Establishment_Name ,SUM(Male),SUM(Female) from `sample3` where Establishment_Name='$value' and Month BETWEEN '$Month_one' and '$Month_two' ");
							$Q = mysql_fetch_array($query_result);
					
							if( $Q>1){
								if($i%2==0) $class = 'even'; else $class = 'odd';
						$avg=($Q[1]+$Q[2])/2;
							
							echo'<tr class="'.$class.'">
                           <td colspan="1" rowspan="1" style="width:70px" tabindex="0"><b><u style="color:red"><span style="color:black"  >'.$Q[0].' </span></b></td>
                               <td colspan="1" rowspan="1" style="width:70px" tabindex="0"><mark ><u><span  >'.$Q[1].' </span></u></mark></td>
							   <td colspan="1" rowspan="1" style="width:70px" tabindex="0"><mark><u><span >'.$Q[2].' </span></u></mark></td>
							   <td colspan="1" rowspan="1" style="width:70px" tabindex="0"><span >'.$avg.' </span></td>';
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
                            </table>
			                 </div>		
			                    </div>