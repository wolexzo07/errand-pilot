<?php
if(isset($tokenizer)){
	$userToken = $_SESSION["ER_TOKEN_2022_VI"];
	$user_id = $_SESSION["ER_ID_2022_VI"];
	
	$category = xp("category");
	$subcategory = xp("subcategory");
	
	$token = xp("_token");
	$name = strtoupper(xp("stockname"));
	$stocknumb = x_clean(x_post("stocknumber"));
	
	$price = xp("stockprice");
	$cost = $price - ((30/100)*$price);
	$quan = xp("stockquantity");
	$des = xp("stockdes");
	$os = xos();$br = xbr();$ip = xip();
	$time=x_curtime("0","0");$rtime=x_curtime("0","1");
	$by = $user_id;
	$hash = md5(xp("_token").$category.$subcategory.$user_id.$name.DATE("YmdHis"));
	
	
	$create = x_dbtab("stockmanager","
	category_id VARCHAR(255) NOT NULL,
	subservice_id VARCHAR(255) NOT NULL,
	stockname VARCHAR(255) NOT NULL,
	stocknumber VARCHAR(255) NOT NULL,
	costprice DOUBLE NOT NULL,
	sellingprice DOUBLE NOT NULL,
	quantity INT NOT NULL,
	initial_quantity INT NOT NULL,
	description TEXT NOT NULL,
	first_image TEXT NOT NULL,
	second_image TEXT NOT NULL,
	third_image TEXT NOT NULL,
	fourth_image TEXT NOT NULL,
	addedby VARCHAR(100) NOT NULL,
	token TEXT NOT NULL,
	regdate VARCHAR(200) NOT NULL,
	time_stamp DATETIME NOT NULL,
	os VARCHAR(100) NOT NULL,
	ip VARCHAR(100) NOT NULL,
	br VARCHAR(100) NOT NULL,
	status ENUM('0','1') NOT NULL
	","MYISAM");
	
	
	$created = x_dbtab("stockcount","
	stockid VARCHAR(255) NOT NULL,
	quantity DOUBLE NOT NULL,
	token TEXT NOT NULL,
	addedby VARCHAR(200) NOT NULL,
	regdate VARCHAR(200) NOT NULL,
	time_stamp DATETIME NOT NULL,
	os VARCHAR(100) NOT NULL,
	ip VARCHAR(100) NOT NULL,
	br VARCHAR(100) NOT NULL
	","MYISAM");
	
		if($create && $created){
			
				if(x_ischeckupload("upload1") && x_ischeckupload("upload2") && x_ischeckupload("upload3") && x_ischeckupload("upload4")){
			
			        // creating stock photo directories
					$dirn = "StocksHosting";
					if(!is_dir($dirn)){
						 mkdir($dirn);
						}
					$listdirs = array("StocksHosting/5fd47a5aa207ae8fb4b47fd80e9a30c6837526cb","StocksHosting/62dba79d288517118d7d441d5b749bcafdf3d79f","StocksHosting/0b7aabed06cb0cfc1f4d62eeded8246028c3792e","StocksHosting/e6a1517e2c8545ee230b3be0d9e47eece26e84f3");
					foreach($listdirs as $listdir){
						if(!is_dir($listdir)){
						 mkdir($listdir);
						}
					}
					 
					//validating stock item existence in the db
					
					if(x_count("stockmanager","category_id='$category' AND subservice_id='$subcategory' AND stockname='$name' LIMIT 1") > 0){
						?>
						<div class="alert alert-warning" role="alert"><i class="fa fa-minus-circle"></i> Stock Item <b><?php x_print($name)?></b> already Exist!</div>
						<?php
						exit();
					}
					
					//$fsize = $_FILES['upload']['size'];
					//$final_size = x_getsize($fsize); // returns size in kb , mb
				    $getlimit = x_getsingle("SELECT value FROM upload_limit WHERE status='1'","upload_limit WHERE status='1'","value");
					
					// Handling the first upload
				
					xcload("upload1"); // checking upload status
					$size1 = x_size("upload1"); // get file size
					xcsize("upload1",$getlimit); // 3mb max file size
					xtex("png,gif,jpg,jpeg","upload1");	// checking file extension
					$token1 = sha1(uniqid().xrands(10).Date("His"))."_";
					$path1 = x_path("upload1","StocksHosting/5fd47a5aa207ae8fb4b47fd80e9a30c6837526cb/$token1");
					
					// Handling the second upload
					
					xcload("upload2"); // checking upload status
					$size2 = x_size("upload2"); // get file size
					xcsize("upload2",$getlimit); // 3mb max file size
					xtex("png,gif,jpg,jpeg","upload2");	// checking file extension
					$token2 = sha1(uniqid().xrands(10).Date("His"))."_";
					$path2 = x_path("upload2","StocksHosting/62dba79d288517118d7d441d5b749bcafdf3d79f/$token2");
					
					// Handling the third upload
					
					xcload("upload3"); // checking upload status
					$size3 = x_size("upload3"); // get file size
					xcsize("upload3",$getlimit); // 3mb max file size
					xtex("png,gif,jpg,jpeg","upload3");	// checking file extension
					$token3 = sha1(uniqid().xrands(10).Date("His"))."_";
					$path3 = x_path("upload3","StocksHosting/0b7aabed06cb0cfc1f4d62eeded8246028c3792e/$token3");
					
					// Handling the fourth upload
					
					xcload("upload4"); // checking upload status
					$size4 = x_size("upload4"); // get file size
					xcsize("upload4",$getlimit); // 3mb max file size
					xtex("png,gif,jpg,jpeg","upload4");	// checking file extension
					$token4 = sha1(uniqid().xrands(10).Date("His"))."_";
					$path4 = x_path("upload4","StocksHosting/e6a1517e2c8545ee230b3be0d9e47eece26e84f3/$token4");
					
					//processing data into database
					
					x_insert("category_id,subservice_id,stocknumber,stockname,initial_quantity,addedby,costprice,sellingprice,quantity,description,first_image,second_image,third_image,fourth_image,token,regdate,time_stamp,os,ip,br","stockmanager","'$category','$subcategory','$stocknumb','$name','$quan','$by','$cost','$price','$quan','$des','$path1','$path2','$path3','$path4','$hash','$rtime','$time','$os','$ip','$br'","<div class='alert alert-success'><i class='fa fa-minus-circle'></i> Stock added successfully @ $rtime.</div>","<div class='alert alert-danger'><i class='fa fa-minus-circle'></i> Failed to submit data!</div>");
					
					// Checking if data was inserted into db before uploading stock photos!
					
					if(x_count("stockmanager","category_id='$category' AND subservice_id='$subcategory' AND stockname='$name' LIMIT 1") > 0){
						
						//move file upload to the designated location
					
						xmload("upload1",$path1,"");xmload("upload2",$path2,"");
						xmload("upload3",$path3,"");xmload("upload4",$path4,"");
						
					}else{
						?><div class='alert alert-danger'><i class='fa fa-minus-circle'></i> Error: File upload paused because record was not captured!</div><?php
					}
					
				}else{
					?><div class="alert alert-warning" role="alert"><i class="fa fa-minus-circle"></i> Error: Please upload all stock photos!</div><?php
				}
			
		}else{
			?><div class="alert alert-danger"><i class="fa fa-minus-circle"></i> Failed to create tables!</div><?php
		}
}
?>