<?php
include("adminpagevalidator.php");
if(x_validateget("tranxToken") && x_validateget("cmd") && x_validateget("tranxId") && x_validatesession("ER_ID_2022_VI")){
	
	$tid = xg("tranxId"); // topup-details ID
	$trx_token = xg("tranxToken"); // Topup-details token
	$cmd = xg("cmd"); //  options
	
	// checking for record existence in db
	if(x_count("topup_details","id='$tid' AND tranx_token='$trx_token' LIMIT 1") > 0){
		
	if($cmd == "approve"){
		// initiating bank tranfer approval started
		
		$user_token = x_getsingleupdate("topup_details","user_id","id='$tid' AND tranx_token='$trx_token'"); // fetching the usertoken
		$hashed_utoken = eptoks($user_token);
		
		$credit_amount = x_getsingleupdate("topup_details","credit_amount","id='$tid' AND tranx_token='$trx_token'"); // fetching the credit amount
		$fee_amount = x_getsingleupdate("topup_details","fee_amount","id='$tid' AND tranx_token='$trx_token'"); // fetching the fee amount
		
		$current_balance = x_getsingleupdate("ep_wallets","wallet_balance","utoken='$hashed_utoken'"); // retrieve user wallet balance
		$newbalance = $current_balance + ($credit_amount - $fee_amount);  
		$final_credit = "NGN ".number_format($credit_amount - $fee_amount,0);
		
		// update users balance
		x_update("ep_wallets","utoken='$hashed_utoken'","wallet_balance='$newbalance'","","<p class='alert-txt'>Failed to credit wallet.</p>");
		$timer = x_curtime(0,1);
		x_updated("topup_details","id='$tid' AND tranx_token='$trx_token'","approval_date='$timer',status='1',balance_before='$current_balance',balance_after='$newbalance'","<p class='alert-txt'>Bank Transfer approved! Wallet was credited with <b>$final_credit</b>.</p>","<p class='alert-txt'>Failed to approve!.</p>");
		// initiating bank tranfer approval ended
	}
	elseif($cmd == "read"){// Readind data started
		
		foreach(x_select("0","topup_details","id='$tid' AND tranx_token='$trx_token'","0","id desc") as $topup){
				
					$id = $topup["id"];
					$trx_token = $topup["tranx_token"];
					$cur = $topup["currency"];
					$status = $topup["status"]; // 1 | 0
					$pay_id = $topup["payment_id"];
					
					// status 
					$in_status = array(0,1);
					if(in_array($status,$in_status)){

						if($status == "1"){
							$status = "Approved";
							$scolor = "success";
						}else{
							$status = "Pending";
							$scolor = "danger";
						}

					}else{
						$status = "Invalid option";
					}
					// Tranx amount details
					$credit = $topup["credit_amount"];
					$fee = $topup["fee_amount"]; 
					$total = $topup["total_amount"]; // fee + credit
					
					// user id details
					$userid = $topup["user_id"]; // token to interact with user data
					$utoken = $topup["user_token"]; // for getting account balance
					
						if(x_count("manageaccount","token='$userid' LIMIT 1") > 0){// validating profile detail
							foreach(x_select("0","manageaccount","token='$userid'","1","id") as $bk){
								$name = $bk["name"];
								$email = $bk["email"];
								$gender = $bk["gender"];
								$mobile = $bk["mobile"];
								$userphoto = $bk["user_photo"];
							}
						}else{$name = "";$email = "";$gender = "";$mobile = "";}
						
					// Getting user wallet balance
					$balance = x_getsingleupdate("ep_wallets","wallet_balance","utoken='$utoken'");
					
					// bank transfer details
					$bnkid = $topup["bank_account_id"]; // Fetch the company acct details
					$trdate = $topup["transferdate"];
					$trdes = $topup["transfer_description"];
					$apprdate = $topup["approval_date"];
					$entrydate = $topup["paid_on"];
					
						if(x_count("company_accounts","id='$bnkid' LIMIT 1") > 0){// validating company account detail
							foreach(x_select("0","company_accounts","id='$bnkid'","1","id") as $bk){
								$bkname = $bk["bank_name"];
								$acctname = $bk["account_name"];
								$acctnumb = $bk["account_number"];
							}
						}else{$bkname = "";$acctname = "";$acctnumb = "";}
					
					// user balance details
					$bb = $topup["balance_before"]; // balance before top-up
					$bf = $topup["balance_after"]; // balance after top-up
					?>
					<div class="Manual-Trx-Modal">
						<div class="row">
							<div class="col-12">
								<button style="font-size:20px;padding:20px;" class="pull-right btn closeMT-Modal">&times;
								</button>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 TrxBox">
								<div class="list-group">
									<div class="list-group-item">
										<h3 class="head-trx">Transactions details</h3>
										<button class="btn btn-info btn-sm">Tranx-ID : <b><?php echo $pay_id;?></b></button>
										<table class="table mt-3">
											<tr>
												<td>Transaction Status</td>
												<th><span style="color:white;" class="badge bg-<?php echo $scolor;?>"><?php echo $status;?></span><?php
												if($status == "Approved"){
													echo " at ".$apprdate;
												}
												?></th>
											</tr>
											<tr>
												<td>Amount Transferred</td>
												<th><?php echo "NGN ".number_format($credit,0);?></th>
											</tr>
											<?php
											if($status == "Approved"){
												?>
											<tr>
												<td>Credited Amount(Fee deducted)</td>
												<th><?php echo "NGN ".number_format($credit-$fee,0);?></th>
											</tr>
												<?php
											}
											?>
											
											<tr>
												<td>Fee Amount</td>
												<th><?php echo "NGN ".number_format($fee,0);?></th>
											</tr>
											<tr>
												<td>Transfer Date</td>
												<th><?php echo $trdate;?></th>
											</tr>
											<tr>
												<td>Transfer Description</td>
												<th><?php echo $trdes;?></th>
											</tr>
											<tr>
												<td>Submission Date</td>
												<th><?php echo $entrydate;?></th>
											</tr>
										</table>
									</div>
									
									<div class="list-group-item">
										<h3 class="head-trx">Bank details</h3>
										<table class="table mt-3">
											<tr>
												<td>Account Name</td>
												<th><?php echo $acctname;?></th>
											</tr>
											<tr>
												<td>Account Number</td>
												<th><?php echo $acctnumb;?></th>
											</tr>
											<tr>
												<td>Bank Name</td>
												<th><?php echo $bkname;?></th>
											</tr>
										</table>
									</div>
									<?php
											if($status == "Approved"){
												?>
									<div class="list-group-item">
										<h3 class="head-trx">Wallet details</h3>
										<table class="table mt-3">
											<tr>
												<td>Balance Before</td>
												<th><?php echo "NGN ".number_format($bb,0);?></th>
											</tr>
											<tr>
												<td>Balance After</td>
												<th><?php echo "NGN ".number_format($bf,0);?></th>
											</tr>
											
										</table>
									</div>
												<?php
											}
									?>
									<div class="list-group-item">
										<h3 class="head-trx">User details</h3>
										<table class="table mt-3">
											<tr>
												<td>Name</td>
												<th><?php
												if($userphoto == ""){
													echo "<img src='img/avatar.png' class='img-spot'/>";
												}
												?> &nbsp;&nbsp;<?php echo $name;?></th>
											</tr>
											<tr>
												<td>Email</td>
												<th>&nbsp;&nbsp;<?php echo $email;?></th>
											</tr>
											<tr>
												<td>Mobile</td>
												<th>&nbsp;&nbsp;<?php echo $mobile;?></th>
											</tr>
										</table>
									</div>
									
									
								</div>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
						</div>
					</div>
					<?php
				}
	// Reading data ended
	
	}elseif($cmd == "delete"){
		
		x_del("topup_details","id='$tid' AND tranx_token='$trx_token'","<p class='alert-text'>Entry Deleted successfully!</p>","<p class='alert-text'>Failed to delete</p>");
			
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
	position:fixed;
	top:14%;
	left:10%;
	right:10%;
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
	  $(".closeMT-Modal").click(function(){
			  $(".Manual-Trx-Modal").hide(500);
		  });
	   });
</script>