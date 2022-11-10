<?php
	include("finishit.php");
	xstart(0);
	if(x_validatesession("shopping_cart") || x_validatesession("ER_ID_2022_VI")){
	
		if(x_validatesession("shopping_cart")){
				unset($_SESSION["shopping_cart"]);		
				unset($_SESSION["XELOW_COMMERCE_ORDER_ID"]);
				unset($_SESSION["XELOW_COMMERCE_ORDER_TOKEN"]); 
		}

		if(x_validatesession("ER_ID_2022_VI")){
				unset($_SESSION["ER_ID_2022_VI"]);
				unset($_SESSION["ER_NAME_2022_VI"]);
				unset($_SESSION["ER_EMAIL_2022_VI"]);
				unset($_SESSION["ER_MOBILE_2022_VI"]);
				unset($_SESSION["ER_TOKEN_2022_VI"]);
				unset($_SESSION["ER_REF_2022_VI"]);
				
				unset($_SESSION["XELOW_COMMERCE_NAME"]);
				unset($_SESSION["XELOW_COMMERCE_EMAIL"]);
				unset($_SESSION["XELOW_COMMERCE_USER_ID"]);
				unset($_SESSION["XELOW_COMMERCE_ADDRESS"]);
			
		}
		
		
		
		finish("./","You are logged successfully!");
	}

?>