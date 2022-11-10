<?php
include_once("../finishit.php");
xstart("0");
if(x_validateget("reference")){
	
	if(x_count("paymentkeys","status='1' AND company='paystack' LIMIT 1") > 0){
		
	$py = x_clean(x_get('reference'));
	require 'Paystack.php'; 
	foreach(x_select("secretkey,publickey","paymentkeys","status='1' AND company='paystack'","1","id") as $key){
		$sk = $key["secretkey"];
		$pk = $key["publickey"];
		
		$paystack = new Paystack($sk);
		$trx = $paystack->transaction->verify(
			[
			 'reference'=>$py
			]
		);
		if(!$trx->status){
			exit($trx->message);
		}

		if('success' == $trx->data->status){
			
			echo "Transaction was successful!";
			
			}
		
		}
	
	}else{
		echo "Payment key deactivated!";
		}
}else{
	echo "Missing Parameter!";
}
?>
