<?php
$pageToken = md5(rand());
include_once("finishit.php");
include_once("siteinfo.php");
xstart(0);
include_once("refcoder.php");
if(x_count("portalmode","status='offline' AND id='1' LIMIT 1") > 0){

	finish("notify/maintenance","Access denied!");
	exit();
}
if(isset($_SESSION["IQGAMES_ID_2018_VISION"])){
	finish("dash/manpag","0");
	exit();
}

$_SESSION["XCAPE_HACKS"] = md5(rand());

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
					<h3 class="modal-title card-title text-center" id="myModalLabel"><font class="furbish">Create an</font> account</h3></center>
		      	</div>
		      	<div class="modal-body">
					<div class="row">

						<div class="col-md-12">

	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/scriptloaded.js"></script>


	<form class="form" method="POST" id="regHandler"  autocomplete="off">
								<div class="card-content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-user fa-2x"></i>
										</span>
										<input type="text" autocomplete="off" required="required" id="full" class="form-control" placeholder="Full Name..." name="full"/>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-inbox fa-2x"></i>
										</span>
										<input type="email" id="email" autocomplete="off" required="required" class="form-control" placeholder="Email..." name="email"/>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-phone fa-2x"></i>
										</span>
										<input type="text" autocomplete="off" required="required" maxlength="11" class="form-control" placeholder="Mobile number..." name="mobile" id="mobile"/>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-lock fa-2x"></i>
										</span>
										<input type="password" id="pass" autocomplete="off" required="required" placeholder="Password..." class="form-control" name="pass" />
									</div>


			<?php
				if(x_count("control_captcha","status='1'") > 0){
					?>
					<div class="fr">
						<div class="g-recaptcha" data-sitekey="6LcDo1sUAAAAAEPlrWpeHZlvDbV1ydwDuM0lJe9N"></div>
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

									<div class="checkbox">
										<label>
											<input type="checkbox" required="required" name="checknow" value="<?php echo sha1(uniqid()).md5(uniqid());?>"/>
											I agree to the <a href="#something">terms and conditions</a>.
										</label>
									</div>
								</div>

								<div class="modal-footer text-center">
									<button type="submit" class="btn btn-primary btn-round"><i class="fa fa-sign-in"></i> &nbsp;Get Started</button>
								</div>

							</form>

	<div style="margin-top:10pt;display:none;color:green;font-weight:bold;" id="gallery"><img src="image/load.gif" class="img-responsive" style="width:80px;"/></div>
	
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


<?php include_once("footextra.php");?>
</body>
</html>
