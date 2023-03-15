<?php  include("dbcon.php");   ?>

<!DOCTYPE html>
<html>
<head>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
			<link href="css/bootstrap.css" rel="stylesheet" media="screen">
			<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
			<link href="css/docs.css" rel="stylesheet" media="screen">
			<link href="css/diapo.css" rel="stylesheet" media="screen">
			<link href="css/font-awesome.css" rel="stylesheet" media="screen">
			<link rel="stylesheet" type="text/css" href="css/style.css" />
			<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css" />
	
	<!-- js -->			

    <script src="js/bootstrap.js"></script>
	<script src="js/jquery.hoverdir.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
		

<script type="text/javascript" src="Toursim/swiper.js"></script
<script type="text/javascript" src="Toursim/easy-responsive-tabs.js"></script>
<script type="text/javascript" src="Toursim/dropzone.js"></script>
<script type="text/javascript" src="Toursim/jquery_004.js"></script
<script type="text/javascript" src="Toursim/modernizr.js"> </script>
<script type="text/javascript" src="Toursim/jquery_005.js"></script>
<script type="text/javascript" src="Toursim/jquery_002.js"></script>
<script type="text/javascript" src="Toursim/url.js"></script>
<script type="text/javascript" src="Toursim/sweetalert.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var geny_settings_object = {"license_api_url":"https:\/\/cloud.Toursimcom","license_api_code_1":"","license_api_code_3":"","license_api_code_4":"","license_api_code_7":"","license_api_code_10":"","license_api_code_20":"","license_api_code_21":"","license_api_code_22":"","license_api_code_23":"","license_api_code_25":"","license_api_code_26":"","license_api_code_28":"","license_api_code_30":"","license_api_code_32":"","license_api_code_33":"","license_api_code_34":"","license_api_code_37":"","license_api_code_62":"","license_api_code_63":"","license_api_code_64":"","license_api_code_65":"","license_api_code_100":"","license_api_code_311":"","license_api_code_331":"","license_api_code_1007":""};
/* ]]> */
</script>
<script type="text/javascript" src="Toursim/api.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var geny_billing_settings_object = {"billing_api_url":"https:\/\/api-billing.Toursimcom"};
/* ]]> */
</script>
<script type="text/javascript" src="Toursim/billing-api.js"></script>
<script type="text/javascript" src="Toursim/license-api.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wp_vars = {"THEME_URL":"https:\/\/www.Toursimcom\/wp-content\/themes\/genymobile"};
/* ]]> */
</script>
<script type="text/javascript" src="Toursim/track.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wp_vars = {"THEME_URL":"https:\/\/www.Toursimcom\/wp-content\/themes\/genymobile"};
/* ]]> */
</script>
<script type="text/javascript" src="Toursim/tools.js"></script>
<script type="text/javascript" src="Toursim/api-local-storage-cache.js"></script>
<script type="text/javascript" src="Toursim/a"></script>
<script type="text/javascript" src="Toursim/URI_002.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wp_vars = {"THEME_URL":"https:\/\/www.Toursimcom\/wp-content\/themes\/genymobile","is_production":"1","stripe_publishable_key":"pk_live_lYBVZ7QIoOZ2hXviIptPVs35","cart_products":{"9":{"title":"Indie","wp_post_id":311},"8":{"title":"Business","wp_post_id":312}},"countries":{"AF":"Afghanistan","AX":"\u00c5land Islands","AL":"Albania","DZ":"Algeria","AS":"American Samoa","AD":"Andorra","AO":"Angola","AI":"Anguilla","AQ":"Antarctica","AG":"Antigua and Barbuda","AR":"Argentina","AM":"Armenia","AW":"Aruba","AU":"Australia","AT":"Austria","AZ":"Azerbaijan","BS":"Bahamas","BH":"Bahrain","BD":"Bangladesh","BB":"Barbados","BY":"Belarus","BE":"Belgium","BZ":"Belize","BJ":"Benin","BM":"Bermuda","BT":"Bhutan","BO":"Bolivia","BA":"Bosnia and Herzegovina","BW":"Botswana","BV":"Bouvet Island","BR":"Brazil","IO":"British Indian Ocean Territory","BN":"Brunei","BG":"Bulgaria","BF":"Burkina Faso","MM":"Burma (Myanmar)","BI":"Burundi","KH":"Cambodia","CM":"Cameroon","CA":"Canada","CV":"Cape Verde","KY":"Cayman Islands","CF":"Central African Republic","TD":"Chad","CL":"Chile","CN":"China","CX":"Christmas Island","CC":"Cocos (Keeling) Islands","CO":"Colombia","KM":"Comoros","CD":"Congo, Dem. Republic","CG":"Congo, Republic","CK":"Cook Islands","CR":"Costa Rica","HR":"Croatia","CU":"Cuba","CY":"Cyprus","CZ":"Czech Republic","DK":"Denmark","DJ":"Djibouti","DM":"Dominica","DO":"Dominican Republic","TL":"East Timor","EC":"Ecuador","EG":"Egypt","SV":"El Salvador","GQ":"Equatorial Guinea","ER":"-","EE":"Estonia","ET":"Ethiopia","FK":"Falkland Islands","FO":"Faroe Islands","FJ":"Fiji","FI":"Finland","FR":"France","GF":"French Guiana","PF":"French Polynesia","TF":"French Southern Territories","GA":"Gabon","GM":"Gambia","GE":"Georgia","DE":"Germany","GH":"Ghana","GI":"Gibraltar","GR":"Greece","GL":"Greenland","GD":"Grenada","GP":"Guadeloupe","GU":"Guam","GT":"Guatemala","GG":"Guernsey","GN":"Guinea","GW":"Guinea-Bissau","GY":"Guyana","HT":"Haiti","HM":"Heard Island and McDonald Islands","HN":"Honduras","HK":"HongKong","HU":"Hungary","IS":"Iceland","IN":"India","ID":"Indonesia","IR":"Iran","IQ":"Iraq","IE":"Ireland","IL":"Israel","IT":"Italy","CI":"Ivory Coast","JM":"Jamaica","JP":"Japan","JE":"Jersey","JO":"Jordan","KZ":"Kazakhstan","KE":"Kenya","KI":"Kiribati","KP":"Korea, Dem. Republic of","KW":"Kuwait","KG":"Kyrgyzstan","LA":"Laos","LV":"Latvia","LB":"Lebanon","LS":"Lesotho","LR":"Liberia","LY":"Libya","LI":"Liechtenstein","LT":"Lithuania","LU":"Luxemburg","MO":"Macau","MK":"Macedonia","MG":"Madagascar","MW":"Malawi","MY":"Malaysia","MV":"Maldives","ML":"Mali","MT":"Malta","IM":"Man Island","MH":"Marshall Islands","MQ":"Martinique","MR":"Mauritania","MU":"Mauritius","YT":"Mayotte","MX":"Mexico","FM":"Micronesia","MD":"Moldova","MC":"Monaco","MN":"Mongolia","ME":"Montenegro","MS":"Montserrat","MA":"Morocco","MZ":"Mozambique","NA":"Namibia","NR":"Nauru","NP":"Nepal","NL":"Netherlands","AN":"Netherlands Antilles","NC":"New Caledonia","NZ":"New Zealand","NI":"Nicaragua","NE":"Niger","NG":"Nigeria","NU":"Niue","NF":"Norfolk Island","MP":"Northern Mariana Islands","NO":"Norway","OM":"Oman","PK":"Pakistan","PW":"Palau","PS":"Palestinian Territories","PA":"Panama","PG":"Papua New Guinea","PY":"Paraguay","PE":"Peru","PH":"Philippines","PN":"Pitcairn","PL":"Poland","PT":"Portugal","PR":"Puerto Rico","QA":"Qatar","RE":"Reunion Island","RO":"Romania","RU":"Russian Federation","RW":"Rwanda","BL":"Saint Barthelemy","KN":"Saint Kitts and Nevis","LC":"Saint Lucia","MF":"Saint Martin","PM":"Saint Pierre and Miquelon","VC":"Saint Vincent and the Grenadines","WS":"Samoa","SM":"San Marino","ST":"S\u00e3o Tom\u00e9 and Pr\u00edncipe","SA":"Saudi Arabia","SN":"Senegal","RS":"Serbia","SC":"Seychelles","SL":"Sierra Leone","SG":"Singapore","SK":"Slovakia","SI":"Slovenia","SB":"Solomon Islands","SO":"Somalia","ZA":"South Africa","GS":"South Georgia and the South Sandwich Islands","KR":"South Korea","ES":"Spain","LK":"Sri Lanka","SD":"Sudan","SR":"Suriname","SJ":"Svalbard and Jan Mayen","SZ":"Swaziland","SE":"Sweden","CH":"Switzerland","SY":"Syria","TW":"Taiwan","TJ":"Tajikistan","TZ":"Tanzania","TH":"Thailand","TG":"Togo","TK":"Tokelau","TO":"Tonga","TT":"Trinidad and Tobago","TN":"Tunisia","TR":"Turkey","TM":"Turkmenistan","TC":"Turks and Caicos Islands","TV":"Tuvalu","UG":"Uganda","UA":"Ukraine","AE":"United Arab Emirates","GB":"United Kingdom","US":"United States","UY":"Uruguay","UZ":"Uzbekistan","VU":"Vanuatu","VA":"Vatican City State","VE":"Venezuela","VN":"Vietnam","VG":"Virgin Islands (British)","VI":"Virgin Islands (U.S.)","WF":"Wallis and Futuna","EH":"Western Sahara","YE":"Yemen","ZM":"Zambia","ZW":"Zimbabwe"},"wp_products":{"311":{"tracking_category":"Individual","title":"Indie"},"312":{"tracking_category":"Enterprise","title":"Business"},"313":{"tracking_category":"Enterprise","title":"Enterprise"}},"api_products":{"8":{"id":8,"name":"Business","pricing":[{"currency":{"symbol":"$","iso_code":"USD"},"price":"412.000000"},{"currency":{"symbol":"\u20ac","iso_code":"EUR"},"price":"299.000000"},{"currency":{"symbol":"$","iso_code":"USD"},"price":"-1.000000"}]},"9":{"id":9,"name":"Indie","pricing":[{"currency":{"symbol":"$","iso_code":"USD"},"price":"136.000000"},{"currency":{"symbol":"\u20ac","iso_code":"EUR"},"price":"99.000000"},{"currency":{"symbol":"$","iso_code":"USD"},"price":"-1.000000"}]},"10":{"id":10,"name":"Trial","pricing":[{"currency":{"symbol":"$","iso_code":"USD"},"price":"0.000000"},{"currency":{"symbol":"$","iso_code":"USD"},"price":"-1.000000"}]},"11":{"id":11,"name":"Dev license","pricing":[{"currency":{"symbol":"$","iso_code":"USD"},"price":"1.000000"},{"currency":{"symbol":"\u20ac","iso_code":"EUR"},"price":"1.000000"},{"currency":{"symbol":"$","iso_code":"USD"},"price":"-1.000000"}]}},"links":{"3145":"\/thank-you-trial\/","2929":"\/genymotion-cloud-user-guide-2\/","2884":"\/help\/on-demand\/user-guide\/","2859":"\/help\/on-demand\/tutorial\/use-camera\/","2860":"\/help\/on-demand\/tutorial\/install-auto-generated-certificate\/","2861":"\/help\/on-demand\/tutorial\/change-mobile-network\/","2862":"\/help\/on-demand\/tutorial\/set-first-instance\/","2708":"\/genymotion-demand-survey\/","2436":"\/help\/on-demand\/tutorial\/configure-turn-server\/","2434":"\/help\/on-demand\/tutorial\/lock-application-kiosk-mode\/","2379":"\/get-full-version\/","download-trial":"\/download-trial\/","2238":"\/genykiosk\/","2234":"\/genykiosk-form\/","2229":"\/genymaster-form-2\/","2190":"\/genydeploy-form\/","maintenance":"\/help\/","1948":"\/help\/on-demand\/faq\/","support":"\/on-demand\/support\/","1942":"\/on-demand\/refund-and-cancel\/","1940":"\/on-demand\/eula\/","1935":"\/help\/on-demand\/release-notes\/","1908":"\/on-demand\/","1906":"\/","1864":"\/help\/on-demand\/tutorial\/","1862":"\/help\/on-demand\/tutorial\/change-resolution\/","1860":"\/help\/on-demand\/tutorial\/http-authentication\/","1858":"\/help\/on-demand\/tutorial\/install-app\/","1856":"\/help\/on-demand\/tutorial\/enable-disable-adb\/","1854":"\/help\/on-demand\/tutorial\/install-gapps\/","1852":"\/help\/on-demand\/product-access\/","1502":"\/whitepaper-mass-deployment-mobile-device-fleet\/","1449":"\/whitepaper-cloud-based-emulation\/","1439":"\/whitepaper-virtues-emulators-mobile-testing-strategy\/","447":"\/blog\/","download":"\/download\/","sign-in-promo":"\/promo\/","976":"\/cloud\/","916":"\/legal\/","914":"\/account\/licenses\/","802":"\/genydeploy\/","thank-you-premium-indie":"\/thank-you-premium-indie\/","thank-you-premium-business":"\/thank-you-premium-business\/","incentive":"\/incentive\/","562":"\/download-handler\/","checkout-sign-up":"\/checkout-sign-up\/","checkout-sign-in":"\/checkout-sign-in\/","checkout-payment":"\/checkout-payment\/","checkout-cart":"\/checkout-cart\/","checkout-billing":"\/checkout-billing\/","account-activated":"\/account\/activated\/","account-activation":"\/account\/activation\/","account-not-activated":"\/account\/not-activated\/","account-licenses-renewal-key-invalid":"\/account\/licenses\/renewal-key-invalid\/","plugin":"\/plugins\/","422":"\/legal\/secure-payments\/","account-created":"\/account\/create\/success\/","299":"\/legal\/terms-and-conditions\/","297":"\/legal-notices\/","thank-you-freemium":"\/fun-zone\/","220":"\/legal\/privacy-statement\/","faq":"\/help\/desktop\/faq\/","release-notes":"\/help\/desktop\/release-notes\/","contact":"\/contact\/","pricing-and-licensing":"\/pricing-and-licensing\/","features":"\/desktop\/","reset-password-complete":"\/account\/password-reset\/success\/","reset-password-confirm":"\/reset-password-confirm\/","reset-password-failure":"\/account\/password-reset\/failure\/","reset-password-procedure":"\/reset-password-procedure\/","reset-password":"\/account\/password-reset\/","sign-up":"\/account\/create\/","sign-in":"\/account\/login\/","account":"\/account\/"},"translations":{"cart_renewal_edit":"You can not edit the cart for your renewal order.","cart_renewal_qty_change":"Sorry you can't change the quantity for your renewal.","cart_voucher_invalid":"Invalid voucher code","cart_voucher_login_required":"You must sign in to use a voucher code","download_limited_title":"Limited download","download_limited_content":"To be able to download the Genymotion software you must activate your account. Please check your emails if you created your account during the past 15 days. If you did not receive an email please follow","download_limited_link":"this link","confirm_contact_redirect":"You need to be logged in for this request type.","profile_delete_account_question":"Are you sure you want to delete your account?","profile_delete_account_confirm":"Yes, delete my account!","profile_updated":"Thank you for updating your preferences!","year":"year","years":"years","month":"month","months":"months","day":"day","days":"days","months_arr":["January","February","March","April","May","June","July","August","September","October","November","December"],"stripe_invalid_cvc":"Invalid CVC code","stripe_invalid_expiry":"Invalid expiry date","stripe_invalid_number":"Invalid card number","profile_renewal_info":"To extend your license, please contact your Purchasing Department. If you need to know who purchased the license, you can <a href=\"\/contact\/?type=sales\">contact us<\/a>.","profile_renewal_procedure_success":"Request to the buyer has been sent.","resend_email_success":"Confirmation e-mail sent successfully.","cart_creation_problem":"There was an error when trying to create cart. Please try again later.","general_problem":"There was a problem with our service. Please try again later.","profile_no_invoices":"No invoices yet.","profile_invoice_status_waiting":"Waiting for validation","profile_invoice_order_reference":"Order reference","profile_invoice_order_status":"Status","profile_invoice_download":"Download pdf","profile_password_updated":"Thank you for updating your password!","profile_account_deleted_title":"Account deleted","profile_account_deleted_msg":"Come back soon!","signup_validation_terms":"You must accept the privacy terms","contact_drop_files":"Drag and drop files here or click to <link>browse your file...<\/link>","jq_validate":{"required":"This field is required.","remote":"Please fix this field.","email":"Please enter a valid email address.","url":"Please enter a valid URL.","date":"Please enter a valid date.","dateISO":"Please enter a valid date (ISO).","number":"Please enter a valid number.","digits":"Please enter only digits.","equalTo":"Please enter the same value again.","maxlength":"Please enter no more than {0} characters.","minlength":"Please enter at least {0} characters.","rangelength":"Please enter a value between {0} and {1} characters long.","range":"Please enter a value between {0} and {1}.","max":"Please enter a value less than or equal to {0}.","min":"Please enter a value greater than or equal to {0}.","step":"Please enter a multiple of {0}."}}};
/* ]]> */
</script>
<script type="text/javascript" src="Toursim/main.js"></script>
<script type="text/javascript" src="Toursim/URI.js"></script>
<script type="text/javascript" src="Toursim/signals.js"></script>
<script type="text/javascript" src="Toursim/crossroads.js"></script>


    


<script type="text/javascript" src="Toursim/conversion.js"></script><img alt="" src="Toursim/a.gif" style="display:none" border="0" height="1" width="1">
<noscript>
  <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/897364152/?value=0&amp;guid=ON&amp;script=0"/>
  </div>
</noscript>
	
<script>

jQuery(document).ready(function() {
$(function(){
	$('.pix_diapo').diapo();
});
});
</script>	
	<noscript>
			<style>
				.da-thumbs li a div {
					top: 0px;
					left: -100%;
					-webkit-transition: all 0.3s ease;
					-moz-transition: all 0.3s ease-in-out;
					-o-transition: all 0.3s ease-in-out;
					-ms-transition: all 0.3s ease-in-out;
					transition: all 0.3s ease-in-out;
				}
				.da-thumbs li a:hover div{
					left: 0px;
				}
			</style>
		</noscript>		
</head>
<body>