<script>
	function finalizeDeal(){
		showalert("Transaction completed successfully!");
		setTimeout(function(){
			window.location="../";
		},5000);
	}
	
	function bypass_sess(){
		showalert("Your cart is now empty! Re-start shopping");
		setTimeout(function(){
			window.location="../";
		},5000);
	}
</script>
<?php
include_once("../finishit.php");
xstart("0");
if(x_validatesession("XCAPE_HACKS") && x_validatesession("ER_ID_2022_VI") && x_validateget("_token")){
	
	// current logged in user details
	$userid = x_clean($_SESSION["ER_ID_2022_VI"]); // User ID
	$email = x_clean($_SESSION["ER_EMAIL_2022_VI"]); // Email
	$name = x_clean($_SESSION["ER_NAME_2022_VI"]); // Name
	$token = x_clean($_SESSION["ER_TOKEN_2022_VI"]); // user token

	// captured data
	$total = xg("total_final");
	$shipfee = xg("shipping_fee");
	$servfee = xg("service_fee");
	$shopped_amt = xg("shopped_amount");
	$token_sess = xg("_token");
	
	// validating session hacks
	if($token_sess != x_session("XCAPE_HACKS")){
		?>
		 <script>
		 showalert("Session hacks detected!");
		 </script>
		<?php
	}else{
		// validating order details
		if(!x_validatesession("XELOW_COMMERCE_ORDER_TOKEN")){
			?>
			<script>
				bypass_sess();
			</script>
			<?php
			exit();
		}
		//Order details (id and token)
		$orderid = x_clean($_SESSION["XELOW_COMMERCE_ORDER_ID"]);
		$ordtoken = x_clean($_SESSION["XELOW_COMMERCE_ORDER_TOKEN"]);
		$timer = x_curtime("0","1");
		
		// validating current user
		if(x_count("manageaccount","id='$userid' AND token='$token' LIMIT 1") > 0){
			$user_hash_token = eptoks($token); // hashed user token
			$curbal = x_getsingle("SELECT wallet_balance FROM ep_wallets WHERE utoken='$user_hash_token' LIMIT 1","ep_wallets WHERE utoken='$user_hash_token' LIMIT 1","wallet_balance");// current balance
			
			// checking for sufficient balance
			if($curbal > $total){
				
				$newbalance = $curbal - $total;	// New Balance after deduction
				$py = strtoupper(md5($orderid.$ordtoken.$userid.$email))."-".str_shuffle(DATE("YmdHis").$userid); // payment id for wallet transaction debits
				
				if((x_count("final_checkout","order_id='$orderid' AND product_token='$ordtoken' AND payment_status='1' AND order_status='1' LIMIT 1") > 0) && (x_count("order_placed","order_id='$orderid' AND product_token='$ordtoken' AND status='1' LIMIT 1") > 0) && (x_count("payment_details","order_id='$orderid' AND product_token='$ordtoken' AND status='1' LIMIT 1") > 0)){
					?>
						 <script>
							showalert("Duplicate Transaction Detected!");
						 </script>
					<?php
					}else{
						
						x_updated("order_placed","order_id='$orderid' AND product_token='$ordtoken'","status='1'","","<script>showalert('Failed to update order placed')</script>");
				
						x_updated("final_checkout","order_id='$orderid' AND product_token='$ordtoken'","payment_status='1',order_status='1',payment_id='$py',payment_medium='wallet',shipping_fee='$shipfee',service_fee='$servfee',shopped_amount='$shopped_amt',total_amount='$total'","","<script>showalert('Failed to update order placed')</script>");
						
						x_updated("payment_details","order_id='$orderid' AND product_token='$ordtoken'","status='1',payment_id='$py',paid_on='$timer'","","<script>showalert('Failed to update order placed');</script>");
						
						x_updated("ep_wallets","utoken='$user_hash_token'","wallet_balance='$newbalance'","<script>finalizeDeal();</script>","<script>showalert('Failed to update wallet!');</script>");
					
						// unset session cart
						unset($_SESSION["shopping_cart"]);
						unset($_SESSION["XELOW_COMMERCE_ORDER_ID"]);
						unset($_SESSION["XELOW_COMMERCE_ORDER_TOKEN"]);
						unset($_SESSION["EP_CUB_CARTEDIT"]);
						
					}
		
			}else{	
				$tbal = number_format($total-$curbal,2); // Amount left top-up
				 ?>
				 <script>
				 showalert("Insufficient wallet balance! Top-up NGN <?php echo $tbal;?>");
				 </script>
				 <?php
			}
			
		}else{
			?>
				 <script>
				 showalert("Invalid current user!");
				 </script>
			 <?php
		}
	}
	
}else{
	?>
		 <script>
		 showalert("Hacks Detected!");
		 </script>
 <?php
}
?>
