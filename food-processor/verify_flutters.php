<?php
if(isset($pageExtension)){

	if(isset($ref) && isset($total) && isset($optcmd)){
		
		// checking for payment keys in db
		if(x_count("paymentkeys","company='flutters' AND status='1' LIMIT 1") > 0){
		
		$fskey = x_getsingle("SELECT secretkey FROM paymentkeys WHERE company='flutters' AND status='1' LIMIT 1","paymentkeys WHERE company='flutters' AND status='1' LIMIT 1","secretkey"); // Getting secret key
		
		}else{
			echo "<p class='alert-txt'>Payment keys not found in db!</p>";
			exit();
		}		
		
			if(x_justvalidate($fskey)){ // validating the existence of the secret key
			
				$txid = $ref; // Transaction reference
				$amount = $total; // Total Transaction amount 
				$fee = x_fwfees($amount); // flutters fees
				
				// initiating call to flutter verification API
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "GET",
					CURLOPT_HTTPHEADER => array(
					  "Content-Type: application/json",
					  "Authorization: Bearer $fskey"
					),
				  ));
				  
				  $response = curl_exec($curl);
				  
				  curl_close($curl);
				  
				  $res = json_decode($response);
				  
				  $status = $res->status;
				  
				  
				  if(($status=="success"))
				  {
					  $currency = $res->data->currency ;// Our transaction ref
					  $tx_ref = $res->data->tx_ref ;// Our transaction ref
					  $tx_id = $res->data->id; // Our transaction id from flutters
					  $amountCharged = $res->data->charged_amount;
					  $amountToPay = $amount;
						
						if($amountCharged >= $amountToPay){
							// successful Transaction
							//echo "<center><img src='../image/success.jpg' style='wid' class='img-fluid'/></center>"; 
							$msg = urlencode("Transaction Successful");
							finish("final_checkout_n?payments-msg=$msg","0");						
						}
						else{
							// Fraudulent transaction 
							//echo 'Fraudulent transaction detected';
							$msg = urlencode("Fraudulent transaction detected");
							finish("final_checkout_n?payments-msg=$msg","0");
						}
				  }
				  else{
					  // Failed Transaction
					  //echo "<center><img src='../image/failed.png' class='img-fluid'/></center>";
					  $msg = urlencode("Failed transaction detected");
					  finish("final_checkout_n?payments-msg=$msg","0");
				  }
			}

	}
            
}
?>
