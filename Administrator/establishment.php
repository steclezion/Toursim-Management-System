
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>

    <div class="container">
		<div class="margin-top">
			
			<div class="row">		
	
			<!-- Modal -->
<div class="span2">			     
										<ul class="nav nav-tabs nav-stacked">
									<li class="alert btn-success">
											<a href="#add_Establishment" data-toggle="modal" ><i class="icon-plus icon-large"></i>&nbsp;<strong>Add Establishment</strong></a>
											
											</li>
										</ul>
										
										 
     <!-- Modal add role -->
	<?php include('modal_add_establishment.php'); ?>
										
			</div>
				
<script>
$(document).ready(function(){
	setInterval(function(){
		$("#screen").refresh('establishment.php')
    }, 1000);
});
</script>

					<div id="screen"></div>
			<div class="span">
			
			
					
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                                <div class="alert btn-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-role icon-large" style="color:white">Establishment Table</i></strong>
                                </div>
                                <thead>
                                    <tr>
									      <th>Establ ishment ID</th>
									     <th> Establ ishment Name</th>
                                        <th>Permit Number</th>                                 
                                        <th>TIN Number</th>   
										<th>Activity</th> 
										<th>Number of Rooms</th>
									    <th>Number Of Beds</th>
										<th>Establ ishment Zoba</th> 
									    <th>Establ ishment Town</th> 
									     <th>Mobile Number</th> 
										 <th> Land Tel</th>
										<th>P.O.BOX</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php $role_query=mysql_query("select * from  establishment_entry ")or die(mysql_error());
								         $mark_tool=mysql_query("update sub_zobas set Mark=0 ") or die(mysql_error());
									while($row=mysql_fetch_array($role_query))
								
									{ 
									$id=$row['Establishment_Id']; ?>
									 <tr class="del<?php echo $id ?>">
									 <td><?php echo $row[0]; ?></td> 
								     <td><?php echo $row[3]; ?></td> 
								     <td><?php echo $row[4]; ?></td> 
					    		   	 <td><?php echo $row[5]; ?></td> 
		         		   	         <td><?php echo $row[6]; ?></td> 
							   		 <td><?php echo $row[1]; ?></td> 
								     <td><?php echo $row[2]; ?></td> 
						             <td><?php echo $row[7]; ?></td> 
			                        <td><?php echo $row[8]; ?></td> 
				                    <td><?php echo $row[9]; ?></td> 
			                        <td><?php echo $row[10]; ?></td> 
							    <td><?php echo $row[11]; ?></td> 
												   
									 
									  
                                
                              
                       
                                    <td width="100">
                                        <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>"  href="#delete_Establishment<?php echo $id; ?>" data-toggle="modal"  class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('delete_Establishment_modal.php'); ?>
										<a rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i readonly class="icon-pencil icon-large"></i></a>
                                    <div class="span12">		<?php include('modal_edit_Establishment.php'); ?>  </div>
									</td>
									<?php include('toolttip_edit_delete.php'); ?>
									     <!-- Modal edit role -->
								
                                    </tr>
									<?php } ?>
                           
                                </tbody>
                            </table>
			
							

</div>

			
    </div>    
	
			
	<div class="container">
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
		</div>
		
			</div>
		</div>
		
    </div>
	</div>
	
	</div>
<?php //include('footer.php') ?>