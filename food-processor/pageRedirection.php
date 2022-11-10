<?php
include("../validatePage.php");
if(x_validateget("pageToken")){
	$getPage = x_clean(x_get("pageToken"));
	if(x_count("categories","dept_id = '$getPage' LIMIT 1") > 0){
		
	}else{
		finish("../","Oops:Parameter was Tampered!");
	}
}else{
	finish("../","Oops:Invalid Request!");
}
?>