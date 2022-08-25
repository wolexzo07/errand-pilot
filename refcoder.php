<?php
#include("finishit.php");
if(isset($_GET["ref_code"]) && !empty($_GET["ref_code"])){

		$code = xg("ref_code");
		
		if(x_count("userdb_bank","token='$code' LIMIT 1") > 0){
			foreach(x_select("email","userdb_bank","token='$code'","1","email") as $key){
				$email = $key["email"];
				$_SESSION["iqgames_refcoded"] = $email;
				session_write_close();
				#finish("./","$email");
				}
				
			}else{

			if(isset($_SESSION["iqgames_refcoded"])){
				
			unset($_SESSION["iqgames_refcoded"]);
							
			}
			finish("./","Invalid referral");
			
				}

}

?>
