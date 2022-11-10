<?php
require("flutter2/vendor/autoload.php");
use Flutterwave\EventHandlers\EventHandlerInterface;
use Flutterwave\Rave;
use Flutterwave\Transactions;
$ref = 3917732;
$history = new Transactions();
$data = array("id"=>"$ref");
$verifyTransaction = $history->verifyTransaction($data);
//print_r($verifyTransaction);
if($verifyTransaction["status"] == "success"){
	echo "Transactions successful!";
}else{
	echo "Transaction failed!";
}

?>