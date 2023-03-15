	
	<div id="add_Establishment" class="modal hide fade" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
		<?php $est_query=mysql_query("select Max(Establishment_Id) from  establishment_entry ")or die(mysql_error());
	
		    
					$row=mysql_fetch_array($est_query);
					  $add=$row[0] + 1;                                                                                                        
			


										?>
				<div class="alert btn-success"><strong style="color:white">Add Establishment</strong></div>
	<form class="form-horizontal" method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Establishment ID</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="ES_Id"  value="<?php echo $add; ?>"  readonly     placeholder=" Establishment ID" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Establishment Name</label>
				<div class="controls">
				<input type="text" name="ES_Name" id="ES_Name" placeholder="Establishment Name" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Permit Number</label>
				<div class="controls">
				<input type="text" id="inputNumber" name="Permit_Number" placeholder="Permit_Number" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">TIN Number</label>
				<div class="controls">
				<input type="text" id="inputtinnumber" name="Tin_number" placeholder="TinNumber" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail"> P.O.Box</label>
				<div class="controls">
				<input type="number" id="inputtinnumber" name="pbox" placeholder="P.O.Box" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Mobile Number</label>
				<div class="controls">
				<input type="number" id="input_mobile_num"  maxlength="10" name="mobile_num" placeholder="mobile_num" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Land Tel</label>
				<div class="controls">
				<input type="number" id="inputtinnumber" name="land_tel" placeholder="Land Line" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Number of  Rooms</label>
				<div class="controls">
				<input type="number" id="inputtinnumber" name="Number_Rooms" placeholder="Number of Rooms" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Number of Beds</label>
				<div class="controls">
				<input type="number" id="input" name="Number_Of_Beds" placeholder="Number Of Beds" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Activity</label>
				<div class="controls">
					
	                                                    <?php
                                                        $query1=mysql_query("SELECT * from activity  ");
                                                        ?>	
                                               <select name='activity' required>
                                               <option value="" ></option>
	                                           <?php while($row=mysql_fetch_array($query1)){  ?>
		  	                                   <option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?> </option>
	                                             <?php  }  
						 ?>
						 
						   </select>
				</div>
			</div>
	
	<div class="control-group">
				<label class="control-label" for="inputEmail">Establishment Zoba</label>
				<div class="controls">
			
					
<script>
function showUser_sub_zoba(str) {
  if (str=="") {
    document.getElementById("txtHintpol").innerHTML="";
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
      document.getElementById("txtHintpol").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?k="+str,true);
  xmlhttp.send();
}
</script>



					
	<?php

$sql="SELECT * FROM   zobas ";
$sam=mysql_query($sql);
     ?>
	
<select name='zoba' required  onchange="showUser_sub_zoba(this.value)" >
	  
		<option value="" ></option>
	    <?php while($row_sub_zoba=mysql_fetch_array($sam)){  ?>
		  
		<option value="<?php echo $row_sub_zoba[0]; ?>"><?php echo $row_sub_zoba[1]; ?> </option>
	               
					    
							 <?php 
						 
						 }  
						 ?>
						 
						   </select>
			
				</div>
		

			</div>

     <div  class="control"  id="txtHintpol"><b>.</b></div>

			
			<div class="control-group">
				<div class="controls">
				<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Save</button>
				</div>
			</div>




		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
   </form>
   
	<?php
	if (isset($_POST['submit'])){
	$ES_Id =$_POST['ES_Id'];
	$ES_Name =$_POST['ES_Name'];
	$Permit_Number =$_POST['Permit_Number'];
	$Tin_number =$_POST['Tin_number'];
	$Tin_number =$_POST['Tin_number'];
	$Number_Rooms =$_POST['Number_Rooms'];
	$Number_Of_Beds =$_POST['Number_Of_Beds'];
	$activity =$_POST['activity'];
	$zoba=$_POST['zoba'];
	$town=$_POST['town'];
	$land_tel= $_POST['land_tel'];
	$mobile_num = $_POST['mobile_num'];
	$pbox = $_POST['pbox'];
	
	$zobaw=mysql_query("select Zoba_Name from zobas where zoba_id = '$zoba' ");
	$fetch_zoba=mysql_fetch_row($zobaw);
	$fetched_data= $fetch_zoba[0];
		$Today = date('y:m:d');
	    $month = date(' m', strtotime($Today));
		$Year = date('Y', strtotime($Today));
	mysql_query("insert into establishment_entry (Establishment_Id,No_Rooms,No_Beds,Establishment_Name,Permit_Number,Tin_No,Activity,Establishment_Zoba,Establishment_Town,Mobile_Tel,Land_Tel,Pobox) values('$ES_Id','$Number_Rooms','$Number_Of_Beds','$ES_Name','$Permit_Number','$Tin_number','$activity','$fetched_data','$town','$mobile_num','$land_tel','$pbox')")or die(mysql_error());
	
	     For($i=1;$i<=12;$i++){
			
	mysql_query("insert into monthly_data_entry(Establishment_id,Month,Year,NR_Guest,R_NewGuest,Rooms_Occupied,TNR_Guest,TR_Guest,NRB_Revenue,FB_Revenue,AlRevenue,HotRevenue,SRevenue,ORevenue,Male,Female,Unoffered_Rooms,Unoffered_Beds,Offered_Rooms,Offered_Beds,Check_status) values('$ES_Id','$i','$Year','0','0','0','0','0','0','0','0','0','0','0','-','-','0','0','0','0','0')")or die(mysql_error());
		 }
		  header("location:Establishment.php");
	}        
      require_once("establishment.php");

?>
		 
  <script type="text/javascript">

window.load = "establishment.php"
</script>