<?php
include("userpagevalidator.php"); // Validating page
if(x_validateget("cmd")){
	$cmd = xg("cmd"); // swtch options
	$user_id = x_session("ER_ID_2022_VI");; // current user id
	$user_token = x_session("ER_TOKEN_2022_VI");; // current user id
	$hashed_token = eptoks($user_token);
	
	if($cmd == "walletTopups"){
		if(x_count("topup_details","user_token='$hashed_token' LIMIT 1") > 0){
			?><ul id="jover" class="list-group">
				<li class="list-group-item">
				 <h6>Wallet Top-ups</h6>
				  <p class="text-sm">
					<i class="fa fa-arrow-down text-success" aria-hidden="true"></i>
					 &nbsp;last <span class="font-weight-bold">10</span> Transactions
				  </p>
				</li>
			<?php
			foreach(x_select("0","topup_details","user_token='$hashed_token'","10","id desc") as $tp){
				$id = $tp["id"];
				$currency = $tp["currency"];
				$tranx_type = $tp["tranx_type"];
				$status = $tp["status"];
				$payid = $tp["payment_id"];
				$cdamt = number_format($tp["credit_amount"],0);
				$feeamt = $tp["fee_amount"];
				$date = $tp["paid_on"];
				$appr_date = $tp["approval_date"]; // only applicable to manual Transfer
				
				if($tranx_type == "manual"){
					
					if($status == "1"){
						$bcolor = "bg-primary";
						?>
							<li class="list-group-item manual-color"><font class="money-color"><?php echo $currency."&nbsp;&nbsp;".$cdamt;?></font> was credited to your wallet on <?php echo $appr_date;?>.<span class="pull-right badge <?php echo $bcolor;?> badg">Approved</span><br/>
							<span class="badge bg-light"><?php echo $tranx_type;?></span>
							</li>
						<?php
					}else{
						$bcolor = "bg-success";
						?>
							<li class="list-group-item manual-color"><font class="money-color"><?php echo $currency."&nbsp;&nbsp;".$cdamt;?></font> was not credited to wallet <span class="pull-right badge <?php echo $bcolor;?> badg">Pending</span><br/>
							<span class="badge bg-light"><?php echo $tranx_type;?></span>
							</li>
						<?php
					}
					
				}else{
					if($status == "1"){
						$bcolor = "bg-primary";
						?>
							<li class="list-group-item manual-color"><font class="money-color"><?php echo $currency."&nbsp;&nbsp;".$cdamt;?></font> was credited to your wallet on <?php echo $date;?>.<span class="pull-right badge <?php echo $bcolor;?> badg">Approved</span><br/>
							<span class="badge bg-light"><?php echo $tranx_type;?></span>
							</li>
						<?php
					}else{
						$bcolor = "bg-success";
						?>
							<li class="list-group-item manual-color"><font class="money-color"><?php echo $currency."&nbsp;&nbsp;".$cdamt;?></font> was not credited to wallet <span class="pull-right badge <?php echo $bcolor;?> badg">Pending</span><br/>
							<span class="badge bg-light"><?php echo $tranx_type;?></span>
							</li>
						<?php
					}
				}
			}
			?></ul><?php
		}else{
			x_print("<p class='alert-txt'>No top-up records in database!</p>");
		}
	}elseif($cmd == "walletdeduction"){
		if(x_count("payment_details","user_id='$user_id' LIMIT 1") > 0){
			?><ul id="jover" class="list-group">
				<li class="list-group-item">
				 <h6>Wallet Deductions </h6>
				  <p class="text-sm">
					<i class="fa fa-arrow-up text-warning" aria-hidden="true"></i>
					&nbsp;Last <span class="font-weight-bold">10</span> Deductions
				  </p>
				</li>
			<?php
			foreach(x_select("0","payment_details","user_id='$user_id'","10","id desc") as $pd){
				$id = $pd["id"];
				$amt = number_format($pd["amount_paid"],0);
				$status = $pd["status"];
				$date = $pd["paid_on"];
				$orderid = $pd["order_id"];
				$currency = $pd["currency"];
				
				if($status == "1"){
						$bcolor = "bg-primary";
						?>
							<li class="list-group-item manual-color"><font class="money-color"><?php echo $currency."&nbsp;&nbsp;".$amt;?></font> was deducted from wallet to pay for your Order <span class="badge bg-light"><?php echo $orderid;?></span> on <?php echo $date;?>.<span class="pull-right badge <?php echo $bcolor;?> badg">Approved</span><br/>
							
							</li>
						<?php
					}else{
						$bcolor = "bg-success";
						?>
							<li class="list-group-item manual-color"><font class="money-color"><?php echo $currency."&nbsp;&nbsp;".$amt;?></font> was not deducted from your wallet for order <span class="badge bg-light"><?php echo $orderid;?></span> due to failure. <span class="pull-right badge <?php echo $bcolor;?> badg">Pending</span><br/>
							
							</li>
						<?php
					}
			}
			?></ul><?php
		}else{
			x_print("<p class='alert-txt'>No payments records in database!</p>");
		}
	}else{
		
	}
	
}
?>

<style>
.badg{color:white;}
.money-color{font-weight:bold;}
.manual-color{font-size:10pt;}
#jover{overflow:auto;height:500px;}
</style>