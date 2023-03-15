	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Edit User</strong></div>
	<form class="form-horizontal" method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Username</label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $row['id']; ?>" required>
				<input type="text" id="inputEmail" name="username" value="<?php echo $row['user_Name']; ?>" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Tel_ umber</label>
				<div class="controls">
		
				<input type="number" id="inputnumber" name="tel" value="<?php echo $row['Tel_Number']; ?>" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				<input type="text" name="password" id="inputPassword" value="<?php echo $row['Password']; ?>" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Firstname</label>
				<div class="controls">
	
				<input type="text" id="inputEmail" name="firstname" value="<?php echo $row['First_name']; ?>" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Middle Name</label>
				<div class="controls">
	
				<input type="text" id="inputEmail" name="Middlename" value="<?php echo $row['Middle_Name']; ?>" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Lastname</label>
				<div class="controls">

				<input type="text" id="inputEmail" name="lastname" value="<?php echo $row['Last_Name']; ?>" required>
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
	
	
	mysql_query("update users set use_Name='$username', Password='$password' , First_name = '$firstname' , Middle_Name = '$middlname' ,Last_Name = '$lastname',Tel_Number = '$tel'   where  id='$user_id'")or die(mysql_error()); ?>
	<script>
	window.location="users.php";
	</script>
	<?php
	}
	
	?>