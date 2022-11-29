<?php
	$pageToken = md5(rand());
	include_once("../finishit.php");
	include_once("../siteinfo.php");
	xstart("0");
	//include_once("../refcoder.php");
	if(x_count("portalmode","status='offline' AND id='1' LIMIT 1") > 0){

		finish("../notify/maintenance","Access denied!");
		exit();
	}
	// Redirection from Homepage Handler

		//include("pageRedirection.php");
		
	// Handling session hacks

	   include("../session_hacks_bypass.php");
	   
	// Session Cubbing going back to previous page 
	
	if(x_validatesession("shopping_cart") && x_validatesession("ER_ID_2022_VI")){// checking if cart not empty and if session is active
			if(!x_validatesession("EP_CUB_CARTEDIT")){
				$_SESSION["EP_CUB_CARTEDIT"] = sha1("yes".DATE("YmdHis"));
			}
	}

?>

<!DOCTYPE html>
<html>
<head>
<?php include_once("headPart.php");?>
<link rel="stylesheet" href="../css/font-awesome.min.css"/>
<link rel="stylesheet" href="../css/Toast.min.css"/>
<link rel="stylesheet" href="../css/toastify.min.css"/>
</head>
<body>
  
<?php include_once("lightmenu.php");?>

<?php 
//validation for logon users
if(!isset($_SESSION["XELOW_COMMERCE_ORDER_ID"])){
	$tkon = sha1(uniqid()).md5(uniqid()).sha1(rand(10,10000));
finish("../loginAccount?hash=$tkon","Please register or login before you continue.");
exit();
}
$orderid = x_clean($_SESSION["XELOW_COMMERCE_ORDER_ID"]);
$token = x_clean($_SESSION["XELOW_COMMERCE_ORDER_TOKEN"]);
$timer = x_curtime("0","1");
?>
 



<section style="background-attachment:fixed;margin-top:0px;" data-bs-version="5.1" class="header5 cid-tfrmEfarwJ" id="header5-6">
    
    <div class="container">
	
        <div class="row">
		
		<div class="col-12">
		
		<button style="margin-left:0pt;" class="btn btn-warning btn-sm">
		Hi, <b>&nbsp;<?php echo substr(strtoupper($_SESSION["XELOW_COMMERCE_NAME"]),0,23);?></b> 
		</button> 				
		<button class="btn btn-primary btn-sm">
		<b>ORDER ID : <font class="itemstyle"><?php echo $orderid ;?></font></b>
		</button>
		
		
		<div style="background-color:white;opacity:;padding:10px;text-transform:uppercase;font-size:10pt;font-weight:bold;color:green;">
			
				<?php 
				if(x_validatesession("shopping_cart")){
					
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

				}else{echo "0 item is ";}?>
			 in cart</div>
		
		<div id="cart_details"></div>
		

	<?php 
	if(x_validatesession("shopping_cart")){
		foreach(x_session("shopping_cart") as $keys => $values)
			{
				$quanti = $values["product_quantity"];
				$qprice = $values["product_price"];
				$total_it[] = $quanti * $qprice;
			}
			$totalnow = array_sum($total_it);
			$shipping_fee = 500;
			$service_fee = 100;
			$final_amount = $totalnow + $shipping_fee + $service_fee;
			
			// storing total amount in session
			if(!x_validatesession("FINAL_TOTAL_AMOUNT")){
				$_SESSION["FINAL_TOTAL_AMOUNT"] = $final_amount;
			}
			
?>

<button style="margin-left:0pt;" id="lastPayment" class="btn btn-sm btn-warning"><i class="fa fa-money"></i> &nbsp;&nbsp;PAY NOW => NGN <?php echo number_format($final_amount);?></button>

	<?php
	if(x_validatesession("ER_ID_2022_VI")){
		$token = x_clean($_SESSION["ER_TOKEN_2022_VI"]);
		$opt = "w";
		
		if(epbal($token,$opt) > $final_amount){
			 // Top-up button disable due to sufficient wallet balance		
			}else{
				?>
				
				<button style="margin-left:0pt;" class="btn btn-sm btn-primary top-upbtn"><i class="fa fa-credit-card"></i> &nbsp;&nbsp;TOP-UP WALLET</button>
				
				<div class="paymentModal">
					
					<div class="row">
						<div class="col">
							<button style="" class="pull-right btn-sm closePaymentModal">&times;</button>
						</div>
					</div>
					
					<?php include("paymentModal.php");?>
					
					
				</div>
				<?php
			}							
	}
	?>

	<div id="come"></div>


<?php
		}else{
			
		}
?>
	</div>
		
		</div>
	</div>
</section>

<section class="display-7" id="playsmart" style="padding: 0;align-items: center;justify-content: center;flex-wrap: wrap;    align-content: center;display: flex;position: relative;height: 4rem;"><a href="https://mobiri.se/" style="flex: 1 1;height: 4rem;position: absolute;width: 100%;z-index: 1;"><img alt="Mobirise" style="height: 4rem;" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="></a><p style="margin: 0;text-align: center;" class="display-7">EP &#8204;</p><a style="z-index:1" href="https://mobirise">EP</a></section>



<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script> 
 <script src="assets/smoothscroll/smooth-scroll.js"></script>
 <script src="assets/ytplayer/index.js"></script> 
 <script src="assets/dropdown/js/navbar-dropdown.js"></script> 
 <script src="assets/theme/js/script.js"></script>  
 <script type="text/javascript" src="js/access.js"></script>
 <script src="js/cartProcessor.js" type="text/javascript"></script>
 <script src="../js/Toast.min.js" type="text/javascript"></script>
 <script src="../js/toastify-js.js" type="text/javascript"></script>
 <script src="js/animate-page.js" type="text/javascript"></script>
 <?php
		// Handling display messages
		if(x_validateget("payments-msg")){
		?>
		<script>
			function displayMsg(){
				showalert("<?php echo urldecode(x_get('payments-msg'));?>");
				setTimeout(function(){
					window.location="final_checkout_n";
				},2000);
			}
		</script>
		<?php
		}
?>
 <script>
	
	  $(document).ready(function(){
		  
		  retrieve_balance(); // Getting balance
		  finalize_carting();// print current items in-cart
		 
		  $("#lastPayment").click(function(){// processing finals
			  load_all(); 
			  var token_this = "<?php echo $_SESSION['XCAPE_HACKS'];?>";
			  $.ajax({
				  url:"Finalize_cartcheckout",
				  method:"GET",
				  data:{total_final:<?php echo $final_amount;?>,shipping_fee:<?php echo $shipping_fee;?>,service_fee:<?php echo $service_fee;?>,shopped_amount:<?php echo $totalnow;?>,_token:token_this},
				  success:function(data){
					  $("#come").html(data);
					   retrieve_balance(); // Getting balance
				  },
				  error:function(){}
			  })
		  });
		  
		  //Change the cart content
		  $("#x_get_content").html("<i class='fa fa-dashboard'></i>&nbsp; Dashboard").attr("href","../manageProfile/manpage");
		  //hide social icons
		  $(".icons-menu").hide();
		  // General
		  $("#playsmart").hide();
		  $(".t-dates").hide();
		  $(".t-details").hide();
		  $(".t-amts").attr("class","col-12 t-amts");
		  
		  $(".closePaymentModal").click(function(){
			  $(".paymentModal").hide(500);
		  });
		  $(".top-upbtn").click(function(){
			  $(".paymentModal").show(500);
		  });
		  
		  
		  $("#payOptions3").click(function(){
			  $("#payButton").html("<i class='fa fa-inbox'></i> &nbsp;  ALERT US");
			  $("#payButton").attr("class","btn btn-danger btn-sm pull-right");
			  $(".t-amts").attr("class","col-lg-6 col-md-6 col-sm-12 col-xs-12 t-amts");
			  $(".t-dates").show(500);
			  $(".t-details").show(500);
			  $(".listBanks").toggle(500);
			  $("#top-upDate").attr("required","required");			
			  $("#top-descrip").attr("required","required");			
			  $(".blists").attr("required","required");
		  });
		  $("#payOptions1").click(function(){
			  $("#payButton").html("<i class='fa fa-cc-mastercard'></i> &nbsp;  PAY");
			   $("#payButton").attr("class","btn btn-primary btn-sm pull-right");
			  $(".listBanks").hide(500);
			  $(".t-dates").hide();
			  $(".t-details").hide();
			  $(".t-amts").attr("class","col-12 t-amts");
			  $("#top-upDate").removeAttr("required");			
			  $("#top-descrip").removeAttr("required");			
			  $(".blists").removeAttr("required");
		  });
		  $("#payOptions2").click(function(){
			  $("#payButton").html("<i class='fa fa-cc-mastercard'></i> &nbsp;  PAY");
			  $("#payButton").attr("class","btn btn-primary btn-sm pull-right");
			  $(".listBanks").hide(500);
			  $(".t-dates").hide();
			  $(".t-details").hide();
			  $(".t-amts").attr("class","col-12 t-amts");
			  $("#top-upDate").removeAttr("required");			
			  $("#top-descrip").removeAttr("required");			
			  $(".blists").removeAttr("required");
		  });
		   displayMsg();
	  });
  </script>
  
</body>
</html>