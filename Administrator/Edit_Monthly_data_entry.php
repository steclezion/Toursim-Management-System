<div id="Edit_data" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class="modal">
			<p id="demo"></p>

<script>
var d = new Date();
document.getElementById("demo").innerHTML = d.toDateString();
</script>
			<div class="alert badge-inverse"><strong style="color:white">Select Establishmrnt ID</strong></div>
	
	<form class="form-horizontal" method="post">
	

	<div class="control-group">
	<script>

function showMonths(str) {
  if (str=="") {
    document.getElementById("txt").innerHTML="";
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
      document.getElementById("txt").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","get_Months.php?q="+str,true);
  xmlhttp.send();
}

function showEsta(str) {
  if (str=="") {
    document.getElementById("txt_Esta").innerHTML="";
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
      document.getElementById("txt_Esta").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","get_Esta.php?p="+str,true);
  xmlhttp.send();
}
function showEstablishment_Name(str) {
  if (str=="") {
    document.getElementById("sam").innerHTML="";
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
      document.getElementById("sam").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","get_Edit_Name.php?q="+str,true);
  xmlhttp.send();
}
</script>
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-primary disabled">Year</button></label>
				<div class="controls">
			
					
	<?php

$sql="SELECT Distinct Year FROM monthly_data_entry";
$sam=mysql_query($sql);
     ?>
	
<select name='Year' required onChange="showMonths(this.value)" >
	  
		<option value="" ></option>
	    <?php while($row_data=mysql_fetch_array($sam)) {  ?>
		  
		<option value="<?php echo $row_data[0]; ?>"><?php echo $row_data[0]; ?> </option>
	               
					    
							 <?php 
						 
						 }  
						 ?>
						 
						   </select>
			
				</div>
					
			</div>
			<div  class="control-group"  id="txt"><b>.</b></div>
		   <div  class="control"  id="txt_Esta"><b>.</b></div>      
		   <br/>
		<div  class="control"  id="sam"><b>.</b></div>  
		   
		

			<div class="modal-footer">
			<button class="alert badge-inverse" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </form>
		</div>
		
    </div>
 
	<?php
	if (isset($_POST['samino'])){
		
	$Month=$_POST['Month'];
	$year=$_POST['Year'];
	$Establishment_id=$_POST['Establishment_id'];
		session_start();
	$_SESSION['Establishment_E']=$Establishment_id;
	$_SESSION['Active']='active';
	$_SESSION['ActiveG']='empty';
	$_SESSION['ActiveE']='empty';
	$_SESSION['ActiveRE'] = 'empty';
$_SESSION['year_E']=$year;
$_SESSION['Month_E']=$Month;
	header("location:Edit_monthly_entry.php");
	}
	?>