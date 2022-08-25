<?php
include_once("finishit.php");
xstart("0");
if(isset($_POST["blessme"]) || !empty($_POST["blessme"])){

	$secret = "6LcDo1sUAAAAAOF0Nwyg-jvChfPqH_w7s7YVNnn0";
	$gpost = xp("g-recaptcha-response");
	$params = array(
			   "secret" => $secret,
			   "response" => $gpost
				);

	$result = x_google("https://www.google.com/recaptcha/api/siteverify",$params);

 if($result['success']){

$email = xpmail("email");

 $salt = "ABCDEFGHIJKKLMNOPQ1234567890abcghdtuwioalkjsnh?@";
  $pass = xrands(5);
  $hash = md5(sha1($pass).$salt).sha1(sha1($pass).$salt);

if(x_count("userdb_bank","email='$email' LIMIT 1") > 0){

foreach(x_select("0","userdb_bank","email='$email'","1","id") as $key){
	$name = $key["name"];
}
include_once("passmail.php");
x_updated("userdb_bank","email='$email'","pass='$hash'","Your new password has been sent to your email.","failed to reset password");

//echo "<p class='hubmsg'>Your password has been sent to your email.</p>";

	}else{
		echo "<p class='hubmsg'>Invalid email account!</p>";
		}
}
else{
		echo "<p class='hubmsg'>Invalid captcha!</p>";
	}

}else{
	echo "<p class='hubmsg'>Parameter missing</p>";
}
?>
