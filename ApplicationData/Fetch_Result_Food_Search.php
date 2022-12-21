         <?php include("../validatePage.php");?>
		<div class="row mt-0">
			
		<?php
		
		if(x_validatesession("XCAPE_HACKS") && x_validatepost("orderFood")){
			 
			 $mhash = xp("servicelist"); // merchant identity hashed
			 $catid = xp("category_id"); // services listed Hashed
			 $status = 1;
			 
			
			if(x_count("stockmanager","subservice_id='$mhash' AND category_id='$catid' AND status='$status'") > 0){
				$merchant = x_getsingle("SELECT subservice FROM sub_service WHERE category_id='$catid' AND subservice_id='$mhash' LIMIT 1","sub_service WHERE category_id='$catid' AND subservice_id='$mhash' LIMIT 1","subservice");
				
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
								echo "../manageProfile/".$thd;
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
								
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<input type="number" class="form-control w-100" max="<?php echo $qu;?>" min="1" value="1" id="quantity<?php echo $id;?>" style="background-color:aqua;margin:0pt;margin-top:7pt;height:50px;" title="Enter quantity of <?php echo $sname;?>" placeholder="Enter quantity" />
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<button style="margin-left:0pt;height:50px;" id="<?php echo $id;?>" class="btn btn-warning w-100 btn-sm add_to_cart" target="_blank"><i class="fa fa-plus-circle"></i> &nbsp;&nbsp;ADD</button>
									</div>
								</div>
								
								<p style="color:green;margin-top:5px;" id="msgnow<?php echo $id;?>"></p>
								
						</div>
				
                    </div>
					
                </div>
            </div>
			
					<?php
				}
			}else{
				$merchant = x_getsingle("SELECT subservice FROM sub_service WHERE category_id='$catid' AND subservice_id='$mhash' LIMIT 1","sub_service WHERE category_id='$catid' AND subservice_id='$mhash' LIMIT 1","subservice");
				//finish("0","No stock was listed for this Eatary!");
				?>
				<h4 style="text-align:center;color:maroon;" style="margin-bottom:3rem;" class="mbr-section-title mbr-fonts-style align-center display-5"><strong><?php echo $merchant;?> MENU</strong><small> No stocks was Available</small></h4>
				<button class="btn btn-success " onclick="parent.location='./?pageToken=52ae104d91f749e0ab6f3bebf553d296'">RETURN</button>
				
				<?php
			}
				
		}else{
			// Loading default Restaurant
			$pageToken = md5(rand());
			include("default_page_result.php");
			
		}
		?>
            
			
      
        </div>