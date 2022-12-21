<?php
include_once("../finishit.php");
xstart("0");
if(x_validatesession("XELOW_PAGE_TOKER") || x_validatesession("XCAPE_HACKS")){
	 
	 function x_convert($value){
		 if($value > 0){
			 return number_format($value);
		 }else{
			 return number_format($value,2);
		 }
	 }
	 
$total_price = 0;
$total_item = 0;
$total_incart =0;

$output = '
<div class="table-responsive" style="opacity:0.9;font-size:9pt;font-weight:bold;margin-top:0pt;height:;" id="order_table">
	<table class="table bg-light table-bordered table-striped">
		<tr>
            <th>NO.</th>
			<!---<th>STOCK PHOTO</th>--->
			<th>STOCK NAME (QTY)</th>
            <!----<th>QUANTITY</th>--->
            <th>UNIT PRICE</th>
            <th>TOTAL</th>
            <!---<th>ACTION</th>--->
        </tr>
';
if(x_validatesession("shopping_cart"))
{
	$countme = 0;
	foreach(x_session("shopping_cart") as $keys => $values)
	{
		$countme++;
	$product_id = x_clean($values["product_id"]);
	$product_quantity = x_clean($values["product_quantity"]);
	
	$prod_quantity[] = $values["product_quantity"];
	
	$product_name = x_clean($values["product_name"]);
	$product_price = x_clean($values["product_price"]);
	
	$product_image = x_clean($values["product_image"]);
	
	$formatted_product_price = "NGN ".x_convert($product_price); 
	
	$totalamount = $product_quantity * $product_price;
	$formatted_amount = "NGN ".x_convert($totalamount);
	
		$output .= "
	<tr>
			<td><!---<img src='$product_image' class='img-fluid' style='height:;width:90px;'/>--->$countme</td>
			<td><img src='$product_image' class='img-fluid' style='height:;width:90px;'/>$product_name ($product_quantity)</td>
			<!----<td>
			<input class='form-control' disabled type='number' min='1' max='100' id='changequantity' value='$product_quantity' style='width:80px;float:left;'/>---->
			
			
			</td>
			<td>$formatted_product_price</td>
			<td>$formatted_amount</td>
			<!---<td>
<button name='delete' class='btn btn-danger btn-sm deletemenow' id='$product_id'><i class='fa fa-trash'></i> &nbsp;</button>
			</td>--->
		</tr>
		";
		
		$total_price = $total_price + $totalamount;
		//$total_item = $total_item + 1;
		$total_item = array_sum($prod_quantity);
		$total_pay = "NGN ".x_convert($total_price);
	}
	
	$total_incart = array_sum($prod_quantity);
	$shipping_fee = 500;
	$service_fee = 100;
	$final_amount = x_convert($total_price + $shipping_fee + $service_fee);
	
	
	$output .= "
	 <tr>
	  <td colspan='4'>
		<h4 style='text-align:center;font-weight:bold'> TOTAL COST BREAKDOWN</h4>
	  </td>
	 </tr>
	  
	  <tr>
	  <td></td>
	  <td colspan='2'>SUB TOTAL ($total_item)</td>
	   
		<td><b>$total_pay</b></td>
		
	  </tr>
	  
	  <tr>
	  <td></td>
	  <td colspan='2'>SHIPPING FEES</td>
	   
		<td><b>NGN $shipping_fee</b></td>
		
	  </tr>
	  
	  <tr>
	  <td></td>
	  <td colspan='2'>SERVICE FEES</td>
	   
		<td><b>NGN $service_fee</b></td>
		
	  </tr>
	  
	  <tr style='color:green;text-transform:uppercase;'>
	  <td></td>
	  <td colspan='2'><h4 style='font-weight:bold;'>TOTAL DUE<h4></td>
	   
		<td><h4 style='font-weight:bold;'>NGN $final_amount</h4></td>
		
	  </tr>
	  ";
}
else
{
	$output .="
    <tr>
    	<td colspan='5' align='center'>
		<i class='fa fa-shopping-cart enlarg'></i><br/><br/>
    		Your Shopping Cart is Empty!
    	</td>
    </tr>";
}
$output .= "</table></div>";
?>

<?php
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
