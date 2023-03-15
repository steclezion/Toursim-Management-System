<!DOCTYPE html>
<html>
<?php include('header.php'); ?>


<head>
	
<link href="Toursim/css.css" rel="stylesheet">
<script src="Toursim/script.js" async="" type="text/javascript"></script>
<script type="text/javascript">console.log = function(m){};</script>
<!-- WP Head -->
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
						
						<li id="menu-item-183" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-183"><a href="dashboard.php">HOME</a></li>
						<li id="menu-item-848" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-848"><a class="parent" href="#">Establishment</a>
			   
                              <ul class="sub-menu">
	                          <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="establishment.php">NEW ESTABLISHMENT</a></li>
	                         </ul>
		
                             </li>
				 
				 	
					    <li id="menu-item-848" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-848"><a class="parent" href="#">Data Entry</a>
						
						   <ul class="sub-menu">
	                          <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="#data_entry" data-toggle="modal" >Monthly Data Entry</a></li>
	                          
	                         <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="#Edit_data" data-toggle="modal" >Edit Monthly Data Entry</a></li>
	               
                             </ul>
						
						</li>
   <li id="menu-item-848" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-848"><a class="parent" href="#">Accomidation</a>
			   
                              <ul class="sub-menu">
	                          <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="users.php">ADD NEW USER</a></li>
	                          <li id="menu-item-1061" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1061"><a href="roles.php">ADD ROLES</a></li>
	                        
                             </ul>
		
                             </li>
							    <li id="menu-item-848" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-848"><a class="parent" href="#">Revenue</a>
			   
                              <ul class="sub-menu">
	                          <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="users.php">ADD NEW USER</a></li>
	                          <li id="menu-item-1061" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1061"><a href="roles.php">ADD ROLES</a></li>
	                        
                             </ul>
		
                             </li>
							    <li id="menu-item-848" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-848"><a class="parent" href="#">Employess</a>
			   
                              <ul class="sub-menu">
	                          <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="users.php">ADD NEW USER</a></li>
	                          <li id="menu-item-1061" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1061"><a href="roles.php">ADD ROLES</a></li>
	                        
                             </ul>
		
                             </li>



						<li id="menu-item-848" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-848"><a class="parent" href="#">Setting</a>
						<UL>
						<li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="sub_zoba.php">ADD NEW SUB ZONES</a></li>
						<li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="users.php">ADD NEW USER</a></li>
	                    <li id="menu-item-1061" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1061"><a href="roles.php">Export Database</a></li>
	                   </UL>
						</li>
						
				
		
		
</ul>					</nav>

				</div>

				
				<div class="links-holder" style="display: none">

					
				    <a class="userHaveNoLicense hide-small button button-primary hideOnOtherProducts" style="fontsize:1px">TOURSIM </a>
		   
				
				</div>
</div>
				
				

			</div>
   
		</div>
		</div>


	</header>

	<body>


	<br/><br/>
 <?php  include("modal_monthly_data_entry.php"); ?>
  <?php include("Edit_Monthly_data_entry.php"); ?>
  
				
   


</body>



</html>