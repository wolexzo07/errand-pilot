<?php
session_start();
require("../finishit.php");
if(!x_validatesession("XELOW_COMMERCE_ORDER_ID")){
x_print("<p>Session inaction! Please login or register before continue</p>");
exit();
}else{
	
	if(x_validatesession("shopping_cart"))
			{
				
				//getting parameters ready
				
				$orderid = x_clean($_SESSION["XELOW_COMMERCE_ORDER_ID"]);
				$token = x_clean($_SESSION["XELOW_COMMERCE_ORDER_TOKEN"]);
				$timer = x_curtime("0","1");
				$fname = x_clean($_SESSION["XELOW_COMMERCE_NAME"]);
				$useremail = x_clean($_SESSION["XELOW_COMMERCE_EMAIL"]);
				$userid = x_clean($_SESSION["XELOW_COMMERCE_USER_ID"]);
				
				$address = x_clean($_SESSION["XELOW_COMMERCE_ADDRESS"]);
				
				//create order table
				
				$createe = x_dbtab("payment_details","
				user_id VARCHAR(255) NOT NULL,
				order_id VARCHAR(255) NOT NULL,
				status ENUM('0','1') NOT NULL,
				payment_id VARCHAR(200) NOT NULL,
				amount_paid VARCHAR(200) NOT NULL,
				paid_on VARCHAR(200) NOT NULL,
				product_token TEXT NOT NULL
				","MYISAM");
				
				
				$create = x_dbtab("order_placed","
				user_id VARCHAR(255) NOT NULL,
				order_id VARCHAR(255) NOT NULL,
				status ENUM('0','1') NOT NULL,
				product_id INT NOT NULL,
				product_name VARCHAR(200) NOT NULL,
				product_quantity INT NOT NULL,
				unit_price DOUBLE NOT NULL,
				total_amount DOUBLE NOT NULL,
				discount DOUBLE NOT NULL,
				order_date VARCHAR(200) NOT NULL,
				product_token TEXT NOT NULL
				
				","MYISAM");
				
				$create_me = x_dbtab("final_checkout","
				user_id VARCHAR(200) NOT NULL,
				fullname VARCHAR(200) NOT NULL,
				address TEXT NOT NULL,
				order_id VARCHAR(255) NOT NULL,
				total_incart DOUBLE NOT NULL,
				payment_status ENUM('0','1') NOT NULL,
				payment_id VARCHAR(200) NOT NULL,
				payment_medium ENUM('paystack','bank_transfer','pay_on_delivery') NOT NULL,
				order_status ENUM('0','1') NOT NULL,
				processing_status ENUM('0','1') NOT NULL,
				processing_date VARCHAR(255) NOT NULL,
				shipping_status ENUM('0','1') NOT NULL,
				shipping_date VARCHAR(255) NOT NULL,
				courier_company ENUM('ups','dhl','ems','fedex','tnt') NOT NULL,
				tracking_no VARCHAR(255) NOT NULL,
				delivery_status ENUM('0','1') NOT NULL,
				delivery_date VARCHAR(255) NOT NULL,
				total_amount DOUBLE NOT NULL,
				discount DOUBLE NOT NULL,
				order_date VARCHAR(200) NOT NULL,
				product_token TEXT NOT NULL
				
				","MYISAM");
				
				if(!$create && !$create_me && !$createe){
					finish("Failed to dumb tables","0");
					exit();
				}
				$counting = 0;
				
				if((x_count("final_checkout","order_id='$orderid' AND product_token='$token' LIMIT 1") > 0) || (x_count("order_placed","order_id='$orderid' AND product_token='$token' LIMIT 1") > 0)){
					//x_print("Order record in the database already");
				}else{
				
				
				foreach($_SESSION["shopping_cart"] as $keys => $values)
				{
					$counting++;
				//x-modified started
				
				$product_id = x_clean($values["product_id"]);
				$product_name = x_clean($values["product_name"]);
				$product_quantity = x_clean($values["product_quantity"]);
				$total = x_clean($values["product_quantity"] * $values["product_price"]);
				$product_price = x_clean($values["product_price"]);
				
				$total_last[] = $total;
				$totalincart[] = $product_quantity;
			//initializing transaction
			x_insert("user_id,unit_price,order_id,product_token,product_id,product_name,product_quantity,total_amount,order_date","order_placed","'$userid','$product_price','$orderid','$token','$product_id','$product_name','$product_quantity','$total','$timer'","&nbsp;","failed @ #$counting");

				//x-modified ended
				}
		$final_total = array_sum($total_last);
		$final_cart = array_sum($totalincart);
		//uploading payment details
		
		x_insert("user_id,order_id,amount_paid,product_token","payment_details","'$userid','$orderid','$final_total','$token'","&nbsp;","failed to upload payment @ #$counting");
		
		//finalizing transaction
		
		x_insert("total_incart,address,order_id,user_id,fullname,shopped_amount,order_date,product_token","final_checkout","'$final_cart','$address','$orderid','$userid','$fname','$final_total','$timer','$token'","&nbsp;","failed final_checkout @ #$counting");	
					}
				
			}else{
				x_print("cart is empty!");
			}
	
}


?>
