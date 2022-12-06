<?php
include("../finishit.php");
$title = "Welcome Onboard";
$content = "I am highly delighted to welcome you on our platform.";
$user_email ="hitmeads@gmail.com";

ep_mailer($title,$content,$user_email);
ep_notifier($type,$title,$message,$userid,$category);
?>