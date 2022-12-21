<?php
include("../validatePage.php");
if(x_validateget("BToken")){
	$getPage = x_clean(x_get("BToken"));
	if(x_count("sub_service","subservice_id = '$getPage' LIMIT 1") > 0){
		$getbizname = x_getsingleupdate("sub_service","subservice","subservice_id = '$getPage'");
	}else{
		$getbizname = "";
		finish("../","Oops:Invalid Business Page!");
	}
}else{
	finish("../","Oops:Missing Parameter!");
}
?>