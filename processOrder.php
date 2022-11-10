<?php
$pageToken = md5(rand());
include_once("finishit.php");
xstart("0");
if(x_validatesession("XCAPE_HACKS")){
	
	// xcape session hacks
	$xcapehacks = $_SESSION["XCAPE_HACKS"];
	if(!x_validatepost("$xcapehacks")){
		finish("./","Error:: Parameter was modified!.");
	}
	// Controlled google captcha
	if(x_count("control_captcha","status='1'") > 0){
		
		/***$secret = "6LcDo1sUAAAAAOF0Nwyg-jvChfPqH_w7s7YVNnn0";
		$gpost = xp("g-recaptcha-response");
		$params = array(
				   "secret" => $secret,
				   "response" => $gpost
					);
		$result = x_google("https://www.google.com/recaptcha/api/siteverify",$params);
		$response = $result['success'];****/
		$response = "ok";
	}else{
		$response = "ok";	
	}


 if($response){
	$service = x_clean(x_post("servicelist"));
	
	if($service == ""){
		
		finish("./","You have to choose a service.");
		
	}else{
		$foodHash = "52ae104d91f749e0ab6f3bebf553d296";
		if($service == $foodHash){
			finish("food-processor?pageToken=$service","0");
		}else{
			finish("./","Selected Service coming soon!.");
		}
		
	}
 }
 else{
	 
	if(x_count("control_captcha","status='1'") > 0){
		finish("./","Invalid Captcha!Try again.");
	}else{
		finish("./","Invalid response!Try again.");
	}
 }

}else{
	x_print("<p class='hubmsg'>Parameter Missing or modified!.</p>");
}
?>
