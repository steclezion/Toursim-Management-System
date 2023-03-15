<?php include('dbcon.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
 	<link href="css/print.csss" rel="stylesheet" type="text/css">
    <div id="printDVV" class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp; Zoba <?php  $sam=$_SESSION['print'];echo $_SESSION['print'];$query=mysql_query("select count(Establishment_Id) from  establishment_entry where Establishment_Zoba='$sam'");
									$q=mysql_fetch_array($query);?> <br/><br/><button type="button" class="alert alert-success">Establishments Found <span class="badge"><?php  echo $q[0]; ?></span></button>


									</strong>
                                </div>
						<!--  -->
						<!--  -->
						<center class="title">
						<h1></h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="3" class="table  table-bordered" id="exampl">
								
								
							
                                <thead>
                                    <tr>
									    <th>Establishment ID.</th>                                 
                                        <th>Establishment Name</th>                                 
                                   </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
								 $exec= $_SESSION['print'];
								  $user_query=mysql_query("select Establishment_Id ,Establishment_Name from establishment_entry where Establishment_Zoba='$exec'")or die(mysql_error());
								 
									while($row=mysql_fetch_array($user_query)){
								
									?>
						
									<td><?php echo $row[0];   ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                   
									
                                    </tr>
									<?php  }  
									?>
                           
                                </tbody>
                            </table>
			                 </div>		
			                    </div>
		                               </div>
                                  </div><br>
								  <?php
								  if($q[0]>0)
								  {echo $q[0];
								  ?>
	  <div  id="samm"  class="container">   
			              <div class="pull-right">
					 
				       <input  class='cardinal-button' type="button" onClick="printDiv('printDVV')" value="Print" />
		               </div>                                                                                
                                                                                       
								</div>	
								  <?php
								  }
								?>