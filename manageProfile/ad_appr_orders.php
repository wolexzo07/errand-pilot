<?php
// validating if the current logged-in user is an admin
	include("adminpagevalidator.php"); 
?>

<div class="row">
	<div class="col-lg-6 col-md-6 col-12 mb-3">
		<button class="btn btn-primary" onclick="load('a_admin_manager')"><i class="fa fa-arrow-left"></i></button>
		<button class="btn btn-success" onclick="load('ad_appr_orders')"> Manage Orders</button>
	</div>
	<div class="col-lg-6 col-md-6 col-12 mb-3">
		<button class="btn btn-primary" onclick="load('ad_manual_tranxappr')"> Approved Orders = <?php echo x_count("final_checkout","order_status='1'");?></button>
		<button class="btn btn-info" onclick="load('ad_manual_transactions')"> Pending Orders =  <?php echo x_count("final_checkout","order_status='0'");?> </button>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-12">
	<div id="trx-result"></div>
		<?php
			if(x_count("final_checkout","order_status='1' LIMIT 1") > 0){
				$count = 0;
				?>
				<table id="table_id" class="table ">
				<thead>
					<tr>
						<th>No.</th>
						<th>In-cart/OrderID</th>
						<th>UserInfo/Wallet</th>
						<th> TotalAmount</th>
						<th> PymtStatus</th>
						<th>OrderDate</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach(x_select("0","final_checkout","order_status='1'","0","id desc") as $fc){
					$count++;
					$id = $fc["id"];
					$oid = $fc["order_id"];
					$uid = $fc["user_id"];
					$cat = $fc["total_incart"];
					$pay = $fc["payment_status"];
					$pid = $fc["payment_id"];
					$pmed = $fc["payment_medium"];
					
					// Amount breakdown
					$totalamt = $fc["total_amount"];
					$shop = $fc["shopped_amount"];
					$ship = $fc["shipping_fee"];
					$serf = $fc["service_fee"];
					
					
					$order_date = $fc["order_date"];
					$token = $fc["product_token"];
					$add = $fc["address"];
					
						if(x_count("manageaccount","id='$uid' LIMIT 1") > 0){// validating profile detail
							foreach(x_select("0","manageaccount","id='$uid'","1","id") as $bk){
								$name = $bk["name"];
								$email = $bk["email"];
								$gender = $bk["gender"];
								$mobile = $bk["mobile"];
								$userphoto = $bk["user_photo"];
								$utoken = eptoks($bk["token"]);
							}
						}else{$name = "";$email = "";$gender = "";$mobile = "";$utoken="";}
						
					// Getting user wallet balance
					$balance = x_getsingleupdate("ep_wallets","wallet_balance","utoken='$utoken'");
					
					// payment status
					$in_status = array(0,1);
					if(in_array($pay,$in_status)){

						if($pay == "1"){
							$pay = "Paid";
							$scolor = "success";
						}else{
							$pay = "unpaid";
							$scolor = "danger";
						}

					}else{
						$status = "Invalid option";
						exit();
					}
					?>
					<tr>
						<td><?php echo $count;?></td>
						<td>
						<span style="color:white;" class="badge bg-primary"><?php echo $cat;?></span>
						<span style="color:white;" class="badge bg-success"><?php echo $oid;?></span></td>
						<td><span style="color:white;" class="badge bg-primary"><?php echo $name;?></span><br/>
						<span style="color:white;" class="badge bg-success"><?php echo "NGN ".number_format($balance,0);?></span>
						</td>
						<td> <?php echo "NGN ".number_format($totalamt,0);?></td>
						<td><span style="color:white;" class="badge bg-<?php echo $scolor?>"><?php echo $pay;?></span></td>
						<td><span style="color:white;" class="badge bg-success"><?php echo $order_date;?></span></td>
						<td>
						<button class="btn btn-primary btn-sm" onclick="ordersReader('<?php echo $id;?>' , '<?php echo $token?>','read')"><i class="fa fa-globe"></i> Details</button>
						<button class="btn btn-danger btn-sm" onclick="ordersReader('<?php echo $id;?>' , '<?php echo $token?>','delete')"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					<?php
				}
				?>
				 </tbody>
				</table>
				<?php
			}else{
				echo "<p class='text-center'><i class='fa fa-trash fail_txt'></i><br/>No record found in db!</p>";
			}
		?>
	</div>
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

	function ordersReader(tranxId , tranxToken , cmd){
		$.ajax({
			url:"ad_manageOrder?tranxId="+tranxId+"&tranxToken="+tranxToken+"&cmd="+cmd,
			method:"GET",
			success:function(data){
				$("#trx-result").html(data);
				setTimeout(function(){
					if(cmd != "read"){
						load("ad_appr_orders");
					}
				},5000)
			},
			error:function(){
				
			}
		})
	}
</script>
<style>
.fail_txt{
	font-size:70pt;
	margin-top:20pt;
	color:lightgray;
}
</style>