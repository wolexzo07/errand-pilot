<?php
include("validatePage.php");
if(isset($_SESSION["ER_ID_2022_VI"])){
	if(isset($_SESSION["XCAPE_HACKS"])){
		$token = $_SESSION["XCAPE_HACKS"];
		finish("manageProfile/ApplicationDashboard?hash=$token","0");
	}else{
		finish("manageProfile/ApplicationDashboard","0");
	}
}
?>