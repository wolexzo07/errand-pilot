<html>
<head>
	<title>Flutters : Payment Verification</title>
</head>
<body>
<script>
	function response_sh(){
		setTimeout(function(){
			window.location="final_checkout_n?payments-msg=Wallet was topped-up successful";
		},3000);
	}
	function response_dp(){
		setTimeout(function(){
			window.location="final_checkout_n?payments-msg=Failed to top-up wallet! Duplicate Transaction.";
		},3000);
	}
	function response_fl(){
		setTimeout(function(){
			window.location="final_checkout_n?payments-msg=Failed to top-up wallet! Failed Transaction.";
		},3000);
	}
</script>
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
				  
				  $amount_due = $total; // Transaction amount without fee
				  $fee = x_fwfees($total); // flutters fees
				
				  if(($status=="success"))
				  {
					  $currency = $res->data->currency ;// Our transaction ref
					  $tx_ref = $res->data->tx_ref ;// Our transaction ref
					  $tx_id = $res->data->id; // Our transaction id from flutters
					  $amountCharged = $res->data->charged_amount;
					  $amountToPay = $total + $fee; // All amount involved
						
						if($amountCharged >= $amountToPay){
							// successful Transaction
							//echo "<center><img src='../image/dupp.png' style='wid' class='img-fluid'/></center>"; 
							//$msg = urlencode("Transaction Successful");
						//finish("final_checkout_n?payments-msg=$msg","0");		
						
				if(x_count("topup_details","tranx_type='flutter' AND payment_id='$txid' AND status='1' LIMIT 1") > 0){ // Handling successful Tranx!;
					//echo "<p class='msg-txt'>Duplicate Transaction Detected!</p>";
					echo "<center><img src='../image/dupp.png' style='wid' class='img-fluid'/></center><script>response_dp();</script>";
				}else{
					// current logged in user details
					$userid = x_clean($_SESSION["ER_ID_2022_VI"]); // User ID
					$email = x_clean($_SESSION["ER_EMAIL_2022_VI"]); // Email
					$name = x_clean($_SESSION["ER_NAME_2022_VI"]); // Name
					$token = x_clean($_SESSION["ER_TOKEN_2022_VI"] ); // token
					
					$orderid = x_clean($_SESSION["XELOW_COMMERCE_ORDER_ID"]); // order unique id
					$pay_id = $txid; 
					$trx_token = sha1($pay_id); // Transaction Token
					
					
					$user_hash_token = eptoks($token); // hashed user token
					$amount = $amountToPay - $fee; // amount without gateway fees
					$total_amount = $amountToPay; // amount with charges
					
					$timer = x_curtime(0,1);$os = xos();$br = xbr();$ip = xip();
					
					// Getting user current balance
					
					if(x_count("ep_wallets","utoken='$user_hash_token' LIMIT 1") > 0){
						
						$curbal = x_getsingle("SELECT wallet_balance FROM ep_wallets WHERE utoken='$user_hash_token' LIMIT 1","ep_wallets WHERE utoken='$user_hash_token' LIMIT 1","wallet_balance");// current balance
						
						$newbalance = $curbal + $amount;
						
						x_update("ep_wallets","utoken='$user_hash_token'","wallet_balance='$newbalance'","&nbsp;","<p class='alert-txt'>Error:Failed to update balance!</p>"); // updating wallet balance
						
					}else{
						echo "<p class='alert-txt'>No wallets attached to user</p>";
						exit();
					}
					
					x_insert("user_id,currency,tranx_type,user_token,status,payment_id,credit_amount,fee_amount ,total_amount,paid_on,tranx_token,approval_date,os,br,ip,balance_before,balance_after","topup_details","'$token','NGN','flutter','$user_hash_token','1','$pay_id','$amount','$fee','$total_amount','$timer','$trx_token','$timer','$os','$br','$ip','$curbal','$newbalance'","<center><img src='../image/success.jpg' style='wid' class='img-fluid'/></center><script>response_sh();</script>","<center><img src='../image/failed.png' class='img-fluid'/></center>");
				}
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
					  echo "<center><img src='../image/failed.png' class='img-fluid'/></center><script>response_fl();</script>";
					  //$msg = urlencode("Failed transaction detected");
					  //finish("final_checkout_n?payments-msg=$msg","0");
				  }
			}

	}
            
}
?>

</body>
</html>
