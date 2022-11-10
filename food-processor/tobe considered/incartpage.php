<?php include_once("headtopper.php");?>
<title>Mercy City Online Shopping Platform - Place order for all your spiritual Items and get it delivered to your doorstep in any country around the Globe</title>
 <?php include_once("headerbase.php");?>


<?php include_once("navbarboss.php");?>


<?php
// validating cart system started
include_once("cartvalidator.php");
// validating cart system started
?>
 
<section style="display:block;" class="features5 cid-rAFhMSDNfo" id="features5-6">
    
    <div class="container">
        <div class="row">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3 class="stylecheck"><font class="itemstyle">
<?php if(x_validatesession("shopping_cart")){
foreach(x_session("shopping_cart") as $keys => $values)
	{
		$quantityp[] = $values["product_quantity"];
    }
	$getit = array_sum($quantityp);
	if($getit > 1){
		echo $getit." items are ";
	}else{
		echo $getit." item is ";
	}

}else{echo "0 item is ";}?></font> in cart</h3>
		
		<div class="logmsg"></div>
		<div id="cart_details"></div>
	<?php 
	if(x_validatesession("shopping_cart")){
		foreach(x_session("shopping_cart") as $keys => $values)
			{
				$qc[] = $values["product_quantity"];
			}
			$getitnow = array_sum($qc);
	
?>
<div class="alert alert-info alert-dismissible changbase" role="alert"><b>NOTE &nbsp;&nbsp;:</b> &nbsp;&nbsp;<i class="fa fa-plane fa-1x"></i> Shipping fees is not included <span class="fa fa-close pull-right closeboss"></span></div>
<button onclick="parent.location='./'" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> &nbsp;Continue Shopping</button>
<button onclick="verifychanges()" class="btn btn-sm btn-success"><i class="fa fa-credit-card"></i> &nbsp;Proceed to checkout</button>
<script type="text/javascript">
$(document).ready(function(){
$(".closeboss").click(function(){
	$(".changbase").hide("slow");
});	
});
function verifychanges(){
	var openwin = confirm("Are you sure you want to proceed? clicking ok means you are ready to make payment and no more modification");
	if(openwin == true){
		window.location="registration";
		return true;
	}else{
		return false;
	}
}
</script>
<?php
		}else{
			
		}
?>
	</div>
		
		</div>
	</div>

</section>


<script src="loaddatabank.js" type="text/javascript"></script>
<script>load_cart_data()</script>

  <?php
  include_once("footer.php");
  include_once("footscript.php");
  ?>