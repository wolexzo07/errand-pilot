<?php
include("../validatePage.php");
if(x_count("sub_service","is_set_default='1' LIMIT 1") > 0){
	
	foreach(x_select("category_id,subservice_id","sub_service","is_set_default='1'","1","id") as $def){}
	
			$mhash = $def["subservice_id"]; // merchant identity hashed
			$catid = $def["category_id"]; // services listed Hashed
			$status = 1;
			
			if(x_count("stockmanager","subservice_id='$mhash' AND category_id='$catid' AND status='$status'") > 0){
				$merchant = x_getsingle("SELECT subservice FROM sub_service WHERE category_id='$catid' AND subservice_id='$mhash' LIMIT 1","sub_service WHERE category_id='$catid' AND subservice_id='$mhash' LIMIT 1","subservice");
				?>
				<h4 style="margin-bottom:3rem;" class="mbr-section-title mbr-fonts-style align-center display-5"><strong><?php echo $merchant;?> MENU</strong></h4>
				<?php
				foreach(x_select("0","stockmanager","subservice_id='$mhash' AND category_id='$catid' AND status='$status'","100","stockname") as $items){
					$id = $items["id"];
					$sname = strtoupper($items["stockname"]);
					$snumber = $items["stocknumber"];
					$sp = $items["sellingprice"];
					$cp = $items["costprice"];
					$qu = $items["quantity"];
					$tk = $items["token"];
					$ft = $items["first_image"];
					$sd = $items["second_image"];
					$thd = $items["third_image"];
					$fth = $items["fourth_image"];
					?>
					
			<div class="item features-image сol-12 col-md-3 col-lg-3">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="<?php 
						if(!empty($ft || $sd || $thd || $fth)){
							if(file_exists("../manageProfile/".$ft) || file_exists("../manageProfile".$sd) || file_exists("../manageProfile/".$thd) || file_exists("../manageProfile/".$fth)){
								echo "../manageProfile/".$sd;
							}else{
								echo "assets/images/missing.png";
							}
						}?>" alt="<?php echo $sname;?>">
                    </div>
                    <div class="item-content">
					
                        <p class="sitem-title" title="<?php echo $sname;?>">
						<?php echo x_trunc($sname,0,17);?>
						</p>
						 <p class="sitem-price">
						<?php echo "NGN ".number_format($sp,0);?>
						</p>
                        
						<div class="orderInputProcessing">
								<input type="hidden" value="<?php echo $sname;?>" id="stockname<?php echo $id;?>"/>
								
								<input type="hidden" value="<?php echo '../manageProfile/'.$sd;?>" id="product_image<?php echo $id;?>"/>
								
								<input type="hidden" value="<?php echo $sp;?>" id="sellingprice<?php echo $id;?>"/>
								
								<input type="number" class="form-control w-50" max="<?php echo $qu;?>" min="1" value="1" id="quantity<?php echo $id;?>" style="background-color:aqua;margin:0pt;" title="Enter quantity of <?php echo $sname;?>" placeholder="Enter quantity" />
								
								<button style="margin-left:0pt;" id="<?php echo $id;?>" class="btn btn-warning w-100 btn-sm add_to_cart" target="_blank"><i class="fa fa-plus-circle"></i> &nbsp;&nbsp;ADD TO CART</button>
								
								<p style="color:green;margin-top:5px;" id="msgnow<?php echo $id;?>"></p>
								
						</div>
				
                    </div>
					
                </div>
            </div>
			
					<?php
				}
			}else{
				finish("0","No stock was listed for Default Eatary!");
				?>
				<!---<div class="alert alert-warning" role="alert"><i class="fa fa-minus-circle"></i> No stock was listed for this Eatary!</div>--->
				<?php
			}
}
			
?>