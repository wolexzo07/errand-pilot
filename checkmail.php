<?php
include("xe-library/xe-library74.php");
//Send mail locally from the system
function pushmail($to,$subject,$message){
// configuration
$hostserver = "metavbreed.com";  // required for alternate routing of email
$username = "rovymbexz.enquiry@metavbreed.com"; // required for alternate routing of email
$password = "Mailer2023??";  // required for alternate routing of email
$setfrom = "rovymbexz.enquiry@metavbreed.com";
$replyto = "rovymbexz.enquiry@metavbreed.com";
$title ="Rovymbexz";
$port = 465;  // required for alternate routing of email
$protocol = "ssl";
$smtp_auth = true;

// Mailer initiating here

  $mail 			= new PHPMailer\PHPMailer\PHPMailer();
  $body 			= $message;
  $mail->IsSMTP();
  $mail->SMTPAuth   = $smtp_auth;
  $mail->Host       = $hostserver;
  $mail->Port       = $port;
  $mail->Username   = $username;
  $mail->Password   = $password;
  $mail->SMTPSecure = $protocol;
  $mail->SetFrom($setfrom,$title);
  $mail->AddReplyTo($replyto,$title);
  $mail->Subject    = $subject;
  $mail->AltBody    = "";
  $mail->MsgHTML($body);
  $address 			= $to;
  #$mail->AddAddress($address, $name);
  $mail->AddAddress($address, "");
  if(!$mail->Send()) {
			return 0;
	  } else {
			return 1;
	 }
   }
	
	$to = "webmastertitus@gmail.com";
	$subject = "NEW USER REGISTRATION";
	$message = "<html>
	<head>
	<title>NEW USER REGISTRATION</title>
	</head>
	<body>
	We are delighted to have as a new user onboard
	</body>
	</html>";
	if(pushmail($to,$subject,$message) == "1"){
		echo "Message was sent";
	}else{
		echo "Failed to send message";
	}
?>