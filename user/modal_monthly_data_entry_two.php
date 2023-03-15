<div id="data_entry_two" class="modal hide fade in active" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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
							<select name="year" required onchange="showUserY(this.value)">
							<option value=""> </option>
								<?php	for($i=2010;$i<=$new;$i++){?>
					     <option value="<?php echo $i;?>"><?php echo $i;?></option>
	
				<?php
							}
				?>
			</select>
			</div>
			</div>
	
	<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtH").innerHTML="";
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
      document.getElementById("txtH").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getestablishment_id_two.php?p="+str,true);
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

function showUserY(str) {
  if (str=="") {
    document.getElementById("txtHintPolp").innerHTML="";
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
      document.getElementById("txtHintPolp").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","year.php?q="+str,true);
  xmlhttp.send();
}
</script>
			<div  class="control-group"  id="txtHintPolp"><b>.</b></div>	
			<div  class="control-group"  id="txtH"><b>.</b></div>
			
		
			
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
 
