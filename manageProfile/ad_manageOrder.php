<?php
include("adminpagevalidator.php");
if(x_validateget("tranxToken") && x_validateget("cmd") && x_validateget("tranxId") && x_validatesession("ER_ID_2022_VI")){
	
	$tid = xg("tranxId"); // Order ID
	$trx_token = xg("tranxToken"); // Order token
	$cmd = xg("cmd"); //  options
	
	// checking for record existence in db
	if(x_count("final_checkout","id='$tid' AND product_token='$trx_token' LIMIT 1") > 0){
		
		if($cmd == "approve"){
		
		}elseif($cmd == "read"){// Readind data started
			?>
			<div class="Manual-Trx-Modal">
			
				<div class="row">
											
					<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
					<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

					<div class="card mt-4">
					<div class="card-header"><i class="fa fa-plus-circle"></i> ORDER DETAILS 
					<span style="font-size:20px;padding:0px;" class="pull-right btn closeMT-Modal">&times;
						</span>
					</div>
					<div style="border:0px;" class="card-body">

					<?php
					$oid = $tid;
					$ohash=$trx_token;
					foreach(x_select("0","final_checkout","id='$tid' AND product_token='$trx_token'","1","id") as $key){
					$id = $key["id"];
					$oid = $key["order_id"];$cat = $key["total_incart"];
					$pay = $key["payment_status"];$pid = $key["payment_id"];
					$pmed = $key["payment_medium"];$totalamt = $key["total_amount"];
					$order_date = $key["order_date"];$token = $key["product_token"];
					$add = $key["address"];
					
					$ship_status = $key["shipping_status"];$ship_date = $key["shipping_date"];
					$cc = $key["courier_company"];$trackno = $key["tracking_no"];
					
					$d_status = $key["delivery_status"];$d_date = $key["delivery_date"];
					//$cc = $key["courier_company"];$trackno = $key["tracking_no"];
					}
					
					?>
					<button class="btn btn-success ">No : <?php echo $oid;?></button>

						<?php
						$filer = "qrcoder/".sha1($oid).".png";
						if(file_exists($filer)){
							echo "<br/><br/><img src='$filer' src='img-responsive pull-right'/>";
						}else{
						x_qrcode($oid,$filer,"1");
						echo "<br/><br/><img src='$filer' src='img-responsive pull-right'/>";
						}
						?>
					<div class="card mt-4">
						<div class="card-header"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; Items Ordered listing</div>
						<div class="card-body">
						
							<div id="pageData"></div>
							<span class="flash"></span>
							
						</div>
					</div>	
					
					<div class="card mt-4">
					<div class="card-header"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; Items Ordered Details</div>
					<div class="card-body">
					
						<table class="table table-striped table-hover">

						<tr>
						<th>Payment Status</th><td><?php if($pay =="1"){echo "<font style='color:green;'><i class='fa fa-check-circle'></i> Paid</font>";}else{ echo "<i class='fa fa-minus'></i> Not Paid";}?></td>
						</tr>

						<tr style="color:purple;">
						<th>Amount Paid</th><td><?php echo "NGN ".number_format($totalamt,2);?></td>
						</tr>

						<tr>
						<th>Total Items</th><td><?php echo $cat;?></td>
						</tr>

						<tr>
						<th>Ordered On</th><td><?php echo $order_date;?></td>
						</tr>

						</table>

						<button onclick="alert('Inactive')" class="btn btn-success"><i class="fa fa-comment"></i> comment</button>
						<button onclick="alert('Inactive')" class="btn btn-primary"><i class="fa fa-credit-card"></i> Refund</button>
					</div>
					</div>
							
						
					<div class="card mt-4">
					<div class="card-header"><i class="fa fa-plane"></i>&nbsp;&nbsp; Shipping Details</div>
					<div class="card-body">
					
					<table class="table table-striped table-hover">

					<tr>
					<th>Shipping Status</th><td><?php if($ship_status =="1"){echo "<font style='color:green;'><i class='fa fa-check-circle'></i> Shipping in progress</font>";}else{ echo "<i class='fa fa-minus-circle'></i> Not Shipped";}?></td>
					</tr>

					<tr style="color:purple;">
					<th>Courier name</th><td><?php if($cc == ""){echo "Not available";}else{echo $cc;}?></td>
					</tr>

					<tr>
					<th>Tracking No</th><td><?php if($trackno == ""){echo "Not available";}else{echo $trackno;}?></td>
					</tr>

					<tr>
					<th>Shipping Date</th><td><?php if($ship_date == ""){echo "Not available";}else{echo $ship_date;}?></td>
					</tr>

					</table>
							
					</div>
					</div>
							
					<div class="card mt-4">
					<div class="card-header"><i class="fa fa-bus"></i>&nbsp;&nbsp; Delivery Details</div>
					<div class="card-body">
					
					<table class="table table-hover">

					<tr>
					<th>Delivery Status</th><td><?php if($d_status =="1"){echo "<font style='color:green;'><i class='fa fa-check-circle'></i> Item Delivered</font>";}else{ echo "<i class='fa fa-minus-circle'></i> Waiting for delivery";}?></td>
					</tr>

					<tr style="color:purple;">
					<th>Delivery date</th><td><?php if($d_date == ""){echo "Not available";}else{echo $d_date;}?></td>
					</tr>


					</table>
							
					</div>
					</div>

					</div>
					</div>

					</div>
					<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>						
						
			   </div>
			</div>
			<?php
		}elseif($cmd == "delete"){
			
			// initiate a wallet refund process
			$userid = x_getsingleupdate("final_checkout","user_id","id='$tid' AND product_token='$trx_token'"); // Getting user id
			$user_token = x_getsingleupdate("manageaccount","token","id='$userid'"); // Getting user id
			
			$total_am = x_getsingleupdate("final_checkout","total_amount","id='$tid' AND product_token='$trx_token'"); // Getting total amount
			
			$order_id = x_getsingleupdate("final_checkout","order_id","id='$tid' AND product_token='$trx_token'"); // Getting order id
			
			// Getting user current wallet balance
			$wallet_token = eptoks($user_token);
			$wallet_balance = x_getsingleupdate("ep_wallets","wallet_balance","utoken='$wallet_token'");
			
			$tbalance = $wallet_balance + $total_am;
			
			
			// creating record for all reversed money
			
			$create = x_dbtab("reversed_funds","
			userid TEXT NOT NULL,
			reversedamount DOUBLE NOT NULL,
			orderid TEXT NOT NULL,
			ordertoken TEXT NOT NULL,
			reverseddate VARCHAR(255) NOT NULL,
			status ENUM('0','1') NOT NULL
			","innodb");
			$timer = x_curtime("0","1");
	
			
			// delete from order placed db
			
			if(x_count("order_placed","order_id='$order_id' AND product_token='$trx_token' LIMIT 1") > 0){
				
			  if($create){ // creating funds reversal table
				  
				// checking for multiple reversal
				
				if(x_count("reversed_funds","ordertoken='$trx_token' AND orderid='$order_id' LIMIT 1") > 0){
					echo "<p class='alert-text'>Duplicate transaction! Funds can not be reversed multiple times.</p>";
					exit();
				}else{
					
					// updating user wallet balance
					
					x_updated("ep_wallets","utoken='$wallet_token'","wallet_balance='$tbalance'","<p class='alert-text'>Money reversed back to user's wallet!</p>","<p class='alert-text'>Failed to reversed money back to wallet!</p>");
					
					// creating record for funds reversal
					
					x_insert("ordertoken,userid,reversedamount,orderid,reverseddate,status","reversed_funds","'$trx_token','$user_token','$total_am','$order_id','$timer','1'","<p class='alert-text'>Funds reversal record was captured !</p>","<p class='alert-text'>Failed to insert funds reversal record!</p>");
				}	
			}
				// deleting all data for individual cart items
				
				x_del("order_placed","order_id='$order_id' AND product_token='$trx_token'","<p class='alert-text'>Orders data was deleted successfully!</p>","<p class='alert-text'>Failed to delete</p>");
				
				// deleting data for overall carting 
				
				x_del("final_checkout","id='$tid' AND product_token='$trx_token'","<p class='alert-text'>Final checkout data was deleted successfully!</p>","<p class='alert-text'>Failed to delete</p>");
			}
				
		}else{
			echo "<p class='alert-txt'></p>";
		}
	
	}else{
		echo "No record was found in db!";
	}
	

}else{
	echo "Invalid response!!";
}
?>
<style>
.Manual-Trx-Modal{
	border:3px solid lightgray;
	position:fixed;
	top:14%;
	left:2%;
	right:2%;
	width:;
	height:70%;
	background:white;
	opacity:0.9;
	z-index:1000;
	box-shadow:10px 10px 10px lightgray;
	-webkit-box-shadow:10px 10px 10px lightgray;
	-moz-box-shadow:10px 10px 10px lightgray;
	-o-box-shadow:10px 10px 10px lightgray;
	-ms-box-shadow:10px 10px 10px lightgray;
	overflow:auto;
	padding-bottom:20px;
	display:block;
}
.closeMT-Modal{
	padding:0px;
}
.TrxBox{
	padding-left:20pt;
	padding-right:20pt;
}
.head-trx{
	color:green;
	margin-bottom:px;
	font-size:16pt;
	font-weight:bold;
	text-transform:uppercase;
}
.alert-txt , .alert-text{
	text-align:center;
	color:green;
	padding:10px;
}
.img-spot{
	width:30px;
	height:30px;
	border-radius:500px;
}
.img-spot:hover{
	width:100px;
	height:100px;
	border-radius:500px;
}
</style>

<script>
  $(document).ready(function(){
	  changePagination('0');  // control paging of items more than 10
	  $(".closeMT-Modal").click(function(){
			  $(".Manual-Trx-Modal").hide(500);
		  });
	   });
function changePagination(pageId){
	 $(".flash").show();
	 $(".flash").fadeIn(400).html("Loading <img src='img/ajax-loader.gif' />");
	 var dataString = 'pageId='+ pageId;
	 $.ajax({
		   method: "POST",
		   url: "ad_fetchall?tid=<?php echo $oid;?>&trx_token=<?php echo $trx_token;?>&cmd=read",
		   data: dataString,
		   cache: false,
		   success: function(result){
		   $(".flash").hide();
				 $("#pageData").html(result);
		   }
	  });
}
</script>
