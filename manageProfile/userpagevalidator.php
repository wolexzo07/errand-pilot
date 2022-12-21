<?php
include("../finishit.php");
	xstart(0);
	if(x_validatesession("ER_ID_2022_VI")){
		$user_id = x_session("ER_ID_2022_VI");
		if(x_count("manageaccount","id='$user_id' LIMIT 1") > 0){
	
		}else{
			// banish invalid user from viewing page
				finish("../","Oops::Invalid user profile detected");
		}
	}else{
		finish("../","Inactive session");
	}
?>