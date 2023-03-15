<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class=" alert badge-info ">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i  style="color:white "class="icon-user icon-large">&nbsp;All Activities</i> </strong>
                                </div>
						<!--  -->
								 
						<!--  -->
						<center class="title">
						<h1>Top activity List</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
								
								<p><a href="add_activity.php" style="color:white"class="alert badge-info "><i class="icon-plus"></i>&nbsp;Add activity</a></p>
							
                                <thead>
                                    <tr>
									    <th>Actitvity ID</th>   
									    <th>Activity Name</th>                                 
                                        <th>Activity Description</th>                                 
                           
										<th class="action">Action</th>		
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
								  $user_query=mysql_query("select * from activity ")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
							 $id=$row[0];
									?>
									<tr class="del<?php echo $id ?>">
									<td><?php echo $row[0];   ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                    <td><?php echo $row[2]; ?></td>
									
                         
									<?php include('toolttip_edit_delete.php'); ?>
                                    <td class="action">
                                    <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" href="#delete_activity<?php echo $id; ?>" data-toggle="modal"    class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                   <?php include('delete_activity_modal.php'); ?>
								<a  rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="edit_activity.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
								
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
								  
								  
								  
								  
								  
								  
								  
								  
				
								  
<?php// include('footer.php') ?>