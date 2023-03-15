<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">		
			<div class="span2">			     
										<ul class="nav nav-tabs nav-stacked">
									<li class="btn-warning">
											<a href="#add_user" data-toggle="modal" ><i class="icon-plus icon-large"></i>&nbsp;<strong>Add User</strong></a>											</li>
			  </ul>
										
										
										 
     <!-- Modal add user -->
	<?php include('modal_add_user.php'); ?>
										
			</div>
			<!-- Modal -->

			<div class="span10">
			
			
					
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                                <div class="alert btn-warning">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong style="color:black"><i class="icon-user icon-large"></i>&nbsp;Users Table</strong>							  </div>
<thead>
                                    <tr>
                                        <th>Username</th>
                                                             
                                        <th>First name</th>   
										<th>Middle Name</th> 
                                        <th>Last name</th> 
										<th>Authentication Role</th> 
									    <th>Tel-Number</th> 
                                        <th>Action</th>
                                    </tr>
                              </thead>
                                <tbody>
								 
                                  <?php $user_query=mysql_query("select * from users")or die(mysql_error());
									while($row=mysql_fetch_array($user_query))
									{
									$id=$row['id']; ?>
									 <tr class="del<?php echo $id ?>">
									       <td><?php echo $row['user_Name']; ?></td> 
								
									   <td><?php echo $row['First_name']; ?></td> 
									   <td><?php echo $row['Middle_Name']; ?></td> 
									   <td><?php echo $row['Last_Name']; ?></td> 
									   <td><?php echo $row['Role']; ?></td> 
									  <td><?php echo $row['Tel_Number']; ?></td> 
									  
                                
                               
                       
                                    <td width="100">
                                        <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>"  href="#delete_user<?php echo $id; ?>" data-toggle="modal"  class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('delete_user_modal.php'); ?>
										<a rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                    	<?php include('modal_edit_user.php'); ?>
									</td>
									<?php include('toolttip_edit_delete.php'); ?>
									     <!-- Modal edit user -->
								
                                    </tr>
									<?php } ?>
                           
                                </tbody>
                            </table>
							

</div>
		
    </div>    <div class="container">
		<div class="margin-top">
			<div class="row">		
			<div class="span2">			     
									
				<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>						
										
										 
     <!-- Modal add user -->
	<?php include('modal_add_user.php'); ?>
										
			</div>
		
			</div>
		</div>
		
    </div>
<?php //include('footer.php') ?>