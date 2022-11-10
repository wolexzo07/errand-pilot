<?php
include_once("../finishit.php");
xstart("0");
if(x_validatesession("XCAPE_HACKS") && x_validatepost("actionboss") ){
	
	//$_SESSION["shopping_cart"]
	
	if(xp("actionboss") == "add"){
	$product_id = xp("product_id");
	$product_quantity = xp("product_quantity");
	$product_name = xp("product_name");
	$product_price = xp("product_price");
	$product_image = xp("product_image");
		
		if(x_validatesession("shopping_cart"))
		{
			$is_available = 0;
			foreach(x_session("shopping_cart") as $keys => $values)
			{
				if($_SESSION["shopping_cart"][$keys]['product_id'] == $product_id)
				{
					$is_available++;
					$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $product_quantity;
				}
			}
			if($is_available == 0)
			{
				$item_array = array(
					'product_id'               =>     $product_id,  
					'product_name'             =>     $product_name,  
					'product_price'            =>     $product_price,  
					'product_quantity'         =>     $product_quantity,
					'product_image'			   =>	  $product_image
				);
				$_SESSION["shopping_cart"][] = $item_array;
			}
		}
		else
		{
			$item_array = array(
					'product_id'               =>     $product_id,  
					'product_name'             =>     $product_name,  
					'product_price'            =>     $product_price,  
					'product_quantity'         =>     $product_quantity,
					'product_image'			   =>	  $product_image
			);
			$_SESSION["shopping_cart"][] = $item_array;
		}
		
		
	}elseif(xp("actionboss") == "update-plus"){
	$product_id = xp("product_id");
	$product_quantity = xp("product_quantity");
	$product_name = xp("product_name");
	$product_price = xp("product_price");
	$product_image = xp("product_image");
		
		if(x_validatesession("shopping_cart"))
		{
			$is_available = 0;
			foreach(x_session("shopping_cart") as $keys => $values)
			{
				if($_SESSION["shopping_cart"][$keys]['product_id'] == $product_id)
				{
					$is_available++;
					$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $product_quantity;
				}
			}
			if($is_available == 0)
			{
				$item_array = array(
					'product_id'               =>     $product_id,  
					'product_name'             =>     $product_name,  
					'product_price'            =>     $product_price,  
					'product_quantity'         =>     $product_quantity,
					'product_image'			   =>	  $product_image
				);
				$_SESSION["shopping_cart"][] = $item_array;
			}
		}
		else
		{
			$item_array = array(
					'product_id'               =>     $product_id,  
					'product_name'             =>     $product_name,  
					'product_price'            =>     $product_price,  
					'product_quantity'         =>     $product_quantity,
					'product_image'			   =>	  $product_image
			);
			$_SESSION["shopping_cart"][] = $item_array;
		}
		
		
	}elseif(xp("actionboss") == "update-minus"){
		
	$product_id = xp("product_id");
	$product_quantity = xp("product_quantity");
	$product_name = xp("product_name");
	$product_price = xp("product_price");
	$product_image = xp("product_image");
		
		if(x_validatesession("shopping_cart"))
		{
			$is_available = 0;
			foreach(x_session("shopping_cart") as $keys => $values)
			{
				if($_SESSION["shopping_cart"][$keys]['product_id'] == $product_id)
				{
					$is_available++;
					// handling the subtraction button
								
					if($_SESSION["shopping_cart"][$keys]['product_quantity'] > 1){
						$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] - $product_quantity;
					}
					
				}
			}
			if($is_available == 0)
			{
				$item_array = array(
					'product_id'               =>     $product_id,  
					'product_name'             =>     $product_name,  
					'product_price'            =>     $product_price,  
					'product_quantity'         =>     $product_quantity,
					'product_image'			   =>	  $product_image
				);
				$_SESSION["shopping_cart"][] = $item_array;
			}
		}
		else
		{
			$item_array = array(
					'product_id'               =>     $product_id,  
					'product_name'             =>     $product_name,  
					'product_price'            =>     $product_price,  
					'product_quantity'         =>     $product_quantity,
					'product_image'			   =>	  $product_image
			);
			$_SESSION["shopping_cart"][] = $item_array;
		}
		
		
	}elseif(xp("actionboss") == "remove"){
		$product_id = xp("product_id");
		foreach(x_session("shopping_cart") as $keys => $values)
		{
			if($values["product_id"] == $product_id)
			{
				unset($_SESSION["shopping_cart"][$keys]);
				
			}
		}
	}elseif(xp("actionboss") == "empty"){
	
		unset($_SESSION["shopping_cart"]);
		//echo "done clearing";
	}else{
		
		x_print("No valid button was clicked");
		
	}
	
}else{
	echo "Invalid parameter!";
}


?>