<?php
//$pageToken = md5(rand());
include_once("finishit.php");
xstart("0");
if(x_validatesession("XCAPE_HACKS") && x_validatesession("ER_ID_2022_VI")){
		
		$email = $_SESSION["ER_EMAIL_2022_VI"]; // current logged-in user email
		
		//validating the order id session started
		
		if(x_validatesession("XELOW_COMMERCE_ORDER_ID") && x_validatesession("XELOW_COMMERCE_ORDER_TOKEN")){}else{
			$_SESSION["XELOW_COMMERCE_ORDER_ID"] = x_generated($email);
			$_SESSION["XELOW_COMMERCE_ORDER_TOKEN"] = sha1(x_generated($email).$email).sha1(x_generated($email).$email).sha1(Date("Ydhis"));
		}	
		//xstart("1");
		$commp = "yes";
		include("ApplicationData/validatinglogon.php");//validating logon started
}else{
	finish("../loginAccount?cmd=CompleteFoodOrder","0");
}
?>
