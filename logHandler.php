<?php
$pageToken = md5(rand());
include_once("finishit.php");
include_once("siteinfo.php");
xstart("0");
if(x_validatesession("XCAPE_HACKS") && x_validatepost("blessme")){
    // xcape session hacks
	$xcapehacks = $_SESSION["XCAPE_HACKS"];
	
	if(!x_validatepost("$xcapehacks")){
		finish("createAccount","Error:: Parameter was modified!.");
	}
	// Controlled google captcha
	if(x_count("control_captcha","status='1'") > 0){
		$secret = "$gsecret";
		$gpost = xp("g-recaptcha-response");
		$params = array(
				   "secret" => $secret,
				   "response" => $gpost
					);
		$result = x_google("https://www.google.com/recaptcha/api/siteverify",$params);
		$response = $result['success'];
		
	}else{
		$response = "ok";	
	}


 if($response){
	 $email = xp("email");
	 $salt = "ABCDEFGHIJKKLMNOPQ1234567890abcghdtuwioalkjsnh?@";
	 $pass = xp("pass");
	 $hash = md5(sha1($pass).$salt).sha1(sha1($pass).$salt);
	 $time = x_curtime("0","0");$rtime = x_curtime("0","1");

	 $tok = sha1(uniqid().xrands(10).Date("His"));

	 $os = xos();$br = xbr();$ip = xip();

	if(x_count("manageaccount","email='$email' AND pass='$hash' AND status='0' OR mobile='$email' AND pass='$hash' AND status='0' LIMIT 1") > 0){
		echo "<p class='hubmsg'>Account Inactive.Please confirm your email!</p>";
		exit();
		}
		
	if(x_count("manageaccount","email='$email' AND pass='$hash' AND status='1' OR mobile='$email' AND pass='$hash' AND status='1' LIMIT 1") > 0){

	x_update("manageaccount","email='$email' AND pass='$hash' AND status='1' OR mobile='$email' AND pass='$hash' AND status='1'","last_login='$time',last_login_r='$rtime'","0","0");

	foreach(x_select("0","manageaccount","email='$email' AND pass='$hash' AND status='1' OR mobile='$email' AND pass='$hash' AND status='1'","1","name") as $key){
		
			$id = $key["id"];
			$name = $key["name"];
			$email = $key["email"];
			$mobile = $key["mobile"];
			$ref = $key["ref"];
			$token = $key["token"];
			
			$country = $key["country"];
			$state = $key["state"];
			$area = $key["city"];
			$info = $key["street"];
		
		}

		$_SESSION["ER_ID_2022_VI"] = $id;
		$_SESSION["ER_NAME_2022_VI"] = $name;
		$_SESSION["ER_EMAIL_2022_VI"] = $email;
		$_SESSION["ER_MOBILE_2022_VI"] = $mobile;
		$_SESSION["ER_TOKEN_2022_VI"] = $token;
		$_SESSION["ER_REF_2022_VI"] = $ref;
		
		$_SESSION["XELOW_COMMERCE_NAME"] = $name;
		$_SESSION["XELOW_COMMERCE_EMAIL"] = $email;
		$_SESSION["XELOW_COMMERCE_USER_ID"] = $id;
		$_SESSION["XELOW_COMMERCE_ADDRESS"] = "<address>$info</address><p>$area-$state state, $country</p>";
		
		
		//validating the order id session started

		if(isset($_SESSION["XELOW_COMMERCE_ORDER_ID"])){
			
		}else{
			$_SESSION["XELOW_COMMERCE_ORDER_ID"] = generate();
			$_SESSION["XELOW_COMMERCE_ORDER_TOKEN"] = sha1(generate().$email).sha1(generate().$email).sha1(Date("Ydhis"));
		}	
		//validating the order id session ended
		
		
		xstart("1");// session writing is now closed
		
		
		//validating logon started
		
		include_once("food-processor/validatinglogon.php");
		
		//validating longon ended 
		

	}else{
	//echo "<p class='hubmsg'>Failed to login! Try again.</p>";
	finish("loginAccount","Failed to login! Try again");

	}
		
}else{
		if(x_count("control_captcha","status='1'") > 0){
			finish("createAccount","Invalid Captcha!Try again.");
		}else{
			finish("createAccount","Invalid response!Try again.");
		}
	
	}

}else{
	echo "<p class='hubmsg'>Parameter missing!</p>";
}
?>
