 <?php include("validatePage.php");?>

 <script src="js/fronts.js"></script>
 <form id="listedServices" method="POST" autocomplete="off">
 
		<div class="row">
			<div class="col-12 mt-3">
				<select autocomplete="off" id="serveme" required class="form-control selected-fr" name="servicelist">
				 <option value="">PLEASE CHOOSE YOUR SERVICE</option>
				 <?php
				 if(x_count("categories","status='1' LIMIT 500") > 0){
					 foreach(x_select("0","categories","status='1'","500","id") as $slist){
						 $id = $slist["id"];
						 $did = $slist["dept_id"];
						 $list = $slist["department"];
						 ?>
						 <option value="<?php echo $did;?>"><?php echo $list;?></option>
						 <?php
					 }
				 }
				 ?>
				 </select>
				 <input type="hidden" name="<?php echo $_SESSION["XCAPE_HACKS"];?>" value="<?php echo sha1(uniqid());?>"/>	
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
			
			<!---<div style="padding-left:0pt;display:none" class="col-12 col-md-4 col-lg-4">
			
				<div class="mbr-section-btn mt-3">
					<button class="btn btn-warning display-4 btn-polish">GET STARTED</button>
				</div>
			
			</div>---->
			
			<div class="col-12">
			<div style="margin-top:10pt;display:none;color:green;font-weight:bold;" id="gallery"><img src="image/load.gif" class="img-responsive" style="width:80px;"/></div>
			</div>
			
		</div>

		</form>