	<div id="delete_sub_zoba<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert badge-inverse" style="color:white">Are you Sure you want to Delete this Data &nbsp;<?php echo $row[1]; ?>" ?</div>

		</div>
		<div class="modal-footer">
			<a class="btn btn-danger" href="delete_sub_zoba.php<?php echo '?id='.$id; ?>">Yes</a>
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
