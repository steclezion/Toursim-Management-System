	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
		<div class="modal-body">
			<div class="alert badge-inverse"><strong style="color:white" >Edit Sub Zones</strong></div>
	<form class="form-horizontal" method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary  disabled">Sub Zones</button></label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $row[0]; ?>" required>
				<input type="text" id="inputEmail" name="name_sub_zone" value="<?php echo $row[1]; ?>" required>
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
	$id=$_POST['id'];
	$name_sub_zone=$_POST['name_sub_zone'];

	
	
	mysql_query("update sub_zobas set  subZoba_Name ='$name_sub_zone'   where  sub_zoba_id='$id'")or die(mysql_error()); ?>
	<script>
	window.location="sub_zoba.php";
	</script>
	<?php
	}
	
	?>