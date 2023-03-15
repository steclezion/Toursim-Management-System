	<div id="add_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class=" modal-header">
			<div class="alert btn-warning"><strong style="color:black">Add User</strong></div>
		
	<form class="form-horizontal" method="post" action="add_users_corrected.php">
			<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary  disabled">UserName</button></label>
				<div class="controls">
				<input type="text" id="inputEmail" name="username" placeholder="Username" autofocus  required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword"><button type="button" class="btn btn-primary disabled">Password</button></label>
				<div class="controls">
				<input type="password" name="password" id="inputPassword" placeholder="Password" maxlength="10"  required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary disabled">Firstname</button></label>
				<div class="controls">
				<input type="text" id="inputEmail" name="firstname" placeholder="Firstname" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary disabled">Middle Name</button></label>
				<div class="controls">
				<input type="text" id="inputEmail" name="Middle_Name" placeholder="Middle Name" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary disabled">Lastname</button></label>
				<div class="controls">
				<input type="text" id="inputEmail" name="lastname" placeholder="Lastname" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary disabled">Tel-No</button></label>
				<div class="controls">
				<input type="text" id="inputEmail" name="Tel" placeholder="Tel-no"  maxlength="7"required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary disabled">Authentication Role </button></label>
				<div class="controls">
				<select name="role">
				
				<option value="Administrator"> Administrator </option>
			   <option value="User"> User</option>
			<option value="Manager"> Manager </option>
				
				
				</select>
				</div>
			</div>
			
			<div class="control-group">
				<div class="controls">
				<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Save</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
	