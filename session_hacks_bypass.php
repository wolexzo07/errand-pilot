<?php
	include("validatePage.php");
	// session hacks bypass
	if(!x_validatesession("XCAPE_HACKS")){
		$_SESSION["XCAPE_HACKS"] = md5(rand());
	}
?>