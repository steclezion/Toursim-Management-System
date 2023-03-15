<!DOCTYPE html>
<html>
<?php include('header.php'); ?>


<head>
	
<link rel="stylesheet" id="accordioncss-css" href="Toursim/jquery.css" type="text/css" media="all">
<link rel="stylesheet" id="main-style-css" href="Toursim/style.css" type="text/css" media="screen">
<link rel="stylesheet" id="font-awesome-css" href="Toursim/font-awesome.css" type="text/css" media="all">
<link rel="stylesheet" id="sweetalert-css" href="Toursim/sweetalert.css" type="text/css" media="screen">
<link rel="stylesheet" id="cpsh-shortcodes-css" href="Toursim/shortcodes.css" type="text/css" media="all">
<script type="text/javascript" src="Toursim/jquery_006.js"></script>
<script type="text/javascript" src="Toursim/jquery_003.js"></script>
<script type="text/javascript" src="Toursim/jquery.js"></script>
<script type="text/javascript" src="Toursim/jquery_007.js"></script>
<script type="text/javascript" src="Toursim/bluebird.js"></script>

	<link rel="manifest" href="img/favicons/manifest.json">
	<link rel="shortcut icon" href="img/favicons/logo-asctive.png">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="fonts/eleganticons/et-icons.css">
	<!-- Main style -->
	 
</head>

	<?php include('header.php'); ?>
	<title>Tourism Management</title>
<body  class="page-template page-template-page-sign-up page-template-page-sign-up-php page page-id-163 page-parent page-child parent-pageid-127">


 <header class="main default-header">

		<div id="main-menu-wrapper">
			<div class="inner-wrapper">
			<div class="inner-wrapper-bg"></div>
			<div class="grid-container fill-parent">

				<a class="logo" >
				<img src="Toursim/waterGlass.svg" alt="Toursim Logo">
				</a>

				<div class="nav-holder">

					<nav role="navigation">
	
						<ul id="menu-main-menu" class="nav NormalMenu">
						<li id="menu-item-183" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-183"></li>
	                    <li id="menu-item-848" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-183"></a></li>
                        <li id="menu-item-2053" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-183"></a></li>
						<li id="menu-item-1628" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-183"></a></li>
					</nav>

				</div>

				<div class="links-holder" style="display: none">

           <a class="userHaveNoLicense hide-medium button button-primary hideOnOtherProducts" href="">
						 TOURSIM			</a>
				<a class="burger" id="mobile-toggle" href="#"><div class="hamburger-menu"></div></a>
				</div>

			</div>
   
		</div>
		</div>


	</header>

	<body>

	<br/><br/>
	<br/><br/>
	<br/><br/>
		<br/><br/>
	<br/><br/>


				<div class="login">
				<div class="brand-color">
				<p><strong>Please Enter the Details Below..</strong></p>
				</div>
     <form class="form-horizontal" method="POST">
	                          <div class="control-group">
									<label class="control-label" for="inputEmail">Authentication Role</label>
									<div class="controls">
									<select name="Role">
									
									
									<option value="Administrator">Administrator</option>
									<option value="User" >User</option>
									<option value="Manager"> Manager</option>
									
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
								$password = $_POST['password'];
								
					$query = "SELECT * FROM users WHERE (user_Name='$username' AND Password='$password' AND Role='$role')";
								$result = mysql_query($query)or die(mysql_error());
								$num_row = mysql_num_rows($result);
									$row=mysql_fetch_array($result);
									if( $num_row > 0 ) {
									
								$_SESSION['id']=$row['id'];
									header('location:dashboard.php');
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