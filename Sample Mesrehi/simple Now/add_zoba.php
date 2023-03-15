<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<?php $est_query=mysql_query("select Max(Activity_id) from  activity ")or die(mysql_error());
	
		    
					$row=mysql_fetch_array($est_query);
					  $add =$row[0] + 1;            
					  ?>
			<div class="span12">	
		
             <div class="alert badge-info"  style="color:white">Add  Activity </div>
			 
			<p><a href="activity.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
	<div class="addstudent">
	<div class="alert btn-info" style="color:Black">Please Enter Details Below</div>		
	<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
			<div class="control-group">
			<label class="control-label" for="inputEmail">Activity Name:</label>
			<div class="controls">
			<input type="text" class="span4"  size="10" id="inputEmail" name="Activity_Name"  placeholder="Acivity Name" required>
			<input type="hidden" class="span4"  size="10" id="inputEmail" value="<?php echo  $add; ?>" name="Activity_ID"  placeholder="Acivity ID" required>

			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputEmail">Activity Description</label>
			<div class="controls">
			<textarea name="Acivity_Des" type="text" required size="100"></textarea>
			
			</div>
		</div>
		
		
		
		
		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Add  Activity </button>
			</div>
		</div>
    </form>	
			</div>		
			</div>		
			</div>
		</div>
    </div>
<?php //include('footer.php') ?>
<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
	$Activity_ID=mysql_real_escape_string($_POST['Activity_ID']);
	$Activity_Name=mysql_real_escape_string($_POST['Activity_Name']);
    $Acivity_Des =mysql_real_escape_string($_POST['Acivity_Des']);



								
mysql_query("insert into activity (Activity_Id,Activity_Name,Activity_Description) values('$Activity_ID','$Activity_Name','$Acivity_Des')")or die(mysql_error());
 
 
header('location:activity.php');
}
?>	