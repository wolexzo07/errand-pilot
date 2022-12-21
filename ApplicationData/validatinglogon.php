<?php
if(x_validatesession("shopping_cart")){
foreach(x_session("shopping_cart") as $keys => $values)
	{
		$quantity[] = $values["product_quantity"];
    }
	$total_array =  array_sum($quantity);
	
		if($total_array > 0){
			if(isset($commp)){
				finish("final_checkout_n","0");
			}else{
				finish("ApplicationData/final_checkout_n","0");
			}
		}else{
			finish("./","Cart empty!");
		}
		
}else{
	if(isset($_SESSION["XCAPE_HACKS"])){
		$token = $_SESSION["XCAPE_HACKS"];
		finish("manageProfile/ApplicationDashboard?hash=$token","0");
	}else{
		finish("manageProfile/ApplicationDashboard","0");
	}
	
	}
?>