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
				finish("food-processor/final_checkout_n","0");
			}
		}else{
			finish("./","Cart empty!");
		}
		
}else{
	//finish("./","0");
	finish("manageProfile/manpage","0");
	}
?>