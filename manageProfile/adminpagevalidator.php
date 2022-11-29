<?php
include("../finishit.php");
	xstart(0);
	if(x_validatesession("ER_ID_2022_VI")){
		$user_id = x_session("ER_ID_2022_VI");
		if(x_count("manageaccount","id='$user_id' LIMIT 1") > 0){
			$admin_status = x_getsingle("SELECT is_big FROM manageaccount WHERE id='$user_id' LIMIT 1","manageaccount WHERE id='$user_id' LIMIT 1","is_big");
			if($admin_status == "1"){
				//echo "Yes admin is here";
			}else{
				// banish non-admin from viewing page
				finish("../","Oops::Escalate privilege");
			}
		}
	}else{
		finish("../","Inactive session");
	}
?>