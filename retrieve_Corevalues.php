<?php
	include("finishit.php");
	xstart(0);
	if(x_validateget("hashkey") && x_validateget("cmd")){
		
		if(xg("hashkey") != $_SESSION["XCAPE_HACKS"]){
			echo "<p class='alert-txt'>Missing loading Parameter!</p>";
			exit();
		}
		
		$cmd = xg("cmd");
		
		if($cmd == "corevalue"){ // fetching core values
			
			if(x_count("corevalues","status='1' LIMIT 1") > 0){
				foreach(x_select("0","corevalues","status='1'","8","id") as $corevalues){
					$title = $corevalues["title"];
					$content = $corevalues["content"];
					$icon = $corevalues["icons"];
					?>
					<div class="card col-12 col-md-6 col-lg-3">
						<div class="card-wrapper">
							<div class="card-box align-center">
								<div class="iconfont-wrapper">
									<span class="<?php echo $icon;?>"></span>
								</div>
								<h5 class="card-title mbr-fonts-style display-7">
								<strong><?php echo $title?></strong></h5>
								<p class="card-text mbr-fonts-style display-7"><?php echo $content;?></p>
							</div>
						</div>
					</div>
					<?php
				}
			  }
		}elseif($cmd == "testimonials"){ // Handling testimonials
		
			if(x_count("testimonials","status='1'") > 0){
				foreach(x_select("0","testimonials","status='1'","4","id") as $testimony){
					$user_id = $testimony["user_id"];
					$message = $testimony["message"];
					
					$name = x_getsingleupdate("manageaccount","name","id='$user_id'");
					$photo = x_getsingleupdate("manageaccount","user_photo","id='$user_id'");
					?>
					<div class="card col-12 col-md-6">
                <p class="mbr-text mbr-fonts-style mb-4 display-7"><?php echo $message;?></p>
                <div class="d-flex mb-md-0 mb-4">
                    <div class="image-wrapper">
                        <img src="<?php
						if($photo == ""){
							echo "image/avatar.png";
						}else{
							if(file_exists("manageProfile/$photo")){
								echo "manageProfile/$photo";
							}else{
								echo "image/avatar.png";
							}
						}
						?>" alt="<?php echo $name;?>">
                    </div>
                    <div class="text-wrapper">
                        <p class="name mbr-fonts-style mb-1 display-4">
                            <strong><?php echo $name;?></strong>
                        </p>
                        <p class="position mbr-fonts-style display-4">
                            <strong style="color:green;">Customer</strong>
                        </p>
                    </div>
                </div>
            </div>
					<?php
				}
			}

		}elseif($cmd == "readOrderStatus"){ // handling Order Tracking through errand-ID
			$trid = x_clean(x_post("errandID"));
			if($trid != ""){
				
				if(x_count("order_placed","tracking_no='$trid' LIMIT 1") > 0){
					foreach(x_select("0","order_placed","tracking_no='$trid'","1","id") as $details){
						$did = $details["id"];
						$uid = $details["user_id"];
						$oid = $details["order_id"];
						$pid = $details["product_id"];
						$quan = $details["product_quantity"];
						$unit = $details["unit_price"];
						$total = $details["total_amount"];
						$status = $details["status"];
						$pstatus = $details["processing_status"];
						$pdate = $details["processing_date"];
						$sstatus = $details["shipping_status"];
						$sdate = $details["shipping_date"];
						$dstatus = $details["delivery_status"];
						$ddate = $details["delivery_date"];
						$cc = $details["courier_company"];
						$trno = $details["tracking_no"];
						
						// Fetching Order Details
						$food_cp = x_getsingleupdate("stockmanager","subservice_id","id='$pid'");
						$food_name = x_getsingleupdate("stockmanager","stockname","id='$pid'");
						$food_img = x_getsingleupdate("stockmanager","first_image","id='$pid'");
						$food_cat = x_getsingleupdate("stockmanager","category_id","id='$pid'");
						$uname = x_getsingleupdate("manageaccount","name","id='$uid'");
						$tincart = x_getsingleupdate("final_checkout","total_incart","order_id='$oid'");
						
						?>
				<div class="TrackOrder-Modal">
			
				<div class="row">				
					<div class="col-lg-1 col-md-1 col-12"></div>
					<div class="col-lg-10 col-md-10 col-12">
						
						<div class="list-group mt-3">
						
						<div style="font-weight:bold;color:white" class="list-group-item bg-primary"><i class="fa fa-close closeMT-Modal"></i> &nbsp;&nbsp;ORDER DETAILS 
						</div>
						<div class="list-group-item">
						
						<div class="row">				
							<div class="col-lg-3 col-md-3 col-12">
							<img src="<?php echo "manageProfile/".$food_img;?>" class="img-fluid img-dip mt-3"/>
							</div>
							<div class="col-lg-9 col-md-9 col-12">
						<table style="font-size:8pt;text-transform:uppercase;" class="table  mt-3">
							
							<tr>
								<td>Item Name</td>
								<th style="color:green;"><?php echo substr(strtoupper($food_name),0,36);?></th>
							</tr>
							<tr>
								<td>Ordered By</td>
								<th style="color:purple;"><?php echo substr(strtoupper($uname),0,25);?></th>
							</tr>
							<tr>
								<td>Order ID</td>
								<th><?php echo $oid;?></th>
							</tr>
							<tr>
								<td>In-Cart</td>
								<th style="color:green;"><?php echo $tincart;?>
								<?php
									if($tincart > 1){
										echo "- Items";
									}else{
										echo "- Item";
									}
								?>
								</th>
							</tr>
							<tr>
								<td>Track ID</td>
								<th><?php echo $trid;?></th>
							</tr>
						</table>
							</div>
						</div>
						
						
											
						<table style="font-size:9pt;text-transform:uppercase;" class="table table-bordered mt-3">
							<tr>
								<th>Status Options</th>
								<th>Order Status</th>
								<th>Status Date</th>
							</tr>
							
							<tr>
								<td>Payment Status</td>
								<td><span class="badge bg-primary">
								<?php
									if($status == "1"){
									echo "Paid";
								}else{
									echo "Not Paid";
								}
								?></span></td>
								<td><?php echo $pdate;?></td>
							</tr>
							
							<tr>
								<td>Fulfillment Status</td>
								<td><span class="badge badge-success bg-success">
								<?php 
								if($pstatus == "1"){
									echo "Approved";
								}else{
									echo "Pending";
								}
								?></span></td>
								<td><?php echo $pdate;?></td>
							</tr>
							<tr>
								<td>Shipping Status</td>
								<td><span class="badge badge-success bg-success"><?php 
								if($sstatus == "1"){
									echo "Approved";
								}else{
									echo "Pending";
								}
								?></span></td>
								<td><?php echo $sdate;?></td>
							</tr>
							
							<tr>
								<td>Delivery Status</td>
								<td><span class="badge badge-success bg-success"><?php 
								if($dstatus == "1"){
									echo "Approved";
								}else{
									echo "Pending";
								}
								?></span></td>
								<td><?php echo $ddate;?></td>
							</tr>
							
						</table>
						
						</div>
						</div>

					</div>
					<div class="col-lg-1 col-md-1 col-12"></div>					
						
			   </div>
			</div>
						<?php
					}
					
				}else{
					//echo "<p class='alert-txt'>Invalid track ID <b>$trid</b>!.</p>";
					finish("0","Tracking ID $trid not found in database!");
				}
			
			}else{
				echo "<p class='alert-txt'>Kindly provide Track ID.</p>";
			}
		}else{}
		
	
	}else{echo "Nothing is happening!!";}
	
?>

		    
<style>
.TrackOrder-Modal{
	border:3px solid lightgray;
	position:fixed;
	top:14%;
	left:10%;
	right:10%;
	width:80%;
	height:80%;
	background:white;
	opacity:1;
	z-index:100;
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

.alert-txt , .alert-text{
	text-align:center;
	color:green;
	padding:10px;
}
.img-dip{
	width:200px;
	border-radius:700px;
	-moz-border-radius:700px;
	-webkit-border-radius:700px;
	-o-border-radius:700px;
	-ms-border-radius:700px;
}

</style>

<script>
  $(document).ready(function(){
	  $(".closeMT-Modal").click(function(){
			  $(".TrackOrder-Modal").hide(500);
		  });
	   });
</script>