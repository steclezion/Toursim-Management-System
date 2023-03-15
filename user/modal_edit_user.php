	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
		<div class="modal-header">
			<div class="alert btn-warning"><strong style="color:black" >Edit User</strong></div>
	<form class="form-horizontal" method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary  disabled">UserName</button></label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $row['id']; ?>" required>
				<input type="text" id="inputEmail" name="username" value="<?php echo $row['user_Name']; ?>" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary  disabled">Tel Number</button></label>
				<div class="controls">
		
				<input type="text" id="inputnumber" name="tel" value="<?php echo $row['Tel_Number']; ?>"  maxlength="8" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword"><button type="button" class="btn btn-primary  disabled">Password</button></label>
				<div class="controls">
				<input type="text" name="password" id="inputPassword" value="<?php echo $row['Password']; ?>" maxlength="10" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary  disabled">First Name</button></label>
				<div class="controls">
	
				<input type="text" id="inputEmail" name="firstname" value="<?php echo $row['First_name']; ?>" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary  disabled">Middle Names</button></label>
				<div class="controls">
	
				<input type="text" id="inputEmail" name="Middlename" value="<?php echo $row['Middle_Name']; ?>" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary  disabled">Last Name</button></label>
				<div class="controls">

				<input type="text" id="inputEmail" name="lastname" value="<?php echo $row['Last_Name']; ?>" required>
				</div>
			</div>
					<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary disabled">Authentication Role </button></label>
				<div class="controls"><input type="text" id="inputEmail" name="lastname" value="<?php echo $row['Role']; ?>"  disabled required>
				<select name="role">
			
				<option value="Administrator"> Administrator </option>
			   <option value="User"> User</option>
			<option value="Manager"> Manager </option>
				
				
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
	
	$user_id=$_POST['id'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$firstname=$_POST['firstname'];
	$middlname=$_POST['Middlename'];
	$lastname=$_POST['lastname'];
 $tel=$_POST['tel'];
  $role=$_POST['role'];
	
	
	mysql_query("update users set user_Name='$username', Password='$password' , First_name = '$firstname' , Middle_Name = '$middlname' ,Last_Name = '$lastname',Tel_Number = '$tel',Role='$role'   where  id='$user_id'")or die(mysql_error()); ?>
	<script>
	window.location="users.php";
	</script>
	<?php
	}
	
	?>