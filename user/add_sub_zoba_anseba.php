<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<?php $est_query=mysql_query("select Max(sub_zoba_id) from  sub_zobas ")or die(mysql_error());
	
		    
					$row=mysql_fetch_array($est_query);
					  $add =$row[0] + 1;            
					  ?>
			<div class="span12">	
		
             <div class="alert badge-inverse"  style="color:white">Add Sub Zones</div>
			 
			<p><a href="sub_zoba.php" class="alert badge-inverse"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
				<div class="alert carousel-control" style="color:Black">Please Enter Details Below</div>	
	<div class="addstudent">
	
	<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
			<div class="control-group">
			<label class="control-label" for="inputEmail">Sub Zoba ID:</label>
			<div class="controls">
			<input type="text" class="span4"   readonly value="<?php  echo   $add ; ?>" size="10" id="inputEmail" name="sub_zoba_id"  placeholder="Sub Zone Identification Number" required>
			<input type="hidden" class="span4" disabled size="10" id="inputEmail" value="<?php echo  $add; ?>" name="sub_ID"  placeholder="SubZone ID" required>

			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputEmail"> Sub Zone Name</label>
			<div class="controls">
			<input type="text" class="span4"  size="10" id="inputEmail" name="sub_name"  placeholder="Sub Zone Identification Name" required>
			</div>
		</div>
		
		
		
		
		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="alert btn-inverse"><i class="icon-save icon-large"></i>&nbsp;Add Sub Zone</button>
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
	$sub_zoba_id=mysql_real_escape_string($_POST['sub_zoba_id']);
	$sub_name= mysql_real_escape_string($_POST['sub_name']);
	



								
mysql_query("insert into sub_zobas (sub_zoba_id,subZoba_Name,zoba_id) values('$sub_zoba_id','$sub_name',104)")or die(mysql_error());
 
 
header('location:sub_zoba.php');
}
?>	