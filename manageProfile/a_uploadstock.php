<?php
include("adminpagevalidator.php");
if(x_validatepost("_token") && x_validatesession("PAGE_TOKEN") && x_validateget("cmd")){
	
	$cmd = xg("cmd"); // option switching
	$tokenizer = sha1(uniqid()).md5(uniqid()); // Page extension Token
	
	if($cmd == "uploadstocks"){
		
		include_once("ad_readstockuploads.php"); // Handling stocks upload
		
	}elseif($cmd == "setup-business"){
		
		include_once("ad_setup-businesspro.php"); // Handling Business profile processing
		
	}else{
		
	}
	
	
}else{
	?><div class="alert alert-danger"><i class="fa fa-minus-circle"></i> Parameter missing!</div><?php
}

?>