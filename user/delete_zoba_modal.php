	<div id="delete_activity<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert badge-info">Are you Sure you want to Delete this Data &nbsp;<?php echo $id; ?>" ?</div>

		</div>
		<div class="modal-footer">
			<a class="btn btn-danger" href="delete_activity.php<?php echo '?id='.$id; ?>">Yes</a>
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
