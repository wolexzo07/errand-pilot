<?php include_once("headtopper.php");?>
<title>Mercy City Online Shopping Platform - Place order for all your spiritual Items and get it delivered to your doorstep in any country around the Globe</title>
 <?php include_once("headerbase.php");?>


<?php include_once("navbarboss.php");?>

<?php 
//validation for logon users
if(!isset($_SESSION["XELOW_COMMERCE_ORDER_ID"])){
finish("registration","Please register or login before you continue.");
exit();
}
$orderid = x_clean($_SESSION["XELOW_COMMERCE_ORDER_ID"]);
$token = x_clean($_SESSION["XELOW_COMMERCE_ORDER_TOKEN"]);
$timer = x_curtime("0","1");
?>
 
<section style="display:block;padding-top:20px;" class="features5 cid-rAFhMSDNfo" id="features5-6">
    
    <div class="container">
        <div class="row">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
		<div style="padding:10pt;opacity:0.9;" class="alert alert-warning">
		
		<button class="btn btn-success btn-sm"><i class="fa fa-user"></i> &nbsp;Welcome <b>&nbsp;<?php echo $_SESSION["XELOW_COMMERCE_NAME"];?></b> </button> | <a href="#" onclick="parent.location='logout'" class="btn btn-success btn-sm" style="display:none;"><i class="fa fa-sign-out"></i> Logout</a>
		
		<button class="btn btn-success btn-sm"><i class="fa fa-shopping-cart"></i> &nbsp;
		<b>ORDER ID : <font class="itemstyle"><?php echo $orderid ;?></font></b></button>
		
		</div>
		
		<br/>
		
		
		<div class="logmsg"></div>
		<div id="cart_details"></div>
		<p class="stylecheck"><font class="itemstyle">
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

}else{echo "0 item is ";}?></font> in cart</p>

	<?php 
	if(x_validatesession("shopping_cart")){
		foreach(x_session("shopping_cart") as $keys => $values)
			{
				$quanti = $values["product_quantity"];
				$qprice = $values["product_price"];
				$total_it[] = $quanti * $qprice;
			}
			$totalnow = array_sum($total_it);
	
?>

<!---<button onclick="parent.location='./'" class="btn btn-sm btn-warning ml-0"><i class="fa fa-arrow-left"></i> &nbsp;Return Home</button>-->
<button style="margin-left:0pt;" onclick="payWithPaystack()" class="btn btn-sm btn-success"><i class="fa fa-credit-card"></i> &nbsp;Click to make Payment</button>

	<script type="text/javascript" src="access.js"></script>
	<div id="come"></div>

<script src="https://js.paystack.co/v1/inline.js"></script>

<script type="text/javascript">
function payWithPaystack(){
		load_all();
        var handler = PaystackPop.setup({
        currency: 'NGN', //This can only be either NGN or USD
          key: 'pk_test_0c1df8f5dec4e3e57fe2bd2c69d1b79477485250',
          email: "<?php echo $_SESSION['XELOW_COMMERCE_EMAIL'];?>",
          amount: <?php echo $totalnow."00";?>, 
          ref: "<?php echo $_SESSION['XELOW_COMMERCE_ORDER_ID'];?>",
          metadata: {
             custom_fields: [
                {
                    display_name: "<?php echo $_SESSION['XELOW_COMMERCE_NAME'];?>",
                    variable_name: "<?php echo $_SESSION['XELOW_COMMERCE_EMAIL'];?>",
                    value: "<?php echo $_SESSION['XELOW_COMMERCE_EMAIL'];?>"
                }
             ]
          },
          callback: function(response){
             
    		  window.location="payment_verification?reference="+response.reference
          },
          onClose: function(){

          }
        });
        handler.openIframe();
      }
	  
function verifychanges(){
	var openwin = confirm("Are you ready to make payment now?");
	if(openwin == true){
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
<script>finalize_carting()</script>

  <?php
  include_once("footer.php");
  include_once("footscript.php");
  ?>