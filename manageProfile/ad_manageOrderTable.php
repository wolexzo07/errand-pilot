<?php
include("adminpagevalidator.php");
include("../siteinfo.php");
if(x_validateget("tranxToken") && x_validateget("cmd") && x_validateget("tranxId") && x_validatesession("ER_ID_2022_VI")){
	
	$tid = xg("tranxId") ;// order id
	$token = xg("tranxToken"); // order token
	$cmd = xg("cmd") ; // order token
	
	// validating data existing
	
	if(x_count("order_Placed","id='$tid' AND product_token='$token' LIMIT 1") > 0){
		
		$timer = x_curtime(0,1);$os=xos();$br=xbr();$ip=xip();
		
		$cmdoption = array("fulfil","ship","deliver","cancel");
		
		$user_id = x_getsingleupdate("order_placed","user_id","id='$tid' AND product_token='$token'"); // getting userid for order
		
		$item_name = x_getsingleupdate("order_placed","product_name","id='$tid' AND product_token='$token'"); // getting item name
		
		$order_id = x_getsingleupdate("order_placed","order_id","id='$tid' AND product_token='$token'"); // getting item order identity
		
		$item_id = x_getsingleupdate("order_placed","product_id","id='$tid' AND product_token='$token'"); // getting item id
		
		$item_qu = x_getsingleupdate("order_placed","product_quantity","id='$tid' AND product_token='$token'"); // getting item quantity
		
		$item_unit = x_getsingleupdate("order_placed","unit_price","id='$tid' AND product_token='$token'"); // Item unit price
		
		$item_tamount = x_getsingleupdate("order_placed","total_amount","id='$tid' AND product_token='$token'"); // Item total amount
		
		$item_address = x_getsingleupdate("final_checkout","address","order_id='$order_id' AND product_token='$token'"); // Item delivery address
		
		$item_photo = x_getsingleupdate("stockmanager","second_image","id='$item_id'"); // getting item image
		$courier = x_getsingleupdate("courier_company","companyname","status='1'"); // getting item image
		
				// fetching user details
				if(x_count("manageaccount","id='$user_id' LIMIT 1") > 0){// validating profile detail
						foreach(x_select("0","manageaccount","id='$user_id'","1","id") as $bk){
							$name = $bk["name"];
							$email = $bk["email"];
							$gender = $bk["gender"];
							$mobile = $bk["mobile"];
							$userphoto = $bk["user_photo"];
							//$utoken = eptoks($bk["token"]);
						}
					}else{$name = "";$email = "";$gender = "";$mobile = "";//$utoken="";
					}
					
		// validating options
		if(in_array($cmd,$cmdoption)){
			
			if($cmd == "fulfil"){ // handling fulfilment of items
				$title = "ONE FROM YOUR ORDER ($order_id) WAS FULFILLED";
				$cinside = "
				<table style='margin-top:10pt;' cellpadding='15px' cellspacing='2px' border='1px'>
				<tr>
				<td>Order No:</td>
				<td><b>$order_id</b></td>
				</tr>
				<tr>
				<td>Item Name:</td>
				<td><b>$item_name</b></td>
				</tr>
				<tr>
				<td>Quantity:</td>
				<td><b>$item_qu</b></td>
				</tr>
				<tr>
				<td>Unit Price:</td>
				<td><b>NGN $item_unit</b></td>
				</tr>
				<tr>
				<td>Total Amount:</td>
				<td><b>NGN $item_tamount</b></td>
				</tr>
				<tr>
				<td>Delivery Address:</td>
				<td><b>$item_address</b></td>
				</tr>
				</table>
				";
				$cbegin = "Hi <b>$name</b>,<br/><br/>
				we are delighted to inform you that one of your order has been fulfilled. Expect delivery soon.<br/><br/>Order details below:<br/><br/>";
				
				$content = "
				$cbegin
				<img src='https://$siteurl/manageProfile/$item_photo' style='width:230px'/>
				$cinside
				";
				$user_email = $email;

				$message = "$cbegin
				<img src='$item_photo' style='width:230px'/>
				$cinside";    
				$userid = $user_id;
				$category="fulfil";
				
				//ep_notifier($type,$title,$message,$userid,$category)
				
				$fulfil_status = x_getsingleupdate("order_placed","processing_status","id='$tid' AND product_token='$token'"); // Item fulfillment status
				
				$fulfil_date = x_getsingleupdate("order_placed","processing_date","id='$tid' AND product_token='$token'"); // Item fulfillment date
				
				if($fulfil_status == "1"){
				// checking for duplicate fulfilment of item
				echo "<p class='alert-txt'>Item (<b>$item_name</b>) was fulfilled before @ <b>$fulfil_date</b>!</p>";
				}
				
				if($fulfil_status == "0"){
					
					// send notifications to user dashboard
					ep_notifier("p","$title","$message","$user_id","fulfil");
					
					// Send email to the user
					ep_mailer($title,$content,$user_email); 
					
					// order processing status
					x_updated("order_placed","id='$tid' AND product_token='$token'","processing_date='$timer',processing_status='1'","<p class='alert-txt'>Item (<b>$item_name</b>) was fulfilled successfully!</p>","<p class='alert-txt'>Failed to fulfill Item!</p>");
				}
				
				
			}elseif($cmd == "ship"){// handling shipment of items
			
				$track_id = strtoupper(uniqid()).$user_id.str_shuffle(DATE("YmdHis")); // Trackin No
				$title = "ONE FROM YOUR ORDER ($order_id) HAS BEEN SHIPPED";
				
				$cinside = "
				<table style='margin-top:10pt;' cellpadding='15px' cellspacing='2px' border='1px'>
				<tr>
				<td>Tracking No:</td>
				<td><b>$track_id</b></td>
				</tr>
				<tr>
				<td>Order No:</td>
				<td><b>$order_id</b></td>
				</tr>
				<tr>
				<td>Item Name:</td>
				<td><b>$item_name</b></td>
				</tr>
				<tr>
				<td>Quantity:</td>
				<td><b>$item_qu</b></td>
				</tr>
				<tr>
				<td>Unit Price:</td>
				<td><b>NGN $item_unit</b></td>
				</tr>
				<tr>
				<td>Total Amount:</td>
				<td><b>NGN $item_tamount</b></td>
				</tr>
				<tr>
				<td>Delivery Address:</td>
				<td><b>$item_address</b></td>
				</tr>
				</table>
				";
				$cbegin = "Hi <b>$name</b>,<br/><br/>
				we are delighted to inform you that one of your order has been shipped. Expect delivery soon.<br/><br/>Order details below:<br/><br/>";
				
				$content = "
				$cbegin
				<img src='https://$siteurl/manageProfile/$item_photo' style='width:230px'/>
				$cinside
				";
				$user_email = $email;

				$message = "$cbegin
				<img src='$item_photo' style='width:230px'/>
				$cinside";    
				$userid = $user_id;
				$category="ship";
				
				$fulfil_status = x_getsingleupdate("order_placed","processing_status","id='$tid' AND product_token='$token'"); // Item total amount
				
				$ship_status = x_getsingleupdate("order_placed","shipping_status","id='$tid' AND product_token='$token'"); // Item shipping status
				
				$ship_date = x_getsingleupdate("order_placed","shipping_date","id='$tid' AND product_token='$token'"); // Item shipping date
				
				if($ship_status == "1"){
				// checking for duplicate fulfilment of item
				echo "<p class='alert-txt'>Item (<b>$item_name</b>) was shipped before @ <b>$ship_date</b>!</p>";
				}
				
				if($fulfil_status == "0"){
				// checking for fulfilment status of item before shipping
				echo "<p class='alert-txt'>Item (<b>$item_name</b>) must be fulfilled before shipping</b>!</p>";
				}
				
				if(($fulfil_status == "1") && ($ship_status == "0")){ // validating fulfil status
					
					// send notifications to user dashboard
					ep_notifier("p","$title","$message","$user_id","$category");
					
					// Send email to the user
					ep_mailer($title,$content,$user_email); 
					
					// updating shipping status
					x_updated("order_placed","id='$tid' AND product_token='$token'","shipping_date='$timer',shipping_status='1',courier_company='$courier',tracking_no='$track_id'","<p class='alert-txt'>Item (<b>$item_name</b>) was shipped successfully!</p>","<p class='alert-txt'>Failed to ship Item!</p>");
				}
				
			}elseif($cmd == "deliver"){ // handling delivery of items
				
				$title = "ONE FROM YOUR ORDER ($order_id) HAS BEEN DELIVERED";
				
				$cinside = "
				<table style='margin-top:10pt;' cellpadding='15px' cellspacing='2px' border='1px'>
				
				<tr>
				<td>Order No:</td>
				<td><b>$order_id</b></td>
				</tr>
				<tr>
				<td>Item Name:</td>
				<td><b>$item_name</b></td>
				</tr>
				<tr>
				<td>Quantity:</td>
				<td><b>$item_qu</b></td>
				</tr>
				<tr>
				<td>Unit Price:</td>
				<td><b>NGN $item_unit</b></td>
				</tr>
				<tr>
				<td>Total Amount:</td>
				<td><b>NGN $item_tamount</b></td>
				</tr>
				<tr>
				<td>Delivery Address:</td>
				<td><b>$item_address</b></td>
				</tr>
				</table>
				";
				$cbegin = "Hi <b>$name</b>,<br/><br/>
				we are delighted to inform you that one of your order has been delivered successfully.<br/><br/>Order details below:<br/><br/>";
				
				$content = "
				$cbegin
				<img src='https://$siteurl/manageProfile/$item_photo' style='width:230px'/>
				$cinside
				";
				$user_email = $email;

				$message = "$cbegin
				<img src='$item_photo' style='width:230px'/>
				$cinside";    
				$userid = $user_id;
				$category="deliver";
			
				$fulfil_status = x_getsingleupdate("order_placed","processing_status","id='$tid' AND product_token='$token'"); // Item total amount
				
				$ship_status = x_getsingleupdate("order_placed","shipping_status","id='$tid' AND product_token='$token'"); // Item shipping status
				
				$delivery_status = x_getsingleupdate("order_placed","delivery_status","id='$tid' AND product_token='$token'"); // Item shipping status
				
				$delivery_date = x_getsingleupdate("order_placed","delivery_date","id='$tid' AND product_token='$token'"); // Item shipping status
				
				
				if($fulfil_status == "0"){ // checking if item was fulfilled
				echo "<p class='alert-txt'>Item (<b>$item_name</b>) must be fulfilled before delivery</b>!</p>";
				}
				
				if($ship_status == "0"){ // checking if item was shipped
				echo "<p class='alert-txt'>Item (<b>$item_name</b>) must be shipped before delivery</b>!</p>";
				}
				
				if($delivery_status == "1"){ // checking if item was delivered
					echo "<p class='alert-txt'>Item (<b>$item_name</b>) was delivered already @ <b>$delivery_date</b>!</p>";
				}
				
				if(($fulfil_status == "1") && ($ship_status == "1") && ($delivery_status == "0")){
					// send notifications to user dashboard
					ep_notifier("p","$title","$message","$user_id","$category");
					
					// Send email to the user
					ep_mailer($title,$content,$user_email); 
					// Updating delivery status
					x_updated("order_placed","id='$tid' AND product_token='$token'","delivery_date='$timer',delivery_status='1'","<p class='alert-txt'>Item (<b>$item_name</b>) was Delivered successfully!</p>","<p class='alert-txt'>Failed to deliver Item!</p>");
				}
				
			}else{ // handling cancelling of items
				
				if(($fulfil_status == "0") && ($ship_status == "0") && ($delivery_status == "0")){
					// send notifications to user dashboard
					ep_notifier("p","$title","$message","$user_id","$category");
					
					// Send email to the user
					ep_mailer($title,$content,$user_email); 
					// Updating delivery status
					x_updated("order_placed","id='$tid' AND product_token='$token'","delivery_date='$timer',delivery_status='1'","<p class='alert-txt'>Item (<b>$item_name</b>) was Delivered successfully!</p>","<p class='alert-txt'>Failed to deliver Item!</p>");
				}
			}
			
		}else{
			echo "<p class='alert-txt'>Invalid option!</p>";
		}
		
	}else{
		echo "<p class='alert-txt'>Invalid ordered item!</p>";
	}
}?>