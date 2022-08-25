<?php
require_once("../finishit.php");
xstart("0");
if(isset($_SESSION["IQGAMES_ID_2018_VISION"]) && isset($_POST['alertus']) || !empty($_POST['alertus'])){

$accountname = xp("acctname");$tdate = xp("tdate");
$mainamt = xp("amount");$bn = xp("bankname");

$wc = "NGN ";
$mamt = number_format($mainamt,2);

if(!is_numeric($mainamt)){
	echo "<p class='hubmsg'>Enter valid amount!</p>";
	exit();
	}


$userid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);

  $time = x_curtime("0","0");$rtime = x_curtime("0","1");

  $os = xos();$br = xbr();$ip = xip();

  $token = sha1(xrands(30).DATE("His"));

  $refid = time().rand(50,500900222).xrands(5);

  $create = x_create("alertus","
userid INT NOT NULL,
amount DOUBLE NOT NULL,
bankname VARCHAR(100) NOT NULL,
acctname VARCHAR(100) NOT NULL,
tranfer_date VARCHAR(100) NOT NULL,
date_time DATETIME NOT NULL,
timereal VARCHAR(50) NOT NULL,
type ENUM('topup') NOT NULL,
status ENUM('0','1') NOT NULL,
token TEXT NOT NULL,
os VARCHAR(100) NOT NULL,
br VARCHAR(220) NOT NULL,
ip VARCHAR(30) NOT NULL
			");

		if($create){
if(x_count("userdb_bank","id='$userid' AND status='1' LIMIT 1") > 0){

			x_insert("userid,amount,bankname,acctname,transfer_date,date_time,timereal,type,status,token,os,br,ip","alertus","'$userid','$mainamt','$bn','$accountname','$tdate','$time','$rtime','topup','0','$token','$os','$br','$ip'","<p class='hubmsg'>Alert of <b>($wc $mamt)</b> sent successfully! Your wallet will be credited after payment confirmation. </p>","<p class='hubmsg'>Failed to send alert</p>");

}else{
			echo "<p class='hubmsg'>Invalid user detected</p>";
}
		}else{
		echo "<p class='hubmsg'>Failed to create table</p>";
		}
}else{
	echo "<p class='hubmsg'>Parameter Missing!</p>";
	}
?>
