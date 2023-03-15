<div id="edit<?php echo $id ;?>" class="modal hide fade" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert btn-success"><strong style="color:white" >Edit Establishment &nbsp; <?php echo $id; ?></strong></div>
	<form class="form-horizontal" method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Establishment Name</label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="Es_id" value="<?php echo $row[0]; ?>" required>
				<input type="text" id="inputEmail" name="ES_Name" value="<?php echo $row[3]; ?>" required>
			</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Permit Number</label>
				<div class="controls">
				<input type="text" id="inputNumber" value="<?php echo $row[4]; ?>"  name="Permit_Number" placeholder="Permit_Number" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">TIN Number</label>
				<div class="controls">
				<input type="text" id="inputtinnumber" value="<?php echo $row[5]; ?>"  name="Tin_number" placeholder="TinNumber" required>
				</div>
			</div>
				
			<div class="control-group">
				<label class="control-label" for="inputEmail"> P.O.Box</label>
				<div class="controls">
				<input type="text" id="inputtinnumber"  value="<?php echo $row[11]; ?>" name="pbox" placeholder="P.O.Box" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Mobile Number</label>
				<div class="controls">
				<input type="text" id="input_mobile_num"  value="<?php echo $row[9]; ?>" name="mobile_num"  pattern="[0-9]{8}"  title="Enter 8 numbers code" placeholder="mobile_num" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Land Tel</label>
				<div class="controls">
				<input type="text" id="inputtinnumber" name="land_tel"  value="<?php echo $row[10]; ?>" placeholder="Land Line" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Number of Beds</label>
				<div class="controls">
				<input type="text" id="input" name="Number_Of_Beds" value="<?php echo $row[2]; ?>" placeholder="Number Of Beds" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Number of  Rooms</label>
				<div class="controls">
				<input type="text" id="inputtinnumber" value="<?php echo $row[1]; ?>"  name="Number_Rooms" placeholder="Number of Rooms" required>
				</div>
			</div>
				<div class="control-group">

				<label class="control-label" for="inputEmail">Activity</label>
	
				<div class="controls">
								<input type="text" id="input"  class="alert alert-info" disabled  value="<?php echo $row[6]; ?>" placeholder="Number Of Beds" required>
	                                                    <?php
                                                        $query1=mysql_query("SELECT * from activity  ");
                                                        ?>	
                                               <select name='activity' required>
                                               <option value="" ></option>
	                                           <?php while($row1=mysql_fetch_array($query1)){  ?>
		  	                                   <option value="<?php echo $row1[1]; ?>"><?php echo $row1[1]; ?> </option>
	                                             <?php  }  
						 ?>
						 
						   </select>
				</div>
			</div>
	<div class="control-group">
				<label class="control-label" for="inputEmail">Establishment Zoba</label>
				<div class="controls">
			<input type="text" id="input"  class="alert alert-info" disabled  value="<?php echo $row[7]; ?>" placeholder="" required>
					




	<?php

$sql="SELECT * FROM   zobas ";
$sam=mysql_query($sql);
     ?>
	
<select name='zoba' required  " >
	  
		<option value="" ></option>
	    <?php while($row_sub_zoba=mysql_fetch_array($sam)){  ?>
		  
		<option value="<?php echo $row_sub_zoba[1]; ?>"><?php echo $row_sub_zoba[1]; ?> </option>
	               
					    
							 <?php 
						 
						 }  
						 ?>
						 
						   </select>
			
				</div>
			</div>
		 
		
					
    <div class="control-group">
				<label class="control-label" for="inputEmail">Establishment Town</label>
				<div class="controls">
			<input type="text" id="input"  class="alert alert-info" disabled  value="<?php echo $row[8]; ?>" placeholder="" required>
					




	<?php

$sql="SELECT * FROM   sub_zobas ";
$sam=mysql_query($sql);
     ?>
	
<select name='town' required" >
	  
		<option value="" ></option>
	    <?php while($row_sub_zoba=mysql_fetch_array($sam)){  ?>
		  
		<option value="<?php echo $row_sub_zoba[1]; ?>"><?php echo $row_sub_zoba[1]; ?> </option>
	               
					    
							 <?php 
						 
						 }  
						 ?>
						 
						   </select>
			
				</div>
			</div>

	
			<div class="control-group">
				<div class="controls">
				<button name="edit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
	<?php
	if (isset($_POST['edit'])){
	$Es_id=$_POST['Es_id'];
	$ES_Name =$_POST['ES_Name'];
	$Permit_Number =$_POST['Permit_Number'];
	$Tin_number =$_POST['Tin_number'];
	$Number_Rooms =$_POST['Number_Rooms'];
	$Number_Of_Beds =$_POST['Number_Of_Beds'];
	$activity =$_POST['activity'];
	$zoba=$_POST['zoba'];
	$town=$_POST['town'];
	$land_tel = $_POST['land_tel'];
	$mobile_num =$_POST['mobile_num'];
	$pbox = $_POST['pbox'];
	
	
	
	mysql_query("update establishment_entry set  No_Rooms='$Number_Rooms ' , No_Beds = '$Number_Of_Beds' , Establishment_Name= '$ES_Name' , Permit_Number='$Permit_Number' ,Tin_No = '$Tin_number', Activity='$activity', Establishment_Zoba='$zoba',Establishment_Town='$town',Mobile_Tel='$mobile_num',Land_Tel='$land_tel',Pobox='$pbox' where Establishment_Id='$Es_id'")or die(mysql_error()); ?>
	<script>
	window.location="Establishment.php";
	</script>
	<?php
	}
?>