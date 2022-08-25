<?php
include("validatePage.php");
$subject = "IQ-GAMES NEW USER REGISTRATION";

$message = "
<html>
<head>
<title>IQ-GAMES NEW USER REGISTRATION</title>
</head>
<body>
<div style='margin:0%;border:1px solid purple;'>
<div style='height:30px;padding:1%;background-color:purple;color:white'>

</div>
<div style='background-color:white;padding:1%;'>
<center>
<h2 style='text-align:center;display:block;'><img src='https://iqgame.app/image/logome.png' style='width:80px;padding:0px;'/> <br/><font style='color:green;'>iqgames</font>.app</h2></center>
</div>
<div style='padding:1%;'>
<p>
Hi &nbsp;<b>$fullname ($email)</b>,<br/><br/>
Welcome to <b>IQ-GAMES ONLINE COMMUNITY</b>, we are delighted to have you onboard.Thank you for registering with us.Please activate your account by clicking the link below and login into your dashboard for more details.Thank you.
<br/><br/><br/>
<table cellpadding='15px' border='1px' cellspacing='0px'>
<tr>
<th>Login ID</th>
<td>$email</td>
</tr>

<tr>
<th>Password</th>
<td>$pass</td>
</tr>

<tr>
<th>Plan</th>
<td>$plan Plan</td>
</tr>

</table>
<br/>
<center><button onclick='return fun()' style='margin-top:20pt;text-align:center;padding:10px;display:none;'>Activate Account</button>
<p><a href='https://iqgame.app/activateaccount?key=$tok&userid=$email'>Activate account</a></p>
or copy the link below and directly paste it into your browser<br/><br/>
https://iqgame.app/activateaccount?key=$tok&userid=$email
</center>
<br/><br/>
<script>

function fun(){
window.location='https://iqgame.app/activateaccount?key=$tok&userid=$email';
}
</script>
<style type='text/css'>
.br{
background-color:purple;
padding:10px;
border-radius:7px;

}
.br:hover{
background-color:gold;
padding:10px;
}
a{
color:white;
text-decoration:none;
}
.mail{
text-decoration:none;
color:white;
font-size:13pt;
}

</style>
</p>
</div>
<div style='padding:1%;background-color:purple;color:white'>

<b>From <i>IQ-GAMES TEAM</i> </b><br/>


<font style='color:;font-weight:bold;font;'>Contact our support on:</font><br/>
Email : support@iqgames.app<br/>
Phone : +234(0)8164359148<br/>
</div>
</div>
</body>
</html>
";

if(x_count("mailer","status='1' LIMIT 1") > 0){

	$mailsend =  sendmail($email,$subject,$message);
  if($mailsend==0){

	echo '<h2>There are some issue sending mail.</h2>';
  }
  else{
	#echo '<h2>email sent.</h2>';
  }

	}else{


		}



						?>
