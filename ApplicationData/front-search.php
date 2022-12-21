 <?php include("../validatePage.php");?>

 <script>
	$(document).ready(function(){
		$("#restaurants").change(function(){
			if($("#restaurants").val() != ""){
					$("#Subservices").submit();
					return true;
			}else{
				alert("You must select an option!");
			}
		});
	});
 </script>
 
 <form id="Subservices" action="<?php echo htmlspecialchars('./?'.$_SERVER['QUERY_STRING'].'#listedFood');?>" method="POST" autocomplete="off">
		
		<div class="row">
		
			<div class="col-12 mt-3">
			
				<select autocomplete="off" id="restaurants" required class="form-control selected-fr" name="servicelist">
				 <option value="">CHOOSE A RESTAURANT</option>
				 <?php
				 $getPage = x_clean(x_get("pageToken"));
				 if(x_count("sub_service","category_id='$getPage' AND status='1' LIMIT 500") > 0){
					 foreach(x_select("0","sub_service","category_id='$getPage' AND status='1'","500","id") as $slist){
						 
						 $id = $slist["id"];
						 $did = $slist["category_id"]; // service categories hashed
						 $list = $slist["subservice"]; // listed merchants
						 $subid = $slist["subservice_id"]; // merchant identity hashed
						 
						 ?>
						 <option value="<?php echo $subid;?>"><?php echo $list;?></option>
						 <?php
					 }
				 }
				 ?>
				 </select>
				 <input type="hidden" name="category_id" value="<?php echo $getPage;?>"/>	
				 <input type="hidden" name="<?php echo $_SESSION["XCAPE_HACKS"];?>" value="<?php echo sha1(uniqid());?>"/>	
				 <input type="hidden" name="orderFood" value="<?php echo md5(uniqid().Date('Ymd'));?>"/>	
				 <?php
				if(x_count("control_captcha","status='1'") > 0){
					?>
					<!---<div class="fr" style="margin-top:10pt;">
						<div class="g-recaptcha" data-sitekey="6LcDo1sUAAAAAEPlrWpeHZlvDbV1ydwDuM0lJe9N"></div>
					</div>--->

					<?php
						}
					?>
				 
			</div>
			
			<!---<div style="padding-left:0pt;display:none;" class="col-12 col-md-4 col-lg-4">
			
				<div  class="mbr-section-btn mt-3">
					<button class="btn btn-warning display-4 btn-polish">ORDER NOW</button>
				</div>
			
			</div>--->
			
			<div class="col-12">
			<div style="margin-top:10pt;display:none;color:green;font-weight:bold;" id="gallery"><img src="image/load.gif" class="img-responsive" style="width:80px;"/></div>
			</div>
			
		</div>

		</form>