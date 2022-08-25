<?php
include("validatePage.php");
if(x_count("control_sms","status='1'") > 0){
		echo "<font style='color:white;'>".xpost("http://pmcsms.com/api/v1/http.php",$params)."</font>";
	}
?>