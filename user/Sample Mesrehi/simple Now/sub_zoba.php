<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class=" alert badge-info ">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i  style="color:white "class="icon-user icon-large">&nbsp;Zoba Maekel</i> </strong>
                                </div>
				
					
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
								
								<p><a href="add_sub_zoba.php" style="color:white"class="alert badge-info "><i class="icon-plus"></i>&nbsp;Add Sub Zone</a></p>
							
                                <thead>
                                    <th>
									    <th>Sub Zoba ID</th>   
									    <th>Sub Zoba Name</th>                                 
                                                                  
                           
										<th class="action">Action</th>		
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
								  $user_query=mysql_query("select * from sub_zobas ")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
							 $id=$row[0];
									?>
									<tr class="del<?php echo $id ?>">
									<td><?php echo $row[0];   ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                 <!--   <td><?php //echo $row[2]; ?></td>-->
									
                         
									<?php include('toolttip_edit_delete.php'); ?>
                                    <td class="action">
                                    <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" href="#delete_sub_zoba<?php echo $id; ?>" data-toggle="modal"    class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                   <?php include('delete_sub_zoba_modal.php'); ?>
								<a  rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="edit_sub_zoba.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
								
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