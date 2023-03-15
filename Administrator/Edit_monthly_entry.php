
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>

	  <?php 
	
	  $Est_id_E =$_SESSION['Establishment_E'];
	  $year=$_SESSION['year_E'];
      $Month=$_SESSION['Month_E'];
	  $Active_Rooms=$_SESSION['Active'];
	  $Active_Guest=$_SESSION['ActiveG'];
	  $Active_Revenue =$_SESSION['ActiveRE'];
	  $Active_Employee=$_SESSION['ActiveE'];
	  $est_query=mysql_query("select * from  establishment_entry where Establishment_Id='$Est_id_E' ")or die(mysql_error());
	  $query=mysql_query("select * from  monthly_data_entry where (Establishment_Id='$Est_id_E' AND Month='$Month' AND Year='$year')")or die(mysql_error());
      $row=mysql_fetch_array($est_query);
      $row_query=mysql_fetch_array($query);						
									?>
	
			<!-- Modal -->
				<?php echo $row[3]; ?>
    <div class="container">
		<div class="margin-top">
		
			<div class="row">	
	<div class="span">
	<div class="container">
    <div class="container">
  <div class="well well-sm">
    <h1><B style="color:RED">Establishment ID :<?php echo $row[0]; ?> </B>&nbsp;<b style="color:BLUE" >Month:<?php echo $Month;  ?> Year:<?php echo $year;  ?></b></h1>   

     <div class="alert badge-inverse">
  <strong>Establishment Name:</strong> <i style="color:WHITE;font-style:Monotype-corsiva"><?php echo $row[3];   ?> </i>
</div>

<div class="alert badge-inverse">
  <strong>Establishment Zoba:</strong><i style="color:WHITE;font-style:Monotype-corsiva"> <?php echo $row[7];   ?></i>
</div>

<div class="alert badge-inverse">
  <strong>Establishment sub Zone:</strong> <i style="color:WHITE;font-style:Monotype-corsiva"><?php echo $row[8];   ?></i>
</div>

<div class="alert badge-inverse">
  <strong>Number of Beds:</strong><i style="color:WHITE;font-style:Monotype-corsiva"><?php echo $row[2];   ?></i>
</div>
<div class="alert badge-inverse">
  <strong>Number of Rooms:</strong><i style="color:WHITE;font-style:Monotype-corsiva"><?php echo $row[1];   ?></i>
</div>
<div class="alert badge-inverse">
  <strong>Activity:</strong><i style="color:WHITE;font-style:Monotype-corsiva"><?php echo $row[6];   ?></i>
</div>
</div>
<!--
<div class="container">
  <h2><b style="color:RED"><?php echo $row[3];   ?> - <?php echo $row[6];   ?></b></h2>
  <ul class="nav nav-tabs">
    <li class="<?php echo $Active_Rooms; ?>"><a data-toggle="tab" style="color:black" href="#room">Room And Bed Space</a></li>
    <li class="<?php echo $Active_Guest; ?>"><a data-toggle="tab" style="color:black" href="#guests">Guests</a></li>
    <li class="<?php echo $Active_Revenue; ?>"><a data-toggle="tab" style="color:black" href="#revenue">Revenue</a></li>
    <li class="<?php echo $Active_Employee; ?>"><a data-toggle="tab" style="color:black" href="#Employee">Employees</a></li>
  </ul>

  <div class="tab-content">
   
    <div id="room" class="tab-pane fade in  <?php echo $Active_Rooms; ?>">
      <h3>Room  And Bed Entry Form</h3>
  <div data-role="main" class="ui-content">
    <form method="post" action="updated_Edited_data.php">
        <div class="ui-field-contain">
        <label for="Rooms">Room Offered :</label>
        <input value="<?php echo $row_query[22];?>"<?php echo $row[0]; ?> required type="number" name="rooms" id="rooms">        
        <label for="Bed-Offered">Bed Offered:</label>            
        <input value="<?php echo $row_query[23];?>" type="number" name="bed"  required id="bed" >           
          <label for="un_offered_Rooms">Un Offered Rooms:</label>
        <input value="<?php echo $row_query[20];?>"type="number" required name="un_rooms" id="rooms">       
        <label for="Bed-Offered">Un Offered Beds:</label>
        <input value="<?php echo $row_query[21];?>" required type="number" name="un_bed" id="bed">
		</div>
	<input type="submit" name="Rooms_Beds" data-inline="true" value="Submit">
<br/>

	
  </div>
  </form>
</div>
 <div id="guests" class="tab-pane fade in <?php echo $Active_Guest; ?>">
      <h3>Guests</h3>
   <div data-role="page">
 

  <div data-role="main" class="ui-content">
     <form method="post" action="updated_Edited_data.php">
      <div class="ui-field-contain">
        <label for="Non_Res">Non Resident New Guests:</label>
        <input value="<?php echo $row_query[5]; ?>" required type="number" name="Non_Res" id="Non_Res">       
        <label for="Resident">Resident New Guests:</label>
        <input value="<?php echo $row_query[6]; ?>"required type="number" name="Resident" id="Resident">
          <label for="Occupied_Rooms">Occupied Rooms:</label>
        <input value="<?php echo $row_query[7];?>" required type="number" name="Occupied_Rooms" id="Occupied_rooms">       
        <label for="Total_Resident">Total Resident:</label>
        <input value="<?php echo $row_query[8];?>" required type="number" name="Total_Resident" id="Total_Resident">
		  <label for="Total_Non_Resident">Total Non Resident:</label>
        <input value="<?php echo $row_query[9];?>" required type="number" name="Total_Non_Resident" id="Total_Resident">
		 <label for="Total_Num_Guests">Total Number of Guests:</label>
        <input value="<?php echo $row_query[10];?>"required type="number" name="Total_Num_Guests" id="Total_Num_Guests">
      </div>
     <br/>
  <input type="submit" name="Guests" data-inline="true" value="Update">
   <br/>
 </div>
  </form>
</div>
    </div>

    
    <div id="revenue" class="tab-pane fade in <?php echo $Active_Revenue; ?>"> 
      <h3>Revenue</h3>
     <div data-role="main" class="ui-content">
 <form method="post" action="updated_Edited_data.php">
      <div class="ui-field-contain">
        <label for="Non_Res_Bed_Rev">None Resident Bed Revenue:</label>
        <input value="<?php echo $row_query[11];?>" type="number" required name="Non_Resident_Bed_Revnue" id="Non_Res_Bed_Rev">       
        <label for="Resident_Bed">Resident Bed Revenue:</label>
        <input value="<?php echo $row_query[12];?>" type="number" required name="Resident_Bed_Revenue" id="Resident">
          <label for="Occupied_Rooms">Food Revenue:</label>
        <input value="<?php echo $row_query[13];?>" type="number" required name="Food_Revenue" id="food Revenue">       
        <label for="Alcholic_Drink_Revenue">Alcholic Drink Revenue</label>
        <input value="<?php echo $row_query[14];?>" type="number" required name="Alcholic_Bed_Revenue" id="Alcholic_Drink_Revenue">
		  <label for="Soft_Drinks_Revenue">Soft Drinks Revenue:</label>
        <input value="<?php echo $row_query[15];?>" required  type="number" name="soft_Drinks_Revenue" id="soft_Drinks">
		 <label for="Hot_Drinks_Revenue">Hot Drinks Revenue:</label>
        <input value="<?php echo $row_query[16];?>" required  type="number" name="Hot_Drinks" id="Hot_Drinks">
		 <label for="Other_Revenue">Other Revenue:</label>
        <input value="<?php echo $row_query[17];?>" required  type="number" name="Other_Revenue" id="other_Revneue">
      </div>
     <br/>
      <input type="submit" data-inline="true" name='Revenue' value="Submit">
	
    
  </div>
  </form>
    </div>
    <div id="Employee"  class="tab-pane fade in <?php echo $Active_Employee ?>">
       <h3>Employee</h3>
     <div data-role="main" class="ui-content">
<form method="post" action="updated_Edited_data.php">
      <div class="ui-field-contain">
        <label for="Non_Res_Bed_Rev">Male:</label>
        <input value="<?php echo $row_query[18];?>" type="number" name="Male" id="Male">       
        <label for="Resident_Bed">Female:<?php echo $row_query[19];?></label>
        <input value="<?php echo $row_query[19];?>" type="number" name="Female" id="Resident">
              <input type="submit"  name='Employee' value="Submit">
      </div>

    </form>
  </div>
    </div>
  </div>
	</div>	
  </div>-->
  <div id="demo-header"></div>
    <div class="container">    
<div class="container">
  <h2>Last Inserted Month <B style="color:RED" ><?php  echo $row[3]."  ".$row[6]; ?></B></h2>

  </div>

                <div class="row">
                    <table class= "table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              
                                <th colspan="1" rowspan="1" style="width: 120px;" tabindex="0">Establishment ID</th>
                                <th colspan="1" rowspan="1" style="width:70px;" tabindex="0"> Month</th>
                                 <th colspan="1" rowspan="1" style="width:70px;" tabindex="0"> Year</th>
                                <th colspan="1" rowspan="1" style="width:100px;" tabindex="0"> Room Offered</th>
                                 <th colspan="1" rowspan="1" style="width:70px;" tabindex="0">Bed Offered</th>
								 <th colspan="1" rowspan="1" style="width:70px;" tabindex="0"> Un Offered Rooms </th>
                                <th colspan="1" rowspan="1" style="width:90px;" tabindex="0">Un Offered Beds</th>

                                <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">  Non Resident New Guests </th>
								 <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Resident New Guests</th>

                                <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Occupied Rooms</th>

                                <th colspan="1" rowspan="1" style="width:70px;" tabindex="0">Total  Non Resident</th>
								<th colspan="1" rowspan="1" style="width:70px;" tabindex="0">Total Resident</th>
								<th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Total Number of Guests </th>
                                <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">None Resident Bed Revenue</th>
                               <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Resident Bed Revenue</th>
							   <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Food Revenue</th>
                               <th colspan="1" rowspan="1" style="width: 100px;" tabindex="0">Alcholic Drink Revenue</th>
                               <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Hot Drinks Revenue</th>
                               <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Soft Drinks Revenue</th>
                              <th colspan="1" rowspan="1" style="width: 100px;" tabindex="0">Other Revenue</th>
						      <th colspan="1" rowspan="1" style="width: 50px;" tabindex="0">Male</th>
						      <th colspan="1" rowspan="1" style="width: 70px;" tabindex="0">Female</th>
                            </tr>
                        </thead>

                        <tbody> 
                        <?php
						$query = mysql_query("select * from  monthly_data_entry  where ( Establishment_Id='$Est_id_E' and Month='$Month' and  Year='$year' )");
						$i=0;
						while($fetch = mysql_fetch_array($query))
						{
							if($i%2==0) $class = 'even'; else $class = 'odd';
							
							echo'<tr class="'.$class.'">
                              
                             <td><b><u style="color:red"><mark><span style="color:black"  id="'.$fetch[2].'">'.$fetch[2].'</span></mark></u></b></td>
                               <td><mark ><u><span  id="'.$fetch[2].'"> '.$fetch[3].'</span></u></mark></td>
							   <td><mark><u><span  id="'.$fetch[2].'"> '.$fetch[4].'</span></u></mark></td>
							   <td><span class="Offered_Rooms" Offered_Rooms="'.$fetch[3].'"> '.$fetch[22].'</span></td>
				               <td><span class="Offered_Beds" Offered_Beds="'.$fetch[3].'"> '.$fetch[23].'</span></td>
					           <td><span class="Unoffered_Rooms" Unoffered_Rooms="'.$fetch[3].'">'.$fetch[20].'</span></td>
						       <td><span class="Unoffered_Beds" Unoffered_Beds="'.$fetch[3].'">'.$fetch[21].'</span></td>
			                   <td><span class="NR_Guest" id="'.$fetch[3].'"> '.$fetch[5].'</span></td>
				               <td><span class="R_NewGuest" R_NewGuest="'.$fetch[3].'">'.$fetch[6].'</span></td>
				               <td><span class="Rooms_Occupied" Rooms_Occupied="'.$fetch[3].'">'.$fetch[7].'</span></td>																										   
                               <td><span class="TNR_Guest" TNR_Guest="'.$fetch[3].'">'.$fetch[8].'</span></td>
				               <td><span class="TR_Guest" TR_Guest="'.$fetch[3].'">'.$fetch[9].'</span></td>
				               <td><span class="Total_Guest" Total_Guest="'.$fetch[3].'">'.$fetch[10].'</span></td>
				               <td><span class="NRB_Revenue"  NRB_Revenue="'.$fetch[3].'">'.$fetch[11].'</span></td>
				           	   <td><span class="RB_Revenue" RB_Revenue="'.$fetch[3].'">'.$fetch[12].'</span></td>
					   	       <td><span class="FB_Revenue" FB_Revenue="'.$fetch[3].'">'.$fetch[13].'</span></td>
						   	   <td><span class="AlRevenue"  AlRevenue="'.$fetch[3].'">'.$fetch[14].'</span></td>
                       	       <td><span class="HotRevenue" HotRevenue="'.$fetch[3].'">'.$fetch[15].'</span></td>
						   	   <td><span class="SRevenue"  SRevenue="'.$fetch[3].'">'.$fetch[16].'</span></td>
							   <td><span class="ORevenue" ORevenue="'.$fetch[3].'">'.$fetch[17].'</span></td>
							   <td><span class= "Male"  Male="'.$fetch[3].'">'.$fetch[18].'</span></td>
							   <td><span class= "Female" Female="'.$fetch[3].'">'.$fetch[19].'</span></td>
                            </tr>';						
						   	   		
						   	   
						}
						?>
                        </tbody>
                    </table>
        </div>

		<br>
		<h3><B style="color:RED" ><?php  echo $row[3]."  ".$row[6]; ?></B>  Stored Entries</h3>
		<div class="row">
                    <table class= "table table-striped table-bordered table-hover">
                        <thead>
                          <tr>

                                <th colspan="1" rowspan="1" style="width: 120px;" tabindex="0">Establishment ID</th>
                                <th colspan="1" rowspan="1" style="width:70px;" tabindex="0"> Month</th>
                                 <th colspan="1" rowspan="1" style="width:70px;" tabindex="0"> Year</th>
                                <th colspan="1" rowspan="1" style="width:100px;" tabindex="0"> Room Offered</th>
                                 <th colspan="1" rowspan="1" style="width:70px;" tabindex="0">Bed Offered</th>
								 <th colspan="1" rowspan="1" style="width:70px;" tabindex="0"> Un Offered Rooms </th>
                                 <th colspan="1" rowspan="1" style="width:90px;" tabindex="0">Un Offered Beds</th>
                                <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">  Non Resident New Guests </th>
								 <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Resident New Guests</th>
                                 <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Occupied Rooms</th>
                                <th colspan="1" rowspan="1" style="width:70px;" tabindex="0">Total  Non Resident</th>
								<th colspan="1" rowspan="1" style="width:70px;" tabindex="0">Total Resident</th>
								<th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Total Number of Guests </th>
                                <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">None Resident Bed Revenue</th>
                               <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Resident Bed Revenue</th>
							   <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Food Revenue</th>
                               <th colspan="1" rowspan="1" style="width: 100px;" tabindex="0">Alcholic Drink Revenue</th>
                               <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Hot Drinks Revenue</th>
                               <th colspan="1" rowspan="1" style="width:100px;" tabindex="0">Soft Drinks Revenue</th>
                              <th colspan="1" rowspan="1" style="width: 100px;" tabindex="0">Other Revenue</th>
						      <th colspan="1" rowspan="1" style="width: 50px;" tabindex="0">Male</th>
						      <th colspan="1" rowspan="1" style="width: 70px;" tabindex="0">Female</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
						$query = mysql_query("select * from  monthly_data_entry  where ( Establishment_Id='$Est_id_E' and Month != '$Month'   and  Year='$year' and Check_Status=1) order by Month DESC");
						$i=0;
						while($fetch = mysql_fetch_array($query))
						{
							if($i%2==0) $class = 'even'; else $class = 'odd';
							
							echo'<tr class="'.$class.'">

                          
                             <td><b><u style="color:red"><mark><span style="color:black"  id="'.$fetch[2].'">'.$fetch[2].'</span></mark></u></b></td>
                               <td><mark ><u><span  id="'.$fetch[2].'"> '.$fetch[3].'</span></u></mark></td>
							   <td><mark><u><span  id="'.$fetch[2].'"> '.$fetch[4].'</span></u></mark></td>
							   <td><span class="Offered_Rooms" Offered_Rooms="'.$fetch[3].'"> '.$fetch[22].'</span></td>
				               <td><span class="Offered_Beds" Offered_Beds="'.$fetch[3].'"> '.$fetch[23].'</span></td>
					           <td><span class="Unoffered_Rooms" Unoffered_Rooms="'.$fetch[3].'">'.$fetch[20].'</span></td>
						       <td><span class="Unoffered_Beds" Unoffered_Beds="'.$fetch[3].'">'.$fetch[21].'</span></td>
			                   <td><span class="NR_Guest" id="'.$fetch[3].'"> '.$fetch[5].'</span></td>
				               <td><span class="R_NewGuest" R_NewGuest="'.$fetch[3].'">'.$fetch[6].'</span></td>
				               <td><span class="Rooms_Occupied" Rooms_Occupied="'.$fetch[3].'">'.$fetch[7].'</span></td>																										   
                               <td><span class="TNR_Guest" TNR_Guest="'.$fetch[3].'">'.$fetch[8].'</span></td>
				               <td><span class="TR_Guest" TR_Guest="'.$fetch[3].'">'.$fetch[9].'</span></td>
				               <td><span class="Total_Guest" Total_Guest="'.$fetch[3].'">'.$fetch[10].'</span></td>
				               <td><span class="NRB_Revenue"  NRB_Revenue="'.$fetch[3].'">'.$fetch[11].'</span></td>
				           	   <td><span class="RB_Revenue" RB_Revenue="'.$fetch[3].'">'.$fetch[12].'</span></td>
					   	       <td><span class="FB_Revenue" FB_Revenue="'.$fetch[3].'">'.$fetch[13].'</span></td>
						   	   <td><span class="AlRevenue"  AlRevenue="'.$fetch[3].'">'.$fetch[14].'</span></td>
                       	       <td><span class="HotRevenue" HotRevenue="'.$fetch[3].'">'.$fetch[15].'</span></td>
						   	   <td><span class="SRevenue"  SRevenue="'.$fetch[3].'">'.$fetch[16].'</span></td>
							   <td><span class="ORevenue" ORevenue="'.$fetch[3].'">'.$fetch[17].'</span></td>
							   <td><span class= "Male"  Male="'.$fetch[3].'">'.$fetch[18].'</span></td>
							   <td><span class= "Female" Female="'.$fetch[3].'">'.$fetch[19].'</span></td>
                            </tr>';						
						   	   		
							 
							     
                         							
						}
						?>
                        </tbody>
                    </table>
        </div>
		<footer>
           
		</footer>
	
		<script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-editable.js" type="text/javascript"></script> 

    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
	
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.NR_Guest').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('id');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?id="+x+"&NR_Guest_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process Your Request !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.Offered_Rooms').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('Offered_Rooms');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?Offered_Rooms="+x+"&Offered_Rooms_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.Offered_Beds').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('Offered_Beds');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?Offered_Beds="+x+"&Offered_Beds_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>

<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.Unoffered_Rooms').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('Unoffered_Rooms');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?Unoffered_Rooms="+x+"&Unoffered_Rooms_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.Unoffered_Beds').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('Unoffered_Beds');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?Unoffered_Beds="+x+"&Unoffered_Beds_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.R_NewGuest').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('R_NewGuest');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?R_NewGuest="+x+"&R_NewGuest_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.Rooms_Occupied').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('Rooms_Occupied');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?Rooms_Occupied="+x+"&Rooms_Occupied_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.TNR_Guest').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('TNR_Guest');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?TNR_Guest="+x+"&TNR_Guest_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.TR_Guest').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('TR_Guest');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?TR_Guest="+x+"&TR_Guest_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.Total_Guest').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('Total_Guest');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?Total_Guest="+x+"&Total_Guest_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.NRB_Revenue').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('NRB_Revenue');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?NRB_Revenue="+x+"&NRB_Revenue_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.RB_Revenue').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('RB_Revenue');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?RB_Revenue="+x+"&RB_Revenue_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.FB_Revenue').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('FB_Revenue');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?FB_Revenue="+x+"&FB_Revenue_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.AlRevenue').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('AlRevenue');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?AlRevenue="+x+"&AlRevenue_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.HotRevenue').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('HotRevenue');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?HotRevenue="+x+"&HotRevenue_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.SRevenue').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('SRevenue');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?SRevenue="+x+"&SRevenue_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.ORevenue').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('ORevenue');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?ORevenue="+x+"&ORevenue_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.Male').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('Male');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?Male="+x+"&Male_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.Female').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('Female');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "processE.php?Female="+x+"&Female_data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error process_Eing !');}
				},
				error: function(e){
					alert('Error process_Eing');
				}
			});
		});
});
</script>
    </div>
</body>
</html>
  
	
			

<?php //include('footer.php') ?>