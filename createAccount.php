<?php
$pageToken = md5(rand());
include_once("finishit.php");
include("siteinfo.php");
xstart(0);
include_once("refcoder.php"); // managing Referrals
include("portalModeManager.php"); // managing portal mode
include("session_hacks_bypass.php"); // Handling session hacks
include("session_validator.php"); // checking for session status

?>
<html>
<head>
<title><?php echo $sitename;?> - Online Registration page</title>

	<meta name="description" content="<?php echo $metades;?>"/>

   <meta name="keywords" content="<?php echo $metaname;?>"/>
<?php include_once("headextra.php");?>

</head>
<body class="renew">

<div class="boxsh">
	<div class="modal-dialog modal-signup">
	    <div class="modal-content">
			<div class="card card-signup card-plain">
				<div class="modal-header">
		        	<center>
					<?php include("sitelogoinc.php");?>
					<h3 class="modal-title card-title text-center" id="myModalLabel"><font class="furbish">Create new</font> account</h3></center>
		      	</div>
		      	<div class="modal-body">
					<div class="row">

						<div class="col-md-12">

	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/scriptloaded.js"></script>
	
  <div class="card-content">
	
	<form class="form" method="POST" id="regHandler"  autocomplete="off">
	
	 <div class="padd-form">
	 
	 <h4><i class="fa fa-user"></i> &nbsp;&nbsp;Personal <font style="color:green;">Details</font></h4>
	 
	 <div class="row">
	 
		<div class="col-lg-6 col-md-6 col-12">
			<input type="text" autocomplete="off" required="required" id="last" class="form-control" placeholder="Enter last name (Surname)" name="last"/>
		</div>
		<div class="col-lg-6 col-md-6 col-12">
			<input type="text" autocomplete="off" required="required" id="first" class="form-control" placeholder="Enter first name" name="first"/>
		</div>
		
	 </div>

	<div class="row">
	
		<div class="col-lg-6 col-md-6 col-12">
			<input type="email" id="email" autocomplete="off" required="required" class="form-control" placeholder="Enter valid email" name="email"/>
		</div>
		<div class="col-lg-6 col-md-6 col-12">
			<input type="text" autocomplete="off" required="required" maxlength="11" class="form-control" placeholder="Enter mobile number" name="mobile" id="mobile"/>
		</div>
		
		<div class="col-lg-12 col-md-12 col-12">
			<input type="password" id="pass" autocomplete="off" required="required" placeholder="Enter password" value="" class="form-control" name="pass" />
		</div>
		
	 </div>
	 

     <h4><i class="fa fa-bus"></i> &nbsp;&nbsp;Shipping <font style="color:green;">Details</font></h4>
		 
	<div class="row">

			<div class="col-lg-6 col-md-6 col-12">

				 <select name="country" id="country"  required="" class="form-control" onchange="print_state('state',this.selectedIndex);" data-trigger="focus" data-location="top-left" data-title="Please select your country"></select>
			
			</div>
			
			<div class="col-lg-6 col-md-6 col-12">
					
				<select name="state" id="state" required="required"  class="form-control" data-trigger="focus" data-location="top-left" data-title="Please select your state of origin"></select>
		
			</div>
			
			<div class="col-lg-12 col-md-12 col-12">
					
				<select name="city" id="city" required="required"  class="form-control">
					<option value="">Select city / Area...</option>
					<option value="Osogbo">Osogbo</option>
				</select>
		
			</div>
	</div>
		
			<textarea class="form-control" placeholder="Street Address"  name="street"></textarea>
		
        
   
			<input type="hidden" name="_token" value="<?php echo sha1(uniqid());?>"/>

			
		 

			<?php
				if(x_count("control_captcha","status='1'") > 0){
					?>
					<div class="fr">
						<div class="g-recaptcha" data-sitekey="<?php echo $captcha;?>"></div>
					</div>

					<?php
				}
			?>
	<input type="hidden" name="<?php echo $_SESSION["XCAPE_HACKS"];?>" value="<?php echo sha1(uniqid());?>"/>		
	
	<div class="fomlink">
	<p class="guo" style="display:none;">Referral*:</p>
	<input type="hidden" readonly="readonly" value="<?php
	if(isset($_SESSION["iqgames_refcoded"])){
		echo $_SESSION["iqgames_refcoded"];
		}else{
			echo '';

			}
	?>" name="ref"  id="fpir" class="form-control"/>
	</div>

		<!-- If you want to add a checkbox to this form, uncomment this code -->

	<input type="checkbox" required="required" name="checknow" value="<?php echo sha1(uniqid()).md5(uniqid());?>"/>
	I agree to the <a href="#something">terms and conditions</a>.
			
		
		 </div>
		 
		 <div class="modal-footer text-center">
			<button type="submit" class="btn btn-primary btn-round"><i class="fa fa-sign-in"></i> &nbsp;Get Started</button>
		 </div>
		 
		 </form>
		 
		 <div style="margin-top:10pt;display:none;color:green;font-weight:bold;" id="gallery">
			<img src="image/load.gif" class="img-responsive" style="width:80px;"/>
		 </div>
		 
	</div>

	
	
							<div class="social text-center">
								<button class="btn btn-just-icon btn-round btn-twitter">
									<i class="fa fa-twitter"></i>
								</button>
								<button class="btn btn-just-icon btn-round btn-dribbble">
									<i class="fa fa-dribbble"></i>
								</button>
								<button class="btn btn-just-icon btn-round btn-facebook">
									<i class="fa fa-facebook"> </i>
								</button>
								<!--<h4> or be classical </h4>-->
							</div>

							<div class="changebase text-center">
							<a href="resetAccount" class="linkiq">Reset Password</a> | <a href="loginAccount" class="linkiq">Sign-in Now</a>
							</div>

						</div>
					</div>
		      	</div>
			</div>
	    </div>
	</div>
</div>
<!--  End Modal -->

<script type="text/javascript" src="food-processor/js/countries-nigeria.js"></script>
<script language="javascript">print_country("country");</script> 
<?php include_once("footextra.php");?>
</body>
</html>
