<div id="modal_report_entry" class="modal hide fade in active" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class=" modal">
			<p id="demo"></p>

<script>
var d = new Date();
document.getElementById("demo").innerHTML = d.toDateString();
</script>
			<div class="alert badge-inverse"><strong style="color:white">Employee Report By town of [Motel ,Hotel,Pension,GuestHouses]</strong></div>
	
	<form class="form-horizontal" action="Employee_report.php" method="post">
	
	<div class="control-group">
				<label class="control-label" for="inputPassword"><button type="button" class="btn btn-inverse disabled">Enter Report Title</button></label>
				<div class="controls">
				<input type="text" name="Title_Report" id="Report_Title" placeholder="Report_Title" maxlength="100"  required>
				</div>
	</div>
	
		<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-inverse	disabled">Activity</button></label>
				<div class="controls">
			
					
	<?php

$sql="SELECT  Activity_Name  from activity  ";
$sam=mysql_query($sql);
     ?>
	
<select name='activity' required " >
	  
		<option value="" ></option>
	    <?php while($row_sub_zoba=mysql_fetch_array($sam))
		{  ?>
		  
		<option value="<?php echo $row_sub_zoba[0]; ?>"><?php echo $row_sub_zoba[0]; ?> </option>
	               
					    
							 <?php 
						 
	    }  
						 ?>
						 
						   </select>  
			
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-inverse	disabled">Zoba</button></label>
				<div class="controls">
			
					
	<?php
 
              $sql="SELECT Zoba_Name from zobas  ";
              $sam=mysql_query($sql);
     ?>
	
                 <select class="select" name='zoba' required >
				  <option value="" ></option>
	           	<option value="All_Zobas" >All Zobas</option>
	           <?php while($row_Zoba=mysql_fetch_array($sam))
		{  ?>
		  
		<option value="<?php echo $row_Zoba[0]; ?>"><?php echo $row_Zoba[0]; ?> </option>
      	 <?php 
       }  
		?>
						 
						   </select>  
			
				</div>
			</div>
	
	<div class="control-group">
	<script>
function showM(str) {
  if (str=="") {
    document.getElementById("ram").innerHTML="";
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
      document.getElementById("ram").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","fetch_month.php?p="+str,true);
  xmlhttp.send();
}

function showRam(str) {
  if (str=="") {
    document.getElementById("ass").innerHTML="";
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
      document.getElementById("ass").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","fetch_second_month.php?w="+str,true);
  xmlhttp.send();
}
</script>
				<label class="control-label" for="inputEmail"><button type="button" class="btn btn-inverse disabled">Year</button></label>
				<div class="controls">
					<select name="Year" required onchange="showM(this.value)">
					<option value=""> </option>
				<?php
  include("dbcon.php");
           $sql="SELECT Distinct Year FROM monthly_data_entry ";
           $sam=mysql_query($sql);
           while($row_year=mysql_fetch_array($sam)){  ?>
           <option value="<?php echo $row_year[0]; ?>"><?php echo $row_year[0]; ?> </option>
	               <?php 
						 
						 }  
						 ?>
						 
						   </select>
				</div>
					
			</div>
			<div  class="control-group"  id="ram"><b>.</b></div>
			
		
			
			<div class="control-group">
				<div class="controls">
				<button name="Report" type="submit" class="alert badge-inverse"><i class="icon-save icon-large"></i>&nbsp; Preview Employee Report</button>
				</div>
			</div>
			<div class="modal-footer">
			<button class="alert badge-inverse" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </form>
		</div>
		
    </div>
 
