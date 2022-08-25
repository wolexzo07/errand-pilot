<?php
require_once("finishit.php");
if(isset($_GET['key']) && isset($_GET['userid']) && !empty($_GET['key']) && !empty($_GET['userid'])){
	
	$token = xg("key");
	$email = xg("userid");
	
	if(x_count("subscriber","email='$email' AND status='0' LIMIT 1")){
		
	x_update("subscriber","email='$email' AND status='0'","status='1'","0","0");
	
	finish("./","Email subscription was successful");
	
	}else{
		
		finish("./","Invalid activation Link");
		
		}
	}else{
		
		finish("./","Parameter Missing!");
		
		}


?>
