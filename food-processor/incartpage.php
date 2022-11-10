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
$_SESSION["XCAPE_HACKS"] = md5(rand());

// Redirection from Homepage Handler
//include("pageRedirection.php");
?>

<!DOCTYPE html>
<html>
<head>
<?php include_once("headPart.php");?>
<link rel="stylesheet" href="../css/font-awesome.min.css"/>
</head>
<body>
  
<?php include_once("lightmenu.php");?>

<section style="background-attachment:fixed;margin-top:0px;" data-bs-version="5.1" class="header5 cid-tfrmEfarwJ" id="header5-6">
    
    
    <div class="container-fluid" id="IncartSection">
	
     <div class="row">
		
		<div class="col-lg-1 col-md-1 col-12"></div>
		<div class="col-lg-10 col-md-10 col-12">
		
		<div class="stylecheck">
		<font class="itemstyle">
			<?php 
			include_once("cartvalidator.php");
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

				}else{echo "0 item is ";}
			?>
		</font> in cart</div>
		
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
		<div style="opacity:0.9;" class="alert alert-info alert-dismissible changbase" role="alert">
		   <b>NOTE &nbsp;&nbsp;:</b> &nbsp;&nbsp;<i class="fa fa-plane fa-1x"></i> Shipping fees is not included <span class="fa fa-close pull-right closeboss"></span>
		</div>
		
		<button onclick="parent.location='./?pageToken=52ae104d91f749e0ab6f3bebf553d296'" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> &nbsp;Continue Shopping</button>
		
		<button onclick="verifychanges()" class="btn btn-sm btn-success"><i class="fa fa-credit-card"></i> &nbsp;Proceed to checkout</button>

		<?php
				}else{
					
				}
		?>
		
	</div>
		<div class="col-lg-1 col-md-1 col-12"></div>
		</div>
    </div>
	
</section>


<section class="display-7" id="playsmart" style="padding: 0;align-items: center;justify-content: center;flex-wrap: wrap;    align-content: center;display: flex;position: relative;height: 4rem;"><a href="https://mobiri.se/" style="flex: 1 1;height: 4rem;position: absolute;width: 100%;z-index: 1;"><img alt="Mobirise" style="height: 4rem;" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="></a><p style="margin: 0;text-align: center;" class="display-7">xelowgc &#8204;</p><a style="z-index:1" href="https://mobirise.com/html-builder.html">Xelowgc</a></section>



<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script> 
 <script src="assets/smoothscroll/smooth-scroll.js"></script>
 <script src="assets/ytplayer/index.js"></script> 
 <script src="assets/dropdown/js/navbar-dropdown.js"></script> 
 <script src="assets/theme/js/script.js"></script>  
 
 <script src="js/cartProcessor.js" type="text/javascript"></script>
 
 <script>load_cart_data()</script>
  <script>
	  $(document).ready(function(){
		  $("#playsmart").hide();
		  
		  $(".closeboss").click(function(){
		  $(".changbase").hide("slow");
			});	
	  });
	  function verifychanges(){
		var openwin = confirm("YOU CANNOT EDIT YOUR CART AFTER CLICKING OK");
		if(openwin == true){
			window.location="../createAccount?cmd=CompleteFoodOrder";
			return true;
		}else{
			return false;
		}
	}
  </script>
  
</body>
</html>