<?php
include_once("../finishit.php");
xstart("0");
if(x_validatesession("XCAPE_HACKS")){
	
$total_price = 0;
$total_item = 0;
$total_incart=0;

$output = '
<div class="table-responsive" style="opacity:0.9;font-size:9pt;font-weight:bold;margin-top:0pt;height:;" id="order_table">
	<table class="table bg-light table-bordered table-striped">
		<tr>
            <th width="">STOCK PHOTO</th>
			<th width="">STOCK NAME</th>
            <th width="">QUANTITY</th>
            <th width="">UNIT PRICE</th>
            <th width="">TOTAL</th>
            <th width="">ACTION</th>
        </tr>
';
if(x_validatesession("shopping_cart"))
{
	foreach(x_session("shopping_cart") as $keys => $values)
	{
	$product_id = x_clean($values["product_id"]);
	$product_quantity = x_clean($values["product_quantity"]);
	
	$prod_quantity[] = $values["product_quantity"];
	
	$product_name = x_clean($values["product_name"]);
	$product_price = x_clean($values["product_price"]);
	
	$product_image = x_clean($values["product_image"]);
	
	$formatted_product_price = "NGN ".number_format($product_price); 
	
	$totalamount = $product_quantity * $product_price;
	$formatted_amount = "NGN ".number_format($totalamount);
	
		$output .= "
		<tr>
			<td><img src='$product_image' class='img-fluid' style='height:;width:90px;'/></td>
			<td>$product_name</td>
			<td>
			
			<button id='$product_id' class='btn btn-success btn-sm plus-change'  style='float:left;margin:2pt;height:50px;'>&plus;</button>
			 
			<input class='form-control' type='text' id='quantity$product_id' value='$product_quantity' style='width:70px;float:left;margin-top:3pt;height:40px;'/>
			
			<button id='$product_id' class='btn btn-success btn-sm minus-change'  style='float:left;margin:2pt;height:50px;font-weight:bold;'>&minus;</button>
			
			<input type='hidden' value='$product_name' id='stockname$product_id'/>
			<input type='hidden' value='$product_image' id='product_image$product_id'/>
			<input type='hidden' value='$product_price' id='sellingprice$product_id'/>
			
			</td>
			<td>$formatted_product_price</td>
			<td>$formatted_amount</td>
			<td>
<button name='delete' class='btn btn-danger btn-sm deletemenow' id='$product_id'><i class='fa fa-trash'></i> &nbsp;</button>
			</td>
		</tr>
		";
		
		$total_price = $total_price + $totalamount;
		$total_item = $total_item + 1;
		$total_pay = "NGN ".number_format($total_price);
	}
	
	$total_incart = array_sum($prod_quantity);
	
	$output .= "
	  <tr>
	    <td></td>
		<td colspan='3'><font style='font-size:15pt;'>TOTAL</font></td>
		<td><font style='font-size:15pt;'><b>$total_pay</b></font></td>
		<td>&nbsp;&nbsp;&nbsp;<b>$total_incart</b> item(s) in-cart<br/>
		<button name='clear' class='btn btn-warning btn-sm' id='clear_cart'><i class='fa fa-trash'></i> &nbsp;Clear all</button>
		</td>
	  </tr>";
}
else
{
	$output .="
    <tr>
    	<td colspan='6' align='center'>
		<i class='fa fa-shopping-cart enlarg'></i><br/><br/>
    		Your Shopping Cart is Empty!
    	</td>
    </tr>";
}
$output .= "</table></div>";

$data = array(
	'cart_details'		=>	$output,
	'total_price'		=> ''. number_format($total_price, 2),
	'total_item'		=>	$total_incart
);

echo json_encode($data);

	
}else{
	?>
	<div class="alert alert-warning alert-dismissible" role="alert">
	Invalid Session Parameter Detected
	</div>
	<?php
}


?>
