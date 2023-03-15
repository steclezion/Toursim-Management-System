<div id="data_entry" class="modal hide fade in active" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class=" modal">
			<p id="demo"></p>

<script>
var d = new Date();
document.getElementById("demo").innerHTML = d.toDateString();
</script>
			<div class="alert badge-inverse"><strong style="color:white">Monthly Data Entry For All Activities [Motel ,Hotel,Pension,GuestHouses]</strong></div>
	
	<form class="form-horizontal" action="Check_modal_data_entry.php" method="post">
	
	<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary disabled">Selected Year</button></label>
				<div class="controls">
			
					
								<?php
								$Today = date('y:m:d');
								$new = date(' Y', strtotime($Today));
							
								?>
						
				<input type="text" id="inputEmail" name="year" value="<?php echo $new;  ?>" placeholder="Tel-no"  readonly required>
			
			</div>
			</div>
	<div class="control-group">
	<script>
function showYoni(str) {
  if (str=="") {
    document.getElementById("txtHi").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHi").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getestablishment_id.php?p="+str,true);
  xmlhttp.send();
}

function showUsers(str) {
  if (str=="") {
    document.getElementById("txtHintPol").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHintPol").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getusers.php?q="+str,true);
  xmlhttp.send();
}
</script>
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary disabled">Month</button></label>
				<div class="controls">
					<select name="Month" required onchange="showYoni(this.value)">
					<option value=""> </option>
				<?php 
				for( $i=1; $i<=12; $i++){
					?>
				<option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
				<?php
				}
			?>
				
				</select>
				</div>
					
			</div>
			<div  class="control-group"  id="txtHi"><b>.</b></div>
			
		
			
			<div class="control-group">
				<div class="controls">
				<button name="sub" type="submit" class="alert badge-inverse"><i class="icon-save icon-large"></i>&nbsp; GO TO DATA ENTRY</button>
				</div>
			</div>
			<div class="modal-footer">
			<button class="alert badge-inverse" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </form>
		</div>
		
    </div>
 
