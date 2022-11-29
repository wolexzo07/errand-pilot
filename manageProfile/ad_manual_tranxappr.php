<?php
// validating if the current logged-in user is an admin
	include("adminpagevalidator.php"); 
?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-12 mb-3">
		<button class="btn btn-primary" onclick="load('a_admin_manager')"><i class="fa fa-arrow-left"></i></button>
		<button class="btn btn-success" onclick="load('ad_manual_transactions')"> Manual Transactions</button>
	</div>
	<div class="col-lg-6 col-md-6 col-12 mb-3">
		<button class="btn btn-primary" onclick="load('ad_manual_tranxappr')"> Approved Tranx. = <?php echo x_count("topup_details","status='1' AND tranx_type='manual'");?></button>
		<button class="btn btn-info" onclick="load('ad_manual_transactions')"> Pending Tranx. =  <?php echo x_count("topup_details","status='0' AND tranx_type='manual'");?> </button>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-12">
	<div id="trx-result"></div>
		<?php
			if(x_count("topup_details","tranx_type='manual' AND status='1' LIMIT 1") > 0){
				$count = 0;
				?>
				<table id="table_id" class="table ">
				<thead>
					<tr>
						<th>No.</th>
						<th>user</th>
						<th>Contact</th>
						<th>Credited-Amount / Wallet</th>
						<th>Pay-ID / TrsfrDate</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach(x_select("0","topup_details","tranx_type='manual' AND status='1'","0","id desc") as $topup){
					$count++;
					$id = $topup["id"];
					$trx_token = $topup["tranx_token"];
					$cur = $topup["currency"];
					$status = $topup["status"]; // 1 | 0
					$pay_id = $topup["payment_id"];
					
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
					<tr>
						<td><?php echo $count;?></td>
						<td><?php echo $name;?></td>
						<td><?php echo "<span class='badge bg-success'>".$email."</span><br/><span class='badge bg-primary'>$mobile</span>";?></td>
						<td><span title="Amount credited after fee deduction" class="badge">CA = <?php echo "NGN ".number_format($credit-$fee,0);?> </span><br/>
						<span title="<?php echo $name;?> wallet balance" class="badge">
							WB = <?php echo "NGN ".number_format($balance,0);?></span>
						</td>
						<td>
						<span title="<?php echo $pay_id;?>" class="badge bg-primary"><?php echo substr($pay_id,0,20)."...";?></span><br/>
						<span title="Tranferred on <?php echo $trdate;?>" class="badge bg-success"><?php echo $trdate;?></span>
						</td>
						<td>
							<button class="btn btn-primary btn-sm" onclick="readTranxmanual('<?php echo $id;?>' , '<?php echo $trx_token?>','read')"><i class="fa fa-globe"></i> Details</button>
							
						</td>
					</tr>
					<?php
				}
				?>
				</tbody>
				</table>
				<?php
			}else{
				
			}
		?>
	</div>
	<!---<div class="col-lg-6 col-md-6 col-12">First div</div>--->
</div>

<script>
	$(document).ready( function () {
		$('#table_id').DataTable({
			lengthMenu: [
				[10, 25, 50, 100, -1],
				[10, 25, 50, 100, 'All'],
			],
		});
		$("#table_id_filter input").attr("placeholder","Search Anything");
		$("#table_id_filter input").attr("class","form-control form-control-sm");
	} );

	function readTranxmanual(tranxId , tranxToken , cmd){
		$.ajax({
			url:"ad_getManualTrx?tranxId="+tranxId+"&tranxToken="+tranxToken+"&cmd="+cmd,
			method:"GET",
			success:function(data){
				$("#trx-result").html(data);
			},
			error:function(){
				
			}
		})
	}
</script>
