<?php
$pageToken = md5(rand());
include_once("finishit.php");
xstart("0");
if(x_validatesession("XCAPE_HACKS")){
	
	// xcape session hacks
	
	$xcapehacks = $_SESSION["XCAPE_HACKS"];
	if(!x_validatepost("$xcapehacks")){
		finish("createAccount","Error:: Parameter was modified!.");
	}
	
	// Controlled google captcha
	if(x_count("control_captcha","status='1'") > 0){
		$secret = "6LcDo1sUAAAAAOF0Nwyg-jvChfPqH_w7s7YVNnn0";
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

	// Personal details
	
	$fullname = ucwords(strtolower(xp("last")." ".xp("first")));
	$mobile = xp("mobile");
	$email = x_clean(x_post("email"));
	$salt = "ABCDEFGHIJKKLMNOPQ1234567890abcghdtuwioalkjsnh?@";
	$pass = xp("pass");
	$hash = md5(sha1($pass).$salt).sha1(sha1($pass).$salt);
	$ref = x_clean(x_post("ref"));
	$check = x_clean(x_post("checknow"));
    $time = x_curtime("0","0");
    $rtime = x_curtime("0","1");
	$tok = "EP_".sha1(uniqid().xrands(10).$email.Date("His"));
	$wallet_token = sha1($tok).md5($tok); // Token that hides user identity
	$os = xos();$br = xbr();$ip = xip();
	
	// Shipping informations
	
	$country = x_clean(x_post("country"));
	$state = x_clean(x_post("state"));
	$city = x_clean(x_post("city"));
	$street = x_clean(x_post("street"));
	$addition = x_clean(x_post("additional"));
	
    if($check == ""){
	  //echo "<p class='hubmsg'>You must agree to our terms.</p>";
		finish("createAccount","You must agree to our terms.");
	  }
	  
	  // Email validation
	  $regex = "/^[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z_+])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9}$/";
	  if(!preg_match($regex,$email)){
		  finish("createAccount","Invalid email was provided!.");
	  }
	  
	  // Checking for valid mobile number
	  if(!is_numeric($mobile) || (strlen($mobile) != 11)){
			finish("createAccount","Invalid nigeria mobile number.");
	  }

    $create = x_dbtab("manageaccount","
	is_big ENUM('0','1') NOT NULL,
	verify ENUM('0','1') NOT NULL,
	id_type ENUM('','intl. passport','Drivers License','Voters Card','National ID Card') NOT NULL,
	plan VARCHAR(120) NOT NULL,
	wallet_balance DOUBLE NOT NULL,
	wallet_bonus DOUBLE NOT NULL,
	wallet_credit DOUBLE NOT NULL,
	sub_status ENUM('inactive','active') NOT NULL,
	sub_date DATETIME NOT NULL,
	user_photo TEXT NOT NULL,
	card_photo TEXT NOT NULL,
	status ENUM('0','1') NOT NULL,
	name VARCHAR(220) NOT NULL,
	gender ENUM('male','female') NOT NULL,
	email VARCHAR(200) NOT NULL,
	pass TEXT NOT NULL,
	ref VARCHAR(100) NOT NULL,
	medium VARCHAR(230) NOT NULL,
	mobile VARCHAR(150) NOT NULL,
	country VARCHAR(150) NOT NULL,
	state VARCHAR(150) NOT NULL,
	city VARCHAR(255) NOT NULL,
	street TEXT NOT NULL,
	additional TEXT NOT NULL,
	account_name VARCHAR(220) NOT NULL,
	account_number VARCHAR(220) NOT NULL,
	bank_name VARCHAR(220) NOT NULL,
	token TEXT NOT NULL,
	timest DATETIME NOT NULL,
	realtime VARCHAR(100) NOT NULL,
	total_earned DOUBLE  NOT NULL,
	total_spent DOUBLE  NOT NULL,
	os VARCHAR(100) NOT NULL,
	br VARCHAR(220) NOT NULL,
	ip VARCHAR(30) NOT NULL,
	last_login DATETIME NOT NULL,
	last_login_r VARCHAR(220) NOT NULL
			","innodb");
	
	$createwallets = x_dbtab("ep_wallets","
	is_status ENUM('0','1') NOT NULL,
	wallet_balance DOUBLE NOT NULL,
	wallet_bonus DOUBLE NOT NULL,
	wallet_credit DOUBLE NOT NULL,
	last_tranx_date DATETIME NOT NULL,
	last_tranx_date_r VARCHAR(220) NOT NULL,
	utoken TEXT NOT NULL
	","innodb");
	
				
if($create && $createwallets){
	if(x_count("manageaccount","email='$email' LIMIT 1") > 0){
		
		finish("createAccount","Email already taken.");
		
	}else{
		
		if(x_count("manageaccount","mobile='$mobile' LIMIT 1") > 0){
			
		finish("createAccount","Mobile number already taken.");
		
		}else{	
		//importing sms module
		$msg = urlencode("Hi $fullname, welcome onboard to Errand Pilot (https://errandpilot.com).Login details: ID:$email; Pass: $pass");
		$api = "dc653ff9";
		$sender = "Errand Pilot";
		$route = 3;
		$result = "234".substr($mobile,1,10);
		$params = array(
				   "api_key" => $api,
				   "recipient" => $result,
				   "message" => $msg,
					 "route" => $route,
					 "sender" => $sender
					);


	if(x_count("signup_activation","status='1' LIMIT 1") > 0){
	  // control automated email
	include_once("usermail.php");
	 // control automated sms
	include_once("sms_sender.php");
	
	x_insert("is_status,wallet_balance,wallet_bonus,wallet_credit,utoken","ep_wallets","'1','0','0','0','$wallet_token'","&nbsp;&nbsp;","Failed to insert wallet details");
	
	x_insert("country,state,city,street,status,name,email,pass,token,timest,realtime,os,br,ip,mobile,ref","manageaccount","'$country','$state','$city','$street','0','$fullname','$email','$hash','$tok','$time','$rtime','$os','$br','$ip','$mobile','$ref'","<p class='hubmsg'>Account created. <a href='loginAccount'>Login here</a></p>","<p class='hubmsg'>Failed to insert data</p>");
	
	}else{
	 // control automated sms
	include_once("sms_sender.php");
	
	x_insert("is_status,wallet_balance,wallet_bonus,wallet_credit,utoken","ep_wallets","'1','0','0','0','$wallet_token'","&nbsp;","Failed to insert wallet details");
	
	x_insert("country,state,city,street,status,name,email,pass,token,timest,realtime,os,br,ip,mobile,ref","manageaccount","'$country','$state','$city','$street','1','$fullname','$email','$hash','$tok','$time','$rtime','$os','$br','$ip','$mobile','$ref'","<p class='hubmsg'>Account created. <a href='loginAccount'>Login here</a></p>","<p class='hubmsg'>Failed to insert data</p>");

	}
	
	// starting the session login and redirections

		if(x_count("manageaccount","email='$email' AND pass='$hash' LIMIT 1") > 0){
		
		foreach(x_select("email,name,id,mobile,country,state,city,street,additional","manageaccount","email='$email' AND pass='$hash'","1","id") as $key){

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
		include("errand_functions.php");
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
			finish("createAccount","Invalid login credential detected");
		}

		
	// ending the session login
	
	}
}
}else{
	x_print("<p class='hubmsg'>Failed to create db tables!.</p>");
}


 }
 else{
	 // captcha control
	if(x_count("control_captcha","status='1'") > 0){
		finish("createAccount","Invalid Captcha!Try again.");
	}else{
		finish("createAccount","Invalid response!Try again.");
	}
 }

}else{
	x_print("<p class='hubmsg'>Parameter Missing or modified!.</p>");
}
?>
