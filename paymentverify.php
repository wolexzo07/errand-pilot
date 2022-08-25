<?php
//get paystack payment secret key
if(x_count("paymentkeys","status='Yes' LIMIT 1") > 0){

	$py = $_GET['reference'];
	require 'Paystack.php'; 
	foreach(x_select("secretkey,publickey","paymentkeys","status='Yes'","1","id") as $key){
		$sk = $key["secretkey"];
		$pk = $key["publickey"];
		
		$paystack = new Paystack($sk);
		$trx = $paystack->transaction->verify(
			[
			 'reference'=>$_GET['reference']
			]
		);
		if(!$trx->status){
			exit($trx->message);
		}

		if('success' == $trx->data->status){
			
			
			
			}
		
		}
	
	}else{
		echo "Payment key deactivated!";
		#exit();
		}



?>
