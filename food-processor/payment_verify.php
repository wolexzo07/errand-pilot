<?php
include_once("../finishit.php");
xstart("0");
if(x_validatesession("XCAPE_HACKS") && x_validatesession("ER_ID_2022_VI") && x_validateget("optcmd")){
	
	$pageExtension = sha1(uniqid()); // token for extended pages
	//&& x_validateget("ref")
	
	if(x_get("optcmd") == "flutter"){
		$optcmd = x_clean(x_get("optcmd")); // Getting payment company
		$ref = x_clean(x_get("transaction_id")); // Transaction id
		$total = x_clean(x_get("debited")); // Transaction Amount
	}else{
		$optcmd = x_clean(x_get("optcmd")); // Getting payment company
		$ref = x_clean(x_get("ref")); // Transaction ref
		$total = x_clean(x_get("total")); // Transaction Amount
	}

	$complist = array("paystack","flutter"); // payment company listing
	
	if(in_array($optcmd,$complist)){
		
		if($optcmd == "paystack"){ //paystack verification starts here
			include("verify_paystk.php");
		}else{ // flutter verification starts here
			include("verify_flutters.php");
		}
	}

}else{
	echo "Missing Parameter!";
}
?>
