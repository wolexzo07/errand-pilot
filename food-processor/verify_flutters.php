<?php
include_once("../finishit.php");
xstart("0");

status=successful&tx_ref=1103093557-2996-MVTOADXWPH&transaction_id=3917732
if(x_validateget("status") && x_validateget("tx_ref") && x_validateget("transaction_id")){
	
}
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
                  "Authorization: Bearer FLWSECK_TEST-53c2d53437dec8fa9d07b28efd1684b1-X"
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
				  $amountPaid = $res->data->charged_amount;
				  $amountToPay = 5600;
                
                if($amountPaid >= $amountToPay){
                    echo 'Payment successful';    
                }
                else{
                    echo 'Fraudulent transaction detected';
                }
              }
              else{
                  echo 'Payment Failed!';
              }
?>