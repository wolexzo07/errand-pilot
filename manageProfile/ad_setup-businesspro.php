<?php
if(isset($tokenizer)){
	
	$token = xp("_token"); // Token
	$category = xp("category"); // Service Category
	$merchant_id = xp("subcategory"); // Merchant hashed identity
	$username = xp("username"); // Business username
	
	$salt = "ABCDEFGHIJKKLMNOPQ1234567890abcghdtuwioalkjsnh?@";
	$pass = xp("passkey");
	$hash = md5(sha1($pass).$salt).sha1(sha1($pass).$salt);
	$passkey = $hash; // Password Login
		
	$email = xpmail("email"); // Business Email
	$mobile = xp("mobile"); // Business Number
	$whour = xp("hour"); // working hours
	$des = xp("des"); // Business Description
	$addr = xp("addr"); // Business Address
	
	$country = xp("country"); // Business country
	$state = xp("state"); // Business state
	$branch = xp("branch"); // Business branch
	
	$owner = xp("owner"); // Business Owner
	$contactperson = xp("contactperson"); // Business branch
	
	$twitter = x_clean(x_post("twitter")); // twitter
	$facebook = x_clean(x_post("facebook")); // Facebook
	$instagram = x_clean(x_post("instagram")); // Instaram
	$tiktok = x_clean(x_post("tiktok")); // Tiktok

	
	$timer = x_curtime(0,1);
	
	$servicename = x_getsingleupdate("categories","department","dept_id='$category'");
	$merchantname = x_getsingleupdate("sub_service","subservice","subservice_id='$merchant_id'");
	
	$create = x_dbtab("business_merchant","
	is_verified ENUM('0','1') NOT NULL,
	service_id TEXT NOT NULL,
	service_name VARCHAR(255) NOT NULL,
	merchant_id TEXT NOT NULL,
	merchant_name VARCHAR(255) NOT NULL,
	business_status ENUM('0','1','2') NOT NULL,
	ownername VARCHAR(255) NOT NULL,
	contactperson VARCHAR(255) NOT NULL,
	username VARCHAR(255) NOT NULL,
	password TEXT NOT NULL,
	email VARCHAR(255) NOT NULL,
	mobile VARCHAR(255) NOT NULL,
	working_hour VARCHAR(255) NOT NULL,
	description TEXT NOT NULL,
	address TEXT NOT NULL,
	business_logo TEXT NOT NULL,
	business_coverphoto TEXT NOT NULL,
	country VARCHAR(255) NOT NULL,
	state VARCHAR(255) NOT NULL,
	branch VARCHAR(255) NOT NULL,
	created_on VARCHAR(255) NOT NULL,
	os VARCHAR(100) NOT NULL,
	br VARCHAR(255) NOT NULL,
	ip VARCHAR(100) NOT NULL,
	twitter VARCHAR(255) NOT NULL,
	facebook VARCHAR(255) NOT NULL,
	instagram VARCHAR(255) NOT NULL,
	tiktok VARCHAR(255) NOT NULL
	","innodb");
	
	if($create){
		if(x_ischeckupload("upload1") && x_ischeckupload("upload2")){ //checking for uploaded file
			
			// creating stock photo directories
			$dirn = "BusinessData";
			if(!is_dir($dirn)){ // create folder if it does not exist
				 mkdir($dirn);
				}
			$listdirs = array("BusinessData/5807dd602664a565fe53cf2d203674b388d7b2d1","BusinessData/d9b8e93014a6ba58544ce61fc937ac58059cd092");
			foreach($listdirs as $listdir){
				if(!is_dir($listdir)){ // create folder if it does not exist
				 mkdir($listdir);
				}
			}
			
			if(x_checkmobile($mobile) != $mobile){// validate nigerian number format started
				?>
				<div class="alert alert-warning" role="alert">
				<i class="fa fa-minus-circle"></i>&nbsp;&nbsp;Oops :: <b>Invalid Nigeria mobile number!</b> </div>
				<?php
				exit();
			}
			
			if(x_count("business_merchant","merchant_id='$merchant_id' AND service_id='$category' LIMIT 1") > 0){ //validating Business existence
				?>
				<div class="alert alert-warning" role="alert">
				<i class="fa fa-minus-circle"></i>&nbsp;&nbsp;Oops :: <b>Business Profile (<?php echo strtoupper($merchantname);?>) already Exists!</b> </div>
				<?php
				exit();
			}
			
			if(x_count("business_merchant","username='$username' LIMIT 1") > 0){ //validating Business login existence
				?>
				<div class="alert alert-warning" role="alert">
				<i class="fa fa-minus-circle"></i>&nbsp;&nbsp;Oops :: <b>Business username already Taken!</b> </div>
				<?php
				exit();
			}
			
			if(x_count("business_merchant","email='$email' LIMIT 1") > 0){ //validating Business email existence
				?>
				<div class="alert alert-warning" role="alert">
				<i class="fa fa-minus-circle"></i>&nbsp;&nbsp;Oops :: <b>Business Email already Taken!</b> </div>
				<?php
				exit();
			}
			
			if(x_count("business_merchant","mobile='$mobile'LIMIT 1") > 0){ //validating Business mobile existence
				?>
				<div class="alert alert-warning" role="alert">
				<i class="fa fa-minus-circle"></i>&nbsp;&nbsp;Oops :: <b>Business Mobile already Taken!</b> </div>
				<?php
				exit();
			}
						
			$getlimit = x_getsingleupdate("upload_limit","value","status='1'");
			
			// Handling the Business logo upload
			
			xcload("upload1"); // checking upload status
			$size1 = x_size("upload1"); // get file size
			xcsize("upload1",$getlimit); // 3mb max file size
			xtex("png,gif,jpg,jpeg","upload1");	// checking file extension
			$token1 = sha1(uniqid().xrands(10).Date("His"))."_";
			$path1 = x_path("upload1","BusinessData/5807dd602664a565fe53cf2d203674b388d7b2d1/$token1"); // path to logo
			
			// Handling the Business Cover photo upload
			
			xcload("upload2"); // checking upload status
			$size2 = x_size("upload2"); // get file size
			xcsize("upload2",$getlimit); // 3mb max file size
			xtex("png,gif,jpg,jpeg","upload2");	// checking file extension
			$token2 = sha1(uniqid().xrands(10).Date("His"))."_";
			$path2 = x_path("upload2","BusinessData/d9b8e93014a6ba58544ce61fc937ac58059cd092/$token2"); // path to Cover photo
			
			$os = xos();$ip = xip();$br = xbr();
			
			x_insert("twitter,facebook,instagram,tiktok,is_verified,ownername,contactperson,service_id,service_name,merchant_id,merchant_name,business_status,username,password,email,mobile,working_hour,description,address,business_logo,business_coverphoto,country,state,branch,created_on,os,br,ip","business_merchant","'$twitter','$facebook','$instagram','$tiktok','0','$owner','$contactperson','$category','$servicename','$merchant_id','$merchantname','1','$username','$passkey','$email','$mobile','$whour','$des','$addr','$path1','$path2','$country','$state','$branch','$timer','$os','$br','$ip'","<div class='alert alert-success'><i class='fa fa-check-circle'></i>Hurray! <b>Business set-up was successful</b>.</div>","<div class='alert alert-danger'><i class='fa fa-minus-circle'></i> Error :: <b>Failed to insert data!</b></div>");
		
			// Confirming that data was captured in the db before pushing file uploads
			
			if(x_count("business_merchant","merchant_id='$merchant_id' AND service_id='$category' LIMIT 1") > 0){ //validating Business existence
			
				xmload("upload1",$path1,"");xmload("upload2",$path2,"");
				
				// Handling messaging
				
				include("../siteinfo.php");
				$title = "YOUR BUSINESS PROFILE IS NOW LIVE";
				$message = "Hi <b>$contactperson</b>, <br/><br/> We are more than thrilled to notify you that your Business (<b>$merchantname</b>) profile is now live on $sitename.";
				$content = $message;$type="biz";$category="create";$user_email=$email;
				
				$userid = x_getsingleupdate("business_merchant","id","merchant_id='$merchant_id' AND service_id='$category'"); // getting business id
				
				ep_notifier($type,$title,$message,$userid,$category); // send notification 
				
				ep_mailer($title,$content,$user_email); // send email
				
			}else{
				?><div class='alert alert-danger'><i class='fa fa-minus-circle'></i>
				&nbsp;&nbsp;Error: File upload paused because record was not captured!</div><?php
			}
		}else{
			?><div class='alert alert-danger'><i class='fa fa-minus-circle'></i>
			&nbsp;&nbsp;Error :: No file upload was detected!</div><?php
		}
				
	}else{
		x_print("<div class='alert alert-warning'><i class='fa fa-minus-circle'></i>&nbsp;&nbsp;Error: Failed to create Table!</div>");
	}
}
?>