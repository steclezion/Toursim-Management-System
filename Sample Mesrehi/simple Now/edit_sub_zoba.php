<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
		<?php 
		$query=mysql_query("select * from activity where Activity_id='$get_id'")or die(mysql_error());
		$row=mysql_fetch_array($query);
		
		?>
             <div class="alert  badge-info"><i  style="color:white" class="icon-pencil"></i><strong style="color:white">&nbsp;Edit Activity </strong></div>
			<p><a class="btn btn-info" href="activity.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
	<div class="addstudent">
	<div class="badge-info" style="color:white">Please Enter Details Below</div>	
	<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
			
		<div class="control-group">
			<label class="control-label" for="inputEmail">Activity Name:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputEmail" name="Activity_Title" value="<?php echo $row[1] ?>" placeholder="book_title" required>
			<input type="hidden" id="inputEmail" name="id" value="<?php echo $get_id;  ?>" placeholder="Activity Title" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Activity Description:</label>
			<div class="controls">
						<textarea name="Acivity_Des" type="text"  value="<?php echo $row[2] ?>" required size="100"></textarea>
			</div>
		</div>
		
		

		
		
		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
			</div>
		</div>
    </form>				
			</div>		
			</div>		
			</div>
		</div>
    </div>
<?php// include('footer.php') ?>
<?php 
include('dbcon.php');
if (isset($_POST['submit'])){
	$id=$_GET['id'];  
$Activity_Name =mysql_real_escape_string($_POST['Activity_Title']);
$Acivity_Des =mysql_real_escape_string($_POST['Acivity_Des']);





   $query1=mysql_query("update activity set Activity_Name='$Activity_Name',Activity_Description='$Acivity_Des' where Activity_id='$id'")or die(mysql_error());
	if(	$query1)
{	
								
 header('location:activity.php');
 }
 else
 {echo "invalid";}
}
?>	