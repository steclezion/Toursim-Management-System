<!DOCTYPE html>
<html>
<?php include('Administrator/navbar_dashboard_home.php'); ?>




	</header>

	<body>

	<br/><br/>
	<br/><br/>
	<br/><br/>
		<br/><br/>
	<br/><br/>


				<div class="login">
				<div class="brand-color">
				<p><strong>Please Enter the Details Below..<?php $Today = date('y:m:d');
							
							   $year=date('Y', strtotime($Today)); echo $year; ?></strong></p>
				</div>
     <form class="form-horizontal" method="POST">
	                          <div class="control-group">
									<label class="control-label" for="inputEmail">Authentication Role</label>
									<div class="controls">
									<select name="Role">
									
									
									<option value="Administrator">Administrator</option>
									<option value="User" >User</option>
								
									
									</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputEmail">Username</label>
									<div class="controls">
									<input type="text" name="username" id="username" placeholder="Username" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">Password</label>
									<div class="controls">
									<input type="password" name="password" id="password" placeholder="Password" required>
								</div>
								</div>
								<div class="control-group">
									<div class="controls">
									<button id="login" name="submit" type="submit" class="btn"><i class="icon-signin icon-large"></i>&nbsp;Submit</button>
								</div>
								</div>
								
								<?php
								if (isset($_POST['submit'])){
								session_start();
								$role = $_POST['Role'];
								$username = $_POST['username'];
								$password = sha1($_POST['password']);
								
					$query = "SELECT * FROM users WHERE (user_Name='$username' AND Password='$password' AND Role='$role')";
								$result = mysql_query($query)or die(mysql_error());
								$num_row = mysql_num_rows($result);
									$row=mysql_fetch_array($result);
									if( $num_row > 0 ) {
									$Today = date('y:m:d');
							
							   $year=date('Y', strtotime($Today));
								$_SESSION['polino']=$row['id'];
								$_SESSION['start'] = time(); // Taking now logged in time.
                                    // Ending a session in 30 minutes from the starting time.
                                       $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
									 
									  
$exec=mysql_query("SELECT Year FROM monthly_data_entry ORDER BY Year DESC LIMIT 1");
$exec_fetch=mysql_fetch_array($exec);
$exec_row= $exec_fetch[0];
if ($year == $exec_row)
{	                                
  if ($role =='Administrator')
  {
    $_SESSION['id']=$row['id']."Administrator";
    header('location:Administrator/dashboard.php');
	
  }
   elseif($role=='User')
	 {   	$_SESSION['di']=$row['id']."user";
		    header("location:user/dashboard.php");
	  }
									   
}
elseif( $year < $exec_row)
    {
echo "<script type=\"text/javascript\"> alert( \"Your System Date Must Be Corrected; Last Entered Date is smaller than Your current System Date $year \");  window.location = \"index.php\"  </script>"	;
	}
	
	


elseif($year > $exec_row)
{ $active='Active';
$es_id=mysql_query("SELECT Count(Establishment_id) FROM establishment_entry ");	
$est_fetch=mysql_fetch_array($es_id);
$est_row= $est_fetch[0];	
$k=1;
	    while($k <= $est_row){
		For($i=1;$i<=12;$i++){
			
	mysql_query("insert into monthly_data_entry(Establishment_id,Month,Year,NR_Guest,R_NewGuest,Rooms_Occupied,TNR_Guest,TR_Guest,NRB_Revenue,FB_Revenue,AlRevenue,HotRevenue,SRevenue,ORevenue,Male,Female,Unoffered_Rooms,Unoffered_Beds,Offered_Rooms,Offered_Beds,Check_status) values('$k','$i','$year','0','0','0','0','0','0','0','0','0','0','0','-','-','0','0','0','0','0')")or die(mysql_error());
		 }
		$k++;}
		
		if ($role =='Administrator')
  {
    $_SESSION['id']=$row['id']."Administrator";
    header('location:Administrator/dashboard.php');
	
  }
   elseif($role=='User')
	 {   	$_SESSION['di']=$row['id']."user";
		    header("location:user/dashboard.php");
	  }
		
}

                                  
									   
									   
									 
									  
									}
									else{ ?>
								<div class=" alert alert-danger">Access Denied</div>		
								<?php
								}}
								?>
						</form>
				
				</div>

     
    <?php 
	
	
	//include("footer.php");
	
	
	?>




</body></html>