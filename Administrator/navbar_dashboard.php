<!DOCTYPE html>
<html>
<?php include('dbcon.php'); ?>
<?PHP $Today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($Today));
					
								$id_p=$_SESSION['polino'];
								$query=mysql_query("select First_name,Middle_Name,Last_Name from users where id='$id_p' ");   
								$fetch=mysql_fetch_array($query);  ?>


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
<link rel="shortcut icon" href="Toursim/Logo.jpg">


	<link rel="manifest" href="img/favicons/manifest.json">
	<!--<link rel="shortcut icon" href="img/favicons/logo-asctive.png">-->
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
				<img src="Toursim/Logo.jpg" alt="Toursim Logo">
				</a>
                  
				<div class="nav-holder">

					<nav role="navigation">
	
						<ul id="menu-main-menu" class="nav NormalMenu">
						
						<li id="menu-item-183" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-183"><a href="dashboard.php">HOME</a></li>
						<li id="menu-item-848" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-848"><a class="parent" href="#">Establishment</a>
			   
                              <ul class="sub-menu">
	                          <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="establishment.php">NEW ESTABLISHMENT</a></li>
	                          <li id="menu-item-1061" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1061"><a href="#print_selected_establishments" data-toggle="modal">Print Selected Establishment</a></li>
	               
                             </ul>
		
                             </li>
				 
				 	
					    <li id="menu-item-848" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-848"><a class="parent" href="#">Data Entry</a>
						
						   <ul class="sub-menu">
	                          <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="#data_entry" data-toggle="modal" >Monthly Data Entry</a></li>
	                          
	                         <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="#Edit_data" data-toggle="modal" >Edit Monthly Data Entry</a></li>
	                         <li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="#data_entry_two" data-toggle="modal" >Late Data Entry</a></li>
                             </ul>
						
						</li>
   


<li id="menu-item-848" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-848"><a class="parent" href="#">Report</a>
						<ul class="sub-menu">
	<li id="menu-item-2047" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2047"><a class="parent" href="#">Accomodation</a>
	<ul class="sub-menu">
		<li id="menu-item-182" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-182"><a href="#aggbymonth" data-toggle="modal">Aggregate By Month</a></li>
		<li id="menu-item-328" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-328"><a href="#byzobatown" data-toggle="modal">Aggregate By Zoba And Town</a></li>
		<li id="menu-item-327" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-327"><a href="#actbytown" data-toggle="modal">Aggregate Activity By Town</a></li>
		<li id="menu-item-182" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-182"><a href="#monthbytownactiv" data-toggle="modal">Aggregate Month By Town and Activity</a></li>
		<li id="menu-item-182" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-182"><a href="#aggrga" data-toggle="modal">Aggregate Room Group Activity</a></li>
	<li id="menu-item-182" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-182"><a href="#detailed" data-toggle="modal">Detailed</a></li>
	<li id="menu-item-182" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-182"><a href="#cestab" data-toggle="modal">Count Establishment</a></li>
	
	</ul>
	
</li>
	<li id="menu-item-2049" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2049"><a class="parent" href="#">Revenue</a>
	<ul class="sub-menu">
			<li id="menu-item-182" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-182"><a href="#ag" data-toggle="modal">Aggregate Revenue</a></li>

		<li id="menu-item-2930" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2930"><a href="#aggrm" data-toggle="modal">Aggregate Revenue By Month</a></li>
		<li id="menu-item-2067" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2067"><a href="#dr" data-toggle="modal">Detailed Revenue</a></li>

	</ul>
</li>
	<li id="menu-item-2936" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2936"><a class="parent" href="#">Employees</a>
	<ul class="sub-menu">
		
	    <li id="menu-item-182" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-182"><a href="#modal_report_entry" data-toggle="modal">Detailed Employee Report</a></li>

	</ul>
</li>
</ul>
						</li>
						<li id="menu-item-848" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-848"><a class="parent" href="#">Setting</a>
						<UL>
						<li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="sub_zoba.php">ADD NEW SUB ZONES</a></li>
						<li id="menu-item-184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="users.php">ADD NEW USER</a></li>
	                          <li id="menu-item-1061" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1061"><a href="#modal_export_db" data-toggle="modal">Export Databases</a></li>
							<li id="menu-item-1061" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1061"><a href="http://localhost:100/phpmyadmin/index.php?db=tourism&token=f8e57b63f4bc9925909243a85187d008">Restore Databases</a></li>
	                   </UL>
						</li>
						
				
		
		
</ul>					</nav>

				</div>

				
				<div class="links-holder" style="display: none">

					<a id="contact_header_button" class="hide-medium button header-outline-light hideOnOtherProducts" href="<?php $k="logout";$s=sha1($k); echo $s.".php"; ?>">Logout</a>
					<a class="hide-medium button header-outline-light hideOnOtherProducts"  href="#modal_about_us" data-toggle="modal" >Me</a>
				    <a class="userHaveNoLicense hide-small button button-primary hideOnOtherProducts" style="fontsize:1px"> TOURISM <span style="color:Black"><mark>Logged As <?php   echo  $fetch[0];?></span></a>
		   
				
				</div>
</div>
				
				

			</div>
   
		</div>
		</div>


	</header>

	<body>


	<br/><br/>



   <?php include("aggByMonth.php"); ?> 
   <?php include("byZobaTown.php"); ?>
   <?php include("actByTown.php"); ?>
   <?php include("roomGByActivity.php"); ?>
     <?php include("monthByTownActiv.php"); ?>
	 <?php include("detailed.php"); ?>
	  <?php include("aggRevenue.php"); ?>
	 <?php include("countEstab.php"); ?>
	 	 <?php include("revBymon.php"); ?>
		   <?php include("detailRev.php"); ?>
    <?php include("modal_Export_DB.php"); ?>
    <?php  include("modal_monthly_data_entry.php"); ?>
  <?php  include("modal_print_selected_Establishments.php"); ?>
  <?php  include("modal_monthly_data_entry_two.php"); ?>
  <?php include("Edit_Monthly_data_entry.php"); ?>
  <?php include("modal_Employee_Report.php"); ?>
    <?php include("modal_Export_DB.php"); ?>
         <?php include("modal_about_us.php"); ?>

</body>


<script type="text/javascript" src="Toursim/imagesloaded.js"></script>
<script type="text/javascript" src="Toursim/masonry.js"></script>
<script type="text/javascript" src="Toursim/swiper.js"></script>
<script type="text/javascript" src="Toursim/easy-responsive-tabs.js"></script>
<script type="text/javascript" src="Toursim/dropzone.js"></script>
<script type="text/javascript" src="Toursim/jquery_004.js"></script>
<script type="text/javascript" src="Toursim/modernizr.js"></script>
<script type="text/javascript" src="Toursim/jquery_005.js"></script>
<script type="text/javascript" src="Toursim/jquery_002.js"></script>
<script type="text/javascript" src="Toursim/url.js"></script>
<script type="text/javascript" src="Toursim/sweetalert.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var geny_settings_object = {"license_api_url":"https:\/\/cloud.genymotion.com","license_api_code_1":"","license_api_code_3":"","license_api_code_4":"","license_api_code_7":"","license_api_code_10":"","license_api_code_20":"","license_api_code_21":"","license_api_code_22":"","license_api_code_23":"","license_api_code_25":"","license_api_code_26":"","license_api_code_28":"","license_api_code_30":"","license_api_code_32":"","license_api_code_33":"","license_api_code_34":"","license_api_code_37":"","license_api_code_62":"","license_api_code_63":"","license_api_code_64":"","license_api_code_65":"","license_api_code_100":"","license_api_code_311":"","license_api_code_331":"","license_api_code_1007":""};
/* ]]> */
</script>
<script type="text/javascript" src="Toursim/api.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var geny_billing_settings_object = {"billing_api_url":"https:\/\/api-billing.genymotion.com"};
/* ]]> */
</script>
<script type="text/javascript" src="Toursim/billing-api.js"></script>
<script type="text/javascript" src="Toursim/license-api.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wp_vars = {"THEME_URL":"https:\/\/www.genymotion.com\/wp-content\/themes\/genymobile"};
/* ]]> */
</script>
<script type="text/javascript" src="Toursim/track.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wp_vars = {"THEME_URL":"https:\/\/www.genymotion.com\/wp-content\/themes\/genymobile"};
/* ]]> */
</script>
<script type="text/javascript" src="Toursim/tools.js"></script>
<script type="text/javascript" src="Toursim/api-local-storage-cache.js"></script>
<script type="text/javascript" src="Toursim/a"></script>
<script type="text/javascript" src="Toursim/URI_002.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wp_vars = {"THEME_URL":"https:\/\/www.genymotion.com\/wp-content\/themes\/genymobile","is_production":"1","stripe_publishable_key":"pk_live_lYBVZ7QIoOZ2hXviIptPVs35","cart_products":{"9":{"title":"Indie","wp_post_id":311},"8":{"title":"Business","wp_post_id":312}},"countries":{"AF":"Afghanistan","AX":"\u00c5land Islands","AL":"Albania","DZ":"Algeria","AS":"American Samoa","AD":"Andorra","AO":"Angola","AI":"Anguilla","AQ":"Antarctica","AG":"Antigua and Barbuda","AR":"Argentina","AM":"Armenia","AW":"Aruba","AU":"Australia","AT":"Austria","AZ":"Azerbaijan","BS":"Bahamas","BH":"Bahrain","BD":"Bangladesh","BB":"Barbados","BY":"Belarus","BE":"Belgium","BZ":"Belize","BJ":"Benin","BM":"Bermuda","BT":"Bhutan","BO":"Bolivia","BA":"Bosnia and Herzegovina","BW":"Botswana","BV":"Bouvet Island","BR":"Brazil","IO":"British Indian Ocean Territory","BN":"Brunei","BG":"Bulgaria","BF":"Burkina Faso","MM":"Burma (Myanmar)","BI":"Burundi","KH":"Cambodia","CM":"Cameroon","CA":"Canada","CV":"Cape Verde","KY":"Cayman Islands","CF":"Central African Republic","TD":"Chad","CL":"Chile","CN":"China","CX":"Christmas Island","CC":"Cocos (Keeling) Islands","CO":"Colombia","KM":"Comoros","CD":"Congo, Dem. Republic","CG":"Congo, Republic","CK":"Cook Islands","CR":"Costa Rica","HR":"Croatia","CU":"Cuba","CY":"Cyprus","CZ":"Czech Republic","DK":"Denmark","DJ":"Djibouti","DM":"Dominica","DO":"Dominican Republic","TL":"East Timor","EC":"Ecuador","EG":"Egypt","SV":"El Salvador","GQ":"Equatorial Guinea","ER":"-","EE":"Estonia","ET":"Ethiopia","FK":"Falkland Islands","FO":"Faroe Islands","FJ":"Fiji","FI":"Finland","FR":"France","GF":"French Guiana","PF":"French Polynesia","TF":"French Southern Territories","GA":"Gabon","GM":"Gambia","GE":"Georgia","DE":"Germany","GH":"Ghana","GI":"Gibraltar","GR":"Greece","GL":"Greenland","GD":"Grenada","GP":"Guadeloupe","GU":"Guam","GT":"Guatemala","GG":"Guernsey","GN":"Guinea","GW":"Guinea-Bissau","GY":"Guyana","HT":"Haiti","HM":"Heard Island and McDonald Islands","HN":"Honduras","HK":"HongKong","HU":"Hungary","IS":"Iceland","IN":"India","ID":"Indonesia","IR":"Iran","IQ":"Iraq","IE":"Ireland","IL":"Israel","IT":"Italy","CI":"Ivory Coast","JM":"Jamaica","JP":"Japan","JE":"Jersey","JO":"Jordan","KZ":"Kazakhstan","KE":"Kenya","KI":"Kiribati","KP":"Korea, Dem. Republic of","KW":"Kuwait","KG":"Kyrgyzstan","LA":"Laos","LV":"Latvia","LB":"Lebanon","LS":"Lesotho","LR":"Liberia","LY":"Libya","LI":"Liechtenstein","LT":"Lithuania","LU":"Luxemburg","MO":"Macau","MK":"Macedonia","MG":"Madagascar","MW":"Malawi","MY":"Malaysia","MV":"Maldives","ML":"Mali","MT":"Malta","IM":"Man Island","MH":"Marshall Islands","MQ":"Martinique","MR":"Mauritania","MU":"Mauritius","YT":"Mayotte","MX":"Mexico","FM":"Micronesia","MD":"Moldova","MC":"Monaco","MN":"Mongolia","ME":"Montenegro","MS":"Montserrat","MA":"Morocco","MZ":"Mozambique","NA":"Namibia","NR":"Nauru","NP":"Nepal","NL":"Netherlands","AN":"Netherlands Antilles","NC":"New Caledonia","NZ":"New Zealand","NI":"Nicaragua","NE":"Niger","NG":"Nigeria","NU":"Niue","NF":"Norfolk Island","MP":"Northern Mariana Islands","NO":"Norway","OM":"Oman","PK":"Pakistan","PW":"Palau","PS":"Palestinian Territories","PA":"Panama","PG":"Papua New Guinea","PY":"Paraguay","PE":"Peru","PH":"Philippines","PN":"Pitcairn","PL":"Poland","PT":"Portugal","PR":"Puerto Rico","QA":"Qatar","RE":"Reunion Island","RO":"Romania","RU":"Russian Federation","RW":"Rwanda","BL":"Saint Barthelemy","KN":"Saint Kitts and Nevis","LC":"Saint Lucia","MF":"Saint Martin","PM":"Saint Pierre and Miquelon","VC":"Saint Vincent and the Grenadines","WS":"Samoa","SM":"San Marino","ST":"S\u00e3o Tom\u00e9 and Pr\u00edncipe","SA":"Saudi Arabia","SN":"Senegal","RS":"Serbia","SC":"Seychelles","SL":"Sierra Leone","SG":"Singapore","SK":"Slovakia","SI":"Slovenia","SB":"Solomon Islands","SO":"Somalia","ZA":"South Africa","GS":"South Georgia and the South Sandwich Islands","KR":"South Korea","ES":"Spain","LK":"Sri Lanka","SD":"Sudan","SR":"Suriname","SJ":"Svalbard and Jan Mayen","SZ":"Swaziland","SE":"Sweden","CH":"Switzerland","SY":"Syria","TW":"Taiwan","TJ":"Tajikistan","TZ":"Tanzania","TH":"Thailand","TG":"Togo","TK":"Tokelau","TO":"Tonga","TT":"Trinidad and Tobago","TN":"Tunisia","TR":"Turkey","TM":"Turkmenistan","TC":"Turks and Caicos Islands","TV":"Tuvalu","UG":"Uganda","UA":"Ukraine","AE":"United Arab Emirates","GB":"United Kingdom","US":"United States","UY":"Uruguay","UZ":"Uzbekistan","VU":"Vanuatu","VA":"Vatican City State","VE":"Venezuela","VN":"Vietnam","VG":"Virgin Islands (British)","VI":"Virgin Islands (U.S.)","WF":"Wallis and Futuna","EH":"Western Sahara","YE":"Yemen","ZM":"Zambia","ZW":"Zimbabwe"},"wp_products":{"311":{"tracking_category":"Individual","title":"Indie"},"312":{"tracking_category":"Enterprise","title":"Business"},"313":{"tracking_category":"Enterprise","title":"Enterprise"}},"api_products":{"8":{"id":8,"name":"Business","pricing":[{"currency":{"symbol":"$","iso_code":"USD"},"price":"412.000000"},{"currency":{"symbol":"\u20ac","iso_code":"EUR"},"price":"299.000000"},{"currency":{"symbol":"$","iso_code":"USD"},"price":"-1.000000"}]},"9":{"id":9,"name":"Indie","pricing":[{"currency":{"symbol":"$","iso_code":"USD"},"price":"136.000000"},{"currency":{"symbol":"\u20ac","iso_code":"EUR"},"price":"99.000000"},{"currency":{"symbol":"$","iso_code":"USD"},"price":"-1.000000"}]},"10":{"id":10,"name":"Trial","pricing":[{"currency":{"symbol":"$","iso_code":"USD"},"price":"0.000000"},{"currency":{"symbol":"$","iso_code":"USD"},"price":"-1.000000"}]},"11":{"id":11,"name":"Dev license","pricing":[{"currency":{"symbol":"$","iso_code":"USD"},"price":"1.000000"},{"currency":{"symbol":"\u20ac","iso_code":"EUR"},"price":"1.000000"},{"currency":{"symbol":"$","iso_code":"USD"},"price":"-1.000000"}]}},"links":{"3145":"\/thank-you-trial\/","2929":"\/genymotion-cloud-user-guide-2\/","2884":"\/help\/on-demand\/user-guide\/","2859":"\/help\/on-demand\/tutorial\/use-camera\/","2860":"\/help\/on-demand\/tutorial\/install-auto-generated-certificate\/","2861":"\/help\/on-demand\/tutorial\/change-mobile-network\/","2862":"\/help\/on-demand\/tutorial\/set-first-instance\/","2708":"\/genymotion-demand-survey\/","2436":"\/help\/on-demand\/tutorial\/configure-turn-server\/","2434":"\/help\/on-demand\/tutorial\/lock-application-kiosk-mode\/","2379":"\/get-full-version\/","download-trial":"\/download-trial\/","2238":"\/genykiosk\/","2234":"\/genykiosk-form\/","2229":"\/genymaster-form-2\/","2190":"\/genydeploy-form\/","maintenance":"\/help\/","1948":"\/help\/on-demand\/faq\/","support":"\/on-demand\/support\/","1942":"\/on-demand\/refund-and-cancel\/","1940":"\/on-demand\/eula\/","1935":"\/help\/on-demand\/release-notes\/","1908":"\/on-demand\/","1906":"\/","1864":"\/help\/on-demand\/tutorial\/","1862":"\/help\/on-demand\/tutorial\/change-resolution\/","1860":"\/help\/on-demand\/tutorial\/http-authentication\/","1858":"\/help\/on-demand\/tutorial\/install-app\/","1856":"\/help\/on-demand\/tutorial\/enable-disable-adb\/","1854":"\/help\/on-demand\/tutorial\/install-gapps\/","1852":"\/help\/on-demand\/product-access\/","1502":"\/whitepaper-mass-deployment-mobile-device-fleet\/","1449":"\/whitepaper-cloud-based-emulation\/","1439":"\/whitepaper-virtues-emulators-mobile-testing-strategy\/","447":"\/blog\/","download":"\/download\/","sign-in-promo":"\/promo\/","976":"\/cloud\/","916":"\/legal\/","914":"\/account\/licenses\/","802":"\/genydeploy\/","thank-you-premium-indie":"\/thank-you-premium-indie\/","thank-you-premium-business":"\/thank-you-premium-business\/","incentive":"\/incentive\/","562":"\/download-handler\/","checkout-sign-up":"\/checkout-sign-up\/","checkout-sign-in":"\/checkout-sign-in\/","checkout-payment":"\/checkout-payment\/","checkout-cart":"\/checkout-cart\/","checkout-billing":"\/checkout-billing\/","account-activated":"\/account\/activated\/","account-activation":"\/account\/activation\/","account-not-activated":"\/account\/not-activated\/","account-licenses-renewal-key-invalid":"\/account\/licenses\/renewal-key-invalid\/","plugin":"\/plugins\/","422":"\/legal\/secure-payments\/","account-created":"\/account\/create\/success\/","299":"\/legal\/terms-and-conditions\/","297":"\/legal-notices\/","thank-you-freemium":"\/fun-zone\/","220":"\/legal\/privacy-statement\/","faq":"\/help\/desktop\/faq\/","release-notes":"\/help\/desktop\/release-notes\/","contact":"\/contact\/","pricing-and-licensing":"\/pricing-and-licensing\/","features":"\/desktop\/","reset-password-complete":"\/account\/password-reset\/success\/","reset-password-confirm":"\/reset-password-confirm\/","reset-password-failure":"\/account\/password-reset\/failure\/","reset-password-procedure":"\/reset-password-procedure\/","reset-password":"\/account\/password-reset\/","sign-up":"\/account\/create\/","sign-in":"\/account\/login\/","account":"\/account\/"},"translations":{"cart_renewal_edit":"You can not edit the cart for your renewal order.","cart_renewal_qty_change":"Sorry you can't change the quantity for your renewal.","cart_voucher_invalid":"Invalid voucher code","cart_voucher_login_required":"You must sign in to use a voucher code","download_limited_title":"Limited download","download_limited_content":"To be able to download the Genymotion software you must activate your account. Please check your emails if you created your account during the past 15 days. If you did not receive an email please follow","download_limited_link":"this link","confirm_contact_redirect":"You need to be logged in for this request type.","profile_delete_account_question":"Are you sure you want to delete your account?","profile_delete_account_confirm":"Yes, delete my account!","profile_updated":"Thank you for updating your preferences!","year":"year","years":"years","month":"month","months":"months","day":"day","days":"days","months_arr":["January","February","March","April","May","June","July","August","September","October","November","December"],"stripe_invalid_cvc":"Invalid CVC code","stripe_invalid_expiry":"Invalid expiry date","stripe_invalid_number":"Invalid card number","profile_renewal_info":"To extend your license, please contact your Purchasing Department. If you need to know who purchased the license, you can <a href=\"\/contact\/?type=sales\">contact us<\/a>.","profile_renewal_procedure_success":"Request to the buyer has been sent.","resend_email_success":"Confirmation e-mail sent successfully.","cart_creation_problem":"There was an error when trying to create cart. Please try again later.","general_problem":"There was a problem with our service. Please try again later.","profile_no_invoices":"No invoices yet.","profile_invoice_status_waiting":"Waiting for validation","profile_invoice_order_reference":"Order reference","profile_invoice_order_status":"Status","profile_invoice_download":"Download pdf","profile_password_updated":"Thank you for updating your password!","profile_account_deleted_title":"Account deleted","profile_account_deleted_msg":"Come back soon!","signup_validation_terms":"You must accept the privacy terms","contact_drop_files":"Drag and drop files here or click to <link>browse your file...<\/link>","jq_validate":{"required":"This field is required.","remote":"Please fix this field.","email":"Please enter a valid email address.","url":"Please enter a valid URL.","date":"Please enter a valid date.","dateISO":"Please enter a valid date (ISO).","number":"Please enter a valid number.","digits":"Please enter only digits.","equalTo":"Please enter the same value again.","maxlength":"Please enter no more than {0} characters.","minlength":"Please enter at least {0} characters.","rangelength":"Please enter a value between {0} and {1} characters long.","range":"Please enter a value between {0} and {1}.","max":"Please enter a value less than or equal to {0}.","min":"Please enter a value greater than or equal to {0}.","step":"Please enter a multiple of {0}."}}};
/* ]]> */
</script>
<script type="text/javascript" src="Toursim/main.js"></script>
<script type="text/javascript" src="Toursim/URI.js"></script>
<script type="text/javascript" src="Toursim/signals.js"></script>
<script type="text/javascript" src="Toursim/crossroads.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wp_env = {"BASE_URL":"https:\/\/www.genymotion.com"};
/* ]]> */
</script>
<script type="text/javascript" src="Toursim/url-redirect.js"></script>
<script type="text/javascript" src="Toursim/wp-embed.js"></script>

    

<script>

  
  var _mare_pk = '6acff2f2b14625abb7a12f2ffae91f86c48f94d6ba35d56d37b35c4ff04ba831'; 

  var _mare_wp_sc = '88c2e45d7b77b70c7c6146a37eeb4b97';

  (function() {

    var mare = document.createElement('script'); mare.type = "text/javascript"; mare.async = true;

    mare.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'mare.io/API/script.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mare, s);

  })();

</script>    

    

    
<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
  var google_conversion_id = 897364152;
  var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="Toursim/conversion.js"></script><img alt="" src="Toursim/a.gif" style="display:none" border="0" height="1" width="1">
<noscript>
  <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/897364152/?value=0&amp;guid=ON&amp;script=0"/>
  </div>
</noscript>


</html>