<?php
if(x_validatesession("shopping_cart")){
foreach(x_session("shopping_cart") as $keys => $values)
	{
		$quantity[] = $values["product_quantity"];
    }
	$total_array =  array_sum($quantity);
	
		if($total_array > 0){
			
		}else{
			finish("./","Your cart is empty");
			exit();
		}
		
}else{
	//echo "0";
	finish("./","Your cart is empty");
	
	}
	?>