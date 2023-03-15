<div id="modal_export_db" class="modal hide fade in active" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class=" modal">
			<p id="demo"></p>

<script>
var d = new Date();
document.getElementById("demo").innerHTML = d.toDateString();
</script>
			<div class="alert badge-inverse"><strong style="color:white">Export Database</strong></div>
	
	<form class="form-horizontal" action="Backup MySql Database Using PHP.php" method="post">
	
	<div class="control-group">
				<label class="control-label" for="inputPassword"><button type="button" class="btn btn-inverse disabled">Database Name</button></label>
				<div class="controls">
				<input type="text" name="Title_Report" id="Report_Title" value="Tourism" disabled placeholder="Report_Title" maxlength="100"  required>
				</div>
	</div>
	
		<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-inverse	disabled ">Exclude TABLE</button></label>
				<div class="controls">
			
					
	<?php

$sql="SHOW TABLES  ";
$sam=mysql_query($sql);
     ?>
	
<select name='tables'  >
	  
		<option value="" ></option>
	    <?php while($row_sub_zoba=mysql_fetch_array($sam))
		{ if($row_sub_zoba[0] !== 'sample2' and $row_sub_zoba[0] !== 'sample3' and $row_sub_zoba[0]!== 'report_employee_town'){ ?>
		  
		<option value="<?php echo $row_sub_zoba[0]; ?>"><?php echo $row_sub_zoba[0]; ?> </option>
	               
					    
							 <?php 
						 
	    }  }
						 ?>
						 
						   </select>  
			
				</div>
			</div>
				
			
		
			
			<div class="control-group">
				<div class="controls">
				<button name="Report" type="submit" class="alert badge-inverse"><i class="icon-save icon-large"></i>&nbsp; Backup DB Toursim</button>
				</div>
			</div>
			<div class="modal-footer">
			<button class="alert badge-inverse" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </form>
		</div>
		
    </div>
 
