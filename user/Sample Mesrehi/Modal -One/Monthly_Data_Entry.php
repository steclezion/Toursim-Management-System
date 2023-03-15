<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashbaord.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">		
			<div class="span2">			     
										<ul class="nav nav-tabs nav-stacked">
									<li class="alert alert-info">
											<a href="#add_Establishment" data-toggle="modal" ><i class="icon-plus icon-large"></i>&nbsp;<strong>Add Activity</strong></a>
											</li>
										</ul>
										
										
										 
     <!-- Modal add Establishment -->
	<?php include('modal_add_Establishment.php'); ?>
										
			</div>
			<!-- Modal -->

			<div class="span10">
			
			
					
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-Establishment icon-large"></i>&nbsp;Establishments Table</strong>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Type Of Establishment</th>
                                        <th>Descrption</th>                                 
                                        <th>First name</th>   
										<th>Middle Name</th> 
                                        <th>Last name</th> 
										<th>Authentication Establishment</th> 
									    <th>Tel-Number</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php $Establishment_query=mysql_query("select * from authentication_Establishment ")or die(mysql_error());
									while($row=mysql_fetch_array($Establishment_query))
									{
									$id=$row['id']; ?>
									 <tr class="del<?php echo $id ?>">
									       <td><?php echo $row['']; ?></td> 
										   <td><?php echo $row['']; ?></td> 
										   	   <td><?php echo $row['']; ?></td> 
											   	   <td><?php echo $row['']; ?></td> 
												   
									 
									  
                                
                               
                       
                                    <td width="100">
                                        <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>"  href="#delete_Establishment<?php echo $id; ?>" data-toggle="modal"  class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('delete_Establishment_modal.php'); ?>
										<a rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                    	<?php include('modal_edit_Establishment.php'); ?>
									</td>
									<?php include('toolttip_edit_delete.php'); ?>
									     <!-- Modal edit Establishment -->
								
                                    </tr>
									<?php } ?>
                           
                                </tbody>
                            </table>
							

</div>
		
    </div>    <div class="container">
		<div class="margin-top">
			<div class="row">		
			<div class="span2">			     
									
				<div id="myModal" class="modal fade" Establishment="dialog">
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
										
										 
     <!-- Modal add Establishment -->
	<?php include('modal_add_Establishment.php'); ?>
										
			</div>
		
			</div>
		</div>
		
    </div>
<?php //include('footer.php') ?>