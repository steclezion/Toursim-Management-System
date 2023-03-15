<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
<div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
				 <ul class="nav nav-tabs">	
				                         <li   class="active"><a href="sub_zoba.php"> All Zobas </a></li>
				                        <li   class="active"><a href="zoba_maekel.php"> Zoba Maekel </a></li>
										<li   class="active"><a href="zoba_debub.php"> Zoba Debub </a></li>
										<li   class="active"><a href="zoba_Gash_Barka.php">Zoba Gash-Barka</a></li>
										<li   class="active"><a href="zoba_anseba.php">Zoba Anseba</a></li>
										<li   class="active"><a href="zoba_NRS.php">Zone Northern Red Sea</a></li>
										<li   class="active"><a href="zoba_SRS.php">Zone Southern Red Sea</a></li>
										
									</ul>
			   <div class=" alert badge-inverse ">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i  style="color:white "class="icon-user icon-large">&nbsp;Zoba Debub</i> </strong>
                                </div>
				
					
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
								
								<p><a href="add_sub_zoba_debub.php" style="color:white"class="alert badge-inverse "><i class="icon-plus"></i>&nbsp;Add Sub Zone</a></p>
							
							
                                <thead>
                                   
									    <th>Sub Zoba ID</th>   
									    <th>Sub Zoba Name</th>                                 
                                         <th class="action">Action</th>		                         
                           
									
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
								  $user_query=mysql_query("select * from sub_zobas  where zoba_id=102 ")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
							 $id=$row[0];
									?>
									<tr class="del<?php echo $id ?>">
									<td><?php echo $row[0];   ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                
									
                         
									<?php include('toolttip_edit_delete.php'); ?>
                              <td width="100">
                                        <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>"  href="#delete_sub_zoba<?php echo $id; ?>" data-toggle="modal"  class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('delete_sub_zoba_modal.php'); ?>
										<a rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                    	<?php include('modal_edit_sub_zoba.php'); ?>
									</td>
									
                                    </tr>
									<?php  }  
									?>
                           
                                </tbody>
                            </table>
							
			                 </div>		
			                    </div>
								
		                               </div>
                                  </div>
								  